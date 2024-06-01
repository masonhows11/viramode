<?php

namespace App\Http\Livewire\Admin\Notification;

use Livewire\Component;
use App\Models\Notification;

class MessagesNotification extends Component
{
    public function render()
    {
        return view('livewire.admin.notification.messages-notification')
        ->with(['notifications' => Notification::where('read_at', 0)->get() ]);
    }
}
