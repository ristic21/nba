@extends('layout.default')


@section('content')

    
    <div class="container">
        <h1>News</h1>
        <div class="col m-3 border p-2" style="padding=15px">

            @foreach ($news as $element)
                <p class="h4">{{$element->title}}</p>
                <p class="text-muted">{{$element->content}}</p>
                <p class="text-muted">Written by: {{$element->user->name}}</p>
                <a class="button" href="/news/{{$element->id}}">Show news</a>
                <br>
            @endforeach

        </div>
       
        @include('newsPagination')
    </div>


@endsection