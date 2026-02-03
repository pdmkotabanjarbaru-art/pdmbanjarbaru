
<ul class="navbar-nav sidebar accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="?page=home">
        <div class="sidebar-brand-icon">
            <img src="assets/img/muhammadiyah.png" alt="Logo Muhammadiyah"
                style="height: 40px; width: auto; background-color: white; padding: 5px; border-radius: 20px;">
        </div>
        <div class="sidebar-brand-text mx-3">PDMbjb</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="?page=home">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Home</span>
        </a>
    </li>

    <!-- DATA I -->
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Data I
    </div>


        <!-- ROLE UMUM -->
        <li class="nav-item <?= $currentPage == 'tampil_berita' ? 'active' : '' ?>">
            <a class="nav-link <?= $currentPage == 'tampil_berita' ? 'active' : '' ?>" href="?page=tampil_berita">
                <i class="fas fa-fw fa-building"></i>
                <span>Berita</span>
            </a>
        </li>

        <!-- DATA PENGGUNA -->
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Data Pengguna
        </div>

        <li class="nav-item <?= $currentPage == 'pengguna_tampil' ? 'active' : '' ?>">
            <a class="nav-link <?= $currentPage == 'pengguna_tampil' ? 'active' : '' ?>" href="?page=pengguna_tampil">
                <i class="fas fa-users fa-fw mr-2"></i>
                <span class="d-inline-flex align-items-center">
                    Pengguna
                    <?php if (($role == 'admin' && $jumlahpenggunaDiajukan > 0) || ($role == 'superadmin' && $jumlahpenggunaDiajukan > 0)): ?>
                        <span class="position-relative ml-2">
                            <i class="fas fa-bell text-light"></i>
                            <span class="badge badge-success badge-counter position-absolute" style="top: -5px; right: -8px;">
                                <?= $jumlahpenggunaDiajukan; ?>
                            </span>
                        </span>
                    <?php endif; ?>
                </span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">


    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>