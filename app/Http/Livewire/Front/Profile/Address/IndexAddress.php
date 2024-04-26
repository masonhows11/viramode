<?php

namespace App\Http\Livewire\Front\Profile\Address;

use Livewire\Component;
use App\Models\Province;
use App\Models\Address;
use Illuminate\Support\Facades\Auth;

class IndexAddress extends Component
{
    public $provinces;
    public $user;
    public $addresses;

    public function mount(){

        $this->provinces = Province::all();
        $this->user = Auth::id();
        $this->addresses = Address::where('user_id',$this->user)->get();
    }


    public function render()
    {
        return view('livewire.front.profile.address.index-address')
        ->with(['provinces' => $this->provinces  , 'addresses' => $this->addresses , 'user' => $this->user]);
    }
}
