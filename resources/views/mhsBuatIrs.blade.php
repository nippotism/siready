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
        @foreach ($data as $matkul) 
        <div class="mt-2 mb-8 mx-14 bg-white border border-gray-200 font-semibold text-[#374250] dark:text-white rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-blek-700">
          <h2 class="mt-4">{{ $matkul->matakuliah }} - {{ $matkul->kodemk }} ({{ $matkul->sks }} SKS)</h2>
          <div class=" mt-4">
            <div class="overflow-x-auto text-m font-normal">
              <table class="min-w-full text-center table-auto">
                <thead>
                  
                </thead>
                <tbody>
                  @foreach($matkul->kelas as $kelas)
                  <tr class="border-y">
                    <td class="px-auto py-4 w-[10%]"><input type="radio" name="class" /></td>
                    <td class="px-auto py-4 w-[40%]">{{ $matkul->matakuliah }} {{ $kelas->kelas }}</td>
                    <td class="px-auto py-4 w-[10%]">{{ $kelas->kapasitas }}</td>
                    <td class="px-auto py-4 w-[20%]">{{ $kelas->hari }}, {{ $kelas->jam }}</td>
                    <td class="px-auto py-4 w-[20%]">{{ $kelas->ruang }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
        @endforeach


    </div>


@endsection
