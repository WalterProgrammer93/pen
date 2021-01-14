<?php

namespace pen\Http\Controllers;

use Illuminate\Http\Request;
use pen\Departamento;

class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $redirectTo = '/departamentos';

    public function index()
    {
        $departamentos = Departamento::all();
        return view("departamentos.departamentos", compact("departamentos"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("departamentos.crear");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $departamento = new Departamento;
        $departamento->codigo = $request->codigo;
        $departamento->nombre = $request->nombre;
        $departamento->descripcion = $request->descripcion;
        $departamento->estado = $request->estado;
        $departamento->save();
        return redirect()->route('departamentos')->with('success', 'Información almacenada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $departamentos = Departamento::findOrFail($id);
        return view("departamentos.departamentos", compact('departamentos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $departamento = Departamento::findOrFail($id);
        return view("departamentos.editarDepartamento", compact("departamento"));
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
        $departamento = Departamento::findOrFail($id);
        $departamento->update($request->all());
        $departamento->save();
        return redirect("/departamentos")->with('success', 'Información actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $departamento = Departamento::findOrFail($id);
        $departamento->delete();
        return redirect("/departamentos")->with('success', 'Información eliminada con éxito');
    }

    public function buscar(Request $request) {

        $texto = $request->input('buscar');

        if($texto){
            $lista = Departamento::where('codigo','LIKE',"%$texto%")
            ->orWhere('nombre','LIKE',"%$texto%")
            ->orWhere('estado','LIKE',"%$texto%")
            ->paginate(2);
            return view('departamentos.departamentos',array('lista'=>$lista));
        } else {
            $lista = Departamento::paginate(3);
            return view('departamentos.departamentos',array('lista'=>$lista));
        }
    }
}
