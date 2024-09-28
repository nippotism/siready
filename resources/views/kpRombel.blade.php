@extends('header')

@section('title','Atur Rombel')

@section('page')
    <x-navbar>

    </x-navbar>

    <div class="flex pt-12 overflow-hidden">

        {{-- sidebar --}}
  
          <x-side-bar :active="request()->route()->getName()">

          </x-side-bar>
        {{-- end sidebar --}}
  
  
        <div id="main-content" class="relative text-gray-900 dark:text-gray-200 font-poppins w-full h-full overflow-y-auto lg:pl-52">
            <div class=" py-8">
                <div class="2xl:col-span-2 sm:p-6 ">
                    <div class="flex justify-between">
                        <button id="selectAll" class="text-white bg-[#2ACD7F] hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                            Angkatan 
                        </button> 
                        <input type="text" placeholder="Search" class="bg-white dark:bg-gray-700 rounded-lg">
                    </div>
                </div> 
                <table class="w-full text-center">
                    <thead class="bg-gray-500 text-white dark:bg-[#283445]">
                        <tr>
                            <th class="w-[10%] py-6 px-7">No</th>
                            <th class="w-[20%] py-6 px-7">NIM</th>
                            <th class="w-[25%] py-6 px-7">Nama Mahasiswa</th>
                            <th class="w-[15%] py-6 px-7">IPK</th>
                            <th class="w-[15%] py-6 px-7">Kelas</th>
                            <th class="w-[10%] py-6 px-7">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="py-4">1</td>
                            <td class="py-4">24060122110002</td>
                            <td class="py-4">Gibran Rakabuming</td>
                            <td class="py-4">2.3</td>
                            <td class="py-4">B</td>
                            <td class="py-4">
                                <button class="text-white px-4 py-2 bg-[#2ACD7F] hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xs text-center dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                                    Edit
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-4">1</td>
                            <td class="py-4">24060122110002</td>
                            <td class="py-4">Gibran Rakabuming</td>
                            <td class="py-4">2.3</td>
                            <td class="py-4">B</td>
                            <td class="py-4">
                                <button class="text-white px-4 py-2 bg-[#2ACD7F] hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xs text-center dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                                    Edit
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-4">1</td>
                            <td class="py-4">24060122110002</td>
                            <td class="py-4">Gibran Rakabuming</td>
                            <td class="py-4">2.3</td>
                            <td class="py-4">B</td>
                            <td class="py-4">
                                <button class="text-white px-4 py-2 bg-[#2ACD7F] hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xs text-center dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                                    Edit
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-4">1</td>
                            <td class="py-4">24060122110002</td>
                            <td class="py-4">Gibran Rakabuming</td>
                            <td class="py-4">2.3</td>
                            <td class="py-4">B</td>
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