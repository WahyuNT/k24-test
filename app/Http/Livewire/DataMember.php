<?php

namespace App\Http\Livewire;

use App\Models\Member;
use Livewire\Component;

class DataMember extends Component
{
    public $search = '';
    public function render()
    {
        $data = Member::where('name', 'like', '%'.$this->search.'%' )
        ->when($this->search, function($query){
            $query->where('name', 'like', '%'.$this->search.'%')
            ->orWhere('email', 'like', '%'.$this->search.'%')
            ->orWhere('no_hp', 'like', '%'.$this->search.'%')
            ->orWhere('no_ktp', 'like', '%'.$this->search.'%')
            ->orWhere('tanggal_lahir', 'like', '%'.$this->search.'%');
        })
      
       ->get();

        return view('livewire.data-member' , with([
            'data' => $data
        ]));
    }
}
