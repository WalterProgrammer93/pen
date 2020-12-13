<?php

namespace pen\Http\Controllers;

use Illuminate\Http\Request;
use pen\Curso;
use Session;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $redirectTo = '/cursos';

    public function index()
    {
        $cursos = Curso::all();
        return view("cursos.cursos", compact("cursos"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("cursos.crear");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $curso = new Curso;
        $curso->nombre = $request->nombre;
        $curso->descripcion = $request->descripcion;
        $curso->save();
        return redirect("/cursos")->with('success', 'Información almacenada con éxito');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cursos = Curso::findOrFail($id);
        return view("cursos.cursos", compact('cursos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $cursos = Curso::find($id);
      return view("cursos.edit", ['cursos' => $cursos]);
    }

    // Actualizar un registro (Update)
	   public function actualizar($id) {
		    $cursos = Curso::find($id);
		    return view('cursos.actualizar', ['cursos' => $cursos]);
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
        $cursos = Curso::findOrFail($id);
        $cursos->update($request->all());
        $cursos->save();
        return redirect("/cursos")->with('success', 'Información actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eliminar($id)
    {
        $cursos = Curso::findOrFail($id);
        $cursos->delete();
        return redirect("/cursos")->with('success', 'Información eliminada con éxito');
    }

    public function buscar(Request $request) {

        $texto = $request->input('buscar');

        if($texto){
            $lista = Curso::where('codigo','LIKE',"%$texto%")
            ->orWhere('nombre','LIKE',"%$texto%")
            ->paginate(2);
            return view('cursos.cursos',array('lista'=>$lista));
        } else {
            $lista = Curso::paginate(3);
            return view('cursos.cursos',array('lista'=>$lista));
        }
    }
}
