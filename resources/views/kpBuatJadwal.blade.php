@extends('header')

@section('title','Buat Jadwal')

@section('page')
    <x-navbar>

    </x-navbar>

    <div class="flex pt-12 overflow-hidden">

        {{-- sidebar --}}
  
          <x-side-bar-kp :active="request()->route()->getName()">

          </x-side-bar-kp>
        {{-- end sidebar --}}
  
  
        <div id="main-content" class="relative text-gray-900 dark:text-gray-200 font-poppins w-full h-full overflow-y-auto lg:pl-52">
            <div class=" py-8">
                <div class="2xl:col-span-2 sm:p-6 ">
                    <div class="flex justify-between">
                        <input type="text" placeholder="Search" class="bg-white dark:bg-gray-700 rounded-lg">
                        <button id="selectAll" class="text-white bg-[#2ACD7F] hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                            Buat Jadwal + 
                        </button> 
                    </div>
                </div> 
                <table class="w-full text-center">
                    <thead class="bg-gray-500 text-white dark:bg-[#283445]">
                        <tr>
                            <th class="w-[10%] py-6 px-7">MK</th>
                            <th class="w-[10%] py-6 px-7">Kelas</th>
                            <th class="w-[10%] py-6 px-7">Kormat</th>
                            <th class="w-[10%] py-6 px-7">Hari</th>
                            <th class="w-[15%] py-6 px-7">Jam</th>
                            <th class="w-[10%] py-6 px-7">Ruang</th>
                            <th class="w-[25%] py-6 px-7">Dosen Pengampu</th>
                            <th class="w-[10%] py-6 px-7">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="py-4">PPL</td>
                            <td class="py-4">A</td>
                            <td class="py-4">1</td>
                            <td class="py-4">Rabu</td>
                            <td class="py-4">13:00 - 15:30</td>
                            <td class="py-4">A303</td>
                            <td class="py-4">Dinar Mutiara </td>
                            <td class="py-4">
                                <button class="text-white px-4 py-2 bg-[#2ACD7F] hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xs text-center dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                                    Edit
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-4">PPL</td>
                            <td class="py-4">B</td>
                            <td class="py-4">2</td>
                            <td class="py-4">Rabu</td>
                            <td class="py-4">15:40 - 18:30</td>
                            <td class="py-4">A303</td>
                            <td class="py-4">Dinar Mutiara </td>
                            <td class="py-4">
                                <button class="text-white px-4 py-2 bg-[#2ACD7F] hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xs text-center dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                                    Edit
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-4">PPL</td>
                            <td class="py-4">C</td>
                            <td class="py-4">1</td>
                            <td class="py-4">Kamis</td>
                            <td class="py-4">09:40 - 12:30</td>
                            <td class="py-4">E101</td>
                            <td class="py-4">Dinar Mutiara </td>
                            <td class="py-4">
                                <button class="text-white px-4 py-2 bg-[#2ACD7F] hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xs text-center dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                                    Edit
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-4">PPL</td>
                            <td class="py-4">D</td>
                            <td class="py-4">1</td>
                            <td class="py-4">Kamis</td>
                            <td class="py-4">13:00 - 15:30</td>
                            <td class="py-4">E102</td>
                            <td class="py-4">Dinar Mutiara </td>
                            <td class="py-4">
                                <button class="text-white px-4 py-2 bg-[#2ACD7F] hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xs text-center dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                                    Edit
                                </button>
                            </td>
                        </tr>
                       
                    </tbody>
                </table>
                
            </div>
        </div>
        
@endsection