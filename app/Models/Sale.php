<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function branch(){
        return $this->belongsTo(Branch::class, 'branch_id', 'id');
    }
    public function products(){
        return $this->hasMany(SaleProducts::class);
    }
}