@extends('layout.default')


@section('content')

    <form class="container mb-5" action="{{ url('signup') }}" method="POST">
        @csrf
        <div class="mb-3">
          <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
        </div>
        <div class="mb-3">
          <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
        </div>
        <div class="mb-3">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
          </div>
        
    
    
        <button type="submit" class="btn btn-primary">Sign up</button>
    </form>
    
    <div class="container">
        @include('components.session-handler')
        @include('components.error-handler')
    </div>

    @endsection