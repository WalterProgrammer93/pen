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
        $departamentos = new Departamento;
        $departamentos->nombre = $request->nombre;
        $departamentos->descripcion = $request->descripcion;
        $departamentos->estado = $request->estado;
        $departamentos->save();
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
        $departamentos = Departamento::find($id);
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
        $departamentos = Departamento::find($id);
        return view("departamentos.editar", ['departamentos' => $departamentos]);
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
        $departamentos = Departamento::find($id);
        $departamentos->update($request->all());
        $departamentos->save();
        return redirect()->route("departamentos")->with('success', 'Información actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $departamento = Departamento::find($id);
        $departamento->delete();
        return redirect()->route("departamentos")->with('success', 'Información eliminada con éxito');
    }

    public function search(Request $request) {

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
