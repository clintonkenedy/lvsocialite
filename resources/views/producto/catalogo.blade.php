<!doctype html>
@if (Auth::check())
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')
<div class="container">
    <div class="row mt-3">
            @foreach ($productos as $producto )
            <div class="col mb-2">
                <div class="card" style="width: 18rem">
                    {{-- <img src="img_productos/producto1.webp" class="card-img-top" alt="..."> --}}
                    <img src="{{$producto->foto}}" width="224" decoding="async" class="card-img-top" alt="{{ $producto->nombre }}" style="display: block;">
                    <hr>
                    <div class="card-body">
                        <small class="text-muted">{{$producto->nombre}}</small>
                         <br>
                        <h5 class="card-title text-end">{{ "   S/ ".$producto->precio }}</h5>
                        {{-- <p class="card-text">{{ $producto->descripcion }}</p> --}}
                        {{-- <a href="#" class="btn btn-primary">Ver</a> --}}
                    </div>
                    <div class="card-footer text-end">
                        <small class=""><a href="{{route("producto", $producto->id)}}" class="">Ver</a></small>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@stop

@section('css')
@stop

@section('js')
@stop



@else
<html lang="en">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Catalogo</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    </head>
    <body>
      <nav class="navbar bg-light">
          <div class="container-fluid">
            <a class="navbar-brand" href="/catalogo">
              <img src="/image/store-2017.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
              Catalogo
            </a>
            <a href="/login">
                <i class="bi bi-person-fill-check" style="font-size: 2rem; color: black;"></i>
            </a>
          </div>
      </nav>


      {{-- {{ $productos }} --}}
      <div class="container">
          <div class="row mt-3">
                  @foreach ($productos as $producto )
                  <div class="col mb-2">
                      <div class="card" style="width: 18rem">
                          {{-- <img src="img_productos/producto1.webp" class="card-img-top" alt="..."> --}}
                          <img src="{{$producto->foto}}" width="224" decoding="async" class="card-img-top" alt="{{ $producto->nombre }}" style="display: block;">
                          <hr>
                          <div class="card-body">
                              <small class="text-muted">{{$producto->nombre}}</small>
                               <br>
                              <h5 class="card-title text-end">{{ "   S/ ".$producto->precio }}</h5>
                              {{-- <p class="card-text">{{ $producto->descripcion }}</p> --}}
                              {{-- <a href="#" class="btn btn-primary">Ver</a> --}}
                          </div>
                          <div class="card-footer text-end">
                              <small class=""><a href="{{route("producto", $producto->id)}}" class="">Ver</a></small>
                          </div>
                      </div>
                  </div>
              @endforeach
          </div>
      </div>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    </body>
  </html>

@endif


