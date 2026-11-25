@extends('plantilla.app')

@section('contenido')

<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h1 class="mb-0 fs-3">PANEL</h1>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item">
                            <a href="#">Inicio</a>
                        </li>
                        <li class="breadcrumb-item active">
                            Panel
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">

        <div class="row">

            <div class="col-lg-3 col-6">
                <div class="small-box text-bg-primary">
                    <div class="inner">
                        <h3>{{$ciudades}}</h3>
                        <p>Ciudades</p>
                    </div>

                    <a href="{{route('ciudad.index')}}" class="small-box-footer">
                        Más información
                        <i class="bi bi-link-45deg"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box text-bg-success">
                    <div class="inner">
                        <h3>{{$nacionalidades}}</h3>
                        <p>Nacionalidades</p>
                    </div>

                    <a href="{{route('nacionalidad.index')}}" class="small-box-footer">
                        Más información
                        <i class="bi bi-link-45deg"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box text-bg-warning">
                    <div class="inner">
                        <h3>44</h3>
                        <p>Usuarios</p>
                    </div>

                    <a href="#" class="small-box-footer">
                        Más información
                        <i class="bi bi-link-45deg"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box text-bg-danger">
                    <div class="inner">
                        <h3>65</h3>
                        <p>Visitantes</p>
                    </div>

                    <a href="#" class="small-box-footer">
                        Más información
                        <i class="bi bi-link-45deg"></i>
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection