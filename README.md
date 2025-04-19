# 🔗 URL Shortener Sederhana dengan PHP

Skrip ini merupakan aplikasi pemendek URL sederhana menggunakan PHP dan file JSON sebagai penyimpanan data. Fungsinya mirip layanan seperti bit.ly, namun sangat ringan dan bisa dijalankan di server lokal atau shared hosting tanpa database.

## ✨ Fitur

- Menyimpan pasangan ID dan URL tujuan.
- Mengarahkan pengguna ke URL berdasarkan ID.
- Penyimpanan data menggunakan file JSON (`data.json`).
- Tidak memerlukan database atau framework tambahan.

## 📂 Struktur File

- `index.php` – Skrip utama untuk menyimpan dan mengarahkan URL.
- `data.json` – File tempat menyimpan data ID dan URL (akan otomatis dibuat saat dibutuhkan).

## ⚙️ Cara Penggunaan

### 1. Menyimpan URL
Untuk menambahkan URL baru dengan ID kustom:

```
https://namadomainmu.com/index.php?id=namamu&url=https://example.com
```

Contoh:
```
https://s.apipedia.id/index.php?id=yt&url=https://youtube.com
```

Hasil:
```
s.apipedia.id?r=yt
```

### 2. Mengakses URL
Untuk mengakses URL berdasarkan ID:

```
https://namadomainmu.com/index.php?r=namamu
```

Contoh:
```
https://s.apipedia.id?r=yt
```

Akan otomatis redirect ke `https://youtube.com`.

## ⚠️ Catatan

- Pastikan file `data.json` bisa ditulis oleh server (berikan izin write).
- Hindari penggunaan ID yang sama untuk menghindari penimpaan data.
- Tidak ada validasi URL — pastikan URL yang dikirim valid.

## 🛡️ Keamanan

Karena ini adalah implementasi dasar, sangat disarankan menambahkan:

- Validasi dan sanitasi input.
- Proteksi terhadap akses tidak sah.
- Pembatasan panjang ID dan URL.

## 📄 Lisensi

Proyek ini bebas digunakan dan dimodifikasi. Gunakan dengan bijak dan sesuai kebutuhan.
