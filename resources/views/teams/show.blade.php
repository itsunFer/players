<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <title>{{ $team->name }}</title>
</head>
<body>
    <div class="container text-center p-3 text-bg-light" >
        @if (session('success'))
        <div id="success-message" class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
    <h1> {{ $team->name }}</h1>
    @if(!$team->image)
        <img src="{{ asset('storage/teams/download.png') }}" alt="Team Image" style="width: 150px; height: 150px;">
    @else
        <img src="{{ asset('storage/' . $team->image) }}" alt="Team Image" style="width: 150px; height: 150px;">
    @endif
    </div>
    <div class="container table-responsive text-bg-light">
        <h5>Jugadores</h5>
        
        <table class="table">
            <thead class="table-primary">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                </tr>
            </thead>
            <tbody>
                @foreach($players as $player)
                @if ($player->team)
                    @if($player->team->id == $team->id)
                        <tr>
                            <td>{{$player->id}}</td>
                            <td>{{$player->name}}</td>
                        </tr>
                    @endif
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="container text-center text-bg-light">
        @can('update', $team)
        <a href="/teams/{{ $team->id }}/edit" class="btn btn-secondary btn-sm">Editar</a><br><br>
        @endcan
    </div>
    <div class="container text-center text-bg-light" >
        <form action="{{ route('teams.destroy', $team) }}" method="POST">
            @csrf
            @method('DELETE')
            @can('delete', $team)
            <button type="submit" class="btn btn-danger btn-sm"> Eliminar </button>]
            @endcan
        </form>
    </div>
    <div class="container text-left text-bg-light">
    <a href="/teams" class="btn btn-primary btn-sm">Volver a equipos</a><br>
    </div>
</body>
</html>
@extends('navbar')
@extends('successMessage')