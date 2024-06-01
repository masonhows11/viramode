<?php

namespace App\Http\Livewire\Admin\Notification;


use Livewire\Component;
use App\Models\Notification;

class NewOrdersNotification extends Component
{
    public function render()
    {
        return view('livewire.admin.notification.new-orders-notification')
        ->with([ 'notifications' => Notification::where('read_at', 0)->where('notifiable_id','App\Models\Order')->get() ]);
    }
}
