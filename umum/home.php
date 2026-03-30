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


<!-- Hero Section -->
<!-- Hero -->
<section class="hero text-center">
    <div class="container">
        <h1>Selamat Datang di PD Muhammadiyah Kota Banjarbaru</h1>
        <p class="lead mt-3">
            Gerakan Islam Berkemajuan untuk Mewujudkan Masyarakat Islam yang Sebenar-benarnya
        </p>
    </div>
</section>

<!-- Program & Amal Usaha -->
<section class="py-5">
    <div class="container">
        <h2 class="section-title">Program & Amal Usaha Muhammadiyah</h2>

        <div class="row">

            <div class="col-md-4 mb-4">
                <a href="index.php?halaman=aumpendidikan" class="text-decoration-none text-dark">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Bidang Pendidikan</h5>
                            <p class="card-text">
                                Mengelola dan mengembangkan sekolah serta lembaga pendidikan Muhammadiyah.
                            </p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-4 mb-4">
                <a href="index.php?halaman=programdakwah" class="text-decoration-none text-dark">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Bidang Dakwah</h5>
                            <p class="card-text">
                                Menyebarkan nilai-nilai Islam melalui pembinaan umat dan media dakwah.
                            </p>
                        </div>
                    </div>
                </a>
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

        <?php
            function getThumbnail($html) {
                preg_match('/<img.+src=["\'](.+?)["\'].*>/i', $html, $matches);
                return $matches[1] ?? null;
            }
            ?>

        <div class="row">
<?php if (!empty($berita)): ?>
    <?php foreach ($berita as $row): ?>

        <?php 
            $thumbnail = getThumbnail($row['isi']); 
        ?>

        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">

                <?php if ($thumbnail): ?>
                    <img src="<?= $thumbnail; ?>" 
                         class="card-img-top"
                         style="height:200px; object-fit:cover;">
                <?php endif; ?>

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
            <a href="index.php?halaman=berita" class="btn btn-success">
                Lihat Semua Berita
            </a>
        </div>
    </div>
</section>

<!-- Lokasi Sekretariat -->
<section class="py-5">
    <div class="container">
        <h2 class="section-title text-center mb-4">Lokasi Sekretariat</h2>

        <div class="row align-items-center">
            
            <!-- Informasi Alamat -->
            <div class="col-md-5 mb-4">
                <h5>Sekretariat PD Muhammadiyah Kota Banjarbaru</h5>
                <p>
                    Beralamat di:<br>
                    Komplek Masjid Hj. Nuriyah Jl. A.Yani Km. 32 <br>
                    Loktabat Banjarbaru – Kalimantan Selatan
                </p>

                <a href="https://www.google.com/maps/search/Masjid+Hj.+Nurriyah+Banjarbaru"
                   target="_blank"
                   class="btn btn-success">
                   Lihat di Google Maps
                </a>
            </div>

            <!-- Embed Google Maps -->
            <div class="col-md-7">
                <div class="ratio ratio-16x9">
                    <iframe 
                        src="https://www.google.com/maps?q=Masjid+Hj.+Nurriyah+Banjarbaru&output=embed"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy">
                    </iframe>
                </div>
            </div>

        </div>
    </div>
</section>






