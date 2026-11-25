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
                        <h3 class="card-title">Lista de Ciudades</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div>
                            <form action="" method="get">
                                <div class="input-group">
                                    <input name="texto" type="text" class="form-control" value=""
                                        placeholder="Ingrese texto a buscar">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-secondary"><i class="fas fa-search"></i>
                                            Buscar</button>
                                        <a href="{{route('ciudad.create')}}" class="btn btn-primary"> Nuevo</a>
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
                                @if(count($registro)<=0)
                                <tr>
                                    <td colspan="4">No existen registros en esta tabla</td>
                                </tr>
                                @else
                                <thead>
                                    <tr>
                                        <th style="width: 100px">Opciones</th>
                                        <th style="width: 20px">ID</th>
                                        <th>Nombre_Ciudad</th>
                                        <th>Departamento</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($registro as $reg)

                                    <tr class="align-middle">
                                        <td>
                                            <a href="{{ route('ciudad.edit', $reg->id_Ciudades) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil-fill"></i></a>&nbsp;
                                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#modal-eliminar-{{$reg->id_Ciudades}}"><i class="bi bi-trash-fill"></i></button>
                                        </td>
                                        <td>{{$reg->id_Ciudades}}</td>
                                        <td>{{$reg->Nombre_Ciudad}}</td>
                                        <td>{{$reg->Departamento}}</td>
                                    </tr>
                                     @include('ciudad.eliminar')
                                     @endforeach
                                     @endif
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        {{$registro->appends(["texto"=>$texto])}}
                    </div>
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