<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ShiftCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public $absen,$shift,$datadiri;
     public function __construct($resource)
     {
         $this->absen = $resource['absen'];
         $this->shift = $resource['shift'];
         $this->datadiri = $resource['datadiri'];
     }

    public function toArray(Request $request): array
    {
        return [
            'status' => 'success',
            'message' => 'Created Shift successfully',
            'status' =>[
                'name'=> $this->datadiri->name,
                'shift-date' => $this->shift->date
            ]
        ];
    }
}
