<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\AdminController;


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

Route::get('/', function () {return view('home');})->name('home');

Route::get('/regles', [RegistrationController::class, 'create'])->name('regles');

Route::get('/register', [RegistrationController::class, 'create'])->name('register');
Route::post('/register', [RegistrationController::class, 'store']);

Route::get('/login', [SessionsController::class, 'create'])->name('login');
Route::post('/login', [SessionsController::class, 'store']);
Route::get('/logout', [SessionsController::class, 'destroy'])->name('logout');

Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::get('/admin/questions', [AdminController::class, 'listequestions'])->name('listequestions');
Route::get('/admin/editquestions', [AdminController::class, 'editquestions'])->name('editquestions');

Route::post('/admin/ajoutertype', [AdminController::class, 'ajoutertype'])->name('ajoutertype');
Route::post('/admin/edittype', [AdminController::class, 'edittype'])->name('edittype');

Route::post('/admin/ajouterquestion', [AdminController::class, 'ajouterquestion'])->name('ajouterquestion');
Route::post('/admin/supprimerquestion', [AdminController::class, 'supprimerquestion'])->name('supprimerquestion');
