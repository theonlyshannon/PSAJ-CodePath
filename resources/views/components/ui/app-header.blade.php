<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <a class="navbar-brand" href="{{ route('app.dashboard') }}">
    <img src="{{ asset('app/image/logo-codepath.png') }}" alt="Logo" />
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('app.dashboard') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('app.about') }}">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('app.course.index') }}">Kelas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('app.article.index') }}">Artikel</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('app.cart.index') }}">Keranjang</a>
        </li>
        @guest
          <li class="nav-item">
            <a href="{{ route('login') }}" class="btn btn-custom ms-2">Login</a>
          </li>
        @else
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{ $student->name ?? Auth::user()->email }}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              @role('admin')
                <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">Dashboard Admin</a></li>
              @else
                <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">Kelas Saya</a></li>
              @endrole
              <li><hr class="dropdown-divider"></li>
              <li>
                <form action="{{ route('logout') }}" method="POST">
                  @csrf
                  <button type="submit" class="dropdown-item">Logout</button>
                </form>
              </li>
            </ul>
          </li>
        @endguest
      </ul>
    </div>
  </nav>