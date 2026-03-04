<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class member extends Model
{
    /** @use HasFactory<\Database\Factories\MemberFactory> */
    use HasFactory;
    protected $fillable=[
       'name',
       'addrass',
       'whatsapp',
       'statues',
       'membership_date',
    ];
    protected $casts=[
       'membership_date'=>'date',
    ];
    public function barrows(){
        return $this->hasMany(barrowing::class, 'member_id');
    }
    public function Function activebarrows(){
         return $this->barrows()->where('statues','barrowed')
    }
        
    }
    // $table->string('name');
    //         $table->string('email');
    //         $table->text('addrass');
    //         $table->string('whatsapp')->nullable();
    //         $table->enum('statues',['active','unactive'])->default('active');
    //         $table->date('membership_date')->default(now());
}
