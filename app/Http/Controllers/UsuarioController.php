<?php

namespace pen\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use pen\User;
use pen\Perfil;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     protected $redirectTo = '/usuarios';

    public function index()
    {
        $usuarios = User::paginate(5);
        return view("usuarios.usuarios", compact("usuarios"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("usuarios.crear");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usuarios = new User;
        $usuarios->nombre = $request->nombre;
        $usuarios->email = $request->email;
        $usuarios->password = Hash::make($request->password);
        $usuarios->save();
        return redirect()->route('usuarios')->with('success', 'Información almacenada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuarios = User::find($id);
        return view("usuarios.usuarios", compact('usuarios'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuarios = User::find($id);
        return view("usuarios.editar", compact("usuarios"));
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
        $usuario = User::find($id);
        $usuario->update($request->all());
        $usuario->save();
        return redirect("/usuarios")->with('success', 'Información actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $usuario = User::find($id);
        $usuario->delete();
        return redirect("/usuarios")->with('success', 'Información eliminada con éxito');
    }

    public function search(Request $request)
    {
        $texto = $request->input('buscar');
        $usuarios = User::where('nombre','like','%'.$texto.'%')
            ->orWhere('email','like','%'.$texto.'%')->paginate(5);

        if (!empty($usuarios)) {
            return view('usuarios.usuarios', compact('texto', 'usuarios'));
        } else {
            return redirect('usuarios')->with('message', 'Usuario no encontrada');
        }
    }

    public function filter(Request $request) {
        if($request->filtro == 'Todos') {
            return view('usuarios.usuarios');
        } else if ($request->filtro == 'Ascendente') {
            $usuarios = User::where('id')->orderBy('id', 'asc')->paginate(5);
            return view('usuarios.usuarios', compact('usuarios'));
        } else if ($request->filtro == 'Descendente') {
            $usuarios = User::where('id')->orderBy('id', 'desc')->paginate(5);
            return view('usuarios.usuarios', compact('usuarios'));
        } else {
            return redirect('usuarios')->with('message', 'No funciona');
        }
    }
}
