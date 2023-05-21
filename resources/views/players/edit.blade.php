@extends('navbar')
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
        <title>Editar jugador</title>
    </head>
    <body>
        <div class="container text-center p-3 text-bg-light">
        <h1>Editar jugador</h1>
        <form action="{{ route('players.update', $player) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="name" value="{{ $player->name }}">
            </div>
            @error('name')
                <h4>{{ $message }}</h4>
            @enderror
            <div class="mb-3">
                <label for="team_id" class="form-label">Equipo</label>
                <select class="form-control" name="team_id">
                @if($player->team)
                    <option value="{{ $player->team->id }}">{{ $player->team->name }}</option>
                @endif   
                    @foreach($teams as $team)
                    @if($team)
                    <option value="{{ $team->id }}">{{ $team->name }}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            @error('team_id')
                <h4>{{ $message }}</h4>
            @enderror
            <div class="mb-3">
                <label for="gender" class="form-label">Genero</label>
                <input type="text" class="form-control" name="gender" value="{{ $player->gender }}">
            </div>
            @error('gender')
                <h4>{{ $message }}</h4>
            @enderror
            <div class="mb-3">
                <label for="date" class="form-label">Fecha de ingreso</label>
                <input type="date" class="form-control" name="date" value="{{ $player->date }}">
            </div>
            @error('date')
                <h4>{{ $message }}</h4>
            @enderror
            <button type="submit" value="Enviar" class="btn btn-primary btn-sm">Guardar</button>
        </form>
        </div>
    </body>
</html>

