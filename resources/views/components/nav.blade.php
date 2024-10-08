<nav class="flex justify-between items-center mb-4">
            <a href="/"
                ><img class="w-24" src="/images/logo.png" alt="" class="logo"
            /></a>
            <ul class="flex space-x-6 mr-6 text-lg">
            @auth
            @if(auth()->user()->role == 'employer')
            <li>
                    <a href="{{route('manage')}}" class="hover:text-laravel"
                        ><i class="fa-solid fa-gear"></i> Manage Gigs</a
                    >
                </li>
            @endif

            <li>
                    <a href="{{route('logout')}}" class="hover:text-laravel"
                        ><i class="fa-solid fa-arrow-right-to-bracket"></i>
                        Logout</a
                    >
                </li>
            @else
                <li>
                    <a href="{{route('employer.seeker')}}" class="hover:text-laravel"
                        ><i class="fa-solid fa-user-plus"></i> Register</a
                    >
                </li>
                <li>
                    <a href="{{route('login')}}" class="hover:text-laravel"
                        ><i class="fa-solid fa-arrow-right-to-bracket"></i>
                        Login</a
                    >
                </li>



                @endauth
            </ul>
        </nav>
