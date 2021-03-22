<?php

namespace pen\Http\Controllers;

use Illuminate\Http\Request;
use pen\Tema;

class TemaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $redirectTo = '/temas';

    public function index()
    {
        $temas = Tema::paginate(5);
        return view("temas.temas", compact("temas"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("temas.crear");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $temas = new Tema;
        $temas->nombre = $request->nombre;
        $temas->contenido = $request->contenido;
        $temas->documento_tema = $request->documento_tema;
        if($request->hasFile('archivo_tema')){
          $path = Storage::disk('local')->put('archivos', $request->file('archivos'));
          $temas->documento_tema = $path;
        }
        $temas->save();
        return redirect()->route('temas')->with('success', 'Información almacenada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $temas = Tema::find($id);
        return view("temas.temas", compact('temas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $temas = Tema::find($id);
        return view("temas.editar", compact("temas"));
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
        $temas = Tema::find($id);
        $temas->update($request->all());
        $temas->save();
        return redirect("/temas")->with('success', 'Información actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $temas = Tema::find($id);
        $temas->delete();
        return redirect("/temas")->with('success', 'Información eliminada con éxito');
    }

    public function search(Request $request) {

        $texto = $request->input('buscar');

        if($texto){
            $lista = Tarea::where('codigo','LIKE',"%$texto%")
            ->orWhere('titulo','LIKE',"%$texto%")
            ->orWhere('autor','LIKE',"%$texto%")
            ->paginate(2);
            return view('tareas.tareas',array('lista'=>$lista));
        } else {
            $lista = Tarea::paginate(3);
            return view('tareas.tareas',array('lista'=>$lista));
        }
    }
}
