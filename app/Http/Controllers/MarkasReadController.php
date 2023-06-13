<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MarkasReadController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id)
    { 
        $userUnreadNotification = auth()->user()
                                  ->unreadNotifications
                                  ->where('id', $id)
                                  ->first();
    
        if($userUnreadNotification) {
            $userUnreadNotification->markAsRead();
        }
     return back();
    }
    
}
