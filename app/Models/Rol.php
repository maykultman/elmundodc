<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;
    
    // public $timestamps = false;
    // public function users(){
    //     return $this->belongsToMany(User::class);
    // }
    // public function branch(){
    //     return $this->hasOne(Branch::class,'id','branch_id');
    // }
}
