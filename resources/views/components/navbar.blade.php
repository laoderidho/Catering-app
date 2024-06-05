<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary">
  <!-- Container wrapper -->
  <div class="container-fluid">
    <!-- Toggle button -->
    <button
      data-mdb-collapse-init
      class="navbar-toggler"
      type="button"
      data-mdb-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Navbar brand -->
      <a class="navbar-brand mt-2 mt-lg-0" href="#">
        <p class="h3 text-primary text-bold">My Catering</p>
      </a>
      <!-- Left links -->
      @if(Auth::user()->roleId == 1)
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link" href="#">Dashboard</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Produk Saya</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Penjualan</a>
            </li>
        </ul>
      @else
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link" href="#">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Keranjang</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Produk Yang di pesan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Riwayat</a>
            </li>
        </ul>
      @endif
      <!-- Left links -->

    </div>
    <!-- Collapsible wrapper -->

    <!-- Right elements -->
    <div class="d-flex align-items-center">
      <!-- Icon -->
      <p class="h3 text-primary">{{ Auth::user()->name }}</p>
      <form method="POST" action="{{ route('auth.logout') }}">
        @csrf
        <button type="submit" class="btn btn-primary m-3">Logout</button>
      </form>
    </div>
    <!-- Right elements -->

  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->
