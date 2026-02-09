<?php
include_once 'koneksi.php';

$db = new Database();
$conn = $db->getConnection();

$id = $_GET['id'] ?? 0;

$stmt = $conn->prepare("SELECT * FROM berita WHERE id = :id");
$stmt->execute([':id' => $id]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$data) {
    echo "<div class='alert alert-danger'>Berita tidak ditemukan.</div>";
    exit;
}
?>

<div class="container mt-4">

    <h2><?= htmlspecialchars($data['judul']); ?></h2>

    <p class="text-muted">
        Dipublikasikan pada 
        <?= date('d M Y', strtotime($data['tanggal'])); ?>
    </p>

    <hr>

    <!-- ISI BERITA -->
    <div class="berita-isi">
        <?= str_replace(
            'src="../admin',
            'src="http://localhost/pdmbanjarbaru/admin',
            $data['isi']
        ); ?>
    </div>

    <hr>

    <a href="index.php" class="btn btn-secondary">
        ← Kembali
    </a>

</div>

<style>
.berita-isi img {
    max-width: 100%;
    height: auto;
    display: block;
    margin: 15px auto;
}
</style>

