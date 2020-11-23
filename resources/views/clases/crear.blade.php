@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ url('clases') }}">Clases</a></li>
              <li class="breadcrumb-item active" aria-current="page">Crear</li>
            </ol>
          </nav>
            <div class="card">
                <div class="card-header">Crear Clase</div>
                <div class="card-body">
                    <!--@if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif-->

                    <!-- Obtengo la sesión actual del usuario -->
                    {{ $message=Session::get('message') }}

                    <!-- Muestro el mensaje de validación -->
                    @include('alerts.request')
                    <form method="POST" action="{{ route('clases/store') }}">
                        @csrf
                        @include('clases.index')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
