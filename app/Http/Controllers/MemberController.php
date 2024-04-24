<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class MemberController extends Controller
{
    public function index()
    {
        if (session('role') != 'member') {
            return redirect()->route('admin');
         }
        return view('pages.member.index');
    }


    public function storeMemberFoto(Request $request)
    {
        $request->validate([
            'foto' => 'required|image|max:1048',
        ]);
        
        $member = Member::where('id', session('member_id'))->first();

        $fotolamaPath = public_path('assets/images/profile/' . $member->foto);

        if (file_exists($fotolamaPath)) {
            unlink($fotolamaPath);
        }
        
     

        $file = $request->file('foto');


        $nama_file = time() . '_' . $file->getClientOriginalName();
    
        $path = $file->move(public_path('assets/images/profile'), $nama_file);
  

        $member->foto = $nama_file;
        $member->save();
       
  
        session()->flash('success', 'Foto berhasil diperbarui!');

        return back();
    }
    public function storeMemberFotoAdmin(Request $request,$id)
    {

        $request->validate([
            'foto' => 'required|image|max:1048',
        ]);

        $member = Member::where('id',$id)->first();

        $fotolamaPath = public_path('assets/images/profile/' . $member->foto);

        if (file_exists($fotolamaPath)) {
            unlink($fotolamaPath);
        }
        
       
        $file = $request->file('foto');


        $nama_file = time() . '_' . $file->getClientOriginalName();
    
        $path = $file->move(public_path('assets/images/profile'), $nama_file);
  

        $member->foto = $nama_file;
        $member->save();
       
  
        session()->flash('success', 'Foto berhasil diperbarui!');

        return back();
    }

}
