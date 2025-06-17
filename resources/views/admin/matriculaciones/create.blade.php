@extends('adminlte::page')

@section('content_header')
    <h1>Matriculaciones/Registro de una nueva matrícula del estudiante</h1>
    <hr>
@stop

@section('content')


    <div class="row">
        <div class="col-md-8">
            
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Datos del estudiante</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Buscar estudiante:</label><b> (*)</b>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-users"></i></span>
                                            </div>
                                            <select name="" id="buscar_estudiante" class="form-control select2">
                                                <option value="">Selecciona un estudiante...</option>
                                                @foreach ($estudiantes as $estudiante)
                                                    <option value="{{ $estudiante->id }}">
                                                        {{ $estudiante->apellidos." ".$estudiante->nombres." - ".$estudiante->ci}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('nombre')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>                       
                            </div>
                            
                            <div id="datos_estudiante" style="display: none">
                                <div class="row">

                                <div class="col-md-3">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Fotografía</label>
                                                <center>
                                                    <img src="" width="50%" id="foto" alt="">
                                                </center>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Apellidos</label>
                                                <p id="apellidos">a</p>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Nombres</label>
                                                <p id="nombres">a</p>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">DNI</label>
                                                <p id="ci">a</p>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Fecha de nacimiento</label>
                                                <p id="fecha_nacimiento">a</p>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Teléfono</label>
                                                <p id="telefono">a</p>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Dirección</label>
                                                <p id="direccion">a</p>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Correo electrónico</label>
                                                <p id="email">a</p>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Género</label>
                                                <p id="genero">a</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>

                            
                            <div class="div">
                            </div>
                    </div>
                <!-- /card-body -->
                </div>
                </div>
            <!-- /.card -->
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Historial académico</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div id="tabla_historial"></div>
                    </div>
                <!-- /card-body -->
                </div>
                </div>               
            </div>

        </div>

        <div class="col-md-4">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Llene los datos del formulario</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    
                        <form action="{{ url('admin/matriculaciones/create') }}" method="POST">
                        @csrf
                            <input type="text" name="estudiante_id" id="estudiante_id" hidden>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Turnos</label><b> (*)</b>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-clock"></i></span>
                                            </div>
                                            <select name="turno_id" id="" class="form-control">
                                                <option value="">Seleccione un turno...</option>
                                                @foreach ($turnos as $turno)
                                                    <option value="{{ $turno->id }}">{{ $turno->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('turno_id')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Gestiones</label><b> (*)</b>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-university"></i></span>
                                            </div>
                                            <select name="gestion_id" id="" class="form-control">
                                                <option value="">Seleccione una gestión...</option>
                                                @foreach ($gestiones as $gestion)
                                                    <option value="{{ $gestion->id }}">{{ $gestion->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('gestion_id')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Niveles</label><b> (*)</b>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-layer-group"></i></span>
                                            </div>
                                            <select name="nivel_id" id="niveles" class="form-control">
                                                <option value="">Seleccione un nivel...</option>
                                                @foreach ($niveles as $nivele)
                                                    <option value="{{ $nivele->id }}">{{ $nivele->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('nivel_id')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Grados</label><b> (*)</b>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-list-alt"></i></span>
                                            </div>
                                            <select name="grado_id" id="grados" class="form-control">
                                                <option value="">Primero seleccione un nivel...</option>
                                            </select>
                                        </div>
                                        @error('grado_id')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Secciones</label><b> (*)</b>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-clone"></i></span>
                                            </div>
                                            <select name="paralelo_id" id="paralelos" class="form-control">
                                                <option value="">Primero seleccione una grado...</option>
                                            </select>
                                        </div>
                                        @error('paralelo_id')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Fecha</label><b> (*)</b>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                            </div>
                                            <input type="date" class="form-control" name="fecha_matriculacion" required>
                                        </div>
                                        @error('fecha_matriculacion')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="cold-md-12">
                                    <div class="form-group">
                                        <a href="{{ url('/admin/matriculaciones') }}" class="btn btn-default"><i
                                            class="fas fa-arrow-left"></i> Cancelar</a>
                                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>
                                            Guardar</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        
                </div>
                <!-- /card-body -->
            </div>
            <!-- /.card -->
        </div>
        </div>

        
    </div>

@stop

@section('css')
    <style>
        .select2-container .select2-selection--single{
            height: 40px !important;
        }
    </style>
@stop

@section('js')
    <script>
        $('.select2').select2({});

        $('#niveles').on('change',function(){
            var id = $(this).val();
            if(id){
                $.ajax({
                    url: "{{ url('/admin/matriculaciones/buscar_grado/') }}" + '/' + id,
                    type: 'GET',
                    success: function(grados){
                        var options = '<option value="">Seleccione un grado...</option>';
                        $.each(grados, function(key, value){
                            options+= '<option value="'+key+'">'+value+'</option>';
                        });
                        $('#grados').html(options);
                    },
                    error: function(){
                        alert('No se puede obtener información del nivel');
                    }
                });
            }else{
                alert('Seleccione un nivel...');
            }
        });

        $('#grados').on('change',function(){
            var id = $(this).val();
            if(id){
                $.ajax({
                    url: "{{ url('/admin/matriculaciones/buscar_paralelo/') }}" + '/' + id,
                    type: 'GET',
                    success: function(paralelos){
                        var options = '<option value="">Seleccione una sección...</option>';
                        $.each(paralelos, function(key, value){
                            options+= '<option value="'+key+'">'+value+'</option>';
                        });
                        $('#paralelos').html(options);
                    },
                    error: function(){
                        alert('No se puede obtener información del grado');
                    }
                });
            }else{
                alert('Seleccione un grado...');
            }
        });

        
        $('#buscar_estudiante').on('change',function(){
            var id = $(this).val();
            
            if(id){
                $.ajax({
                    url: "{{ url('/admin/matriculaciones/buscar_estudiante/') }}" + '/' + id,
                    type: 'GET',
                    success: function(estudiante){
                    console.log(estudiante);
                        $('#apellidos').html(estudiante.apellidos);
                        $('#nombres').html(estudiante.nombres);
                        $('#ci').html(estudiante.ci);
                        $('#fecha_nacimiento').html(estudiante.fecha_nacimiento);
                        $('#telefono').html(estudiante.telefono);
                        $('#direccion').html(estudiante.direccion);
                        $('#email').html(estudiante.usuario.email);
                        $('#genero').html(estudiante.genero);
                        $('#foto').attr('src',estudiante.foto_url).show();
                        $('#estudiante_id').val(estudiante.id);
                        $('#datos_estudiante').css('display','block');

                        if(estudiante.matriculaciones && estudiante.matriculaciones.length > 0){
                            var tabla  = '<table class="table table-bordered table-striped">';
                                tabla+= '<thead><tr><th>Turno</th><th>Gestion</th><th>Nivel</th><th>Grado</th><th>Seccion</th></tr></thead>';
                                tabla+= '<tbody>';
                                    estudiante.matriculaciones.forEach(function (matriculacion){
                                        tabla+= '<tr>';
                                            tabla+= '<td>'+matriculacion.turno.nombre+ '</td>';
                                            tabla+= '<td>'+matriculacion.gestion.nombre+ '</td>';
                                            tabla+= '<td>'+matriculacion.nivel.nombre+ '</td>';
                                            tabla+= '<td>'+matriculacion.grado.nombre+ '</td>';
                                            tabla+= '<td>'+matriculacion.paralelo.nombre+ '</td>';
                                        tabla+= '</tr>';
                                    });
                                $('#tabla_historial').html(tabla).show();
                        }else{
                            $('#tabla_historial').html('<p>No hay historial académico registrado del estudiante.</p>');
                        }
                        
                    },error:function(){
                        alert('No se puede obtener información del estudiante');
                    }                   
                });
            }else{

            }

        });
    </script>
@stop
