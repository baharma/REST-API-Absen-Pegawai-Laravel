<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use App\Models\Shift;
use App\Repositories\DataDiri\DataDiriRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    protected $absen,$shift,$dataDiriRepository;
    public function __construct(
        Absen $absen,
        Shift $shift,
        DataDiriRepository $dataDiriRepository
    )
    {
        $this->dataDiriRepository = $dataDiriRepository;
        $this->absen = $absen;
        $this->shift = $shift;
    }

    public function absensi(Request $request)
    {
        $data = $this->dataDiriRepository->whereEmployee($request);

        $timeAndDayNow = [
            'time' => now('Asia/Jakarta')->format('H:i:s'),
            'date' => now()->format('Y-m-d'),
        ];

        // Check if attendance data exists for the employee
        if ($data->Absen->isEmpty()) {
            // No attendance data exists, create a new record
            $dataabsen = $this->absen->create([
                'date' => $timeAndDayNow['date']
            ]);
        } else {
            // Attendance data exists, check if there's a record for the current date
            $existingRecord = $data->Absen->first(function ($item) use ($timeAndDayNow) {
                return $item->date == $timeAndDayNow['date'];
            });

            if ($existingRecord) {
                // If there's a record for the current date, use it
                $dataabsen = $existingRecord;
            } else {
                // If there's no record for the current date, create a new one
                $dataabsen = $this->absen->create([
                    'date' => $timeAndDayNow['date']
                ]);
            }
        }
        $absen = [
            'date' => $timeAndDayNow['date'],
        ];

        if (isset($dataabsen->clock_in)) {
            $absen['clock_in'] = $timeAndDayNow['time'];
            $absen['status'] = 'no clock-out';
        }
        $dataabsen->update($absen);
        dd($dataabsen);
    }

    public function clockOut(Request $request){

    }
}
