<?php

namespace App\Http\Livewire;

use App\Models\Member;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;
class Login extends Component
{


       
    public $daftar = null;
    public $dataMember = [];

    protected $rules = [
        'dataMember.email' => 'required|email|unique:members,email',
        'dataMember.password' => 'required|string|min:5',
        'dataMember.no_hp' => 'required|numeric',
        'dataMember.no_ktp' => 'required|numeric',
        'dataMember.tanggal_lahir' => 'required|date',
        'dataMember.jenis_kelamin' => 'required|string',
        'dataMember.foto' => 'nullable|image|mimes:jpg,jpeg,png|max:1048'
    ];


    public function render()
    {
        $daftar = $this->daftar;

        return view('livewire.login', with([
            'daftar' => $daftar
        ]));
    }

    public function daftarChange()
    {
      
        $this->daftar = 'daftar';
    }
    public function daftarNull()
    {
      
        $this->daftar = null;
    }

    public function daftar()
{
  
    $this->validate();

    Member::create([
      
        'name' => $this->dataMember['name'],
        'email' => $this->dataMember['email'],
        'password' => $this->dataMember['password'],
        'no_hp' => $this->dataMember['no_hp'],
        'no_ktp' => $this->dataMember['no_ktp'],
        'tanggal_lahir' => $this->dataMember['tanggal_lahir'],
        'jenis_kelamin' => $this->dataMember['jenis_kelamin'],
        'foto' => 'test',
    ]);

    Alert::success('Daftar Berhasil', 'Anda Berhasil Mendaftar Sebagai Member');

    
    return redirect()->route('login');
    $this->dataMember = [];
}
}
