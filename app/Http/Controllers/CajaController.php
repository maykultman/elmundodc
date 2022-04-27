<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Branch;
class CajaController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->_user = auth()->user();
    }
    private function rol(){
        return auth()->user()->rol;
    }
           // $products = Product::whereHas('branches', function ($query) use ($rol){
        //     $query->where('branches.id', $rol->branch_id);
        // })->get();
        // return $products;
    public function index()
    {
        // $rol = $this->rol();
        $branch = Branch::where('id', 1)->with('products')->firstOrFail();
        // $branch = Branch::where('id', $rol->branch_id)->with('products')->firstOrFail();
        $products = [];
        $copyProducts = $branch->products->toArray();
        foreach ($branch->products as $index => $product){
            $k = array_search($product->code, array_column($products, 'code'));
            if( $k === false ){
                array_push($products,[
                    "id" => $product->pivot['product_id'],
                    "code" => $product->code,
                    "name" => $product->name,
                    "price" => $product->price,
                    "stock" => $product->pivot['stock'],
                    "branch_id" => $product->pivot['branch_id']
                ]);
            }
        }
        // return $products;
        return view('cashbox.index', compact('products'));
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
        //
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
