<?php

use App\Http\Controllers\AlunoController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

//Login
Route::get('/', [LoginController::class, 'index'])->name('login.index');

Route::get('/index-user', [UserController::class, 'index'])->name('user.index');
Route::get('/show-user/{user}', [UserController::class, 'show'])->name('user.show');
Route::get('/create-user', [UserController::class, 'create'])->name('user.create');
Route::post('/store-user', [UserController::class, 'store'])->name('user.store');
Route::get('/edit-user/{user}', [UserController::class, 'edit'])->name('user.edit');
Route::put('/update-user/{user}', [UserController::class, 'update'])->name('user.update');
Route::delete('/destroy-user/{user}', [UserController::class, 'destroy'])->name('user.destroy');
Route::resource('registros', AlunoController::class);
Route::get('/generate-pdf-user', [userController::class, 'generatePdf'])->name('user.generate-pdf');
Route::post('/login', [LoginController::class, 'loginProcess'])->name('login.proccess');

//Recuperar Senha
Route::get('/forgot-password', [ForgotPasswordController::class, 'showForgotPassword'])->name('forget-password.show');
Route::post('/forgot-password', [ForgotPasswordController::class, 'submitForgotPassword'])->name('forget-password.submit');
Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'showResetPassword'])->name('password.reset');
Route::post('/reset-password', [ForgotPasswordController::class, 'submitResetPassword'])->name('reset-password.submit');

//Cadastrar usuário
Route::get('/create-user-login', [LoginController::class, 'create'])->name('login.create-user');
Route::post('/store-user-login', [LoginController::class, 'store'])->name('login.store-user');

//Login
Route::get('/', [LoginController::class, 'index'])->name('login.index');
Route::post('/login', [LoginController::class, 'loginProcess'])->name('login.proccess');

//Logout
Route::get('/logout', [LoginController::class, 'destroy'])->name('login.destroy');

//Middleware para proteger as rotas de usuários, permitindo acesso apenas para usuários autenticados
Route::middleware('auth')->group(function () {});

//Cursos
Route::get('/index-course', [CourseController::class, 'index'])->name('courses.index');
Route::get('/create-course', [CourseController::class, 'create'])->name('courses.create');
Route::post('/store-course', [CourseController::class, 'store'])->name('courses.store');
Route::get('/show-course/{course}', [CourseController::class, 'show'])->name('courses.show');
Route::get('/edit-course/{course}', [CourseController::class, 'edit'])->name('courses.edit');
Route::put('/update-course/{course}', [CourseController::class, 'update'])->name('courses.update');
Route::delete('/destroy-course/{course}', [CourseController::class, 'destroy'])->name('courses.destroy');   

// Route::get('/index-classe/{course}', [ClasseController::class, 'index'])->name('classe.index');
// Route::get('/create-classe', [ClasseController::class, 'create'])->name('classe.create');
// Route::post('/store-classe', [ClasseController::class, 'store'])->name('classe.store');
// Route::get('/edit-classe/{classe}', [ClasseController::class, 'edit'])->name('classe.edit');
// Route::put('/update-classe/{classe}', [ClasseController::class, 'update'])->name('classe.update');
// Route::get('/show-classe/{classe}', [ClasseController::class, 'show'])->name('classe.show');
// Route::delete('/destroy-classe/{classe}', [ClasseController::class, 'destroy'])->name('classe.destroy'); 

Route::get('/index-classe/{course}', [ClasseController::class, 'index'])->name('classe.index');
Route::get('/create-classe/{course}', [ClasseController::class, 'create'])->name('classe.create');
Route::post('/store-classe', [ClasseController::class, 'store'])->name('classe.store');
Route::get('/edit-classe/{classe}', [ClasseController::class, 'edit'])->name('classe.edit');
Route::put('/update-classe/{classe}', [ClasseController::class, 'update'])->name('classe.update');
Route::get('/show-classe/{classe}', [ClasseController::class, 'show'])->name('classe.show');
Route::delete('/destroy-classe/{classe}', [ClasseController::class, 'destroy'])->name('classe.destroy');