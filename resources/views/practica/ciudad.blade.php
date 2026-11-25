<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Ciudades</title>
    </head>
<body>
     <table>
        <thead>
            <tr>
                <th>id_Ciudades</th>
                <th>Nombre_Ciudad</th>
                <th>Departamento</th>
      </thead>
      <tbody>
        @foreach($datos as $listado)
        <tr>
            <td>{{$listado->id_Ciudades}}</td>
            <td>{{$listado->Nombre_Ciudad}}</td>
            <td>{{$listado->Departamento}}</td>

         </tr>

        @endforeach

      </table>

</body>
</html>