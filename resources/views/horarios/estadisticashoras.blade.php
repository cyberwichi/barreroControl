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


                    <strong class="mb-3">
                    Usuario a consultar: {{$user->name}}
                    </strong>
                    <br>
                      
                        <div class="form-group mt-4">

                                <?php
                                    $diaSemana=['Lunes','Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado','Domingo'];
                                    $fecha = date_create();
                                    $año=2019;
                                     
                                   
                                ?>
    
    
                                <label for="exampleFormControlSelect1">Seleccionar Semana</label>
                                <select class="form-control" id="exampleFormControlSelect11" name="fechaForm">
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
                    
                    <button id="btnHorario2" class="btn btn-primary">Ver</button>

                </div>

                <div class="card-body ">
                    
                        <div class="form-group">

                            
                               


                          
                        </div>
                   








                </div>
            </div>

        </div>


    </div>







    @else

    <h1>no puedes estar aqui</h1>
    @endif
    @endif
    <div class="modal fade"  id="horarioModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div style="" class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Horario para {{$user->name}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <style>
                    td, th{
                        
                        border-radius: 50%;
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
                                    <td style="display:inline-block; background-color:#999fff" id="12" class="col-1">No</td>
                                    <td style="display:inline-block; background-color:#999fff" id="11" class="col-1">No</td>
                                    <td style="display:inline-block; background-color:#999fff" id="13" class="col-1">No</td>
                                    <td style="display:inline-block; background-color:#999fff" id="14" class="col-1">No</td>
                                    <td style="display:inline-block; background-color:#999fff" id="15" class="col-1">No</td>
                                    <td style="display:inline-block; background-color:#999fff" id="16" class="col-1">No</td>
                                    <td style="display:inline-block; background-color:#999fff" id="17" class="col-1">No</td>
                                    </tr>
                  
                                <tr>
                                    <td style="display:inline-block; background-color:#999fff" id="" class="col-3">TARDE</td>
                                    <td style="display:inline-block; background-color:#999fff" id="22" class="col-1">No</td>
                                    <td style="display:inline-block; background-color:#999fff" id="21" class="col-1">No</td>
                                    <td style="display:inline-block; background-color:#999fff" id="23" class="col-1">No</td>
                                    <td style="display:inline-block; background-color:#999fff" id="24" class="col-1">No</td>
                                    <td style="display:inline-block; background-color:#999fff" id="25" class="col-1">No</td>
                                    <td style="display:inline-block; background-color:#999fff" id="26" class="col-1">No</td>
                                    <td style="display:inline-block; background-color:#999fff" id="27" class="col-1">No</td>
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
        var btnHora=document.getElementById('btnHorario2');
            $('#btnHorario2').on('click', function(){
                var sem=document.getElementById('exampleFormControlSelect11');
                var seman=sem.options[sem.selectedIndex].value;
                $.ajax({
                    url: '/api/user/'+{{$user->id}}+'/semana/'+seman,
                    success: function(respuesta) {
                        
                       if (respuesta.length>0){
                           respuesta.forEach(element => {
                               var turno="";
                               if (element.turno=="mañana" || element.turno=="Mañana" ){
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
                              $('#'+turno).text("Si");

                           });
                        
                            $('#horarioModal2').modal('show');
                            
                       } else{
                        alert( 'error sin turnos esta semana');

                       }                      
                    },
                    error: function() {
                        console.log("No se ha podido obtener la información");
                    }
                });
            });


            $('#horarioModal2').on('hidden.bs.modal', function (e) {
                for (let index =11; index < 18; index++) {
                $('#'+index).css('background-color','#999fff');             
                $('#'+(index+10)).css('background-color','#999fff'); 
                  
                                
            }
 
})
                    
            

    </script>




    @endsection