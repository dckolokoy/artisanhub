<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\MenuItem;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Redirect,Response;


class AccountController extends \App\Http\Controllers\Controller
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
            ->where('id','=',auth()->user()->id)
            ->paginate(10);
        return view('pages\member\account\index',compact("users"));
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
            'name' => ['nullable', 'string', 'max:255'],
            'email' => ['nullable', 'string', 'email', 'max:255', 'unique:users'],
            'password' =>  [
                'nullable',
                'min:8',
                'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-])/', 'confirmed'],
       
        ]);

        if($validator->fails()){

            return Redirect::back()->withErrors($validator);
        }else{
            $user = new User;
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));
            $user->role = 0;
            $user->save();
        }



        return redirect('/admin/client')->with('success','New client successfully added.');
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
        $validator = $request->validate([
            'name' => [ 'string', 'max:255'],
            'email' => ['nullable', 'email', \Illuminate\Validation\Rule::unique('users')->ignore(auth()->user()->id)],
            'password' =>  [
                'nullable',
                'min:8',
                'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-])/', 'confirmed'],
         
        ]);
  


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
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->address = $request->input('address');
        $user->mobile = $request->input('mobile');
        $user->gender = $request->input('gender');
        $user->age = $request->input('age');
        $user->birthdate = $request->input('birthdate');
        if($request->input('password')){
            $user->password = Hash::make($request->input('password'));
        }
        $menuItemQuery = MenuItem::where('user_id', $user->id);
        $menuItems = $menuItemQuery->get();
        foreach ($menuItems as $menuItem) {
            $menuItem->artist = $user->name;
            $menuItem->save();
        }
        $user->save();



        return redirect('/member/account')->with('success','Member successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    public function getCategories(){

        $data =  Category::all();

        return response()->json(['data' => $data]);
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
        return redirect('/member/account')->with('success','User successfully updated!');
    }
}
