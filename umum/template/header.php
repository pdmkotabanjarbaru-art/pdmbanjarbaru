<!-- Top Header Info -->
<div class="top-header bg-light py-2">
  <div class="container d-flex justify-content-between align-items-center">
    <small class="text-muted">
      <?php
        date_default_timezone_set("Asia/Makassar");
        echo "Hari ini: " . date("l, d F Y");
      ?>
    </small>
    <small class="text-success fw-semibold">
      Sekretariat PD Muhammadiyah Kota Banjarbaru
    </small>
  </div>
</div>


<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-success shadow-sm">
  <div class="container">

    <!-- Logo + Brand (dibatasi lebarnya) -->
        <a class="navbar-brand d-flex align-items-center" href="index.php">
          <div class="logo-box mr-3">
              <img src="assets/img/muhammadiyah.png"
                  alt="Logo Muhammadiyah">
            </div>

            <div class="brand-text lh-sm">
              <span class="fw-bold d-block text-white">PD Muhammadiyah</span>
              <small class="text-warning">Kota Banjarbaru</small>
            </div>

          </a>

    <!-- Toggle -->
    <button class="navbar-toggler" type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Menu BENAR-BENAR KE KANAN -->
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">

      <ul class="navbar-nav align-items-lg-center">

        <li class="nav-item">
          <a class="nav-link" href="index.php">Beranda</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="index.php?halaman=profil_pdm">Profil</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#">Berita</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#">Kontak</a>
        </li>

        <!-- Login paling kanan -->
        <li class="nav-item ms-lg-4 mt-3 mt-lg-0">
          <a class="btn btn-outline-light btn-sm px-3" href="?page=login">
            <i class="fa-regular fa-user me-1"></i> Login
          </a>
        </li>

      </ul>

    </div>

  </div>
</nav>