<?php

use App\Models\User;
use App\Notifications\TaskCompleted;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    // Send notification by mail
//    $delay = Carbon::now()->addSecond(10);
//    User::find(1)->notify((new TaskCompleted)->delay($delay));

//    $user = User::find(1);
//    Notification::send($user, new TaskCompleted);

//    $user = User::find(1);
//    $delay = Carbon::now()->addSecond(3);
//    Notification::route('mail', 'rajumondalr82@gmail.com')
//        ->notify((new TaskCompleted($user))->delay($delay));

    //send notification by database
    $user = User::find(1);
    User::find(1)->notify(new TaskCompleted);
    return view('welcome');
});

Route::get('marksAsRead', function (){
    auth()->user()->unreadNotifications->markAsRead();
    return redirect()->back();
})->name('markRead');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
