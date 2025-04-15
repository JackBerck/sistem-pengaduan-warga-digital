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
	<h1 class="mb-4">Form Pengguna</h1>
	<form action=<?= base_url("/users/store") ?> method="POST">
		<div class="mb-3">
			<label for="name" class="form-label">Nama</label>
			<input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama pengguna" required>
		</div>
		<div class="mb-3">
			<label for="email" class="form-label">Email</label>
			<input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email pengguna" required>
		</div>
		<div class="mb-3">
			<label for="password" class="form-label">Password</label>
			<input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password pengguna" required>
		</div>
		<div class="mb-3">
			<label for="role">Peran</label>
			<select class="form-select" id="role" name="role" required>
				<option value="" disabled selected>Pilih peran pengguna</option>
				<option value="admin">Admin</option>
				<option value="warga">Warga</option>
			</select>
		</div>
		<button type="submit" class="btn btn-primary">Kirim Pengguna</button>
	</form>
</div>
