<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PeopleController;

Route::middleware('guest')->group(function () {
   

Route::get('/login', [AuthController::class, 'index'])->name('login');

Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 

Route::get('/registration', [AuthController::class, 'registration'])->name('register');

Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
});

Route::middleware('auth')->group(function () {

    Route::get('/people', [PeopleController::class, 'index'])->name('people.index');
Route::get('/people/create', [PeopleController::class, 'create'])->name('people.create');
// create new person entry
Route::post('/people', [PeopleController::class, 'saveperson'])->name('people.saveperson');
//get selected person information from index page
Route::get('/people/{person}/edit', [PeopleController::class, 'edit'])->name('people.edit');
//edit person information
Route::put('/people/{person}/update', [PeopleController::class, 'update'])->name('people.update');
//Remove person
Route::delete('/people/{person}/delete', [PeopleController::class, 'delete'])->name('people.delete');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});
