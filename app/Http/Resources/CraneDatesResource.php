<?php

namespace App\Http\Resources;

use App\Models\CraneDate;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CraneDatesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request $request
     * @return array
     */
    public function toArray($request)
    {
        /**
         * @var $this CraneDate
         */
        $relation = class_basename($this->cranable);
        return [
			'id'		=> $this->id,
            'title'     => $this->cranable->name,
            'allDay'    => false,
			'start'     => $this->date,
            'extendedProps' => [
				'id'        => $this->id,
				'date'      => $this->date->format('Y-m-d H:i'),
				'name'      => $this->cranable->name,
				'cranable_type'	=> $this->cranable_type,
				'cranable_id'   => $this->cranable_id,
				'crane_date'    => $this->crane_date,
				'crane_time'    => $this->crane_time,
                'type'   	=> $this->cranable->type,
                'customer'  => $this->cranable->customer ? $this->cranable->customer->name : null,
				'fon'		=> $this->cranable->customer ? $this->cranable->customer->fon : null,
                'relation'  => $relation
            ]
        ];
    }
}
