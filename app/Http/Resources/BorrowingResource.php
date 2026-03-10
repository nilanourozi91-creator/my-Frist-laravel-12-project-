<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BorrowingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
                 'id'=>$this->id,
                 'book_id'=>$this->book_id,
                 'member_id'=>$this->member_id,
                 'borrowed_at'=>$this->brrowed_at,
                 'returned_at'=>$this->returned_at,
        ];
    }
}
