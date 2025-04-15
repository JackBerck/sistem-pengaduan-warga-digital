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
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h4><?= $title ?></h4>
                </div>
                <div class="card-body">
                    <form method="post" action="<?= base_url('profile/update') ?>">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?= $user->name  ?>">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?= $user->email  ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Peran</label>
                            <input type="text" class="form-control" id="role" name="email" value="<?= $user->role  ?>" readonly>
                        </div>
						<div class="d-grid">
							<button type="submit" class="btn btn-primary mb-2">
								Ubah Profil
							</button>
						</div>
                    </form>
					<div class="d-grid">
						<button type="button" class="btn btn-danger text-white" data-bs-toggle="modal" data-bs-target="#changePasswordModal">
							Ubah Password
						</button>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="changePasswordModalLabel">Ganti Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('/profile/change_password') ?>" method="post">
                    <div class="mb-3">
                        <label for="old_password" class="form-label">Password Lama</label>
                        <input type="password" class="form-control" id="old_password" name="password" placeholder="Enter new password" required>
                    </div>
					<div class="mb-3">
                        <label for="password" class="form-label">Password Baru</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter new password" required>
                    </div>
                    <div class="mb-3">
                        <label for="verifyPassword" class="form-label">Verifikasi Password</label>
                        <input type="password" class="form-control" id="verifyPassword" name="verifyPassword" placeholder="Confirm new password" required>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary change-password">Perbarui Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
	document.addEventListener('DOMContentLoaded', function () {
		const modalForm = document.querySelector('#changePasswordModal form');
		const passwordInput = modalForm.querySelector('#password');
		const verifyPasswordInput = modalForm.querySelector('#verifyPassword');
		const submitButton = modalForm.querySelector('button[type="submit"].change-password');

		submitButton.addEventListener('click', function (e) {
			e.preventDefault();
			const password = passwordInput.value.trim();
			const verifyPassword = verifyPasswordInput.value.trim();

			if (password.length < 8) {
				alert('Password harus memiliki minimal 8 karakter.');
				return;
			}

			if (password !== verifyPassword) {
				alert('Password dan Verifikasi Password tidak cocok.');
				return;
			}

			modalForm.submit();
		});
	});
</script>
