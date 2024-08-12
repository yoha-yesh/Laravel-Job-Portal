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

//Update job 
    public function UpdateJob(Request $request ,$id) {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'tags' => 'required',
            'company' => 'required',
            'location' => 'required',
            'email'  => ['required', 'email'],
            'website' => 'required',
            'description' => 'required',
        ]);

        $larajob = LaraJobs::find($id);

    $larajob->update([
        'title' => $request['title'],
        'tags' => $request['tags'],
        'company' => $request['company'],
        'location' => $request['location'],
        'email' => $request['email'],
        'website' => $request['website'],
        'description' => $request['description']

    ]);

    return back()->with('message', 'Succesfully updated');

    }


    //DELETE JOB
    public function deleteJob($id){
        $larajob = LaraJobs::find($id);
        $larajob->delete();
        return back();

    }
}
