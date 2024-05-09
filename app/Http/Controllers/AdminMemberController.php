<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Payment;
use App\Models\MenuItem;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Redirect,Response;


class AdminMemberController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users  = DB::table('users')->orderBy('id', 'desc')
            ->where('role','=',2)
            ->paginate(10);
        return view('pages\admin\member\index',compact("users"));
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
        // $validator = Validator::make($request->all(), [
        //     'password' => 'required|min:8|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-])/',
        // ]);
        // if ($validator->fails()) {
        //     return Redirect::back()->withErrors($validator);
        // }

        
        $user = new User;
        if($request->hasfile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $origname = $file->getClientOriginalName();
            // $user1 = auth()->user()->name.'-'.auth()->user()->id;
            $filename = 'id-image'.time().'.'.$extension;
            $file->move('uploads/image_id/', $filename);
            $user->picture = $filename;

        }

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));

        $user->is_verified = 1;
        $user->mobile = $request->input('mobile');
        $user->address = $request->input('address');
        $user->age = $request->input('age');
        $user->birthdate = $request->input('birthdate');
        $user->gender = $request->input('gender');
        $user->role = 2;


        $user->save();



        return redirect('/admin/member')->with('success','New member successfully added.');
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
        $user  = User::where($where)->first();

        return Response::json($user);
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
       

        $user = User::findOrFail($id);
        if($request->hasfile('image2')){
            $file = $request->file('image2');
            $extension = $file->getClientOriginalExtension();
            $origname = $file->getClientOriginalName();
            // $user1 = auth()->user()->name.'-'.auth()->user()->id;
            $filename = 'id-image'.time().'.'.$extension;
            $file->move('uploads/image_id/', $filename);
            $user->picture = $filename;

        }

        $user->name = $request->input('name2');
        $user->email = $request->input('email2');
        $user->password = Hash::make($request->input('password2'));

        $user->is_verified = 1;
        $user->mobile = $request->input('mobile2');
        $user->address = $request->input('address2');
        $user->age = $request->input('age2');
        $user->birthdate = $request->input('birthdate2');
        $user->gender = $request->input('gender2');
        $user->status = 0;
        $menuItemQuery = MenuItem::where('user_id', $user->id);
        $menuItems = $menuItemQuery->get();
        foreach ($menuItems as $menuItem) {
            $menuItem->artist = $user->name;
            $menuItem->save();
        }


        $user->save();



        $user->save();


        return redirect('/admin/member')->with('success','Member account successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $payments = Payment::where('user_id',$id)->get();
        $menu = MenuItem::where('user_id', $id)->first();

        if(is_null($menu)){
            if($payments == '[]'){
            
                $user->delete();
            }
            else{ 
                $payments->delete();
       
            $user->delete();
            }
        }
   else{
    if($payments == '[]'){
        $menu->delete();
        $user->delete();
    }
    else{ 
        $payments->delete();
    $menu->delete();
    $user->delete();
    }
}

return redirect('/admin/member')->with('success','Member account successfully deleted!');

    }

    public function getCategories(){

        $data =  Category::all();

        return response()->json(['data' => $data]);
    }
}
