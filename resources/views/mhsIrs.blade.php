@extends('header')

@section('title','IRS')

@section('page')


  {{-- navbar --}}
    <x-navbar></x-navbar>
    
  {{-- endnavbar --}}

    <div class="flex pt-12 overflow-hidde">

      {{-- sidebar --}}

        <x-side-bar :active="request()->route()->getName()">
            
        </x-side-bar>
      {{-- end sidebar --}}

      <div id="main-content" class="relative w-full h-full font-poppins overflow-y-auto lg:mt-4 bg-gray-50 lg:ml-52 dark:bg-blek-900">
        <h1 class="mx-14 my-8 text-3xl font-semibold text-gray-900 dark:text-gray-200">Isian Rencana Studi (IRS)</h1>
        <div class="mt-2 mx-14 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-blek-800">
            @foreach ($data as $item)
            <div class="container-irs p-10 my-3 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-blek-500">
                <div class="flex items-center justify-between">
                    <div class="p-1">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-200">Semester {{ $item->semester }}</h3>
                        <h4 class="font-light text-sm text-gray-900 dark:text-gray-200">2021/2022 | {{ $item->total_sks }} SKS </h4>
                    </div>
                    <svg class="arrow-icon -rotate-45 w-6 h-6 transition-transform duration-300 ease-in-out text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" data-semester="{{ $item->semester }}" data-email = "{{ $email }}" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m10.051 8.102-3.778.322-1.994 1.994a.94.94 0 0 0 .533 1.6l2.698.316m8.39 1.617-.322 3.78-1.994 1.994a.94.94 0 0 1-1.595-.533l-.4-2.652m8.166-11.174a1.366 1.366 0 0 0-1.12-1.12c-1.616-.279-4.906-.623-6.38.853-1.671 1.672-5.211 8.015-6.31 10.023a.932.932 0 0 0 .162 1.111l.828.835.833.832a.932.932 0 0 0 1.111.163c2.008-1.102 8.35-4.642 10.021-6.312 1.475-1.478 1.133-4.77.855-6.385Zm-2.961 3.722a1.88 1.88 0 1 1-3.76 0 1.88 1.88 0 0 1 3.76 0Z"/>
                      </svg>
                      
                    {{-- <svg class="arrow-icon transition-transform duration-300 ease-in-out bi bi-arrow-down  cursor-pointer dark:fill-white" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" data-semester="{{ $item->semester }}">
                        <path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1"/>
                    </svg> --}}
                </div>
                <!-- Tabel akan muncul di sini saat tombol arrow diklik -->
            </div>
            @endforeach
        </div>
    </div>
    

      <script>
        $(document).ready(function() {
            $('.arrow-icon').on('click', function() {
                const icon = $(this);
                const semester = icon.data('semester'); // Get the semester value
                const email = icon.data('email');
        
                // Check if the table already exists
                const tableExists = icon.closest('.p-10').find('.additional-info').length > 0;
        
                if (!tableExists) {
                    // Rotate the arrow up
                    icon.removeClass('-rotate-45').addClass('rotate-[135deg]');
        
                    // AJAX request to fetch data
                    console.log(semester);
                    $.ajax({
                        url: `/irs/${semester}/${email}`, // Use the semester value in the URL
                        method: 'GET',
                        success: function(response) {
                            console.log(response);
                            let table = `
                            <div class="additional-info dark:text-white">
                                <table class="min-w-full text-sm mt-4 bg-white dark:bg-blek-500 dark:text-white">
                                    <thead class="bg-blek-800 rounded-full">
                                        <tr>
                                            <th class="py-2 w-[10%]">Kode</th>
                                            <th class="py-2 w-[20%]">Mata Kuliah</th>
                                            <th class="py-2 w-[15%]">Ruang</th>
                                            <th class="py-2 w-[15%]">SKS</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-blek-700">`;
                            dataa = response.data
                            dataa.forEach(row => {
                                table += `
                                <tr class="text-center">
                                    <td class="px-4 py-2">${row['kodemk']}</td>
                                    <td class="px-4 py-2">${row['mata_kuliah']}</td>
                                    <td class="px-4 py-2">${row['ruang']}</td>
                                    <td class="px-4 py-2">${row['sks']}</td>
                                </tr>`;
                            });
        
                            table += `
                                    </tbody>
                                </table>
                            </div>`;
        
                            // Append the table to the div
                            icon.closest('.p-10').append(table);
                        },
                        error: function(xhr, status, error) {
                            console.error('Error fetching data:', error);
                        }
                    });
                } else {
                    // Rotate the arrow back down
                    icon.removeClass('rotate-[135deg]').addClass('-rotate-45');
        
                    // Remove the existing table
                    icon.closest('.p-10').find('.additional-info').remove();
                }
            });
        });
        </script>
        

@endsection
