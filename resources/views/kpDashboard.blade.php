@extends('header')

@section('title','Dashboard')

@section('page')
    <x-navbar>

    </x-navbar>

    <div class="flex pt-12 overflow-hidden">

        {{-- sidebar --}}
  
          <x-side-bar :active="request()->route()->getName()">
            
          </x-side-bar>
        {{-- end sidebar --}}
  
  
        <div id="main-content" class="relative text-gray-900 dark:text-gray-200 font-poppins w-full h-full overflow-y-auto lg:pl-52">
            <div class="px-8 py-8">
                <div class="bg-white border border-gray-200 h-[80vh] rounded-3xl shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-blek-700">
                    <div class="grid grid-cols-3 gap-16 px-16 py-5">
                        <div class="bg-[#38A6D6] p-6 rounded-2xl text-right">
                            <h1 class="text-2xl font-bold">632</h1>
                            <h1>Total Mahasiswa</h1>
                        </div>
                        <div class="bg-[#2ACD7F] p-6 rounded-2xl text-right">
                            <h1 class="text-2xl font-bold">610</h1>
                            <h1>Mahasiswa Aktif</h1>
                        </div>
                        <div class="bg-[#C34444] p-6 rounded-2xl text-right">
                            <h1 class="text-2xl font-bold">22</h1>
                            <h1>Mahasiswa Cuti</h1>
                        </div>
                    </div>
                    <div class="grid grid-cols-6 text-center mt-16 pr-[5%] py-5 text-gray-500 dark:text-[#9CA3AF]   ">
                        <div class="space-y-4">
                            <h1 class="pb-2  font-semibold">No</h1>
                            <h1>1</h1>
                            <h1>2</h1>
                            <h1>3</h1>
                            <h1>4</h1>
                        </div>
                        <div class="space-y-4">
                            <h1 class="pb-2  font-semibold">Angkatan</h1>
                            <h1>2024</h1>
                            <h1>2023</h1>
                            <h1>2022</h1>
                            <h1>2021</h1>
                        </div>
                        <div class="space-y-4">
                            <h1 class="pb-2  font-semibold">Jumlah Mahasiswa</h1>
                            <h1>215</h1>
                            <h1>198</h1>
                            <h1>165</h1>
                            <h1>40</h1>
                        </div>
                        <div class="space-y-4">
                            <h1 class="pb-2  font-semibold">Aktif</h1>
                            <h1>215</h1>
                            <h1>195</h1>
                            <h1>150</h1>
                            <h1>36</h>
                        </div>
                        <div class="space-y-4">
                            <h1 class="pb-2  font-semibold">Cuti</h1>
                            <h1>0</h1>
                            <h1>3</h1>
                            <h1>15</h1>
                            <h1>4</h1>
                        </div>
                        <div class="space-y-4">
                            <h1 class="pb-2  font-semibold">Rata-rata IPK</h1>
                            <h1>3.9</h1>
                            <h1>3.1</h1>
                            <h1>3.3</h1>
                            <h1>3.8</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
@endsection