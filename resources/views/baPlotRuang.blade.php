@extends('header')

@section('title','Plot Ruang')

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
                    <div class="2xl:col-span-2 sm:p-6 ">
                        <div class="flex justify-between">
                            
                            <button id="dropdownDefaultButton" data-dropdown-toggle="dropdownProdi" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center" type="button">Pilih Prodi <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                </svg>
                            </button>
                            <!-- Dropdown Prodi -->
                            <div id="dropdownProdi" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                                    <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" data-prodi="Informatika">Informatika</a>
                                    </li>
                                    <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" data-prodi="Biologi">Biologi</a>
                                    </li>
                                    <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" data-prodi="Kimia">Kimia</a>
                                    </li>
                                    <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" data-prodi="Fisika">Fisika</a>
                                    </li>
                                </ul>
                            </div>
                        
                            <input id = "searchRuang" type="text" placeholder="Cari Ruang" class="bg-white dark:bg-gray-700 rounded-lg">
                        </div>
                    </div>
                    <table id="plotRuang" class = "display">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No Ruang</th>
                                    <th>Blok Gedung</th>
                                    <th>Lantai</th>
                                    <th>Fungsi</th>
                                    <th>Kapasitas</th>
                                    <th>Status</th>
                                    <th data-orderable="false">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                    </table>
            
                    
                </div>
  
                


                    

  
            </div>
        </div>



        {{-- datatable  --}}
            <script>
                $(document).ready( function () {
                    var tableRuang = $('#plotRuang').DataTable({
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

                    // Dropdown menu
                    $('#dropdownProdi a').click(function (e) {
                        e.preventDefault();
                        var prodi = $(this).data('prodi'); // Get the selected program (Informatika, Biologi, etc.)

                        $('#dropdownDefaultButton').text(prodi);
                        $('#dropdownDefaultButton').append(`
                            <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                            </svg>
                        `);

                        const dropdownButton = document.getElementById('dropdownDefaultButton');
                        dropdownButton.click();

                        // Send AJAX request to controller
                        $.ajax({
                            url: '/prodi', // Replace with your route to the controller
                            method: 'GET',
                            data: {
                                prodi: prodi
                            },
                            success: function (response) {
                                console.log('Data fetched:', response.data);
                                
                                tableRuang.clear().draw();

                                // Loop through the response data and create new table rows
                                response.data.forEach(function (ruang, index) {
                                    // Create action buttons for each row
                                    var editButton = `<button type="button" data-modal-target="updateModal-${ruang.id}" data-modal-toggle="updateModal-${ruang.id}" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 px-3 py-2 text-xs font-medium text-center rounded-lg">Edit</button>`;

                                    var deleteButton = `<button type="button" data-modal-target="deleteModal-${ruang.id}" data-modal-toggle="deleteModal-${ruang.id}" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 px-3 py-2 text-xs font-medium text-center rounded-lg ml-2">Delete</button>`;

                                    // Add new row to the DataTable
                                    tableRuang.row.add([
                                        index + 1, // Loop iteration for row number
                                        ruang.noruang,
                                        ruang.blokgedung,
                                        ruang.lantai,
                                        ruang.fungsi,
                                        ruang.kapasitas,
                                        ruang.status,
                                        `<td>${editButton} ${deleteButton}</td>`
                                    ]).draw(false);  // Draw the row without resetting the entire table
                                });
                            },
                            error: function (xhr, status, error) {
                                console.error('Error fetching data:', error);
                            }
                        });
                    });


                    
                } );
            </script>
        {{-- datatble_end --}}
@endsection

