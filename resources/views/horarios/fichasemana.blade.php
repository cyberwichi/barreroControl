@extends('layouts.app')


@section('content')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<div class="container">


    @if (auth()->check())
    @if (auth()->user()->hasRole('admin'))
    <div class="row justify-content-center mb-3">
        <div class="col-md-12 col-sm-12 p-0">
            <div class="card text-center">
                <div class="card-header ">Menu de Horas<br><strong> Accede como {{auth()->user()->name}}</strong><br>


                    <strong class="mb-3">
                        Semana a consultar: {{$horas[0]->fecha}}
                    </strong>
                    <br>

                </div>

                <div class="card-body table-responsive">
                    <style>
                        td,
                        th {
                            border: 1px solid #333;
                            min-height: 100%;                            
                            padding: 0 !important;
                            text-align: center;
                            font-size: 1.9vw;
                           
                        }
                        td{
                            border-radius: 5%;
                            box-shadow: 2px 2px 2px #009900;
                        }
                    </style>
                    <table class="table m-0 w-100">
                        <thead>
                            <tr>
                                <th class="col-2" style="display:inline-block; background-color:#999fff" class="">TURNOS
                                </th>
                                <th class="col-1" style="display:inline-block; background-color:#999fff" class="">L</th>
                                <th class="col-1" style="display:inline-block; background-color:#999fff" class="">M</th>
                                <th class="col-1" style="display:inline-block; background-color:#999fff" class="">X</th>
                                <th class="col-1" style="display:inline-block; background-color:#999fff" class="">J</th>
                                <th class="col-1" style="display:inline-block; background-color:#999fff" class="">V</th>
                                <th class="col-1" style="display:inline-block; background-color:#999fff" class="">S</th>
                                <th class="col-1" style="display:inline-block; background-color:#999fff" class="">D</th>
                            </tr>


                        </thead>
                        <tbody>
                            <tr>
                                <td style="display:inline-block; background-color:#999fff" id="" class="col-2">MAÑANA
                                </td>
                                <td style="display:inline-block; background-color:#999fff" id="11" class="col-1"></td>
                                <td style="display:inline-block; background-color:#999fff" id="12" class="col-1"></td>
                                <td style="display:inline-block; background-color:#999fff" id="13" class="col-1"></td>
                                <td style="display:inline-block; background-color:#999fff" id="14" class="col-1"></td>
                                <td style="display:inline-block; background-color:#999fff" id="15" class="col-1"></td>
                                <td style="display:inline-block; background-color:#999fff" id="16" class="col-1"></td>
                                <td style="display:inline-block; background-color:#999fff" id="17" class="col-1"></td>
                            </tr>

                            <tr>
                                <td style="display:inline-block; background-color:#999fff" id="" class="col-2">TARDE
                                </td>
                                <td style="display:inline-block; background-color:#999fff" id="21" class="col-1"></td>
                                <td style="display:inline-block; background-color:#999fff" id="22" class="col-1"></td>
                                <td style="display:inline-block; background-color:#999fff" id="23" class="col-1"></td>
                                <td style="display:inline-block; background-color:#999fff" id="24" class="col-1"></td>
                                <td style="display:inline-block; background-color:#999fff" id="25" class="col-1"></td>
                                <td style="display:inline-block; background-color:#999fff" id="26" class="col-1"></td>
                                <td style="display:inline-block; background-color:#999fff" id="27" class="col-1"></td>
                            </tr>


                </div>



                </table>


            </div>
        </div>

    </div>


</div>







@else

<h1>no puedes estar aqui</h1>
@endif
@endif

<script>
    $(document).ready(function(){
                
                var respuesta=@json($horas);
                function obtener(id)
                    {
                        var users=@json($users);
                     

                        for(var i = 0; i < users.length; i++)
                        {
                            if(users[i].id == id)
                            {
                                
                                return users[i].name;

                            }
                            
                        }
                    }
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
                               var users=@json($users);
                               

                              $('#'+turno).css('background-color','#0f0'); 
                              $('#'+turno).append(obtener(element.user_id));
                              $('#'+turno).append('<br><br>');

                           });
                        
                            $('#horarioModal2').modal('show');
                            
                       } else{
                        alert( 'error sin turnos esta semana');

                       };
                    });                      
                   
               
            

$('#horarioModal2').on('hidden.bs.modal', function (e) 
{
    for (let index =11; index < 18; index++) 
    {
        $('#'+index).css('background-color','#999fff');             
        $('#'+(index+10)).css('background-color','#999fff'); 
    }
});
        
                    
            

</script>




@endsection