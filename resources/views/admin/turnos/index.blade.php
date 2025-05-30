@extends('adminlte::page')

@section('content_header')
    <h1><b>Listado de turnos<b></h1>
    <hr>
@stop

@section('content')

    <div class="row">
        <div class="col-md-6">
            <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Turnos registrados</h3>

                        <div class="card-tools">
                            <a href="{{ url('/admin/turnos/create')}}" class="btn btn-primary"> Crear nuevo turno</a>

                        </div>
                        <!-- /card-tools -->
                    </div>
                    <!-- /.card header -->
                    <div class="card-body">
                        
                        <table id="example" class="table table-bordered table-striped table-hover table-sm">
                            <thead>
                                <tr>
                                    <th>Nro</th>
                                    <th>Nombre</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($turnos as $turno)
                                    <tr>
                                        <td style="text-align: center">{{ $loop->iteration }}</td>
                                        <td>{{ $turno->nombre }}</td>
                                        <td>
                                            <div class="row d-flex justify-content-center">
                                                <a href="{{ url('/admin/turnos/'.$turno->id.'/edit') }}" class="btn btn-success btn-sm"><i class="fas fa-pencil-alt"></i> Editar</a>
                                            
                                                <form action="{{ url('/admin/turnos/'.$turno->id )}}" method="post" id="miFormulario{{ $turno->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="preguntar{{ $turno->id }}(event)">
                                                        <i class="fas fa-trash"></i> Eliminar
                                                    </button>
                                                </form>
                                            </div>

                                            <script>
                                                function preguntar{{ $turno->id }}(event) {
                                                    event.preventDefault();

                                                    Swal.fire({
                                                        title: '¿Desea eliminar este registro?',
                                                        text: '',
                                                        icon: 'question',
                                                        showDenyButton: true,
                                                        confirmButtonText: 'Eliminar',
                                                        confirmButtonColor: '#a5161d',
                                                        denyButtonColor: '#270a0a',
                                                        denyButtonText: 'Cancelar',
                                                    }).then((result) => {
                                                        if (result.isConfirmed) {
                                                            // JavaScript puro para enviar el formulario
                                                            document.getElementById('miFormulario{{ $turno->id }}').submit();
                                                        }
                                                    });
                                                }
                                            </script>
                                        </td>
                                    </tr>                                  
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card-->
        </div>
    </div>

@stop

@section('css')

@stop

@section('js')
   
@stop