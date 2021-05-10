<?php

namespace pen\Http\Controllers;

use Illuminate\Http\Request;
use pen\User;
use pen\Perfil;
use pen\Roles;

class RolController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  protected $redirectTo = '/roles';

  public function index()
  {
      $roles = Roles::paginate(5);
      return view("roles.roles", compact("roles"));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      $usuarios = User::orderBy('id')->pluck('nombre','id')->toArray();
      $perfiles = Perfil::orderBy('id')->pluck('nombre','id')->toArray();
      return view("roles.crear", ['usuarios' => $usuarios], ['perfiles' => $perfiles]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      $roles = new Roles;
      $roles->user()->associate($request->usuario_id);
      $tareas->perfil()->associate($request->perfil_id);
      $tareas->save();
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
      $roles = Roles::find($id);
      return view("roles.roles", compact('roles'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
      $roles = Roles::find($id);
      $usuarios = User::orderBy('id')->pluck('nombre','id')->toArray();
      $perfiles = Perfil::orderBy('id')->pluck('perfil','id')->toArray();
      return view("roles.editar", compact("roles","usuarios","perfiles"));
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
      $roles = Roles::find($id);
      $roles->update($request->all());
      $roles->save();
      return redirect()->route("roles")->with('success', 'Información actualizada con éxito');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function delete($id)
  {
      $roles = Roles::find($id);
      $roles->delete();
      return redirect()->route("roles")->with('success', 'Información eliminada con éxito');
  }

  public function search(Request $request) {

      $texto = $request->input('buscar');

      if ($texto) {
          $lista = Tarea::where('codigo','LIKE',"%$texto%")
          ->orWhere('titulo','LIKE',"%$texto%")
          ->orWhere('autor','LIKE',"%$texto%")
          ->orWhere('fecha_envio','LIKE',"%$texto%")
          ->paginate(2);
          return view('tareas.tareas',array('lista'=>$lista));

      } else {
          $lista = Tarea::paginate(3);
          return view('tareas.tareas',array('lista'=>$lista));
      }
  }
}
