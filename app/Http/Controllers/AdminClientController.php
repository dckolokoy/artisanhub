<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Redirect,Response;


class AdminClientController extends Controller
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users  = DB::table('users')->orderBy('id', 'desc')
            ->where('role','=',0)
            ->paginate(10);
        return view('pages\admin\client\index',compact("users"));
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
            $user->status = 0;
            $user->role = 0;


            $user->save();




        return redirect('/admin/client')->with('success','New customer successfully added.');
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



            $user->save();



        return redirect('/admin/client')->with('success','Customer account successfully updated!');
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
$user->delete();
return redirect('/admin/client')->with('success','Customer account successfully deleted!');
    }

    public function getCategories(){

        $data =  Category::all();

        return response()->json(['data' => $data]);
    }
}
