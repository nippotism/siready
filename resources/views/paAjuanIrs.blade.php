@extends('header')

@section('title','Ajuan IRS')

@section('page')

    <x-navbar>

    </x-navbar>

    <div class="flex pt-12 overflow-hidden">

        {{-- sidebar --}}
  
          <x-side-bar :active="request()->route()->getName()">
              
          </x-side-bar>
        {{-- end sidebar --}}
  
  
        <div id="main-content" class="relative text-gray-900 dark:text-gray-200 font-poppins w-full h-full overflow-y-auto lg:pl-52">
            <div class="">
                <div class="2xl:col-span-2 sm:p-6 ">
                    <div class="flex justify-between gap-10">
                        <div class="flex gap-10 ">
                            {{-- <div>            
                                <button id="dropdownButton1" data-dropdown-toggle="dropdownMenu1" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                                    Strata 
                                    <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                    </svg>
                                </button>
                        
                                <!-- Dropdown menu -->
                                <div id="dropdownMenu1" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownButton1">
                                        <li>
                                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">S1</a>
                                        </li>
                                        <li>
                                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">S2</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div>            
                                <button id="dropdownButton2" data-dropdown-toggle="dropdownMenu2" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                                    Jurusan 
                                    <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                    </svg>
                                </button>
                        
                                <!-- Dropdown menu -->
                                <div id="dropdownMenu2" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownButton2">
                                        <li>
                                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Informatika</a>
                                        </li>
                                        <li>
                                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sistem Informasi</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div>            
                                <button id="dropdownButton3" data-dropdown-toggle="dropdownMenu3" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                                    Angkatan 
                                    <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                    </svg>
                                </button>
                        
                                <!-- Dropdown menu -->
                                <div id="dropdownMenu3" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownButton2">
                                        <li>
                                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">2020</a>
                                        </li>
                                        <li>
                                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">2021</a>
                                        </li>
                                        <li>
                                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">2024</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div>            
                                <button id="dropdownButton4" data-dropdown-toggle="dropdownMenu4" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                                    Kelas 
                                    <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                    </svg>
                                </button>
                                
                                <!-- Dropdown menu -->
                                <div id="dropdownMenu4" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownButton2">
                                        <li>
                                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">A</a>
                                        </li>
                                        <li>
                                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">B</a>
                                        </li>
                                        <li>
                                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">C</a>
                                        </li>
                                        <li>
                                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">D</a>
                                        </li>
                                    </ul>
                                </div>
                            </div> --}}
                        </div>
                        <div>
                            <div class="mt-4 mr-12">
                                <button id="selectAll" class=" bg-[#2ACD7F] hover:bg-[#2fff8d] dark:hover:bg-green-500 border-[#2ACD7F] border focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center " type="button">
                                    Setujui Semua 
                                </button> 
                            </div>
                        </div>
                    </div>
                </div> 
                <div class=" mx-16">
                    <table id="ajuan-irs" class = "display w-full text-center">
                        <thead>
                            <tr class="-center text-center">
                                <th class="w-[10%]">No</th>
                                <th class="w-[25%]">NIM</th>
                                <th class="w-[30%]">Nama</th>
                            <th class="w-[10%]">Jumlah SKS</th>
                            <th class="w-[25%]" data-orderable="false">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $mhs)
                        <tr>
                            <td class="[10%]">{{ $loop->iteration }}</td>
                            <td class="[25%]">{{ $mhs->nim }}</td>
                            <td class="[30%]">{{ $mhs->nama }}</td>
                            <td class="[10%]">{{ $mhs->total_sks }}</td>
                            <td class="[25%]">
                                    @if ($mhs->all_pending)
                                        <button id="approve-btn-{{ $loop->iteration }}" type="button" 
                                            onclick="approveIrs('{{ $mhs->nama }}', '{{ $mhs->email }}')" 
                                            class="text-white bg-[#2ACD7F] px-3 py-2 text-xs font-medium text-center rounded-lg ml-2">Setuju</button>
                                        
                                        <button id="reject-btn-{{ $loop->iteration }}" type="button" 
                                            onclick="rejectIrs('{{ $mhs->nama }}' ,'{{ $mhs->email }}')" 
                                            class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 px-3 py-2 text-xs font-medium text-center rounded-lg ml-2">Tolak</button>
                                        <a type="button" class="text-white bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 px-3 py-2 text-xs font-medium text-center rounded-lg ml-2">
                                            Detail
                                        </a>
                                        @endif
                                </td>
                            </tr>
                        @endforeach
                        
                    </tbody>
            </table> 
        </div>
                
            </div>
        </div>

        <script>
            function approveIrs(nama, email) {
                if(confirm("Are you sure to approve the schedule for " + nama + "?")) {
                    $.ajax({
                        url: "{{ route('irs.approve') }}",
                        type: "POST",
                        data: {
                            _token: '{{ csrf_token() }}',
                            email: email
                        },
                        success: function(response) {
                            alert('IRS berhasil disetujui untuk ' + nama);
                            location.reload(); // Reload the page to reflect changes
                        }
                    });
                }
            }
        </script>
        <script>
            function rejectIrs(nama, email) {
                if(confirm("Are you sure to reject the schedule for " + nama + "?")) {
                    $.ajax({
                        url: "{{ route('irs.reject') }}",
                        type: "POST",
                        data: {
                            _token: '{{ csrf_token() }}',
                            email: email
                        },
                        success: function(response) {
                            alert('IRS ditolak untuk ' + nama);
                            location.reload(); // Reload the page to reflect changes
                        }
                    });
                }
            }
        </script>
        
        {{-- datatable  --}}
        <script>
            $(document).ready( function () {
                var tableRuang = $('#ajuan-irs').DataTable({
                    layout: {
                        topStart: null,
                        topEnd: null,
                        bottomStart: 'pageLength',
                        bottomEnd: 'paging'
                    }
                });
        
                $('#searchRuang').keyup(function() {
                    tableRuang.search($(this).val()).draw();
                });
            });
        </script>
        
    {{-- datatble_end --}}

@endsection