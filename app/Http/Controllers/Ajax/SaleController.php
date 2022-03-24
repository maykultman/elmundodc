<?php

// namespace App\Http\Controllers;
namespace App\Http\Controllers\Ajax;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Sale_Product;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    return 'code';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $products = [];
        $sale = Sale::create([
            'branch_id' => 1,
            'user_id' => 2,
            'folio' => date('U'),
            'subtotal' => $request->subtotal,
            'discount' => ($request->descuento ?? 0),
            'total' => $request->total,
            'payment_with' => $request->pagoCon
        ]);
        if( isset($sale->id) ){
            foreach($request->cart as $sp){
                array_push(
                    $products,
                    [
                        'sale_id' => $sale->id,
                        'branch_id' => $sale->branch_id,
                        'user_id' => $sale->user_id,
                        'code' => $sp['code'], 
                        'name' => $sp['name'],
                        'price' => $sp['price'],
                        'qty' => $sp['qty']
                    ]
                );
            }
            $sale->products()->createMany($products);
        }
		$ticket = [
			"branch_id" => $sale->branch_id,
			"created_at" => $sale->created_at,
			"discount" => $sale->discount,
			"folio" => $sale->folio,
			"id" => $sale->id,
			"payment_with" => $sale->payment_with,
			"subtotal" => $sale->subtotal,
			"total" => $sale->total,
			"user_id" => $sale->user_id,
			"products" => $sale->products
		];

        return response()->json([
            'status' => 200,
            'message' => 'Success',
            'data' => $ticket
        ]);
                    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
