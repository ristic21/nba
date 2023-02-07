@extends('layout.default')


@section('content')
<div class="container">
    <p><span style="font-weight: bold">Name: </span>{{$player->first_name}} {{$player->last_name}}</p>
    
    <p><span style="font-weight: bold">Email: </span>{{$player->email}}</p>
    <a class="button" href="/teams/{{$player->team_id}}">Back</a>
</div>
   
    
@endsection