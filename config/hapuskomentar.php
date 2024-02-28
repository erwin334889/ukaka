<?php
// pastikan session sudah dimulai dan koneksi terhubung
session_start();
include 'koneksi.php';

// Periksa jika pengguna sudah login
if (!isset($_SESSION['userid']) || $_SESSION['status'] !== 'login') {
    // Redirect atau keluarkan pesan kesalahan sesuai dengan kebutuhan Anda
    exit('Anda tidak memiliki izin untuk mengakses halaman ini.');
}

// Periksa apakah parameter komentarid telah diterima
if (isset($_GET['komentarid'])) {
    // Lindungi dari serangan SQL Injection
    $komentarId = mysqli_real_escape_string($koneksi, $_GET['komentarid']);

    // Query hapus komentar dari database
    $query = "DELETE FROM komentarfoto WHERE komentarid = '$komentarId'";
    $result = mysqli_query($koneksi, $query);

    // Periksa jika penghapusan berhasil
    if ($result) {
        // Redirect kembali ke halaman sebelumnya setelah penghapusan berhasil
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
    } else {
        // Jika gagal menghapus, tampilkan pesan kesalahan
        exit('Gagal menghapus komentar.');
    }
} else {
    // Jika parameter tidak diterima, tampilkan pesan kesalahan
    exit('Parameter komentarid diperlukan.');
}