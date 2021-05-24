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
      return view("roles.crear", compact('usuarios','perfiles'));
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
      $roles->perfil()->associate($request->perfil_id);
      $roles->save();
      return redirect()->route('roles')->with('success', 'Información almacenada con éxito');
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
      $usuarios = User::find($id);
      $perfiles = Perfil::find($id);
      $usuarios = User::orderBy('id')->pluck('nombre','id')->toArray();
      $perfiles = Perfil::orderBy('id')->pluck('nombre','id')->toArray();
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

  public function search(Request $request)
  {
      $texto = $request->input('buscar');
      $roles = Roles::where('user_id','like','%'.$texto.'%')
          ->orWhere('perfil_id','like','%'.$texto.'%')->paginate(5);

      if (!empty($roles)) {
          return view('roles.roles', compact('texto', 'roles'));
      } else {
          return redirect('roles')->with('message', 'Rol no encontrada');
      }
  }

  public function filter(Request $request) {
      if($request->filtro == 'Todos') {
          return view('roles.roles');
      } else if ($request->filtro == 'Ascendente') {
          $roles = Rol::where('id')->orderBy('id', 'asc')->paginate(5);
          return view('roles.roles', compact('roles'));
      } else if ($request->filtro == 'Descendente') {
          $roles = Rol::where('id')->orderBy('id', 'desc')->paginate(5);
          return view('roles.roles', compact('roles'));
      } else {
          return redirect('roles')->with('message', 'No funciona');
      }
  }
}
