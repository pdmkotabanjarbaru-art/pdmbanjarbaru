<?php
include_once 'koneksi.php';

$db = new Database();
$conn = $db->getConnection();

$id = $_GET['id'] ?? 0;

$stmt = $conn->prepare("SELECT * FROM berita WHERE id=:id");
$stmt->execute(['id'=>$id]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);

if(!$data){
    echo "Berita tidak ditemukan";
    exit;
}
?>

<h3>Edit Berita</h3>

<form action="berita/update.php" method="POST">
<input type="hidden" name="id" value="<?= $data['id']; ?>">

<div class="mb-3">
    <label>Judul</label>
    <input type="text" name="judul" class="form-control"
           value="<?= htmlspecialchars($data['judul']); ?>" required>
</div>

<div class="mb-3">
    <label>Isi Berita</label>
    <textarea name="isi" id="editor">
<?= htmlspecialchars($data['isi']); ?>
</textarea>
</div>

<button class="btn btn-primary">Update</button>
<a href="index.php?page=tampil_berita" class="btn btn-secondary">Batal</a>

</form>

<!-- TinyMCE -->
<script src="https://cdn.tiny.cloud/1/qg6hjqpr8yhzsh5gh3d52zrc5ikateg6tnh1wblnr98z9wpj/tinymce/6/tinymce.min.js"></script>

<script>
tinymce.init({
  selector:'#editor',
  height:400,
  plugins:'image link lists code table',
  toolbar:'undo redo | bold italic | bullist numlist | image link | code',
  images_upload_url:'http://localhost/pdmbanjarbaru/admin/berita/upload_gambar_berita.php'
});
</script>
