<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <title>Agregar torneo</title>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var addButton = document.getElementById('add-team');
            var teamContainer = document.getElementById('team-container');
            var teamTemplate = document.getElementById('team-template');
    
            addButton.addEventListener('click', function() {
                var teamGroup = teamTemplate.cloneNode(true);
                teamGroup.id = ''; // Remove the "team-template" ID from the cloned group
                teamGroup.classList.remove('d-none'); // Show the cloned group
    
                var removeButton = teamGroup.querySelector('.remove-team');
                removeButton.addEventListener('click', function() {
                    teamGroup.remove();
                });
    
                teamContainer.appendChild(teamGroup);
            });
    
            var removeButtons = document.getElementsByClassName('remove-team');
            Array.from(removeButtons).forEach(function(button) {
                button.addEventListener('click', function() {
                    var teamGroup = button.closest('.team-group');
                    if (teamGroup.parentNode.children.length > 1) {
                        teamGroup.remove();
                    }
                });
            });
        });
    </script>
    
    
</head>
<body>
    <div class="container text-center p-3 text-bg-light">
    <h1>Nuevo torneo</h1>
    <a href="/tournaments" class="btn btn-warning btn-sm" > Salir</a><br><br>

    <form action="/tournaments" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
        </div>
        <div id="team-template" class="d-none">
            <div class="form-group team-group">
                <label for="teams[]" class="form-label">Elegir MINIMO dos equipos</label>
                <select name="teams[]" class="form-control">
                    @foreach($teams as $team)
                        <option value="{{ $team->id }}">{{ $team->name }}</option>
                    @endforeach
                </select>
                <button type="button" class="btn btn-danger btn-sm remove-team">Eliminar</button>
            </div>
        </div>
        
        <div class="mb-3" id="team-container">
            <button type="button" class="btn btn-secondary btn-sm" id="add-team">Agregar equipo</button>
        </div>
        @error('name')
            <h4>{{ $message }}</h4>
        @enderror
        @error('teams[]')
            <h4>{{ $message }}</h4>
        @enderror
        <button type="submit" value="Enviar" class="btn btn-primary btn-sm">Enviar</button>

    </form>
    </div>
</body>
</html>
@extends('navbar')