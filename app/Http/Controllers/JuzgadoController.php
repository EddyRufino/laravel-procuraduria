<?php

namespace App\Http\Controllers;

use App\Juzgado;
use Illuminate\Http\Request;

class JuzgadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('juzgados.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombreJuzgado' => 'required',
            'condition' => ''
        ]);

        Juzgado::Create($data);
        return back()->with('status', 'Agrego un nuevo juzgado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Juzgado  $juzgado
     * @return \Illuminate\Http\Response
     */
    public function show(Juzgado $juzgado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Juzgado  $juzgado
     * @return \Illuminate\Http\Response
     */
    public function edit(Juzgado $juzgado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Juzgado  $juzgado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Juzgado $juzgado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Juzgado  $juzgado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Juzgado $juzgado)
    {
        //
    }
}
