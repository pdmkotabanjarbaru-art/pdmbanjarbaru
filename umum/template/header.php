<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-success">
  <div class="container">

    <!-- Logo + Brand -->
  <a class="navbar-brand d-flex align-items-center" href="?page=home_umum">
  <div class="logo-box me-2">
    <img src="assets/img/muhammadiyah.png" 
         alt="Logo Muhammadiyah">
  </div>
  <span>PD Muhammadiyah Banjarbaru</span>
</a>

    <!-- Toggle -->
    <button class="navbar-toggler" type="button" 
            data-bs-toggle="collapse" 
            data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Menu -->
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link active" href="?page=home_umum">Beranda</a></li>
        <li class="nav-item"><a class="nav-link" href="?halaman=profil_pdm">Profil</a></li>
        <li class="nav-item"><a class="nav-link" href="#">AUM</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Berita</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Kontak</a></li>
        <li class="nav-item"><a class="nav-link" href="?page=login">Login</a></li>
      </ul>
    </div>
  </div>
</nav>


<style>
.logo-box {
    background: #ffffff;
    padding: 6px;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.logo-box img {
    width: 35px;
    height: 35px;
    object-fit: contain;
}
</style>