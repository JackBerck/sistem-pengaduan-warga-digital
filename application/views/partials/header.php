<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?= isset($title) && $title ? $title : "Selamat Datang"; ?> | Sistem Pengaduan Warga Digital</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
	<div class="container">
		<a class="navbar-brand" href="#">Navbar</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav gap-2">
				<li class="nav-item">
					<a class="nav-link" href="/">Beranda</a>
				</li>
				<?php if (isset($current_user) && $current_user): ?>
					<li class="nav-item">
						<a class="nav-link" href="#">Pengaduan</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Profil</a>
					</li>
					<li class="nav-item">
						<a class="btn btn-danger" role="button" href="auth/logout">Logout</a>
					</li>
				<?php else: ?>
					<li class="nav-item">
						<a class="nav-link" href="auth/login">Masuk</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="auth/register">Daftar</a>
					</li>
				<?php endif; ?>
			</ul>
		</div>
	</div>
</nav>
