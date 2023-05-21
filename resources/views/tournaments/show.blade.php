<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <title>Torneo {{ $tournament->id }}</title>
</head>
<body>
    <div class="container text-center p-3 text-bg-light" >
        @if (session('success'))
        <div id="success-message" class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
    <h1> {{ $tournament->name }}</h1>
    <br>
    <a href="/tournaments" class="btn btn-primary btn-sm">Inicio</a><br>
    </div>
    <div class="container table-responsive text-bg-light">
        <h3>Equipos</h3>
        <table class="table">
            <thead class="table-primary">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tournament->teams as $team)
                <tr>
                    <td><a href="../teams/{{ $team->id }}">{{ $team->id }}</a></td>
                    <td><a href="../teams/{{ $team->id }}">{{ $team->name }}</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="container text-center text-bg-light">
        @can('update', $tournament)
        <a href="/tournaments/{{ $tournament->id }}/edit" class="btn btn-secondary btn-sm">Editar</a><br><br>
        @endcan
        <form action="{{ route('tournaments.destroy', $tournament) }}" method="POST">
            @csrf
            @method('DELETE')
            @can('delete', $tournament)
            <button type="submit" class="btn btn-danger btn-sm"> Eliminar </button>
            @endcan
        </form><br>
    </div>
</body>
</html>
@extends('navbar')
@extends('successMessage')