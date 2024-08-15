@if (session()->has('message'))
    <div class="truncate fixed top-4 left-0 right-0 w-1/4 text-center mx-auto rounded-full bg-black px-5 py-2 text-white"
        x-data="{show:true}"
        x-init="setTimeout(() => show = false, 3000)"
        x-show="show"
    >
        <i class="fa-solid fa-bell"></i>
        {{session('message')}}
    </div>
@else
    @if (session()->has('success'))
        <div class="truncate fixed top-4 left-0 right-0 w-1/4 text-center mx-auto rounded-full bg-green-500 px-5 py-2 text-white"
            x-data="{show:true}"
            x-init="setTimeout(() => show = false, 3000)"
            x-show="show"
        >
            <i class="fa-solid fa-bell"></i>
            {{session('message')}}
        </div>
    @else
        @if (session()->has('error'))
            <div class="truncate fixed top-4 left-0 right-0 w-1/4 text-center mx-auto rounded-full bg-red-500 px-5 py-2 text-white"
                x-data="{show:true}"
                x-init="setTimeout(() => show = false, 3000)"
                x-show="show"
            >
                <i class="fa-solid fa-bell"></i>
                {{session('message')}}
            </div>
        @endif
    @endif
@endif
