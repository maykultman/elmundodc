<?php

namespace App\Http\Controllers;
use App\Http\Requests\SaveProductRequest;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Provider;
use App\Models\Branch;


class ProductController extends Controller
{
    public function __construct()
    {
        $this->paginate = 10;
        $this->middleware('auth');
    } 
    public function index()
    {
        $products = Product::orderBy('id','desc')->paginate($this->paginate);
        return view('products.index', compact('products'));
    }

    public function papelera(){
        $products = Product::onlyTrashed()->paginate($this->paginate);
        return view('products.index', compact('products'));
    }
    public function create()
    {
        $product = new Product();
        return $this->getInfo('new', $product);
    }

    public function store(SaveProductRequest $request)
    {
        $product = new Product();
        if( $request->validated() ){
            // SaveProductRequest $request
            $product = $product->create( $request->validated() );
            // get array stocks 
            $stocks = $this->saveStock($request->sucursales);
            // save stock of table "branch_product"
            $product->branches()->attach($stocks);
            return redirect()->route('productos.edit', $product )
                    ->with('status','El producto se ha guardo con éxito');
        }
    }
    public function search(Request $request){
        // Get the search value from the request
        $search = $request->input('search');
    
        // Search in the title and body columns from the product table
        $products = Product::query()
            ->where('code', 'LIKE', "%{$search}%")
            ->orWhere('name', 'LIKE', "%{$search}%")
            ->paginate($this->paginate);
        
        return view('products.index', compact('products'));
    }

    public function show(Product $product)
    {
        return $product;
    }

    public function edit(Product $product)
    {
        return $this->getInfo('edit', $product);
    }
    private function getInfo($view, $product){
        $providers = Provider::all();
        $branches = Branch::all();
        
        return view('products.'.$view, compact('product','providers','branches'));
    }
    private function saveStock($arrayBranchStock){

        $branches = collect($arrayBranchStock['id']);
        $stocks = collect($arrayBranchStock['stock']);
        $combined = $branches->combine($stocks);
        // Add stock to array of branches
        $combined = $combined->map(function($value, $key){
            if( $value != null ){return ['stock'=> $value];
            }
        });
        // Filter "null's" values
        $combined = $combined->filter(function($value, $key){
            return $value != null;
        });

        return $combined->all();
    }
    //  Product $product Request $request, 
    public function update(Product $product, SaveProductRequest $request)
    {
        // SaveProductRequest $request
        $product->update( $request->validated() );
        
        // get array stocks 
        $stocks = $this->saveStock($request->sucursales);
        
        // save stock of table "branch_product"
        $product->branches()->sync($stocks);
        return redirect()->route('productos.edit', $product )
                ->with('status','El producto se actualizó con éxito');
    }
    public function forceDelete($code)
    {
        $product = Product::where('code', $code)->withTrashed()->firstOrFail();
        $product->forceDelete();
        $message = 'Error';
        if(isset($product->id)){
            $message = ['status','El producto se eliminó con éxito'];
        }
        return redirect()->route('productos.index')->with($message);
    }
    public function restore($code)
    {   
        $product = Product::withTrashed()->whereCode($code)->firstOrFail();
        $product->restore();
        return redirect()->route('productos.index')->with('status','El producto fue restaurado con éxito');
    }
    public function destroy(Product $product)
    {
        $product->delete();
        $message = 'Error';
        if(isset($product->id)){
            $message = ['status','El producto se actualizó con éxito'];
        }
        return redirect()->route('productos.index', $product )
                    ->with($message);
    }
    public function batchDelete(Request $request){
        return $request;
    }
}