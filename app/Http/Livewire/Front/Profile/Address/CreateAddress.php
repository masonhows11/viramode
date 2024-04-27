<?php

namespace App\Http\Livewire\Front\Profile\Address;

use Livewire\Component;
use App\Models\Province;
use Illuminate\Support\Facades\Auth;

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
