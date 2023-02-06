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

    <h1>Teams</h1>
    <div class="container">

        <div class="col m-3 border p-2" style="padding=15px">

            @foreach ($teams as $team)
                <p class="h4">{{$team->name}}</p>
                <p class="text-muted">{{$team->city}}</p>
                <p class="text-muted">{{$team->adress}}</p>
                <a class="button" href="/teams/{{$team->id}}">Show team</a>
                <br>
            @endforeach

        </div>
       
        @include('pagination')
    </div>







</body>
</html>