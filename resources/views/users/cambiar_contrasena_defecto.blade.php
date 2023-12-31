@extends('layouts.egresado')
@section('title', 'Cambiar contraseña por defecto')
@section('content')


<!-- Modal -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.3/css/bootstrap.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.3/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.0/jquery.js"></script>



<!-- Modal -->
<form action="{{ route('cambiarcontrasenapordefecto.update',Auth::user()->egresado_matricula) }}" name="crear" id="crear" method="post">
    @csrf
    @method('PUT')
    <div class="text-center">
        <a href="#myModal" class=" btn btn btn-danger trigger-btn" data-toggle="modal">Click Para abrir el Modal</a>
</div>
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="myModal">Cambiar contraseña por defecto primero</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
           {{--   El old('') permite rescatar los valores en caso hay algún error a la hora de validar. Esto va en value="{{old('nombre_del_campo')}}"  --}}
            <div class="form-group">
                        <label for="contrasenaactual">Ingrese contraseña actual</label>
                        <input type="password" class="form-control" id="contrasenaactual" name="contrasenaactual" value="{{ old('contrasenaactual')}}"  maxlength="20" >
                        <div class="text-danger">
                        {{$errors->first('contrasenaactual')}}
                        </div>
                    </div>
            <div class="form-group">
                        <label for="password">Ingrese nueva Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" value="{{ old('password')}}"  maxlength="20" >
                        <div class="text-danger">
                        {{$errors->first('password')}}
                        </div>
            </div>
            <div class="form-group">
                <label for="repitanuevacontrasena">Confirmar nueva contraseña</label>
                <input type="password" class="form-control" id="repitanuevacontrasena" name="repitanuevacontrasena" value="{{ old('repitanuevacontrasena')}}"  maxlength="20" >
                <div class="text-danger">
                {{$errors->first('repitanuevacontrasena')}}
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

            </div>

<script>
$(document).ready(function() {
    $('#myModal').modal('toggle')
});</script>
@endsection
