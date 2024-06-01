<?php

namespace App\Http\Livewire\Admin\Notification;

use Livewire\Component;
use App\Models\Comment;

class CommentsNotification extends Component
{

    public function render()
    {
        return view('livewire.admin.notification.comments-notification')->with(
            ['unseenComments' => Comment::where('seen', 0)->get(),]
        );
    }
}
