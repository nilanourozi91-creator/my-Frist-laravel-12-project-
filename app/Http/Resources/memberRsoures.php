<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class memberRsoures extends JsonResource
// name	email	addrass	whatsapp	statues	membership_date
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name'=>$this->name,
            'email'=>$this->email,
            'addrass'=>$this->addrass,
            'whatsapp'=>$this->whatsapp,
            'statuse'=>$this->statuse,
            'membership_date'=>$this->membership_date,
        ];
    }
}
