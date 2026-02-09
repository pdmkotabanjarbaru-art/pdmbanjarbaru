<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tulis Berita</title>
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<div class="container mt-4">
    <h2 class="mb-4">Tulis Berita</h2>

    <form action="admin/berita/simpan.php" method="POST">
        <!-- Judul -->
        <div class="mb-3">
            <label class="form-label">Judul Berita</label>
            <input type="text" name="judul" class="form-control" required>
        </div>

        <!-- Editor -->
        <div class="mb-3">
            <label class="form-label">Isi Berita</label>
            <textarea name="isi" id="editor"></textarea>
        </div>

        <button type="submit" class="btn btn-success">
            Publish Berita
        </button>
        <a href="index.php?page=berita" class="btn btn-secondary">
            Batal
        </a>
    </form>
</div>

<script src="https://cdn.tiny.cloud/1/qg6hjqpr8yhzsh5gh3d52zrc5ikateg6tnh1wblnr98z9wpj/tinymce/6/tinymce.min.js"></script>
<script>
tinymce.init({
  selector: '#editor',
  height: 400,
  plugins: 'image link lists code table',
  toolbar: 'undo redo | bold italic | bullist numlist | image link | code',

  images_upload_handler: (blobInfo) => new Promise((resolve, reject) => {
      const xhr = new XMLHttpRequest();
      xhr.open('POST', 'http://localhost/pdmbanjarbaru/admin/berita/upload_gambar_berita.php');

      xhr.onload = () => {
          if (xhr.status !== 200) {
              reject('HTTP Error: ' + xhr.status);
              return;
          }

          const json = JSON.parse(xhr.responseText);

          if (!json || !json.location) {
              reject('Invalid JSON: ' + xhr.responseText);
              return;
          }

          resolve(json.location);
      };

      const formData = new FormData();
      formData.append('file', blobInfo.blob());

      xhr.send(formData);
  })
});
</script>




</body>
</html>
