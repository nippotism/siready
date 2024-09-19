<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body class="bg-[#111827] min-h-screen w-full text-white flex items-center justify-center">
    <div class="flex flex-col justify-center items-center text-center">
        <img src="siready.png" class="mb-5" width="120" alt="">
        <div class="bg-[#1F2A36] flex flex-col p-7 rounded-2xl">
            <h1 class="text-2xl font-semibold py-2">Log in to your account</h1>
            <h1 class="text-gray-400 py-2">Enter your credentials to access your account</h1>
            <form action="{{ route('login') }}" method="POST" class="flex flex-col">
                @csrf
                <input type="text" name="email" placeholder="Enter your email" class="py-2 px-3 my-2 bg-[#374250] rounded-lg" required>
                <input type="password" name="password" placeholder="Password" class="py-2 px-3 my-2 bg-[#374250] rounded-lg" required>
                <button type="submit" class="py-[3%] px-[3%] my-4 mx-[21%] bg-[#186CE5] rounded-lg">Login to your account</button>
            </form>
            <h1 class="text-[#9CA3AE]">Forgot your password? <span class="underline text-blue-600"> Reset password</span></h1>
        </div>
    </div>
</body>

</html>