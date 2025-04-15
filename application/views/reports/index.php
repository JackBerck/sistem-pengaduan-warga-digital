<div class="container mt-5">
    <h1 class="mb-4">Daftar Pengaduan</h1>
    <div class="mb-3">
        <a href="<?= base_url('reports/create'); ?>" class="btn btn-primary">Buat Pengaduan Baru</a>
    </div>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Status</th>
                <th>Tanggal Pengajuan</th>
				<th>Terakhir Diajukan</th>
				<th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($reports)) : ?>
                <?php foreach ($reports as $item) : ?>
                    <tr>
                        <td><?= htmlspecialchars($item->id); ?></td>
                        <td><?= htmlspecialchars($item->title); ?></td>
                        <td><?= htmlspecialchars($item->description); ?></td>
                        <td>
							<?php if ($item->status == 'baru') : ?>
								<span class="badge bg-primary"><?= htmlspecialchars($item->status); ?></span>
							<?php elseif ($item->status == 'diproses') : ?>
								<span class="badge badge-info text-white"><?= htmlspecialchars($item->status); ?></span>
							<?php else : ?>
								<span class="badge badge-success"><?= htmlspecialchars($item->status); ?></span>
							<?php endif; ?>
						</td>
                        <td><?= htmlspecialchars($item->created_at); ?></td>
						<td><?= htmlspecialchars($item->updated_at); ?></td>
                        <td>
                            <a href="<?= base_url('reports/edit/' . $item->id); ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="<?= base_url('reports/delete/' . $item->id); ?>" class="btn btn-danger btn-sm delete" onclick="return confirm('Apakah Anda yakin ingin menghapus pengaduan ini?');">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="5" class="text-center">Tidak ada data pengaduan.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<script>
    const deleteButton = document.querySelector('.delete');
    deleteButton.addEventListener('click', function(e) {
        e.preventDefault();
        const url = this.getAttribute('href');
        if (confirm('Apakah Anda yakin ingin menghapus data ini? Sekalinya dihapus, data Anda tidak dapat dipulihkan!')) {
            window.location = url;
        }
    });
</script>
