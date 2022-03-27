<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Sale_Product;
class SaleController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        return 'code';
    }

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
        return [
            'status' => 200,
            'message' => 'Success',
            'data' => ['sale'=>$sale, 'products'=>$sale->products]
        ];
                    
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
