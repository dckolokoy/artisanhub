<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\MenuItem;
use App\Models\transaction_items;
use App\Models\Reservation;
use App\Models\Review;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Redirect,Response;
use Illuminate\Support\Facades\Mail;
use App\Mail\Signup;
use App\Mail\Apply;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    // Orders
    const TRANSACTION_STATUS_PENDING = 0;
    const TRANSACTION_STATUS_APPROVED = 1;
    const TRANSACTION_STATUS_PREPARING = 2;
    const TRANSACTION_STATUS_READY = 3;
    const TRANSACTION_STATUS_ON_THE_WAY = 4;
    const TRANSACTION_STATUS_COMPLETED = 5;
    const TRANSACTION_STATUS_DECLINED = 6;
    const TRANSACTION_STATUS_CANCELLED = 7;

    // Reservations
    const TRANSACTION_STATUS_BOOKED = 10;

    const PAYMENT_TYPE_COD = 1;
    const PAYMENT_TYPE_GCASH = 2;

    const ORDER_TYPE_IMMEDIATE = 0;
    const ORDER_TYPE_SCHEDULED = 1;
    const ORDER_TYPE_RESERVATION= 2;

    const RESERVATION_PRICE = 5000;

    private $customerId;

    public static function getTransactionStatusById($id) {

        $list = [
            // Orders
            self::TRANSACTION_STATUS_PENDING => 'Pending',
            self::TRANSACTION_STATUS_APPROVED => 'Approved',
            self::TRANSACTION_STATUS_PREPARING => 'Preparing',
            self::TRANSACTION_STATUS_READY => 'Order is Ready',
            self::TRANSACTION_STATUS_ON_THE_WAY => 'Order is on the way',
            self::TRANSACTION_STATUS_COMPLETED => 'Order Received',
            self::TRANSACTION_STATUS_DECLINED => 'Order Declined',
            self::TRANSACTION_STATUS_CANCELLED => 'Order Cancelled',

            // Reservations
            self::TRANSACTION_STATUS_BOOKED => 'Booked',
        ];

        return $list[$id];
    }

    // use AuthorizesRequests, Dispat   chesJobs, ValidatesRequests;
    public function index()
    {
        return view('justnpot/customer/index', [
            'data' => $this->mockDataForIndex()
        ]);
    }

    public function shop()
    {
        $query = "";
        $sel_category = "";
        $sel_artist = "";
        $featured = 0;
        $best = 0;
        $owned = 0;
        $notOwned = 0;
        $sort = 0;

        
        $menu_items = DB::table('menu_items')
        ->select('*','categories.name as c_name','menu_items.id as m_id','menu_items.name as m_name', 'menu_items.user_id as store_id','categories.type as type')
        ->join('categories','categories.id','=','menu_items.category_id')

        ->orderBy('m_id', 'ASC')
        ->paginate(6);  
// dd($menu_items);
        $categories = DB::table('categories')
        ->select('*')
        ->get();
        
        $artists = DB::table('menu_items')
        ->select('artist', DB::raw('count(*) as total'))
        ->groupBy('artist')
        ->get();


        return view('justnpot/customer/shop',compact("sort","owned","notOwned","menu_items","query","categories","sel_category","artists","sel_artist","featured","best"));


    }
