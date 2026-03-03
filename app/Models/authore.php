<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class authore extends Model
{
    /** @use HasFactory<\Database\Factories\AuthoreFactory> */
    use HasFactory;
     protected $fillable=[
    'name',
    'bio',
    'nationality',
   
   ];
  
    public function book(){
        return $this->hasMany(book::class,'author_id');
    }
}
