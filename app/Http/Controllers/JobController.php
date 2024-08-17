<?php

namespace App\Http\Controllers;


use App\Models\LaraJobs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Validator;

class JobController extends Controller
{

    public function index(){
        return view('index', [
            'larajobs' => LaraJobs::latest()
                ->filter(request(['tag', 'search']))
                ->paginate(6),
        ]);
    }

    public function manage(){
        return view('manage', [
            'LaraJobs' => LaraJobs::latest()->where('user_id', Auth::user()->id)
                ->filter(request(['search']))->get()
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

        $formFields = [
            'title' => $request->title,
            'user_id' => Auth::user()->id,
            'tags' => $request->tags,
            'company' => $request->company,
            'location' => $request->location,
            'email'  => $request->email,
            'website' => $request->website,
            'description' => $request->description,
            'logo' => $request->logo,

        ];
        

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        LaraJobs::create($formFields);

        return redirect('/')->with('message', 'Created succesfully');
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
        return back()->with('success', 'Deleted Succesfully');

    }
}
