<!doctype html>


<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $producto->nombre }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>

    <nav class="navbar bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="/catalogo">
            <img src="/image/store-2017.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
            Catalogo

          </a>
        </div>
    </nav>


    @php

        // SDK de Mercado Pago
        require base_path('/vendor/autoload.php');
        // Agrega credenciales
        MercadoPago\SDK::setAccessToken(config('services.mercadopago.token'));

        $preference = new MercadoPago\Preference();

        // Crea un ítem en la preferencia
        $item = new MercadoPago\Item();
        $item->title = $producto->nombre;
        $item->quantity = 1;
        $item->unit_price = $producto->precio;

        $preference->back_urls = array(
            "success" => "http://localhost:8000/success",
        );
        $preference->auto_return = "approved";
        $preference->items = array($item);
        $preference->save();

    @endphp

    {{-- {{ $productos }} --}}
    <div class="container">
        <div class="row mt-3 justify-content-center">
                <div class="col-md-10">
                    <div class="card mb-3" style="width: 60rem">
                        <div class="row g-0">
                          <div class="col-md-8">
                            <center>
                                <img src="{{$producto->foto}}" class="img-fluid rounded-start" alt="...">
                            </center>
                          </div>
                          <div class="col-md-4">
                            <div class="card-body">
                              <h5 class="card-title">{{$producto->nombre}}</h5>
                              <p class="card-text">{{$producto->descripcion}}</p>
                              <h5 class="card-title">{{ "   S/ ".$producto->precio }}</h5>
                              {{-- <button class="btn btn-lg btn-success"> Comprar </button> --}}
                              <div class="cho-container"></div>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    {{-- // SDK MercadoPago.js V2 --}}
    <script src="https://sdk.mercadopago.com/js/v2"></script>
    <script>
        const mp = new MercadoPago("{{config('services.mercadopago.key')}}", {
          locale: 'es-AR'
        });

        mp.checkout({
          preference: {
            id: '{{$preference->id}}'
          },
          render: {
            container: '.cho-container',
            label: 'Pagar',
          }
        });
      </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
  </body>
</html>
