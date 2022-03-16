<?php

namespace App\Http\Controllers\Ajax;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Branch;

class BranchController extends Controller
{

    public function show($id)
    {
        return Branch::find($id);
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
