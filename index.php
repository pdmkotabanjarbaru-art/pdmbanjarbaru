<?php
session_start();

$halaman = $_GET['halaman'] ?? null;
$isLogin = $_SESSION['login'] ?? false;
$role    = $_SESSION['role'] ?? null;

// default halaman
if (!$isLogin) {
    $page = 'home_umum';
} else {
    $page = ($role === 'admin') ? 'home_admin' : 'home_user';
}

// jika ada parameter page
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>PDMKotaBanjarbaru</title>
    <link rel="icon" type="image/png" href="assets/img/muhammadiyah.png">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body id="page-top">

<?php
/* ===============================
   HOME UMUM (TANPA SIDEBAR)
   =============================== */
if ($page === 'home_umum') {

    include "umum/template/header.php";

    switch ($halaman) {
        case 'profil_pdm':
            include "umum/profil.php";
            break;
        case 'detail_berita':
            include "umum/detail.php";
            break;
        case 'aumpendidikan':
            include "umum/aumpendidikan.php";
            break;
        case 'programdakwah':
            include "umum/dakwah.php";
            break;

        default:
            include "umum/home.php";
            break;
    }

    include "umum/template/footer.php";
    exit; // penting!
}
?>

<!-- ===============================
     AREA LOGIN (PAKAI SIDEBAR)
     =============================== -->
<div id="wrapper">

    <?php include "template/sidebar.php"; ?>

    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">

            <?php include "template/header.php"; ?>

            <div class="container-fluid">
                <?php
                switch ($page) {

                    case 'home_admin':
                        include "admin/home.php";
                        break;

                    case 'home_user':
                        include "umum/home.php";
                        break;

                    // ===== PENGGUNA =====
                    case 'pengguna_tampil':
                        include "pengguna/tampil.php";
                        break;

                    case 'tambah_pengguna':
                        include "pengguna/tambah.php";
                        break;

                    case 'update_pengguna':
                        include "pengguna/edit.php";
                        break;

                    case 'edit_password':
                        include "pengguna/edit_password.php";
                        break;

                    case 'delete_pengguna':
                        include "pengguna/hapus.php";
                        break;

                    case 'tambah_berita':
                        include "admin/berita/tambah.php";
                        break;

                    case 'tampil_berita':
                        include "admin/berita/tampil.php";
                        break;

                    case 'edit_berita':
                        include "admin/berita/edit.php";
                        break;
                    case 'hapus_berita':
                        include "admin/berita/hapus.php";
                        break;

                    default:
                        include "admin/home.php";
                        break;
                }
                ?>
            </div>

            <?php include "template/footer.php"; ?>
        </div>
    </div>
</div>

<!-- JS -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="assets/js/sb-admin-2.min.js"></script>

</body>
</html>
