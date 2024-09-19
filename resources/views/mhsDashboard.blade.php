@extends('header')

@section('title','Dashboard')

@section('page')
    {{-- navbar --}}
    <x-navbar></x-navbar>
    
  {{-- endnavbar --}}

    <div class="flex pt-12 overflow-hidden">

      {{-- sidebar --}}

        <x-side-bar-mhs>
            
        </x-side-bar-mhs>
      {{-- end sidebar --}}


      <div id="main-content" class="relative font-poppins w-full h-full overflow-y-auto lg:pl-52">

        <div class = "text-gray-900 dark:text-gray-200">
          <h1 class="font-bold text-3xl mb-0 px-14 mt-6">Hai {{ $userName }}👋</h1>
        
          <div class="px-14 pt-3 pb-2">
            <div class="p-10 bg-white border border-gray-200 rounded-3xl shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-[#1D2125]">
              
                <div class="grid grid-cols-3 pt-4 py-8">
                    <div class="bg-[#2ACD7F] p-6 rounded-2xl text-right mx-9">
                        <h1 class="text-2xl font-bold">AKTIF</h1>
                        <h1>Status Mahasiswa</h1>
                    </div>
                    <div class="bg-[#2AA6CD] p-6 rounded-2xl text-right mx-9">
                        <h1 class="text-2xl font-bold">3.2</h1>
                        <h1>IP Kumulatif</h1>
                    </div>
                    <div class="bg-[#3478C7] p-6 rounded-2xl text-right mx-9">
                        <h1 class="text-2xl font-bold">86</h1>
                        <h1>SKS</h1>
                    </div>
                </div>
                <h1 class="text-center"><strong>Pembimbing Akademik : </strong>H. Prabowo Subianto</h1>
                <h1 class="text-center"><strong>NIP : </strong>24060122110001</h1>
                <div class="grid grid-cols-3 space-x-2 py-8 text-center font-semibold">
                    <div class="px-3">
                        <h1>Semester Akademik Sekarang</h1>
                        <h1 class="text-2xl">2024/2025 Ganjil</h1>
                    </div>
                    <div class="border-x px-3">
                        <h1>Semester Studi</h1>
                        <h1 class="text-2xl">7</h1>
                    </div>
                    <div class="px-3">
                        <h1>IP Semester</h1>
                        <h1 class="text-2xl">2.3</h1>
                    </div>
                </div>    
            </div>
            
          </div>

          <div class="flex mt-5 space-x-6 px-14 pb-7 text-gray-500 dark:text-[#9CA3AF]">
            <div class="w-[70%]  ">
                <h1 class="font-bold text-2xl mb-5 text-gray-900 dark:text-gray-200">Today's Schedule</h1>
                <div class="grid grid-cols-3 bg-white border border-gray-200 h-[85%] rounded-3xl shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-[#1D2125] p-4 text-center ">
                    <div>
                        <h1 class="font-bold pt-1 pb-3">Subject</h1>
                        <h1>Pengembangan Berbasis</h1>
                        <h1>Proyek Perangkat Lunak</h1>
                        <h1>Penambangan Data</h1>
                    </div>
                    <div>
                        <h1 class="font-bold pt-1 pb-3">Room</h1>
                        <h1>E101</h1>
                        <h1>A303</h1>
                        <h1>E102</h1>
                    </div>
                    <div>
                        <h1 class="font-bold pt-1 pb-3">Time</h1>
                        <h1>13.00-15.30</h1>
                        <h1>15.30-18.00</h1>
                        <h1>09.30-12.20</h1>
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

@endsection
