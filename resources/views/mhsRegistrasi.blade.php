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
                <div id="error-message" class="bg-red-600 text-white p-4 rounded-lg my-4 mx-5 transition-opacity ease-in-out delay-150 duration-300 opacity-100">
                    {{ session('error') }}
                </div>
            
                <script>
                    // Hide the error message after 5 seconds
                    setTimeout(function() {
                        let errorMessage = document.getElementById('error-message');
                        if (errorMessage) {
                            errorMessage.classList.add('opacity-0');
                            
                            // Optional: Completely remove the element from the DOM after fade-out
                            setTimeout(function() {
                                errorMessage.remove();
                            }, 300); // Matches the duration of the transition (300ms)
                        }
                    }, 5000); // Display for 5 seconds
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