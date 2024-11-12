@extends('header')

@section('title','Plot Ruang')

@section('page')

    <x-navbar>
        
    </x-navbar>

    <div class="flex pt-12 overflow-hidden">

        {{-- sidebar --}}
  
          <x-side-bar :active="request()->route()->getName()">
              
          </x-side-bar>
        {{-- end sidebar --}}
  
        <div id="main-content" class="relative text-gray-900 dark:text-gray-200 font-poppins w-full h-full overflow-y-auto lg:pl-52">
            <div class="px-8 py-8" id="main-content-wrapper">
                <div class="bg-white border border-gray-200 rounded-3xl shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-blek-700">
                    <div class="2xl:col-span-2 sm:p-6 ">
                        <div class="flex justify-between">
                            
                            <button id="dropdownDefaultButton" data-dropdown-toggle="dropdownProdi" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center" type="button">{{ $prodi!=''?$prodi:'Pilih Prodi' }}<svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
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
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" data-prodi="Matematika">Matematika</a>
                                    </li>
                                    <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" data-prodi="Statistika">Statistika</a>
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
                        
                            <input id = "searchRuang" type="text" placeholder="Cari Ruang" class="bg-white dark:bg-gray-700 rounded-lg  ">
                            {{-- dropdown Ruang --}}
                            <button id="dropdownDefaultButton" data-dropdown-toggle="dropdownRuang" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center" type="button">Tambah Ruang<svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                </svg>
                            </button>
                            <div id="dropdownRuang" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton" id ="listRuangFree">
                                    @foreach ($ruangfree as $ruang)
                                        <li>
                                            <a onclick="tambahRuang({{ $ruang->id }})" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" id = {{ $ruang->id }}>{{ $ruang->noruang }}</a>
                                        </li>  
                                    @endforeach
                                    
                                </ul>
                            </div>
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
                                @foreach ($data as $ruang)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $ruang->noruang }}</td>
                                    <td>{{ $ruang->blokgedung }}</td>
                                    <td>{{ $ruang->lantai }}</td>
                                    <td>{{ $ruang->fungsi }}</td>
                                    <td>{{ $ruang->kapasitas }}</td>
                                    <td class="text-yellow-300">{{ $ruang->status }}</td>
                                    <td>
                                        <button type="submit" onclick="hapusPlot({{ $ruang->id }})">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash text-red-600" viewBox="0 0 16 16">
                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                                </svg>
                                        </button>
                                    </td>
                                @endforeach
                            </tbody>
                    </table>
            
                    
                </div>

                

  
  <!-- Main modal -->
  <div id="updateModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
      <div class="relative p-4 w-full max-w-2xl max-h-full">
          <!-- Modal content -->
          <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
              <!-- Modal header -->
              <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                  <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                      Terms of Service
                  </h3>
                  <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="updateModal">
                      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                      </svg>
                      <span class="sr-only">Close modal</span>
                  </button>
              </div>
              <!-- Modal body -->
              <div class="p-4 md:p-5 space-y-4">
                  <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                      With less than a month to go before the European Union enacts new consumer privacy laws for its citizens, companies around the world are updating their terms of service agreements to comply.
                  </p>
                  <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                      The European Unions General Data Protection Regulation (G.D.P.R.) goes into effect on May 25 and is meant to ensure a common set of data rights in the European Union. It requires organizations to notify users as soon as possible of high-risk data breaches that could personally affect them.
                  </p>
              </div>
              <!-- Modal footer -->
              <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                  <button data-modal-hide="default-modal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button>
                  <button data-modal-hide="default-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Decline</button>
              </div>
          </div>
      </div>
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

                                    var deleteButton = `<button type="submit" onclick="hapusPlot(${ruang.id})">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash text-red-600" viewBox="0 0 16 16">
                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                                            </svg>
                                                        </button>`;

                                    var modal = `<div id="updateModal-${ruang.id}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                        <div class="relative p-4 w-full max-w-md max-h-full">
                                                            <!-- Modal content -->
                                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                                <!-- Modal header -->
                                                                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                                                        Edit Ruang
                                                                    </h3>
                                                                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="updateModal-${ruang.id}">
                                                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                                        </svg>
                                                                        <span class="sr-only">Close modal</span>
                                                                    </button>
                                                                </div>
                                                                <!-- Modal Edit Ruang -->
                                                                <form class="p-4 md:p-5" action = "ruang/${ruang.id}" method = "POST">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="grid gap-4 mb-4 grid-cols-2">
                                                                        <div class="col-span-2">
                                                                            <label for="noruang" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No Ruang</label>
                                                                            <input type="text" name="noruang" id="noruang" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="No Ruang" value = "${ruang.noruang}"required="">
                                                                        </div>
                                                                        <div class="col-span-2 sm:col-span-1">
                                                                            <label for="blokgedung" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Blok Gedung</label>
                                                                            <input type="text" name="blokgedung" id="blokgedung" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Blok Gedung" value="${ruang.blokgedung}" required="">
                                                                        </div>
                                                                        <div class="col-span-2 sm:col-span-1">
                                                                            <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fungsi</label>
                                                                            <select id="lantai" name = "lantai" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                                                <option selected="">Pilih Lantai</option>
                                                                                <option value="1">1</option>
                                                                                <option value="2" >2</option>
                                                                                <option value="3" >3</option>    
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-span-2 sm:col-span-1">
                                                                            <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kapasitas</label>
                                                                            <input type="number" name="kapasitas" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="example : 50" value = "${ruang.kapasitas}"required="">
                                                                        </div>
                                                                        <div class="col-span-2 sm:col-span-1">
                                                                            <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fungsi</label>
                                                                            <select id="category" name = "fungsi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                                                <option selected="">Pilih Fungsi</option>
                                                                                <option value="Ruang Kelas" >Ruang Kelas</option>
                                                                                <option value="Lab Komputer" >Lab Komputer</option>
                                                                                <option value="Ruang Seminar" >Ruang Seminar</option>
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
                                                    `;

                                    
                                    //append the modal in main content wrapper
                                    $('#main-content-wrapper').append(modal);

                                    // Add new row to the DataTable
                                    tableRuang.row.add([
                                    index + 1, // Loop iteration for row number
                                    ruang.noruang,
                                    ruang.blokgedung,
                                    ruang.lantai,
                                    ruang.fungsi,
                                    ruang.kapasitas,
                                    `<td> <span class="${
                                        ruang.status == 'Pending' ? 'bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-yellow-900 dark:text-yellow-300' :
                                        ruang.status == 'Disetujui' ? 'bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300' : 'bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300'
                                    }">${ruang.status}</span></td>`,
                                    `<td>${deleteButton}</td>`
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


            <script>
                // Add a click event to each item in the dropdown
                $('#dropdownProdi a').on('click', function (e) {
                    e.preventDefault(); // Prevent the default link behavior

                    // Get the 'data-prodi' value of the clicked item
                    var selectedProdi = $(this).data('prodi');

                    // Update the button's data attribute with the selected prodi
                    $('#dropdownDefaultButton').data('prodi', selectedProdi);

                    // Optionally, update the button text to show the selected prodi
                    $('#dropdownDefaultButton').text(selectedProdi);
                });

                function tambahRuang(id){

                    var buttonprodi = $('#dropdownDefaultButton');
                    var prodi = buttonprodi.data('prodi');

                    var tableRuang = $('#plotRuang').DataTable();


                    if(prodi == ''){
                        alert('Pilih Prodi terlebih dahulu');
                    }else{
                        console.log(id);
                        console.log(prodi);
                        $.ajax({
                            url: '/plotingruang', // Replace with your route to the controller
                            method: 'POST',
                            data: {
                                _token : '{{ csrf_token() }}',
                                id: id, 
                                prodi: prodi

                            },
                            success: function (response) {
                                console.log('Data fetched:', response.data);

                                tableRuang.clear().draw();

                                //remove li dropdown ruang where id = id and close the dropdown
                                $('#dropdownRuang').find(`#${id}`).remove();
                                $('#dropdownRuang').removeClass('block').addClass('hidden');



                                // Loop through the response data and create new table rows
                                response.data.forEach(function (ruang, index) {

                                    var deleteButton = `<button type="submit" onclick="hapusPlot(${ruang.id})">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash text-red-600" viewBox="0 0 16 16">
                                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                                            </svg>
                                                        </button>`;
                                    //append the modal in main content wrapper
                                    // $('#main-content-wrapper').append(modal);

                                    // Add new row to the DataTable
                                    tableRuang.row.add([
                                    index + 1, // Loop iteration for row number
                                    ruang.noruang,
                                    ruang.blokgedung,
                                    ruang.lantai,
                                    ruang.fungsi,
                                    ruang.kapasitas,
                                    `<td> <span class="${
                                        ruang.status == 'Pending' ? 'bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-yellow-900 dark:text-yellow-300' :
                                        ruang.status == 'Disetujui' ? 'bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300' : 'bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300'
                                    }">${ruang.status}</span></td>`,
                                    `<td>${deleteButton}</td>`
                                ]).draw(false);  // Draw the row without resetting the entire table
                                    
                                    });
                                },
                                error: function (xhr, status, error) {
                                    console.error('Error fetching data:', error);
                                }
                            });
                    }
                }


                function hapusPlot(id){

                    var buttonprodi = $('#dropdownDefaultButton');
                    var prodi = buttonprodi.data('prodi');

                    var tableRuang = $('#plotRuang').DataTable();


                    if(prodi == ''){
                        alert('Pilih Prodi terlebih dahulu');
                    }else{
                        console.log(id);
                        console.log(prodi);
                        $.ajax({
                            url: '/hapusplot', // Replace with your route to the controller
                            method: 'POST',
                            data: {
                                _token : '{{ csrf_token() }}',
                                id: id, 
                                prodi: prodi

                            },
                            success: function (response) {
                                console.log('Data fetched:', response.data);

                                tableRuang.clear().draw();

                                //add li dropdown ruang where id = id and close the dropdown
                                $('#listRuangFree').append(`<li>
                                    <a onclick="tambahRuang(${id})" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" id = ${id}>${response.noruang}</a>
                                    </li>`);



                                // Loop through the response data and create new table rows
                                response.data.forEach(function (ruang, index) {

                                    var deleteButton = `<button type="submit" onclick="hapusPlot(${ ruang.id})">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash text-red-600" viewBox="0 0 16 16">
                                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                                            </svg>
                                                        </button>`;
                                    //append the modal in main content wrapper
                                    // $('#main-content-wrapper').append(modal);

                                    // Add new row to the DataTable
                                    tableRuang.row.add([
                                    index + 1, // Loop iteration for row number
                                    ruang.noruang,
                                    ruang.blokgedung,
                                    ruang.lantai,
                                    ruang.fungsi,
                                    ruang.kapasitas,
                                    `<td> <span class="${
                                        ruang.status == 'Pending' ? 'bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-yellow-900 dark:text-yellow-300' :
                                        ruang.status == 'Disetujui' ? 'bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300' : 'bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300'
                                    }">${ruang.status}</span></td>`,
                                    `<td>${deleteButton}</td>`
                                ]).draw(false);  // Draw the row without resetting the entire table
                                    
                                    });
                                },
                                error: function (xhr, status, error) {
                                    console.error('Error fetching data:', error);
                                }
                            });
                    }



                }
            </script>
        {{-- datatble_end --}}
@endsection

