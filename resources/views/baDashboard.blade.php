@extends('header')

@section('title','Dashboard')

@section('page')

    <x-navbar>

    </x-navbar>

    <div class="flex pt-12 overflow-hidden">

        {{-- sidebar --}}
  
          <x-side-bar-ba :active="request()->route()->getName()">
              
          </x-side-bar-ba>
        {{-- end sidebar --}}
  
  
        <div id="main-content" class="relative text-gray-900 dark:text-gray-200 font-poppins w-full h-full overflow-y-auto lg:pl-52">
            {{-- <div class="px-8 py-8">
                <div class="bg-white border border-gray-200 h-[80vh] rounded-3xl shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-blek-700">
                    <div class="grid grid-cols-3 gap-16 px-16 py-5">
                        <div class="bg-[#38A6D6] p-6 rounded-2xl text-right">
                            <h1 class="text-2xl font-bold">30</h1>
                            <h1>Pengajuan IRS</h1>
                        </div>
                        <div class="bg-[#2ACD7F] p-6 rounded-2xl text-right">
                            <h1 class="text-2xl font-bold">15</h1>
                            <h1>IRS Disetujui</h1>
                        </div>
                        <div class="bg-[#C34444] p-6 rounded-2xl text-right">
                            <h1 class="text-2xl font-bold">2</h1>
                            <h1>IRS Ditolak</h1>
                        </div>
                    </div>
                    <div class="grid grid-cols-6 text-center mt-16 pr-[5%] py-5 text-gray-500 dark:text-[#9CA3AF]   ">
                        <div class="space-y-4">
                            <h1 class="pb-2 font-semibold">No</h1>
                            <h1>1</h1>
                            <h1>2</h1>
                            <h1>3</h1>
                            <h1>4</h1>
                        </div>
                        <div class="space-y-4">
                            <h1 class="pb-2 font-semibold">Angkatan</h1>
                            <h1>2022</h1>
                            <h1>2024</h1>
                            <h1>2020</h1>
                            <h1>2021</h1>
                        </div>
                        <div class="space-y-4">
                            <h1 class="pb-2 font-semibold">Strata</h1>
                            <h1>S1</h1>
                            <h1>S1</h1>
                            <h1>S1</h1>
                            <h1>S2</h1>
                        </div>
                        <div class="space-y-4">
                            <h1 class="pb-2 font-semibold">Prodi</h1>
                            <h1>Informatika</h1>
                            <h1>Informatika</h1>
                            <h1>Informatika</h1>
                            <h1>Sistem Informasi</h>
                        </div>
                        <div class="space-y-4">
                            <h1 class="pb-2 font-semibold">Kelas</h1>
                            <h1>A</h1>
                            <h1>C</h1>
                            <h1>A</h1>
                            <h1>D</h1>
                        </div>
                        <div class="space-y-4">
                            <h1 class="pb-2 font-semibold">Rata-rata IPK</h1>
                            <h1>3.9</h1>
                            <h1>3.1</h1>
                            <h1>3.3</h1>
                            <h1>3.8</h1>
                        </div>
                    </div>
                </div>
            </div> --}}
            <h1>Tulungi Yud</h1>
        </div>
        
@endsection
