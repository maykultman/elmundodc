<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Devolution extends Model
{
    use HasFactory;
    public function branch(){
        return $this->belongsTo(Branch::class, 'branch_id', 'id');
    }
    public function products(){
        return $this->hasMany(DevolutionsProducts::class);
    }
}
