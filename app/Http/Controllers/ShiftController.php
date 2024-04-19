<?php

namespace App\Http\Controllers;

use App\Http\Resources\DataDiriCollection;
use App\Http\Resources\ShiftCollection;
use App\Models\Shift;
use App\Repositories\Absen\AbsenRepository;
use App\Repositories\DataDiri\DataDiriRepository;
use App\Repositories\NasionalDay\NasionalDayRepository;
use App\Repositories\Shift\ShiftRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class ShiftController extends Controller
{
    protected $shift;
    public $shiftRepository,$dataDiriRepository,$nasionalRepository,$absenRepository;
    public function __construct(
        NasionalDayRepository $nasionalDayRepository,
        ShiftRepository $shiftRepository,
        DataDiriRepository $dataDiriRepository,
        AbsenRepository $absenRepository,
        Shift $shift)
    {
        $this->nasionalRepository = $nasionalDayRepository;
        $this->shift = $shift;
        $this->dataDiriRepository = $dataDiriRepository;
        $this->shiftRepository = $shiftRepository;
        $this->absenRepository = $absenRepository;
    }

    public function showAllDataDiri(){
        $data = $this->dataDiriRepository->showAllData();
        $datadiri = new DataDiriCollection($data);

        return $datadiri->response()->setStatusCode(Response::HTTP_OK);
    }

    public function createShift(Request $request){
        $data = $this->dataDiriRepository->whereEmployee($request);
        $getAllNasionalDay = $this->nasionalRepository->getAllNasionalDay();
        $checkShift = $this->shiftRepository->showAll();

        foreach($getAllNasionalDay as $nasional){
            if($nasional->holiday_date == $request->date ){
                return response()->json([
                    'status' => 'Libur Nasional',
                    'message' => $nasional->holiday_name,
                ]);
            }
        }

        foreach($checkShift as $shift){
            if($shift->date == $request->date){
                return response()->json([
                    'status' => 'Shift created Successfully',
                    'message' => $shift->description,
                ]);
            }
        }
        $makeAbsenData = [
            'date'=>$request->date
        ];
        $absen = $this->absenRepository->create($makeAbsenData);

        $data->Absen()->sync($absen->id,false);

        $makeShift = [
            'date'=>$request->date,
            'id_absens'=>$absen->id,
        ];
        $shift = $this->shiftRepository->createShift($makeShift);

        $datashift = new ShiftCollection([
            'absen'=>$absen,
            'shift'=>$shift,
            'datadiri'=>$data
        ]);
        return $datashift->response()->setStatusCode(Response::HTTP_OK);
    }


    public function deleteShift(Request $request)
    {
        $data = $this->dataDiriRepository->whereEmployee($request);
        $shiftDeleted = false; // Initialize a flag to track if any shifts were deleted

        // Loop through each Absen record
        $datas = collect($data->Absen)->map(function ($item) use ($request, &$shiftDeleted) {
            if ($item->date == $request->date) {
                $shift = $this->shift->where('id_absens', $item->id)->first() ?? null;

                if ($shift) {
                    $shift->delete();
                    $shiftDeleted = true; // Set the flag to true if any shift was deleted
                }

                DB::table('has_absens')->where('id_absen', $item->id)->delete();

                $item->delete();

                return true;
            }

            return false;
        });

        // Check if any shifts were deleted
        if ($shiftDeleted) {
            return response()->json([
                'status' => 'Shift deleted',
                'message' => $datas,
            ]);
        } else {
            return response()->json([
                'status' => 'Shift Not found',
                'message' => $datas,
            ]);
        }
    }

}
