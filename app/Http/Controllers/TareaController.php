<?php

namespace pen\Http\Controllers;

use Illuminate\Http\Request;
use pen\Asignatura;
use pen\Tema;
use pen\Tarea;

class TareaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $redirectTo = '/tareas';

    public function index()
    {
        $tareas = Tarea::paginate(5);
        return view("tareas.tareas", compact("tareas"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $asignaturas = Asignatura::orderBy('id')->pluck('nombre','id')->toArray();
        $temas = Tema::orderBy('id')->pluck('nombre','id')->toArray();
        return view("tareas.crear", ['asignaturas' => $asignaturas], ['temas' => $temas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tareas = new Tarea;
        $tareas->titulo = $request->titulo;
        $tareas->descripcion = $request->descripcion;
        $tareas->autor = $request->autor;
        $tareas->fecha_envio = $request->fecha_envio;
        $tareas->fecha_entrega = $request->fecha_entrega;
        $tareas->hora_entrega = $request->hora_entrega;
        $tareas->archivo_tarea = $request->archivo_tarea;
        $tareas->calificacion = $request->calificacion;
        $tareas->asignatura()->associate($request->asignatura_id);
        $tareas->tema()->associate($request->tema_id);
        $tareas->save();
        return redirect()->route('tareas')->with('success', 'Información almacenada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tareas = Tarea::find($id);
        return view("tareas.tareas", compact('tareas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tareas = Tarea::find($id);
        $asignaturas = Asignatura::orderBy('id')->pluck('nombre','id')->toArray();
        $temas = Tema::orderBy('id')->pluck('nombre','id')->toArray();
        return view("tareas.editar", compact("tareas","asignaturas","temas"));
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
        $tareas = Tarea::find($id);
        $tareas->update($request->all());
        $tareas->save();
        return redirect()->route("tareas")->with('success', 'Información actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $tareas = Tarea::find($id);
        $tareas->delete();
        return redirect()->route("tareas")->with('success', 'Información eliminada con éxito');
    }

    public function search(Request $request) {

        $texto = $request->input('buscar');

        if ($texto) {
            $lista = Tarea::where('codigo','LIKE',"%$texto%")
            ->orWhere('titulo','LIKE',"%$texto%")
            ->orWhere('autor','LIKE',"%$texto%")
            ->orWhere('fecha_envio','LIKE',"%$texto%")
            ->paginate(2);
            return view('tareas.tareas',array('lista'=>$lista));

        } else {
            $lista = Tarea::paginate(3);
            return view('tareas.tareas',array('lista'=>$lista));
        }
    }
}
