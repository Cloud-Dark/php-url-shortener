<?php

// Path ke file JSON untuk menyimpan data mapping id dan url
define('DATA_FILE', 'data.json');

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

// Mengecek apakah request menggunakan parameter 'id' dan 'url'
if (isset($_GET['id']) && isset($_GET['url'])) {
    $id = $_GET['id'];
    $url = $_GET['url'];

    // Ambil data yang ada
    $data = getData();

    // Simpan data id dan url
    $data[$id] = $url;

    // Simpan data kembali ke file JSON
    saveData($data);

    // Tampilkan response seperti yang diinginkan
    echo "s.apipedia.id?r=$id";
    
} elseif (isset($_GET['r'])) {
    // Jika parameter 'r' ada, kita cari URL berdasarkan 'r'
    $r = $_GET['r'];
    $data = getData();

    // Periksa apakah 'r' ada dalam data
    if (isset($data[$r])) {
        // Arahkan ke URL yang sesuai
        header("Location: " . $data[$r]);
        exit;
    } else {
        echo "ID tidak ditemukan.";
    }
} else {
    echo "Parameter yang dibutuhkan tidak ditemukan.";
}

?>
