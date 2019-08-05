@extends('layouts.app')

@section('content')
<div class="container text-center">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header "><strong> Accede como {{auth()->user()->name}}</strong><br> Editando Turno
                </div>
                <div class="card-body">
                    <form action="{{route('horarios.update', ['horario'=>$horario->id])}} " method="POST">
                        {{ csrf_field() }}

                        {{method_field('PUT')}}

                        <?php
                                $diaSemana=['Lunes','Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado','Domingo'];
                                $fecha = date_create();
                                $año=2019;
                            ?>


                        <label for="exampleFormControlSelect1">Seleccionar Semana</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="fechaForm">
                            @for ($i = 1; $i <=53 ; $i++) <option value="{{$i}}" @if($i==$horario->fecha) selected
                                @endif >Semana {{$i}} del
                                <?php
                                            date_isodate_set($fecha, $año, $i);
                                            echo date_format($fecha, 'd-m-Y') ;
                                            
                                            ?> </option>
                                @endfor
                        </select>

                        <label for="exampleFormControlSelect2">Seleccionar Dia</label>
                        <select class="form-control" id="exampleFormControlSelect2" name="diaForm">
                            @for ($i =0; $i <=6 ; $i++) <option value="{{$diaSemana[$i]}}"
                                @if($diaSemana[$i]==$horario->dia) selected @endif >{{$diaSemana[$i]}} </option>
                                @endfor
                        </select>



                        <div class="form-group">
                            <label for="exampleFormControlSelect3">Seleccionar Empleado</label>
                            <select class="form-control" id="exampleFormControlSelect3" name="nombreForm">
                                @foreach ($users as $user )
                                <option value="{{$user->id}}" @if($user->id==$horario->user_id) selected
                                    @endif>{{$user->name}}
                                </option>


                                @endforeach


                            </select>
                        </div>

                        <div class="form-group">
                                <label for="exampleFormControlSelect3">Seleccionar Turno</label>
                                <select class="form-control" id="exampleFormControlSelect3" name="turnoForm">                                    
                                    <option value="mañana"  @if($horario->turno=="mañana") selected
                                            @endif>Mañana</option>
                                    <option value="tarde" @if($horario->turno=="tarde") selected
                                            @endif>Tarde</option>
                                </select>
                        </div>
                </div>

            </div>






            <button type="submit" class="btn btn-primary">Modificar</button>



            </form>

            <a data-toggle="tooltip" data-placement="top" title="Eliminar Turno"><button
                    data-target="#modal-delete-{{$horario->id}}" data-toggle="modal"
                    class="btn btn-danger btn-sm">Eliminar<i class="fas fa-ban"></i></button></a>



        </div>
    </div>
</div>
</div>
</div>
<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1"
    id="modal-delete-{{$horario->id}}">

    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">X</span>
                </button>
                <h3 class="modal-title">Eliminar Turno</h3>

            </div>
            <div class="modal-body">
                <p>¿REALMENTE DESEA ELIMINAR ESTE TURNO DE LA BASE DE DATOS?</p>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>

                <a class="text-danger" href="{{ route('horario.delete', $horario->id)}}">Si Borrar <i
                        class="fas fa-ban"></i></a>

            </div>
        </div>
    </div>










</div> --}}
@endsection