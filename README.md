# Kasir-Coffeeshop

Proyek **Kasir-Coffeeshop** adalah aplikasi kasir untuk coffee shop yang menggunakan PHP dan MySQL untuk manajemen transaksi penjualan, login pengguna, dan pengelolaan data produk. Aplikasi ini memungkinkan petugas kasir untuk mencatat pesanan dan memperbarui status pesanan dengan mudah.

## Fitur

- Sistem login untuk petugas kasir.
- Menambahkan, mengedit, dan menghapus data pesanan.
- Menampilkan daftar pesanan yang perlu diproses.
- Pembaruan status pesanan.
- Database untuk menyimpan data produk dan transaksi.

## Struktur File

- **cetak/**: Folder untuk file terkait cetak laporan atau bukti transaksi.
- **halaman/**: Folder untuk file terkait halaman tampilan atau UI aplikasi.
- **src/**: Folder untuk sumber kode aplikasi.
- **.htaccess**: Konfigurasi server Apache untuk pengaturan URL dan keamanan.
- **README.md**: File ini yang menjelaskan tentang proyek.
- **db_cofeseshop2.sql**: Skrip SQL untuk membuat dan mengisi database yang digunakan dalam aplikasi.
- **edit.php**: Halaman untuk mengedit data produk atau pesanan.
- **function.php**: File yang berisi fungsi-fungsi yang digunakan dalam aplikasi.
- **hapus.php**: Halaman untuk menghapus data produk atau pesanan.
- **index.php**: Halaman utama aplikasi kasir.
- **login.php**: Halaman untuk login petugas kasir.
- **logout.php**: Halaman untuk logout dari aplikasi.
- **tambah.php**: Halaman untuk menambah produk atau pesanan baru.
- **update_status.php**: Halaman untuk memperbarui status pesanan.

## Instalasi

1. **Clone Repository:**

   Clone repository ini ke dalam direktori lokal Anda:

   ```bash
   git clone https://github.com/username/Kasir-Coffeeshop.git
   -- Jalankan skrip SQL berikut di MySQL
SOURCE path/to/db_cofeseshop2.sql;



