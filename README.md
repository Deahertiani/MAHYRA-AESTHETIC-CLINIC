# MAHYRA Aesthetic Clinic

Website untuk klinik kecantikan MAHYRA Aesthetic Clinic, dibangun dengan Laravel.

## 📋 Prasyarat (Prerequisites)

Pastikan komputer Anda sudah terinstall:
- **PHP** >= 8.2
- **Composer** (https://getcomposer.org/)
- **Node.js** >= 18 (https://nodejs.org/)
- **MySQL** atau **XAMPP/Laragon**
- **Git**

---

## 🚀 Cara Instalasi (Step by Step)

### Step 1: Clone Repository

```bash
git clone https://github.com/username/mahyra-clinic.git
cd mahyra-clinic
```

### Step 2: Install Dependencies PHP

```bash
composer install
```

### Step 3: Install Dependencies Node.js

```bash
npm install
```

### Step 4: Setup File Environment

Copy file `.env.example` menjadi `.env`:

```bash
cp .env.example .env
```

**Untuk Windows (PowerShell):**
```powershell
Copy-Item .env.example .env
```

### Step 5: Generate Application Key

```bash
php artisan key:generate
```

### Step 6: Setup Database

1. Buat database baru di MySQL dengan nama `mahyra_clinic`
2. Edit file `.env` dan sesuaikan konfigurasi database:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=mahyra_clinic
DB_USERNAME=root
DB_PASSWORD=
```

### Step 7: Jalankan Migration

```bash
php artisan migrate
```

Jika ada error, coba:
```bash
php artisan migrate:fresh
```

### Step 8: (Opsional) Jalankan Seeder

```bash
php artisan db:seed
```

### Step 9: Jalankan Development Server

```bash
php artisan serve
```

Aplikasi berjalan di: **http://127.0.0.1:8000**

---

## 🔄 Cara Update dari Git (Pull)

Jika ada update dari repository:

```bash
# 1. Pull perubahan terbaru
git pull origin master

# 2. Update dependencies (jika ada perubahan)
composer install
npm install

# 3. Jalankan migration baru
php artisan migrate

# 4. Clear cache (jika ada masalah)
php artisan cache:clear
php artisan config:clear
php artisan view:clear
```

---

## 📁 Struktur Folder Penting

```
mahyra-clinic/
├── app/
│   ├── Http/Controllers/    # Controller aplikasi
│   └── Models/              # Model database
├── database/
│   ├── migrations/          # File migration database
│   └── seeders/             # Data seeder
├── public/
│   └── img/                 # Gambar dan asset
├── resources/
│   └── views/               # File blade template
└── routes/
    └── web.php              # Definisi route
```

---

## 🔧 Troubleshooting

### Error: "SQLSTATE[HY000] [1049] Unknown database"
- Buat database `mahyra_clinic` di MySQL terlebih dahulu

### Error: "No application encryption key"
- Jalankan: `php artisan key:generate`

### Error: "Class not found"
- Jalankan: `composer dump-autoload`

### Error Migration Gagal
- Jalankan: `php artisan migrate:fresh` (HATI-HATI: ini akan menghapus semua data!)

### Halaman Tidak Berubah Setelah Edit
- Clear cache: `php artisan view:clear`

---

## 👥 Tim Pengembang

- MAHYRA Clinic Development Team

---

## 📝 Fitur Utama

- ✅ Halaman Beranda
- ✅ Daftar Layanan/Treatment
- ✅ Profil Dokter
- ✅ Profil Kulit (Jenis, Warna, Masalah Kulit)
- ✅ Reservasi Treatment
- ✅ Riwayat Reservasi
- ✅ Konsultasi Chat dengan Bot
- ✅ FAQ/Tanya Jawab
- ✅ Registrasi & Login

---

## 📄 License

MIT License - Open Source
