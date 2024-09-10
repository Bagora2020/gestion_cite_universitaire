<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Notification;

class NotificationController extends Controller
{
    public function markAsRead($id)
{
    $notification = Notification::findOrFail($id);
    $notification->update(['read' => true]);

    return response()->json(['status' => 'success']);
}

public function markAllAsRead()
{
    Notification::where('read', false)->update(['read' => true]);

    return response()->json(['status' => 'success']);
}

}
