<?php

namespace App\Http\Resources;

use App\Models\Shift;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class DataDiriCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return $this->collection->map(function ($item) {
            $absens = $item->Absen()->with('shiftDiri')->get();

            return [
                'name' => $item->name,
                'birthday' => $item->birthday,
                'id_pegawai' => $item->id_pegawai,
                'shifts' => $absens->map(function ($items) {
                    $shift = Shift::where('id_absens',$items->id)->get() ?? null;
                    return [
                        'date' => $items->date,
                        'status-absen' => $items->status,
                        'clock_in'=>$items->clock_in ?? null,
                        'clock_out'=>$items->clock_out ?? null,
                        'shift-status' => $shift->map(function ($action) {
                            return [
                                'status' => $action->status,
                                'nasional_holiday' => $action->check_holiday_nasional,
                            ];
                        }),
                    ];
                }),
            ];
        })->toArray();
    }
}
