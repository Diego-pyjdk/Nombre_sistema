<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Nacionalidades</title>
    </head>
<body>
     <table>
        <thead>
            <tr>
                <th>id_Nacionalidades</th>
                <th>Descripcion</th>
                
      </thead>
      <tbody>
        @foreach($datos as $listado)
        <tr>
            <td>{{$listado->id_Nacionalidades}}</td>
            <td>{{$listado->Descripcion}}</td>
            

         </tr>

        @endforeach

      </table>

</body>
</html>