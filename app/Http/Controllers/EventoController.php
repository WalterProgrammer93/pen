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
        $aula = Aula::pluck('id', 'id');
        return view("eventos.añadirEvento")->with('aula');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $evento = new Evento;
        $evento->codigo = $request->codigo;
        $evento->nombre = $request->nombre;
        $evento->descripcion = $request->descripcion;
        $evento->disponibilidad = $request->disponibilidad;
        $evento->aula_id = $request->aula_id;
        $evento->save();
        return redirect("/eventos")->with('success', 'Información almacenada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $eventos = Evento::findOrFail($id);
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
        $evento = Evento::findOrFail($id);
        return view("eventos.editarDepartamento", compact("evento"));
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
        $evento = Evento::findOrFail($id);
        $evento->update($request->all());
        $evento->save();
        return redirect("/eventos")->with('success', 'Información actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $evento = Evento::findOrFail($id);
        $evento->delete();
        return redirect("/eventos")->with('success', 'Información eliminada con éxito');
    }

    public function buscar(Request $request) {

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
