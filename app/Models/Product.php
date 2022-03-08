<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function getRouteKeyName(){
        return 'code';
    }

    public function getPivotAttributes($value){
        return $this->pivot->system;
    }
    public function provider(){
        return $this->belongsTo(Provider::class);
    }

    public function branches(){
    	return $this->belongsToMany(Branch::class,'branch_product')->withPivot('stock','devolution');
        // return $pivot;
     		// ->withPivot('branch_id','stock')->select('pivot'); 
	} 

}
