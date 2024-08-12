@if (session()->has('message'))
    <div class="fixed top-4 left-1/2 rounded-full bg-green-500 px-5 py-2 text-white"
        x-data="{show:true}"
        x-init="setTimeout(() => show = false, 3000)"
        x-show="show"
    >
        <i class="fa-solid fa-bell"></i>
        {{session('message')}}
    </div>
@endif
