<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barrowing extends Model
{
    /** @use HasFactory<\Database\Factories\BarrowingFactory> */
    use HasFactory;
    // $table->string('name');
    //         $table->foreignId('member_id')->constrained('members')->CasCadeOnDelete();
    //         $table->foreignId('book_id')->constrained('books')->CasCadeOnDelete();
    //         $table->date('barrow_date');
    //         $table->date('due_date');
    //         $table->date('bring_date')->nullable();
    //         $table->enum('stutas',['ret
    protected $fillable=[
      'member_id',
      'name',
      'barrow_date',
      'bring_date',
      'stutas',
      'due_date',
      'book_id',
    ];
    protected $casts=[
        'due_date'=>'date',
        'bring_date'=>'date',
        'barrow_date'=>'date',
    ];
    public function book(){
        return $this->belongsTo(book::class);
    }
    public function member(){
        return $this->belongsTo(member::class);
    }
    public function overDue(){
         $this->due_date>Carbon::today() && $this->stutas==='barrowed';
    }
}
