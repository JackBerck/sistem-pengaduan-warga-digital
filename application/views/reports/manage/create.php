<div class="container mt-5">
	<?php if ($this->session->flashdata('success')): ?>
		<div class="alert alert-success alert-dismissible fade show" role="alert">
			<?= $this->session->flashdata('success'); ?>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
	<?php endif; ?>

	<?php if ($this->session->flashdata('error')): ?>
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<?= $this->session->flashdata('error'); ?>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
	<?php endif; ?>
	<h1 class="mb-4">Form Pengaduan</h1>
	<form action=<?= base_url("/reports/store_manage") ?> method="POST">
		<div class="mb-3">
			<label for="title" class="form-label">Judul</label>
			<input type="text" class="form-control" id="title" name="title" placeholder="Masukkan judul pengaduan" required>
		</div>
		<div class="mb-3">
			<label for="description" class="form-label">Deskripsi</label>
			<textarea class="form-control" id="description" name="description" rows="5" placeholder="Masukkan deskripsi pengaduan" required></textarea>
		</div>
		<div class="mb-3">
			<label for="status" class="form-label">Status</label>			
			<select class="form-select" name="status" id="status">
				<option value="baru">Baru</option>
				<option value="diproses">Diproses</option>
				<option value="selesai">Selesai</option>
			</select>			
		</div>
		<button type="submit" class="btn btn-primary">Kirim Pengaduan</button>
	</form>
</div>
