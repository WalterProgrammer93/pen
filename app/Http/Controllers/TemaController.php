<?php

namespace pen\Http\Controllers;

use Illuminate\Http\Request;
use pen\Tema;
use PDF;
use Carbon;
use Storage;

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
        if ($archivo = $request->file('documento_tema')) {
            $nombre  = $archivo->getClientOriginalName();
            $archivo->move("documentos", $nombre);
            $temas->documento_tema = $archivo;
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
        return redirect("temas")->with('success', 'Información actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $temas = Tema::findOrFail($id);
        $imagen = explode(",", $temas->documento_tema);
        $temas->delete();
        Storage::delete('$imagen');
        return redirect("temas")->with('success', 'Información eliminada con éxito');
    }

    public function search(Request $request)
    {
        $texto = $request->input('buscar');
        $temas = Tema::where('nombre','like','%'.$texto.'%')
            ->orWhere('contenido','like','%'.$texto.'%')
            ->orWhere('documento_tema','like','%'.$texto.'%')->paginate(5);

        if (!empty($temas)) {
            return view('temas.temas', compact('texto', 'temas'));
        } else {
            return redirect('temas')->with('message', 'Tema no encontrada');
        }
    }

    public function filter(Request $request) {
        if($request->filtro == 'Todos') {
            return view('temas.temas');
        } else if ($request->filtro == 'Ascendente') {
            $temas = Tema::where('id')->orderBy('id', 'asc')->paginate(5);
            return view('temas.temas', compact('temas'));
        } else if ($request->filtro == 'Descendente') {
            $temas = Tema::where('id')->orderBy('id', 'desc')->paginate(5);
            return view('temas.temas', compact('temas'));
        } else {
            return redirect('temas')->with('message', 'No funciona');
        }
    }

    public function ver($id) {
        $today = Carbon::now()->format('d/m/Y');
        $temas = Tema::find($id);
        $pdf = PDF::loadView('temas->documento_tema', compact('today', 'temas'))->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->stream('Tema.pdf');
    }
}
