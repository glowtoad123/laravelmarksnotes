<?php


use Illuminate\Support\Facades\Route;
use Auth0\Login\Auth0Controller;
use App\Http\Controllers\Auth\Auth0IndexController;
use App\Http\Controllers\NoteController;

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

/* Route::get('/', function () {
    return view('welcome');
}); */
/* Route::get("/", 'NoteController@showAll'); */
Route::get('/auth0/callback', [Auth0Controller::class, 'callback'])->name('auth0-callback');
Route::get('/login', [Auth0IndexController::class, 'login'])->name('login');
Route::get('/logout', [Auth0IndexController::class, 'logout'])->name('logout');
/* Route::get('/profile', [Auth0IndexController::class, 'profile'])->name('profile'); */
Route::get("/", [Auth0IndexController::class, 'profile'])->name('profile');
Route::get("/note/{slug}", [NoteController::class, "show"]);
Route::get("/create", [Auth0IndexController::class, "allowCreation"]);
/* Route::get("/api/notes", fn() => redirect('/',200)); */
/* Route::redirect('/api/notes', '/', 301); */
