<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        if (session('role') != 'admin') {
            return redirect()->route('member');
         }
        return view('pages.admin.index');
    }
    public function dataMember()
    {
        $member = Member::all();
        return view('pages.admin.data-member')->with([
            'member' => $member
        ]);
    }

    public function storeAdminFoto(Request $request)
    {

        $admin = Admin::where('id', session('admin_id'))->first();

        $request->validate([
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $file = $request->file('foto');

        $fotolamaPath = public_path('assets/images/profile/' . $admin->foto);

        if (file_exists($fotolamaPath)) {
            unlink($fotolamaPath);
        }

        $nama_file = time() . '_' . $file->getClientOriginalName();
    
        $path = $file->move(public_path('assets/images/profile'), $nama_file);
  

        $admin->foto = $nama_file;
        $admin->save();
       
  
        session()->flash('success', 'Foto berhasil diperbarui!');

        return back();
    }
    public function editDataMember($id){
        $member = Member::where('id', $id)->first();
        return view('pages.admin.edit-data-member')->with([
            'member' => $member
        ]);
    }
}
