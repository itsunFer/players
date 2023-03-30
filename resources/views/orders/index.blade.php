<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <title>Jugadores</title>
</head>
<body>
    <div class="container text-center p-3 text-bg-light">
    <h1>Jugadores</h1>
    <a href="/orders/create"class="btn btn-primary"> Agregar jugador</a><br><br>
    <div class="list-group">
        @foreach ($orders as $order)
        <a href="/orders/{{$order->id}}" class="list-group-item list-group-item-action">Nombre: {{ $order->name}}</a>
        @endforeach
    </div>

    </div>
</body>
</html>