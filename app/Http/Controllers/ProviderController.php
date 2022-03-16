<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Provider;
class ProviderController extends Controller
{
    private $paginate = 10;
    public function index()
    {
        $providers = Provider::paginate($this->paginate);
        return view('providers.index', compact('providers'));
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
        return Provider::find($id);
    }

    public function edit($id)
    {
        $provider = Provider::find($id);
        return view('providers.edit', compact('provider'));
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
