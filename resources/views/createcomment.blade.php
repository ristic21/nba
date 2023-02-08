 <form class="container mb-5" action="{{ url('createcomment') }}" method="POST">
    @csrf
    <div class="mb-3">
      <textarea class="form-control" id="content" name="content" placeholder="Content" required></textarea>
        <input type="hidden" name="team_id" value="{{ $team->id }}">
    </div>
    <button type="submit" class="btn btn-primary">Create comment</button>
</form>

<div class="container">
  @include('components.session-handler')
  @include('components.error-handler')
</div>

