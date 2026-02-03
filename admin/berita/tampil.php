<?php
include_once 'koneksi.php';

try {
    $db = new Database();
    $conn = $db->getConnection();

    $sql = "SELECT * FROM berita ORDER BY tanggal DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $berita = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Manajemen Berita</h1>

    <a href="index.php?page=tambah_berita" class="btn btn-success mb-3">
        + Tambah Berita
    </a>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-success">
                        <tr class="text-center">
                            <th width="5%">No</th>
                            <th>Judul</th>
                            <th width="15%">Tanggal</th>
                            <th width="20%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($berita)): ?>
                            <?php $no = 1; foreach ($berita as $row): ?>
                                <tr>
                                    <td class="text-center"><?= $no++; ?></td>
                                    <td><?= htmlspecialchars($row['judul']); ?></td>
                                    <td class="text-center">
                                        <?= date('d M Y', strtotime($row['tanggal'])); ?>
                                    </td>
                                    <td class="text-center">
                                        <a href="index.php?page=edit_berita&id=<?= $row['id']; ?>" 
                                           class="btn btn-warning btn-sm">
                                            Edit
                                        </a>
                                        <a href="hapus_berita.php?id=<?= $row['id']; ?>" 
                                           class="btn btn-danger btn-sm"
                                           onclick="return confirm('Yakin ingin menghapus berita ini?')">
                                            Hapus
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4" class="text-center text-muted">
                                    Belum ada berita
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
