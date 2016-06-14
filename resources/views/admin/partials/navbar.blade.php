<ul class="nav navbar-nav">
    <li><a href="/">Accueil du site</a></li>
    @if (Auth::check())
    <li @if (Request::is('admin/post*')) class="active" @endif><a href="/admin/post">Articles</a></li>
    <li @if (Request::is('admin/tag*')) class="active" @endif><a href="/admin/tag">Tags</a></li>
    <li @if (Request::is('admin/upload*')) class="active" @endif><a href="/admin/upload">Uploads</a></li>
    <li @if (Request::is('admin/artists*')) class="active" @endif><a href="/admin/upload">Artistes</a></li>
    @endif
</ul>

<ul class="nav navbar-nav navbar-right">
  @if (Auth::guest())
    <li><a href="/auth/login">Login</a></li>
  @else
    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
         aria-expanded="false">{{ Auth::user()->name }}
        <span class="caret"></span>
      </a>
      <ul class="dropdown-menu" role="menu">
        <li><a href="/auth/logout">Logout</a></li>
      </ul>
    </li>
  @endif
</ul>
