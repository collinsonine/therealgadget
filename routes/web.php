<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogicController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\User\UserController;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::middleware(['guest'])->group(function () {
    Route::controller(CarController::class)->group(function(){
        Route::get('cars', 'index')->name('cars.index');
        Route::get('car/{id}/info', 'carinfo')->name('car.info');
    });
    Route::controller(LoginController::class)->group(function(){
    Route::get('register', 'register')->name('register');
    Route::post('register', 'doregister')->name('doregister');
    Route::get('login', 'login')->name('login');
    Route::post('login', 'dologin')->name('dologin');
    });

    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('comments', [HomeController::class, 'comment'])->name('comment.all');
    Route::post('post-comment', [HomeController::class, 'postcomment'])->name('comment.post');
    Route::get('delete-comment/{id}', [HomeController::class, 'deletecomment'])->name('comment.delete');

});

Route::get('manage-users', [LogicController::class, 'manage'])->name('manage.users');
Route::get('view-user/{user}', [LogicController::class, 'show'])->name('user.show');
Route::get('edit-user/{user}', [LogicController::class, 'edit'])->name('user.edit');
Route::post('update-user/{user}', [LogicController::class, 'update'])->name('user.update');

//User Routes

Route::middleware(['auth'])->name('user.')->prefix('user/')->group( function() {

    Route::controller(UserController::class)->group(function(){
        Route::get('logout', 'logout')->name('logout');
        Route::get('verifyemail', 'verifyemail')->name('verifyemail');
        Route::get('resend/verificationmail', 'resendmail')->name('send.verify.mail');
        Route::post('verify/email', 'confirmemail')->name('email.confirm');
    });

    Route::middleware('verifyemail')->controller(UserController::class)->group(function (){
        Route::get('dashboard', 'dashboard')->name('dashboard');
        Route::get('profile', 'profile')->name('profile');
        Route::post('updateprofilepic', 'updateprofilepic')->name('update.profile.pic');


        //Chat Route
        Route::get('chat', 'chat')->name('chat');
    });
});
