<?php

namespace App\Models;
use 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    /** @use HasFactory<\Database\Factories\BookFactory> */
    use HasFactory;
    //  $table->string('isbn');
    //         $table->text('description');
    //         $table->date('published_at');
    //         $table->integer('tottle_copies')->default('1');
    //         $table->integer('avalible_copies')->default('1');
    //         $table->string('cover_imges');
    //         $table->enum('statuse',['avalible','unavalible'])->default('avalible');
    //         $table->foreignId('author_id')->constrained('authores')->CasCadeOnDelete();
    //         $table->string('genra');
    //         $table->timestamps();
    //         $table->index(['title','author_id']);
            // $table->index(['isbn']);
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
        return $this->belongsTo(author::class,'author_id');
    }
    public function barrow(){
        return $this->hasMany(barrowing::class, 'book_id');
    }
    public function isAvelible(){
        return $this->avalible_copies>0;
    }
    public  Function barrows(){
       if (return $this->isAvelible>0) {
         $this->decrement('avalible_copies');
       }
    }
    }
    public function returnbook(){
      if ($this->avalible_copies>$this->tottle_copies) {
        $this->increment('avalible_copies');
      }
    }
}
