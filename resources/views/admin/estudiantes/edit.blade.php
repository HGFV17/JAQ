@extends('adminlte::page')

@section('content_header')
    <h1>Editar datos del estudiante</h1>
    <hr>
@stop

@section('content')

<div class="row">
        <div class="col-md-12">
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">Llene los datos del padre de familia en el formulario</h3>
                    <div class="card-tools">
                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ModalCreate"><i 
                                class="fas fa-search"></i> Buscar padre de familia</button>
                        <!-- Modal -->
                        <div class="modal fade" id="ModalCreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Padres de familia</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <table id="example1" class="table table-bordered table-striped table-hover table-sm">
                                    <thead>
                                        <tr>
                                            <th>Nro</th>
                                            <th style="text-align: center">Apellidos y Nombres</th>
                                            <th style="text-align: center">DNI</th>
                                            <th style="text-align: center">Fecha de nacimiento</th>
                                            <th style="text-align: center">teléfono</th>
                                            <th style="text-align: center">Parentesco</th>
                                            <th style="text-align: center">Ocupación</th>
                                            <th style="text-align: center">Dirección</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($ppffs as $ppff)
                                            <tr>
                                                <td style="text-align: center">{{ $loop->iteration }}</td>
                                                <td>{{ $ppff->apellidos }} {{ $ppff->nombres }}</td>
                                                <td>{{ $ppff->ci }}</td>
                                                <td>{{ $ppff->fecha_nacimiento }}</td>
                                                <td>{{ $ppff->telefono }}</td>
                                                <td>{{ $ppff->parentesco }}</td>
                                                <td>{{ $ppff->ocupacion }}</td>
                                                <td>{{ $ppff->direccion }}</td>
                                                    <td style="text-align: center">
                                                        <button class="btn btn-info btn-seleccionar" 
                                                            data-id="{{ $ppff->id }}"
                                                            data-nombres="{{ $ppff->nombres }}"
                                                            data-apellidos="{{ $ppff->apellidos }}"
                                                            data-ci="{{ $ppff->ci }}"
                                                            data-fecha_nacimiento="{{ $ppff->fecha_nacimiento }}"
                                                            data-telefono="{{ $ppff->telefono }}"
                                                            data-parentesco="{{ $ppff->parentesco }}"
                                                            data-ocupacion="{{ $ppff->ocupacion }}"
                                                            data-direccion="{{ $ppff->direccion }}">Seleccionar</button>
                                                    </td>
                                            </tr>                                  
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button class="btn btn-primary" data-toggle="modal" data-target="#ModalCreatePpff">Crear nuevo padre de familia</button>
                                <!-- Modal -->
                                <div class="modal fade" id="ModalCreatePpff" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                    <div class="modal-header" style="background-color: #1727b8;color: #fff">
                                        <h5 class="modal-title" id="exampleModalLabel">Registro de un nuevo padre de familia</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ url('/admin/estudiantes/ppff/create') }}" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form group">
                                                        <label for="">Nombre</label>
                                                        <input type="text" class="form-control" name="nombres" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form group">
                                                        <label for="">Apellidos</label>
                                                        <input type="text" class="form-control" name="apellidos" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form group">
                                                        <label for="">DNI</label>
                                                        <input type="text" class="form-control" name="ci" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form group">
                                                        <label for="">Fecha de nacimiento</label>
                                                        <input type="date" class="form-control" name="fecha_nacimiento" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form group">
                                                        <label for="">Teléfono</label>
                                                        <input type="text" class="form-control" name="telefono" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form group">
                                                        <label for="">Parentesco</label>
                                                        <input type="text" class="form-control" name="parentesco" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form group">
                                                        <label for="">Ocupación</label>
                                                        <input type="text" class="form-control" name="ocupacion" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form group">
                                                        <label for="">Dirección</label>
                                                        <input type="text" class="form-control" name="direccion" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                        <button type="submit" class="btn btn-primary">Registrar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body" id="datos_ppff">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Nombres</label>
                                <p id="nombres">{{ $estudiante->ppff->nombres }}</p>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Apellidos</label>
                                <p id="apellidos">{{ $estudiante->ppff->apellidos }}</p>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">DNI</label>
                                <p id="ci">{{ $estudiante->ppff->ci }}</p>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">fecha de nacimiento</label>
                                <p id="fecha_nacimiento">{{ $estudiante->ppff->fecha_nacimiento }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Teléfono</label>
                                <p id="telefono">{{ $estudiante->ppff->telefono }}</p>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Parentesco</label>
                                <p id="parentesco">{{ $estudiante->ppff->parentesco }}</p>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Ocupación</label>
                                <p id="ocupacion">{{ $estudiante->ppff->ocupacion }}</p>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Dirección</label>
                                <p id="direccion">{{ $estudiante->ppff->direccion }}</p>
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
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Llene los datos del estudiante en el formulario</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ url('/admin/estudiantes/'.$estudiante->id ) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="text" name="ppff_id" value="{{ $estudiante->ppff->id }}" id="ppff_id" hidden>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Fotografía</label>


                                    <input type="file" class="form-control"
                                        name="foto"
                                        placeholder="Escriba aquí..." onchange="mostrarImagen(event)" accept="image/*">
                                    <br>

                                    <center>
                                        <img id="preview" src="{{ url($estudiante->foto) }}"
                                            style="max-width: 200px; margin-top: 10px;">
                                    </center>

                                    @error('foto')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                                <script>
                                    const mostrarImagen = e =>
                                        document.getElementById('preview').src = URL.createObjectURL(e.target.files[0]);
                                </script>
                            </div>

                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Nombre del rol</label><b> (*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i 
                                                class="fas fa-user-check"></i></span>
                                        </div>
                                        <select name="rol" id="" class="form-control">
                                            <option value="">Seleccione un rol...</option>
                                            @foreach ($roles as $rol)
                                                @if ($rol->name == "ESTUDIANTE")
                                                    <option value="{{ $rol->name }}" {{ $rol->name == "ESTUDIANTE" ? 'selected':'' }}>{{ $rol->name }}</option>
                                                @else
                                                @endif                                      
                                            @endforeach
                                                <option value="">No existe el rol estudiante</option> 
                                        </select>
                                    </div>
                                    @error('rol')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="nombres">Nombres</label><b> (*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="nombres" id="nombres" 
                                        value="{{ old('nombres',$estudiante->nombres)}}" placeholder="Ingrese nombres..." required>
                                    </div>
                                    @error('nombres')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="apellidos">Apellidos</label><b> (*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user-friends"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="apellidos" id="apellidos" 
                                        value="{{ old('apellidos',$estudiante->apellidos)}}" placeholder="Ingrese apellidos..." required>
                                    </div>
                                    @error('apellidos')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="ci">DNI</label><b> (*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="ci" id="ci" 
                                        value="{{ old('ci',$estudiante->ci)}}" placeholder="Ingrese DNI..." required>
                                    </div>
                                    @error('ci')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                                </div>

                            <div class="row">
                                    <div class="col-md-3">
                                <div class="form-group">
                                    <label for="fecha_nacimiento">Fecha de nacimiento</label><b> (*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" 
                                        value="{{ old('fecha_nacimiento',$estudiante->fecha_nacimiento)}}" placeholder="Ingrese fecha de nacimiento..." required>
                                    </div>
                                    @error('fecha_nacimiento')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                                                                <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="telefono">teléfono</label><b> (*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="telefono" id="telefono" 
                                                value="{{ old('telefono',$estudiante->telefono)}}" placeholder="Ingrese teléfono..." required>
                                            </div>
                                            @error('telefono')
                                                <small style="color: red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="profesion">Género</label><b> (*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-users"></i></span>
                                                </div>
                                                <select name="genero" id="" class="form-control">
                                                    <option value="masculino"{{ $estudiante->genero == "masculino" ? 'selected':'' }}>Masculino</option>
                                                    <option value="femenino"{{ $estudiante->genero == "femenino" ? 'selected':'' }}>Femenino</option>
                                                </select>
                                            </div>
                                            @error('genero')
                                                <small style="color: red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="direccion">Email</label><b> (*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-briefcase"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="email" id="email" 
                                                value="{{ old('email',$estudiante->usuario->email)}}" placeholder="Ingrese email..." required>
                                            </div>
                                            @error('email')
                                                <small style="color: red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="direccion">Direccion</label><b> (*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="direccion" id="direccion" 
                                                value="{{ old('direccion',$estudiante->direccion)}}" placeholder="Ingrese dirección..." required>
                                            </div>
                                            @error('direccion')
                                                <small style="color: red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <a href="{{ url('/admin/estudiantes/') }}" class="btn btn-default"><i
                                            class="fas fa-arrow-left"></i> Cancelar</a>
                                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i>
                                        Actualizar</button>
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

@stop

@section('css')
<style>
    /*Fondo transparente y sin borde en el contenedor*/
    #example1_wrapper .dt-buttons{
        background-color: transparent;
        box-shadow: none;
        border: none;
        display: flex;
        justify-content: center; /* Centrar los botones */
        gap: 10px; /* Espaciado entre botones */
        margin-bottom: 15px; /* Separar botones de la tabla */
    }

    /* Estilo personalizado para los botones */
    #example1_wrapper .btn {
        color: #fff; /* Color del texto en blanco */
        border-radius: 4px; /* Bordes redondeados */
        padding: 5px 15px; /* Espaciado interno */
        font-size: 14px; /* Tamaño de fuente */
    }

    /* Colores por tipo de botón */
    .btn-danger { background-color: #dc3545; border: none; }
    .btn-success { background-color: #28a745; border: none; }
    .btn-info { background-color: #17a2b8; border: none; }
    .btn-warning {background-color: #ffc107; color: #212559; border: none; }
    .btn-default {background-color: #6e7176; color: #212559; border: none; }
</style>
@stop

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

<script>
    $(function() {

        $('.btn-seleccionar').click(function(){
            var nombres = $(this).data('nombres');
            var apellidos = $(this).data('apellidos');
            var ci = $(this).data('ci');
            var fecha_nacimiento = $(this).data('fecha_nacimiento');
            var telefono = $(this).data('telefono');
            var parentesco = $(this).data('parentesco');
            var ocupacion = $(this).data('ocupacion');
            var direccion = $(this).data('direccion');
            var id = $(this).data('id');

            $('#nombres').html(nombres);
            $('#apellidos').html(apellidos);
            $('#ci').html(ci);
            $('#fecha_nacimiento').html(fecha_nacimiento);
            $('#telefono').html(telefono);
            $('#parentesco').html(parentesco);
            $('#ocupacion').html(ocupacion);
            $('#direccion').html(direccion);
            $('#ppff_id').val(id);

            $('#datos_ppff').css('display','block');
            $('#ModalCreate').modal('hide');
        });

        $("#example1").DataTable({
            "pageLength": 5,
            "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Padres",
                "infoEmpty": "Mostrando 0 a 0 de 0 Padres",
                "infoFiltered": "(Filtrando de _MAX_total Padres)",
                "lengthMenu": "Mostrar _MENU_ Padres",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscador:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Último",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            
        }).buttons().container().appendTo('#example1_wrapper .row:eq(0)');
    });
</script>
@stop