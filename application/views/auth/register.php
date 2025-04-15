<section class="vh-100">
	<div class="container-fluid">
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
		<div class="row">
			<div class="col-sm-6 text-black">

				<div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">

					<form style="width: 23rem;" method="post" action="<?= base_url('auth/register_user') ?>">

						<h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Daftar</h3>

						<div data-mdb-input-init class="form-outline mb-4">
							<label class="form-label" for="email">Alamat Email</label>
							<input type="email" name="email" id="email" class="form-control form-control-lg" required/>
						</div>

						<div data-mdb-input-init class="form-outline mb-4">
							<label class="form-label" for="name">Nama</label>
							<input type="text" id="name" name="name" class="form-control form-control-lg" required/>
						</div>

						<div data-mdb-input-init class="form-outline mb-4">
							<label class="form-label" for="password">Password</label>
							<input type="password" id="password" name="password" class="form-control form-control-lg" required minlength="8"/>
						</div>

						<div data-mdb-input-init class="form-outline mb-4">
							<label class="form-label" for="verifyPassword">Verifikasi Password</label>
							<input type="password" name="password" id="verifyPassword" class="form-control form-control-lg" required />
						</div>

						<div class="pt-1 mb-4">
							<button data-mdb-button-init data-mdb-ripple-init class="btn btn-info btn-lg btn-block text-white" type="submit">Daftar</button>
						</div>

						<p>Sudah punya akun? <a href="/auth/login" class="link-info">Masuk sini</a></p>

					</form>

				</div>

			</div>
			<div class="col-sm-6 px-0 d-none d-sm-block">
				<img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/img3.webp"
					 alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
			</div>
		</div>
	</div>
</section>

<script>
	document.addEventListener('DOMContentLoaded', function () {
		const form = document.querySelector('form');
		const passwordInput = document.getElementById('password');
		const verifyPasswordInput = document.getElementById('verifyPassword');
		const submitButton = form.querySelector('button[type="submit"]');

		submitButton.addEventListener('click', function () {
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

			form.submit();
		});
	});
</script>
