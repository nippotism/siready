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
  
        <div id="main-content" class="relative text-gray-900 dark:text-gray-200 font-poppins w-full h-full overflow-y-auto lg:pl-52">
            <div class="px-8 py-8">
                <div class="bg-white border border-gray-200 rounded-3xl shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-blek-700">
                    

                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        @php
                            // Define the available days and times
                            $days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];
                            $times = ['07:00', '08:00', '09:00', '10:00', '11:00', '12:00','13.00','14.00','15.00','16.00','17.00','18.00'];
                        @endphp

                        <table class="w-full text-sm text-center rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    @foreach($days as $day)
                                        <th>{{ $day }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($times as $time)
                                    <tr class=" border-b">
                                        <td>{{ $time }}</td>
                                        @foreach($days as $day)
                                            <td>
                                                @foreach($data as $schedule)
                                                    @if($schedule->hari == $day && substr($schedule->jammulai, 0, 2) == substr($time, 0, 2))
                                                        <div class="mx-3">
                                                            <a href="#" class="block p-3 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                                                                <span class="mb-2 text-sm font-bold text-gray-900 dark:text-white">{{ $schedule->matakuliah }} {{ $schedule->kelas }}</span>
                                                                <p class="text-xs text-gray-700 dark:text-gray-400">Semester 1 / {{ $schedule->sks }} SKS / {{ $schedule->jammulai }} - {{ $schedule->jamselesai }}</p>
                                                            </a>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>

            
                     
                </div>
  

  
            </div>
        </div>
        


@endsection
