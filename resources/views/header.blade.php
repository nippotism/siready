<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css','resources/js/app.js', 'resources/js/darkmode.js'])
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@600&family=Poppins:wght@200;400&display=swap"
    rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="siready2.png">
    <title>@yield('title') - Siready</title>

    {{-- jquery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    {{-- sweetalert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2  @11/dist/sweetalert2.min.js"></script> --}}

    {{-- datatables --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.6/css/dataTables.dataTables.css" />
    <script src="https://cdn.datatables.net/2.1.6/js/dataTables.js"></script>

    {{-- typesjs --}}
    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>

    {{-- lottie --}}
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

</head>

<body class="bg-gray-200 dark:bg-blek-900">
    <style>
        .swal-custom-border {
          border: 2px solid white; /* Add white border */
          box-shadow: 0 0 7px rgba(255, 255, 255, 0.5);
          border-radius: 10px; /* Rounded corners (optional) */
        }
      </style>
      
    @yield('page')
</body>
</html>
