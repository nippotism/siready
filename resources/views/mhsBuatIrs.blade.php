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


      <div id="main-content" class="relative w-full h-full font-poppins overflow-y-auto lg:ml-52 dark:bg-blek-900">
        
        <div class="flex justify-between items-center mx-14 my-8">
          <h1 class=" text-3xl font-semibold text-gray-900 dark:text-gray-200">Buat IRS</h1>
          <div class="flex items-center justify-right">
            <div class="text-right mr-14 px">
              <button id="show-irs-button" class="my-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" type="button" data-drawer-target="drawer-right-example" data-drawer-show="drawer-right-example" data-drawer-placement="right" aria-controls="drawer-right-example">
                Show IRS
              </button>
            </div>
            <input type="text" placeholder="Search" class="bg-white dark:bg-blek-700 rounded-lg">
          </div>
          
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

          <!-- Loading Spinner -->
          <div class="text-center mt-5">
            <div role="status" id="loading-spinner" style="display: none;">
                <svg aria-hidden="true" class="inline w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                    <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                </svg>
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        </div>

        @foreach ($data as $matkul) 
        <div class="mt-2 mb-8 mx-14 bg-white border border-gray-200 font-semibold text-[#374250] dark:text-white rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-blek-700">
          <h2 class="mt-4">{{ $matkul->matakuliah }} - {{ $matkul->kodemk }} ({{ $matkul->sks }} SKS)</h2>
          <div class=" mt-4">
            <div class="overflow-x-auto text-m font-normal">
              <table class="min-w-full text-center table-auto">
                <thead></thead>
                <tbody>
                    @foreach($matkul->kelas as $kelas)
                    <tr class="border-y">
                        <td class="px-auto py-4 w-[10%]">
                            <input type="radio" 
                                   name="{{ $matkul->matakuliah }}" 
                                   id="kelas-{{ $kelas->id }}" 
                                   onclick="submitClass({{ $kelas->id }}, '{{ $email }}', '{{ $matkul->kodemk }}'); checkConflict(this)" 
                                   data-hari="{{ $kelas->hari }}" 
                                   data-jam="{{ $kelas->jam }}"  {{-- "jam" in the format "07.00 - 09.30" --}}
                                   {{ $kelas->isselected ? 'checked' : '' }} />
                        </td>
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
  let isload = false;
  function fetchIrsData(email) {
    // Show the loading spinner

      if(isload == false){
        $("#loading-spinner").show();
      }

      $.ajax({
          url: "/viewirs",  // Your Laravel route to fetch IRS data
          type: "POST",
          data: {
              _token: '{{ csrf_token() }}', // CSRF token
              email: email // Email address
          },
          success: function(response) {
              let irsContainer = $('#irs-data-container');
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

              isload = true;
              irsContainer.append(tabel); // Append the table to the container
          },
          error: function(xhr, status, error) {
              console.log('Error: ' + error);
          },
          complete: function() {
              // Hide the loading spinner
              $("#loading-spinner").hide();
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
            //   console.log('Deleting IRS with ID: ' + id);
              console.log(response);
              $(`#kelas-${response.kodejadwal}`).prop('checked', false);
              removeConflict(checkConflict(document.querySelector(`#kelas-${response.kodejadwal}`)));

              fetchIrsData('{{ $email }}');

          },
          error: function(xhr, status, error) {
              // Handle error
              console.log('Error: ' + error);
          }
      });
  }
</script>

<script>

  function extractTimeRange(jamString) {
      let [startTime, endTime] = jamString.split(' - ');
      console.log(`Extracted time range: Start - ${startTime}, End - ${endTime}`);
      return { startTime, endTime };
  }

  function checkConflict(selectedRadio) {
      let selectedHari = selectedRadio.getAttribute('data-hari');
      let selectedJam = selectedRadio.getAttribute('data-jam');
      let { startTime: selectedStartTime, endTime: selectedEndTime } = extractTimeRange(selectedJam);

      console.log(`Selected Schedule: ${selectedHari} from ${selectedStartTime} to ${selectedEndTime}`);

      let conflict = [];

      document.querySelectorAll('input[type="radio"]').forEach(radio => {
          let hari = radio.getAttribute('data-hari');
          let jam = radio.getAttribute('data-jam');
          let { startTime, endTime } = extractTimeRange(jam);

          // Reference to the table row containing this radio button
          let row = radio.closest('tr');

          // Log details for each radio button
          console.log(`Checking against: ${hari} from ${startTime} to ${endTime}`);

          // Reset all radios and rows (in case some were disabled or styled previously)
          radio.disabled = false;
          row.classList.remove('bg-red-800'); // Remove any previous conflict highlighting

          // If it's the same day and there's a time conflict
          if (hari === selectedHari && selectedRadio !== radio) {
              console.log(`Same day as selected (${hari}). Checking time conflict...`);

              if (
                  (startTime < selectedEndTime && startTime >= selectedStartTime) || 
                  (selectedStartTime < endTime && selectedStartTime >= startTime)
              ) {
                  console.log(`Conflict found! Disabling radio and adding 'bg-red-800' for time: ${startTime} - ${endTime}`);
                  // Disable the conflicting schedule and highlight the row
                  radio.disabled = true;
                  // Add the conflicting radio id to the list
                    conflict.push(radio.getAttribute('id'));
                  row.classList.add('bg-red-800');  // Add bg-red-800 to the conflicting row
              } else {
                  console.log(`No conflict with ${startTime} - ${endTime}`);
              }
          }
      });

        console.log('Conflicting radio buttons:', conflict);
        return conflict;
  }

  function removeConflict(conflict) {
      conflict.forEach(radioId => {
          let radio = document.getElementById(radioId);
          let row = radio.closest('tr');
          radio.disabled = false;
          row.classList.remove('bg-red-800');
      });
  }
      


  document.addEventListener('DOMContentLoaded', function() {
        // Find the already selected radio button (if any) and check for conflicts
        let selectedRadio = document.querySelector('input[type="radio"]:checked');
        if (selectedRadio) {
            checkConflict(selectedRadio);  // Call the function to check conflicts for the selected radio button
        }
    })
</script>





@endsection
