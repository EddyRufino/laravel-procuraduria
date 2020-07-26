<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Expediente;
use App\Juzgado;
use App\Tag;
use App\User;

class PendientesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $juzgados = Juzgado::all();

        $tags = User::with('expedientes')
            ->where('id', auth()->id())
            ->get();

        $pendientes = $tags->flatMap->expedientes;

        return view('pendientes.index', compact('pendientes', 'juzgados'));
    }

    public function buscarp(Request $request)
    {
        $select = $request->get('selectp');
        // $search = $request->get('search');

        $juzgados = Juzgado::all();

        $pendientes = Expediente::Where('juzgado_id', '=', $select)
                        ->paginate(1000);
        return view('pendientes.index', compact('pendientes', 'juzgados'));
    }

    public function welcome(Expediente $expediente)
    {
        $pendiente = User::with('expedientes')
                    ->where('id', auth()->id())
                    ->get();

        $pendientes = $pendiente->flatMap->expedientes;

        $today = Carbon::today()->toDateString();
        $beforOneDay = Carbon::today()->subDays(1)->toDateString();
        $addThreeDay = Carbon::today()->addDays(3)->toDateString();

        $pendientesVencidos = $pendientes
            ->where('fechaAudiencia', '<', $beforOneDay);

        $pendientesPorVencer = $pendientes
            ->whereBetween('fechaAudiencia', [$today, $addThreeDay]);

        return view('welcome', compact('pendientes', 'pendientesVencidos', 'pendientesPorVencer'));
    }
}
