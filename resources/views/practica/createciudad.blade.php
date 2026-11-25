<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"rel="stylesheet">

    <title>Registro de Ciudad</title>
</head>
    
<body>
    <div class="container">
    <header>
        <h2>Registro de Ciudades</h2>
   </header>
   <section class="mt-4">
    <form action="{{route('ciudad.store')}}" method="post">
    @csrf
    <div class="row">
        <div class="form-group col-12 col-md-6">
            <label for="Codigo">Código</label>
            <input type="text" class="form-control" name="id_Ciudades" required placeholder= "Ingrese el codigo">
            <label for="Nombre_Ciudad">Nombre_Ciudad</label>
            <input type="text" class="form-control" name="Nombre_Ciudad" required placeholder="Ingrese el nombre de la ciudad">
            <label for="Departamento">Departamento</label>
            <input type="text" class="form-control" name="Departamento" required placeholder="Ingrese el Departamento">

        </div>
        <div class="center mt-4">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{url('lista')}}" class="btn btn-secondary">Cancelar</a>
        </div>
    </div>
        </form>
   </section>

    </div>
    
</body>
</html>