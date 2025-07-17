# 🚀 CodeIgniter 3 - Starter Kit untuk REST API & PDF/Spreadsheet 📦

Sebuah **starter project CodeIgniter 3** yang telah dimodifikasi secara lengkap dan profesional — siap digunakan sebagai fondasi dalam membangun aplikasi PHP berbasis REST API dengan dukungan **Spreadsheet Export/Import** dan **FPDF Report Generator**.

---

## 🎯 Fitur Unggulan

✅ **RESTful API** menggunakan `codeigniter-restserver` (format JSON)  
✅ **Export/Import Excel (Spreadsheet)** menggunakan `PhpSpreadsheet`  
✅ **Generate PDF** laporan menggunakan `FPDF`  
✅ Struktur folder rapih dan sudah disesuaikan untuk development jangka panjang  
✅ Autoload dan konfigurasi awal sudah disiapkan (tidak perlu setup dari awal)  
✅ Contoh controller siap pakai (API dan Report)

---

## 🛠️ Teknologi & Library

| Tools           | Deskripsi                                      |
|----------------|------------------------------------------------|
| CodeIgniter 3   | Framework PHP ringan dan cepat                 |
| REST Server     | Implementasi REST API                          |
| PhpSpreadsheet  | Export & Import data ke/dari file Excel        |
| FPDF            | Pembuatan file PDF secara dinamis              |

---

## 📁 Struktur Proyek

```bash
application/
├── config/
│   └── rest.php
├── controllers/
│   ├── Api/
│   │   └── Example.php   <-- Contoh endpoint REST API
│   ├── Report.php        <-- PDF Generator
│   └── Spreadsheet.php   <-- Spreadsheet Import/Export
├── libraries/
│   └── Fpdf.php          <-- Library PDF
├── models/
│   └── Example_model.php
system/
vendor/                   <-- Composer dependencies
```

🚀 Cara Menggunakan
1. Clone Project
```bash
Copy
Edit
git clone https://github.com/username/nama-repo.git
cd nama-repo
2. Install Dependency via Composer
bash
Copy
Edit
composer install
```
3. Konfigurasi Database
```bash
Edit file application/config/database.php sesuai setting MySQL Anda.
```
5. Atur Base URL
php
Copy
Edit
// application/config/config.php
$config['base_url'] = 'http://localhost/nama-repo/';
6. Tes Endpoint API
bash
Copy
Edit
GET http://localhost/nama-repo/index.php/api/example
🧪 Contoh Endpoint
Method	URL	Keterangan
GET	/index.php/api/example	Contoh API JSON
GET	/index.php/spreadsheet/export	Export Excel
POST	/index.php/spreadsheet/import	Import Excel
GET	/index.php/report/pdf	Generate PDF Report

📄 Lisensi
Project ini dirilis dengan lisensi MIT. Silakan digunakan dan dimodifikasi sesuai kebutuhan proyek Anda.

🙌 Kontribusi
Saya membuat starter kit ini sebagai pondasi awal dalam setiap pengembangan aplikasi berbasis CodeIgniter 3.
Silakan fork, beri bintang ⭐, dan kembangkan sesuai keperluan Anda!

👨‍💻 Tentang Saya
Nama: Gohan (Grafa Media)
Layanan: Custom Aplikasi UMKM, REST API, Bot WhatsApp, dan Sistem Informasi
Instagram: @grafamedia
