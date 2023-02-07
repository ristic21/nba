@extends('layout.default')


@section('content')
    <h1>Team info</h1>
    <br>
    <p class="h4">Team: {{$team->name}} from {{$team->city}}</p>
    <p>Adress: {{$team->address}}</p>
    <p>Email: {{$team->email}}</p>
    <br>
    <h3>Players</h3>
    @foreach ($players as $player)
        <a href="/players/{{$player->id}}">{{$player->first_name}} {{$player->last_name}}</a>
        
    @endforeach
@endsection