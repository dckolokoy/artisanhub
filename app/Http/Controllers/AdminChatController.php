<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Career;
use App\Models\MenuItem;
use App\Models\Category;
use Validator;
use Illuminate\Support\Facades\DB;
use Redirect,Response;

class AdminChatController extends Controller
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

        $careers  = DB::table('careers')
        ->select('*')
        ->orderBy('id', 'desc')
        ->get();

        return view('pages\admin\chat\index',compact("careers"));
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
        $career = new Career;
        $career->position = $request->input('position');
        $career->address = $request->input('address');
        $career->income = $request->input('income');
        $career->type = $request->input('type');
        $career->description = $request->input('description');
        $career->status = $request->input('status');

        if($request->hasfile('image')){
            $file1 = $request->file('image');
            $extension1 = $file1->getClientOriginalExtension();
            $origname = $file1->getClientOriginalName();
            $userKey =  auth()->user()->role().'-'.auth()->user()->id;
            $filename = $userKey.'menu-item-image'.time().'.'.$extension1;
            $filenameInTable = 'justnpot/images/menu/' . $userKey.'menu-item-image'.time().'.'.$extension1;
            $file1->move('justnpot/images/menu/', $filename);
            $career->image = $filenameInTable;
        }
        $career->save();

        return redirect('/admin/career')->with('success','New Career  successfully added!');
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
}
