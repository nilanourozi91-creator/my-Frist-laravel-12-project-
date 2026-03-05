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
    public  Function activebarrows(){
         return $this->barrows()->where('statues','barrowed');
    }
        
}
