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
        $departamentos = Departamento::paginate(5);
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
        $departamentos = Departamento::find($id);
        $departamentos->delete();
        return redirect()->route("departamentos")->with('success', 'Información eliminada con éxito');
    }

    public function search(Request $request)
    {
        $texto = $request->input('buscar');
        $departamentos = Departamento::where('nombre','like','%'.$texto.'%')
        ->orWhere('descripcion','like','%'.$texto.'%')
        ->orWhere('estado','like','%'.$texto.'%')->paginate(5);

        if (!empty($departamentos)) {
            return view('departamentos.departamentos', compact('texto', 'departamentos'));
        } else {
            return redirect('departamentos')->with('message', 'Departamento no encontrado');
        }
    }

    public function filter(Request $request) {
        if($request->filtro == 'Todos') {
            return view('departamentos.departamentos');
        } else if ($request->filtro == 'Ascendente') {
            $departamentos = Departamento::where('id')->orderBy('id', 'asc')->paginate(5);
            return view('departamentos.departamentos', compact('departamentos'));
        } else if ($request->filtro == 'Descendente') {
            $departamentos = Departamento::where('id')->orderBy('id', 'desc')->paginate(5);
            return view('departamentos.departamentos', compact('departamentos'));
        } else {
            return redirect('departamentos')->with('message', 'No funciona');
        }
    }
}
