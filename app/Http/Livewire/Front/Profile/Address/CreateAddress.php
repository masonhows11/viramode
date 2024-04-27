<?php

namespace App\Http\Livewire\Front\Profile\Address;

use Livewire\Component;

class CreateAddress extends Component
{

    public $provinces;
    public $user;

    public function mount()
    {

        $this->provinces = Province::all();
        $this->user = Auth::id();
    }

    public function render()
    {
        return view('livewire.front.profile.address.create-address');
    }
}
