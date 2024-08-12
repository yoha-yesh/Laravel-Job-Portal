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

// Route::get('/register/employer', function () {
//     return view('register_employer');
// })->name('register.employer');

Route::get('/login', function () {
    return view('login');
})->name('login');






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
})->name('create');

Route::post('create/job', [JobController::class, 'storeJob'])->name('create.job');


// Route::get('/?tag={tag}', function($tag){

//     dd(LaraJobs::where('tags', $))


// });




//MANAGE JOBS ROUTE

Route::get('manage', function(){
    return view('manage', [
        "LaraJobs" => LaraJobs::all()
    ]);
})->name('manage');


//EDIT THE JOB PAGE DISPLAY ROUTE

Route::get('/job/edit/{id}', function($id){
    return view('edit', [
        "larajob" => LaraJobs::find($id)
    ]);
});


//Edit the job
Route::put('update/job/{id}', [JobController::class, 'updateJob'])->name('update.job');

//DELETE THE JOB
Route::delete('delete/job/{id}', [JobController::class, 'deleteJob'])->name('delete.job');


?>
