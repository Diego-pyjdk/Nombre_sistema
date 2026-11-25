<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Ivas</title>
    </head>
<body>
     <table>
        <thead>
            <tr>
                <th>id_Ivas</th>
                <th>Porcentaje</th>
                <th>Descripcion_Iva</th>
      </thead>
      <tbody>
        @foreach($datos as $listado)
        <tr>
            <td>{{$listado->id_Ivas}}</td>
            <td>{{$listado->Porcentaje}}</td>
            <td>{{$listado->Descripcion_Iva}}</td>

         </tr>

        @endforeach

      </table>

</body>
</html>