
<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="text-center my-2">
        <h1 class="h3 text-gray-800 mb-3">WELCOME TO PDM Banjarbaru</h1>
    </div>

    <!-- NEWS -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">News</h6>
            <?php if ($role == 'admin' || $role == 'superadmin'): ?>
                <a href="?page=konten_tampil" class="btn btn-primary">
                    <i class="fas fa-fw fa-table fa-sm text-white-50"></i> Daftar Konten
                </a>
            <?php endif; ?>
        </div>
        <div class="card-body" style="max-height: 500px; overflow-y: auto;">
            <div class="timeline position-relative">
                <?php foreach ($grouped_konten as $id_title => $kontens) : ?>
                    <div class="timeline-item d-flex flex-column align-items-center text-center position-relative">
                        <div class="circle bg-dark rounded-circle position-absolute" style="width: 15px; height: 15px; left: -10px; top: 50%; transform: translateY(-50%);"></div>
                        <div class="content w-75 ms-3 mb-3 p-4 border rounded shadow-sm bg-white">
                            <h5 class="card-text mt-3"><?php echo htmlspecialchars($kontens[0]['title']); ?></h5>
                            <div class="d-flex flex-column align-items-center mt-3">
                                <?php foreach ($kontens as $konten) : ?>
                                    <div class="text-center">
                                        <?php if ($konten['jenis_konten'] === 'gambar') : ?>
                                            <img src="<?php echo htmlspecialchars($konten['konten']); ?>"
                                                class="img-fluid rounded"
                                                style="width: 250px; height: auto; cursor: pointer;"
                                                alt="Konten Gambar"
                                                data-bs-toggle="modal"
                                                data-bs-target="#imageModal"
                                                data-img="<?php echo htmlspecialchars($konten['konten']); ?>">
                                        <?php elseif ($konten['jenis_konten'] === 'file') : ?>
                                            <a href="<?php echo htmlspecialchars($konten['konten']); ?>" class="btn btn-secondary" style="width: 150px;">Download File</a>
                                        <?php elseif ($konten['jenis_konten'] === 'link') : ?>
                                            <a href="<?php echo htmlspecialchars($konten['konten']); ?>" target="_blank" class="btn btn-info" style="width: 150px;">Lihat Link</a>
                                        <?php endif; ?>
                                        <p class="mt-2 small"><?php echo nl2br(htmlspecialchars($konten['caption'])); ?></p>
                                        <p class="card-text mt-3"><small class="text-muted">Diupload pada: <?php echo $kontens[0]['tanggal']; ?></small></p>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="line position-absolute bg-dark" style="width: 2px; height: 100%; left: 0px; top: 0;"></div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-body text-center">
                            <img src="" id="modalImage" class="img-fluid rounded" alt="Preview Gambar">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- SCRIPT MODAL DASHBOARD -->
<!-- Modal: Total Perusahaan -->
<div class="modal fade" id="modalTotalPerusahaan" tabindex="-1" aria-labelledby="modalTotalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTotalLabel">Daftar Seluruh Perusahaan yang Menjadi Kewenangan Provinsi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-sm">
                    <thead class="table-primary">
                        <tr>
                            <th>No</th>
                            <th>Nama Perusahaan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($perusahaanList as $p): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= htmlspecialchars($p['nama_perusahaan']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal: Sudah Izin -->
<div class="modal fade" id="modalSudahIzin" tabindex="-1" aria-labelledby="modalSudahIzinLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalSudahIzinLabel">Perusahaan yang Sudah Berizin</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-sm">
                    <thead class="table-success">
                        <tr>
                            <th>No</th>
                            <th>Nama Perusahaan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($sudahIzinList as $p): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= htmlspecialchars($p['nama_perusahaan']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal: Belum Izin -->
<div class="modal fade" id="modalBelumIzin" tabindex="-1" aria-labelledby="modalBelumIzinLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalBelumIzinLabel">Perusahaan yang Belum Berizin</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-sm">
                    <thead class="table-danger">
                        <tr>
                            <th>No</th>
                            <th>Nama Perusahaan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($belumIzinList as $p): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= htmlspecialchars($p['nama_perusahaan']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal: Sudah Upload -->
<div class="modal fade" id="modalSudahUpload" tabindex="-1" aria-labelledby="modalSudahUploadLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalSudahUploadLabel">Perusahaan yang Sudah Melaporkan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-sm">
                    <thead class="table-success">
                        <tr>
                            <th>No</th>
                            <th>Nama Perusahaan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($sudahUploadList as $p): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= htmlspecialchars($p['nama_perusahaan']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal: Belum Upload -->
<div class="modal fade" id="modalBelumUpload" tabindex="-1" aria-labelledby="modalBelumUploadLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalBelumUploadLabel">Perusahaan yang Belum Upload</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-sm">
                    <thead class="table-danger">
                        <tr>
                            <th>No</th>
                            <th>Nama Perusahaan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($belumUploadList as $p): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= htmlspecialchars($p['nama_perusahaan']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- SCRIPT BUTTON PILIH DASHBOARD -->
<script>
    const btnPerizinan = document.getElementById('btnPerizinan');
    const btnSIINas = document.getElementById('btnSIINas');
    const dashPerizinan = document.getElementById('dashboardPerizinan');
    const dashSIINas = document.getElementById('dashboardSIINas');

    btnPerizinan.addEventListener('click', () => {
        dashPerizinan.style.display = 'block';
        dashSIINas.style.display = 'none';
        btnPerizinan.classList.add('btn-success');
        btnPerizinan.classList.remove('btn-outline-success');
        btnSIINas.classList.remove('btn-success');
        btnSIINas.classList.add('btn-outline-success');
    });

    btnSIINas.addEventListener('click', () => {
        dashPerizinan.style.display = 'none';
        dashSIINas.style.display = 'block';
        btnSIINas.classList.add('btn-success');
        btnSIINas.classList.remove('btn-outline-success');
        btnPerizinan.classList.remove('btn-success');
        btnPerizinan.classList.add('btn-outline-success');
    });
</script>

<!-- SCRIPT MEMPERBESAR GAMBAR -->
<script>
    const imageModal = document.getElementById('imageModal');
    imageModal.addEventListener('show.bs.modal', function(event) {
        const img = event.relatedTarget;
        const src = img.getAttribute('data-img');
        const modalImg = imageModal.querySelector('#modalImage');
        modalImg.src = src;
    });
</script>