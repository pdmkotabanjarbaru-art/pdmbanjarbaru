    <?php
    include_once 'koneksi.php';

try {
    $db = new Database();
    $conn = $db->getConnection();

     // query ambil berita terbaru
    $query = "SELECT * FROM berita ORDER BY tanggal DESC";
    $stmt = $conn->prepare($query);
    $stmt->execute();

    $berita = $stmt->fetchAll(PDO::FETCH_ASSOC);


} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
    ?>
    <style>
        body { font-family: 'Segoe UI', Tahoma, sans-serif; }
        .hero { background: linear-gradient(135deg, #0d6efd, #198754); color: #fff; padding: 80px 20px; }
        .hero h1 { font-weight: 700; }
        .section-title { font-weight: 600; margin-bottom: 20px; }
        footer { background: #f8f9fa; padding: 20px 0; font-size: 14px; }
    </style>


<!-- Hero Section -->
<section class="hero text-center">
    <div class="container">
        <h1>Selamat Datang di PD Muhammadiyah Kota Banjarbaru</h1>
        <p class="lead mt-3">Gerakan Islam Berkemajuan untuk Mewujudkan Masyarakat Islam yang Sebenar-benarnya</p>
    </div>
</section>

<!-- Program & Amal Usaha -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="section-title">Program & Amal Usaha Muhammadiyah</h2>
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Bidang Pendidikan</h5>
                        <p class="card-text">Mengelola dan mengembangkan sekolah serta lembaga pendidikan Muhammadiyah di Kota Banjarbaru.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Bidang Sosial & Kesehatan</h5>
                        <p class="card-text">Melayani umat melalui kegiatan sosial, kemanusiaan, dan layanan kesehatan.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Bidang Dakwah</h5>
                        <p class="card-text">Menyebarkan nilai-nilai Islam melalui pengajian, pembinaan umat, dan media dakwah.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Berita -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="section-title mb-3">Berita & Informasi</h2>
        <p class="mb-4">
            Informasi terbaru seputar kegiatan, agenda, dan pengumuman
            PD Muhammadiyah Kota Banjarbaru.
        </p>

        <div class="row">
    <?php if (!empty($berita)): ?>
        <?php foreach ($berita as $row): ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?= htmlspecialchars($row['judul']); ?>
                        </h5>
                        <small class="text-muted">
                            <?= date('d M Y', strtotime($row['tanggal'])); ?>
                        </small>
                    </div>
                    <div class="card-footer bg-white border-0">
                        <a href="index.php?halaman=detail_berita&id=<?= $row['id']; ?>" 
                           class="btn btn-sm btn-success">
                            Baca Selengkapnya
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="col-12">
            <div class="alert alert-info">
                Belum ada berita yang dipublikasikan.
            </div>
        </div>
    <?php endif; ?>
</div>


        <div class="text-center mt-4">
            <a href="index.php?page=berita" class="btn btn-success">
                Lihat Semua Berita
            </a>
        </div>
    </div>
</section>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
