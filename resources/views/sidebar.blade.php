<aside style="position:absolute; left:1100px; top:250px">
    <h4>News</h4>
    @foreach ($teamsSidebar as $team)
       <li><a href="news/team/{{$team->name}}">{{$team->name}}</a></li> 
    @endforeach
</aside>