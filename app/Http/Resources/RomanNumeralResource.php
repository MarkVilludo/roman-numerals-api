<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RomanNumeralResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'number' => $this->number,
            'roman_numeral' => $this->roman_numeral,
            'created_at' => $this->created_at
        ];
    }
}
