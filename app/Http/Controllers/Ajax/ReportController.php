<?php

namespace App\Http\Controllers\Ajax;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\SaleProducts;

class ReportController extends Controller{

	public function branch($id){

	}
	public function boxCut($branch_id){
		$today = Carbon::today();

		$sales = Sale::where('branch_id', $branch_id)
					->whereDate('created_at', $today)
					->get();

		$sale_product = SaleProducts::whereDate('created_at', $today)
						->get();
		return [
			'subtotal' => $sales->sum('subtotal'),
			'total' => $sales->sum('total'),
			'qty' => $sale_product->sum('qty')
		];
	}
	public function branchProducts($id){

	}

	public function branchSales($id){

	}

}