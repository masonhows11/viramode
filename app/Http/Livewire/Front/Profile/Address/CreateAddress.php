<?php

namespace App\Http\Livewire\Front\Profile\Address;

use Livewire\Component;
use App\Models\Province;
use App\Models\City;
use App\Models\Address;
use Illuminate\Support\Facades\Auth;
use App\Rules\PostalCodeRule;

class CreateAddress extends Component
{

    public $provinces;
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

    public function mount()
    {

        $this->provinces = Province::query()->select('id', 'name')->get();
        $this->cities = collect();
        $this->user = Auth::id();
    }


    public function UpdatedProvinceId()
    {

        $this->cities = City::where('province_id', $this->province_id)->select('id', 'name')->get();
    }



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

    public function save()
    {

        $this->validate();

        try {

             $userAddress = auth()->user()->addresses()->count();

             if($userAddress > 4)
             {
                session()->flash('success', 'کاربر عزیز فقط تعداد 4 آدرس می توانید داشته باشید.');

                return redirect()->route('profile.address.index');
             }

            $postal_code = convertPerToEnglish($this->postal_code);

            Address::create([
                'user_id' => Auth::id(),
                'province_id' => $this->province_id,
                'city_id' => $this->city_id,
                'mobile' => $this->mobile,
                'plate_number' => $this->plate_number,
                'postal_code' => $postal_code,
                'recipient_first_name' => $this->recipient_first_name,
                'recipient_last_name' => $this->recipient_last_name,
                'address_description' => $this->address_description,
                'is_active' => 0,
            ]);

            session()->flash('success', __('messages.New_record_saved_successfully'));
            return redirect()->route('profile.address.index');
        } catch (\Exception $ex) {
            return view('errors_custom.model_store_error')->with(['error' => $ex->getMessage()]);
        }
    }

    public function render()
    {
        return view('livewire.front.profile.address.create-address');
    }
}
