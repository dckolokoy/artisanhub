<?php

namespace App\Http\Controllers\Member;
use Illuminate\Http\Request;
use App\Models\MenuItem;
use App\Models\SideBack;
use App\Models\Category;
use Validator;
use Illuminate\Support\Facades\DB;
use Redirect,Response;

class AdminProductController extends \App\Http\Controllers\Controller
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

        $menu_items  = DB::table('menu_items')
        ->select('menu_items.id as m_id',
                   'menu_items.user_id as m_user_id',
                 'menu_items.artist as m_artist',
                 'menu_items.name as m_name',
                 'menu_items.description as m_description',
                 'menu_items.image as m_image',
                 'menu_items.price as m_price',
                 'categories.name as c_name')
        ->join('categories','categories.id','=','menu_items.category_id')
        ->where('menu_items.user_id',auth()->user()->id)
        ->orderBy('m_id', 'desc')
        ->paginate(10);

        $categories  = DB::table('categories')
        // ->where('categories.user_id',auth()->user()->id)
        ->orderBy('id', 'desc')
        ->paginate(10);

        $product  = DB::table('menu_items')
        ->select('*')
        ->where('menu_items.user_id',auth()->user()->id)
        ->get();
        $product_count = $product->count();

        $payments  = DB::table('payments')
        ->select('*')
        ->where('user_id',auth()->user()->id)
        ->take(1)
        ->orderBy('id','DESC')
        ->get();

        return view('pages\member\product\index',compact("menu_items","payments","categories","product_count"));
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
    public function store(Request $request)
    {
        $menu_item = new MenuItem;
        $menu_item->category_id = $request->input('sel_category_id');
        $menu_item->name = $request->input('name');
        $menu_item->description = $request->input('description');
        $menu_item->price = $request->input('price');
        $menu_item->user_id = auth()->user()->id;
        $menu_item->artist = $request->input('artist');
        $db  = DB::table('categories')
        ->select('type')
        ->where('categories.id',$request->input('sel_category_id'))
        ->first();
      
        if($request->hasfile('image')){
            $file1 = $request->file('image');
            $extension1 = $file1->getClientOriginalExtension();
            $origname = $file1->getClientOriginalName();
            $userKey =  auth()->user()->role().'-'.auth()->user()->id;
            $filename = $userKey.'menu-item-image'.time().'.'.$extension1;
            $filenameInTable = 'justnpot/images/menu/' . $userKey.'menu-item-image'.time().'.'.$extension1;
            $file1->move('justnpot/images/menu/', $filename);
            $menu_item->image = $filenameInTable;
        }
        $menu_item->save();
        if ($request->hasfile('image2')) {
            $highestId = MenuItem::max('id');
        
            $sideback = new SideBack;
            $file3 = $request->file('image2');
            $extension3 = $file3->getClientOriginalExtension();
            $origname3 = $file3->getClientOriginalName();
            $userKey3 = auth()->user()->role() . '-' . auth()->user()->id;
            $filename3 = $userKey3 . 'menu-item-imageside' . time() . '.' . $extension3 . 'side';
            $filenameInTable1 = 'justnpot/images/menu/' . $filename3;
            $file3->move('justnpot/images/menu/', $filename3);
        
            $sideback->side_or_back = 0;
            $sideback->menu_item_id=$highestId;
            $sideback->image = $filenameInTable1;
            $sideback->save();
        }
        
        if ($request->hasfile('image3')) {
            $sideback1 = new SideBack;
            $highestId = MenuItem::max('id');
            $file2 = $request->file('image3');
            $extension2 = $file2->getClientOriginalExtension();
            $origname2 = $file2->getClientOriginalName();
            $userKey2 = auth()->user()->role() . '-' . auth()->user()->id;
            $filename2 = $userKey2 . 'menu-item-imageback' . time() . '.' . $extension2 . 'back';
       
            $filenameInTable2 = 'justnpot/images/menu/' . $filename2;
            $file2->move('justnpot/images/menu/', $filename2);
            $sideback1->side_or_back = 1;
            $sideback1->menu_item_id=$highestId;
            $sideback1->image = $filenameInTable2;
            $sideback1->save();
        }
        
     

        return redirect('/member/product')->with('success','Product successfully added!');
    }

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
        $where = array('id' => $id);
        $table  = MenuItem::where($where)->first();

        return Response::json($table);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $menu_item = MenuItem::findOrFail($id);
        $menu_item->category_id = $request->input('sel_category_id2');
        $menu_item->name = $request->input('name2');
        $menu_item->description = $request->input('description2');
        $menu_item->price = $request->input('price2');
        $menu_item->artist = $request->input('artist2');

        if($request->hasfile('image2')){
            $file1 = $request->file('image2');
            $extension1 = $file1->getClientOriginalExtension();
            $origname = $file1->getClientOriginalName();
            $userKey =  auth()->user()->role().'-'.auth()->user()->id;
            $filename = $userKey.'menu-item-image'.time().'.'.$extension1;
            $filenameInTable = 'justnpot/images/menu/' . $userKey.'menu-item-image'.time().'.'.$extension1;
            $file1->move('justnpot/images/menu/', $filename);
            $menu_item->image = $filenameInTable;
        }

        $menu_item->save();

        return redirect('/member/product')->with('success','Product successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MenuItem::destroy($id);
        return redirect('/member/product')->with('success','Product successfully deleted!');



    }
    public function search(Request $request)
    {
        if (isset($_GET['query'])) {
            $search_text = $_GET['query'];
            $banks = DB::table('banks')
            ->orderBy('id', 'desc')
            ->where('bank_name','LIKE','%'.$search_text.'%')
            ->paginate(10)
            ->withQueryString();
            return view('pages\admin\bank\index',compact("banks"));
        }else{
            echo "Error 404|Page Not Found!";
        }

    }
}
