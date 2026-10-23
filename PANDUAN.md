# Ruang Kelompok — Laravel 12

Website pengenalan singkat kelompok dengan warna hitam, maroon, dan gold. Beranda + halaman detail untuk setiap anggota. Tiga anggota dan seluruh biodata adalah contoh, silakan ganti. Foto belum diberikan sehingga tampilan awal memakai inisial yang dirancang sebagai placeholder.

## 1. Menjalankan di Windows (PowerShell atau terminal VS Code)

Persiapan: PHP 8.2–8.5 dan Composer. Pastikan `php -v` dan `composer -V` bisa dijalankan. PHP memerlukan ekstensi standar Laravel termasuk ctype, curl, dom, fileinfo, filter, hash, mbstring, openssl, pcre, pdo, session, tokenizer, xml. Aktifkan zip di php.ini untuk memudahkan Composer.

Ekstrak ZIP. Letakkan folder `kelompok-elegan` misalnya di `C:\b.project.id\kelompok-elegan`. Buka terminal pada folder yang berisi file `artisan` dan `composer.json`:

```powershell
cd C:\b.project.id\kelompok-elegan
composer install
Copy-Item .env.example .env
php artisan key:generate
php artisan serve
```

Buka http://127.0.0.1:8000. Hentikan server dengan Ctrl+C.

Jalankan perintah penyalinan .env hanya saat pemasangan pertama. Untuk Linux/macOS, ganti `Copy-Item .env.example .env` dengan `cp .env.example .env`.

**Tidak perlu `composer create-project` di folder ini.** Proyek sudah memuat source aplikasi. Folder vendor akan diunduh oleh Composer dan membutuhkan internet. Tidak perlu npm, Vite, database, atau migrasi untuk website ini. Driver session dan cache memakai file. Data anggota disimpan di config/team.php.

## 2. File yang paling sering diedit

| File | Kegunaan |
| --- | --- |
| config/team.php | Nama website, kelas, mata kuliah, anggota, NIM, peran, biodata, kemampuan, motto, foto, footer |
| public/css/style.css | Warna, jarak, ukuran teks, responsif, animasi |
| resources/views/team/index.blade.php | Susunan halaman beranda |
| resources/views/team/show.blade.php | Halaman profil anggota |
| resources/views/layouts/app.blade.php | Header, navigasi, footer |
| routes/web.php | URL dan routing |
| app/Http/Controllers/TeamController.php | Mengambil data dan menampilkan halaman |
| public/js/app.js | Bantuan fokus tautan internal |

## 3. Mengganti anggota dan foto

Edit `config/team.php`. Ganti `name`, `initials`, `nim`, `role`, `bio`, `story`, `skills`, `focus`, dan `motto`. NIM harus tetap ditulis sebagai string di dalam tanda kutip. Gunakan slug unik berisi huruf kecil, angka, atau tanda hubung, misalnya `wulan-ade`. URL profil otomatis menjadi `/anggota/wulan-ade`.

Letakkan foto sendiri di `public/images/members/wulan.jpg`. Ubah data anggota:

```php
'photo' => 'images/members/braha.jpg',
```

Gunakan JPG, PNG atau WebP, idealnya potret ukuran 800 × 1000 piksel. Path tidak diawali `public/`. Jika belum punya foto, tetap gunakan `null` agar inisial muncul. Untuk menambah anggota, duplikat satu blok array anggota dan ganti slug agar unik; kartu dan jumlah anggota otomatis menyesuaikan. Untuk menghapus anggota, hapus bloknya beserta koma yang sesuai.

Jika data belum berubah, jalankan `php artisan optimize:clear`, lalu muat ulang browser dengan Ctrl+F5.

## 4. Warna dan struktur alur

Pada bagian `:root` di public/css/style.css:
- `--bg: #141212` untuk latar hitam.
- `--maroon: #641f30` untuk referensi warna utama maroon. Gradien dekorasi dan kartu juga dapat diedit pada `.hero-art` dan `.portrait`.
- `--gold: #dbb878` untuk aksen gold.
- `--text: #f5f0e7` untuk tulisan utama.

Alur: URL → routes/web.php → TeamController → config/team.php → Blade → halaman browser. Teks menggunakan escaping Blade `{{ }}`. Slug yang tidak ditemukan menghasilkan halaman 404. Tidak ada login, form pengiriman, admin panel atau pengunggahan foto melalui browser dalam lingkup proyek ini.

## 5. Pemeriksaan setelah pemasangan

```powershell
php artisan key:generate
php artisan view:cache
```

Buka beranda, ketiga tautan profil, navigasi Tentang/Anggota, serta URL `/anggota/tidak-ada` (harus 404). Cek tampilan pada layar laptop dan HP. Nama panjang dan jumlah anggota dapat disesuaikan melalui config.

## 6. Jika ingin memasukkan ke proyek Laravel 12 yang sudah ada

Cadangkan proyek dulu. Salin `config/team.php`, controller TeamController, folder view layouts/team dan errors/404.blade.php, CSS, JS, favicon, serta folder images. Gabungkan rute dalam routes/web.php; jangan membuat dua rute GET `/`. Gunakan SESSION_DRIVER=file dan CACHE_STORE=file bila belum memakai database. Jalankan `php artisan optimize:clear`. Jangan menimpa .env proyek lama.

## 7. Hosting

Gunakan hosting yang mendukung PHP/Laravel. Document root wajib mengarah ke folder `public`. Atur APP_ENV=production, APP_DEBUG=false, dan APP_URL sesuai domain. Simpan .env di server secara privat, pastikan storage dan bootstrap/cache dapat ditulis, lalu jalankan `composer install --no-dev --optimize-autoloader` dan `php artisan optimize`. Jangan unggah source ke hosting statis.

## Catatan verifikasi

Source aplikasi dan aset diperiksa secara statis saat dibuat. Lingkungan pembuatan tidak menyediakan PHP/Composer, sehingga instalasi dependency, rendering Blade, dan eksekusi Laravel belum diuji. Folder vendor dan composer.lock belum disertakan; Composer akan memilih dependency Laravel 12 yang kompatibel saat instalasi.

Referensi: https://laravel.com/docs/12.x/installation dan https://laravel.com/docs/12.x/releases
