<?php

namespace App\Http\Controllers;

use App\Models\LaraJobs;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;

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
            'logo' => File::types(['jpg', 'png', 'svg'])->max(1024),
        ]);

        if($validator->fails()) {
            return redirect('/create')->withErrors($validator)->withInput();
        }

        $formFields = $validator->validated();

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        LaraJobs::create($formFields);

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
            'logo' => File::types(['jpg', 'png', 'svg'])->max(1024),
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

        if ($request->hasFile('logo')) {
            $larajob->update([
                'logo' => $request->file('logo')->store('logos', 'public'),
            ]);
        }

    return redirect('/')->with('success', 'Succesfully updated');

    }


    //DELETE JOB
    public function deleteJob($id){
        $larajob = LaraJobs::find($id);
        $larajob->delete();
        return back();

    }
}
