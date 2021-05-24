<?php

namespace pen\Http\Controllers;

use Illuminate\Http\Request;
use pen\Perfil;

class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perfiles = Perfil::paginate(5);
        return view('perfiles.perfiles', compact('perfiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('perfiles.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $perfiles = new Perfil;
        $perfiles->nombre = $request->nombre;
        $perfiles->descripcion = $request->descripcion;
        $perfiles->save();
        return redirect()->route('perfiles')->with('success', 'Información almacenada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $perfiles = Perfil::find($id);
        return view("perfiles.perfiles", compact('perfiles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $perfiles = Perfil::find($id);
        return view("perfiles.editar", compact("perfiles"));
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
        $perfiles = Perfil::find($id);
        $perfiles->update($request->all());
        $perfiles->save();
        return redirect("perfiles")->with('success', 'Información actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $perfiles = Perfil::find($id);
        $perfiles->delete();
        return redirect("perfiles")->with('success','Información eliminada con éxito');
    }

    public function search(Request $request)
    {
        $texto = $request->input('buscar');
        $perfiles = Perfil::where('nombre','like','%'.$texto.'%')
        ->orWhere('descripcion','like','%'.$texto.'%')->paginate(5);

        if (!empty($perfiles)) {
            return view('perfiles.perfiles', compact('texto', 'perfiles'));
        } else {
            return redirect('perfiles')->with('message', 'Perfil no encontrado');
        }
    }

    public function filter(Request $request) {
        if($request->filtro == 'Todos') {
            return view('perfiles.perfiles');
        } else if ($request->filtro == 'Ascendente') {
            $perfiles = Perfil::where('id')->orderBy('id', 'asc')->paginate(5);
            return view('perfiles.perfiles', compact('perfiles'));
        } else if ($request->filtro == 'Descendente') {
            $perfiles = Perfil::where('id')->orderBy('id', 'desc')->paginate(5);
            return view('perfiles.perfiles', compact('perfiles'));
        } else {
            return redirect('perfiles')->with('message', 'No funciona');
        }
    }
}
