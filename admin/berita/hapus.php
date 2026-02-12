<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/pdmbanjarbaru/koneksi.php';

$db = new Database();
$conn = $db->getConnection();

$id = $_GET['id'] ?? 0;

if($id == 0){
    echo "<script>window.location.href='index.php?page=tampil_berita';</script>";
    exit;
}

/* ambil isi berita */
$stmt = $conn->prepare("SELECT isi FROM berita WHERE id=?");
$stmt->execute([$id]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);

/* hapus gambar dalam konten */
if($data){
    preg_match_all('/src="([^"]+)"/', $data['isi'], $matches);
    foreach($matches[1] as $img){
        $path = $_SERVER['DOCUMENT_ROOT'] . parse_url($img, PHP_URL_PATH);
        if(file_exists($path)){
            unlink($path);
        }
    }
}

/* hapus data */
$stmt = $conn->prepare("DELETE FROM berita WHERE id=?");
$stmt->execute([$id]);

echo "<script>
    window.location.href='index.php?page=tampil_berita&status=deleted';
</script>";
exit;
