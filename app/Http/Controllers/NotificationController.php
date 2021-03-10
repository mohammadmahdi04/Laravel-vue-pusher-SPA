<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function notifications()
    {
        $auth=auth()->loginUsingId(1);
        return [
            'read' => auth()->user()->readNotifications(),
            'unread'=>auth()->user()->unreadNotifications()
        ];
    }

    public function markAsRead(Request $request)
    {
        auth()->loginUsingId(1);
        return auth()->user()->markAsRead($request->id);
    }
}
