@extends('header')

@section('title','Buat IRS')

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
        
        <div class="flex justify-between mx-14 my-8">
          <h1 class=" text-3xl font-semibold text-gray-900 dark:text-gray-200">Buat IRS</h1>
          <input type="text" placeholder="Search" class="bg-white dark:bg-blek-700 rounded-lg">
        </div>
        

        <!-- drawer init and toggle -->
        <div class="text-right mr-14 px">
          <button id="show-irs-button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" type="button" data-drawer-target="drawer-right-example" data-drawer-show="drawer-right-example" data-drawer-placement="right" aria-controls="drawer-right-example">
          Show IRS
          </button>
        </div>

        <!-- drawer component -->
        <div id="drawer-right-example" class="fixed top-0 right-0 z-40 h-screen p-4 overflow-y-auto transition-transform translate-x-full bg-white w-[60vh] dark:bg-blek-700" tabindex="-1" aria-labelledby="drawer-right-label">
           <h5 id="drawer-right-label" class="inline-flex items-center mb-4 text-base font-semibold text-gray-500 dark:text-gray-400">
           </h5>
           <h1 class="text-lg font-semibold text-blek-800 dark:text-white text-center">IRS Semester ini</h1>
          <button type="button" data-drawer-hide="drawer-right-example" aria-controls="drawer-right-example" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 inline-flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white" >
             <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
             </svg>
             <span class="sr-only">Close menu</span>
          </button>
          
          <div id="irs-data-container">
            {{-- Menampilkan IRS yang diambil --}}
          </div>
          
        </div>

        @foreach ($data as $matkul) 
        <div class="mt-2 mb-8 mx-14 bg-white border border-gray-200 font-semibold text-[#374250] dark:text-white rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-blek-700">
          <h2 class="mt-4">{{ $matkul->matakuliah }} - {{ $matkul->kodemk }} ({{ $matkul->sks }} SKS)</h2>
          <div class=" mt-4">
            <div class="overflow-x-auto text-m font-normal">
              <table class="min-w-full text-center table-auto">
                <thead>
                  
                </thead>
                <tbody>
                  @foreach($matkul->kelas as $kelas)
                  <tr class="border-y">
                    <td class="px-auto py-4 w-[10%]"><input type="radio" onclick="submitClass({{ $kelas->id }},'{{ $email }}','{{ $matkul->kodemk }}')" {{ $kelas->isselected?'checked':'' }} name="{{ $matkul->matakuliah}}"/></td>
                    <td class="px-auto py-4 w-[40%]">{{ $matkul->matakuliah }} {{ $kelas->kelas }}</td>
                    <td class="px-auto py-4 w-[10%]">{{ $kelas->kapasitas }}</td>
                    <td class="px-auto py-4 w-[20%]">{{ $kelas->hari }}, {{ $kelas->jam }}</td>
                    <td class="px-auto py-4 w-[20%]">{{ $kelas->ruang }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
        @endforeach


    </div>

    <script>
      function submitClass(kodejadwal,email,kodemk) {
          $.ajax({
              url: "/buat-irstest",  // Laravel route
              type: "POST",
              data: {
                  _token: '{{ csrf_token() }}',          // CSRF token
                  email: email,           // Email address
                  kodejadwal: kodejadwal,
                  kodemk: kodemk
              },
              success: function(response) {
                  // Handle success
                  // alert('Success: ' + response.data);
                  console.log(response.data+response.check);
              },
              error: function(xhr, status, error) {
                  // Handle error
                  console.log('Error: ' + error);
              }
          });
      }
  </script>

<script>
  function fetchIrsData(email) {
      $.ajax({
          url: "/viewirs",  // Your Laravel route to fetch IRS data
          type: "POST",
          data: {
              _token: '{{ csrf_token() }}', // CSRF token
              email: email // Email address
          },
          success: function(response) {
              let irsContainer = $('#irs-data-container'); // Reference to the container where IRS data will be displayed
              irsContainer.empty(); // Clear previous data
              console.log(response);
              var tabel = `
                    <div class="additional-info dark:text-white">
                        <table class="min-w-full mt-4 bg-white dark:bg-blek-700 dark:text:white">
                            <thead>
                                <tr>
                                    <th class="border-b py-2 w-[20%]">Mata Kuliah</th>
                                    <th class="border-b py-2 w-[15%]">Kelas</th>
                                    <th class="border-b py-2 w-[15%]">SKS</th>
                                    <th class="border-b py-2 w-[15%]">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>`;
                            
                        response.forEach(row => {
                        tabel += `
                        <tr class="text-center text-sm font-medium">
                            <td class="border-b text-left px-4 py-2 w-[20%]">${row.nama}</td>
                            <td class="border-b px-4 py-2 w-[15%]"> ${row.kelas.kelas}</td>
                            <td class="border-b px-4 py-2 w-[15%]">${row.sks}</td>
                            <td class="border-b px-4 py-2 w-[15%]"><button type="submit" onclick = deleteIrs(${row.id})>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash text-red-600" viewBox="0 0 16 16">
                                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                                                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                                                </svg>
                                                            </button></td>
                        </tr>`;
                    });
                    
                    tabel += `
                            </tbody>
                        </table>
                    </div>`;

              irsContainer.append(tabel); // Append the table to the container
          },
          error: function(xhr, status, error) {
              console.log('Error: ' + error);
          }
      });
  }

  $(document).ready(function() {
      // Attach click event to the button
      $('#show-irs-button').click(function() {
          fetchIrsData('{{ $email }}'); // Call the function with the email
      });
  });
</script>

<script>
  function deleteIrs(id) {
      console.log('Deleting IRS with ID: ' + id);
      $.ajax({
          url: "/deleteirs",  // Your Laravel route to delete IRS data
          type: "POST",
          data: {
              _token : '{{ csrf_token() }}', // CSRF token
              id: id // IRS ID
          },
          success: function(response) {
              // Handle success
              console.log('Deleting IRS with ID: ' + id);
              console.log(response);
              fetchIrsData('{{ $email }}'); // Fetch IRS data again
          },
          error: function(xhr, status, error) {
              // Handle error
              console.log('Error: ' + error);
          }
      });
  }
</script>


@endsection
