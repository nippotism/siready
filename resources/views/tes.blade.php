@extends('header')

@section('title','Buat Jadwal')

@section('page')

   

    <div class="flex pt-12 overflow-hidden">

        {{-- sidebar --}}
  
          
        {{-- end sidebar --}}
  k
  
        <div id="main-content" class="mt-8 relative text-gray-900 dark:text-gray-200 font-poppins w-full h-full overflow-y-auto lg:pl-52">
            <h1 class="mx-8 mb-4 font-semibold text-lg">Hello Ahmad Douglas</h1>
           <div class="p-10 mx-8 bg-white border border-gray-200 rounded-3xl shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-[#1D2125]">
               <div class="grid grid-cols-3 text-center">
                   <div class="justify-center px-32">
                       <h1 class="font-bold pb-4">Pengajuan IRS</h1>
                       <div class="bg-blue-700 rounded-3xl px-2 py-3">
                           <h1>180</h1>
                        </div>
                    </div>
                   <div class="justify-center px-32">
                       <h1 class="font-bold pb-4">IRS Disetujui</h1>
                       <div class="bg-green-400 rounded-3xl px-2 py-3">
                           <h1>180</h1>
                        </div>
                    </div>
                   <div class="justify-center px-32">
                       <h1 class="font-bold pb-4">IRS Ditolak</h1>
                       <div class="bg-red-500 rounded-3xl px-2 py-3">
                           <h1>180</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-6 text-white text-center">
                <table id="tableTest" class = "display">
                   <thead>
                        <tr>
                            <th>No</th>
                            <th>Tahun Ajaran</th>
                            <th>Semester</th>
                            <th>Program Studi</th>
                            <th>IPK</th>
                        </tr>
                    </thead> 
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>2022</td>
                            <td>S1</td>
                            <td>Informatika</td>
                            <td>3.9</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>2022</td>
                            <td>S1</td>
                            <td>Informatika</td>
                            <td>3.9</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>2022</td>
                            <td>S1</td>
                            <td>Inform  atika</td>
                            <td>4</td>
                        </tr>
                    </tbody>
                </table>  
                
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#tableTest').DataTable();
        });
    </script> 

@endsection