<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Documento notas</title>
        <style>
        h1{
        text-align: center;
        text-transform: uppercase;
        }
        .contenido{
        font-size: 20px;
        }
        #primero{
        background-color: #ccc;
        }
        #segundo{
        color:#44a359;
        }
        #tercero{
        text-decoration:line-through;
        }
    </style>
    </head>
    <body>
        <h1>Boletín de notas</h1>
        <hr>
        <div class="contenido">
            <table class="table table-striped table-bordered table-hover">
              <tr>
                  <th>EVA1</th>
                  <th>EVA2</th>
                  <th>EVA3</th>
                  <th>Media</th>
                  <th>Alumno</th>
                  <th>Asignatura</th>
              </tr>
              <tr>
                  <td class="v-align-middle" id="primero">{{ $today }}</td>
                  <td class="v-align-middle" id="segundo">{{ $notas }}</td>
              </tr>
            </table>
        </div>
    </body>
</html>
