@extends('layouts.app')


@section('content')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<div class="container">
    

    @if (auth()->check())
    @if (auth()->user()->hasRole('admin'))
    <div class="row justify-content-center mb-3">
        <div class="col-md-12 col-sm-2">
            <div class="card text-center">
                <div class="card-header ">Listado de Horarios<br><strong> Accede como {{auth()->user()->name}}</strong><br>
                    <a href="/horarios/create" class="btn btn-primary mt-4">Nuevo Turno</a>
                    
                </div>

                <div class="card-body ">
                    


                    <div class="container table-responsive">

                        <table class="table table-bordered  data-table" id="data-table2">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Semana</th>
                                    <th>Dia</th>
                                    <th>Nombre</th>
                                    <th>Turno</th>
                                    <th width="100px">Editar/Borrar</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <div class="">
                                    <strong>
                                            Semana Actual {{date('W')}}
                                    </strong>
                                   
                                </div>
                        </table>
                    </div>




                </div>
            </div>
            
        </div>
    
        
    </div>
    






    @else

    <h1>no puedes estar aqui</h1>
    @endif
    @endif

    <script type="text/javascript">
        $(document).ready(function () {
            
          $('#data-table2').DataTable({
              processing: true,
              serverSide: true,
              ajax: "{{ route('horarios.index') }}",
              columns: [
                  {data: 'id', name: 'id', searchable: false},
                  {data: 'fecha', name: 'fecha'},
                  {data: 'dia', name: 'dia'},
                  {data: 'username', name: 'username'},
                  {data: 'turno', name: 'turno'},

                  {data: 'action', name: 'action', orderable: false, searchable: false},
                
              ],
              language:{
                    "sProcessing":     "Estamos en ello...",
                    "sLengthMenu":     "Mostrar _MENU_ registros",
                    "sZeroRecords":    "Na de na",
                    "sEmptyTable":     "Ningún dato disponible en esta tabla",
                    "sInfo":           "Registros del _START_ al _END_ de  _TOTAL_ registros",
                    "sInfoEmpty":      "Registros del 0 al 0 de 0 registros",
                    "sInfoFiltered":   "(filtrado de _MAX_ registros)",
                    "sInfoPostFix":    "",
                    "sSearch":         "Buscar:",
                    "sUrl":            "",
                    "sInfoThousands":  ",",
                    "sLoadingRecords": "Estamos peinandola...",
                    "oPaginate": {
                        "sFirst":    "Primero",
                        "sLast":     "Último",
                        "sNext":     "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }
              }
              
          });
          
        });
    </script>


    @endsection