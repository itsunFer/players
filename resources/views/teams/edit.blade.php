<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
        <title>Editar equipo</title>
    </head>
    <body>
        <div class="container text-center p-3 text-bg-light">
        <h1>Editar equipo</h1>
        <form action="{{ route('teams.update', $team)}}" method="POST" enctype="multipart/form-data">
            @method('PATCH')
                <label for="image" class="form-label">Logo</label>
                <div>
                    <img src="{{ asset('storage/' . $team->image) }}" alt="Current Image">
                </div>
                <input type="hidden" name="current_image" value="{{ $team->image }}">
                <input type="file" name="image" id="image" accept="image/*" class="form-control" value="{{ $team->image }}">
            @error('image')
                <h4>{{ $message }}</h4>
            @enderror
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="name" value="{{ $team->name }}">
            </div>
            <button type="submit" value="Enviar" class="btn btn-primary btn-sm">Guardar</button>
        </form>
        </div>
    </body>
</html>
@extends('navbar')