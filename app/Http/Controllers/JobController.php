<?php

namespace App\Http\Controllers;

use App\Models\LaraJobs;
use Illuminate\Http\Request;

class JobController extends Controller
{

    public function index(){
        $filters = request(['tag']);
        return view('index', [
            
            
            'larajobs' => LaraJobs::all()
            // ->filter(function($filters){
            //     if($filters['tag']){
            //         return LaraJobs::all()->where('tags', 'like', '%'.request('tag'). "%");

            //     }
               
                
            // }
            // )
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
}
