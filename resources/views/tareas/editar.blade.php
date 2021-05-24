@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ url('tareas') }}">Tareas</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar</li>
              </ol>
            </nav>
            <div class="card">
                <div class="card-header">Editar Tarea</div>
                <div class="card-body">
                    <!-- Obtengo la sesión actual del usuario -->
                    @if (Session::has('message'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('message') }}
                        </div>
                    @endif
                    <!-- Muestro el mensaje de validación -->
                    @include('alerts.request')
                    <form method="POST" action="{{ route('tareas/actualizar', $tareas->id) }}" enctype="multipart/form-data" role="form">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        @include('tareas.index')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
