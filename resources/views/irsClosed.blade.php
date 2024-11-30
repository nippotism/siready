@extends('header')

@section('title','Closed')

@section('page')

  {{-- navbar --}}
  <x-navbar></x-navbar>

  {{-- endnavbar --}}

    <div class="flex overflow-hidde">

      {{-- sidebar --}}

        <x-side-bar :active="request()->route()->getName()">

        </x-side-bar>
      {{-- end sidebar --}}



        <div id="main-content" class="relative w-full h-full font-poppins overflow-y-auto lg:ml-52 dark:bg-blek-900">

            <div class="flex flex-col justify-center items-center px-6 mx-auto h-screen xl:px-0 dark:bg-blek-900">
                <div class=" md:max-w-xs animate-bounce ">
                    <img src="{{ asset('images/maintenance.svg') }}"alt="maintenance image">
                </div>
                <div class="text-center xl:max-w-4xl">
                    <h1 class="text-xl font-bold leading-tight text-gray-900 sm:text-4xl lg:text-3xl dark:text-white">IRS Anda Sudah Disetujui !</h1>
                    {{-- <p class="mb-5 text-base font-normal text-gray-500 md:text-lg dark:text-gray-400">Sorry for the inconvenience but were performing some maintenance at the moment. If you need to you can always <a href="#" class="text-primary-700 hover:underline dark:text-primary-500">contact us</a>, otherwise we’ll be back online shortly!.</p> --}}
                    <button id = "ajuan-button" type= "button" {{ $aksesirs=='no'?'':'disabled'; }} onclick='Ajuan("{{ $email }}");' class="mt-10 text-white {{  $aksesirs=='no'?'bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800':'bg-gray-600';  }} font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-3">
                        {{ $aksesirs=='no'?'Ajukan Perubahan IRS':'Menunggu Pengajuan IRS'; }}
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            function Ajuan(email) {
                console.log(email);
                
                $.ajax({
                    url: "/ajuanperubahan",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        email: email
                    },
                    success: function(data) {
                        console.log(data);

                        //change button to disabled
                        $('#ajuan-button').attr('disabled', true);
                        $('#ajuan-button').text('Menunggu Pengajuan IRS');
                        
                        //change color button to gray
                        $('#ajuan-button').removeClass('bg-primary-700');
                        $('#ajuan-button').removeClass('hover:bg-primary-800');
                        $('#ajuan-button').removeClass('dark:bg-primary-600');
                        $('#ajuan-button').removeClass('dark:hover:bg-primary-700');
                        $('#ajuan-button').addClass('bg-gray-600');
                        $('#ajuan-button').addClass('dark:bg-gray-600');
                        
                    }
                });
            }
    
            window.Ajuan = Ajuan; // Make Ajuan available globally if needed
        });
    </script>
    

@endsection
