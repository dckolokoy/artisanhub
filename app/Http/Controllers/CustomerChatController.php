<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Career;
use App\Models\Chat;
use App\Models\MenuItem;
use App\Models\Category;
use Validator;
use Illuminate\Support\Facades\DB;
use Redirect,Response;

class CustomerChatController extends Controller
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

        $chats  = DB::table('chats')
        ->select('*')
        ->orderBy('id', 'desc')
        ->get();

        return view('pages\admin\chat\index',compact("chats"));
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
        $message = $request->message;
        $store_id = $request->store_id;
        $customer_id = $request->customer_id;
        $material_id = $request->material_id;
        $customer_reply = $request->customer_id;

        // insert data into the database
        $chat = new Chat;
        $chat->message = $message;
        // $chat->store_id = $store_id;
        $chat->customer_id = $customer_id;
        $chat->material_id = $material_id;

        $chat->store_id = $store_id;
        $chat->customer_reply = $customer_reply;
        $chat->save();
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
        $table  = Career::where($where)->first();

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
        $career = Career::findOrFail($id);

        $career->position = $request->input('position2');
        $career->address = $request->input('address2');
        $career->income = $request->input('income2');
        $career->type = $request->input('type2');
        $career->description = $request->input('description2');
        $career->status = $request->input('status2');

        if($request->hasfile('image2')){
            $file1 = $request->file('image2');
            $extension1 = $file1->getClientOriginalExtension();
            $origname = $file1->getClientOriginalName();
            $userKey =  auth()->user()->role().'-'.auth()->user()->id;
            $filename = $userKey.'menu-item-image'.time().'.'.$extension1;
            $filenameInTable = 'justnpot/images/menu/' . $userKey.'menu-item-image'.time().'.'.$extension1;
            $file1->move('justnpot/images/menu/', $filename);
            $career->image = $filenameInTable;
        }
        $career->save();

        return redirect('/admin/career')->with('success','New Career  successfully updated!');
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

    public function chat($var_store_id,$var_material_id)
    {


        $chats  = DB::table('chats')
        ->select('*')
        ->where('store_id','=',$var_store_id)
        ->orderBy('id', 'asc')
        ->get();

        $store_id = $var_store_id;
        $material_id = $var_material_id;


        return view('justnpot/customer/chat',compact("chats","store_id","material_id"));


    }

    public function section($material_id,$store_id,$customer_id)
    {


        // dd($material_id);

        $chats  = DB::table('chats')
        ->select('chats.*', 'users.picture as sender_name')
        ->join('users', 'users.id', '=', 'chats.store_id')
        ->orderBy('id', 'asc')
        ->where('store_id','=',$store_id)
        ->where('customer_id','=',$customer_id)
        ->get();


        return view('justnpot/customer/section',compact("chats"));


    }
}
