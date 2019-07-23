@extends('layouts.app')


@section('content')
<div class="container">
        

    

    @if (auth()->check())
   
    
    @if (auth()->user()->hasRole('admin'))
    <div class="row justify-content-center mb-3">
        <div class="col-md-8">
            <div class="card text-center">
                <div class="card-header ">Hola ¿como estamos?<br><strong>{{auth()->user()->name}}</strong></div>

                <div class="card-body ">


                    <a href="/horarios"><button type="submit" class="btn btn-primary ">HORARIOS</button></a>
                    <a href="/users"><button type="submit" class="btn btn-primary ">EMPLEADOS</button></a>
                    <a href=""><button type="submit" class="btn btn-primary">HORAS EMPLEADOS</button></a>
                    <a href=""><button type="submit" class="btn btn-primary">LIQUIDAR HORAS</button></a>

                </div>
            </div>
        </div>
    </div>






    @else
    <div class="row justify-content-center mb-3">
        <div class="col-md-8">
            <div class="card text-center">
                <div class="card-header ">Hola ¿como estamos?<br><strong>{{auth()->user()->name}}</strong></div>

                <div class="card-body">


                <form action="user/{{auth()->user()->id}}/inicio" method="post" @if(session('status')=='Ok turno iniciado') hidden @endif>

                        <input type="datetime" name="datetimeInicio" id="datetimeInicio" value="{{date("Y-m-d H:i")}}"
                            autocomplete>
                        <button class="btn btn-primary" type="submit">Inicio de jornada</button>
                        

                    </form>
                    <form action="user/{{auth()->user()->id}}/final" method="post" class="mt-3">

                        <input type="datetime" name="datetimeFinal" id="datetimeFinal"
                            value="{{date("Y-m-d H:i")}}" autocomplete>
                        <button class="btn btn-primary" type="submit">Final de jornada</button>

                    </form>
