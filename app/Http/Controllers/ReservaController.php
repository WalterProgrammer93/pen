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
        $reservas->profesor()->associate($request->profesor_id);
        $reservas->evento()->associate($request->evento_id);
        $reservas->aula()->associate($request->aula_id);
        $reservas->descripcion = $request->descripcion;
        $reservas->reservado = $request->reservado;
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
        $profesores = Profesor::find($id);
        $eventos = Evento::find($id);
        $aulas = Aula::find($id);
        $profesores = Profesor::orderBy('id')->pluck('nombre', 'id')->toArray();
        $eventos = Evento::orderBy('id')->pluck('nombre', 'id')->toArray();
        $aulas = Aula::orderBy('id')->pluck('etiqueta','id')->toArray();
        return view("reservas.editar", compact('reservas','profesores','eventos','aulas'));
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

    public function search(Request $request)
    {
        $texto = $request->input('buscar');
        $reservas = Reserva::where('reservado','like','%'.$texto.'%')
            ->orWhere('descripcion','like','%'.$texto.'%')->paginate(5);

        if (!empty($reservas)) {
            return view('reservas.reservas', compact('texto', 'reservas'));
        } else {
            return redirect('reservas')->with('message', 'Reserva no encontrada');
        }
    }

    public function filter(Request $request) {
        if($request->filtro == 'Todos') {
            return view('reservas.reservas');
        } else if ($request->filtro == 'Ascendente') {
            $reservas = Reserva::where('id')->orderBy('id', 'asc')->paginate(5);
            return view('reservas.reservas', compact('reservas'));
        } else if ($request->filtro == 'Descendente') {
            $reservas = Reserva::where('id')->orderBy('id', 'desc')->paginate(5);
            return view('reservas.reservas', compact('reservas'));
        } else {
            return redirect('reservas')->with('message', 'No funciona');
        }
    }
}
