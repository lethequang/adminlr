  <div class="sidebar-header">
      <div class="user-pic">
     @if(Auth::check())
        <img class="img-responsive img-rounded" src="{{ asset('images/staff/'.Auth::user()->images)}}">
    </div>
    <div class="user-info">
      <span class="user-name"><!-- Jhon -->
          <strong>{{Auth::user()->name}}</strong>
      </span>
      
      <span class="user-role">
        @if(Auth::user()->is_root == 1)
        {{'Administrator'}}
        @else 
         {{'Member'}}
        @endif
      </span>
      <span class="user-status">
          <i class="fa fa-circle"></i>
          <span>Online</span>
      </span>
      @endif
  </div>
</div>