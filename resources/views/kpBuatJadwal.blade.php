@extends('header')

@section('title','Buat Jadwal')

@section('page')

    <x-navbar>

    </x-navbar>

    <div class="flex pt-12 overflow-hidden">

        {{-- sidebar --}}
  
          <x-side-bar :active="request()->route()->getName()">
              
          </x-side-bar>
        {{-- end sidebar --}}
  k
  
        <div id="main-content" class="relative text-gray-900 dark:text-gray-200 font-poppins w-full h-full overflow-y-auto lg:pl-52">
            <div class="px-8 py-8">
                <div class="bg-white border border-gray-200 rounded-3xl shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-blek-700">
                    <div class="2xl:col-span-2 sm:p-6 ">
                        <div class="flex justify-between">
                            <input id="searchMk" type="text" placeholder="Cari Mata Kuliah" class="bg-white dark:bg-gray-700 rounded-lg">
                            <li class="list-none relative">
                                <button type="button" class="flex px-14 py-4 text-center items-center text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-800 dark:text-gray-200 bg-gray-700" aria-controls="dropdown-layouts" data-collapse-toggle="dropdown-layouts" onclick="toggleDropdown()">
                                  <span class="flex-1 ml-3 text-left whitespace-nowrap">Mata Kuliah</span>
                                  <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                  </svg>
                                </button>
                              
                                <!-- Dropdown -->
                                <ul id="dropdown-layouts" class="hidden justify py-2 w-60 space-y-2 z-50 absolute right-0 bg-white dark:bg-gray-700 rounded-lg shadow-md max-h-60 overflow-y-auto">
                                    @foreach ($data as $jadwal) 
                                      @if ($jadwal->status == 'Belum Dibuat')
                                        <li>
                                          <button type="button" data-modal-target="updateModal-{{ $jadwal->id }}" data-modal-toggle="updateModal-{{ $jadwal->id }}"  class="flex items-center p-2 text-gray-900 dark:text-gray-200 pl-11 group hover:bg-gray-100 dark:hover:bg-gray-700" href="">{{ $jadwal->matakuliah }} {{ $jadwal->kelas }}</button>
                                        </li>
                                      @endif
                                    @endforeach
                                </ul>    
                            </li> 
                        </div>
                        @if ($jadwal->belumDibuatCount != 0)
                        <h1 class="mt-4 text-red-500">Terdapat {{ $jadwal->belumDibuatCount }} jadwal belum dibuat</h1>
                        @endif
                    </div>
                    <table id="Jadwal" class = "display">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kelas</th>
                                    <th>Hari</th>
                                    <th>Jam</th>
                                    <th>Ruang</th>
                                    <th>Kapasitas</th>
                                    <th>Aksi</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $jadwal)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $jadwal->matakuliah }} {{ $jadwal->kelas }}</td>
                                        <td>{{ $jadwal->hari }}</td>
                                        <td>{{ $jadwal->jammulai }} - {{ $jadwal->jamselesai }}</td>
                                        <td>{{ $jadwal->ruang }}</td>
                                        <td>{{ $jadwal->kapasitas }}</td>
                                        <td>
                                            <button type="button" data-modal-target="updateModal-{{ $jadwal->id }}" data-modal-toggle="updateModal-{{ $jadwal->id }}"class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 px-5 py-2 text-xs font-medium text-center rounded-lg ">Buat</button>
                                        </td>
                                        <td>
                                            <span class="{{ 
                                                $jadwal->status == 'Pending' ? 'bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-yellow-900 dark:text-yellow-300' : 
                                                ($jadwal->status == 'Disetujui' ? 'bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300' : 'bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300') 
                                                }}">{{ $jadwal->status }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
    
                            </tbody>
                    </table>
            
                     
                </div>
  
                @foreach ($data as $jadwal)
                {{-- editmodal --}}
                    <div id="updateModal-{{ $jadwal->id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-md max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <!-- Modal header -->
                                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                        Buat Jadwal
                                    </h3>
                                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="updateModal-{{ $jadwal->id }}">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal Edit Jadwal -->
                                <form class="p-4 md:p-5" action = "buatjadwal/{{ $jadwal->id }}" method = "POST">
                                    @csrf
                                    <div class="grid gap-4 mb-4 grid-cols-2">
                                        <div class="col-span-1 ">
                                            <label for="hari" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hari</label>
                                            <select id="hari-{{ $jadwal->id }}" name="hari" data-id="{{ $jadwal->id }}" class="hari bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                <option selected="">Plot Hari</option>
                                                <option value="1">Senin</option>
                                                <option value="2">Selasa</option>
                                                <option value="3">Rabu</option>
                                                <option value="4">Kamis</option>
                                                <option value="5">Jumat</option>
                                            </select>
                                        </div>
                                        <div class="col-span-1 ">
                                            <label for="ruang" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ruang</label>
                                            <select id="ruang-{{ $jadwal->id }}" name="ruang" data-id="{{ $jadwal->id }}" class="ruang bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                <option selected="">Ruang</option>
                                                @foreach ($dataruang as $ruang)
                                                    <option value="{{ $ruang->noruang }}">{{ $ruang->noruang }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-span-1 ">
                                            <label for="jam" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jam Mulai</label>
                                            <select id="jam-{{ $jadwal->id }}" name="jammulai" data-id="{{ $jadwal->id }}" class="jam bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                <option selected="">Jam</option>
                                                <option value="0">07.00</option>
                                                <option value="1">07.50</option>
                                                <option value="2">08.40</option>
                                                <option value="3">09.40</option>
                                                <option value="4">10.30</option>
                                                <option value="6">12.10</option>
                                                <option value="7">13.00</option>
                                                <option value="9">14.40</option>
                                                <option value="10">15.40</option>
                                                <option value="11">16.30</option>
                                            </select>
                                        </div>
                                        <div class="col-span-1" data-sks="{{ $jadwal->sks }}" id="sks-{{ $jadwal->id }}">
                                            <label for="jamselesai" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jam Selesai</label>
                                            <input type="text" name="jamselesai" id="jamselesai-{{ $jadwal->id }}" aria-label="disabled input" class=" bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" value="00:00" disabled>
                                        </div>
                                        <div class="col-span-1 ">
                                            <label for="kapasitas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kapasitas</label>
                                            <input type="number" name="kapasitas" id="kapasitas" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="example : 50" required="">
                                        </div>  
                                    </div>
                                    <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                                        Buat Jadwal
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div> 
                {{-- endedilmodal --}} 
                @endforeach

  
            </div>
        </div>


        <script>
            function toggleDropdown() {
              const dropdown = document.getElementById('dropdown-layouts');
              dropdown.classList.toggle('hidden');
            }
          </script>
        {{-- datatable  --}}
        <script>
            $(document).ready( function () {
                var tableMk = $('#Jadwal').DataTable({
                    pageLength : [10,25,50,100],
                    pageLength: -1, 
                    layout :{
                        topStart: null,
                        topEnd: null,
                        bottomStart: 'pageLength',
                        bottomEnd: 'paging'
                    },
                    "columnDefs": [
                        {className: "dt-head-center", "targets": [0,1,2,3,4,5,6,7] },
                        {className: "dt-body-center", "targets": [0,1,2,3,4,5,6,7] },
                    ],
                });

                setTimeout(() => {
                    tableMk.page.len(10).draw();
                }, 10);



                $('#searchMk').keyup(function() {
                    tableMk.search($(this).val()).draw();
                });



            } );
        </script>
        {{-- datatble_end --}}

        <script>
            const jamEnd = {
                1: '07:50',
                2: '08:40',
                3: '09:30',
                4: '10:30',
                5: '11:20',
                6: '12:10',
                7: '13:00',
                8: '13:50',
                9: '14:40',
                10: '15:30',
                11: '16:30',
                12: '17:20',
                13: '18:10',
            };
            

            $('.jam').on('change', function() {
                let id = $(this).data('id');
                let jamVal = parseInt($(this).val());
                let sks = parseInt($(`#sks-${id}`).data('sks'));
                let jamSelesai = jamEnd[jamVal + sks];
                $(`#jamselesai-${id}`).val(jamSelesai);
                console.log(jamVal+sks);
            });

            function checkInputsFilled(id) {
                let hari = $(`#hari-${id}`).val();
                let ruang = $(`#ruang-${id}`).val();
                let jammulai = $(`#jam-${id}`).val();
                let sks = $(`#sks-${id}`).data('sks');

                if (hari && ruang && jammulai && hari !== 'Plot Hari' && ruang !== 'Ruang' && jammulai !== 'Jam') {
                    
                    checkJadwalExist(id, hari, ruang, jammulai, sks);
                }
            }

            function checkJadwalExist(id, hari, ruang, jammulai, sks) { 
                jamselesai = parseInt(jammulai) + parseInt(sks);
                $.ajax({
                    url: "/checkjadwal",  
                    method: "POST",
                    data: {
                        _token: "{{ csrf_token() }}", 
                        hari: hari,
                        jammulai: jammulai,
                        jamselesai: jamselesai,
                        ruang: ruang
                    },
                    success: function(response) {
                        data = response.data;
                        if (response.bool === true) {
                            alert(`Jadwal sudah terpakai oleh ${data[0].matakuliah} ${data[0].kelas}`);
                        }else{
                            alert('Jadwal belum terpakai!');
                        }
                    },
                    error: function() {
                        //show why error
                        console.log('error');
                        alert('Error checking jadwal');
                    }
                });
            }

            $('.hari, .ruang, .jam').on('change', function() {
                let id = $(this).data('id');
                checkInputsFilled(id);
            });




        </script>
        


@endsection
