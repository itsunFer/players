@extends('navbar')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <title>Agregar jugador</title>
</head>
<body>
    <div class="container text-center p-3 text-bg-light">
    <h1>Nuevo jugador</h1>
    <a href="/players" class="btn btn-warning btn-sm" > Salir</a><br>

    <form action="/players" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
        </div>
        @error('name')
            <h4>{{ $message }}</h4>
        @enderror
        <div class="mb-3">
            <label for="team_id" class="form-label">Equipo</label>
            <select class="form-control" name="team_id"value="{{ old('team_id') }}">
                <option value="">Seleccionar equipo: </option>
                @foreach($teams as $team)
                <option value="{{ $team->id }}">{{ $team->name }}</option>
                @endforeach
            </select>
        </div>
        @error('team_id')
            <h4>{{ $message }}</h4>
        @enderror
        <div class="mb-3">
            <label for="gender" class="form-label">Genero</label>
            <input type="text" class="form-control" name="gender"value="{{ old('gender') }}">
        </div>
        @error('gender')
            <h4>{{ $message }}</h4>
        @enderror
        <div class="mb-3">
            <label for="date" class="form-label">Fecha de ingreso</label>
            <input type="date" class="form-control" name="date"value="{{ old('date') }}">
        </div>
        @error('date')
            <h4>{{ $message }}</h4>
        @enderror
        <button type="submit" value="Enviar" class="btn btn-primary btn-sm">Enviar</button>

    </form>
    </div>
</body>
</html>