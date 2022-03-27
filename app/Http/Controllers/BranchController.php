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
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $branch = Branch::find($id);
        $products = Product::paginate(10);
        return view('branches.edit', compact('branch','products'));
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
