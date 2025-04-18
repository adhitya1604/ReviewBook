<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm py-3">
  <div class="container">
    <!-- Brand -->
    <a class="navbar-brand fw-bold text-primary d-flex align-items-center" href="/">
      <i class="bi bi-journal-bookmark-fill me-2 fs-4"></i> PERPUSTAKAAN
    </a>

    <!-- Mobile Toggle -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar Content -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <!-- Center Menu -->
      <ul class="navbar-nav mx-auto mb-2 mb-lg-0 gap-3">
        @guest
        <li class="nav-item">
          <a class="nav-link fw-semibold {{ request()->is('/') ? 'active text-primary' : 'text-dark' }} transition-all"
            href="/">Home</a>
        </li>
        @endguest
        @auth
        <li class="nav-item">
          <a class="nav-link fw-semibold {{ request()->is('welcome') ? 'active text-primary' : 'text-dark' }} transition-all"
            href="/welcome">Home</a>
        </li>
        @endauth
        <li class="nav-item">
          <a class="nav-link fw-semibold {{ request()->is('book') ? 'active text-primary' : 'text-dark' }} transition-all"
            href="/book">Book</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fw-semibold {{ request()->is('genre') ? 'active text-primary' : 'text-dark' }} transition-all"
            href="/genre">Genre</a>
        </li>
      </ul>

      <!-- Right Side Auth -->
      <div class="d-flex align-items-center gap-3">
        @guest
          <a href="{{ route('login') }}" class="btn btn-outline-primary fw-semibold px-4 py-2 rounded-pill transition-all">
            Login
          </a>
          <a href="{{ route('register') }}" class="btn btn-primary fw-semibold px-4 py-2 rounded-pill transition-all">
            Register
          </a>
        @endguest

        @auth
          <!-- User Name -->
          <a href="/profile" class="btn btn-primary fw-semibold rounded-pill d-flex align-items-center">
            <i class="bi bi-person-circle me-1"></i>{{ Auth()->user()->name }}
          </a>
          

          <!-- Logout Button -->
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="ms-2">
            @csrf
            <button type="submit" class="btn btn-danger fw-semibold px-4 py-2 rounded-pill transition-all">
              <i class="bi bi-box-arrow-right me-1"></i>Logout
            </button>
          </form>
        @endauth
      </div>
    </div>
  </div>
</nav>
