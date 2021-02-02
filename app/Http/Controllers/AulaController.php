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
        $aulas = Aula::all();
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
        $aula = new Aula;
        $aula->etiqueta = $request->etiqueta;
        $aula->descripcion = $request->descripcion;
        $aula->disponibilidad = $request->disponibilidad;
        $aula->save();
        return redirect()->route('aulas')->with('success', 'Información almacenada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $aulas = Aula::findOrFail($id);
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
        $aulas = Aula::findOrFail($id);
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
        $aula = Aula::findOrFail($id);
        $aula->update($request->all());
        return redirect("/aulas")->with('success', 'Información actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $aula = Aula::findOrFail($id);
        $aula->delete();
        return redirect("/aulas")->with('success', 'La información eliminada con éxito');
    }

    public function buscar(Request $request) {

        $texto = $request->input('buscar');

        if($texto){
            $lista = Aula::where('codigo','LIKE',"%$texto%")
            ->orWhere('etiqueta','LIKE',"%$texto%")
            ->orWhere('disponibilidad','LIKE',"%$texto%")
            ->paginate(2);
            return view('aulas.aulas',array('lista'=>$lista));
        } else {
            $lista = Aula::paginate(3);
            return view('aulas.aulas',array('lista'=>$lista));
        }
    }
}
