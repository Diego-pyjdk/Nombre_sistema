<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Cursos</title>
    </head>
<body>
     <table>
        <thead>
            <tr>
                <th>id_Cursos</th>
                <th>Nombre_Curso</th>
                <th>Nivel_Anio</th>
                <th>Turno</th>
                <th>Cupo_Maximo</th>
                
      </thead>
      <tbody>
        @foreach($datos as $listado)
        <tr>
            <td>{{$listado->id_Cursos}}</td>
            <td>{{$listado->Nombre_Curso}}</td>
            <td>{{$listado->Nivel_Anio}}</td>
            <td>{{$listado->Turno}}</td>
            <td>{{$listado->Cupo_Maximo}}</td>
            

         </tr>

        @endforeach

      </table>

</body>
</html>