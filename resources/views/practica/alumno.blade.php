<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Alumnos</title>
    </head>
<body>
     <table>
        <thead>
            <tr>
                <th>Ci</th>
                <th> Matricula_Numero</th>
                <th>Nombre</th>
                <th> Apellido </th>
                <th> Fecha_Nacimiento </th>
                <th> Genero </th>
                <th> Direccion </th>
                <th> Correo_Electronico </th>
                <th> CIUDADES_id_Ciudades </th>
                <th> BECAS_id_Becas </th>
                <th> NACIONALIDADES_id_Nacionalidades </th>
            
        
      </thead>
      <tbody>
        @foreach($datos as $listado)
        <tr>
            <td>{{$listado->Ci}}</td>
            <td>{{$listado->Matricula_Numero}}</td>
            <td>{{$listado->Nombre}}</td>
            <td>{{$listado->Apellido}}</td>
            <td>{{$listado->Fecha_Nacimiento}}</td>
            <td>{{$listado->Genero}}</td>
            <td>{{$listado->Direccion}}</td>
            <td>{{$listado->Correo_Electronico}}</td>
            <td>{{$listado->CIUDADES_id_Ciudades}}</td>
            <td>{{$listado->BECAS_id_Becas}}</td>
            <td>{{$listado->NACIONALIDADES_id_Nacionalidades}}</td>
            

         </tr>

        @endforeach

      </table>

</body>
</html>