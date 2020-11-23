@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ url('asistencias') }}">Asistencias</a></li>
              <li class="breadcrumb-item active" aria-current="page">Crear</li>
            </ol>
          </nav>
            <div class="card">
                <div class="card-header">Crear Asistencia</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ url('altaAsistencia', $alumnos, $asignaturas) }}">
                        @csrf
                        @include(asistencias.index)
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
