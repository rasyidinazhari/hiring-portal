# Dicoding Jobs - Take Home Test

Project ini adalah aplikasi manajemen lowongan pekerjaan (Dicoding Jobs) yang dibangun menggunakan arsitektur *frontend-backend* terpisah.

* **Backend**: Menggunakan Laravel 11 (PHP) sebagai penyedia RESTful API dan manajemen basis data.
* **Frontend**: Menggunakan Next.js 14 (React) dengan Tailwind CSS dan shadcn/ui untuk antarmuka pengguna, serta React Query untuk manajemen *state* dari sisi *server*.

## Struktur Proyek

```
.
├── backend/          # Proyek Laravel (API & Database)
│   ├── app/          # Logika aplikasi (Model, Controller, Form Requests)
│   ├── database/     # Migrasi, Seeder, dan Factory SQLite
│   ├── routes/       # Definisi rute API (api.php)
│   └── tests/        # PHPUnit (Unit & Feature/Integration Tests)
│
├── frontend/         # Proyek Next.js (Antarmuka Pengguna)
│   ├── src/
│   │   ├── app/      # App Router (Pages, Layouts)
│   │   ├── components/ # Komponen UI re-usable (JobCard, NavBar, shadcn)
│   │   └── lib/      # Utilitas (Axios HTTP Client API)
│   ├── public/       # Aset gambar (Logo, Favicon, Ornamen)
│   └── tests/        # Playwright (End-to-End Tests)
```

## Prasyarat

Sebelum menjalankan proyek ini, pastikan sistem Anda telah terinstal:
* PHP (>= 8.2) dan Composer
* Node.js (>= 18) dan npm/yarn
* Ekstensi PHP SQLite (karena proyek ini menggunakan SQLite)

## Setup dan Cara Menjalankan Aplikasi

### 1. Backend (Laravel)

Buka terminal dan arahkan ke direktori `backend`:

```bash
cd backend
```

Instal dependensi Composer:

```bash
composer install
```

Salin berkas konfigurasi *environment*:

```bash
cp .env.example .env
```

Jalankan migrasi basis data dan masukkan data awal (*seeder*):

```bash
php artisan migrate:fresh --seed
```
*Catatan: Proses seeding akan memasukkan 4 data lowongan (Product Engineer, Android Engineer, iOS Developer, dan Code Reviewer).*

Jalankan *server* backend:

```bash
php artisan serve
```
Backend akan berjalan di `http://localhost:8000`.

### 2. Frontend (Next.js)

Buka terminal baru dan arahkan ke direktori `frontend`:

```bash
cd frontend
```

Instal dependensi NPM:

```bash
npm install
```

Jalankan *server* *development* frontend:

```bash
npm run dev
```
Frontend akan berjalan di `http://localhost:3000`.

## Menjalankan Pengujian (Testing)

Proyek ini dilengkapi dengan 3 lapis pengujian (Unit Test, Integration Test, dan E2E Test) senilai 40 poin.

### 1. Unit & Integration Tests (Backend)

Pengujian backend ditulis menggunakan PHPUnit. 
* **Unit Test** berada di `backend/tests/Unit/VacancyTest.php` (Menguji *fillable attributes* dan tipe konversi *boolean* pada Model).
* **Integration/Feature Test** berada di `backend/tests/Feature/VacancyApiTest.php` (Menguji fungsi REST API secara utuh pada rute POST, GET, PUT, DELETE).

Cara menjalankan:

```bash
cd backend
php artisan test
```

### 2. End-to-End Tests (Frontend)

Pengujian frontend ditulis menggunakan Playwright.
* **E2E Test** berada di `frontend/tests/vacancy.spec.ts` (Menguji interaksi nyata pengguna seperti melihat daftar, mencari lowongan, dan membuka detail lowongan).

Pastikan *server* frontend (`npm run dev`) sedang berjalan di *port* 3000, lalu jalankan:

```bash
cd frontend
npx playwright test
```
*Jika Anda belum menginstal browser Playwright, Anda mungkin perlu menjalankan `npx playwright install` terlebih dahulu.*
