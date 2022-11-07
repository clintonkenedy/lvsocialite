@extends('adminlte::page')

@section('title', 'Perfil')

@section('content_header')
{{-- <center>
    <h1>PERFIL DE USUARIO</h1>
</center> --}}
@stop

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3 mt-4">
            <div class="card border-dark">
                <h4 class="card-header border-dark bg bg-info">Contraseña</h4>
                <form action="{{ route('password.update') }}" method="POST" id="uppass">
                @csrf
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @elseif (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="evento" class="form-label">
                                Ingrese nueva contraseña
                            </label>
                            <span class="text text-info">*</span>
                            <div class="input-group">
                                <input type="password" id="pass1" class="form-control" value="" name="new_password" required>
                                <div class="input-group-append" onclick="ver()">
                                    <span class="input-group-text">
                                        <i class="far fa-eye" id="togglePassword" style="cursor: pointer;"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="apellido_materno" class="form-label">
                                Confirme la contraseña
                            </label>
                            <div class="input-group">
                                <input type="password" id="pass2" class="form-control" value="" name="new_password_confirmation" required>
                                <div class="invalid-feedback">
                                    Las contraseñas no coinciden.
                                </div>
                            </div>
                        </div>
                        <div class="invalid-feedback">
                            Las contraseñas no coinciden.
                        </div>
                    <center>
                        <button class="btn btn-success">Guardar</button>
                        <a href="#" class="btn btn-danger">Cancelar</a>
                    </center>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script>
        const ver = () => {
            const x = document.getElementById("pass1");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }

        document.getElementById("uppass").addEventListener("submit", function(event){
            event.preventDefault();
            let pass1 = document.getElementById("pass1");
            let pass2 = document.getElementById("pass2");
            pass1.value = pass1.value.trim();

            if (pass1.value !== pass2.value) {
                pass1.classList.add('is-invalid');
                pass2.classList.add('is-invalid');
                console.error('No coincide');
                return
            }
            console.log(document.getElementById("pass1").value);
            console.log(document.getElementById("pass2").value);

            document.getElementById("uppass").submit();
        });

    </script>
@stop

