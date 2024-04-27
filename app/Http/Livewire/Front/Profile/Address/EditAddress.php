<?php

namespace App\Http\Livewire\Front\Profile\Address;

use Livewire\Component;
use App\Models\Province;
use App\Models\City;
use App\Models\Address;
use Illuminate\Support\Facades\Auth;
use App\Rules\PostalCodeRule;

class EditAddress extends Component
{

    public $provinces;
    public $address;
    public $address_id;
    public $cities;
    public $user;

    public $province_id;
    public $city_id;
    public $mobile;
    public $plate_number;
    public $postal_code;
    public $address_description;
    public $recipient_first_name;
    public $recipient_last_name;

    public function mount(Address $address)
    {

        $this->address = $address;
        $this->address_id = $address->id;

        $this->province_id = $address->province_id;
        $this->city_id = $address->city_id;
        $this->mobile = $address->mobile;
        $this->plate_number = $address->plate_number;
        $this->postal_code = $address->postal_code;
        $this->recipient_first_name = $address->recipient_first_name;
        $this->recipient_last_name = $address->recipient_last_name;
        $this->address_description = $address->address_description;


        $this->provinces = Province::query()->select('id', 'name')->get();
        $this->cities = City::where('province_id', $this->province_id)->select('id', 'name')->get();
        $this->user = Auth::id();
    }


    public function UpdatedProvinceId()
    {

        $this->cities = City::where('province_id', $this->province_id)->select('id', 'name')->get();
    }

    // public function loadCities()
    // {
    //     $this->cities = City::where('province_id', $this->province_id)->select('id', 'name')->get();
    // }

    protected function rules()
    {
        return [

            'province_id' => ['required', 'exists:provinces,id'],
            'city_id' => ['required', 'exists:cities,id'],
            'mobile' => ['required', 'min:1', 'max:11'],
            'plate_number' => ['nullable', 'min:1', 'max:20'],
            'postal_code' => ['required', 'min:1', 'max:20', new PostalCodeRule()],
            'address_description' => ['required', 'min:10', 'max:1000'],
            'recipient_first_name' => ['required', 'min:2', 'max:64'],
            'recipient_last_name' => ['required', 'min:2', 'max:64'],
        ];
    }

    public function update()
    {

        $this->validate();

        try {

            $postal_code = convertPerToEnglish($this->postal_code);

            Address::where('id', $this->address_id)->update([
                'user_id' => Auth::id(),
                'province_id' => $this->province_id,
                'city_id' => $this->city_id,
                'mobile' => $this->mobile,
                'plate_number' => $this->plate_number,
                'postal_code' => $postal_code,
                'recipient_first_name' => $this->recipient_first_name,
                'recipient_last_name' => $this->recipient_last_name,
                'address_description' => $this->address_description,
            ]);

            session()->flash('success', __('messages.The_update_was_completed_successfully'));
            return redirect()->route('profile.address.index');

        } catch (\Exception $ex) {
            return view('errors_custom.model_store_error')->with(['error' => $ex->getMessage()]);
        }
    }

    public function render()
    {
        return view('livewire.front.profile.address.edit-address');
    }
}
