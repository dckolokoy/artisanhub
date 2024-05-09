<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;
use Exception;
use Twilio\Rest\Client;
use App\Models\transaction_items;

class AdminDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $merchants = Merchant::paginate(10)->orderBy('id', 'desc');
        //$merchants  = DB::table('merchants')->orderBy('id', 'desc')->paginate(10);


        $membership  = DB::table('payments')
        ->select('*')
        ->where('payment_type','!=',NULL)
        ->get();
        $starter='Starter';
        $basic='Basic';
        $professional='Professional';
        $datamember = "";
        $starter_count = DB::table('payments')->where('payment_type', 0)->count();
        $basic_count = DB::table('payments')->where('payment_type', 1)->count();
        $professional_count = DB::table('payments')->where('payment_type', 2)->count();
        $datamember.="['".$starter."', ".$starter_count."],";
        $datamember.="['".$basic."', ".$basic_count."],";
        $datamember.="['".$professional."', ".$professional_count."],";
        $chartmember=$datamember;
        $membership_count = $membership->count();
  
        $product  = DB::table('menu_items')
        ->select('*')
        ->where('menu_items.user_id','!=','1')
        ->get();
        $product_count = $product->count();

    

        $transaction  = DB::table('transactions')
        ->select('*')

        ->get();
      
    $sumByMenuItem = DB::table('transaction_items')
    ->join('menu_items', 'menu_items.id', '=', 'transaction_items.menu_item_id')
    
    ->groupBy('transaction_items.menu_item_id')
    ->select(
        'transaction_items.menu_item_id',
        DB::raw('SUM(transaction_items.amount) as total_amount'),
        'menu_items.artist as artist',
        'menu_items.name as m_name'
    )
    ->where('transaction_items.status',1)
    ->orWhere('transaction_items.status',3)
    ->orWhere('transaction_items.status',5)
    ->orWhere('transaction_items.status',6)
    ->orWhere('transaction_items.status',8)
    ->orderBy('total_amount', 'desc')
    ->take(3)
    ->get();
    
  
        $data6 = array(array('Artwork', 'Total Sales', array('role' => 'annotation')));
        foreach($sumByMenuItem as $val) {
            $data6[] = array($val->m_name ."\n"  . $val->artist, intval($val->total_amount), $val->total_amount);
         }

$chartData6 = json_encode($data6);
   
        $likes = DB::select("SELECT COUNT(*) as total_like,menu_item_id,menu_items.name as m_name,menu_items.artist as artist FROM `likes`
        JOIN menu_items ON menu_items.id = likes.menu_item_id
        Where is_like = 1 group BY menu_item_id ORDER BY total_like DESC LIMIT 3");
$data = array(array('Artwork', 'Likes', array('role' => 'annotation')));
foreach($likes as $val) {
   $data[] = array($val->m_name ."\n"  . $val->artist, intval($val->total_like), $val->total_like);
}
$chartData3 = json_encode($data);

 $total_user_per_month1 = DB::table('login_counts')
    ->select(DB::raw('COUNT(*) as total_logins, COUNT(DISTINCT user_id) as unique_users, DATE(date_login) as date'))
    ->where('date_login', '<=', DB::raw('CURDATE()'))
    ->groupBy('date')
    ->get()
    ->avg('total_logins', 2);

        // dd($likes );

        $transaction_count = DB::table('transactions')
        ->whereYear('created_at', '<=', date('Y'))
        ->whereMonth('created_at', '<=', date('m'))
        ->count();
        $transactions = DB::table('transactions')
        ->whereYear('created_at', '<=', date('Y'))
        ->whereMonth('created_at', '<=', date('m'))
        ->get();
    
    $total_transactions = count($transactions);
    $total_days = date('t'); // Get the number of days in the current month
    
    $average = $total_transactions / $total_days;
        // $result = DB::select(DB::raw("SELECT count(*) as total,gender from users where role!=1   GROUP BY gender"));
        // $data = "";
        // foreach($result as $val) {
        //     if($val->gender == 0){
        //         $gender = 'Male';
        //     }else{
        //         $gender = 'Female';
        //     }
        //     $data.="['".$gender."', ".$val->total."],";
        // }
        // $chartData = $data;

        $result1 = DB::select("SELECT categories.name as cname, COUNT(menu_items.category_id) as count_category_id 
        FROM `menu_items`
        JOIN categories ON menu_items.category_id = categories.id
        GROUP BY categories.name");
        $data1 = "";
        foreach($result1 as $val) {
          
            $data1.="['".$val->cname."', ".$val->count_category_id."],";
        }
        $chartData2 = $data1;
        $total_sales = DB::table('transaction_items')
        ->where('transaction_items.status',1)
        ->orWhere('transaction_items.status',3)
        ->orWhere('transaction_items.status',5)
        ->orWhere('transaction_items.status',6)
        ->orWhere('transaction_items.status',8)
        ->sum('amount');
       
        $totalSalesPerMonth = DB::table('transaction_items')
    ->select(DB::raw('SUM(amount) as total_amount'), DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'))
    ->where('transaction_items.status',1)
    ->orWhere('transaction_items.status',3)
    ->orWhere('transaction_items.status',5)
    ->orWhere('transaction_items.status',6)
    ->orWhere('transaction_items.status',8)
    ->groupBy('month')
    ->get();
    // dd($totalSalesPerMonth);
$sales_per_month=[];
if ($totalSalesPerMonth!=[]) {
    foreach ($totalSalesPerMonth as $data) {
        $date = $data->month;
        $amount = $data->total_amount;
        $sales_per_month[] = [
            "y" => $amount,
            "label" => $date
        ];
    }
} else {
    $sales_per_month[] = [
        "y" => 0,
        "label" => ""
    ];
}
// dd($sales_per_month);
        $user_count1 = DB::table('users')
        ->where('users.role', '!=', '1')
        ->whereNotNull('users.image')
        ->count();  
        $dataMenu1  = DB::table('menu_items')
        ->select('*')
        ->get();
        $dataMenu=0;
        $dataMenu = $dataMenu1->count();
        return view('pages\admin\dashboard\index',compact("chartmember", "chartData2","sales_per_month", "chartData6", "dataMenu","chartData3","membership_count","total_sales","product_count","user_count1","transaction_count","average", "total_user_per_month1"));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // 

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function search(Request $request)
    {
        if (isset($_GET['query'])) {
            $search_text = $_GET['query'];
            // $merchants = Merchant::where('first_name','LIKE','%'.$search_text.'%')->paginate(2);
            $merchants = DB::table('merchants')
            ->orderBy('id', 'desc')
            ->where('first_name','LIKE','%'.$search_text.'%')
            ->paginate(10)
            ->withQueryString();
            return view('pages\admin\merchant\index',compact("merchants"));
        }else{
            echo "Error 404|Page Not Found!";
        }

    }

    public function getproducts(Request $request)
    {

        $test  = DB::table('product')
        ->select('product.product_name as p_name','product.id as p_id','product.amount as p_amount',
                 'merchants.id as m_id','merchants.first_name as m_fname')
        ->join('merchants','merchants.id','=','product.merchant_id')
        ->where('product.merchant_id', $request->input('id'))
        ->paginate(8);
        return response()->json($test, 200);
    }






}
