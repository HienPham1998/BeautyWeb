<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\User;
use Auth;
use Redirect; 
use Illuminate\Support\MessageBag;


class LoginController extends Controller
{
    public function getLogin(){
        return view('client.login');
    }

    public function getRegister(){
     return view('client.register');
 }

 public function postRegister(Request $request) {
    $rules = [
         'username' => 'required|min:6',
         'email' => 'required|email|unique:users',
         'password' => 'required|confirmed|min:6'
     ];


     $validator = Validator::make($request->all(), $rules);

     if ($validator->fails()) {
         return redirect()->back()->withErrors($validator)->withInput();
     }

     $newUser = new User();
     $newUser->name = $request->username;
     $newUser->password = bcrypt($request->password);
     $newUser->email = $request->email;
     $newUser->phone = $request->phone;
     $newUser->address = $request->address;
     $newUser->role_id = 2;
     $newUser->save();

     return redirect('/login');

 }
    public function postLogin(Request $request){
     $rules=[
        'username'=> 'required',
        'password'=> 'required'
     ];
     $validator = Validator::make($request->all(),$rules);

     if($validator->fails()){
         return redirect()->back()->withErrors($validator)->withInput();
     }
     else{
         $username = $request->username;
         $password = $request->password;
         if( Auth::attempt(['name' => $username, 'password' =>$password])) {
             if(Auth::user()->role_id ==1 )
            {
                return redirect()->intended('/manage');
            }
             return redirect()->intended('/');
            
         }
         else {
             $errors = new MessageBag(['errorlogin' => 'Tên hoặc mật khẩu không đúng']);

             return redirect()->back()->withInput()->withErrors($errors);
         }
      }
    }
    public function logout() {
        Auth::logout();
        \Cart::destroy();
        return redirect("/");
    }
}
