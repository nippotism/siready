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
                        <div class="text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 p-6 rounded-2xl text-right">
                            <h1 class="text-2xl font-bold">{{ $data['ajuan'] }}</h1>
                            <h1>Pengajuan Ruangan</h1>
                        </div>
                        <div class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 p-6 rounded-2xl text-right">
                            <h1 class="text-2xl font-bold">{{ $data['disetujui'] }}</h1>
                            <h1>Ruang Tersedia</h1>
                        </div>
                        <div class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 p-6 rounded-2xl text-right">
                            <h1 class="text-2xl font-bold">{{ $data['ditolak'] }}</h1>
                            <h1>Ruang Tidak Tersedia</h1>
                        </div>
                    </div>
                </div>
                <div class="pt-10">
                    <h1 class="font-semibold text-2xl pb-2">Plot Ruangan Fakultas Sains dan Matematika</h1>
                    <div class="text-center bg-white border border-gray-200 rounded-3xl shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-blek-700">
                        <table id = "baDashboard" class = "display">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Prodi</th>
                                    <th>Jumlah Ruang</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['dataruang'] as $prodi)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $prodi->prodi }}</td>
                                        <td>{{ $prodi->total }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>  
            </div>
        </div>

        <script>
            $(document).ready( function () {
                $('#baDashboard').DataTable({
                    layout :{
                            topStart: null,
                            topEnd: null,
                            bottomStart: null,
                            bottomEnd: null
                        },
                    columnDefs: [
                        { className: "dt-head-center", targets: [0,1,2] },
                        { className: "dt-body-center", targets: [0,1,2] }
                    ]
                    
                });
            } );
        </script>
        
@endsection
