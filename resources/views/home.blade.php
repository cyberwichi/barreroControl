@extends('layouts.app')

@section('content')
<div class="container text-center">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Acceso</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Bien ya estas registrado ahora tendras que esperar que autorice tu cuenta un administrador ... Gracias por trabajar con nosotros.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
