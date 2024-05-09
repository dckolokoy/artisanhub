<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\transaction_items;
use App\Models\Transaction;
use App\Models\MenuItem;
use App\Models\Category;
use Validator;
use Illuminate\Support\Facades\DB;
use Redirect,Response;

class AddCartController extends Controller
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
        $transaction_items  = DB::table('transaction_items')
        ->select('transaction_items.id as t_id','menu_items.name as m_name','menu_items.price as m_price','menu_items.image as m_image','transaction_items.quantity as t_quantity')
        ->join('menu_items','menu_items.id','=','transaction_items.menu_item_id')
        ->where('transaction_items.user_id','=',auth()->user()->id)
        ->where('transaction_items.transaction_id','=',NULL)
        ->orderBy('transaction_items.id', 'asc')
        ->paginate(10);


        return view('justnpot\customer\main-cart',compact("transaction_items"));
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

        $validator = Validator::make($request->all(), [
            'menu_item_id'=> 'required',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }
        else
        {
            $transaction_item = new transaction_items;
            $transaction_item->menu_item_id = $request->input('menu_item_id');
            $transaction_item->quantity = 1;
            $transaction_item->user_id = auth()->user()->id;
            $transaction_item->save();

            return response()->json([
                'status'=>200,
                'message'=>'Added to cart successfully.'
            ]);
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->status = $request->input('status');
        $transaction->save();
        $route = $request->input('route');
        return redirect('/admin/transaction/'.$route)->with('success','Transaction status successfully updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        transaction_items::destroy($id);
        return redirect('/customer/my-cart')->with('success','Successfully Deleted!');

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

 
    public function getOrderItem($id)
    {
        // $data = cart_list::where('customer_id',$customer_id)->get();
        // Log::info(json_encode($data));
        $data = DB::table('transaction_items')
            ->select('*')
            ->join('menu_items','menu_items.id','=','transaction_items.menu_item_id')
            ->where('transaction_items.transaction_id',$id)
            ->get();
        return response()->json(['data' => $data]);

        // $data = cart_list::all();
        // return response()->json([
        //     'data'=>$data,
        // ]);
    }
}
