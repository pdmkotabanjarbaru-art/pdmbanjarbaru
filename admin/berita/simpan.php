<?php
include_once 'koneksi.php';

try {
    $db = new Database();
    $conn = $db->getConnection();

    $judul   = $_POST['judul'];
    $isi     = $_POST['isi'];
    $tanggal = date('Y-m-d');

    
    if ($judul == '' || $isi == '') {
        die("Judul atau isi tidak boleh kosong");
    }

    // 🔹 Generate ID BERITA (BRT-001)
    $cek = $conn->query("SELECT id_berita FROM berita ORDER BY id DESC LIMIT 1");
    $last = $cek->fetch(PDO::FETCH_ASSOC);

    if ($last && !empty($last['id_berita'])) {
        $nomor = (int) substr($last['id_berita'], 4);
        $nomor++;
    } else {
        $nomor = 1;
    }

    $id_berita = 'BRT-' . str_pad($nomor, 3, '0', STR_PAD_LEFT);

    // 🔹 Simpan ke database
    $sql = "INSERT INTO berita (id_berita, judul, isi, tanggal)
            VALUES (:id_berita, :judul, :isi, :tanggal)";

    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':id_berita' => $id_berita,
        ':judul'     => $judul,
        ':isi'       => $isi,
        ':tanggal'   => $tanggal
    ]);

    header("Location: index.php?page=berita&status=success");
    exit;

} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
