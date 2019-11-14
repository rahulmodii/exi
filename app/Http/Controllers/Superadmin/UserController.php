<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function create(){
        $data=User::where('role',2)->get();
        $trasheduser=User::onlyTrashed()->get();
        // dd($trasheduser);
        return view('superadmin.user.create')->with('data',$data)->with('trasheduser',$trasheduser);
    }

    public function store(Request $request){
        $pass=Hash::make($request->password);
        $create = User::create(['name'=>$request->name,'email'=>$request->email,'password'=>$pass,'role'=>2])->id;
        return  redirect()->back();
    }

    public function delete($id){
        User::destroy($id);
        return  redirect()->back();
    }

    public function restore($id){
        User::withTrashed()->where('id',$id)->restore();
        return redirect()->back();
    }

    public function edit($id){
       $data= User::find($id);
       return view('superadmin.user.edit')->with('data',$data);
    }

    public function update(Request $request){
        $aa= User::find($request->id)->update($request->all());
        return redirect('/superadmin/user');
    }

    public function permanentdelete($id){
        $aa= User::withTrashed()->where('id',$id)->forceDelete();
        return redirect('/superadmin/user');
    }
}
