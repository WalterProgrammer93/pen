<?php

namespace pen\Http\Controllers;

use Illuminate\Http\Request;
use pen\Asignatura;
use pen\Tema;
use pen\Tarea;
use PDF;
use Carbon;

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
        if ($archivo = $request->file('archivo_tarea')) {
            $nombre  = $archivo->getClientOriginalName();
            $archivo->move("archivos", $nombre);
            $tareas->archivo_tarea = $archivo;
        }
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
        $asignaturas = Asignatura::find($id);
        $temas = Tema::find($id);
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
        $imagen = explode(",", $tareas->archivo_tarea);
        $tareas->delete();
        Storage::delete('$imagen');
        return redirect()->route("tareas")->with('success', 'Información eliminada con éxito');
    }

    public function search(Request $request)
    {
        $texto = $request->input('buscar');
        $tareas = Tarea::where('titulo','like','%'.$texto.'%')
            ->orWhere('autor','like','%'.$texto.'%')
            ->orWhere('fecha_envio','like','%'.$texto.'%')
            ->orWhere('fecha_entrega','like','%'.$texto.'%')
            ->orWhere('hora_entrega','like','%'.$texto.'%')
            ->orWhere('calificacion','like','%'.$texto.'%')->paginate(5);

        if (!empty($tareas)) {
            return view('tareas.tareas', compact('texto', 'tareas'));
        } else {
            return redirect('tareas')->with('message', 'Tarea no encontrada');
        }
    }

    public function filter(Request $request) {
        if($request->filtro == 'Todos') {
            return view('tareas.tareas');
        } else if ($request->filtro == 'Ascendente') {
            $tareas = Tarea::where('id')->orderBy('id', 'asc')->paginate(5);
            return view('tareas.tareas', compact('tareas'));
        } else if ($request->filtro == 'Descendente') {
            $tareas = Tarea::where('id')->orderBy('id', 'desc')->paginate(5);
            return view('tareas.tareas', compact('tareas'));
        } else {
            return redirect('tareas')->with('message', 'No funciona');
        }
    }

    public function ver($id) {
        $today = Carbon::now()->format('d/m/Y');
        $tareas = Tarea::find($id);
        $pdf = PDF::loadView('tareas.archivo_tarea', compact('today', 'tareas'))->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->stream('Tarea.pdf');
    }
}
