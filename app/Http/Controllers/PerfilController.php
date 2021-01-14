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
        $perfiles = Perfil::all();
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
        $perfil = new Perfil;
        $perfil->perfil = $request->perfil;
        $prefil->descripcion = $request->descripcion;
        $perfil->save();
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
        $perfiles = Perfil::findOrFail($id);
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
        $perfil = Perfil::findOrFail($id);
        return view("perfiles.editarPerfil", compact("perfil"));
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
        $perfil = Perfil::findOrFail($id);
        $perfil->update($request->all());
        $perfil->save();
        return redirect("/perfiles")->with('success', 'Información actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $perfil = Perfil::findOrFail($id);
        $perfil->delete();
        return redirect("/perfiles")->with('success','Información eliminada con éxito');
    }

    public function buscar(Request $request) {

        $texto = $request->input('buscar');

        if($texto) {
            $lista = Perfil::where('codigo','LIKE',"%$texto%")
            ->orWhere('rol','LIKE',"%$texto%")
            ->paginate(2);
            return view('perfiles.perfiles',array('lista'=>$lista));
        } else {
            $lista = Perfil::paginate(3);
            return view('perfiles.perfiles',array('lista'=>$lista));
        }
    }
}
