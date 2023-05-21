<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
        <title>Editar torneo</title>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
    var teamContainer = document.getElementById('team-container');
  
    @foreach($tournament->teams as $team)
        var teamGroup = document.createElement('div');
        teamGroup.classList.add('form-group', 'team-group');
      
        var select = document.createElement('select');
        select.name = 'teams[]';
        select.classList.add('form-control');
      
        var option = document.createElement('option');
        option.value = "{{ $team->id }}";
        option.text = "{{ $team->name }}";
        option.selected = true;
        select.appendChild(option);
      
        var removeButton = document.createElement('button');
        removeButton.type = 'button';
        removeButton.classList.add('btn', 'btn-danger', 'btn-sm', 'remove-team');
        removeButton.textContent = 'Eliminar';
      
        removeButton.addEventListener('click', function() {
            teamGroup.remove();
        });
      
        teamGroup.appendChild(select);
        teamGroup.appendChild(removeButton);
        teamContainer.appendChild(teamGroup);
    @endforeach
  
    var addButton = document.getElementById('add-team');
  
    addButton.addEventListener('click', function() {
        
        var teamGroup = document.createElement('div');
        teamGroup.classList.add('form-group', 'team-group');
      
        var select = document.createElement('select');
        select.name = 'teams[]';
        select.classList.add('form-control');
        
        @foreach($teams as $team)
        var option = document.createElement('option');
        option.value = "{{ $team->id }}";
        option.text = "{{ $team->name }}";
        select.appendChild(option);
        @endforeach

        var removeButton = document.createElement('button');
        removeButton.type = 'button';
        removeButton.classList.add('btn', 'btn-danger', 'btn-sm', 'remove-team');
        removeButton.textContent = 'Eliminar';
      
        removeButton.addEventListener('click', function() {
            teamGroup.remove();
        });
      
        teamGroup.appendChild(select);
        teamGroup.appendChild(removeButton);
        teamContainer.appendChild(teamGroup);
   
        
    });
  
    var removeButtons = document.getElementsByClassName('remove-team');
  
    Array.from(removeButtons).forEach(function(button) {
        button.addEventListener('click', function() {
            var teamGroup = button.parentNode;
            teamGroup.remove();
        });
    });
});


        </script>
    </head>
    <body>
        <div class="container text-center p-3 text-bg-light">
        <h1>Editar torneo</h1>
        <form action="{{ route('tournaments.update', $tournament) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="name" value="{{ $tournament->name }}">
            </div>
            <div id="team-container" class="mb-3">

            </div>
            <button type="button" class="btn btn-secondary btn-sm" id="add-team">Agregar equipo</button><br><br><br>
            <button type="submit" value="Enviar" class="btn btn-primary btn-sm">Guardar</button>
        </form>
        </div>
    </body>
</html>
@extends('navbar')
