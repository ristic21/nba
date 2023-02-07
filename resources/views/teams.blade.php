@extends('layout.default')


@section('content')

    
    <div class="container">
        <h1>Teams</h1>
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


@endsection