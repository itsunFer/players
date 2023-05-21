<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="Uma5d8i1YIA3u5OhtgeIftMbabmCCn0u7BqCefC9">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <title>Torneos</title>
</head>
<body>
    <div class="container text-center p-3 text-bg-light">
        @if (session('success'))
        <div id="success-message" class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
    <h1>Torneos</h1>
    <a href="/tournaments/create"class="btn btn-primary"> Agregar torneo</a><br><br>
    <div class="list-group">
        @foreach ($tournaments as $tournament)
        <a href="/tournaments/{{$tournament->id}}" class="list-group-item list-group-item-action">{{ $tournament->name}}</a>
        @endforeach
        {{$tournaments->links()}}
    </div>
    </div>
    <div class="container text-end p-3 text-bg-light">
        <x-logout-form />
    </div>
</body>
</html>
@extends('navbar')
@extends('successMessage')