<h2>EN CONSTRUCCION</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mb-3">
        <div class="col-md-8">
            <div class="card text-center">
                <div class="card-header ">Horarios para....
                    <br>
                    <strong>{{auth()->user()->name}}</strong>




                    <div class="card-body">
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
    </div>
    @endif
    @endif
    <div class="row justify-content-center mb-3">
            <div class="col-md-8">
                <div class="card text-center">
                    <div class="card-header ">Noticias Y otras cosas</strong></div>
    
                    <div class="card-body">
    
    
                        <section>
                            <h2>Noticion la Vane...<br> se nos casa</h2>
                            <h5>Al parecer ha dado un buen braguetazo</h5>
                            <p>Segun fuentes bien informadas la Vane se nos casa , ademas de lujo el con un monton de duros
                                y con mas años que Matusalen. Como no podia ser menos ella ya espera su primer hijo fruto de este amor tan puro que siente...que
                                arte loca.... </p>
    
                        </section>
                        <section>
                                <h2>Escasean las pirulas<br> la Nina histérica </h2>
                                <h5>Dicen haberla visto buscando por las esquinas</h5>
                                <p>Pos eso escasez de pirulas de las que toma la Nina asi que habrá que aguantarla una mijita mas que de costumbre hasta que pase la mala racha o le salgan tetas....</p>
        
                        </section>
                        <section>
                            <h2>Manias de la gente</h2>
                            <h5>El personal esta fatal de lo suyo</h5>
                            <p>Se ve a gente chuperreteando los baños del Club....¿cual es el misterio?</p>
    
                        </section>
    
    
    
    
    
                    </div>
                </div>
            </div>
        </div>
    <div class="modal fade"  id="horarioModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div style="" class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Horario para {{auth()->user()->name}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <style>
                    td, th{
                        border:1px solid #333;
                        min-height: 100%;
                        padding: 0!important;
                        text-align: center;
                    }
                    </style>
                    <table class="table  table-striped text-center">
                            <thead>
                                    <tr>
                                    <th  class="col-3" style="display:inline-block; background-color:#999fff" class="">TURNOS</th>
                                    <th  class="col-1" style="display:inline-block; background-color:#999fff" class="">L</th>
                                    <th  class="col-1" style="display:inline-block; background-color:#999fff" class="">M</th>
                                    <th  class="col-1" style="display:inline-block; background-color:#999fff" class="">X</th>
                                    <th  class="col-1" style="display:inline-block; background-color:#999fff" class="">J</th>
                                    <th  class="col-1" style="display:inline-block; background-color:#999fff" class="">V</th>
                                    <th  class="col-1" style="display:inline-block; background-color:#999fff" class="">S</th>
                                    <th  class="col-1" style="display:inline-block; background-color:#999fff" class="">D</th>
                                    </tr>
                               
            
                            </thead>
                            <tbody>
                                    <tr> 
                                    <td style="display:inline-block; background-color:#999fff" id="" class="col-3">MAÑANA</td>
                                    <td style="display:inline-block; background-color:#999fff" id="11" class="col-1">.</td>
                                    <td style="display:inline-block; background-color:#999fff" id="12" class="col-1">.</td>
                                    <td style="display:inline-block; background-color:#999fff" id="13" class="col-1">.</td>
                                    <td style="display:inline-block; background-color:#999fff" id="14" class="col-1">.</td>
                                    <td style="display:inline-block; background-color:#999fff" id="15" class="col-1">.</td>
                                    <td style="display:inline-block; background-color:#999fff" id="16" class="col-1">.</td>
                                    <td style="display:inline-block; background-color:#999fff" id="17" class="col-1">.</td>
                                    </tr>
                  
                                <tr>
                                    <td style="display:inline-block; background-color:#999fff" id="" class="col-3">TARDE</td>
                                    <td style="display:inline-block; background-color:#999fff" id="21" class="col-1">.</td>
                                    <td style="display:inline-block; background-color:#999fff" id="22" class="col-1">.</td>
                                    <td style="display:inline-block; background-color:#999fff" id="23" class="col-1">.</td>
                                    <td style="display:inline-block; background-color:#999fff" id="24" class="col-1">.</td>
                                    <td style="display:inline-block; background-color:#999fff" id="25" class="col-1">.</td>
                                    <td style="display:inline-block; background-color:#999fff" id="26" class="col-1">.</td>
                                    <td style="display:inline-block; background-color:#999fff" id="27" class="col-1">.</td>
                                </tr>
            
            
                            </div>



                    </table>
                    
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="modalClose">Close</button>

                </div>
            </div>
        </div>
    </div>
    <script>
        var btnHora=document.getElementById('btnHorario');
            $('#btnHorario').on('click', function(){
                var sem=document.getElementById('exampleFormControlSelect10');
                var seman=sem.options[sem.selectedIndex].value;
                $.ajax({
                    url: '/api/user/'+{{auth()->user()->id}}+'/semana/'+seman,
                    success: function(respuesta) {
                        
                       if (respuesta.length>0){
                           respuesta.forEach(element => {
                               var turno="";
                               if (element.turno=="mañana"){
                                   turno="1";
                               }else{turno="2"}

                               if (element.dia=="Lunes"){
                                   turno +="1";
                               }
                               if (element.dia=="Martes"){
                                   turno +="2";
                               }
                               if (element.dia=="Miercoles"){
                                   turno +="3";
                               }
                               if (element.dia=="Jueves"){
                                   turno +="4";
                               }
                               if (element.dia=="Viernes"){
                                   turno +="5";
                               }
                               if (element.dia=="Sabado"){
                                   turno +="6";
                               }
                               if (element.dia=="Domingo"){
                                   turno +="7";
                               }                      

                              $('#'+turno).css('background-color','#0f0'); 
                           });
                        
                            $('#horarioModal').modal('show');
                            
                       } else{
                        alert( 'error sin turnos esta semana');

                       }                      
                    },
                    error: function() {
                        console.log("No se ha podido obtener la información");
                    }
                });
            });


            $('#horarioModal').on('hidden.bs.modal', function (e) {
                for (let index =11; index < 18; index++) {
                $('#'+index).css('background-color','#999fff');             
                $('#'+(index+10)).css('background-color','#999fff'); 
                  
                                
            }
 
})
                    
            

    </script>
  
   
</div>
@endsection