// shop search engine 
    public function search(Request $request)
    {
      // dd($request->input('optradio') );
        $best = 0;
        $featured = 0;
        $owned = 0;
        $notOwned = 0;
        $sort = 0;

     

        if($request->input('optradio2') == 1){
            $owned = 1;
        }elseif($request->input('optradio2') == 2) {
            $notOwned = 1;
        }



        $menu_items = DB::table('menu_items')
        ->select('*','categories.name as c_name','menu_items.id as m_id','menu_items.name as m_name' , 'menu_items.user_id as store_id','categories.type as type')
        ->join('categories','categories.id','=','menu_items.category_id')
        ->orderBy('m_id', 'ASC')
        ->paginate(6);
  


        if(!empty($request->input('query'))){
            $menu_items = DB::table('menu_items')
            ->select('*','categories.name as c_name','menu_items.id as m_id','menu_items.name as m_name', 'menu_items.user_id as store_id','categories.type as type' )
            ->join('categories','categories.id','=','menu_items.category_id')
            ->where('menu_items.name', 'like', '%'.$request->input('query').'%')
            ->paginate(6);
        }
    
        if(empty($request->input('sel_artist')) && empty($request->input('sel_category'))  && $request->input('optradio') == 0 ){
          
            $sort=0;
        }       
        elseif(!empty($request->input('sel_artist')) && empty($request->input('sel_category'))  && $request->input('optradio') == 0 ){
            $menu_items = DB::table('menu_items')
            ->select('*','categories.name as c_name','menu_items.id as m_id','menu_items.name as m_name', 'menu_items.user_id as store_id','categories.type as type' )
            ->join('categories','categories.id','=','menu_items.category_id')
            ->Where('menu_items.artist',$request->input('sel_artist'))
            ->paginate(6);
            $sort=0;
        }
        elseif(empty($request->input('sel_artist')) && !empty($request->input('sel_category')) && $request->input('optradio') == 0){
            $menu_items = DB::table('menu_items')
            ->select('*','categories.name as c_name','menu_items.id as m_id','menu_items.name as m_name', 'menu_items.user_id as store_id','categories.type as type' )
            ->join('categories','categories.id','=','menu_items.category_id')
      
            ->Where('categories.id',$request->input('sel_category'))
            ->paginate(6);
            $sort=0;
        }
        elseif(!empty($request->input('sel_artist')) && !empty($request->input('sel_category')) && $request->input('optradio') == 0){
            $menu_items = DB::table('menu_items')
            ->select('*','categories.name as c_name','menu_items.id as m_id','menu_items.name as m_name', 'menu_items.user_id as store_id','categories.type as type' )
            ->join('categories','categories.id','=','menu_items.category_id')
            ->Where('menu_items.artist',$request->input('sel_artist'))
            ->Where('categories.id',$request->input('sel_category')) 
            ->paginate(6);
            $sort=0;
        }
     elseif(empty($request->input('sel_artist')) && empty($request->input('sel_category'))  && $request->input('optradio') == 1){

            $menu_items = DB::table('menu_items')
            ->select('*', 'categories.name as c_name', 'menu_items.id as m_id', 'menu_items.name as m_name', 'menu_items.user_id as store_id','categories.type as type',
                DB::raw('(SELECT COUNT(*) FROM likes WHERE likes.menu_item_id = menu_items.id AND likes.is_like = 1) as like_count'))
            ->join('categories', 'categories.id', '=', 'menu_items.category_id')
            ->orderByDesc('like_count')
            ->paginate(6);

            $sort = 1;

        }
        elseif(!empty($request->input('sel_artist')) && empty($request->input('sel_category'))  && $request->input('optradio') == 1){

            $menu_items = DB::table('menu_items')
            ->select('*', 'categories.name as c_name', 'menu_items.id as m_id', 'menu_items.name as m_name', 'menu_items.user_id as store_id','categories.type as type',
                DB::raw('(SELECT COUNT(*) FROM likes WHERE likes.menu_item_id = menu_items.id AND likes.is_like = 1) as like_count'))
            ->join('categories', 'categories.id', '=', 'menu_items.category_id')
            ->Where('menu_items.artist',$request->input('sel_artist'))
            ->orderByDesc('like_count')
            ->paginate(6);

            $sort = 1;

        }
        elseif(empty($request->input('sel_artist')) && !empty($request->input('sel_category'))  && $request->input('optradio') == 1){

            $menu_items = DB::table('menu_items')
            ->select('*', 'categories.name as c_name', 'menu_items.id as m_id', 'menu_items.name as m_name', 'menu_items.user_id as store_id','categories.type as type',
                DB::raw('(SELECT COUNT(*) FROM likes WHERE likes.menu_item_id = menu_items.id AND likes.is_like = 1) as like_count'))
            ->join('categories', 'categories.id', '=', 'menu_items.category_id')
            ->Where('categories.id',$request->input('sel_category'))
            ->orderByDesc('like_count')
            ->paginate(6);

            $sort = 1;

        }
        elseif(!empty($request->input('sel_artist')) && !empty($request->input('sel_category'))  && $request->input('optradio') == 1){

            $menu_items = DB::table('menu_items')
            ->select('*', 'categories.name as c_name', 'menu_items.id as m_id', 'menu_items.name as m_name', 'menu_items.user_id as store_id','categories.type as type',
                DB::raw('(SELECT COUNT(*) FROM likes WHERE likes.menu_item_id = menu_items.id AND likes.is_like = 1) as like_count'))
            ->join('categories', 'categories.id', '=', 'menu_items.category_id')
            ->Where('categories.id',$request->input('sel_category'))
            ->Where('menu_items.artist',$request->input('sel_artist'))
            ->orderByDesc('like_count')
            ->paginate(6);

            $sort = 1;

        }

        elseif(empty($request->input('sel_artist')) && empty($request->input('sel_category'))  && $request->input('optradio') == 2){
            $menu_items = DB::table('menu_items')
            ->select('*','categories.name as c_name','menu_items.id as m_id','menu_items.name as m_name' , 'menu_items.user_id as store_id','categories.type as type')
            ->join('categories','categories.id','=','menu_items.category_id')
            ->orderBy('m_name', 'asc')
            ->paginate(6);

            $sort = 2;

        }
        elseif(!empty($request->input('sel_artist')) && empty($request->input('sel_category'))  && $request->input('optradio') == 2){
            $menu_items = DB::table('menu_items')
            ->select('*','categories.name as c_name','menu_items.id as m_id','menu_items.name as m_name', 'menu_items.user_id as store_id','categories.type as type' )
            ->join('categories','categories.id','=','menu_items.category_id')
            ->Where('menu_items.artist',$request->input('sel_artist'))
            ->orderBy('m_name', 'asc')
            ->paginate(6);

            $sort = 2;

        }
        elseif(empty($request->input('sel_artist')) && !empty($request->input('sel_category'))  && $request->input('optradio') == 2){
            $menu_items = DB::table('menu_items')
            ->select('*','categories.name as c_name','menu_items.id as m_id','menu_items.name as m_name', 'menu_items.user_id as store_id','categories.type as type' )
            ->join('categories','categories.id','=','menu_items.category_id')
            ->Where('categories.id',$request->input('sel_category'))
            ->orderBy('m_name', 'asc')
            ->paginate(6);

            $sort = 2;

        }
        elseif(!empty($request->input('sel_artist')) && !empty($request->input('sel_category'))  && $request->input('optradio') == 2){
            $menu_items = DB::table('menu_items')
            ->select('*','categories.name as c_name','menu_items.id as m_id','menu_items.name as m_name', 'menu_items.user_id as store_id','categories.type as type' )
            ->join('categories','categories.id','=','menu_items.category_id')
            ->Where('categories.id',$request->input('sel_category'))
            ->Where('menu_items.artist',$request->input('sel_artist'))
            ->orderBy('m_name', 'asc')
            ->paginate(6);
            
            $sort = 2;

        }
        elseif(empty($request->input('sel_artist')) && empty($request->input('sel_category'))  && $request->input('optradio') == 3){
            $menu_items = DB::table('menu_items')
            ->select('*','categories.name as c_name','menu_items.id as m_id','menu_items.name as m_name', 'menu_items.user_id as store_id','categories.type as type' )
            ->join('categories','categories.id','=','menu_items.category_id')
            ->orderBy('m_name', 'desc')
            ->paginate(6);

            $sort = 3;

        }
        elseif(!empty($request->input('sel_artist')) && empty($request->input('sel_category'))  && $request->input('optradio') == 3){
            $menu_items = DB::table('menu_items')
            ->select('*','categories.name as c_name','menu_items.id as m_id','menu_items.name as m_name', 'menu_items.user_id as store_id','categories.type as type' )
            ->join('categories','categories.id','=','menu_items.category_id')
            ->Where('menu_items.artist',$request->input('sel_artist'))
            ->orderBy('m_name', 'desc')
            ->paginate(6);
            $sort = 3;

        }
        elseif(empty($request->input('sel_artist')) && !empty($request->input('sel_category'))  && $request->input('optradio') == 3){
            $menu_items = DB::table('menu_items')
            ->select('*','categories.name as c_name','menu_items.id as m_id','menu_items.name as m_name', 'menu_items.user_id as store_id','categories.type as type' )
            ->join('categories','categories.id','=','menu_items.category_id')
            ->Where('categories.id',$request->input('sel_category'))
            ->orderBy('m_name', 'desc')
            ->paginate(6);

            $sort = 3;

        }
        elseif(!empty($request->input('sel_artist')) && !empty($request->input('sel_category'))  && $request->input('optradio') == 3){
            $menu_items = DB::table('menu_items')
            ->select('*','categories.name as c_name','menu_items.id as m_id','menu_items.name as m_name', 'menu_items.user_id as store_id','categories.type as type' )
            ->join('categories','categories.id','=','menu_items.category_id')
            ->Where('categories.id',$request->input('sel_category'))
            ->Where('menu_items.artist',$request->input('sel_artist'))
            ->orderBy('m_name', 'desc')
            ->paginate(6);
          
            $sort = 3;

        }
        elseif(empty($request->input('sel_artist')) && empty($request->input('sel_category'))  && $request->input('optradio') == 4) {
            $menu_items = DB::table('menu_items')
            ->select('*','categories.name as c_name','menu_items.id as m_id','menu_items.name as m_name', 'menu_items.user_id as store_id','categories.type as type' )
            ->join('categories','categories.id','=','menu_items.category_id')
            ->orderBy('menu_items.created_at', 'desc')
            ->paginate(6);

            $sort = 4;


        }
        elseif(!empty($request->input('sel_artist')) && empty($request->input('sel_category'))  && $request->input('optradio') == 4) {
            $menu_items = DB::table('menu_items')
            ->select('*','categories.name as c_name','menu_items.id as m_id','menu_items.name as m_name', 'menu_items.user_id as store_id','categories.type as type' )
            ->join('categories','categories.id','=','menu_items.category_id')
            ->Where('menu_items.artist',$request->input('sel_artist'))
            ->orderBy('menu_items.created_at', 'desc')
            ->paginate(6);

            $sort = 4;


        }
        elseif(empty($request->input('sel_artist')) && !empty($request->input('sel_category'))  && $request->input('optradio') == 4) {
            $menu_items = DB::table('menu_items')
            ->select('*','categories.name as c_name','menu_items.id as m_id','menu_items.name as m_name', 'menu_items.user_id as store_id','categories.type as type' )
            ->join('categories','categories.id','=','menu_items.category_id')
            ->Where('categories.id',$request->input('sel_category'))
            ->orderBy('menu_items.created_at', 'desc')
            ->paginate(6);

            $sort = 4;


        }
        elseif(!empty($request->input('sel_artist')) && !empty($request->input('sel_category'))  && $request->input('optradio') == 4) {
            $menu_items = DB::table('menu_items')
            ->select('*','categories.name as c_name','menu_items.id as m_id','menu_items.name as m_name', 'menu_items.user_id as store_id','categories.type as type' )
            ->join('categories','categories.id','=','menu_items.category_id')
            ->Where('menu_items.artist',$request->input('sel_artist'))
            ->Where('categories.id',$request->input('sel_category'))
            ->orderBy('menu_items.created_at', 'desc')
            ->paginate(6);

            $sort = 4;


        }






        $categories = DB::table('categories')
        ->select('*')
        ->distinct()
        ->get();
        $artists = DB::table('menu_items')
        ->select('artist', DB::raw('count(*) as total'))
        ->distinct()
        ->groupBy('artist')
        ->get();

        $menu_items->appends(array ('query' => $request->input('query')));
        $query = $request->input('query');
        $sel_category = $request->input('sel_category');
        $sel_artist = $request->input('sel_artist');


        return view('justnpot/customer/shop',compact("sort","owned","notOwned","menu_items","query","categories","sel_category","sel_artist","artists","featured","best"));


    }
    public function searchSeller($id)
    {
      // dd($request->input('optradio') );
     
      $sort = 0;
        $menu_items = DB::table('menu_items')
        ->select('*','categories.name as c_name','menu_items.id as m_id','menu_items.name as m_name', 'menu_items.user_id as store_id' )
        ->join('categories','categories.id','=','menu_items.category_id')
        ->where('menu_items.user_id', $id)
        ->orderBy('m_id', 'DESC')
        ->paginate(6);



        $categories = DB::table('categories')
        ->select('*')
        ->distinct()
        ->get();
        $artists = DB::table('menu_items')
        ->select('artist', DB::raw('count(*) as total'))
        ->distinct()
        ->groupBy('artist')
        ->get();
    
        
        $query = "";
        $sel_category = "";
        $sel_artist = "";



        return view('justnpot.customer.shop',compact("menu_items","query","sort","categories","sel_category","sel_artist","artists"));


    }

    public function career()
    {
        $careers = DB::table('careers')
        ->select('*')
        ->where('status',1)
        ->paginate(6);

        return view('justnpot.customer.career',compact("careers"));


    }

    public function updateacc($id, Request $request) {
        $user = User::findOrFail($id);

        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$id],

            'password' => ['nullable', 'string', 'min:1',  'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-])/', 'confirmed'],
            'image' => ['nullable', 'image'],
        ], [
            'password.regex' => 'Password not following correct format',
        ]);

        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->address = $request->input('address');
        $user->mobile = $request->input('mobile');
        $user->age = $request->input('age');
        $user->birthdate = $request->input('birthdate');
        $user->gender = $request->input('gender');

        if($validatedData['password']){
            $user->password = Hash::make($validatedData['password']);
        }

        if($request->hasfile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $origname = $file->getClientOriginalName();
            $filename = 'id-image'.time().'.'.$extension;
            $file->move('uploads/image_id/', $filename);
            $user->picture= $filename;
        }

        $user->save();

        return redirect('/acc')->with('success','Account information successfully updated!');
    }


    public function acc()
    {
     
        $users = DB::table('users')
        ->select('*')
        ->where('users.id',auth()->user()->id)
        ->get();



        return view('justnpot.customer.account',compact("users"));


    }

    public function apply($id)
    {

        $careers = DB::table('careers')
        ->select('*')
        ->where('status',1)
        ->paginate(6);



        $tables = DB::table('careers')
        ->select('*')
        ->where('careers.id',$id)
        ->get()
        ->toArray();

        $email = 'artmoto26@gmail.com';

        Mail::to($email)->send(new Apply($tables));

        return redirect('/career')->with('success','You have successfully applied and email the company for this position, check you email for update');



    }

    public function reviews()
    {
        return view('justnpot/customer/main-reviews',[
            'data' => $this->mockDataForIndex()
        ]);
    }

    public function contact_us()
    {
        return view('justnpot/customer/main-contact-us',[
            'data' => $this->mockDataForIndex()
        ]);
    }

    public function menu()
    {
        return view('justnpot/customer/main-menu', [
            'data' => $this->mockDataForIndex()
        ]);
    }

    public function gallery()
    {
        return view('justnpot/customer/main-gallery', [
            'data' => $this->mockDataForIndex()
        ]);
    }

    public function about()
    {
        return view('justnpot/customer/main-about', [
            'data' => $this->mockDataForIndex()
        ]);
    }

    public function privacyPolicy() {
        return view('justnpot/customer/main-privacy-policy', [
            'data' => $this->mockDataForIndex()
        ]);
    }

    public function termsAndConditions() {
        return view('justnpot/customer/main-terms-and-conditions', [
            'data' => $this->mockDataForIndex()
        ]);
    }

    public function cart()
    {
        return view('justnpot/customer/main-cart', [
            'data' => $this->mockDataForIndex()
        ]);
    }

    public function  cartHistory()
    {
        return view('justnpot/customer/main-cart-history', [
            'data' => $this->mockDataForIndex()
        ]);
    }


    public function addToCart($menuId)
    {
        $menu = MenuItem::where('id', $menuId)->get();

        return view('justnpot/customer/main-add-to-cart', [
            'data' => [
                'menu' => $menu,
                'username' => Auth::user()->name,
                'userId' => 1
            ]
        ]);
    }


    // todo: PGW Validator
    public function postAddToCart(Request $request)
    {
        $customerId = $request->customer_id;
        $menu_item_id = $request->menu_item_id;
        $quantity = $request->quantity;
        // var_dump($request->all());
        // exit;
        DB::beginTransaction();
        try {
            // check if has pending cart
            $hasPendingCart = Transaction::where([
                ['user_id', '=', $customerId], ['status', '=', self::TRANSACTION_STATUS_PENDING]]
                )->orderBy('id', 'DESC')->limit(1)->get();

            if (count($hasPendingCart) == 0) {
                $transaction = new Transaction();
                $transaction->user_id = $customerId;
                $transaction->payment_type = 0;
                $transaction->order_type = self::ORDER_TYPE_IMMEDIATE;
                $transaction->delivery_date = null;
                $transaction->total_amount = 0;
                $transaction->status = self::TRANSACTION_STATUS_PENDING;
                $transaction->payment_reference = $request->transaction_number;;
                $transaction->save();
                $orderId = $transaction->id;
            } else {
                $orderId = $hasPendingCart[0]['id'];
            }

            // check if has same item on same transaction
            $hasSameItemOnCart = transaction_items::where([
                ['menu_item_id', '=', $menu_item_id], ['transaction_id', '=', $orderId]]
                )->first();

            // order item (qty * amount)
            $menuItem = MenuItem::find($menu_item_id)->first();
            $menuTotalAmount = $quantity * $menuItem->price;

            if (is_null($hasSameItemOnCart) === false) {
                $hasSameItemOnCart->quantity = $quantity;
                $hasSameItemOnCart->amount = $menuTotalAmount;
                $hasSameItemOnCart->save();
            } else {
                $orderItems = new transaction_items;
                $orderItems->transaction_id = $orderId;
                $orderItems->menu_item_id = $menu_item_id;
                $orderItems->quantity = $quantity;
                $orderItems->delivery_date = null;
                $orderItems->amount = $menuTotalAmount;
                $orderItems->save();
            }

            DB::commit();
            return [
                'success' => true,
                'data' => [],
                'error' => []
            ];
        } catch (Exception $e) {
            DB::rollBack();
            return [
                'success' => false,
                'data' => [],
                'error' => $e->getMessage()
            ];
        }
    }

    public function checkOut()
    {
        return view('justnpot/customer/main-checkout', [
            'data' => $this->mockDataForIndex(),
        ]);
    }

    public function login()
    {
        return view('justnpot/customer/main-login', [
            'data' => $this->mockDataForIndex()
        ]);
    }

    public function register()
    {
        return view('justnpot/customer/main-register', [
            'data' => $this->mockDataForIndex()
        ]);
    }


    public function reservationCheckout($mode_of_payment, $reservation_date) {
        $transaction = new Transaction();
        $transaction->user_id = 1;
        $transaction->payment_type = $mode_of_payment;
        $transaction->order_type = self::ORDER_TYPE_RESERVATION;
        $transaction->delivery_date = $reservation_date; // Y-m-d
        $transaction->total_amount = self::RESERVATION_PRICE;
        $transaction->status = self::TRANSACTION_STATUS_BOOKED;
        $transaction->save();
        return $transaction;

    }


    /**
     * Can use in Order checkout and Reservations reserve
     *
     * parameters
     * name
     * order_type 1 - order now, 2 - scheduled order, 3 - reservation
     * mode_of_payment
     * mobile_no
     * email_address
     * address
     * note
     *
     * Reservations
     * - reservation_date Y-m-d H:i:s
     *
     * Orders
     * - transaction_id
     * - delivery_schedule
     *
     * @param Request $request
     * @return void
     */
    public function postTransactionCheckout(Request $request)
    {
        // todo: PGW validations
        DB::beginTransaction();
        try {

            // for reservations
            if ($request->order_type == self::ORDER_TYPE_RESERVATION) {
                $reservationDate = Carbon::createFromFormat('Y-m-d H:i:s', $request->reservation_date);
                $transaction = $this->reservationCheckout(
                    $request->mode_of_payment,
                    $reservationDate->format('Y-m-d'),
                );
                $transaction->save();
                $transactionId = $transaction->id;

                $reservation = new Reservation();
                $reservation->transaction_id = $transactionId;
                $reservation->reservation_date = $reservationDate->format('Y-m-d H:i:s'); // Y-m-d H:i:s
                $reservation->save();

            } else {
                // for orders
                $transaction = Transaction::find($request->transaction_id);

                if (is_null($transaction) === true) {
                    throw new Exception('Invalid Transaction Id.');
                }

                // compute order
                $orderItems = transaction_items::where('transaction_id', '=', $request->transaction_id);
                $totalAmount = $orderItems->sum('amount');
                $transaction->payment_type = $request->mode_of_payment;
                $transaction->order_type = $request->order_type;
                $transaction->delivery_date = $request->delivery_schedule; // Y-m-d
                $transaction->total_amount = $totalAmount;
                $transaction->status = self::TRANSACTION_STATUS_PENDING;
                $transaction->save();
                $transactionId = $transaction->id;
            }

            // transaction details
            $transactionDetails = new TransactionDetail();
            $transactionDetails->name = $request->name;
            $transactionDetails->contact_no = $request->mobile_no;
            $transactionDetails->email_address = $request->email_address;
            $transactionDetails->address = $request->address ?? '';
            $transactionDetails->note = $request->note ?? '';
            $transactionDetails->transaction_id = $transactionId;
            $transactionDetails->save();

            DB::commit();
            return [
                'success' => true,
                'data' => [],
                'error' => []
            ];
        } catch (Exception $e) {
            DB::rollback();
            return [
                'success' => false,
                'data' => [],
                'error' => $e->getMessage()
            ];
        }
    }

    /**
     * parameters
     *  - transaction_id
     *  - menu_item_id
     *
     * @param Request $request
     * @return void
     */
    public function transactionRemoveItem(Request $request)
    {
        // todo: PGW validations
        DB::beginTransaction();
        try {
            $result = DB::table('transaction_items')->where([
                ['transaction_id', '=', $request->transaction_id],
                ['menu_item_id', '=', $request->menu_item_id]
            ])->delete();

            DB::commit();
            return [
                'success' => $result == 1 ? true : false,
                'data' => [],
                'error' => []
            ];
        } catch (Exception $e) {
            DB::rollback();
            return [
                'success' => false,
                'data' => [],
                'error' => $e->getMessage()
            ];
        }
    }

    public function reservations()
    {
        $from = Carbon::now()->format('Y-m-d 00:00:00');
        $to = Carbon::now()->addMonths(6)->format('Y-m-d 23:59:59');

        $reservations = Reservation::whereBetween('reservation_date', [$from, $to])
            ->orderBy('reservation_date', 'ASC')
            ->get();

        $formatReservations = [];
        $disabledDates = [];
        $reservedElevenAm = [];
        $reservedsSixPm = [];

        $elevenAm = 11;
        $sixPm = 18;
        $formatReservations['reservedElevenAm'] = [];
        $formatReservations['reservedSixPm'] = [];

        foreach ($reservations as $key => $date) {
            $reservationDate = Carbon::createFromFormat('Y-m-d H:i:s',  $date['reservation_date']);
            $formatReservations[$reservationDate->format('Y-m-d')][$reservationDate->format('H')] = $reservationDate->format('H');

            if (array_key_exists($elevenAm, $formatReservations[$reservationDate->format('Y-m-d')])) {
                $formatReservations['reservedElevenAm'][$reservationDate->format('Y-m-d')] = $reservationDate->format('Y-m-d');
            }
            if (array_key_exists($sixPm, $formatReservations[$reservationDate->format('Y-m-d')])) {
                $formatReservations['reservedSixPm'][$reservationDate->format('Y-m-d')] = $reservationDate->format('Y-m-d');
            }
        }

        $formatReservations['reservedBoth'] = array_values(array_intersect($formatReservations['reservedElevenAm'], $formatReservations['reservedSixPm']));

        return view('justnpot/customer/main-reservations', [
            'data' => $this->mockDataForIndex(),
            'reserved_dates' => $formatReservations
        ]);
    }

    public function myReservations() {
        return view('justnpot/customer/main-my-reservations', [
            'data' => $this->mockDataForIndex()
        ]);
    }

    public function myReservationsHistory() {
        return view('justnpot/customer/main-my-reservations-history', [
            'data' => $this->mockDataForIndex()
        ]);
    }

    public function postReview(Request $request){
        // todo: PGW validations

        $review = new Review();
        $review->name = $request->name;
        $review->rating = $request->rev;
        $review->review = $request->desc;
        $review->save();

        return redirect(route('reviews'))->with('status', 'Blog Post Form Data Has Been inserted');
    }

    /**
     * parameters
     *  - start_date Y-m-d
     *  - end_date Y-m-d
     *
     * @param Request $request
     * @return void
     */
    public function getReservations(Request $request)
    {

        // todo: PGW validations
        $from = $request->start_date . ' 00:00:00';
        $to = $request->end_date . ' 23:59:59';

        try{
            $reservations = Reservation::whereBetween('reservation_date', [$from, $to])
                ->orderBy('reservation_date', 'ASC')
                ->get();

            $formatReservations = [];

            foreach ($reservations as $key => $date) {
                $reservationDate = Carbon::createFromFormat('Y-m-d H:i:s',  $date['reservation_date']);
                $formatReservations[$reservationDate->format('Y-m-d')][] = $reservationDate->format('H:i');
            }

        return [
            'success' => true,
            'data' => $formatReservations,
            'error' => []
        ];
    } catch (Exception $e) {
        return [
            'success' => false,
            'data' => [],
            'error' => $e->getMessage()
        ];
        }
    }

    public function mockDataForIndex()
    {
        $menu = MenuItem::all();


            $gallery = $menu->random(count($menu));
            $headerImages = $menu->random(count($menu));



        $categories = Category::all();




        $reviews = Review::orderBy('rating', 'DESC')->limit(3)->get();
        $formattedCategories = [];

        foreach ($categories as $key => $value) {
            $formattedCategories[$value['id']] = $value['name'];
        }
        $menuPerCategory = $menu->groupBy('category_id')->all();

        // initialize with auth
        $cart = [];
        $cartHistoryGrouped = [];
        $myReservations = [];
        $myReservationsHistory = [];

        // if (Auth::check()) {
        //     $customerId = 1;
        //     $cart = Transaction::join('transaction_items', function($join){
        //         $join->on('transactions.id', '=', 'transaction_items.transaction_id');
        //     })->
        //     leftJoin('menu_items', function($join){
        //         $join->on('menu_items.id', '=', 'transaction_items.menu_item_id');
        //     })->where([
        //         ['user_id', '=', $customerId],
        //         ['order_type', '!=', self::ORDER_TYPE_RESERVATION],
        //         ['status', '=', self::TRANSACTION_STATUS_PENDING]
        //     ])->orderBy('transactions.id', 'DESC')->get();

        //     $cartHistory = Transaction::leftJoin('transaction_items', function($join){
        //         $join->on('transactions.id', '=', 'transaction_items.transaction_id');
        //     })->
        //     leftJoin('menu_items', function($join){
        //         $join->on('menu_items.id', '=', 'transaction_items.menu_item_id');
        //     })->leftJoin('transaction_details', function($join){
        //         $join->on('transactions.id', '=', 'transaction_details.transaction_id');
        //     })
        //     ->where([
        //         ['user_id', '=', $customerId],
        //         ['order_type', '!=', self::ORDER_TYPE_RESERVATION]
        //         // , ['status', '<>', self::TRANSACTION_STATUS_PENDING]
        //     ])->orderBy('transactions.id', 'DESC', )->get();

        //     $cartHistoryGrouped = $cartHistory->groupBy('transaction_id');

        //     // ON GOING
        //     $myReservations = Transaction::join('reservations', function($join){
        //         $join->on('transactions.id', '=', 'reservations.transaction_id');
        //     })->
        //     leftJoin('transaction_details', function($join){
        //         $join->on('transaction_details.transaction_id', '=', 'transactions.id');
        //     })->where([
        //         ['user_id', '=', $customerId],
        //         ['order_type', '=', self::ORDER_TYPE_RESERVATION],
        //         ['status', '=', self::TRANSACTION_STATUS_BOOKED],
        //         ['reservation_date', '>', Carbon::now()->format('Y-m-d 00:00:00')],
        //     ])->orderBy('reservations.reservation_date', 'ASC')->get();


        //     $myReservationsHistory = Transaction::join('reservations', function($join){
        //         $join->on('transactions.id', '=', 'reservations.transaction_id');
        //     })->
        //     leftJoin('transaction_details', function($join){
        //         $join->on('transaction_details.transaction_id', '=', 'transactions.id');
        //     })->where([
        //         ['user_id', '=', $customerId],
        //         ['order_type', '=', self::ORDER_TYPE_RESERVATION],
        //         ['reservation_date', '<', Carbon::now()->format('Y-m-d H:i:s')],
        //     ])->orderBy('reservations.reservation_date', 'DESC')->get();
        // }

        // $menu2 = DB::table('menu_items')
        // ->select('*','categories.name as c_name','menu_items.id as m_id','menu_items.name as m_name' )
        // ->join('categories','categories.id','=','menu_items.category_id')
        // ->where('menu_items.is_featured',1)
        // ->inRandomOrder()
        // ->paginate(6);

       
        $menu2 = DB::table('menu_items')
        ->select('*','menu_items.created_at as m_created_at','categories.name as c_name','menu_items.id as m_id','menu_items.name as m_name',
       'menu_items.user_id as s_id',  DB::raw('(SELECT COUNT(*) FROM likes WHERE likes.menu_item_id = menu_items.id AND likes.is_like = 1) as like_count',)  )
        ->join('categories','categories.id','=','menu_items.category_id')
        ->orderByDesc('like_count')
        // ->inRandomOrder()
        ->paginate(3);
            // dd($menu2);
        $menu3 = DB::table('menu_items')
        ->select('*','categories.name as c_name','menu_items.id as m_id','menu_items.name as m_name','menu_items.user_id as store_id'  )
        ->join('categories','categories.id','=','menu_items.category_id')

        ->where('menu_items.is_best_seller',1)
        ->inRandomOrder()
        ->paginate(6);

        $menu4 = DB::table('menu_items')
        ->select('*','menu_items.created_at as m_created_at','categories.name as c_name','menu_items.id as m_id','menu_items.name as m_name','menu_items.user_id as store_id'  )
        ->join('categories','categories.id','=','menu_items.category_id')
        ->orderBy('m_created_at','DESC')
        // ->inRandomOrder()
        ->paginate(6);
        // dd($menu2);
        if(Auth::check()){
            $customerId = Auth::user()->id;
        }
        $customerId = "";


        $cart = Transaction::join('transaction_items', function($join){
            $join->on('transactions.id', '=', 'transaction_items.transaction_id');
        })->
        leftJoin('menu_items as mi', function($join){
            $join->on('mi.id', '=', 'transaction_items.menu_item_id');
        })->where([
            ['transactions.user_id', '=', $customerId],
            ['transactions.status', '=', 0]
        ])
        ->orderBy('transactions.id', 'DESC')->get();


         // dd($cart->sum('price'));
        return [
            'is_logged_in' => (Auth::check()),
            'username' => (Auth::check()) ? 1 : '',
            'userId' => (Auth::check()) ? Auth::user()->name : '',
            'headerImages' => $headerImages,
            'menu' => $menu,
            'menu2' => $menu2,
            'menu3' => $menu3,
            'menu4' => $menu4,
            'gallery' => $gallery,
            'reviews' => $reviews,
            'categories' => $formattedCategories,
            'menuPerCategory' => $menuPerCategory,
            // with auth
            'cart' => $cart,
            'cartHistory' => $cartHistoryGrouped,
            'myReservations' => $myReservations,
            'cart' => $cart,
            'cart_grand_total' => $cart ? $cart->sum('price') : 0,
            'myReservationsHistory' => $myReservationsHistory
        ];
    }
}
