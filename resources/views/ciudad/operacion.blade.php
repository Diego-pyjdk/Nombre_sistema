@extends('plantilla.app')
@section('contenido')
<div class="app-content">
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h3 class="card-title">Registros</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                         
                        <section class="mt-4">
                            <form action="{{isset($datosciudad) ? route('ciudad.update', $datosciudad->id_Ciudades) : route('ciudad.store')}}" method="post">
                            @csrf
                            @if(isset($datosciudad))
                                @method('PUT')
                            @endif
                            @if($errors->any())
                                <div class="alert alert-danger">
                                <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                                </ul>
                                </div>
                                @endif
                            <div class="row">
                                <div class="form-group col-12 col-md-6">
                                    <label for="Codigo">Código</label>
                                    <input type="number" class="form-control" name="id_Ciudades" value="{{ old('id_Ciudades', isset($datosciudad) ? $datosciudad->id_Ciudades : $maximoID) }}"  readonly required placeholder="Ingrese el codigo">
                                    <label for="Nombre_Ciudad">Nombre_Ciudad</label>
                                    <input type="text" class="form-control" name="Nombre_Ciudad" value="{{ old('Nombre_Ciudad', isset($datosciudad) ? $datosciudad->Nombre_Ciudad : '') }}" required placeholder="Ingrese el nombre de la ciudad">
                                    <label for="Departamento">Departamento</label>
                                    <input type="text" class="form-control" name="Departamento" value="{{ old('Departamento', isset($datosciudad) ? $datosciudad->Departamento : '') }}" required placeholder="Ingrese el Departamento">

                                </div>
                                <div class="center mt-4">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                    <a href="{{url('lista')}}" class="btn btn-secondary">Cancelar</a>
                                </div>
                            </div>
                                </form>
                        </section>
                        <div>
                            <form action="" method="get">
                                <div class="input-group">
                                    <input name="texto" type="text" class="form-control" value=""
                                        placeholder="Ingrese texto a buscar">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-secondary"><i class="fas fa-search"></i>
                                            Buscar</button>
                                        <a href="" class="btn btn-primary"> Nuevo</a>
                                    </div>
                                </div>
                            </form>
                            @if(Session::get('mensaje'))
                                <div class="alert alert-info alert-dismissible fade show mt-2">
                                    {{Session::get('mensaje')}}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                                </div>
                            @endif
                        </div>
                        <div class="table-responsive mt-3">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 100px">Opciones</th>
                                        <th style="width: 20px">ID</th>
                                        <th>Nombre</th>
                                        <th>Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="align-middle">
                                        <td>
                                            <a href="#" class="btn btn-warning btn-sm"><i class="bi bi-pencil-fill"></i></a>&nbsp;
                                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#modal-eliminar-01"><i class="bi bi-trash-fill"></i></button>
                                        </td>
                                        <td>01</td>
                                        <td>Registro uno                                         
                                        </td>
                                        <td>registro2@gmail.com</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!--end::Row-->
    </div>
    <!--end::Container-->
</div>
@endsection
@push('scripts')
<script>
    document.getElementById('mnuSeguridad').classList.add('menu-open');
    document.getElementById('itemUsuario').classList.add('active');
</script>
@endpush