<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuItem;
use App\Models\Category;
use Validator;
use Illuminate\Support\Facades\DB;
use Redirect,Response;

class SingleProductController extends Controller
{
    public function __construct()
    {

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $side="";
        $back="";
        $menu_items  = DB::table('menu_items')
        ->select('users.name as u_name',
                 'menu_items.id as m_id',
                 'menu_items.artist as m_artist',
                 'menu_items.name as m_name',
                 'menu_items.description as m_description',
                 'menu_items.image as m_image',
                 'menu_items.price as m_price',
                 'categories.name as c_name',
                 'categories.type as c_type')
        ->join('categories','categories.id','=','menu_items.category_id')
         ->leftJoin('users','users.id','=','menu_items.user_id')
        ->orderBy('m_id', 'asc')
        ->get();
        if($menu_items->type=='tangible'){
            $side=DB::table('side_backs')
            ->select('image as s_image')
            ->where('side_backs.side_or_back', 0)
            ->where('side_backs.menu_item_id', $menu_items->m_id)
            ->first();
            $back=DB::table('side_backs')
            ->select('image as b_image')
            ->where('side_backs.side_or_back', 2)
            ->where('side_backs.menu_item_id', $menu_items->m_id)
            ->first();
            }
        $categories = Category::all();
        return view('pages\justnpot\customer\single',compact("menu_items","categories", "side", "back"));
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
        $menu_item->artist = $request->input('artist');

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

        return redirect('/admin/product')->with('success','Menu item successfully added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $side="";
        $back="";
        $menu_items  = DB::table('menu_items')
        ->select('users.name as u_name',
                 'users.image as u_image',
                 'menu_items.id as m_id',
                 'menu_items.artist as m_artist',
                 'menu_items.name as m_name',
                 'menu_items.description as m_description',
                 'menu_items.image as m_image',
                 'menu_items.price as m_price',
                 'categories.name as c_name',
                 'categories.type as type')
        ->join('categories','categories.id','=','menu_items.category_id')
        ->leftJoin('users','users.id','=','menu_items.user_id')
        ->where('menu_items.id',$id)
        ->first();
      
        if($menu_items->type=='tangible'){
            $side=DB::table('side_backs')
            ->select('image as s_image')
            ->where('side_backs.side_or_back', 0)
            ->where('side_backs.menu_item_id', $menu_items->m_id)
            ->first();
            $back=DB::table('side_backs')
            ->select('image as b_image')
            ->where('side_backs.side_or_back', 1)
            ->where('side_backs.menu_item_id', $menu_items->m_id)
            ->first();
            }
     
        $categories = Category::all();

        return view('justnpot\customer\single',compact("menu_items","categories", "id", "side", "back"));


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

        return redirect('/admin/product')->with('success','Menu item successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Bank::destroy($id);
        return redirect('/bank')->with('success','Successfully Deleted!');

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
