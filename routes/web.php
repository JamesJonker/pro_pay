<?php
use App\Http\Controllers\PeopleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Mail;
use App\Mail\Email;
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
    return view('login.login');
    //return view('Welcome');
});

Route::get('/login', function(){
    return view('login.login');
});

Route::get('/people', function () {
    return view('people.index');
})->middleware(['auth', 'verified'])->name('people');



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

Route::get('/login', [AuthController::class, 'index'])->name('login');

Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 

Route::get('/registration', [AuthController::class, 'registration'])->name('register');

Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');

Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/mail/{person}/mail', function(){

    $name = "James";
    Mail::to('jonker.james@gmail.com')->send(new Email(''));
    })->name('mail.new-mail');
   
});



require __DIR__.'/auth.php';