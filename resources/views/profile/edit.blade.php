@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')
<div class="row">
    <div class="col-md-6 offset-md-3 mt-4">
            <div class="card">
            <div class="card-header border-dark bg bg-gradient-navy">
                <h4>Editar Perfil</h4>
            </div>
            <div class="card-body">
                <form action="{{route('profile.update')}}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="nombre" class="form-label">
                                    Usuario:
                                </label>
                                <input class="form-control" value="{{$user->name}}" name="name" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="nombre" class="form-label">
                                    Email:
                                </label>
                                <input class="form-control" value="{{$user->email}}" name="email" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="nombres" class="form-label">
                                    Nombres:
                                </label>
                                <input class="form-control" value="{{$user->nombres}}" name="nombres" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="apellidos" class="form-label">
                                    Apellidos:
                                </label>
                                <input class="form-control" value="{{$user->apellidos}}" name="apellidos" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="telefono" class="form-label">
                                    Celular:
                                </label>
                                <input type="text" class="form-control" value="{{$user->celular}}" name="celular" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="direccion" class="form-label">
                                    Dirección:
                                </label>
                                <input class="form-control" value="{{$user->direccion}}" name="direccion">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="f_nacimiento" class="form-label">
                                    Nacimiento:
                                </label>
                                <input type="date" class="form-control" value="{{$user->f_nacimiento}}" name="f_nacimiento">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="genero" class="form-label">
                                    Genero:
                                </label>
                                <select name="genero" id="" class="form-control">
                                    @if ($user->genero == 'm')
                                    <option value="m" selected>Masculino</option>
                                    <option value="f">Femenino</option>
                                    @endif
                                    @if ($user->genero == 'f')
                                    <option value="m">Masculino</option>
                                    <option value="f" selected>Femenino</option>
                                    @endif
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6 mb-3">
                        <img src="{{$user->avatar}}" id="user_avatar" class="img-fluid btn" alt="No se encontro IMG" onclick="subir_img()">
                        <input type="file" class="" id="f_avatar" name="img_avatar" accept=".jpg,.png">
                    </div>
                    {{-- <div class="col-md-12 mb-3">
                        <label for="nombre" class="form-label">
                            Contraseña:
                        </label>
                        <div class="input-group">
                            <input type="password" class="form-control" name="password" id="pass1">
                            <div class="input-group-append" onclick="ver()">
                                <span class="input-group-text">
                                    <i class="far fa-eye" id="togglePassword" style="cursor: pointer;"></i>
                                </span>
                            </div>
                        </div>
                    </div> --}}
                </div>
                <center>
                    <a href="/home" class="btn btn-danger">Cancelar</a>
                    <button type="submit" class="btn btn-success">Guardar</button>
                </center>
                </form>
            </div>
            {{-- <div class="card-footer">
                <form method="post" action="{{ route('profile.update_avatar') }}"
                enctype="multipart/form-data">
                @csrf
                    <div class="image">
                    <label><h4>Editar Avatar</h4></label>
                    <input type="file" class="form-control mb-3" required name="image">
                    </div>

                    <div class="post_button">
                    <button type="submit" class="btn btn-primary">Editar</button>
                </div>
                </form>
            </div> --}}
        </div>
    </div>
</div>
@stop

@section('css')
@stop

@section('js')
    <script>
        const subir_img = () =>{
            document.getElementById('f_avatar').click();
        }
    </script>
@stop
