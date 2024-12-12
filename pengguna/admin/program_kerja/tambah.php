<?php
include '../../../keamanan/koneksi.php';

// Terima data dari formulir HTML
$nama_program = $_POST['nama_program'];
$id_anggaran_dana = $_POST['id_anggaran_dana'];
$tujuan_program = $_POST['tujuan_program'];
$periode_pelaksanaan = $_POST['periode_pelaksanaan'];
$jumlah_anggaran_program = $_POST['jumlah_anggaran_program'];
$id_rab = $_POST['id_rab'];

// Lakukan validasi data
if (empty($nama_program) || empty($id_anggaran_dana) || empty($tujuan_program) || empty($periode_pelaksanaan) || empty($id_rab)) {
    echo "data_tidak_lengkap";
    exit();
}

// Membersihkan jumlah_anggaran_program agar hanya berisi angka
$jumlah_anggaran_program_cleaned = preg_replace("/[^0-9]/", "", $jumlah_anggaran_program);

// Cek saldo kas saat ini dari tabel anggaran_dana
$query_get_saldo = "SELECT saldo_kas FROM anggaran_dana WHERE id_anggaran_dana = '$id_anggaran_dana'";
$result_saldo = mysqli_query($koneksi, $query_get_saldo);

// Jika tidak menemukan saldo kas yang sesuai, berikan error
if (!$result_saldo || mysqli_num_rows($result_saldo) == 0) {
    echo "error: saldo kas tidak ditemukan";
    exit();
}

// Ambil saldo kas yang ada dan bersihkan dari titik atau koma
$row_saldo = mysqli_fetch_assoc($result_saldo);
$saldo_kas_cleaned = preg_replace("/[^0-9]/", "", $row_saldo['saldo_kas']); // Hilangkan titik atau koma

// Cek apakah saldo kas cukup
if ($jumlah_anggaran_program_cleaned > $saldo_kas_cleaned) {
    echo "saldo_tidak_cukup";
    exit();
}

// Jika saldo mencukupi, mulai transaksi agar semua query dieksekusi secara atomic
mysqli_begin_transaction($koneksi);

try {
    // Buat query SQL untuk menambahkan data program ke dalam database
    $tambahkan_titik_jumlah_anggaran = number_format($jumlah_anggaran_program_cleaned, 0, ',', '.');
    $tujuan_program_data = str_replace('<br>', "\n", $tujuan_program);
    $periode_pelaksanaan_formatted = ($periode_pelaksanaan);

    $query_insert_program = "INSERT INTO program_kerja (nama_program, id_anggaran_dana, tujuan_program, periode_pelaksanaan, id_rab, jumlah_anggaran_program) 
              VALUES ('$nama_program', '$id_anggaran_dana', '$tujuan_program_data', '$periode_pelaksanaan_formatted', '$id_rab', '$tambahkan_titik_jumlah_anggaran')";

    // Jalankan query insert
    if (!mysqli_query($koneksi, $query_insert_program)) {
        throw new Exception("Error inserting program: " . mysqli_error($koneksi));
    }

    // Setelah saldo dibersihkan dari titik atau koma, kurangi saldo kas
    $saldo_terbaru = $saldo_kas_cleaned - $jumlah_anggaran_program_cleaned;

    // setelah sudah dikurangi masukan kemabli titik kedalam $saldo_terbaru di setiap 3 angka
    $tambahan_titik_saldo = number_format($saldo_terbaru, 0, ',', '.');

    // Query untuk memperbarui saldo_kas di tabel anggaran_dana
    $query_update_saldo = "UPDATE anggaran_dana 
                           SET saldo_kas = '$tambahan_titik_saldo' 
                           WHERE id_anggaran_dana = '$id_anggaran_dana'";

    // Jalankan query update
    if (!mysqli_query($koneksi, $query_update_saldo)) {
        throw new Exception("Error updating saldo_kas: " . mysqli_error($koneksi));
    }

    // Jika semuanya sukses, commit transaksi
    mysqli_commit($koneksi);
    echo "success";
} catch (Exception $e) {
    // Jika ada error, rollback transaksi
    mysqli_rollback($koneksi);
    echo $e->getMessage();
}

// Tutup koneksi ke database
mysqli_close($koneksi);
