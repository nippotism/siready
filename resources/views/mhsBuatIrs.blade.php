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

        {{-- place this button to right full --}}
        <div class = " fixed -right-2 bottom-28">
            <button id="show-irs-button" class="my-2 text-white bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 font-medium rounded-l-full text-sm px-4 py-3 hover:-translate-x-2 hover:pr-6 transition-all" type="button" data-drawer-target="drawer-right-example"   data-drawer-body-scrolling="true" data-drawer-show="drawer-right-example" data-drawer-placement="right" aria-controls="drawer-right-example">
                Lihat IRS
                <span id = "skscount" class="inline-flex items-center justify-center w-4 h-4 ms-1 text-xs font-semibold text-blue-800 bg-blue-200 rounded-full">
                    {{$total}}
                    </span>
            </button>
        </div>

        <div class="flex justify-between items-center mx-14 my-8">
            <h1 class=" text-3xl font-semibold text-gray-900 dark:text-gray-200">Buat IRS</h1>
            <div class="flex items-center justify-right">
            <input type="text" placeholder="Search" class="bg-white dark:bg-blek-700 rounded-lg">
          </div>

        </div>


        <!-- drawer component -->
        <div id="drawer-right-example" class="fixed top-0 right-0 z-50 h-screen p-4 overflow-y-auto transition-transform translate-x-full bg-white w-[60vh] dark:bg-blek-700" tabindex="-1" aria-labelledby="drawer-right-label">
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

        <div> <!-- Add enough padding to account for the height of the fixed header -->
            <div class="relative mx-14 overflow-x-auto shadow-md sm:rounded-lg">
                @php
                    // Define the available days and times
                    $days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];
                    $times = ['07:00', '08:00', '09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00'];
                @endphp
            
                <table class="w-full table-auto text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead>
                        <tr class="text-center">
                            <th>#</th>
                            @foreach($days as $day)
                                <th class="py-4 w-[20%]">{{ $day }}</th>
                            @endforeach
                        </tr>
                    </thead>
                                        <!-- Your HTML structure for each schedule -->
                    <tbody>
                        @foreach($times as $timeIndex => $time)
                            <tr class="h-20">
                                <td class="px-4">{{ $time }}</td>
                                @foreach($days as $dayIndex => $day)
                                    @php
                                        $isEvenCell = ($timeIndex % 2 == 0 && $dayIndex % 2 == 0) || ($timeIndex % 2 != 0 && $dayIndex % 2 != 0);
                                        $cellClass = $isEvenCell ? 'bg-white dark:bg-blek-700' : 'bg-gray-100 dark:bg-blek-600';
                                    @endphp
                                    <td class="{{ $cellClass }}">
                                        @foreach($data as $matkul)
                                            @foreach($matkul->kelas as $kelas)
                                                @if($kelas->hari == $day && substr($kelas->jam, 0, 2) == substr($time, 0, 2))
                                                    <div class="mx-[5%] my-2">
                                                        <a id="matkul-{{ $kelas->id }}" href="javascript:void(0)" 
                                                           class="block p-3 rounded-lg bg-white border border-gray-200 shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 jadwal-container"
                                                           data-kodemk="{{ $matkul->kodemk }}" 
                                                           data-id="{{ $kelas->id }}" 
                                                           data-hari="{{ $kelas->hari }}" 
                                                           data-jam="{{ $kelas->jam }}" 
                                                           onclick="handleScheduleClick(this, '{{ $email }}');">
                                                            <span class="mb-2 text-xs font-bold text-gray-900 dark:text-white">{{ $matkul->matakuliah }} {{ $kelas->kelas }}</span>
                                                            <p class="text-xs text-gray-700 dark:text-gray-400">
                                                                Semester 1 / {{ $matkul->sks }} SKS <br> 
                                                                {{ $kelas->jam }} <br>
                                                                Ruang: {{ $kelas->ruang }}
                                                            </p>
                                                        </a>
                                                    </div>
                                                @endif
                                            @endforeach
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

    <script>
let selectedClasses = JSON.parse(localStorage.getItem('selectedClasses')) || []; // Load selected classes from localStorage

