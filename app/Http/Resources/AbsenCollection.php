<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class AbsenCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'clock_in'=>$this->clock_in ?? null,
            'clock_out'=>$this->clock_out ?? null,
            'date'=>$this->date,
            'status'=>$this->status
        ];
    }
}
