<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Becas</title>
    </head>
<body>
     <table>
        <thead>
            <tr>
                <th>id_Becas</th>
                <th>Nombre_Beca</th>
                <th>Porcentaje_Descuento</th>
                <th>Tipo_Beca</th>
                <th>Requisitos</th>
                
      </thead>
      <tbody>
        @foreach($datos as $listado)
        <tr>
            <td>{{$listado->id_Becas}}</td>
            <td>{{$listado->Nombre_Beca}}</td>
            <td>{{$listado->Porcentaje_Descuento}}</td>
            <td>{{$listado->Tipo_Beca}}</td>
            <td>{{$listado->Requisitos}}</td>


         </tr>

        @endforeach

      </table>

</body>
</html>