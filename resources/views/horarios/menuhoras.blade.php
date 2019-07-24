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
                <div class="card-header ">Menu de Horas<br><strong> Accede como {{auth()->user()->name}}</strong><br>
                    <strong>
                        Semana Actual {{date('W')}}
                    </strong>

                </div>

                <div class="card-body ">
                    <form action="{{route('horarios.consulta')}} " method="POST">
                      
                        <div class="form-group">
                                @csrf
                      <i class="fas fa-cloud-showers-heavy    "></i>
                            <label for="exampleFormControlSelect3">Seleccionar Empleado</label>
                            <select class="form-control" id="exampleFormControlSelect3" name="nombreForm">
                                @foreach ($users as $user )
                                @continue(!$user->hasRole('user'))

                                <option value="{{$user->id}}">{{$user->name}}</option>


                                @endforeach


                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Consultar Empleado</button>
                    </form>








                </div>
            </div>

        </div>


    </div>
    <div class="row justify-content-center mb-3">
            <div class="col-md-12 col-sm-2">
                <div class="card text-center">
                    <div class="card-header ">
                    </div>
    
                    <div class="card-body ">
                            <div class="form-group">
                                    <?php
                                            $diaSemana=['Lunes','Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado','Domingo'];
                                            $fecha = date_create();
                                            $año=2019;
                                        ?>
        
                                    <label for="exampleFormControlSelect10">Seleccionar Semana</label>
                                    <select class="form-control" id="exampleFormControlSelect10" name="fechaForm">
                                        @for ($i = 1; $i <=53 ; $i++) <option value="{{$i}}" @if ($i==date('W')) selected
                                            @endif>
                                            Semana {{$i}} inicio
                                            <?php
                                            date_isodate_set($fecha, $año, $i);
                                            echo date_format($fecha, 'd-m-Y') ;
                                            ?>
                                            </option>
                                            @endfor
                                    </select>
        
        
        
                                </div>
                                <button id="btnHorario" class="btn btn-primary">Ver</button>
                    </div>
                </div>
    
            </div>
    
    
        </div>







    @else

    <h1>no puedes estar aqui</h1>
    @endif
    @endif




    @endsection