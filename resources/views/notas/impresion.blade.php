@extends('layouts.impresion')

@section('content')
        <div style="background-color: #FEF9E7;">
          <div>
              <div style="text-align: left;"><image src="{{ asset('imagenes/logo.png') }}" alt="PEN Software"></div>
              <div style="text-align: right;">
                  <p>39001895 - IES Ataulfo Argenta</p>
                  <p>MENENDEZ PELAYO, 4</p>
                  <p>Castro Urdiales - Cantabria</p>
                  <p>telf: 942860637</p>
              </div>
          </div>
          <h3 style="text-align: center;"><u>Boletín de notas</u></h3>
          <div>
              <div style="text-align: left;">
                  <p><b>ALUMNO: </b>{{ $notas->alumno->nombre }}</p>
                  <p><b>PRIMER APELLIDO: </b>{{ $notas->alumno->apellido1 }}</p>
                  <p><b>SEGUNDO APELLIDO: </b>{{ $notas->alumno->apellido2 }}</p>
                  <p><b>NÚMERO EXP.: </b>{{ rand(0, 9999) }}</p>
                  <p><b>REPITE: </b>{{ $notas->alumno->repite }}</p>
                  <p><b>CURSO: </b>{{ $notas->alumno->curso->nombre }}</p>
                  <p><b>FECHA: </b>{{ $today }}</p>
              </div>
              <div style="text-align: right;">
                  <p>Sr/Sra {{ $notas->alumno->nombre}} {{ $notas->alumno->apellido1 }} {{ $notas->alumno->apellido2 }}</p>
                  <p>{{ $notas->alumno->direccion }}, Nº{{ $notas->alumno->portal }}, Piso: {{ $notas->alumno->piso }} Letra: {{ $notas->alumno->letra }}</p>
                  <p>{{ $notas->alumno->ciudad }} - {{ $notas->alumno->codigo_postal }} ({{ $notas->alumno->provincia }})</p>
                  <p>{{ $notas->alumno->ciudad }}</p>
              </div>
          </div>
          <h4 style="text-align: center">E V A L U A C I Ó N</h4>
          <div class="row">
              <table style="border: 1px solid black;width: 100%;">
                <tr style="border: 1px solid black;">
                    <th style="text-align: center;">Asignatura</th>
                    <th style="text-align: center;">EVA1</th>
                    <th style="text-align: center;">EVA2</th>
                    <th style="text-align: center;">EVA3</th>
                    <th style="text-align: center;">Media</th>
                </tr>
                <tr>
                    <td style="text-align: center;">{{ $notas->asignatura->nombre }}</td>
                    <td style="text-align: center;">{{ $notas->eva1 }}</td>
                    <td style="text-align: center;">{{ $notas->eva2 }}</td>
                    <td style="text-align: center;">{{ $notas->eva3 }}</td>
                    <td style="text-align: center;">{{ $notas->media }}</td>
                </tr>
              </table>
          </div>
          <div style="text-align: center;">
              <p>Les saluda cordialmente.</p>
              <p>En Castro Urdiales a {{ date('d') }} de {{ date('m') }} de {{ date('Y') }}<p>
              <p>Tutor: Francisco Javier Gómez Diez</p>
              <p>Horario de tutoria: Miercoles de 19:45 a 20:35 </p>
              <p>Firma</p>
          </div>
          <div class="pie">PEN SOFTWARE S.L 2021</div>
        </div>
@endsection
