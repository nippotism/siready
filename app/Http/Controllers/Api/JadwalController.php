<?php

namespace App\Http\Controllers\Api;

use App\Models\Jadwal;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Models\Irstest;
use App\Models\Matakuliah;

class JadwalController extends Controller
{
    

    public function getJadwalForMonth()
    {

        $user = auth()->user();
        $email = $user->email;

        
        // Get the current month and year
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();

        // Query to get all jadwal data within the current month

        $jadwals = Jadwal::join('irs_test', 'jadwal.id', '=', 'irs_test.kodejadwal')
            ->where('irs_test.email', $email)
            ->get();
            


        // Initialize an array to store the result
        $result = [];

        // Iterate over each day of the month
        for ($date = $startOfMonth; $date <= $endOfMonth; $date->addDay()) {
            // Get the day of the week (1 for Monday, 2 for Tuesday, ..., 7 for Sunday)
            $dayOfWeek = $date->isoWeekday();

            

            // Map the data for the day if it exists in the database
            if ($jadwals->where('hari', $dayOfWeek)->isNotEmpty()) {
                $schedules = $jadwals->where('hari', $dayOfWeek)->map(function ($item) {
                    $jamend = [
                        "" => '',
                        1 => '07.50',
                        2 => '08.40',
                        3 => '09.30',
                        4 => '10.30',
                        5 => '11.20',
                        6 => '12.10',
                        7 => '13.00',
                        8 => '13.50',
                        9 => '14.40',
                        10 => '15.40',
                        11 => '16.30',
                        12 => '17.20',
                        13 => '18.10',
                    ];
            
                    $jamstart = [
                        "" => '',
                        0 => '07.00',
                        1 => '07.50',
                        2 => '08.40',
                        3 => '09.40',
                        4 => '10.30',
                        5 => '11.20',
                        6 => '12.10',
                        7 => '13.00',
                        8 => '13.50',
                        9 => '14.40',
                        10 => '15.40',
                        11 => '16.30',
                    ];

                    return [
                        'name' => Matakuliah::where('kodemk', $item->kodemk)->first()->nama,
                        'time' => $jamstart[$item->jammulai] . ' - ' . $jamend[$item->jamselesai],
                        'description' => $item->ruang,
                        'label' => $item->status === 'conflict' ? 'red' : 'green', // Example logic for label
                    ];
                })->values();

                // Add the schedules to the result array, keyed by the day of the month
                $result[$date->format('j')] = $schedules;
            }
        }

        // Return the JSON response
        return response()->json($result);
    }

}
