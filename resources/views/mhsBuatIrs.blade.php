@extends('header')

@section('title','Buat IRS')

@section('page')


  {{-- navbar --}}
    <x-navbar></x-navbar>
    
  {{-- endnavbar --}}

    <div class="flex pt-12 overflow-hidde">

      {{-- sidebar --}}

        <x-side-bar-mhs :active="request()->route()->getName()">
            
        </x-side-bar-mhs>
      {{-- end sidebar --}}


      <div id="main-content" class="relative w-full h-full font-poppins overflow-y-auto lg:mt-4 bg-gray-50 lg:ml-52 dark:bg-blek-900">
        
        <div class="flex justify-between mx-14 my-8">
          <h1 class=" text-3xl font-semibold text-gray-900 dark:text-gray-200">Buat IRS</h1>
          <input type="text" placeholder="Search" class="bg-white dark:bg-blek-700 rounded-lg">
        </div>
        <div class="mt-2 mx-14 bg-white border border-gray-200 font-semibold text-[#374250] dark:text-white rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-blek-700">
          <h1 class="mb-4">Pilihan Mata Kuliah Semester 5</h1>
          <div>
              <h2 class="mt-4">Aljabar Linear - PAIK6204 (3 SKS)</h2>
              <hr class="h-px my-4 bg-gray-200 border-0 dark:bg-gray-700">
              <div class="mt-4">
                  <div class="flex items-center mb-4">
                      <input type="radio" name="alin" id="alin_a" class="mr-2">
                      <label for="alin_a">Aljabar Linear - A</label>
                  </div>
                  <hr class="h-px my-4 bg-gray-200 border-0 dark:bg-gray-700">
                  
                  <div class="flex items-center mb-4">
                      <input type="radio" name="alin" id="alin_b" class="mr-2">
                      <label for="alin_b">Aljabar Linear - B</label>
                  </div>
                  <hr class="h-px my-4 bg-gray-200 border-0 dark:bg-gray-700">
                  
                  <div class="flex items-center mb-4">
                      <input type="radio" name="alin" id="alin_c" class="mr-2">
                      <label for="alin_c">Aljabar Linear - C</label>
                  </div>
                  <hr class="h-px my-4 bg-gray-200 border-0 dark:bg-gray-700">
                  
                  <div class="flex items-center mb-4">
                      <input type="radio" name="alin" id="alin_d" class="mr-2">
                      <label for="alin_d">Aljabar Linear - D</label>
                  </div>
              </div>
          </div>
      </div>
      
        </div>

      </div>


    </div>


@endsection
