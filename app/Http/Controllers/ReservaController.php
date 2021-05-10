<?php

namespace pen\Http\Controllers;

use Illuminate\Http\Request;
use pen\Reserva;
use pen\Profesor;
use pen\Evento;
use pen\Aula;

class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $redirectTo = '/reservas';

    public function index()
    {
        $reservas = Reserva::paginate(5);
        return view("reservas.reservas", compact("reservas"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $profesores = Profesor::orderBy('id')->pluck('nombre', 'id')->toArray();
        $eventos = Evento::orderBy('id')->pluck('nombre', 'id')->toArray();
        $aulas = Aula::orderBy('id')->pluck('etiqueta','id')->toArray();
        return view("reservas.crear", compact('profesores', 'eventos', 'aulas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reservas = new Reserva;
        $reservas->nombre_profesor = $request->nombre_profesor;
        $reservas->nombre_evento = $request->nombre_evento;
        $reservas->etiqueta = $request->etiqueta;
        $reservas->descripcion = $request->descripcion;
        $reservas->reservado = $request->reservado;
        $reservas->profesor()->associate($request->profesor_id);
        $reservas->evento()->associate($request->evento_id);
        $reservas->aula()->associate($request->aula_id);
        $reservas->save();
        return redirect()->route('reservas')->with('success', 'Información almacenada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reservas = Reserva::find($id);
        return view("reservas.reservas", compact('reservas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reservas = Reserva::find($id);
        return view("reserva.editar", compact("reservas"));
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
        $reservas = Reserva::find($id);
        $reservas->update($request->all());
        $reservas->save();
        return redirect("/reservas")->with('success', 'Información actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reservas = Reserva::find($id);
        $reservas->delete();
        return redirect("/reservas")->with('success', 'Información eliminada con éxito');
    }

    public function search(Request $request) {

        $texto = $request->input('buscar');

        if($texto){
            $lista = Reserva::where('codigo','LIKE',"%$texto%")
            ->orWhere('nombre_profesor','LIKE',"%$texto%")
            ->orWhere('apellido1_profesor','LIKE',"%$texto%")
            ->orWhere('apellido2_profesor','LIKE',"%$texto%")
            ->orWhere('etiqueta_aula','LIKE',"%$texto%")
            ->orWhere('reservado','LIKE',"%$texto%")
            ->paginate(2);
            return view('reservas.reservas',array('lista'=>$lista));
        } else {
            $lista = Reserva::paginate(3);
            return view('reservas.reservas',array('lista'=>$lista));
        }
    }
}
