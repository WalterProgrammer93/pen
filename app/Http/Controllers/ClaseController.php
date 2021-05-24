<?php

namespace pen\Http\Controllers;

use Illuminate\Http\Request;
use pen\Clase;
use pen\Asignatura;
use pen\Profesor;

class ClaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $redirectTo = '/clases';

    public function index()
    {
        $clases = Clase::paginate(5);
        return view('clases.clases', compact('clases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $asignaturas = Asignatura::orderBy('id')->pluck('nombre','id')->toArray();
        $profesores = Profesor::orderBy('id')->pluck('nombre','id')->toArray();
        return view("clases.crear", compact('asignaturas', 'profesores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $clases = new Clase;
        $clases->asignatura()->associate($request->asignatura_id);
        $clases->profesor()->associate($request->profesor_id);
        $clases->horario = $request->horario;
        $clases->save();
        return redirect('clases')->with('success', 'Información almacenada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $clases = Clase::find($id);
        return view("clases.clases", compact('clases'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clases = Clase::find($id);
        $asignaturas = Asignatura::find($id);
        $profesores = Profesor::find($id);
        $asignaturas = Asignatura::orderBy('id')->pluck('nombre','id')->toArray();
        $profesores = Profesor::orderBy('id')->pluck('nombre','id')->toArray();
        return view("clases.editar", compact('clases', 'asignaturas', 'profesores'));
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
      $clases = Clase::find($id);
      $clases->update($request->all());
      $clases->save();
      return redirect("clases")->with('success', 'Información actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
      $clases = Clase::find($id);
      $clases->delete();
      return redirect("clases")->with('success','Información eliminada con éxito');
    }

    public function search(Request $request) {
      $texto = $request->input('buscar');
      $clases = Clase::where('asignatura_id','like','%'.$texto.'%')
          ->orWhere('profesor_id','like','%'.$texto.'%')
          ->orWhere('horario','like','%'.$texto.'%')->paginate(5);

      if (!empty($clases)) {
          return view('clases.clases', compact('texto', 'clases'));
      } else {
          return redirect('clases')->with('message', 'Clase no encontrado');
      }
    }

    public function filter(Request $request) {
        if($request->filtro == 'Todos') {
            return view('clases.clases');
        } else if ($request->filtro == 'Ascendente') {
            $clases = Clase::where('id')->orderBy('id', 'asc')->paginate(5);
            return view('clases.clases', compact(clases));
        } else if ($request->filtro == 'Descendente') {
            $clases = Clase::where('id')->orderBy('id', 'desc')->paginate(5);
            return view('clases.clases', compact('clases'));
        } else {
            return redirect('clases')->with('message', 'No funciona');
        }
    }
}
