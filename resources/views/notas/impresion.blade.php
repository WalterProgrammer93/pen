@extends('layouts.app')

@section('content')
        <div class="fondo_notas">
          <div class="cabecera_principal">
              <div class="logo"></div>
              <div class="datos_colegio">
                  <p class="referencia">39001895 - IES Ataulfo Argenta</p>
                  <p class="direccion">MENENDEZ PELAYO, 4</p>
                  <p class="ciudad">Castro Urdiales - Cantabria</p>
                  <p class="telefono">telf: 942860637</p>
              </div>
          </div>
          <h3 class="titulo_boletin"><u>Boletín de notas</u></h3>
          <div class="contenido_alumno">
              <div class="datos_alumno">
                  <p><b>ALUMNO: </b>{{ $notas->alumno->nombre }}</p>
                  <p><b>PRIMER APELLIDO: </b>{{ $notas->alumno->apellido1 }}</p>
                  <p><b>SEGUNDO APELLIDO: </b>{{ $notas->alumno->apellido2 }}</p>
                  <p><b>NÚMERO EXP.: </b>{{ rand(0, 9999) }}</p>
                  <p><b>REPITE: </b>{{ $notas->alumno->repite }}</p>
                  <p><b>CURSO: </b>{{ $notas->alumno->curso->nombre }}</p>
                  <p><b>FECHA: </b>{{ $today }}</p>
              </div>
              <div class="datos_personales">
                  <p>Sr/Sra {{ $notas->alumno->nombre}} {{ $notas->alumno->apellido1 }} {{ $notas->alumno->apellido2 }}</p>
                  <p>{{ $notas->alumno->direccion }}, Nº{{ $notas->alumno->portal }}, Piso: {{ $notas->alumno->piso }} Letra: {{ $notas->alumno->letra }}</p>
                  <p>{{ $notas->alumno->ciudad }} - {{ $notas->alumno->codigo_postal }} ({{ $notas->alumno->provincia }})</p>
                  <p>{{ $notas->alumno->ciudad }}</p>
              </div>
          </div>
          <h4 class="titulo_tabla">E V A L U A C I Ó N</h4>
          <hr>
          <div class="contenido_tabla">
              <table class="tabla">
                <tr class="cabecera_tabla">
                    <th>Asignatura</th>
                    <th>EVA1</th>
                    <th>EVA2</th>
                    <th>EVA3</th>
                    <th>Media</th>
                </tr>
                <tr class="filas_tabla">
                    <td>{{ $notas->asignatura->nombre }}</td>
                    <td>{{ $notas->eva1 }}</td>
                    <td>{{ $notas->eva2 }}</td>
                    <td>{{ $notas->eva3 }}</td>
                    <td>{{ $notas->media }}</td>
                </tr>
              </table>
          </div>
          <div class="saludos">
              <p>Les saluda cordialmente.</p>
              <p>En Castro Urdiales a {{ date('d') }} de {{ date('m') }} de {{ date('Y') }}<p>
              <br>
              <p>Tutor: Francisco Javier Gómez Diez</p>
              <p>Horario de tutoria: Miercoles de 19:45 a 20:35 </p>
              <p>Firma</p>
          </div>
          <div class="pie">PEN SOFTWARE S.L 2021</div>
        </div>
@endsection
