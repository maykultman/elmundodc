<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Models\Branch;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('productos/{id}', function ($id) {
    $product = Product::where('id',$id)->with('branches')->first();
    $branches = Branch::select('id','name')->get();
    
    foreach($branches as $k => $branch){
        foreach($product->branches as $pb){
            if($pb->id==$branch->id){
                $branches[$k]['stock'] = $pb->pivot->stock;
            }
        }
    }
    
    return [
            'producto' => [
                "id" => $product->id,
                "provider_id" => $product->provider_id,
                "code" => $product->code,
                "name" => $product->name,
                "price" => $product->price,
                "stock" => $product->stock,
                "provider" => [
                    "name" => ( isset($product->provider->name) ? $product->provider->name : '' ),
                    "phone" => ( isset($product->provider->phone)? $product->provider->phone : '' )
                ],
                "updated_at" => $product->updated_at->toFormattedDateString(),
            ],
            'sucursales' => $branches
    ];
});

Route::post('products/batchDelete', function(Request $request){
    
    $response = Product::whereIn('code',$request)->delete();
    return [
        'message'=>'success',
        'status' => 200,
        'data' => $response
    ];
});

Route::post('products/batchRestore', function(Request $request){
    
    $response = Product::withTrashed()->whereIn('code',$request);
    $response->restore();
    return [
        'message'=>'success',
        'status' => 200,
        'data' => $response
    ];
});

Route::post('products/batchDestroy', function(Request $request){

    $response = Product::whereIn('code', $response)->withTrashed();
    $response->forceDelete();

    return [
        'message'=>'success',
        'status' => 200,
        'data' => $response
    ];
});

Route::apiResource('sales','SaleController')
->parameters(['sales'=>'sale'])->names('sales');

Route::apiResource('branches',  'BranchController');
Route::apiResource('sales','SaleController');
Route::get('boxCut/{branch_id}','ReportController@boxCut');