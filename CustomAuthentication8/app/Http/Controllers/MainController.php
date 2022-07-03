<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash; //for password encryption

class MainController extends Controller
{
    function login(){
        return view('auth.login');
    }

    function register(){
        return view('auth.register');
    }
    function save(Request $request){
        //return $request->input();
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:5|max:12'
        ]);
        $admin = new Admin;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $save = $admin->save();
        if($save){
            return back()->with('success','New user has been successfully added to database');
        }else{
            return back()->with('fail','Something went wrong,try again later');
        }
    }
    function check(Request $request){
        //return $request->input();
        $request->validate([
            'email'=> 'required|email',
            'password'=> 'required|min:5|max:12'
        ]);
        $userInfo = Admin::where('email','=',$request->email)->first();
        // echo "<pre>";
        // print_r($userInfo);
        // die();
        if(!$userInfo){
            return back()->with('fail','We do not recognize your email address!');
        }else{
            // Check Password
            if(Hash::check($request->password,$userInfo->password)){
                $request->session()->put('LoggedUser',$userInfo->id);
                // $data = session()->all();
                // echo "<pre>";
                // print_r($data);
                // die();
                return redirect('admin/dashboard');
            }else{
                return back()->with('fail','Incorrect Password');
            }
        }
    }
    function logout(){
        if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect('/auth/login');
        }
    }
    function dashboard(){
        $data = ['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];
        // echo "<pre>";
        // print_r($data);
        // die();
        return view('admin.dashboard',$data); //eirokom kre krle dashboard e data print_r hbe na
        //return view('admin.dashboard',compact('data')); ////eirokom kre krle dashboard e data print_r hbe
    }
    function settings(){
        $data = ['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];
        return view('admin.settings',$data);
    }
    function profile(){
        $data = ['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];
        return view('admin.profile',$data);
    }
    function staff(){
        $data = ['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];
        return view('admin.staff',$data);
    }
    function request(){
        return view('password.reset');
    }   
}
