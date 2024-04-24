<?php

namespace App\Http\Controllers;

use App\Models\Admin;
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
            Session::put('admin_foto', $data->foto);
            Session::put('admin_nama', $data->nama_lengkap);
            Session::put('admin_username', $data->username);
            Session::put('role', 'admin');

            Alert::success('Login Berhasil', 'Anda Berhasil Login Sebagai Admin');

            return redirect()->route('index');
        }else{
            Alert::error('Login Gagal', 'Password atau Username Salah');
            return redirect()->back();
        }

    }

    public function logout(){
        // return 'berhasil woi';
        Session::flush();
        Alert::info('Logout', 'Anda Berhasil Logout');
        return redirect()->back();

    }
}
