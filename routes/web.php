<?php

use App\Http\Controllers\UserController;
use App\Models\LaraJobs;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index', [
        'larajobs' => LaraJobs::all()
    ]);
});

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/login', function () {
    return view('login');
})->name('login');




//STORE A USER
Route::post('/create', [UserController::class, 'store']);

//Login
Route::post('/login', [UserController::class, 'logged']);

//Logout
Route::get('/logout', function(){
    return 'hello world';
})->name('logout');



Route::get('/employer/seeker' ,function(){
    return view('employer_seeker');
});





?>