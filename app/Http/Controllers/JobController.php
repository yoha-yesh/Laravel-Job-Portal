<?php

namespace App\Http\Controllers;

use App\Models\LaraJobs;
use Illuminate\Http\Request;

class JobController extends Controller
{

    public function index(){
        return view('index', [
            'larajobs' => LaraJobs::latest()
                ->filter(request(['tag']))
                ->get(),
        ]);
    }


    public function storeJob(Request $request) {
        LaraJobs::create([
            'title' =>$request->title,
            'tags' =>$request->tags,
            'company' =>$request->company,
            'location' =>$request->location,
            'email'  =>$request->email,
            'website' =>$request->website,
            'description' =>$request->description

        ]);

        return back()->with('message', 'created succesfully');
    }

    public function show(LaraJobs $job) {
        return view('show', [
            'job' => $job,
        ]);
    }
}
