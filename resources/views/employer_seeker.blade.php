@extends('layout.app')

@section('content')
    <x-nav></x-nav>
    <div class="w-3/4 h-4/6 rounded-2xl flex gap-8 mt-32 ml-52">
        <div class="bg-gray-50 border border-gray-200 rounded p-6">
            <h1 class="text-center text-3xl mb-6">Register as an employeer</h1>
            <p class="mb-4">By registering as an employeer you can post a job</p>
            <a href="{{route('register')}}" class="justify-center w-100% bg-black"><button class="bg-blue-500 p-3 rounded-lg">Register</button></a>
            
        </div>
         
        <div class="bg-gray-50 border border-gray-200 rounded p-6">
            <h1 class="text-center text-3xl mb-6">Register as an employee</h1>
            <p class="mb-4">By registering as an employee apply to job</p>
            <a href="{{route('register.employee')}}" class="justify-center w-100% bg-black"><button class="bg-blue-500 p-3 rounded-lg">Register</button></a>
            
        </div>
    </div>
    <x-footer></x-footer>
    
    
@endsection