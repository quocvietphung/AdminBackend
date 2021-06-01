<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session ;


class AdminController extends Controller
{
    public function authLogin() {
        $adminId = Session::get('adminId');
        if ($adminId){
            return Redirect::to('/dashboard');
        }else{
            return Redirect::to('/admin')->send();
        }
    }

    public function admin() {
      //  $this->authLogin();
        return view('backend/adminLogin');
    }

    public function dashboard(Request $request)  {
        $adminEmail = $request->input('adminEmail');
        $adminPassword = $request->input('adminPassword');
        $result = DB::table('tb1Admin')
            ->where('adminEmail',$adminEmail)
            ->where('adminPassword',$adminPassword)
            ->first();
        if ($result) {
            Session::put('adminName',$result->adminName);
            Session::put('adminId',$result->adminId);
            return view('backend/dashboard') ;
        }else{
            Session::put('message','Mật khẩu hoặc tài khoản bị sai');
            return Redirect::to('/admin') ;
        }
    }

    public function showDashboard()  {
        return view('backend/dashboard') ;
    }

    public function logout() {
        Session::put('adminName',null);
        Session::put('adminId',null);
        return Redirect::to('/admin') ;
    }
}
