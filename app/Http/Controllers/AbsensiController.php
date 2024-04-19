<?php

namespace App\Http\Controllers;

use App\Http\Resources\AbsenCollection;
use App\Models\Absen;
use App\Models\Shift;
use App\Repositories\DataDiri\DataDiriRepository;
use App\Repositories\Shift\ShiftRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AbsensiController extends Controller
{
    protected $absen,$shift;
    public $shiftRepository,$dataDiriRepository;
    public function __construct(
        Absen $absen,
        Shift $shift,
        DataDiriRepository $dataDiriRepository,
        ShiftRepository $shiftRepository
    )
    {
        $this->dataDiriRepository = $dataDiriRepository;
        $this->absen = $absen;
        $this->shift = $shift;
        $this->shiftRepository = $shiftRepository;
    }

    public function absensi(Request $request)
    {
        $data = $this->dataDiriRepository->whereEmployee($request);

        $timeAndDayNow = [
            'time' => now('Asia/Jakarta')->format('H:i:s'),
            'date' => now()->format('Y-m-d'),
        ];
        $dataAbsen = $data->Absen->count();
        if($dataAbsen){
            $absen = $this->absen->where('date',$timeAndDayNow['date'])->first();
            if($absen->clock_in == null){
                $absen->update([
                    'clock_in'=>$timeAndDayNow['time']
                ]);
            }
        }else{
            $absen = $this->absen->create([
                'date' => $timeAndDayNow['date'],
            ]);
            $data->Absen()->sync($absen->id,false);
            $shiftData= [
                'date'=>$timeAndDayNow['date'],
                'id_absens'=>$absen->id
            ];
            $this->shiftRepository->createShift($shiftData);
            $absen->update([
                'clock_in'=>$timeAndDayNow['time']
            ]);
        }

        $dataSave = [];
         if($absen->clock_in == $timeAndDayNow['time']){
            $dataSave['status'] = 'no clock-in';
            $absen->update($dataSave);
         }else{
            $dataSave['clock_out'] = $timeAndDayNow['time'];
            if ($absen->clock_in > '09:00:00') {
                $dataSave['status'] = 'late';
            } elseif ($absen->clock_in == '09:00:00') {
                $dataSave['status'] = 'valid';
            }elseif($absen->clock_in < '09:00:00'){
                $dataSave['status'] = 'early';
            }
            $absen->update($dataSave);
         }

         return response()->json([
            'status' => 'Successfully',
            'message' => 'Successfully save attenden',
        ], 200);

    }
}
