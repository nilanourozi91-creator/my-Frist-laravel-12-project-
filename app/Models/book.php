<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    use HasFactory;
  
  protected $fillable=[
   'title',
   'isbn',
   'description',
   'published_at',
   'genra',
   'cover_imges',
   'avalible_copies',
   'tottle_copies',
   'statuse',
   'author_id'
  ];
    public function author(){
        return $this->belongsTo(authore::class,'author_id');
    }
    public function barrow(){
        return $this->hasMany(barrowing::class, 'book_id');
    }
    public function isAvelible(){
        return $this->avalible_copies>0;
    }
    public  Function barrows(){
       if ( $this->isAvelible()>0) {
        return $this->decrement('avalible_copies');
       }
    }
    public function returnbook(){
      if ($this->avalible_copies>$this->tottle_copies) {
        $this->increment('avalible_copies');
      }
    }
}
