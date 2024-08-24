<?php

use App\Http\Controllers\HomeController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// HOME
Route::get('/', [HomeController::class, 'homeView'])->name('home');

// Register
Route::get('/register', [UserController::class, 'registerView'])->name('register');
Route::post('/register', [UserController::class, 'registerStore']);

Route::get('/register2', [UserController::class, 'registerView2'])->name('register2');
Route::post('/register2', [UserController::class, 'registerStore2']);

// Login
Route::get('/login', [UserController::class, 'loginView'])->name('login');
Route::post('/login', [UserController::class, 'loginAuth']);

//Search and Filter
Route::get('/search', [HomeController::class, 'search'])->name('search');

// Language
// Route::get('lang/{locale}', [UserController::class, 'changeLanguage'])->name('lang.switch');
Route::get('/locale/{loc}', function ($loc) {
    Session::put('locale', $loc);
    return redirect()->back();
})->name('lang.switch');




Route::group(['middleware' => ['auth']], function () {
    // Logout
    Route::post('/logout', [HomeController::class, 'logout'])->name('logout');
});

Route::group(['middleware' => ['auth', 'CheckPaid']], function () {
    // Logout
    Route::post('/logout', [HomeController::class, 'logout'])->name('logout');

    // User Detail
    Route::get('/user/{id}', [HomeController::class, 'userDetailView'])->name('user.detail');

    // Follow and Unfollow
    Route::post('/follow/{id}', [UserController::class, 'follow'])->name('follow');
    Route::post('/unfollow/{id}', [UserController::class, 'unfollow'])->name('unfollow');


    // Friend
    Route::get('/friends', [HomeController::class, 'friends'])->name('friends');
    // Profile
    Route::get('/profile', [HomeController::class, 'profile'])->name('profile');

    // Notification
    Route::get('/notification', [UserController::class, 'userNotification'])->name('notification');

    // Call
    Route::get('/call/{id}', [UserController::class, 'callWithFriend'])->name('call');

});