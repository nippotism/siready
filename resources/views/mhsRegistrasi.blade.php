@extends('header')

@section('title','Registrasi')

@section('page')
     {{-- navbar --}}
     <x-navbar></x-navbar>
    
     {{-- endnavbar --}}

     
   
       <div class="flex pt-12 overflow-hidden">
   
         {{-- sidebar --}}
   
           <x-side-bar-mhs :active="request()->route()->getName()">
               
           </x-side-bar-mhs>
   
         {{-- end sidebar --}}

    
   
         <div id="main-content" class="relative w-full h-full font-poppins overflow-y-auto text-gray-900 dark:text-gray-200  lg:ml-64">
            
            @if (session('error'))
                <div id="alert" class="text-white bg-gradient-to-r from-red-500 via-red-600 to-red-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 px-4 py-3 mt-3 rounded absolute z-50 w-[95%]" role="alert">
                    <strong class=" text-gray-300 font-bold">Error !</strong>
                    <span class="text-white block sm:inline">{{ session('error') }}</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg id="closeAlert" class="fill-current h-6 w-6 text-red-500 cursor-pointer" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <title>Close</title>
                            <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/>
                        </svg>
                    </span>
                </div>
                
                <script>
                    // Close alert when clicking the cross button
                    document.getElementById('closeAlert').addEventListener('click', function() {
                        document.getElementById('alert').style.display = 'none';
                    });
                
                    // Auto dismiss alert after 3 seconds
                    setTimeout(function() {
                        document.getElementById('alert').style.display = 'none';
                    }, 3000);
                </script>
            
            @endif
        

            <h1 class="font-semibold text-4xl mt-10 mb-4">Pilih Status Akademik</h1>
            <h1 class="text-[#9CA3AF]">Silahkan pilih status akademik untuk semester ini</h1>
            <div class="grid grid-cols-2 mt-16 mx-7 h-[60vh]">
                <div class="bg-white p-6 mx-7 w-[85%] rounded-2xl h-full flex flex-col justify-between dark:bg-blek-700">
                    <div>
                        <div class="flex items-center">
                            <img src="{{ asset('aktif.png') }}" width="100" alt="">
                            <h1 class="font-bold text-3xl text-center mb-5 pt-4">Aktif</h1>
                        </div>
                        <h1 class="text-[#9CA3AF] px-5">Anda akan mengikuti kegiatan perkuliahan pada semester ini serta mengisi Isian Rencana Studi (IRS).</h1>
                    </div>
                    <h1 class="bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 text-white text-center px-6 py-3 font-bold rounded-2xl">Pilih</h1>
                </div>
                <div class="bg-white dark:bg-blek-700 dark:border-gray-700 p-6 mx-7 w-[85%] rounded-2xl h-full flex flex-col justify-between">
                    <div>
                        <div class="flex items-center px-3">
                            <img src="{{ asset('cuti.png') }}" width="65" alt="">
                            <h1 class="font-bold text-3xl text-center mb-5 pt-4 ml-4">Cuti</h1>
                        </div>
                        <h1 class="text-[#9CA3AF] px-5">Menghentikan kuliah sementara untuk semester ini tanpa kehilangan status sebagai mahasiswa Undip.</h1>
                    </div>
                    <h1 class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 text-center px-6 py-3 font-bold rounded-2xl">Pilih</h1>
                </div>
            </div>
        </div>
    </div>


@endsection