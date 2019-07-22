@extends('layouts.app')

@section('content')
<div class="container text-center">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header "><strong> Accede como {{auth()->user()->name}}</strong><br> Editando Usuario : <strong>{{$user->name}}</strong> </div>
                <div class="card-body">
                    <form action="{{route('users.update', ['user'=>$user->id])}} " method="POST">
                    {{ csrf_field() }}
              
                    {{method_field('PUT')}}
                    @foreach ($roles as $role )
                        <div class="form-check">
                            <input type="checkbox" name="roles[]" value="{{ $role->id }}"
                            {{$user->hasAnyRole($role->name)?'checked':''}}>
                        <label>{{$role->name}}</label>
                        </div>                        
                    @endforeach
                    <button type="submit" class="btn btn-primary">Modificar</button>
                    

                    
                    </form>

                    <a data-toggle="tooltip" data-placement="top" title="Eliminar Usuario"><button data-target="#modal-delete-{{$user->id}}" data-toggle="modal"
                            class="btn btn-danger btn-sm">Eliminar<i class="fas fa-ban"></i></button></a>



                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1"
    id="modal-delete-{{$user->id}}">

            <div class="modal-dialog">
                    <div class="modal-content">
            
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">X</span>
                            </button>
                            <h3 class="modal-title">Eliminar Usuario</h3>
            
                        </div> 
                        <div class="modal-body">
                            <p>¿REALMENTE DESEA ELIMINAR ESTE USUARIO DE LA BASE DE DATOS?</p>
                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                            
                            <a class="text-danger" href="{{ route('user.delete', $user->id)}}">Si Borrar <i class="fas fa-ban"></i></a>
                            
                        </div>
                    </div>
                </div>




    
    

    


</div>
@endsection