@extends('adminlte::page')

@section('content_header')
    <h1>Datos del padre de familia</h1>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <a href="{{ url('/admin/ppffs') }}" class="btn btn-default"><i
                    class="fas fa-arrow-left"></i> Volver</a>
            </div>
        </div>
    </div>
@stop

@section('content')


    <div class="row">
        <div class="col-md-12">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Datos registrados</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Nombres</label>
                                    <p>{{ $ppff->nombres }}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Apellidos</label>
                                    <p>{{ $ppff->apellidos }}</p>
                                </div>
                            </div> 
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">DNI</label>
                                    <p>{{ $ppff->ci }}</p>
                                </div>
                            </div>   
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Fecha de Nacimiento</label>
                                    <p>{{ $ppff->fecha_nacimiento }}</p>
                                </div>
                            </div>                   
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Teléfono</label><b> (*)</b>
                                    <p>{{ $ppff->telefono }}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Parentesco</label><b> (*)</b>
                                    <p>{{ $ppff->parentesco }}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Ocupación</label><b> (*)</b>
                                    <p>{{ $ppff->ocupacion }}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Dirección</label><b> (*)</b>
                                    <p>{{ $ppff->direccion }}</p>
                                </div>
                            </div>
                        </div>                     
                </div>
                <!-- /card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">Estudiantes del padre de familia</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped table-hover table-sm">
                            <thead>
                                <tr>
                                    <th>Nro</th>
                                    <th>Estudiante</th>
                                    <th>DNI</th>
                                    <th>Fecha de nacimiento</th>
                                    <th>Teléfono</th>
                                    <th>Género</th>
                                    <th>Correo</th>
                                    <th>Foto</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ppff->estudiantes as $estudiante)
                                    <tr>
                                        <td style="text-align: center">{{ $loop->iteration }}</td>
                                        <td>{{ $estudiante->apellidos }} {{ $estudiante->nombres }}</td>
                                        <td>{{ $estudiante->ci }}</td>
                                        <td>{{ $estudiante->fecha_nacimiento }}</td>
                                        <td>{{ $estudiante->telefono }}</td>
                                        <td>{{ $estudiante->genero }}</td>
                                        <td>{{ $estudiante->usuario->email }}</td>
                                        <td><img src="{{ url($estudiante->foto) }}" width="100px" alt="foto"></td>
                                    </tr>                                  
                                @endforeach
                            </tbody>
                        </table>
                </div>
                <!-- /card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>

@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    
@stop