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
        // $pendientes = Expediente::where('user_id', auth()->id())
        //         ->latest()
        //         ->paginate(5);


        // $pendientes = Expediente::with('users')
        //     // ->where('user_id', auth()->id())
        //     ->get();


        $tags = User::with('expedientes')
            ->where('id', auth()->id())
            ->get();
        
        // dd($tags);

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

    public function welcome()
    {
        $date = Carbon::now();
        $date = Carbon::parse($date);

        // $pendientes = Expediente::where('user_id', auth()->id())
        //         ->select('id', 'numExpediente', 'fechaApertura', 'fechaAudiencia')->get();

        $pendiente = User::with('expedientes')
                    ->where('id', auth()->id())
                    ->get();
        
        $pendientes = $pendiente->flatMap->expedientes;
        // dd($pendientes->pluck('fechaAudiencia'));

        // foreach ($pendientes  as $pendiente) {
        //     dd($pendiente->expedientes->attributes);
        // }


        return view('welcome', compact('pendientes'));
    }

    // public function welcome()
    // {
    //     $date = Carbon::now();

    //     $date = Carbon::parse($date)->subDays(2);
    //     // return $date;
    //     // $resta = Carbon::parse('--02');
    //     // return $date->diffInDays($resta);
    //     $pendientes = Expediente::where('user_id', auth()->id())
    //                 ->whereDate('fechaAudiencia', '=', $date)->get();
    //             // ->select('created_at', 'fechaAudiencia')->get();

    //     // return $pendientes;
    //     // $p = $pendientes->diffForHumans(); ->format('Y-m-d')
    //     return view('welcome', compact('pendientes'));
    //     // return $pendientes;
    // }

    public function destroy($id)
    {
        //
    }
}
