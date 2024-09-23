@extends('header')

@section('title','Login')

@section('page')
<body class="min-h-screen w-full bg-gray-100 dark:bg-blek-900 text-white flex items-center justify-center">
    <div class="flex flex-col justify-center items-center text-center">
        <button id="theme-toggle"  class="text-gray-500 dark:text-gray-400 focus:outline-none rounded-lg text-sm p-2.5">
            <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg"></svg>
            <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-brightness-alt-low-fill">
              
            </svg>
            <img id="theme-toogle-dark-icon" data-tooltip-target="tooltip-toggle" type="button" src="siready.png" class="mb-5" width="120" alt="">
          </button>
    
        
        <div class="bg-white dark:bg-blek-700 flex flex-col border dark:border-none p-7 rounded-2xl">
            <h1 class="text-gray-800 dark:text-white text-2xl font-semibold py-2">Log in to your account</h1>
            <h1 class="text-gray-400 py-2">Enter your credentials to access your account</h1>
            <form action="{{ route('login') }}" method="POST" class="flex flex-col">
                @csrf
                <input type="text" name="email" placeholder="Enter your email" class="py-2 px-3 my-2 bg-gray-100 dark:bg-[#374250] rounded-lg" required>
                <input type="password" name="password" placeholder="Password" class="py-2 px-3 my-2 bg-gray-100 dark:bg-[#374250] rounded-lg" required>
                <button type="submit" class="py-[3%] px-[3%] my-4 mx-[21%] bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 rounded-lg">Login to your account</button>
            </form>
            {{-- <h1 class="text-[#9CA3AE]">Forgot your password? <span class="underline text-blue-600"> Reset password</span></h1> --}}
        </div>
    </div>
</body>

</html>