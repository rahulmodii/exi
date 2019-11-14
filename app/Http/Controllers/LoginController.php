<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{

    public function loginview(){
        return view('common.login');
    }

    public function logout(){
        \Session::flush();
        \Session::regenerate();
        return redirect('/');
    }

    public function handellogin(Request $request){
       $check=Auth::attempt(['email' => $request->email, 'password' => $request->password]);
        if($check){
            if(auth()->user()->role==1){
                return redirect('/superadmin/user');
            }
            elseif (auth()->user()->role==2) {
                return redirect('/Artist/painting');
            }else{
                return redirect('/');
            }
        }else{
            return redirect('/');
        }
    }

    public function createuser(){
        User::create(['name'=>'rahul','email'=>'rmodi2407@gmail.com','password'=>\Hash::make('1234'),'role'=>1]);
    }
}
