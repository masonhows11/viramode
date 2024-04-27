<?php

namespace App\Http\Livewire\Front\Profile\Address;

use Livewire\Component;
use App\Models\Province;
use Illuminate\Support\Facades\Auth;
use App\Rules\PostalCodeRule;
class CreateAddress extends Component
{

    public $provinces;
    public $user;

    public $province_id;
    public $city_id;
    public $plate_number;
    public $postal_code;
    public $address_description;
    public $recipient_first_name;
    public $recipient_last_name;

    public function mount()
    {

        $this->provinces = Province::all();
        $this->user = Auth::id();
    }

   
 
    protected function rules ()
    {
        return [

                'province_id' => ['required','exists:provinces,id'],
                'city_id' => ['required','exists:cities,id'],
                'mobile' => ['required','min:1','max:11'],
                'plate_number' => ['required','min:1','max:20'],
                'postal_code' => ['required','min:1','max:20',new PostalCodeRule()],
                'address_description' => ['required','min:10','max:1000'],
                'recipient_first_name' => ['required','min:2','max:64'],
                'recipient_last_name' => ['required','min:2','max:64'],
           
        ];
    } 

    public function save()
    {

    }

    public function render()
    {
        return view('livewire.front.profile.address.create-address');
    }
}
