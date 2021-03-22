<?php

namespace pen\Http\Controllers;

use Illuminate\Http\Request;
use pen\Asignatura;
use pen\Curso;
use pen\Aula;

class AsignaturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response devuelve una vista con todas las asignaturas
     */
    protected $redirectTo = '/asignaturas';

    public function index()
    {
        $asignaturas = Asignatura::all();
        return view("asignaturas.asignaturas", compact('asignaturas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response devuelve una vista para añadir asignaturas
     */
    public function create()
    {
        $cursos = Curso::orderBy('id')->pluck('nombre','id')->toArray();
        $aulas = Aula::orderBy('id')->pluck('etiqueta','id')->toArray();
        return view("asignaturas.crear", ['cursos' => $cursos], ['aulas' => $aulas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  envia una peticion pasando como parametro $request
     * @return \Illuminate\Http\Response devuelve una repuesta y redirije a las asignaturas
     */
    public function store(Request $request)
    {
        $asignaturas = new Asignatura;
        $asignaturas->nombre = $request->nombre;
        $asignaturas->descripcion = $request->descripcion;
        $asignaturas->curso()->associate($request->curso_id);
        $asignaturas->aula()->associate($request->aula_id);
        $asignaturas->save();
        return redirect()->route('asignaturas')->with('success', 'Información almacenada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  pasa como parametro un entero $id
     * @return \Illuminate\Http\Response devuelve una vista con una asignatura
     */
    public function show($id)
    {
        $asignaturas = Asignatura::find($id);
        return view("asignaturas.asignaturas", compact('asignaturas'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  pasa como parametro un entero $id
     * @return \Illuminate\Http\Response devuelve una vista con una asignatura
     */
    public function edit($id)
    {
        $asignaturas = Asignatura::find($id);
        $cursos = Curso::find($id);
        $cursos = Curso::orderBy('id')->pluck('nombre', 'id')->toArray();
        $aulas = Aula::find($id);
        $aulas = Aula::orderBy('id')->pluck('etiqueta', 'id')->toArray();
      return view("asignaturas.editar", ['asignaturas' => $asignaturas], ['cursos' => $cursos], ['aulas' => $aulas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  pasa como parametro $request
     * @param  int  pasa como parametro un entero $id
     * @return \Illuminate\Http\Responsem devuelve una vista pasandole la ruta
     */
    public function update(Request $request, $id)
    {
        $asignaturas = Asignatura::find($id);
        $asignaturas->update($request->all());
        $asignaturas->save();
        return redirect()->route("asignaturas")->with('success', 'Información actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  pasa como parametro un entero $id
     * @return \Illuminate\Http\Response devuelve una vista pasando la ruta
     */
    public function delete($id)
    {
      $asignaturas = Asignatura::find($id);
      $asignaturas->delete();
      return redirect()->route("asignaturas")->with('success', 'Información eliminada con éxito');;
    }

    public function search(Request $request) {

        $texto = $request->input('buscar');

        if($texto){
            $lista = Asignatura::where('codigo','LIKE',"%$texto%")
            ->orWhere('nombre','LIKE',"%$texto%")
            ->paginate(2);
            return view('asignaturas.asignaturas',array('lista'=>$lista));
        } else {
            $lista = Asignatura::paginate(3);
            return view('asignaturas.asignaturas',array('lista'=>$lista));
        }
    }
}
