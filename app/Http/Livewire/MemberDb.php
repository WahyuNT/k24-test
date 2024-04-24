<?php

namespace App\Http\Livewire;

use App\Models\Member;
use Livewire\Component;

class MemberDb extends Component
{

    public $editdata = 'view';
    public $edifoto = false;
    public $newdata = [];
    public $member = null;


    public $photo;

    public $oldpass = null;

    protected $rules = [
        'newdata.email' => 'required|email',
        'newdata.password' => 'required|string|min:5',
        'newdata.no_hp' => 'required|numeric',
        'newdata.no_ktp' => 'required|numeric',
        'newdata.tanggal_lahir' => 'required|date',
        'newdata.jenis_kelamin' => 'required|string',
        'newdata.foto' => 'nullable|image|max:1048'
    ];

    public function mount($id)
    {
       if (session('role') == 'member' ) {
           $this->member = Member::where('id', session('member_id'))->first();
        
       }else{
           $this->member = Member::where('id', $id)->first();
        }
        $this->newdata = [
            'name' => $this->member->name,
            'email' => $this->member->email,
            'no_hp' => $this->member->no_hp,
            'no_ktp' => $this->member->no_ktp,
            'tanggal_lahir' => $this->member->tanggal_lahir,
            'jenis_kelamin' => $this->member->jenis_kelamin,
            'password' => $this->member->password,
        ];
    }


    public function render()
    {
    
        $data = $this->member;
        $editdata = $this->editdata;


        return view('livewire.member-db' , with([
            'editdata' => $editdata,
            'data' => $data,
        ]));
    }

    public function editdataTrue()
    {
     
        $this->editdata = 'editdata';
      
    }
    public function editdatapassword()
    {
     
        $this->editdata = 'password';
      
    }
    public function editDataFalse()
    {
        $this->editdata = 'view';
    }
    public function editfoto()
    {
        $this->editdata = 'editfoto';
    }

    public function nullAll()
    {
        $this->oldpass = null;
    }
    public function back()
    {
     
        $this->editdata = 'view';
        $this->nullAll();
        $this->newdata = [
            'name' => $this->member->name,
            'email' => $this->member->email,
            'no_hp' => $this->member->no_hp,
            'no_ktp' => $this->member->no_ktp,
            'tanggal_lahir' => $this->member->tanggal_lahir,
            'jenis_kelamin' => $this->member->jenis_kelamin,
            'password' => $this->member->password,
            
        ];
      
    }

    public function savedata()
    {
      

        $this->member->name = $this->newdata['name'];
        $this->member->email = $this->newdata['email'];
        $this->member->no_hp = $this->newdata['no_hp'];
        $this->member->no_ktp = $this->newdata['no_ktp'];
        $this->member->tanggal_lahir = $this->newdata['tanggal_lahir'];
        $this->member->jenis_kelamin = $this->newdata['jenis_kelamin'];
        $this->member->save();
        session()->flash('success', 'Data berhasil disimpan.');
     
        $this->editDataFalse();
        $this->nullAll();
    }

    public function checkOldPass() {

      
        if ($this->member->password == $this->oldpass) {
            $this->editdata = 'changepassword';
            $this->nullAll();
        }else{
            session()->flash('error', 'Password lama salah.');
        }
        
    }

    public function saveNewPassword()
    {
      
        $this->validate([
            'newdata.newpassword' => 'required|min:6',
            'newdata.newpassword_confirmation' => 'required|same:newdata.newpassword',
        ]);

        $this->member->password = $this->newdata['newpassword'];
        $this->member->save();

        session()->flash('success', 'Password berhasil diubah.');

        $this->editDataFalse();
        $this->nullAll();
    }
}
