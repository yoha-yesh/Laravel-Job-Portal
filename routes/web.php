<?php

use App\Models\LaraJobs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\UserController;

Route::get('/', [JobController::class, 'index']);

Route::get('/jobs/{job}', [JobController::class, 'show']);

Route::get('/register', function () {
    return view('register_employer');
})->name('register');

Route::get('/register/employee', function () {
    return view('register_employee');
})->name('register.employee');

Route::get('/login', function () {
    return view('login');
})->name('login');


Route::get('/register/employer_seeker', function () {
    return view('employer_seeker');
})->name('employer.seeker');



//STORE A USER
Route::post('/create/employee', [UserController::class, 'storeEmployee'])->name('create.employee');
Route::post('/create/employer', [UserController::class, 'storeEmployer'])->name('create.employer');

//Login
Route::post('/login', [UserController::class, 'logged']);

//Logout
Route::get('/logout', [UserController::class ,'logout'])->name('logout');



Route::get('/employer/seeker' ,function(){
    return view('employer_seeker');
});


// create Page
Route::get('create', function(){
    return view('create');
})->name('create')->middleware('auth');

Route::post('create/job', [JobController::class, 'storeJob'])->name('create.job');







//MANAGE JOBS ROUTE

Route::get('/manage', [JobController::class, 'manage'])->name('manage')->middleware('auth');

//EDIT THE JOB PAGE DISPLAY ROUTE

Route::get('/job/edit/{id}', function($id){
    return view('edit', [
        "larajob" => LaraJobs::find($id)
    ]);
});


//Edit the job
Route::put('update/job/{id}', [JobController::class, 'updateJob'])->name('update.job')->middleware('auth');

//DELETE THE JOB
Route::delete('delete/job/{id}', [JobController::class, 'deleteJob'])->name('delete.job')->middleware('auth');


?>
