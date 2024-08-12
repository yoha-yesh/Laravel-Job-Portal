<?php

namespace App\Http\Controllers;

use App\Models\LaraJobs;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class JobController extends Controller
{

    public function index(){
        return view('index', [
            'larajobs' => LaraJobs::latest()
                ->filter(request(['tag', 'search']))
                ->paginate(6),
        ]);
    }


    public function storeJob(Request $request) {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'tags' => 'required',
            'company' => 'required',
            'location' => 'required',
            'email'  => ['required', 'email'],
            'website' => 'required',
            'description' => 'required',
        ]);

        if($validator->fails()) {
            return redirect('/create')->withErrors($validator)->withInput();
        }

        LaraJobs::create($validator->validated());

        return redirect('/')->with('message', 'created succesfully');
    }

    public function show(LaraJobs $job) {
        return view('show', [
            'job' => $job,
        ]);
    }
}
