<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Image;
// composer require intervention/image
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

   
 

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'type' => ['required'],
            'gender' => ['required'],
            'password' => [
                'required',
                'min:8',
                'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-])/',  'confirmed'],
            
            // password' => ['required', 'string', 'min:1', 'confirmed','regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/'],
            'image' => ['required'],
            'picture' => ['required'],
        ],
        [
            'password.regex' => 'Password not following correct format',
        ]
    );  
    }
    //  protected function failedValidation(Validator $validator)
    //  {
    //      return redirect()->back()->withErrors($validator);
    //  }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    
    protected function create(array $data)
    {
        // $request = app('request');
        //  if ($request->hasfile('image')) {
        // $avatar = $request->file('image');
        // $filename = time() . '.' . $image->getClientOriginalExtension();

        //Implement check here to create directory if not exist already

        // Image::make($avatar)->resize(300, 300)->save(public_path('uploads/image_id/' . $filename));

        $request = app('request');
        // $this->validator($data)->validate();
        if($request->hasfile('image')&&$request->hasFile('picture')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $origname = $file->getClientOriginalName();
            // $user1 = auth()->user()->name.'-'.auth()->user()->id;
            $filename = 'id-image'.time().'.'.$extension;
            $file->move('uploads/image_id/', $filename);
            $file1 = $request->file('picture');
            $extension1 = $file1->getClientOriginalExtension();
            $origname1 = $file1->getClientOriginalName();
            // $user1 = auth()->user()->name.'-'.auth()->user()->id;
            $filename1 = 'id-imageP'.time().'.'.$extension1;
            $file1->move('uploads/image_id/', $filename1);
        }
      


        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['type'],
            'status' => 0,
            'image' => $filename,
            'picture'=>$filename1,
            'is_verified' => 0,
            'address' => $data['address'],
            'mobile' => $data['mobile'],
            'age' => $data['age'],
            'birthdate' => $data['birthdate'],
            'gender' => $data['gender'],
        ]);
     

    }


}
