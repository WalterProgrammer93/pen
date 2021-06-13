@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ url('usuarios') }}">Usuarios</a></li>
                <li class="breadcrumb-item active" aria-current="page">Importar</li>
              </ol>
            </nav>
            <div class="card">
                <div class="card-header">Importar datos usuarios</div>
                <div class="card-body">
                    <!-- Obtengo la sesión actual del usuario -->
                    @if (Session::has('message'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('message') }}
                        </div>
                    @endif
                    <!-- Muestro el mensaje de validación -->
                    @include('alerts.request')
                    <form method="POST" action="{{ route('usuarios/importar') }}" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="file" name="file" accept=".csv">
                        <button class="btn btn-success">Importar</button>
                        <a href="{{ route('exportar') }}" class="btn btn-warning">Exportar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
