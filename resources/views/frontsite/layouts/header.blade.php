<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <a href="index.html" class="logo me-auto"><img src="{{ asset('Logo-Ibnu-Qayyim/Logo Horizontal.png') }}" alt=""></a>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <h1 class="logo me-auto"><a href="index.html">Medicio</a></h1> -->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto " href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">Tentang Kami</a></li>
          <li><a class="nav-link scrollto" href="#services">Pendidikan</a></li>
          <li><a class="nav-link scrollto" href="#departments">Dakwah</a></li>
          <li><a class="nav-link scrollto" href="#doctors">Guru</a></li>
          <li class="dropdown"><a href="#"><span>Informasi</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Pendaftaran</a></li>
              <li class="dropdown"><a href="#"><span>Lainnya</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="#contact">Kontak</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="{{ route('register') }}" class="appointment-btn scrollto"><span class="d-none d-md-inline">Daftar</span> Sekarang</a>
      @if (!auth()->check())
      <a href="{{ route('login') }}" class="appointment-btn scrollto"><span class="d-none d-md-inline">Login</span></a>
      @endif

    </div>
  </header>