// Function to submit the selected schedule
function submitClass(kodejadwal, email, kodemk, element) {
    $.ajax({
        url: "/buat-irstest", // Laravel route
        type: "POST",
        data: {
            _token: '{{ csrf_token() }}', // CSRF token
            email: email, // Email address
            kodejadwal: kodejadwal,
            kodemk: kodemk
        },
        success: function(response) {
            console.log(response.data + response.check);
            document.getElementById('skscount').innerText = response.data.sks; // Update SKS count

            // Change the background to green after successful submission
            element.classList.add('bg-green-500');

            // Handle removing any previously selected class at the same time
            handlePreviousSelection(element);

            // Add the newly selected class to the array
            selectedClasses.push({ hari: element.getAttribute('data-hari'), jam: element.getAttribute('data-jam'), id: kodejadwal });

            // Save updated selected classes to localStorage
            localStorage.setItem('selectedClasses', JSON.stringify(selectedClasses));

            // Check conflicts with other schedules
            checkConflict();
        },
        error: function(xhr, status, error) {
            console.log('Error: ' + error);
        }
    });
}

// Function to handle previous selections
function handlePreviousSelection(newElement) {
    let selectedHari = newElement.getAttribute('data-hari');
    let selectedJam = newElement.getAttribute('data-jam');

    // Find if any schedule at the same time is already selected
    let previousSelectionIndex = selectedClasses.findIndex(cls => cls.hari === selectedHari && cls.jam === selectedJam);

    if (previousSelectionIndex !== -1) {
        // Find the previous element by its ID
        let previousElement = document.querySelector(`.jadwal-container[data-id="${selectedClasses[previousSelectionIndex].id}"]`);
        if (previousElement) {
            // Remove the green background from the previously selected element
            previousElement.classList.remove('bg-green-500');
        }

        // Remove the previous selection from the selectedClasses array
        selectedClasses.splice(previousSelectionIndex, 1);
    }
}

// Function to handle the schedule click
function handleScheduleClick(element, email) {
    let kodejadwal = element.getAttribute('data-id');
    let kodemk = element.getAttribute('data-kodemk');
    
    submitClass(kodejadwal, email, kodemk, element);
}

// Function to extract the time range from a string (e.g., "08:00 - 10:00")
function extractTimeRange(jamString) {
    let [startTime, endTime] = jamString.split(' - ');
    return { startTime, endTime };
}

// Function to check for conflicts
function checkConflict() {
    let conflictElements = [];
    
    document.querySelectorAll('.jadwal-container').forEach(jadwalElement => {
        let selectedHari = jadwalElement.getAttribute('data-hari');
        let selectedJam = jadwalElement.getAttribute('data-jam');
        let { startTime: selectedStartTime, endTime: selectedEndTime } = extractTimeRange(selectedJam);

        selectedClasses.forEach(cls => {
            if (cls.hari === selectedHari && jadwalElement.getAttribute('data-id') !== cls.id) {
                let { startTime: existingStartTime, endTime: existingEndTime } = extractTimeRange(cls.jam);

                // Check for time overlap (conflict)
                if (
                    (selectedStartTime < existingEndTime && selectedStartTime >= existingStartTime) ||
                    (existingStartTime < selectedEndTime && existingStartTime >= selectedStartTime)
                ) {
                    // Conflict detected, highlight the element in red
                    jadwalElement.classList.add('bg-red-800');
                    conflictElements.push(jadwalElement);
                }
            }
        });
    });
}

// When the page loads, restore selected schedules and conflict highlights
document.addEventListener('DOMContentLoaded', function() {
    selectedClasses.forEach(cls => {
        const jadwalElement = document.querySelector(`.jadwal-container[data-id="${cls.id}"]`);
        if (jadwalElement) {
            // Highlight previously selected schedules in green
            jadwalElement.classList.add('bg-green-500');

            // Check for conflicts and highlight in red if necessary
            checkConflict();
        }
    });
});


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
              document.getElementById('skscount').innerText = response.sks;
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




</script>





@endsection
