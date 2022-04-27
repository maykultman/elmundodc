<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branch;
use App\Models\Product;
class BranchController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
        $branches = Branch::orderBy('id','desc')->paginate(6);
        return view('branches.index', compact('branches'));
    }


    public function create()
    {
        $branch = new Branch();
        return view('branches.new', compact('branch'));
    }

    public function store(Request $request)
    {
        $branch = new Branch();
        $branch->code = $request->code;
        $branch->name = $request->name;
        $branch->phone = $request->phone;
        $branch->address = $request->address;
        $branch->save();
        // // get array stocks 
        // $stocks = $this->saveStock($request->sucursales);
        // // save stock of table "branch_product"
        // $branch->products()->sync($stocks);
        
        return redirect()->route('sucursales.edit', $branch)
        ->with('status','El producto se actualizó con éxito');
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $branch = Branch::find($id);
        $branchProducts = $branch->products;
        $products = Product::all();
        return view('branches.edit', compact('branch','products','branchProducts'));
    }

    private function saveStock($arrayBranchStock){

        $branches = collect($arrayBranchStock['id']);
        $stocks = collect($arrayBranchStock['stock']);
        $combined = $branches->combine($stocks);
        // Add stock to array of branches
        $combined = $combined->map(function($value, $key){
            if( $value != null ){
                return ['stock'=> $value];
            }
        });
        // Filter "null's" values
        $combined = $combined->filter(function($value, $key){
            return $value != null;
        });

        return $combined->all();
    }

    public function update(Request $request, $id)
    {
        $branch = Branch::find($id);
        
        $branch->name = $request->name;
        $branch->phone = $request->phone;
        $branch->address = $request->address;
        $branch->save();
        // get array stocks 
        $stocks = $this->saveStock($request->sucursales);
        // save stock of table "branch_product"
        $branch->products()->sync($stocks);
        
        return redirect()->route('sucursales.edit', $branch)
        ->with('status','El producto se actualizó con éxito');
        
    }

    public function destroy($id)
    {
        $branch = Branch::find($id);
        $branch->delete();
        return redirect()->route('sucursales.index')
                ->with('status','El producto se eliminó con éxito');
    }
}
