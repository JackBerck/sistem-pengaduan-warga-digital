# Sistem Pengaduan Warga Digital

Sistem Pengaduan Warga Digital adalah sebuah aplikasi berbasis web yang dirancang untuk mempermudah warga dalam menyampaikan pengaduan atau keluhan kepada pihak yang berwenang. Aplikasi ini dibangun menggunakan PHP dan didukung oleh Laragon sebagai lingkungan pengembangannya.

## Fitur Utama
- Pengaduan warga dengan formulir online.
- Sistem manajemen pengaduan untuk admin.
- Notifikasi status pengaduan.
- Laporan pengaduan yang terstruktur.

## Persyaratan Sistem
- Laragon (disarankan versi terbaru).
- PHP 7.4 atau lebih baru.
- MySQL/MariaDB.
- Composer.

## Instalasi

Ikuti langkah-langkah berikut untuk menginstal proyek ini di lingkungan Laragon:

1. **Clone Repository**
    Clone repository proyek ini ke folder `www` di Laragon:
    ```bash
    git clone https://github.com/username/sistem-pengaduan-warga-digital.git
    ```

2. **Konfigurasi Database**
    - Buka Laragon dan jalankan Apache serta MySQL.
    - Buat database baru melalui phpMyAdmin atau MySQL CLI, misalnya `sistem_pengaduan_warga_digital`.
    - Import file database yang telah disediakan ke database tersebut.
    - Sesuaikan konfigurasi database di file `application/config/database.php`:
      ```
      DB_CONNECTION=mysql
      DB_HOST=127.0.0.1
      DB_PORT=3306
      DB_DATABASE=sistem_pengaduan_warga_digital
      DB_USERNAME=root
      DB_PASSWORD=
      ```

3. **Jalankan Aplikasi**
    Pindahkan ke folder proyek dan jalankan aplikasi menggunakan perintah berikut:
    ```bash
    php -S localhost:3000
    ```

    Akses aplikasi melalui browser dengan URL:
    ```
    http://localhost:3000
    ```

## Kontribusi
Jika Anda ingin berkontribusi pada proyek ini, silakan buat pull request atau laporkan masalah melalui halaman Issues di repository.

## Lisensi
Proyek ini dilisensikan di bawah [MIT License](LICENSE).