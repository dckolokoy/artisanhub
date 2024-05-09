<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuItem;
use App\Models\Category;
use App\Models\ActivityLog;
use App\Models\Notification;
use Validator;
use Illuminate\Support\Facades\DB;
use Redirect,Response;

class AdminNotificationController extends Controller
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

        $notifications  = DB::table('notifications')
        ->select('*','notifications.id as n_id')
        ->join('transactions','transactions.id','=','notifications.transaction_id')
        ->join('users','users.id','=','transactions.user_id')
        ->where('notifications.is_viewed',0)
        ->orderBy('notifications.id', 'desc')

        ->get();
      
        return view('pages.admin.notification.index',compact("notifications"));
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


        $lastid = $menu_item->id;

        $log = new ActivityLog;
        $log->user_id = auth()->user()->id;
        $log->role_id = auth()->user()->role;
        $log->table_name = "menu_items";
        $log->table_row_id = $lastid;
        $log->action = "Add New Menu Item";
        $log->original_value = "N/A";
        $log->updated_value = "N/A";
        $log->save();


        return redirect('/admin/menu-item')->with('success','Menu item successfully added!');
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
        $notification = Notification::findOrFail($id);
        $notification->is_viewed = 1;
        $notification->save();
       

        return redirect('/admin/alert')->with('success','Notification successfully read');
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

    public function sideMenu()
    {
        return view('pages.admin.notification.alert');
    }
}