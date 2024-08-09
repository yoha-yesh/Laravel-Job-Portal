<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>
<body class="flex justify-center items-center">
    
    <div class="w-3/4 h-4/6 rounded-2xl flex gap-8 mt-32 ml-10">
        <div class="w-50% h-full bg-slate-300 shadow-lg p-8">
            <h1 class="text-center text-3xl mb-6">Register as an employeer</h1>
            <p class="mb-4">By registering as an employeer you can post a job</p>
            <a href="{{route('register.employer')}}" class="justify-center w-100% bg-black"><button class="bg-blue-500 p-3 rounded-lg">Register</button></a>
            
        </div>
         
        <div class="w-50% h-full bg-slate-300 shadow-lg p-8">
            <h1 class="text-center text-3xl mb-6">Register as an employee</h1>
            <p class="mb-4">By registering as an employee apply to job</p>
            <a href="{{route('register.employee')}}" class="justify-center w-100% bg-black"><button class="bg-blue-500 p-3 rounded-lg">Register</button></a>
            
        </div>
    </div>
    
    
</body>
</html>