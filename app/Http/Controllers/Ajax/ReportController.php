<?php

namespace App\Http\Controllers\Ajax;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Sale;

class ReportController extends Controller{

	public function branch($id){

	}
	public function boxCut($branch_id){
		
		return Sale::where('branch_id', $branch_id)
					->whereDate('created_at', Carbon::today())
					->get();
		
	}
	public function branchProducts($id){

	}

	public function branchSales($id){

	}

}