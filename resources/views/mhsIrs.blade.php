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
            <div class="p-10 my-3 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-blek-500">
                <div class="flex items-center justify-between">
                    <div class="p-1">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-200">Semester {{ $item->semester }}</h3>
                        <h4 class="font-light text-sm text-gray-900 dark:text-gray-200">2021/2022 | {{ $item->sks }} SKS </h4>
                    </div>
                    <svg class="arrow-icon transition-transform duration-300 ease-in-out bi bi-arrow-down  cursor-pointer dark:fill-white" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" data-semester="{{ $item->semester }}">
                        <path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1"/>
                    </svg>
                </div>
                <!-- Tabel akan muncul di sini saat tombol arrow diklik -->
            </div>
            @endforeach
        </div>
    </div>
    


      <!-- jQuery Script -->
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

      <script>
$(document).ready(function() {
    $('.arrow-icon').on('click', function() {
        const icon = $(this);
        const semester = icon.data('semester'); // Get the semester value

        // Cek apakah tabel sudah ada
        const tableExists = icon.closest('.p-10').find('.additional-info').length > 0;

        if (!tableExists) {
            // Ubah arah arrow ke atas
            icon.addClass('rotate-180');
            

            // AJAX request to fetch data
            $.ajax({
                url: `/irs/${semester}`, // Replace with your server endpoint
                method: 'GET',
                data: { semester: semester },
                success: function(response) {
                    let table = `
                    <div class="additional-info dark:text-white">
                        <table class="min-w-full mt-4 bg-white border dark:bg-blek-500 dark:text:white">
                            <thead>
                                <tr>
                                    <th class="border py-2 w-[10%]">Kode</th>
                                    <th class="border py-2 w-[20%]">Mata Kuliah</th>
                                    <th class="border py-2 w-[40%]">Dosen</th>
                                    <th class="border py-2 w-[15%]">Ruang</th>
                                    <th class="border py-2 w-[15%]">SKS</th>
                                </tr>
                            </thead>
                            <tbody>`;
                            
                    response.forEach(row => {
                        table += `
                        <tr class="text-center">
                            <td class="border px-4 py-2 w-[10%]">${row.kode}</td>
                            <td class="border px-4 py-2 w-[20%]">${row.mata_kuliah}</td>
                            <td class="border px-4 py-2 w-[40%]">${row.nama_dosen}</td>
                            <td class="border px-4 py-2 w-[15%]">${row.ruang}</td>
                            <td class="border px-4 py-2 w-[15%]">${row.sks}</td>
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
            // Ubah arah arrow ke bawah
            icon.removeClass('rotate-180');
            // icon.removeClass('bi-arrow-up').addClass('bi-arrow-down');
            icon.html('<path  fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1"/>');

            // Hapus tabel yang sudah ada
            icon.closest('.p-10').find('.additional-info').remove();
        }
    });
});


      </script>

@endsection
