<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Provider;
class ProviderController extends Controller
{
    private $paginate = 10;
    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
        $providers = Provider::paginate($this->paginate);
        return view('providers.index', compact('providers'));
    }

    public function create()
    {
        $provider = new Provider();
        return view('providers.new', compact('provider'));
    }

    public function store(Request $request)
    {
        $provider = Provider::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address
        ]);
        return view('providers.edit', compact('provider'));
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
        $provider = Provider::find($id);
        $provider->name = $request->name;
        $provider->phone = $request->phone;
        $provider->email = $request->email;
        $provider->address = $request->address;
        $provider->save();
        // return view('providers.edit', compact('provider'));
        return redirect()->route('proveedores.edit', $provider)
            ->with('status','El proveedor se ha guardo con éxito');
    }
    public function destroy(Provider $provider)
    {
        $provider->delete();
        return redirect()->route('proveedores.index')->with('status','El proveedor fue eliminado con éxito');
    }
}
