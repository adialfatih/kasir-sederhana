# 🚀 Aplikasi Kasir Sederhana 📦


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

```bas
Contoh Response : 
[
    {"id":1752726247763,"menuId":"4","name":"Es Teh","basePrice":8000,"toppings":[],"quantity":1},
    {"id":1752726263790,"menuId":"3","name":"Ayam Bakar","basePrice":35000,"toppings":[{"id":2,"name":"Ayam Suwir","price":5000}],"quantity":1},
    {"id":1752726628363,"menuId":"4","name":"Es Teh","basePrice":8000,"toppings":[],"quantity":1},
    {"id":1752726630028,"menuId":"5","name":"Es Jeruk","basePrice":10000,"toppings":[],"quantity":1},
    {"id":1752726631947,"menuId":"4","name":"Es Teh","basePrice":8000,"toppings":[],"quantity":1},
    {"id":1752726636400,"menuId":"3","name":"Ayam Bakar","basePrice":35000,"toppings":[{"id":4,"name":"Keju","price":6000},{"id":3,"name":"Sosis","price":4000},{"id":2,"name":"Ayam Suwir","price":5000}],"quantity":1},
    {"id":1752726641964,"menuId":"5","name":"Es Jeruk","basePrice":10000,"toppings":[],"quantity":1}
]
```