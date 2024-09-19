@extends('header')

@section('title','Transkrip')

@section('page')


    {{-- navbar --}}
      <x-navbar></x-navbar>
      
    {{-- endnavbar --}}
  
      <div class="flex pt-12 overflow-hidden">
  
        {{-- sidebar --}}
  
          <x-side-bar-mhs>
              
          </x-side-bar-mhs>
  
        {{-- end sidebar --}}
  
  
        <div id="main-content" class="relative w-full h-full font-poppins mx-16 text-gray-900 dark:text-gray-200 overflow-y-auto lg:pl-52">
            <h1 class="font-semibold text-2xl pb-7 mt-8 text-center">Transkrip Akademik</h1>
            <div class="grid grid-cols-5 p-7 h-[57vh] font-semibold text-sm bg-white dark:bg-blek-700 rounded-3xl text-center text-[#9CA3AF]">
                <div class="space-y-4">
                    <h1 class="text-gray-900 dark:text-white pb-2">No</h1>
                    <h1>1</h1>
                    <h1>2</h1>
                    <h1>3</h1>
                    <h1>4</h1>
                    <h1>5</h1>
                </div>
                <div class="space-y-4"">
                    <h1 class="text-gray-900 dark:text-white pb-2">Kode</h1>
                    <h1>PAIK6101</h1>
                    <h1>PAIK6102</h1>
                    <h1>PAIK6103</h1>
                    <h1>PAIK6104</h1>
                    <h1>PAIK6105</h1>
                </div>
                <div class="space-y-4"">
                    <h1 class="text-gray-900 dark:text-white pb-2">Mata Kuliah</h1>
                    <h1>MATEMATIKA 1</h1>
                    <h1>DASAR PEMROGRAMAN</h1>
                    <h1>DASAR SISTEM</h1>
                    <h1>LOGIKA INFORMATIKA</h1>
                    <h1>STRUKTUR DISKRIT</h1>
                </div>
                <div class="space-y-4"">
                    <h1 class="text-gray-900 dark:text-white pb-2">SKS</h1>
                    <h1>2</h1>
                    <h1>3</h1>
                    <h1>3</h1>
                    <h1>3</h1>
                    <h1>4</h1>
                </div>
                <div class="space-y-4"">
                    <h1 class="text-gray-900 dark:text-white pb-2">Nilai</h1>
                    <h1>A</h1>
                    <h1>A</h1>
                    <h1>A</h1>
                    <h1>A</h1>
                    <h1>A</h1>
                </div>
            </div>
            <div class="grid grid-cols-3 py-4">
                <div class="bg-[#2AA6CD] p-6 rounded-3xl text-right mx-9">
                    <h1 class="text-2xl font-bold">3.8</h1>
                    <h1>IP Kumulatif</h1>
                </div>
                <div class="bg-[#3478C7] p-6 rounded-3xl text-right mx-9">
                    <h1 class="text-2xl font-bold">86</h1>
                    <h1>SKS Kumulatif</h1>
                </div>
                <div class="bg-[#C34444] p-6 rounded-3xl text-right mx-9 flex flex-col items-end">
                    <img src="{{ asset('unduhPdf.png') }}" class="mb-2" width="25" alt="">
                    <h1>Unduh PDF</h1>
                </div>
            </div>
        </div>
    </div>

@endsection
