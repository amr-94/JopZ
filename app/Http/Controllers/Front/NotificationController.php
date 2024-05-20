<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function notify_as_read($id)
    {
        $notification = auth()->user()->notifications->find($id);
        $notification->markAsRead();
        return redirect($notification->data['url']);
    }
    public function Allnotifications()
    {
        $notifications = auth()->user()->notifications;
        return view('dashboard.notifications', compact('notifications'));
    }
    public function destroy($id)
    {
        $notification = auth()->user()->notifications->find($id);
        $notification->delete();
        return redirect()->back();
    }
    public function destroyall()
    {
        auth()->user()->notifications->delete();
        return redirect()->back();
    }
}