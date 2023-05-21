@extends('navbar')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <title> {{ $player->name }}</title>
</head>
<body>
    <div class="container text-center p-3 text-bg-light" >
        @if (session('success'))
        <div id="success-message" class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
    <h1> {{ $player->name }}</h1>
    <br>
    <a href="/players" class="btn btn-primary btn-sm">Inicio</a><br>
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
                    <td>{{$player->name}}</td>
                    @if($player->team)
                        <td>{{$player->team->name}}</td> 
                    @else
                        <td>Inactivx</td>
                    @endif
                    <td>{{$player->gender}}</td>
                    <td>{{$player->date}}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="container text-center text-bg-light">
        @can('update', $player)
        <a href="/players/{{ $player->id }}/edit" class="btn btn-secondary btn-sm">Editar</a><br><br>
        @endcan
        <form action="{{ route('players.destroy', $player) }}" method="POST">
            @csrf
            @method('DELETE')
            @can('delete', $player)
            <button type="submit" class="btn btn-danger btn-sm"> Eliminar </button>
            @endcan
        </form><br>
    </div>
</body>
</html>
@extends('successMessage')