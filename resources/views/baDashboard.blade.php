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
            <div class="px-8 py-8">
                <div class="bg-white border border-gray-200 rounded-3xl shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-blek-700">
                    <div class="grid grid-cols-3 gap-16 px-16 py-5">
                        <div class="bg-[#38A6D6] p-6 rounded-2xl text-right">
                            <h1 class="text-2xl font-bold">30</h1>
                            <h1>Pengajuan Ruangan</h1>
                        </div>
                        <div class="bg-[#2ACD7F] p-6 rounded-2xl text-right">
                            <h1 class="text-2xl font-bold">15</h1>
                            <h1>Ruang Tersedia</h1>
                        </div>
                        <div class="bg-[#C34444] p-6 rounded-2xl text-right">
                            <h1 class="text-2xl font-bold">2</h1>
                            <h1>Ruang Tidak Tersedia</h1>
                        </div>
                    </div>
                </div>
                <div class="pt-10">
                    <h1 class="font-semibold text-2xl pb-2">Plot Ruangan Fakultas Sains dan Matematika</h1>
                    <div class="grid grid-cols-3 text-center bg-white border border-gray-200 rounded-3xl shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-blek-700">
                        <div class="space-y-4">
                            <h1 class="pb-2  font-semibold">No</h1>
                            <h1>1</h1>
                            <h1>2</h1>
                            <h1>3</h1>
                            <h1>5</h1>
                            <h1>6</h1>
                            <h1>7</h1>
                            <h1>8</h1>
                        </div>
                        <div class="space-y-4">
                            <h1 class="pb-2  font-semibold">Program Studi</h1>
                            <h1>S1 Informatika</h1>
                            <h1>S1 Matematika</h1>
                            <h1>S2 Matematika</h1>
                            <h1>S1 Statistika</h1>
                            <h1>S1 Fisika</h1>
                            <h1>S1 Kimia</h1>
                            <h1>S1 Biologi</h1>
                        </div>
                        <div class="space-y-4">
                            <h1 class="pb-2  font-semibold">Jumlah Ruangan</h1>
                            <h1>10</h1>
                            <h1>15</h1>
                            <h1>4</h1>
                            <h1>12</h1>
                            <h1>11</h1>
                            <h1>8</h1>
                            <h1>13</h1>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
        
@endsection
