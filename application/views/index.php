<?php
//$current_user = $this->session->userdata('current_user');
//
//var_dump($current_user->id);
//?>

<!-- Header Section -->
<header class="container py-6">
	<div class="row flex-lg-row-reverse align-items-center g-5">
		<div class="col-10 mx-auto col-sm-8 col-lg-6">
			<img src="https://images.unsplash.com/photo-1486312338219-ce68d2c6f44d?q=80&w=2072&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="d-block mx-lg-auto img-fluid" alt="" loading="lazy">
		</div>
		<div class="col-lg-6">
			<div class="lc-block mb-3">
				<div editable="rich">
					<h1 class="fw-bold display-6">Selamat Datang di Sistem Pengaduan Warga Digital</h1>
				</div>
			</div>

			<div class="lc-block mb-3">
				<div editable="rich">
					<p>
						Sistem Pengaduan Warga Digital adalah platform yang memudahkan warga untuk menyampaikan keluhan, saran, dan aspirasi kepada pihak berwenang secara cepat dan efisien. Dengan antarmuka yang ramah pengguna, Anda dapat mengajukan laporan dengan mudah dan melacak statusnya secara real-time.
					</p>
				</div>
			</div>

			<div class="lc-block d-grid gap-2 d-md-flex justify-content-md-start"><a class="btn btn-primary px-4 me-md-2" href="/reports" role="button">Lapor!</a>
			</div>

		</div>
	</div>
</header>

<!-- Features Section -->
<section class="bg-light py-5">
    <div class="container">
        <h2 class="text-center">Fitur Unggulan</h2>
        <div class="row mt-4">
            <div class="col-md-4">
				<img src="https://images.unsplash.com/photo-1499420838073-7de9d689547d?q=80&w=1965&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="card-img-top" alt="..." style="width: 100%; height: 200px; object-fit: cover">
				<div class="card-body">
					<h5 class="card-title">Pengaduan Cepat</h5>
					<p class="card-text">
						Kirim pengaduan Anda dengan mudah melalui platform kami.
					</p>
				</div>
			</div>
            <div class="col-md-4 text-center">
				<img src="https://images.unsplash.com/photo-1633265486064-086b219458ec?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="card-img-top" alt="..." style="width: 100%; height: 200px; object-fit: cover">
				<div class="card-body">
					<h5 class="card-title">Keamanan Data</h5>
					<p class="card-text">
						Data Anda akan dijaga kerahasiaannya dengan baik.
					</p>
				</div>
            </div>
            <div class="col-md-4 text-center"><img src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="card-img-top" alt="..." style="width: 100%; height: 200px; object-fit: cover">
				<div class="card-body">
					<h5 class="card-title">Laporan Terintegraasi</h5>
					<p class="card-text">
						Anda dapat mengelola dan memantau pengaduan Anda secara real-time.
					</p>
				</div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section class="py-5">
    <div class="container text-center">
        <h2>Hubungi Kami</h2>
        <p class="mt-3">Jika Anda memiliki pertanyaan atau membutuhkan bantuan, jangan ragu untuk menghubungi kami.</p>
        <a href="mailto:info@sistem-pengaduan.com" class="btn btn-primary mt-3">Email Kami</a>
    </div>
</section>

<footer class="bg-dark text-white text-center py-3">
    <p>&copy; 2025 Sistem Pengaduan Warga Digital. Semua Hak Dilindungi.</p>
</footer>
