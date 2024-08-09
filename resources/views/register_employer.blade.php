@extends('layout.app')

@section('content')
       <x-nav></x-nav>

        <main>
            <div class="mx-4">
                <div
                    class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24"
                >
                    <header class="text-center">
                        <h2 class="text-2xl font-bold uppercase mb-1">
                            Register
                        </h2>
                        <p class="mb-4">Create an account to post gigs</p>
                    </header>

                    <form method="post" action="{{route('create.employer')}}" >
                        @csrf
                        <div class="mb-6">
                            <label for="name" class="inline-block text-lg mb-2">
                                Name
                            </label>
                            <input
                                type="text"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="name"
                                value="{{old('name')}}"
                            />

                            <!-- ERROR -->
                             @if($errors->has('name'))
                                <p class="text-red-700 font-xs">{{$errors->first('name')}}</p>
                             @endif
                             
                        </div>

                        <div class="mb-6">
                            <label for="email" class="inline-block text-lg mb-2"
                                >Email</label
                            >
                            <input
                                type="email"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="email"
                                value="{{old('email')}}"
                            />

                            <!-- ERROR -->
                            @if($errors->has('email'))
                                <p class="text-red-700 font-xs">{{$errors->first('email')}}</p>
                             @endif
                           
                        </div>

                        <div class="mb-6">
                            <label
                                for="password"
                                class="inline-block text-lg mb-2"
                            >
                                Password
                            </label>
                            <input
                                type="password"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="password"
                                value="{{old('password')}}"
                            />
                            <!-- ERROR -->
                             @if($errors->has('password'))
                                <p class="text-red-700 font-xs">{{$errors->first('password')}}</p>
                             @endif
                        </div>
                        

                        <div class="mb-6">
                            <label
                                for="password2"
                                class="inline-block text-lg mb-2"
                            >
                                Confirm Password
                            </label>
                            <input
                                type="password"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="password_confirmation"
                            />
                        </div>

                        <div class="mb-6">
                            <button
                                type="submit"
                                class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
                            >
                                Sign Up
                            </button>
                        </div>

                        <div class="mt-8">
                            <p>
                                Already have an account?
                                <a href="/login" class="text-laravel"
                                    >Login</a
                                >
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </main>

        <x-footer></x-footer>
  @endsection