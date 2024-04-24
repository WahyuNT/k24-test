<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    public function index()
    {
        $login = Session::get('role');

        if ($login == null) {
            return view('pages.login');
        } else {
            return redirect()->route('index');
        }
     
    }


    public function loginAdmin()
    {
        $username = request()->username;
        $password = request()->password;

        $data =  Admin::where('username', $username)->where('password', $password)->first();
        if($data){
            Session::put('admin_id', $data->id);
   
            Session::put('role', 'admin');

            Alert::success('Login Berhasil', 'Anda Berhasil Login Sebagai Admin');

            return redirect()->route('admin');
        }else{
            Alert::error('Login Gagal', 'Password atau Username Salah');
            return redirect()->back();
        }

    }
    public function loginMember()
    {
        $email = request()->email;
        $password = request()->password;

        $data =  Member::where('email', $email)->where('password', $password)->first();
        if($data){
            Session::put('member_id', $data->id);
   
            Session::put('role', 'member');

            Alert::success('Login Berhasil', 'Anda Berhasil Login ');

            return redirect()->route('member');
        }else{
            Alert::error('Login Gagal', 'Password atau Username Salah');
            return redirect()->back();
        }

    }

    public function logout(){
    
        Session::flush();
        Alert::info('Logout', 'Anda Berhasil Logout');
        return redirect()->back();

    }
}
