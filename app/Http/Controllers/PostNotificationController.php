<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Notifications\PostPublished;
use Illuminate\Notifications\Notifiable;

class PostNotificationController extends Controller
{
    public function PostNotification()
    {
        $user = User::first();
        $published = [
            'title' => 'Latest info about Laravel',
            'body' => 'Laravel 9 is comming in 2022',
            'url' => url('/'),
            'ourSite' => 'Wisit our site',
            'siteLink' => url('https://property.khc.af'),
            'thanks' => 'Thanks for your attention'
        ];

        $user->notify(new PostPublished($published));
    }
}
