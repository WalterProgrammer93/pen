@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ url('notas') }}">Notas</a></li>
                <li class="breadcrumb-item active" aria-current="page">Crear</li>
              </ol>
            </nav>
            <div class="card">
                <div class="card-header">Crear Nota</div>
                <div class="card-body">
                    <!-- Obtengo la sesión actual del usuario -->
                    {{ $message=Session::get('message') }}
                    <!-- Muestro el mensaje de validación -->
                    @include('alerts.request')
                    <form method="POST" action="{{ route('notas/store', $alumno->id, $asignatura->id) }}" >
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        @include('notas.index')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
