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
                            <th class="w-[25%]" data-orderable="false">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $mhs)
                        <tr>
                            <td class="[10%]">{{ $loop->iteration }}</td>
                            <td class="[25%]">{{ $mhs->nim }}</td>
                            <td class="[30%]">{{ $mhs->nama }}</td>
                            <td class="[25%]">
                                        <button id="approve-btn-{{ $loop->iteration }}" type="button" 
                                            onclick="approvePerubahanIrs('{{ $mhs->nama }}', '{{ $mhs->email }}')" 
                                            class="text-white bg-[#2ACD7F] px-3 py-2 text-xs font-medium text-center rounded-lg ml-2">Setuju</button>
                                        
                                        <button id="reject-btn-{{ $loop->iteration }}" type="button" 
                                            onclick="rejectPerubahanIrs('{{ $mhs->nama }}' ,'{{ $mhs->email }}')" 
                                            class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 px-3 py-2 text-xs font-medium text-center rounded-lg ml-2">Tolak</button>
                                        <button data-modal-target="timeline-{{ $loop->iteration }}" data-modal-toggle="timeline-{{ $loop->iteration }}" class="text-white bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 px-3 py-2 text-xs font-medium text-center rounded-lg ml-2" type="button">
                                            Detail
                                        </button>
                                </td>
                            </tr>
                        @endforeach
                        
                    </tbody>
            </table> 
        </div>
                
            </div>
        </div>

        @foreach ($data as $mhs)
             <!-- Main modal -->
            <div id="timeline-{{ $loop->iteration }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-md max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <!-- Modal header -->
                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                    Detail IRS : {{ $mhs->nama }}
                                </h3>
                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm h-8 w-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="timeline-{{ $loop->iteration }}">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <div class="p-4 md:p-5">
                                <ol class="relative border-s border-gray-200 dark:border-gray-600 ms-3.5 mb-4 md:mb-5">  
                                    @foreach ($mhs->datairs as $itemirs)
                                        <li class="mb-10 ms-8">            
                                            <span class="absolute flex items-center justify-center w-6 h-6 bg-gray-100 rounded-full -start-3.5 ring-8 ring-white dark:ring-gray-700 dark:bg-gray-600">
                                                <svg class="w-2.5 h-2.5 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20"><path fill="currentColor" d="M6 1a1 1 0 0 0-2 0h2ZM4 4a1 1 0 0 0 2 0H4Zm7-3a1 1 0 1 0-2 0h2ZM9 4a1 1 0 1 0 2 0H9Zm7-3a1 1 0 1 0-2 0h2Zm-2 3a1 1 0 1 0 2 0h-2ZM1 6a1 1 0 0 0 0 2V6Zm18 2a1 1 0 1 0 0-2v2ZM5 11v-1H4v1h1Zm0 .01H4v1h1v-1Zm.01 0v1h1v-1h-1Zm0-.01h1v-1h-1v1ZM10 11v-1H9v1h1Zm0 .01H9v1h1v-1Zm.01 0v1h1v-1h-1Zm0-.01h1v-1h-1v1ZM10 15v-1H9v1h1Zm0 .01H9v1h1v-1Zm.01 0v1h1v-1h-1Zm0-.01h1v-1h-1v1ZM15 15v-1h-1v1h1Zm0 .01h-1v1h1v-1Zm.01 0v1h1v-1h-1Zm0-.01h1v-1h-1v1ZM15 11v-1h-1v1h1Zm0 .01h-1v1h1v-1Zm.01 0v1h1v-1h-1Zm0-.01h1v-1h-1v1ZM5 15v-1H4v1h1Zm0 .01H4v1h1v-1Zm.01 0v1h1v-1h-1Zm0-.01h1v-1h-1v1ZM2 4h16V2H2v2Zm16 0h2a2 2 0 0 0-2-2v2Zm0 0v14h2V4h-2Zm0 14v2a2 2 0 0 0 2-2h-2Zm0 0H2v2h16v-2ZM2 18H0a2 2 0 0 0 2 2v-2Zm0 0V4H0v14h2ZM2 4V2a2 2 0 0 0-2 2h2Zm2-3v3h2V1H4Zm5 0v3h2V1H9Zm5 0v3h2V1h-2ZM1 8h18V6H1v2Zm3 3v.01h2V11H4Zm1 1.01h.01v-2H5v2Zm1.01-1V11h-2v.01h2Zm-1-1.01H5v2h.01v-2ZM9 11v.01h2V11H9Zm1 1.01h.01v-2H10v2Zm1.01-1V11h-2v.01h2Zm-1-1.01H10v2h.01v-2ZM9 15v.01h2V15H9Zm1 1.01h.01v-2H10v2Zm1.01-1V15h-2v.01h2Zm-1-1.01H10v2h.01v-2ZM14 15v.01h2V15h-2Zm1 1.01h.01v-2H15v2Zm1.01-1V15h-2v.01h2Zm-1-1.01H15v2h.01v-2ZM14 11v.01h2V11h-2Zm1 1.01h.01v-2H15v2Zm1.01-1V11h-2v.01h2Zm-1-1.01H15v2h.01v-2ZM4 15v.01h2V15H4Zm1 1.01h.01v-2H5v2Zm1.01-1V15h-2v.01h2Zm-1-1.01H5v2h.01v-2Z"/></svg>
                                            </span>
                                            <h3 class="flex items-start mb-1 text-lg font-semibold text-gray-900 dark:text-white">{{ $itemirs->matakuliah }} {{ $itemirs->kelas }} </h3>
                                            <time class="block mb-3 text-sm font-normal leading-none text-gray-500 dark:text-gray-400">{{ $itemirs->kodemk }} | {{ $itemirs->sks }} SKS</time>
                                            
                                        </li>
                                        
                                    @endforeach                
   
                                </ol>
                            </div>
                        </div>
                </div>
            </div> 
            
        @endforeach

        

        <script>
            function approvePerubahanIrs(nama, email) {
                Swal.fire({
                  title: "Are you sure to approve the IRS change request for " + nama + "?",
                  text: "You won't be able to revert this!",
                  icon: "warning",
                  showCancelButton: true,
                  confirmButtonColor: "#3085d6",
                  cancelButtonColor: "#d33",
                  confirmButtonText: "Yes, approve it!"
                }).then((result) => {
                if (result.isConfirmed) {
                  $.ajax({
                    url: "{{ route('irs.approvePerubahan') }}",
                    type: "POST",
                    data: {
                      _token: '{{ csrf_token() }}',
                      email: email
                    },
                    success: function(response) {
                      Swal.fire({
                        title: "Approved!",
                        text: "IRS change request approved for " + nama,
                        icon: "success"
                      }).then(() => {
                        location.reload();
                      });
                    }
                  });
                }
              });
            }
        </script>
        <script>
            function rejectPerubahanIrs(nama, email) {
                Swal.fire({
                  title: "Are you sure to reject the IRS change request for " + nama + "?",
                  text: "You won't be able to revert this!",
                  icon: "warning",
                  showCancelButton: true,
                  confirmButtonColor: "#3085d6",
                  cancelButtonColor: "#d33",
                  confirmButtonText: "Yes, reject it!"
                }).then((result) => {
                if (result.isConfirmed) {
                  $.ajax({
                    url: "{{ route('irs.rejectPerubahan') }}",
                    type: "POST",
                    data: {
                      _token: '{{ csrf_token() }}',
                      email: email
                    },
                    success: function(response) {
                      Swal.fire({
                        title: "Rejected!",
                        text: "IRS change request rejected for " + nama,
                        icon: "error"
                      }).then(() => {
                        location.reload();
                      });
                    }
                  });
                }
              });
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