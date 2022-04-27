<?php
namespace App\Http\Controllers;
use App\Http\Requests\SaveUserRequest;

use App\Models\User;
use App\Models\Rol;
use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index()
    {
        $users = User::paginate(6);
        return view('users.index',compact('users'));
    }

    public function create()
    {
        $user = new User();
        return view('users.new', compact('user'));
    }

    public function store(SaveUserRequest $request)
    {
        if( $request->validated() ){
            $validated = $request->validated();
            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => bcrypt($validated['password'])
            ]); 



            return redirect()->route('usuarios.edit', $user)
            ->with('status','El usuario se ha guardo con éxito');
        }
        return redirect()->route('users.create', $user)
            ->with('status','Intenta nuevamente');
    }

    public function show(User $User){}

    public function edit(User $user)
    {
        $roles = Rol::all();
        $branches = Branch::all();
        $branch = '';
        if(isset($user->roles[0])){
            $branch = $branches->find($user->roles[0]->pivot->branch_id);
        }
        return view('users.edit', compact('user','roles','branches','branch'));
    }

    public function update(Request $request, User $user)
    {  
        if($request->password!=''){
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);
        }else{
            $user->update([
                'name' => $request->name,
                'email' => $request->email
            ]);
        }
        $user->roles()->sync( [ $request->rol_id => ['branch_id'=>$request->branch_id] ]);
        return redirect()->route('usuarios.edit', $user)
            ->with('status','El usuario se ha guardo con éxito');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('usuarios.index')
        ->with('status','El usuario se ha eliminado con éxito');
    }
}
