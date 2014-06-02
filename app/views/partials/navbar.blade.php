<nav class="navbar navbar-fixed-top navbar-custom" role="navigation">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle"
            data-toggle="collapse" data-target="#my-navbar">
      <span class="sr-only">Toggle</span>
      <i class="fa fa-bars"></i>
    </button>
    <a class="navbar-brand" href="/">Pizarron</a>
  </div>

  <div class="collapse navbar-collapse" id="my-navbar">
    <ul class="nav navbar-nav">
      <li><a href="#">What's going on</a></li>
      <li><a href="#">My Courses</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      @if(!Auth::check())
        <li><a href="{{ url('login') }}">Log In</a></li>
        <li><a href="{{ url('register') }}">Register</a></li>
      @else
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            {{Auth::user()->email}} <b class="caret"></b>
          </a>
          <ul class="dropdown-menu">
            <li>
              <a href="{{url('profile')}}">
                <i class="fa fa-user"></i>&nbsp;
                Profile
              </a>
            </li>
            <li class="divider"></li>
            <li>
              <a href="{{url('course/create')}}">
                <i class="fa fa-book"></i>&nbsp;
                Create Course
              </a>
            </li>
            <li>
              <a href="{{url('organization/create')}}">
                <i class="fa fa-users"></i>&nbsp;
                Create Organization
              </a>
            </li>
            <li class="divider"></li>
            <li>
              <a href="{{url('logout')}}">
                <i class="fa fa-power-off"></i>&nbsp;
                Logout
              </a>
            </li>
          </ul>
        </li>
      @endif
    </ul>
  </div>
</nav>
