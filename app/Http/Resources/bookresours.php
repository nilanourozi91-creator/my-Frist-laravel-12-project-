<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class bookresours extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
      
        return [
            'title'=>$this->title,
            'isbn'=>$this->isbn,
            'description'=>$this->description,
            'author'=>new authorResours($this->whenLoaded("author")),
            'genra'=>$this->genra,
            'avalible_copies'=>$this->avalible_copies,
            'tottle_copies'=>$this->tottle_copies,
            'published_at'=>$this->published_at,
            'cover_imges'=>$this->cover_imges,
            'statuse'=>$this->statuse

        ];
    }
}
