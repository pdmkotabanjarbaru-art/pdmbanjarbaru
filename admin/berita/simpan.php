<?php
ob_start(); // ⬅️ buffer output (anti headers already sent)

require_once '../../koneksi.php';

try {

    $db = new Database();
    $conn = $db->getConnection();

    // ==========================
    // AMBIL DATA
    // ==========================
    $judul   = $_POST['judul'] ?? '';
    $isi     = $_POST['isi'] ?? '';
    $tanggal = date('Y-m-d');

    if (trim($judul) === '' || trim($isi) === '') {
        throw new Exception("Judul atau isi tidak boleh kosong");
    }

    // ==========================
    // GENERATE ID BRT-001
    // ==========================
    $cek = $conn->query("SELECT id_berita FROM berita ORDER BY id DESC LIMIT 1");
    $last = $cek->fetch(PDO::FETCH_ASSOC);

    if ($last && !empty($last['id_berita'])) {
        $nomor = (int) substr($last['id_berita'], 4);
        $nomor++;
    } else {
        $nomor = 1;
    }

    $id_berita = 'BRT-' . str_pad($nomor, 3, '0', STR_PAD_LEFT);

    // ==========================
    // SIMPAN DATABASE
    // ==========================
    $sql = "INSERT INTO berita (id_berita, judul, isi, tanggal)
            VALUES (:id_berita, :judul, :isi, :tanggal)";

    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':id_berita' => $id_berita,
        ':judul'     => $judul,
        ':isi'       => $isi,
        ':tanggal'   => $tanggal
    ]);

    // ==========================
    // REDIRECT
    // ==========================
    header("Location: ../../index.php?page=tampil_berita&status=success");
    exit;

} catch (Throwable $e) {

    echo "<h4>Gagal menyimpan berita</h4>";
    echo "<pre>".$e->getMessage()."</pre>";

}

ob_end_flush();
