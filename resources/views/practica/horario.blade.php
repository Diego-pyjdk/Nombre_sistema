<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Horarios</title>
    </head>
<body>
     <table>
        <thead>
            <tr>
                <th> id_Horarios</th>
                <th>Dia_semana</th>
                <th>Horario_Inicio</th>
                <th>Hora_Fin</th>
                <th>Turno</th>
                <th>CLASES_id_Clases</th>
      </thead>
      <tbody>
        @foreach($datos as $listado)
        <tr>
            <td>{{$listado->id_Horarios}}</td>
            <td>{{$listado->Dia_semana}}</td>
            <td>{{$listado->Horario_Inicio}}</td>
            <td>{{$listado->Hora_Fin}}</td>
            <td>{{$listado->Turno}}</td>
            <td>{{$listado->CLASES_id_Clases}}</td>
            

         </tr>

        @endforeach

      </table>

</body>
</html>