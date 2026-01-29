<?php
session_start();

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
</head>

<body id="page-top">

<?php
/* ===============================
   HOME UMUM (TANPA SIDEBAR)
   =============================== */
if ($page === 'home_umum') {
    include "umum/template/header.php";
    include "umum/home.php";
    include "umum/template/footer.php";
    return;
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
