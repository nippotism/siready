@extends('header')

@section('title','Buat Ruang')

@section('page')

    <x-navbar>

    </x-navbar>

    <div class="flex pt-12 overflow-hidden">

        {{-- sidebar --}}
  
          <x-side-bar :active="request()->route()->getName()">
              
          </x-side-bar>
        {{-- end sidebar --}}

  
        <div id="main-content" class="relative text-gray-900 dark:text-gray-200 font-poppins w-full h-full overflow-y-auto lg:pl-52">
            <div class="px-8 py-8">
                <div class="bg-white border border-gray-200 rounded-3xl shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-blek-700">
                    <div class="2xl:col-span-2 sm:p-6 ">
                        <div class="flex">
                            <input id = "searchRuang" type="text" placeholder="Cari Ruang" class="bg-white dark:bg-gray-700 rounded-lg"> 
                        </div>
                    </div>
                    <table id="Ruang" class = "display w-full text-center">
                            <thead>
                                <tr class="-center text-center">
                                    <th class="w-[15%]">No</th>
                                    <th class="w-[30%]">Program Studi</th>
                                    <th class="w-[30%]">Jumlah Jadwal</th>
                                    <th class="w-[25%]" data-orderable="false">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $jadwal)
                                    <tr>
                                        <td class="[5%]">{{ $loop->iteration }}</td>
                                        <td class="[30%]">{{ $jadwal->prodi }}</td>
                                        <td class="[30%]">{{ $jadwal->jadwal_count }}</td>
                                        <td class="[25%]">
                                            @if ($jadwal->all_pending)
                                                <button id="approve-btn-{{ $loop->iteration }}" type="button" 
                                                    onclick="approveJadwal('{{ $jadwal->prodi }}')" 
                                                    class="text-white bg-[#2ACD7F] px-3 py-2 text-xs font-medium text-center rounded-lg ml-2">Setuju</button>
                                                
                                                <button id="reject-btn-{{ $loop->iteration }}" type="button" 
                                                    onclick="rejectJadwal('{{ $jadwal->prodi }}')" 
                                                    class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 px-3 py-2 text-xs font-medium text-center rounded-lg ml-2">Tolak</button>
                                            @else
                                                <h1 class="text-red-500">Tidak dapat melakukan aksi</h1>
                                                <h1 class="text-red-500">Terdapat jadwal yang belum dibuat</h1>
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
            function approveJadwal(prodi) {
                if(confirm("Are you sure to approve the schedule for " + prodi + "?")) {
                    $.ajax({
                        url: "{{ route('jadwal.approve') }}",
                        type: "POST",
                        data: {
                            _token: '{{ csrf_token() }}',
                            prodi: prodi
                        },
                        success: function(response) {
                            alert(response.message);
                            location.reload(); // Reload the page to reflect changes
                        }
                    });
                }
            }
        
            function rejectJadwal(prodi) {
                if(confirm("Are you sure to reject the schedule for " + prodi + "?")) {
                    $.ajax({
                        url: "{{ route('jadwal.reject') }}",
                        type: "POST",
                        data: {
                            _token: '{{ csrf_token() }}',
                            prodi: prodi
                        },
                        success: function(response) {
                            alert(response.message);
                            location.reload(); // Reload the page to reflect changes
                        }
                    });
                }
            }
        </script>
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
@endsection
