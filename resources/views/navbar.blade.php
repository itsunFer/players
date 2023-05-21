<!DOCTYPE html>
<html>
<head>
    <title>Navbar</title>
    <style>
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: #F0EAD6;
            z-index: 100; 
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .navbar ul {
            display: flex;
            justify-content: center; 
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        .navbar li {
            display: inline-block;
            text-align: center;
        }

        .navbar li a {
            display: block;
            color: #555;
            padding: 14px 16px;
            text-decoration: none;
        }

        .navbar li a:hover {
            background-color: #D5E8D4; /* Pastel green */
        }

        body {
            padding-top: 60px;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <ul>
            <li><a href="{{ route('players.index') }}">Jugadores</a></li>
            <li><a href="{{ route('teams.index') }}">Equipos</a></li>
            <li><a href="{{ route('tournaments.index') }}">Torneos</a></li>
        </ul>
    </div>
</html>
