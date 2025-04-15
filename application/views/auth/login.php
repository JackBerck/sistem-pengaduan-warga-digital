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
		<div class="row flex-row-reverse">
			<div class="col-sm-6 text-black">

				<div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">

					<form style="width: 23rem;" action=<?= base_url('auth/login_user') ?> method="post">

						<h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Masuk</h3>

						<div data-mdb-input-init class="form-outline mb-4">
							<label class="form-label" for="email">Alamat Email</label>
							<input type="email" id="email" name="email" class="form-control form-control-lg" required/>
						</div>

						<div data-mdb-input-init class="form-outline mb-4">
							<label class="form-label" for="password">Password</label>
							<input type="password" id="password" name="password" class="form-control form-control-lg" required/>
						</div>

						<div class="pt-1 mb-4">
							<button data-mdb-button-init data-mdb-ripple-init class="btn btn-info btn-lg btn-block text-white" type="submit">Masuk</button>
						</div>

						<p>Belum punya akun? <a href="/auth/register" class="link-info">Daftar sini</a></p>

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
