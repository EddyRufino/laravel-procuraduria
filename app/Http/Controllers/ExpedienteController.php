<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExpedienteRequest;
// use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\Expediente;
use App\Proceso;
use App\Materia;
use App\Juzgado;
use App\Role;

class ExpedienteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('roles:admin,abogado,practicante,recep', ['except' => ['edit', 'update', 'show']]);
    }

    public function index()
    {
        $juzgados = Juzgado::all();

        $expedientes = Expediente::doesntHave('users')
                        ->latest()
                        ->paginate(6);

        return view('expedientes.index', compact('juzgados', 'expedientes'));
    }

    public function search(Request $request)
    {
        $select = $request->get('select');
        $nameExpe = $request->get('nameExpe');

        $juzgados = Juzgado::all();

        $expedientes = Expediente::where('juzgado_id', '=', $select)
                            ->orWhere('numExpediente', '=', $nameExpe)
                            // ->orWhere('numExpediente', 'LIKE', '%' . $nameExpe . '%') Si pongo esto tengo que escribir en las 2 cajas que estan en el index
                            ->paginate(1000);
        return view('expedientes.index', compact('expedientes', 'juzgados'));
    }

    public function create()
    {
        $materias = Materia::all();
        $juzgados = Juzgado::all();
        $procesos = Proceso::all();
        
        $roles = Role::with('users')
                    ->where('name', 'admin')
                    ->orWhere('name', 'abogado')
                    ->get();

        $users = $roles->flatMap->users;

        return view('expedientes.create', compact('materias', 'juzgados', 'procesos', 'users'));
    }


    public function store(ExpedienteRequest $request)
    {
        $expediente = Expediente::create($request->validated());

        $expediente->users()->sync($request->get('user_id'));

        return back()->with('status', 'Expediente guardado con éxito!', compact('expediente'));
    }

    public function show(Expediente $expediente)
    {
        return view('expedientes.show', compact('expediente'));
    }


    public function edit(Expediente $expediente)
    {
        $materias = Materia::all();
        $juzgados = Juzgado::all();
        $procesos = Proceso::all();

        $rolesPrctes = Role::with('users')
                    ->where('name', 'practicante')
                    ->get();

        // Tags = Practicantes;
        $tags = $rolesPrctes->flatMap->users;
            
        $roles = Role::with('users')
                    ->where('name', 'admin')
                    ->orWhere('name', 'abogado')
                    ->get();

        $users = $roles->flatMap->users;

        return view('expedientes.edit', compact('expediente', 'materias', 'juzgados', 'procesos', 'users', 'tags'));
    }


    public function update(Expediente $expediente, ExpedienteRequest $request)
    {
        $expediente->update($request->validated());

        $expediente->users()->sync($request->get('user_id'));
        
        return back()->with('status', 'Expediente fue asignado con éxito!');
    }


    public function destroy(Expediente $expediente)
    {
        $expediente->delete();
        
        return response()->json(['message' => 'Expediente archivado:  ' . $expediente->numExpediente]);
    }
}
