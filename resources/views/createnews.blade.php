
<form class="container mb-5" action="{{ url('createnews') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col">
            <input type="text" name="title" placeholder="Title">
        </div>
        <div class="col">
            <textarea class="form-control" id="content" name="content" placeholder="Content" required></textarea>
        </div>
       <div class="row">
        <p class="text muted">ASSOCIETED TEAMS</p>
        @foreach ($teams as $team)
            <div class="col">
                <label>{{$team->name}}</label>
                <input type="checkbox" name="teamIds[]" value="{{$team->id}}" >
            </div>
        @endforeach
       </div>
        
    </div>
    <button type="submit" class="btn btn-primary">Create news</button>
</form>

<div class="container">
  @include('components.session-handler')
  @include('components.error-handler')
</div>

