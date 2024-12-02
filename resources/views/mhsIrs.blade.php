@extends('header')

@section('title','IRS')

@section('page')

<style>
.transition-container {
    overflow: hidden;
    transition: max-height 1s ease-in-out;
    max-height: 300px; /* Initial height to prevent jumping effect */
}

.p-10 {
    overflow: hidden;
}


</style>


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
            <div class="container-irs p-10 my-3 transition-all duration-300 ease-in-out bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-blek-500"  data-semester="{{ $item->irs_semester }}" data-email = "{{ $email }}">
                <div class=" flex items-center justify-between">
                    <div class="p-1">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-200">Semester {{ $item->irs_semester }}</h3>
                        <h4 class="font-light text-sm text-gray-900 dark:text-gray-200">2021/2022 | {{ $item->total_sks }} SKS </h4>
                    </div>
                    <svg class="arrow-icon -rotate-45 w-6 h-6 transition-transform duration-300 ease-in-out text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" data-semester="{{ $item->irs_semester }}" data-email = "{{ $email }}" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m10.051 8.102-3.778.322-1.994 1.994a.94.94 0 0 0 .533 1.6l2.698.316m8.39 1.617-.322 3.78-1.994 1.994a.94.94 0 0 1-1.595-.533l-.4-2.652m8.166-11.174a1.366 1.366 0 0 0-1.12-1.12c-1.616-.279-4.906-.623-6.38.853-1.671 1.672-5.211 8.015-6.31 10.023a.932.932 0 0 0 .162 1.111l.828.835.833.832a.932.932 0 0 0 1.111.163c2.008-1.102 8.35-4.642 10.021-6.312 1.475-1.478 1.133-4.77.855-6.385Zm-2.961 3.722a1.88 1.88 0 1 1-3.76 0 1.88 1.88 0 0 1 3.76 0Z"/>
                      </svg>
                      
                </div>
                <!-- Tabel akan muncul di sini saat tombol arrow diklik -->
            </div>
            @endforeach
        </div>
    </div>
    

      <script>
$(document).ready(function () {
    $('.container-irs').on('click', function () {
        const container = $(this);
        const icon = $('.arrow-icon', container);
        const semester = container.data('semester');
        const email = container.data('email');
        const parentContainer = container.closest('.p-10');

        // Check if the table already exists
        const tableExists = parentContainer.find('.additional-info').length > 0;

        if (!tableExists) {
            // Rotate the arrow up
            icon.removeClass('-rotate-45').addClass('rotate-[135deg]');

            // Add Flowbite loading button
            const loadingSpinner = `
            <div class="loading-spinner flex justify-center items-center my-4">
                <button disabled type="button" class="text-white focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 dark:focus:ring-blue-800 inline-flex items-center">
                    <svg aria-hidden="true" role="status" class="inline w-5 h-5 me-3 text-white animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                    </svg>
                    Loading...
                </button>
            </div>`;
            parentContainer.append(loadingSpinner);

            // Fetch data via AJAX
            $.ajax({
                url: `/irs/${semester}/${email}`,
                method: 'GET',
                success: function (response) {
                    console.log('Data fetched:', response);
                    let table = `
                    <div class="additional-info dark:text-white mt-4">
                        <table class="min-w-full text-sm bg-white dark:bg-blek-500 dark:text-white">
                            <thead class="bg-blek-800 rounded-full">
                                <tr>
                                    <th class="py-2 w-[15%]">Kode</th>
                                    <th class="py-2 w-[20%]">Mata Kuliah</th>
                                    <th class="py-2 w-[10%]">Kelas</th>
                                    <th class="py-2 w-[10%]">Ruang</th>
                                    <th class="py-2 w-[20%]">Waktu</th>
                                    <th class="py-2 w-[10%]">SKS</th>
                                </tr>
                            </thead>
                            <tbody class="bg-blek-700">`;
                    const dataa = response.data;
                    dataa.forEach(row => {
                        table += `
                        <tr class="text-center">
                            <td class="px-4 py-2">${row['kodemk']}</td>
                            <td class="px-4 py-2">${row['mata_kuliah']}</td>
                            <td class="px-4 py-2">${row['kelas']}</td>
                            <td class="px-4 py-2">${row['ruang']}</td>
                            <td class="px-4 py-2">${row['hari']}</td>
                            <td class="px-4 py-2">${row['sks']}</td>
                        </tr>`;
                    });
                    table += `
                            </tbody>
                        </table>
                    </div>`;

                    // Remove loading spinner and append the table
                    parentContainer.find('.loading-spinner').remove();
                    parentContainer.append(table);
                },
                error: function (xhr, status, error) {
                    console.error('Error fetching data:', error);

                    // Show an error message and remove the spinner
                    parentContainer.find('.loading-spinner').remove();
                    parentContainer.append(`<div class="error-message text-red-500 mt-4">Failed to load data. Please try again.</div>`);
                }
            });
        } else {
            // Rotate the arrow back down
            icon.removeClass('rotate-[135deg]').addClass('-rotate-45');

            // Remove the existing table
            parentContainer.find('.additional-info').remove();
        }
    });
});




        </script>
        

@endsection
