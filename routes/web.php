<?php

use App\Mail\SendPost;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\PostNotificationController;
use App\Http\Controllers\Auth\UserRegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/dashboard', [DashboardController::class,'dashboard'])->name('dashboard');
// RouteBlade::component('package-name', PackageNameComponent::class);
Route::get('/login',[LoginController::class,'login'])->name('login');
Route::post('/login',[LoginController::class,'authenticate'])->name('authenticate');
Route::post('/logout',[LoginController::class,'logout'])->name('logout');
Route::get('/register',[UserRegisterController::class,'register'])->name('register');
Route::post('/register',[UserRegisterController::class,'store'])->name('store');
Route::get('/trashed/post/{post}',[PostController::class,'trashedPost'])->name('trashedPost');
Route::resource('posts',PostController::class);
Route::get('/posts/details/{id}',[DashboardController::class,'postDetails'])->name('postDetails');
Route::get('/posts/category/{category:name}',[DashboardController::class,'category'])->name('postsByCategory');
Route::get('/posts/user/{user:name}',[DashboardController::class,'postsByUser'])->name('postsByUser');

//Admin routes.
Route::get('/admin',[AdminController::class,'index']);

Route::get('/new',function(){
    return view('dashboard.new');
});

//Mailling routes
Route::get('/send/post', function(){
    Mail::to('zabihullahdanish01@gmail.com')->send(new SendPost());
    return new SendPost();
});

Route::get('/published',[PostNotificationController::class,'PostNotification']);

Route::fallback(function (){
    return view('auth.login');
});
