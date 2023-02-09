@extends('layout.default')


@section('content')
    <h1>News</h1>
    <br>
    <p class="h4">{{$news->title}}</p>
    <p>{{$news->content}}</p>
    <p>User: {{$news->user->name}}</p>
    <p>Email: {{$news->user->email}}</p>
    <br>

  
@endsection