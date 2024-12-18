@extends('header')

@section('title','Dashboard')

@section('page')
@if(session('login_success'))
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.onmouseenter = Swal.stopTimer;
          toast.onmouseleave = Swal.resumeTimer;
        }
      });
      Toast.fire({
        icon: "success",
        title: "Signed in successfully"
      });
    });
  </script>
@endif

    {{-- navbar --}}
    <x-navbar></x-navbar>
    
  {{-- endnavbar --}}

    <div class="flex pt-12 overflow-hidden">

      {{-- sidebar --}}

        <x-side-bar :active="request()->route()->getName()">
            
        </x-side-bar>
      {{-- end sidebar --}}

      <div id="main-content" class="relative font-poppins w-full h-full overflow-y-auto lg:pl-52">
        <div class = "text-gray-900 dark:text-gray-200">
          <h1 class="font-bold text-3xl mb-0 pl-14 pr-20 mt-6">Welcome, <span id = "nama_user"></span></h1>
          <div class="px-14 pt-3 pb-2">
            <div class="p-10 bg-white border border-gray-200 rounded-3xl shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-[#1D2125]"> 
                <div class="grid grid-cols-3 pt-4 py-8">
                    <div class="{{ $data['status'] == 'Aktif' ? 'text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800' : ($data['status'] == 'Cuti' ? 'text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800' : 'text-white bg-gradient-to-r from-lime-200 via-lime-400 to-lime-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-lime-300 dark:focus:ring-lime-800') }} p-6 rounded-2xl text-right mx-9">
                        <h1 class="text-2xl font-bold tracking-wider">
                            {{ $data['status'] == 'Aktif' ? 'Aktif' : ($data['status'] == 'Cuti' ? 'CUTI' : 'Belum Her-Reg') }}
                        </h1>  
                        <h1>Status Mahasiswa</h1>
                    </div>
                    <div class="text-white bg-gradient-to-r from-yellow-300 via-yellow-400 to-yellow-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 p-6 rounded-2xl text-right mx-9">
                        <h1 class="text-2xl font-bold flex items-center justify-between">
                            <button id="toggle-button">
                                <span id="svg-icon">
                                    <svg class="w-7 h-7 dark:text-white ipk-toggle" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" style="cursor: pointer;">
                                        <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z"/>
                                        <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                    </svg>
                                </span>
                            </button>
                            <span id="ipk-value">{{ $data['ipk'] }}</span>
                        </h1>
                        <h1>IP Kumulatif</h1>
                    </div>
                    <div class="text-white bg-gradient-to-r from-blue-400 via-blue-600 to-blue-800 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 p-6 rounded-2xl text-right mx-9">
                        <h1 class="text-2xl font-bold">{{ $data['total_sks'] }}</h1>
                        <h1>SKS</h1>
                    </div>
                </div>
                <h1 class="text-center"><strong>Pembimbing Akademik : </strong>{{ $data['nama_doswal'] }}</h1>
                <h1 class="text-center"><strong>NIP : </strong>{{ $data['nip_doswal'] }}</h1>
                <div class="grid grid-cols-3 space-x-2 py-8 text-center font-semibold">
                    <div class="px-3">
                        <h1>Semester Akademik Sekarang</h1>
                        <h1 class="text-2xl">2024/2025 Ganjil</h1>
                    </div>
                    <div class="border-x px-3">
                        <h1>Semester Studi</h1>
                        <h1 class="text-2xl">{{ $semester_berjalan }}</h1>
                    </div>
                    <div class="px-3">
                        <h1>IP Semester</h1>
                        <h1 class="text-2xl">{{ $data['ips'] }}</h1>
                    </div>
                </div>    
            </div>
          </div>
          <div class="flex mt-5 space-x-6 px-14 pb-7 text-gray-500 dark:text-[#9CA3AF]">
            <div class="w-[70%]  ">
                <h1 class="font-bold text-2xl mb-5 text-gray-900 dark:text-gray-200">Today's Schedule</h1>
                <div class="bg-white border border-gray-200 h-[85%] rounded-3xl shadow-sm dark:border-gray-700 sm:p-6 dark:bg-[#1D2125] p-4 text-center ">
                    

                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-sm text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Course
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Room
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Time
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jadwalhariini as $j)
                                    <tr class="bg-white border-b dark:bg-blek-700 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $j->nama}} {{ $j->kelas }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $j->ruang }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $j->jammulai }} - {{ $j->jamselesai }}
                                        </td>
                                    </tr>
                                    
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <div class="w-[30%] h-auto">
                <h1 class="font-bold text-2xl mb-5 text-gray-900 dark:text-gray-200">Announcement</h1>
                <div class="p-10 bg-white border border-gray-200 h-[85%] rounded-3xl shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-[#1D2125]">
                    <h1>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quod harum quos alias rem nemo dolorum, excepturi eius tenetur inventore</h1>
                </div>
            </div>
          </div>
        </div>
      </div>

      <script>
        $(document).ready(function() {
            let isHidden = false;
            const ipkValue = "{{ $data['ipk'] }}"; // Original IPK value
    
            $('#toggle-button').on('click', function() {
                // Toggle the IPK value between the actual value and ***
                if (isHidden) {
                    $('#ipk-value').text(ipkValue); // Show original IPK
                    $('#svg-icon').html(`
                        <svg class="w-7 h-7 dark:text-white ipk-toggle" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z"/><path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                        </svg>
                    `);
                } else {
                    $('#ipk-value').text('***'); // Show ***
                    $('#svg-icon').html(`
                        <svg class="w-7 h-7 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.933 13.909A4.357 4.357 0 0 1 3 12c0-1 4-6 9-6m7.6 3.8A5.068 5.068 0 0 1 21 12c0 1-3 6-9 6-.314 0-.62-.014-.918-.04M5 19 19 5m-4 7a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                        </svg>

                    `);
                }
                isHidden = !isHidden; // Toggle the state
            });
        });
    </script>

      <script>
        var typed = new Typed("#nama_user", {
            strings: [' ^750 {{ $data['userName'] }}👋.'],
            typeSpeed: 50,
            backSpeed: 50,
            loop: true,
            backDelay: 1000,
            
        });
      </script>
      <style>
        .typed-cursor--blink {
            display: none;
        }
      </style>

@endsection
