<div class="container mt-5">
	<?php if ($this->session->flashdata('success')): ?>
		<div class="alert alert-success alert-dismissible fade show" role="alert">
			<?= $this->session->flashdata('success'); ?>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>	<?php endif; ?>
	<?php if ($this->session->flashdata('error')): ?>
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<?= $this->session->flashdata('error'); ?>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
	<?php endif; ?>
	<div class="alert alert-info">
		<strong>Informasi:</strong> Halaman ini menampilkan daftar pengguna yang telah Anda buat. Anda dapat mengedit atau menghapus pengguna yang ada.
	</div>
    <h1 class="mb-4">Daftar Pengguna</h1>
    <table class="table table-bordered table-striped mb-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Peran</th>
				<th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($users)) : ?>
                <?php foreach ($users as $item) : ?>
                    <tr>
                        <td><?= htmlspecialchars($item->id); ?></td>
                        <td><?= htmlspecialchars($item->name); ?></td>
                        <td><?= htmlspecialchars($item->email); ?></td>
                        <td>
							<?php if ($item->role == 'admin') : ?>
								<span class="badge bg-primary"><?= htmlspecialchars($item->role); ?></span>
							<?php else : ?>
								<span class="badge bg-success"><?= htmlspecialchars($item->role); ?></span>
							<?php endif; ?>
						</td>
                        <td>
                            <a href="<?= base_url('users/edit/' . $item->id); ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="<?= base_url('users/delete/' . $item->id); ?>" class="btn btn-danger btn-sm delete" onclick="return confirm('Apakah Anda yakin ingin menghapus pengaduan ini?');">Hapus</a>
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
	<div class="mb-3">
		<a href="<?= base_url('users/create'); ?>" class="btn btn-primary">Buat Pengguna Baru</a>
		<a href="<?= base_url('/'); ?>" class="btn btn-outline-primary">Kembali</a>
	</div>
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
