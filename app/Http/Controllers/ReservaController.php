<?php

namespace pen\Http\Controllers;

use Illuminate\Http\Request;
use pen\Reserva;

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
        $reservas = Reserva::all();
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
        $aulas = Aula::orderBy('id')->pluck('etiqueta', 'id')->toArray();
        return view("reservas.crear", compact('profesores', 'aulas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reserva = new Reserva;
        $reserva->codigo = $request->codigo;
        $reserva->nombre_profesor = $request->nombre_profesor;
        $reserva->apellido1_profesor = $request->apellido1_profesor;
        $reserva->apellido2_profesor = $request->apellido2_profesor;
        $reserva->etiqueta_aula = $request->etiqueta_aula;
        $reserva->descripcion = $request->descripcion;
        $reserva->reservado = $request->reservado;
        $reserva->profesor()->associate($request->profesor_id);
        $reserva->aula()->associate($request->aula_id);
        $reserva->save();
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
        $reservas = Reserva::findOrFail($id);
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
        $reserva = Reserva::findOrFail($id);
        return view("reserva.editarReserva", compact("reserva"));
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
        $reserva = Reserva::findOrFail($id);
        $reserva->update($request->all());
        $reserva->save();
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
        $reserva = Reserva::findOrFail($id);
        $reserva->delete();
        return redirect("/reservas")->with('success', 'Información eliminada con éxito');
    }

    public function buscar(Request $request) {

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
