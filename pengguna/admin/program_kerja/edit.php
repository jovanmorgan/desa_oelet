<?php
include '../../../keamanan/koneksi.php';

// Terima data dari formulir HTML
$id_program_kerja = $_POST['id_program_kerja'];
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

// Ambil data `jumlah_anggaran_program` lama dari database
$query_get_old_data = "SELECT jumlah_anggaran_program FROM program_kerja WHERE id_program_kerja = '$id_program_kerja'";
$result_old_data = mysqli_query($koneksi, $query_get_old_data);

// Jika data program kerja tidak ditemukan, berikan error
if (!$result_old_data || mysqli_num_rows($result_old_data) == 0) {
    echo "error: data program kerja tidak ditemukan";
    exit();
}

// Ambil jumlah anggaran program sebelumnya
$row_old_data = mysqli_fetch_assoc($result_old_data);
$jumlah_anggaran_program_lama_cleaned = preg_replace("/[^0-9]/", "", $row_old_data['jumlah_anggaran_program']);

// Hitung perbedaan antara anggaran lama dan baru
$perbedaan_anggaran = $jumlah_anggaran_program_cleaned - $jumlah_anggaran_program_lama_cleaned;

// Ambil saldo kas saat ini dari tabel anggaran_dana
$query_get_saldo = "SELECT saldo_kas FROM anggaran_dana WHERE id_anggaran_dana = '$id_anggaran_dana'";
$result_saldo = mysqli_query($koneksi, $query_get_saldo);

// Jika tidak menemukan saldo kas yang sesuai, berikan error
if (!$result_saldo || mysqli_num_rows($result_saldo) == 0) {
    echo "error: saldo kas tidak ditemukan";
    exit();
}

// Ambil saldo kas dan bersihkan dari titik atau koma
$row_saldo = mysqli_fetch_assoc($result_saldo);
$saldo_kas_cleaned = preg_replace("/[^0-9]/", "", $row_saldo['saldo_kas']);

// Cek apakah saldo kas mencukupi jika perbedaan anggaran akan mengurangi saldo
if ($perbedaan_anggaran > 0 && $perbedaan_anggaran > $saldo_kas_cleaned) {
    echo "saldo_tidak_cukup";
    exit();
}

// Mulai transaksi
mysqli_begin_transaction($koneksi);

try {
    // Update saldo kas berdasarkan perbedaan anggaran
    $saldo_terbaru = $saldo_kas_cleaned - $perbedaan_anggaran;
    $tambahan_titik_saldo = number_format($saldo_terbaru, 0, ',', '.');
    // Query untuk memperbarui saldo kas
    $query_update_saldo = "UPDATE anggaran_dana SET saldo_kas = '$tambahan_titik_saldo' WHERE id_anggaran_dana = '$id_anggaran_dana'";

    // Jalankan query update saldo kas
    if (!mysqli_query($koneksi, $query_update_saldo)) {
        throw new Exception("Error updating saldo kas: " . mysqli_error($koneksi));
    }

    // Buat query SQL untuk memperbarui data program kerja
    $tujuan_program_data = str_replace('<br>', "\n", $tujuan_program);
    $periode_pelaksanaan_formatted = ($periode_pelaksanaan);
    $tambahkan_titik_jumlah_anggaran = number_format($jumlah_anggaran_program_cleaned, 0, ',', '.');
    $query_update_program = "UPDATE program_kerja SET 
        nama_program = '$nama_program', 
        id_anggaran_dana = '$id_anggaran_dana', 
        tujuan_program = '$tujuan_program_data', 
        periode_pelaksanaan = '$periode_pelaksanaan_formatted', 
        id_rab = '$id_rab',
        jumlah_anggaran_program = '$tambahkan_titik_jumlah_anggaran'
        WHERE id_program_kerja = '$id_program_kerja'";

    // Jalankan query update program kerja
    if (!mysqli_query($koneksi, $query_update_program)) {
        throw new Exception("Error updating program kerja: " . mysqli_error($koneksi));
    }

    // Commit transaksi jika semua berhasil
    mysqli_commit($koneksi);
    echo "success";
} catch (Exception $e) {
    // Rollback transaksi jika ada kesalahan
    mysqli_rollback($koneksi);
    echo $e->getMessage();
}

// Tutup koneksi
mysqli_close($koneksi);
