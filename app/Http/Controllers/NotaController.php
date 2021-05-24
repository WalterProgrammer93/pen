<?php

namespace pen\Http\Controllers;

use Illuminate\Http\Request;
use pen\Nota;
use pen\Alumno;
use pen\Asignatura;
use PDF;
use Carbon;

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
        $notas = Nota::paginate(5);
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
        $notas = Nota::find($id);
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
        $notas = Nota::find($id);
        $alumnos = Alumno::find($id);
        $alumnos = Alumno::orderBy('id')->pluck('nombre', 'id')->toArray();
        $asignaturas = Asignatura::find($id);
        $asignaturas = Asignatura::orderBy('id')->pluck('nombre', 'id')->toArray();
        return view("notas.editar", compact('notas', 'alumnos', 'asignaturas'));
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
        $nota = Nota::find($id);
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
        $nota = Nota::find($id);
        $nota->delete();
        return redirect()->route("notas")->with('success','Información eliminada con éxito');
    }

    public function search(Request $request)
    {
        $texto = $request->input('buscar');
        $notas = Nota::where('eva1','like','%'.$texto.'%')
        ->orWhere('ev2','like','%'.$texto.'%')
        ->orWhere('eva3','like','%'.$texto.'%')->paginate(5);

        if (!empty($eventos)) {
            return view('eventos.eventos', compact('texto', 'eventos'));
        } else {
            return redirect('eventos')->with('message', 'Evento no encontrado');
        }
    }

    public function filter(Request $request) {
        if($request->filtro == 'Todos') {
            return view('eventos.eventos');
        } else if ($request->filtro == 'Ascendente') {
            $eventos = Evento::where('id')->orderBy('id', 'asc')->paginate(5);
            return view('eventos.eventos', compact('eventos'));
        } else if ($request->filtro == 'Descendente') {
            $eventos = Evento::where('id')->orderBy('id', 'desc')->paginate(5);
            return view('eventos.eventos', compact('eventos'));
        } else {
            return redirect('eventos')->with('message', 'No funciona');
        }
    }

    public function print($id) {
        $today = Carbon::now()->format('d/m/Y');
        $notas = Nota::find($id);
        $pdf = PDF::loadView('notas.impresion', compact('today', 'notas'))->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->stream('boletin de notas.pdf');
    }
}
