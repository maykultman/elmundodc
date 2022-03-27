<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BranchProduct extends Model
{
    use HasFactory;
    protected $table = 'branch_product';
    public $timestamps = false;
    // public function rol(){
    // //     return $this->belongsTo(UserRoles::class);
    // //     // return $this->belongsToMany(Branch::class,'branch_product')->withPivot('stock','devolution');
    // }
}
