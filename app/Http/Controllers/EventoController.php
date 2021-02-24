<?php

namespace pen\Http\Controllers;

use Illuminate\Http\Request;
use pen\Evento;
use pen\Aula;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     protected $redirectTo = '/eventos';

    public function index()
    {
        $eventos = Evento::all();
        return view("eventos.eventos", compact("eventos"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $aulas = Aula::orderBy('id')->pluck('nombre', 'id')->toArray();
        return view("eventos.crear", compact("aulas"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $eventos = new Evento;
        $eventos->nombre = $request->nombre;
        $eventos->descripcion = $request->descripcion;
        $eventos->disponibilidad = $request->disponibilidad;
        $eventos->aula()->associate($request->aula_id);
        $eventos->save();
        return redirect()->route('eventos')->with('success', 'Información almacenada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $eventos = Evento::find($id);
        return view("eventos.eventos", compact('eventos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $eventos = Evento::find($id);
        return view("eventos.editar", compact("eventos"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $eventos = Evento::find($id);
        $eventos->update($request->all());
        $eventos->save();
        return redirect("/eventos")->with('success', 'Información actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $eventos = Evento::findOrFail($id);
        $eventos->delete();
        return redirect("/eventos")->with('success', 'Información eliminada con éxito');
    }

    public function search(Request $request) {

        $texto = $request->input('buscar');

        if($texto){
            $lista = Evento::where('codigo','LIKE',"%$texto%")
            ->orWhere('nombre','LIKE',"%$texto%")
            ->orWhere('disponibilidad','LIKE',"%$texto%")
            ->paginate(2);
            return view('eventos.eventos',array('lista'=>$lista));
        } else {
            $lista = Evento::paginate(3);
            return view('eventos.eventos',array('lista'=>$lista));
        }
    }
}
