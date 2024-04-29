<?php

namespace App\Http\Livewire\Front\Profile\Address;

use Livewire\Component;
use App\Models\Address;
use Illuminate\Support\Facades\Auth;

class IndexAddress extends Component
{

    public $user;
    public $address_id;
    public $current_id;

    public function mount()
    {
        $this->user = Auth::id();
    }

    public function deleteConfirmation($id)
    {
        $this->address_id = $id;

        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

    protected $listeners = [
        'deleteConfirmed' => 'deleteModel',
    ];

    public function deleteModel()
    {
        try {

            $model = Address::findOrFail($this->address_id);
            $model->delete();
            $this->dispatchBrowserEvent(
                'show-result',
                [
                    'type' => 'success',
                    'message' => __('messages.The_deletion_was_successful')
                ]
            );
        } catch (\Exception $ex) {
            return view('errors_custom.model_not_found');
        }
        return null;
    }

    public function status($id)
    {


        $address = Address::findOrFail($id);
            if ($address->is_active == 0) {
                $address->is_active = 1;
            } else {
                $address->is_active = 0;
            }
            $address->save();


        $this->dispatchBrowserEvent(
            'show-result',
            [
                'type' => 'success',
                'message' => __('messages.The_changes_were_made_successfully')
            ]
        );
    }


    public function render()
    {
        return view('livewire.front.profile.address.index-address')
            ->with(['addresses' => Address::where('user_id', $this->user)->get(), 'user' => $this->user]);
    }
}
