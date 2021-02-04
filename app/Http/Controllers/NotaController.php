<?php

namespace pen\Http\Controllers;

use Illuminate\Http\Request;
use pen\Nota;
use pen\Alumno;
use pen\Asignatura;

class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $redirectTo = '/notas';

    public function index()
    {
        $notas = Nota::all();
        return view("notas.notas", compact("notas"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $alumnos = Alumno::orderBy('id')->pluck('nombre', 'id')->toArray();
        $asignaturas = Asignatura::orderBy('id')->pluck('nombre', 'id')->toArray();
        return view('notas.crear', compact("alumnos", "asignaturas"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $notas = new Nota;
        $notas->eva1 = $request->eva1;
        $notas->eva2 = $request->eva2;
        $notas->eva3 = $request->eva3;
        $notas->media = $request->media;
        $notas->alumno()->associate($request->alumno_id);
        $notas->asignatura()->associate($request->asignatura_id);
        $notas->save();
        return redirect()->route('notas')->with('success', 'Información almacenada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $notas = Nota::findOrFail($id);
        return view("notas.notas", compact('notas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $notas = Nota::findOrFail($id);

        return view("notas.editar", compact("notas"));
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
        $nota = Nota::findOrFail($id);
        $nota->update($request->all());
        $nota->save();
        return redirect()->route("notas")->with('success', 'Información actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $nota = Nota::findOrFail($id);
        $nota->delete();
        return redirect()->route("notas")->with('success','Información eliminada con éxito');
    }

    public function search(Request $request) {

        $texto = $request->input('buscar');

        if($texto){
            $lista = Nota::where('codigo','LIKE',"%$texto%")
            ->orWhere('nombre_alumno','LIKE',"%$texto%")
            ->orWhere('apellido1_alumno','LIKE',"%$texto%")
            ->orWhere('apellido2_alumno','LIKE',"%$texto%")
            ->orWhere('eva1','LIKE',"%$texto%")
            ->orWhere('eva2','LIKE',"%$texto%")
            ->orWhere('eva3','LIKE',"%$texto%")
            ->orWhere('media','LIKE',"%$texto%")
            ->paginate(2);
            return view('notas.notas',array('lista'=>$lista));
        } else {
            $lista = Nota::paginate(3);
            return view('notas.notas',array('lista'=>$lista));
        }
    }
}
