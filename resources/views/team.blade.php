<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
    <h1>Team info</h1>
    <p class="h3">{{$team->name}}</p>
    <p>{{$team->city}}</p>
    <p>{{$team->adress}}</p>
    <p>{{$team->email}}</p>
    <br>
    <h3>Players</h3>
    @foreach ($players as $player)
        <a href="/players/{{$player->id}}">{{$player->first_name}} {{$player->last_name}}</a>
        
    @endforeach
</body>
</html>