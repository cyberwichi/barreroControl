@extends('layouts.app')

@section('content')
<div class="container text-center">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header "><strong> Accede como {{auth()->user()->name}}</strong><br> Creando Turno
                </div>
                <div class="card-body">
                    <form action="{{route('horarios.store')}} " method="POST">
                        {{ csrf_field() }}
                        <div>

                        </div>
                        <div class="form-group">

                            <?php
                                $diaSemana=['Lunes','Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado','Domingo'];
                                $fecha = date_create();
                                $año=2019;
                                 
                               
                            ?>


                            <label for="exampleFormControlSelect1">Seleccionar Semana Actual {{date('W')}}</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="fechaForm">
                                @for ($i = 1; $i <=53 ; $i++) <option value="{{$i}}" @if ($i==date('W')) selected
                                    @endif>Semana {{$i}} inicio 
                                <?php
                                date_isodate_set($fecha, $año, $i);
                                echo date_format($fecha, 'd-m-Y') ;
                                
                                ?>
                                
                                </option>
                                    @endfor
                            </select>
                        </div>
                        <div class="form-group">

                            <label for="exampleFormControlSelect2">Seleccionar Dia</label>
                            <select class="form-control" id="exampleFormControlSelect2" name="diaForm">
                                @for ($i =0; $i <=6 ; $i++) <option value="{{$diaSemana[$i]}}">{{$diaSemana[$i]}}
                                    </option>
                                    @endfor
                            </select>

                        </div>


                        <div class="form-group">
                            <label for="exampleFormControlSelect3">Seleccionar Empleado</label>
                            <select class="form-control" id="exampleFormControlSelect3" name="nombreForm">
                                @foreach ($users as $user )
                                <option value="{{$user->id}}">{{$user->name}}</option>


                                @endforeach


                            </select>
                        </div>
                        <div class="form-group">
                            <label>Turno</label>
                            <input class="form-control" type="text" name="turnoForm" value="">

                        </div>

                </div>


            </div>






            <button type="submit" class="btn btn-primary">Crear Turno</button>



            </form>

            {{-- <a data-toggle="tooltip" data-placement="top" title="Eliminar Turno"><button
                        data-target="#modal-delete-{{$horario->id}}" data-toggle="modal"
            class="btn btn-danger btn-sm">Eliminar<i class="fas fa-ban"></i></button></a> --}}



        </div>
    </div>
</div>
</div>
</div>

@endsection