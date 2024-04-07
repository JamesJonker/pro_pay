<?php

use App\Http\Controllers\UserinfoController;
use App\Http\Controllers\PeopleController;
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

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/userInfo', [UserinfoController ::class, 'index'])->name('userInfo.index');

//Route::get('/userInfo/createuser', [UserinfoController ::class, 'createuser'])->name('userInfo.createuser');   

//Route::post('/userInfo/createuser', [UserinfoController ::class, 'saveuser'])->name('userInfo.saveuser');   

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