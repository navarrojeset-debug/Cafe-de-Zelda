<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::inertia('/', 'Welcome')->name('home');

Route::view('/register', 'auth.register')->name('register');
Route::post('/register', [AuthController::class, 'register'])
	->middleware('throttle:6,1')
	->name('register.store');

Route::get('/login', function () {
	return view('auth.login');
})->name('login');

Route::post('/login', [AuthController::class, 'login'])
	->middleware('throttle:5,1')
	->name('login.store');

Route::middleware('auth')->group(function () {
	Route::get('/users', function () {
		$users = User::query()->orderBy('name')->get();

		return view('users.index', compact('users'));
	})->name('users.index');

	Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
	Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
	Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

