@extends('header')

@section('title','Buat Ruang')

@section('page')

    <x-navbar>

    </x-navbar>

    <div class="flex pt-12 overflow-hidden">

        {{-- sidebar --}}
  
          <x-side-bar-ba :active="request()->route()->getName()">
              
          </x-side-bar-ba>
        {{-- end sidebar --}}
  k
  
        <div id="main-content" class="relative text-gray-900 dark:text-gray-200 font-poppins w-full h-full overflow-y-auto lg:pl-52">
            <div class="px-8 py-8">
                <div class="bg-white border border-gray-200 rounded-3xl shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-blek-700">
                    <div class="2xl:col-span-2 sm:p-6 ">
                        <div class="flex justify-between">
                            <input id = "searchRuang" type="text" placeholder="Cari Ruang" class="bg-white dark:bg-gray-700 rounded-lg">
                            <button id="selectAll" data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center" type="button">
                                Buat Ruang + 
                            </button> 
                        </div>
                    </div>
                    <table id="Ruang" class = "display">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No Ruang</th>
                                    <th>Blok Gedung</th>
                                    <th>Lantai</th>
                                    <th>Fungsi</th>
                                    <th>Kapasitas</th>
                                    <th data-orderable="false">Aksi</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $ruang)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $ruang->noruang }}</td>
                                        <td>{{ $ruang->blokgedung }}</td>   
                                        <td>{{ $ruang->lantai }}</td>
                                        <td>{{ $ruang->fungsi }}</td>
                                        <td>{{ $ruang->kapasitas }}</td>
                                        <td>
                                            <button type="button"  data-modal-target="updateModal-{{ $ruang->id }}" data-modal-toggle="updateModal-{{ $ruang->id }}"class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 px-3 py-2 text-xs font-medium text-center rounded-lg ">Edit</button>
                                            <button type="button" data-modal-target="deleteModal-{{ $ruang->id }}" data-modal-toggle="deleteModal-{{ $ruang->id }}"class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 px-3 py-2 text-xs font-medium text-center rounded-lg ml-2">Delete</button>
                                        </td>   
                                        <td>
                                            <span class="{{ 
                                                $ruang->status == 'Pending' ? 'bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-yellow-900 dark:text-yellow-300' : 
                                                ($ruang->status == 'Disetujui' ? 'bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300' : 'bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300') 
                                                }}">{{ $ruang->status }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
    
                            </tbody>
                    </table>
            
                    
                </div>
  
                {{-- Create Ruang Modal --}}
                    <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-md max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <!-- Modal header -->
                                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                        Buat Ruang
                                    </h3>
                                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal Create Ruang -->
                                <form class="p-4 md:p-5" action = "{{ route('ruang.store') }}" method = "POST">
                                    @csrf
                                    <div class="grid gap-4 mb-4 grid-cols-2">
                                        <div class="col-span-2">
                                            <label for="noruang" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No Ruang</label>
                                            <input type="text" name="noruang" id="noruang" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="No Ruang" required="">
                                        </div>
                                        <div class="col-span-2 sm:col-span-1">
                                            <label for="blokgedung" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Blok Gedung</label>
                                            <input type="text" name="blokgedung" id="blokgedung" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Blok Gedung" required="">
                                        </div>
                                        <div class="col-span-2 sm:col-span-1">
                                            <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fungsi</label>
                                            <select id="lantai" name = "lantai" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                <option selected="">Pilih Lantai</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select>
                                        </div>
                                        <div class="col-span-2 sm:col-span-1">
                                            <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kapasitas</label>
                                            <input type="number" name="kapasitas" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="example : 50" required="">
                                        </div>
                                        <div class="col-span-2 sm:col-span-1">
                                            <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fungsi</label>
                                            <select id="category" name = "fungsi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                <option selected="">Pilih Fungsi</option>
                                                <option value="Ruang Kelas">Ruang Kelas</option>
                                                <option value="Lab Komputer">Lab Komputer</option>
                                                <option value="Ruang Seminar">Ruang Seminar</option>
                                            </select>
                                        </div>
                                    </div>
                                    <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                                        Tambah Ruang
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div> 
                {{-- create end --}}

                @foreach ($data as $ruang)
                {{-- editmodal --}}
                    <div id="updateModal-{{ $ruang->id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-md max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <!-- Modal header -->
                                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                        Edit Ruang
                                    </h3>
                                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="updateModal-{{ $ruang->id }}">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal Edit Ruang -->
                                <form class="p-4 md:p-5" action = "ruang/{{ $ruang->id }}" method = "POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="grid gap-4 mb-4 grid-cols-2">
                                        <div class="col-span-2">
                                            <label for="noruang" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No Ruang</label>
                                            <input type="text" name="noruang" id="noruang" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="No Ruang" value = "{{ $ruang->noruang }}"required="">
                                        </div>
                                        <div class="col-span-2 sm:col-span-1">
                                            <label for="blokgedung" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Blok Gedung</label>
                                            <input type="text" name="blokgedung" id="blokgedung" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Blok Gedung" value="{{ $ruang->blokgedung }}" required="">
                                        </div>
                                        <div class="col-span-2 sm:col-span-1">
                                            <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fungsi</label>
                                            <select id="lantai" name = "lantai" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                <option selected="">Pilih Lantai</option>
                                                <option value="1" {{ ($ruang->lantai)==1?'selected':'' }}>1</option>
                                                <option value="2" {{ ($ruang->lantai)==2?'selected':'' }}>2</option>
                                                <option value="3" {{ ($ruang->lantai)==3?'selected':'' }}>3</option>    
                                            </select>
                                        </div>
                                        <div class="col-span-2 sm:col-span-1">
                                            <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kapasitas</label>
                                            <input type="number" name="kapasitas" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="example : 50" value = "{{ $ruang->kapasitas }}"required="">
                                        </div>
                                        <div class="col-span-2 sm:col-span-1">
                                            <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fungsi</label>
                                            <select id="category" name = "fungsi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                <option selected="">Pilih Fungsi</option>
                                                <option value="Ruang Kelas" {{($ruang->fungsi)=='Ruang Kelas'?'selected':'' }}>Ruang Kelas</option>
                                                <option value="Lab Komputer" {{($ruang->fungsi)=='Lab Komputer'?'selected':'' }}>Lab Komputer</option>
                                                <option value="Ruang Seminar" {{($ruang->fungsi)=='Ruang Seminar'?'selected':'' }}>Ruang Seminar</option>
                                            </select>
                                        </div>
                                    </div>
                                    <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                                        Ubah Ruang
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div> 
                {{-- endedilmodal --}}

                {{-- deletemodal --}}
                    <div id="deleteModal-{{ $ruang->id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                        <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                            <!-- Modal content -->
                            <div class="relative p-4 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                                <button type="button" class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="deleteModal-{{ $ruang->id }}">
                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                                <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                <p class="mb-4 text-gray-500 dark:text-gray-300">Apakah anda yakin ingin menghapus ruang ini?</p>
                                <div class="flex justify-center items-center space-x-4">
                                    <button data-modal-toggle="deleteModal" type="button" class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                        Tidak
                                    </button>
                                    <form action="{{ route('ruang.destroy',$ruang->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                                            Yakin
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                {{-- endedeletemodal --}}


                    
                @endforeach

  
            </div>
        </div>



        {{-- datatable  --}}
            <script>
                $(document).ready( function () {
                    var tableRuang = $('#Ruang').DataTable({
                        pageLength : [10,25,50,100],
                        pageLength: -1, 
                        layout :{
                            topStart: null,
                            topEnd: null,
                            bottomStart: 'pageLength',
                            bottomEnd: 'paging'
                        },
                        "columnDefs": [
                            { className: "dt-head-center", "targets": [0,1,2,3,4,5,6] },
                            { className: "dt-head-right", "targets": [7] },
                            { className: "dt-body-center", "targets": [0,1,2,3,4,5,6] },
                            {className: "dt-body-right", "targets": [7]}
                        ],
                    });

                    setTimeout(() => {
                        tableRuang.page.len(10).draw();
                    }, 10);



                    $('#searchRuang').keyup(function() {
                        tableRuang.search($(this).val()).draw();
                    });
                } );
            </script>
        {{-- datatble_end --}}
@endsection
