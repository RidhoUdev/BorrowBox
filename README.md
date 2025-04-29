<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

# BorrowBox 📦

Aplikasi Peminjaman Barang

---

## ✅ Prasyarat

Pastikan perangkat lunak berikut sudah terinstal di sistem Anda sebelum memulai:

* **PHP:** Versi `^8.1` (atau sesuaikan dengan versi yang dibutuhkan project Anda)
* **Composer:** [Versi terbaru](https://getcomposer.org/)
* **Node.js & NPM (atau Yarn):** Versi `^18.0` (atau sesuaikan)
* **Database:** MySQL / PostgreSQL / SQLite (sesuai konfigurasi project)
* **Git**

---

## ⚙️ Langkah Instalasi & Setup

Ikuti langkah-langkah berikut untuk menjalankan project ini di lingkungan lokal Anda:

1.  **Clone Repository:**
    Buka terminal atau command prompt Anda dan jalankan perintah berikut di direktori pilihan Anda:
    ```bash
    git clone -b main https://github.com/RidhoUdev/BorrowBox.git
    ```

2.  **Masuk ke Direktori Project:**
    ```bash
    cd BorrowBox
    ```

3.  **Install Dependensi PHP (Composer):**
    Jalankan perintah berikut untuk menginstal semua paket PHP yang dibutuhkan:
    ```bash
    composer install
    ```

4.  **Buat File Environment (`.env`):**
    Salin file `.env.example` menjadi `.env`. File ini berisi konfigurasi spesifik untuk lingkungan lokal Anda.
    ```bash
    cp .env.example .env
    ```

5.  **Generate Application Key:**
    Setiap aplikasi Laravel membutuhkan kunci unik. Generate kunci dengan perintah:
    ```bash
    php artisan key:generate
    ```

6.  **Konfigurasi File `.env`:**
    Buka file `.env` yang baru saja dibuat dengan teks editor. Sesuaikan konfigurasi berikut, terutama bagian koneksi database:
    ```dotenv
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=borrowbox  # Pastikan database ini sudah dibuat
    DB_USERNAME=root     # Ganti jika perlu
    DB_PASSWORD=         # Ganti jika menggunakan password
    ```
    *(Pastikan Anda sudah membuat database kosong bernama `borrowbox` atau sesuai dengan `DB_DATABASE`)*

7.  **Jalankan Migrasi Database:**
    Perintah ini akan membuat struktur tabel di database Anda sesuai dengan file migrasi project:
    ```bash
    php artisan migrate
    ```

8.  **Jalankan Storage Link:**
    Perintah ini akan membuatkan *symbolic link* dari `public/storage` ke `storage/app/public`:
    ```bash
    php artisan storage:link
    ```

9.  **Jalankan Server Lokal:** 🚀
    Cara paling sederhana untuk menjalankan server pengembangan PHP bawaan Laravel:
    ```bash
    php artisan serve
    ```
    Aplikasi akan tersedia di `http://127.0.0.1:8000` (atau port lain jika 8000 sudah digunakan).

---
