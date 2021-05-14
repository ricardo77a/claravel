<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etiqueta;
use App\Http\Requests\EtiquetasRequest;

class EtiquetasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $etiquetas = Etiqueta::get();
        return view('etiquetas.index', compact('etiquetas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('etiquetas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EtiquetasRequest $request)
    {
        $etiqueta = new Etiqueta($request->all());
        $etiqueta->save();
        return redirect()->route('etiquetas.index')->with('message_success', 'Se ha creado con éxito la etiqueta '.$etiqueta->nombre);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Etiqueta $etiqueta)
    {
        //$etiqueta = Etiqueta::FindOrFail($id);
        return view('etiquetas.show', compact('Etiqueta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Etiqueta $etiqueta)
    {
        return view('etiquetas.edit', compact('etiqueta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EtiquetasRequest $request, Etiqueta $etiqueta)
    {
        $etiqueta->fill($request->all());
        $etiqueta->save();
        return redirect()->route('etiquetas.index')->with('message_success', 'Se ha editado con éxito la etiqueta '.$etiqueta->nombre);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Etiqueta $etiqueta)
    {
        $etiqueta->delete();
        return redirect()->back()->with('message_success', 'Se ha eliminado con éxito la etiqueta '.$etiqueta->nombre);
    }
}
