<?php

// Konstanta path ke file JSON dan base URL shortener
define('DATA_FILE', 'data.json');
define('BASE_URL', 's.apipedia.id');

// Fungsi untuk membaca data dari file JSON
function getData() {
    if (file_exists(DATA_FILE)) {
        $json = file_get_contents(DATA_FILE);
        return json_decode($json, true);
    }
    return [];
}

// Fungsi untuk menyimpan data ke file JSON
function saveData($data) {
    file_put_contents(DATA_FILE, json_encode($data, JSON_PRETTY_PRINT));
}

// Cek apakah request menggunakan parameter 'id' dan 'url'
if (isset($_GET['id']) && isset($_GET['url'])) {
    // Sanitize input
    $id = htmlspecialchars(trim($_GET['id']));
    $url = filter_var(trim($_GET['url']), FILTER_SANITIZE_URL);

    // Validasi URL
    if (!filter_var($url, FILTER_VALIDATE_URL)) {
        echo "URL tidak valid.";
        exit;
    }

    // Ambil data yang ada
    $data = getData();

    // Simpan data id dan url
    $data[$id] = $url;

    // Simpan data kembali ke file JSON
    saveData($data);

    // Tampilkan response seperti yang diinginkan
    echo BASE_URL . "?r=$id";

} elseif (isset($_GET['r'])) {
    // Jika parameter 'r' ada, kita cari URL berdasarkan 'r'
    $r = htmlspecialchars(trim($_GET['r']));
    $data = getData();

    // Periksa apakah 'r' ada dalam data
    if (isset($data[$r])) {
        // Redirect ke URL yang sesuai
        header("Location: " . $data[$r]);
        exit;
    } else {
        echo "ID tidak ditemukan.";
    }
} else {
    echo "Parameter yang dibutuhkan tidak ditemukan.";
}

?>
