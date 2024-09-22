@extends('header')

@section('title','Buat Ruang')

@section('page')

    <x-navbar>

    </x-navbar>

    <div class="flex pt-12 overflow-hidden">

        {{-- sidebar --}}
  
          <x-side-bar-dekan :active="request()->route()->getName()">
              
          </x-side-bar-dekan>
        {{-- end sidebar --}}
  k
  
        <div id="main-content" class="relative text-gray-900 dark:text-gray-200 font-poppins w-full h-full overflow-y-auto lg:pl-52">
            <div class="px-8 py-8">
                <div class="bg-white border border-gray-200 rounded-3xl shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-blek-700">
                    <div class="2xl:col-span-2 sm:p-6 ">
                        <div class="flex justify-between">
                            <input id = "searchRuang" type="text" placeholder="Cari Ruang" class="bg-white dark:bg-gray-700 rounded-lg">
                            <button id="selectAll" type="button" onclick="updateStatus('all', 'Disetujui')" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center">
                                Setujui Semua 
                            </button>                            
                        </div>
                    </div>
                    <table id="Ruang" class = "display w-full text-center">
                            <thead>
                                <tr class="-center text-center">
                                    <th class="w-[5%]">No</th>
                                    <th class="w-[10%]">No Ruang</th>
                                    <th class="w-[10%]">Blok Gedung</th>
                                    <th class="w-[10%]">Lantai</th>
                                    <th class="w-[20%]">Fungsi</th>
                                    <th class="w-[10%]">Kapasitas</th>
                                    <th class="w-[15%]">Status</th>
                                    <th class="w-[20%]" data-orderable="false">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $ruang)
                                    <tr>
                                        <td class="[5%]">{{ $loop->iteration }}</td>
                                        <td class="[10%]">{{ $ruang->noruang }}</td>
                                        <td class="[10%]">{{ $ruang->blokgedung }}</td>   
                                        <td class="[10%]">{{ $ruang->lantai }}</td>
                                        <td class="[20%]">{{ $ruang->fungsi }}</td>
                                        <td class="[10%]">{{ $ruang->kapasitas }}</td>
                                        <td id="statusNow-{{ $ruang->id }}" class="[10]">{{ $ruang->status }}</td>
                                        <td class="[25%]">
                                            <button type="button" data-modal-target="detailModal-{{ $ruang->id }}" data-modal-toggle="detailModal-{{ $ruang->id }}"class=" text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 px-3 py-2 text-xs font-medium text-center rounded-lg ">Detail</button>
                                            @if ($ruang->status == 'Pending')
                                                <button id="approve-btn-{{ $ruang->id }}" type="button" onclick="approve({{ $ruang->id }})" class="text-white bg-[#2ACD7F] px-3 py-2 text-xs font-medium text-center rounded-lg ml-2">Setuju</button>
                                                <button id="reject-btn-{{ $ruang->id }}" type="button" onclick="reject({{ $ruang->id }})" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 px-3 py-2 text-xs font-medium text-center rounded-lg ml-2">Tolak</button>
                                            @endif

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                    </table>    
                </div>
  
            
                @foreach ($data as $ruang)
                {{-- editmodal --}}
                    <div id="detailModal-{{ $ruang->id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-md max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <!-- Modal header -->
                                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                        Detail Ruang
                                    </h3>
                                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="detailModal-{{ $ruang->id }}">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal Edit Ruang -->
                                <form class="p-4 md:p-5" action = "ruang/{{ $ruang->id }}" method = "GET">
                                    @csrf
                                    @method('GET')
                                    <div class="grid gap-4 mb-4 grid-cols-2">
                                        <div class="col-span-1">
                                            <label for="noruang" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No Ruang</label>
                                            <h1>{{ $ruang->noruang }}</h1>
                                        </div>
                                        <div class="col-span-2 sm:col-span-1">
                                            <label for="blokgedung" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Blok Gedung</label>
                                            <h1>{{ $ruang->blokgedung }}</h1>
                                        </div>
                                        <div class="col-span-2 sm:col-span-1">
                                            <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fungsi</label>
                                            <h1>{{ $ruang->fungsi }}</h1>
                                        </div>
                                        <div class="col-span-2 sm:col-span-1">
                                            <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kapasitas</label>
                                            <h1>{{ $ruang->kapasitas }}</h1>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                {{-- endedilmodal  --}}

            
                    
                @endforeach

  
            </div>
        </div>



        {{-- datatable  --}}
            <script>
                $(document).ready( function () {
                    var tableRuang = $('#Ruang').DataTable({
                        layout :{
                            topStart: null,
                            topEnd: null,
                            bottomStart: 'pageLength',
                            bottomEnd: 'paging'
                        }
                    });

                    $('#searchRuang').keyup(function() {
                        tableRuang.search($(this).val()).draw();
                    });
                } );
            </script>
        {{-- datatble_end --}}
        <script>

        
        // Update status untuk semua ID yang terpilih
        function approve(id) {
            updateStatus(id, 'Disetujui');
        }
        
        function reject(id) {
            updateStatus(id, 'Ditolak');
        }
        
        function updateStatus(id, status) {
            $.ajax({
                url: `/ruang/${id}/update-status`, // Route untuk update status
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    status: status
                },
                success: function(response) {
                if (id === 'all') {
                    console.log(response);
                    // Jika mengupdate semua, update status di table untuk semua
                    response.data.forEach(function(ruang) {
                        $('#statusNow-' + ruang.id).text(status);
                        $('#approve-btn-' + ruang.id).hide();
                        $('#reject-btn-' + ruang.id).hide();
                    });
                } 
                else {
                    $('#statusNow-' + id).text(status);
                    $('#approve-btn-' + id).hide();
                    $('#reject-btn-' + id).hide();
                }
                },
                error: function(xhr) {
                    alert('Gagal memperbarui status.');
                }
            });
        }

        </script>
        
        
        
@endsection
