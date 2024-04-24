<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Login extends Component
{

    public $daftar = null;

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
}
