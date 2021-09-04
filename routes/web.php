<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ChartsController;
use App\Http\Controllers\RegisterController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;




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
Auth::routes(['verify' => true]);
//route for email verification
Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
       $request->fulfill();
       return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

//Resending The Verification Email
Route::post('/email/verification-notification', function (Request $request) {
       $request->user()->sendEmailVerificationNotification();
       return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
//template routes
Route::middleware(['auth'])->group(function () {
Route::get('/', [ChartsController::class, 'index'])->name('home');
Route::get('users', [UsersController::class, 'index']);
Route::get('users/{user}', [UsersController::class, 'show']);
Route::get('edit/{user}', [UsersController::class, 'edit']);
Route::post('edit', [UsersController::class, 'update'])->name('editUser');
Route::delete('delete/{user}', [UsersController::class, 'destroy'])->name('deleteUser');
});
Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('storeUser');

