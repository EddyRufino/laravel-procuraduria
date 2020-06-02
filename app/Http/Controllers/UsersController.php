<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use Illuminate\Http\Request;
use App\Http\Requests\UsuariosRequest;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => 'show']);
        $this->middleware('roles:admin', ['except' => ['edit', 'update', 'show']]);
    }


    public function index()
    {
        $users = User::latest()->paginate(3);
        return view('users.index', compact('users'));
    }


    public function create()
    {
        return view('users.create', [
            'roles' => Role::pluck('display_name', 'id'),
            'user' => new User
        ]);
    }


    public function store(UsuariosRequest $request)
    {
        $user = User::create($request->validated());

        $user->roles()->attach($request->roles);

        return redirect()->route('usuarios.index')->with('status', 'Usuario guardado con éxito!');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $user = User::findOrFail($id);

        $roles = Role::pluck('display_name', 'id');

        return view('users.edit', compact('user', 'roles'));
    }


    public function update(UsuariosRequest $request, $id)
    {
        $user = User::findOrFail($id);

        $user->update($request->only('name', 'email'));

        $user->roles()->sync($request->roles);

        return redirect()->route('usuarios.index')->with('status', 'Usuario actualizado con éxito!');
    }


    public function destroy($id)
    {
        return $id;
    }
}
