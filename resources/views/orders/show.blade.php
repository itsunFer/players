<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <title>Jugador {{ $order->id }}</title>
</head>
<body>
    <div class="container text-center p-3 text-bg-light" >
    <h1>Jugador {{ $order->id }}</h1>
    <br>
    <a href="/orders" class="btn btn-primary btn-sm">Inicio</a><br>
    </div>
    <div class="container table-responsive text-bg-light">
        <table class="table">
            <thead class="table-primary">
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Equipo</th>
                    <th scope="col">Genero</th>
                    <th scope="col">Fecha de ingreso</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$order->name}}</td>
                    <td>{{$order->team}}</td>
                    <td>{{$order->gender}}</td>
                    <td>{{$order->date}}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="container text-center text-bg-light">
        <a href="/orders/{{ $order->id }}/edit" class="btn btn-secondary btn-sm">Editar</a><br><br>

        <form action="{{ route('orders.destroy', $order) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm"> Eliminar </button>
        </form><br>
    </div>
</body>
</html>