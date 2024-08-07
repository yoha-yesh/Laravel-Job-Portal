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
                            Log In
                        </h2>
                        <p class="mb-4">Log in to post gigs</p>
                    </header>

                    <form action="/login" method="post">
                        @csrf

                    @if(session('success'))
                        <div class="w-100% bg-green-500 text-center p-5 mb-5">
                             <p class="text-white text-center w-100%">{{session('success')}}</p>
                        </div>
                        @endif

                        @if(session('error'))
                        <div class="w-100% bg-red-500 text-center p-5 mb-4">
                             <p class="text-white text-center w-100%">{{session('error')}}</p>
                        </div>
                        @endif

                        
                        <div class="mb-6">
                            <label for="email" class="inline-block text-lg mb-2"
                                >Email</label
                            >
                            <input
                                type="email"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="email"
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
                            />
                            <!-- ERROR -->
                            @if($errors->has('email'))
                                <p class="text-red-700 font-xs">{{$errors->first('email')}}</p>
                             @endif
                        </div>

                        <div class="mb-6">
                            <button
                                type="submit"
                                class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
                            >
                                Sign In
                            </button>
                        </div>

                        <div class="mt-8">
                            <p>
                                Don't have an account?
                                <a href="/register" class="text-laravel"
                                    >Register</a
                                >
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </main>

       <x-footer></x-footer>
 @endsection