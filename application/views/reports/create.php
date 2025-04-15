<div class="container mt-5">
    <h1 class="mb-4">Form Pengaduan</h1>
    <form action=<?= base_url("/reports/store") ?> method="POST">
        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Masukkan judul pengaduan" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="description" name="description" rows="5" placeholder="Masukkan deskripsi pengaduan" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Kirim Pengaduan</button>
    </form>
</div>