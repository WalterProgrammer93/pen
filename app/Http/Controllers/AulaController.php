<?php

namespace pen\Http\Controllers;

use Illuminate\Http\Request;
use pen\Aula;

class AulaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $redirectTo = '/aulas';

    public function index()
    {
        $aulas = Aula::paginate(5);
        return view("aulas.aulas", compact("aulas"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("aulas.crear");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $aulas = new Aula;
        $aulas->etiqueta = $request->etiqueta;
        $aulas->descripcion = $request->descripcion;
        $aulas->disponibilidad = $request->disponibilidad;
        $aulas->save();
        return redirect('aulas')->with('success', 'Información almacenada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $aulas = Aula::find($id);
        return view("aulas.aulas", compact('aulas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aulas = Aula::find($id);
        return view("aulas.editar", compact("aulas"));
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
        $aulas = Aula::find($id);
        $aulas->update($request->all());
        return redirect("aulas")->with('success', 'Información actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $aulas = Aula::find($id);
        $aulas->delete();
        return redirect("aulas")->with('success', 'La información eliminada con éxito');
    }

    public function search(Request $request) {
      $texto = $request->input('buscar');
      $aulas = Aula::where('etiqueta','like','%'.$texto.'%')
      ->orWhere('descripcion','like','%'.$texto.'%')
      ->orWhere('disponibilidad','like','%'.$texto.'%')->paginate(5);

      if (!empty($aulas)) {
          return view('aulas.aulas', compact('texto', 'aulas'));
      } else {
          return redirect('aulas')->with('message', 'Aula no encontrado');
      }
    }

    public function filter(Request $request) {
        if($request->filtro == 'Todos') {
            return view('aulas.aulas');
        } else if ($request->filtro == 'Ascendente') {
            $alumnos = Alumno::where('id')->orderBy('id', 'asc')->paginate(5);
            return view('alumnos.alumnos', compact('alumnos'));
        } else if ($request->filtro == 'Descendente') {
            $alumnos = Alumno::where('id')->orderBy('id', 'desc')->paginate(5);
            return view('alumnos.alumnos', compact('alumnos'));
        } else {
            return redirect('alumnos')->with('message', 'No funciona');
        }
    }
}
