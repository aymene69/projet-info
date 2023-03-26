<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReglesController;
use App\Http\Controllers\ClassementController;


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
Route::get('/admin/editregles', [AdminController::class, 'editregles'])->name('editregles');

Route::post('/admin/ajoutertype', [AdminController::class, 'ajoutertype'])->name('ajoutertype');
Route::post('/admin/edittype', [AdminController::class, 'edittype'])->name('edittype');
Route::post('/admin/supprimertype', [AdminController::class, 'supprimertype'])->name('supprimertype');

Route::post('/admin/ajouterquestion', [AdminController::class, 'ajouterquestion'])->name('ajouterquestion');
Route::post('/admin/supprimerquestion', [AdminController::class, 'supprimerquestion'])->name('supprimerquestion');

Route::post('/admin/ajouterregle', [AdminController::class, 'ajouterregle'])->name('ajouterregle');
Route::post('/admin/modifregle', [AdminController::class, 'modifregle'])->name('modifregle');
Route::post('/admin/supprimerregle', [AdminController::class, 'supprimerregle'])->name('supprimerregle');

Route::get('/profile/{id}', [ProfileController::class, 'viewprofile'])->name('viewprofile');

Route::post('/profile/modifavatar', [ProfileController::class, 'modifavatar'])->name('modifavatar');
Route::post('/profile/modifusername', [ProfileController::class, 'modifusername'])->name('modifusername');
Route::post('/profile/modifemail', [ProfileController::class, 'modifemail'])->name('modifemail');
Route::post('/profile/modifpassword', [ProfileController::class, 'modifpassword'])->name('modifpassword');

Route::get('/regles', [ReglesController::class, 'regles'])->name('regles');

Route::get('/classement', [ClassementController::class, 'classement'])->name('classement');
