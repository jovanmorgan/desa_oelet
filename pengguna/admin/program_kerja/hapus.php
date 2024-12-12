<?php
include '../../../keamanan/koneksi.php';

// Terima ID program_kerja yang akan dihapus dari formulir HTML
$id_program_kerja = $_POST['id']; // Ubah menjadi $_GET jika menggunakan metode GET

// Lakukan validasi data
if (empty($id_program_kerja)) {
    echo "data_tidak_lengkap";
    exit();
}

// Ambil jumlah_anggaran_program dan id_anggaran_dana sebelum program kerja dihapus
$query_get_data = "SELECT jumlah_anggaran_program, id_anggaran_dana FROM program_kerja WHERE id_program_kerja = '$id_program_kerja'";
$result_get_data = mysqli_query($koneksi, $query_get_data);

if (mysqli_num_rows($result_get_data) == 0) {
    echo "data_tidak_ada";
    exit();
}

$row_data = mysqli_fetch_assoc($result_get_data);
$jumlah_anggaran_program_cleaned = preg_replace("/[^0-9]/", "", $row_data['jumlah_anggaran_program']); // Bersihkan dari tanda titik atau koma
$id_anggaran_dana = $row_data['id_anggaran_dana'];

// Ambil saldo kas dari tabel anggaran_dana
$query_get_saldo = "SELECT saldo_kas FROM anggaran_dana WHERE id_anggaran_dana = '$id_anggaran_dana'";
$result_get_saldo = mysqli_query($koneksi, $query_get_saldo);

if (mysqli_num_rows($result_get_saldo) == 0) {
    echo "saldo_kas_tidak_ditemukan";
    exit();
}

$row_saldo = mysqli_fetch_assoc($result_get_saldo);
$saldo_kas_cleaned = preg_replace("/[^0-9]/", "", $row_saldo['saldo_kas']);

// Tambahkan kembali jumlah_anggaran_program ke saldo kas
$saldo_terbaru = $saldo_kas_cleaned + $jumlah_anggaran_program_cleaned;

// Update saldo kas
$query_update_saldo = "UPDATE anggaran_dana SET saldo_kas = '$saldo_terbaru' WHERE id_anggaran_dana = '$id_anggaran_dana'";

if (!mysqli_query($koneksi, $query_update_saldo)) {
    echo "gagal_mengupdate_saldo_kas";
    exit();
}

// Setelah saldo kas diperbarui, hapus data program kerja
$query_delete_program_kerja = "DELETE FROM program_kerja WHERE id_program_kerja = '$id_program_kerja'";

if (mysqli_query($koneksi, $query_delete_program_kerja)) {
    echo "success";
} else {
    echo "error: gagal menghapus program kerja";
}

// Tutup koneksi ke database
mysqli_close($koneksi);
