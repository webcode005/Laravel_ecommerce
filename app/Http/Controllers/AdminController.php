<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
   
    public function index(Request $request)
    {
        
        if($request->session()->has('ADMIN_LOGIN'))
        {
            return redirect('admin/dashboard');

        }
        else
        {
            $request->session()->flash('error','Access Denied');
            // return redirect('admin');
            return view('admin.index');

        }
        
        
         return view('admin.index');
    }   

    public function auth(Request $request)
    {
        $email=$request->post('email');
        $password=$request->post('password');

            $result = Admin::where(['email'=>$email])->first();


        if(isset($result))
        {

            if(Hash::check($password,$result->password))
            {
                $request->session()->put('ADMIN_LOGIN','true');
                $request->session()->put('ADMIN_ID',$result->id);
                return redirect('admin/dashboard');
            }
            else
            {
                $request->session()->flash('error','Please Enter Correct Password');
                return redirect('admin');
            }

            
        }
        else
        {
            $request->session()->flash('error','Please Enter Correct Login Details');
            return redirect('admin');

        }


    }

   

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function logout()
    {
        
        session()->forget('ADMIN_LOGIN','true');
        session()->forget('ADMIN_ID');
        session()->flash('error','You Have Successfully Logout');
        return redirect('admin');
    }


    // public function category()
    // {
    //     return view('admin.category');
    // }


    // public function updatepassword()
    // {
    //     $r= Admin::find(1);
    //     $r->password=Hash::make('basant');
    //     $r->save();
    // } 

 
}
