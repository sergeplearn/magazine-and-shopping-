<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;


//use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;

class NotificationController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function unread($id, Request $request)
    {

        $id = request('id');
        $user = \App\User::find($id);
        $count = 0;

        $unread = $user->unreadNotifications;
        return view('notification.admin.unreadnewuser',compact('unread'));
    }

    public function read($id, Request $request)
    {

        $id = request('id');
        $userUnreadNotification = auth()->user()
            ->unreadNotifications
            ->where('id', $id)
            ->first();
        if($userUnreadNotification) {
            $userUnreadNotification->markAsRead();
        }

        return redirect()->back();
    }


}
