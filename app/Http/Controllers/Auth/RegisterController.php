<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected function create(array $data)
    {
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

    protected function registered(Request $request, $user)
    {
        // Override the registered method to prevent automatic login
        // You can add any custom logic here
        return redirect()->route('login')->with('success', 'Registration successful! Please wait for the approval of the admin to be sent via email.');
    }

    public function register(Request $request)
    {
        // Validate the incoming registration request
        $this->validator($request->all())->validate();

        // Create the user
        event(new Registered($user = $this->create($request->all())));

        // Redirect the user to the login page with a success message
        return $this->registered($request, $user);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            // Define validation rules here
        ]);
    }
}
