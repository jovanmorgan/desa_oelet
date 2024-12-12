<?php
session_start();

// Periksa apakah pengguna sudah masuk atau belum
if (!isset($_SESSION['id_sekretaris'])) {
    // Pengguna belum masuk, arahkan kembali ke halaman masuk.php
    header("Location: ../../berlangganan/login_pegunah");
    exit; // Pastikan untuk menghentikan eksekusi skrip setelah mengarahkan
}

// Jika pengguna sudah masuk, Anda dapat melanjutkan menampilkan halaman sekretaris.php seperti biasa
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../../images/logo_dinas.png">
    <title>
        DATA KEUANGAN
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <!-- Nucleo Icons -->
    <link href="../../assets/css/nucleo-icons.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link href="../../assets/css/black-dashboard.css?v=1.0.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../../assets/demo/demo.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body translate="no" class="white-content">
    <div class="wrapper">
        <div class="sidebar">
            <div class="sidebar-wrapper bg-white ">
                <div class="logo">
                    <a href="javascript:void(0)" class="simple-text logo-mini">
                        <img src="../../images/logo_dinas.png" width="50px" alt="" style="position: relative; bottom: 3px;">
                    </a>
                    <a href="javascript:void(0)" class="simple-text logo-normal position-relative" style="font-size: 14px; font-weight: bold; font-style: italic; right: 5px; color: #000000;" translate="no">
                        Desa Oelet
                    </a>

                </div>
                <ul class="nav">
                    <li class="active">
                        <a href="./dashboard">
                            <i class="tim-icons icon-chart-pie-36" style="font-size: 24px; color: #000000;"></i>
                            <p style="font-size: 15px; color: #000000;">Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a href="./sekretaris_data_anggaran_dana"> <!-- Ubah kepala_desa menjadi sekretaris -->
                            <i class="tim-icons icon-coins" style="font-size: 24px; color: #000000;"></i> <!-- Ikon koin -->
                            <p style="font-size: 15px; color: #000000;">Anggaran Dana</p>
                        </a>
                    </li>
                    <li>
                        <a href="./sekretaris_data_program_kerja"> <!-- Ubah kepala_desa menjadi sekretaris -->
                            <i class="tim-icons icon-notes" style="font-size: 24px; color: #000000;"></i> <!-- Ikon catatan -->
                            <p style="font-size: 15px; color: #000000;">Program Kerja</p>
                        </a>
                    </li>
                    <li>
                        <a href="./sekretaris_data_kegiatan"> <!-- Ubah kepala_desa menjadi sekretaris -->
                            <i class="tim-icons icon-calendar-60" style="font-size: 24px; color: #000000;"></i> <!-- Ikon kalender -->
                            <p style="font-size: 15px; color: #000000;">Kegiatan</p>
                        </a>
                    </li>
                    <li>
                        <a href="./sekretaris_data_realisasi"> <!-- Ubah kepala_desa menjadi sekretaris -->
                            <i class="tim-icons icon-check-2" style="font-size: 24px; color: #000000;"></i> <!-- Ikon ceklis -->
                            <p style="font-size: 15px; color: #000000;">Realisasi</p>
                        </a>
                    </li>
                    <li style="opacity: 0;">
                        <a href="./sekretaris_data_Report">
                            <i class="tim-icons icon-chart-bar-32"></i>
                            <p>Data</p>
                        </a>
                    </li>
                    <br>
                    <br>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-toggle d-inline">
                            <button type="button" class="navbar-toggler">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </button>
                        </div>
                        <a class="navbar-brand" href="javascript:void(0)">Dashboard sekretaris</a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navigation">
                        <ul class="navbar-nav ml-auto">
                            <li class="search-bar input-group">
                                <button class="btn btn-link" id="search-button" data-toggle="modal" data-target="#searchModal"><i class="tim-icons icon-zoom-split"></i>
                                    <span class="d-lg-none d-md-block">Search</span>
                                </button>
                            </li>
                            <li class="dropdown nav-item">
                                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                    <div class="photo">
                                        <?php
                                        // Lakukan koneksi ke database
                                        include '../../keamanan/koneksi.php';

                                        // Periksa apakah session id_sekretaris telah diset
                                        if (isset($_SESSION['id_sekretaris'])) {
                                            $id_sekretaris = $_SESSION['id_sekretaris'];

                                            // Query SQL untuk mengambil data sekretaris berdasarkan id_sekretaris dari session
                                            $query = "SELECT * FROM sekretaris WHERE id_sekretaris = '$id_sekretaris'";
                                            $result = mysqli_query($koneksi, $query);

                                            // Periksa apakah query berhasil dieksekusi
                                            if ($result) {
                                                // Periksa apakah terdapat data sekretaris
                                                if (mysqli_num_rows($result) > 0) {
                                                    // Ambil data sekretaris sebagai array asosiatif
                                                    $sekretaris = mysqli_fetch_assoc($result);
                                        ?>
                                                    <?php if (!empty($sekretaris['fp'])) : ?>
                                                        <img class="avatar" src="data_fp/<?php echo $sekretaris['fp']; ?>" alt="...">
                                                    <?php else : ?>
                                                        <img class="avatar" src="../../assets/img/anime3.png" alt="Profile Photo">
                                                    <?php endif; ?>
                                                    <h5 class="title">
                                                        <?php echo $sekretaris['id_sekretaris']; ?>
                                                    </h5>
                                        <?php
                                                } else {
                                                    // Jika tidak ada data sekretaris
                                                    echo "Tidak ada data sekretaris.";
                                                }
                                            } else {
                                                // Jika query tidak berhasil dieksekusi
                                                echo "Gagal mengambil data sekretaris: " . mysqli_error($koneksi);
                                            }
                                        } else {
                                            // Jika session id_sekretaris tidak diset
                                            echo "Session id_sekretaris tidak tersedia.";
                                        }

                                        // Tutup koneksi ke database
                                        mysqli_close($koneksi);
                                        ?>

                                    </div>
                                    <b class="caret d-none d-lg-block d-xl-block"></b>
                                    <p class="d-lg-none">
                                        Log out
                                    </p>
                                </a>
                                <ul class="dropdown-menu dropdown-navbar">
                                    <li class="nav-link"><a href="foto_profile" class="nav-item dropdown-item"style="font-size: 14px; font-weight: bold; color: black">Profile</a></li>
                                    <li class="nav-link"><a href="logout" class="nav-item dropdown-item" style="font-size: 14px; font-weight: bold; color: black">Log
                                            out</a></li>
                                </ul>
                            </li>
                            <li class="separator d-lg-none"></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="modal modal-search fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModal" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form action="" method="GET">
                            <div class="modal-header">
                                <input type="text" name="search_query" class="form-control" id="inlineFormInputGroup" placeholder="SEARCH">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <i class="tim-icons icon-simple-remove"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- End Navbar -->

            <!-- Modal Tambah Data Tamabh -->
            <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTambah" style="font-size: 250%;">Tambah
                                Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" style="font-size: 240%;">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Form untuk menambahkan data tambah -->
                            <form id="form_tambah" action="keuangan/tambah.php" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="id_anggaran_dana">Anggaran Dana :</label>
                                    <select class="form-control" id="id_anggaran_dana" name="id_anggaran_dana" required>
                                        <option value="" selected>Silakan Pilih</option>
                                        <?php
                                        // Menggunakan include untuk menyertakan file koneksi
                                        include '../../keamanan/koneksi.php';

                                        // Query untuk mendapatkan data anggaran_dana
                                        $query = "SELECT id_anggaran_dana, jumlah_anggaran, sumber_anggaran, saldo_kas FROM anggaran_dana";
                                        $result = $koneksi->query($query);

                                        // Periksa apakah query berhasil dieksekusi
                                        if ($result) {
                                            // Loop melalui hasil query dan tambahkan setiap opsi ke dalam select
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<option value='" . $row['id_anggaran_dana'] . "'> Anggaran : " . $row['jumlah_anggaran'] . " | Sumber : " . $row['sumber_anggaran'] . " | Sisa : " . $row['saldo_kas'] . "</option>";
                                            }
                                            // Bebaskan hasil query
                                            $result->free();
                                        } else {
                                            echo "Gagal mengeksekusi query: " . $koneksi->error;
                                        }

                                        // Tutup koneksi
                                        $koneksi->close();
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal">Tanggal :</label>
                                    <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                                </div>
                                <div class="form-group">
                                    <label for="nomor_rekening">Nomor Rekening :</label>
                                    <input type="number" min="0" class="form-control" id="nomor_rekening" name="nomor_rekening" required>
                                </div>
                                <div class="form-group">
                                    <label for="jenis_transaksi">Jenis Transaksi :</label>
                                    <select class="form-control" id="jenis_transaksi" name="jenis_transaksi" required>
                                        <option value="">Pilih Jenis Transaksi </option>
                                        <option value="Pengeluaran">Pengeluaran</option>
                                        <option value="Pemasukan">Pemasukan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="jumlah">jumlah :</label>
                                    <input type="text" class="form-control" id="jumlah" name="jumlah" required>
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan :</label>
                                    <textarea class="form-control" id="keterangan" name="keterangan" required></textarea>
                                </div>

                                <script>
                                    document.addEventListener("DOMContentLoaded", function() {
                                        const formatNumber = (num) => {
                                            return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                                        };

                                        const parseNumber = (num) => {
                                            return num.replace(/\./g, "");
                                        };

                                        const jumlahKeuangan = document.getElementById('jumlah');

                                        const formatInput = (input) => {
                                            input.addEventListener('input', () => {
                                                let value = input.value;
                                                value = parseNumber(value);
                                                if (!isNaN(value) && value !== "") {
                                                    input.value = formatNumber(value);
                                                } else {
                                                    input.value = "";
                                                }
                                            });
                                        };

                                        formatInput(jumlahKeuangan);

                                        const validateForm = () => {
                                            jumlahKeuangan.value = parseNumber(jumlahKeuangan.value);
                                        };

                                        const form = document.querySelector('form');
                                        if (form) {
                                            form.addEventListener('submit', validateForm);
                                        }
                                    });
                                </script>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Tambahkan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Edit Modal -->
            <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel" style="font-size: 250%;">Edit Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" style="font-size: 240%;">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Form untuk menambahkan atau mengedit data keuangan -->
                            <form id="form_edit" action="keuangan/edit.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" id="editid_keuangan" name="id_keuangan">
                                <div class="form-group">
                                    <label for="id_anggaran_dana">Anggaran Dana :</label>
                                    <select class="form-control" id="editid_anggaran_dana" name="id_anggaran_dana" required>
                                        <option value="" selected>Silakan Pilih</option>
                                        <?php
                                        // Menggunakan include untuk menyertakan file koneksi
                                        include '../../keamanan/koneksi.php';

                                        // Query untuk mendapatkan data anggaran_dana
                                        $query = "SELECT id_anggaran_dana, jumlah_anggaran, sumber_anggaran, saldo_kas FROM anggaran_dana";
                                        $result = $koneksi->query($query);

                                        // Periksa apakah query berhasil dieksekusi
                                        if ($result) {
                                            // Loop melalui hasil query dan tambahkan setiap opsi ke dalam select
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<option value='" . $row['id_anggaran_dana'] . "'> Anggaran : " . $row['jumlah_anggaran'] . " | Sumber : " . $row['sumber_anggaran'] . " | Sisa : " . $row['saldo_kas'] . "</option>";
                                            }
                                            // Bebaskan hasil query
                                            $result->free();
                                        } else {
                                            echo "Gagal mengeksekusi query: " . $koneksi->error;
                                        }

                                        // Tutup koneksi
                                        $koneksi->close();
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal">Tanggal :</label>
                                    <input type="date" class="form-control" id="edittanggal" name="tanggal" required>
                                </div>
                                <div class="form-group">
                                    <label for="nomor_rekening">Nomor Rekening :</label>
                                    <input type="number" min="0" class="form-control" id="editnomor_rekening" name="nomor_rekening" required>
                                </div>
                                <div class="form-group">
                                    <label for="jenis_transaksi">Jenis Transaksi :</label>
                                    <select class="form-control" id="editjenis_transaksi" name="jenis_transaksi" required>
                                        <option value="">Pilih Jenis Transaksi </option>
                                        <option value="Pengeluaran">Pengeluaran</option>
                                        <option value="Pemasukan">Pemasukan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="jumlah">jumlah :</label>
                                    <input type="text" class="form-control" id="editjumlah" name="jumlah" required>
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan :</label>
                                    <textarea class="form-control" id="editketerangan" name="keterangan" required></textarea>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- js edit -->
            <script>
                function openEditModal(id_keuangan, id_anggaran_dana, tanggal, nomor_rekening, jenis_transaksi, jumlah, keterangan) {
                    keterangan_data = keterangan.replace(/<br\s*\/?>/gi, '\n');
                    // Isi data ke dalam form edit
                    document.getElementById('editid_keuangan').value = id_keuangan;
                    document.getElementById('editid_anggaran_dana').value = id_anggaran_dana;
                    document.getElementById('edittanggal').value = tanggal;
                    document.getElementById('editnomor_rekening').value = nomor_rekening;
                    document.getElementById('editjenis_transaksi').value = jenis_transaksi;
                    document.getElementById('editjumlah').value = jumlah;
                    document.getElementById('editketerangan').value = keterangan;
                    $('#editModal').modal('show');
                }
            </script>

            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="places-buttons">
                                    <div class="row">
                                        <div class="col-md-6 ml-auto mr-auto text-center">
                                            <h2 class="card-title">
                                                Data Keuangan
                                            </h2>

                                            <p class="category">Clik untuk cetak data Keuangan</p>
                                            <hr>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-8 ml-auto mr-auto">
                                            <div class="row justify-content-center align-items-center">
                                                <div class="col-md-4">
                                                    <a href="keuangan/export" target="_blank" class="btn btn-info btn-block" data-toggle="tooltip" data-original-title="Edit user">
                                                        CETAK
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <style>
                        .column-fixed {
                            white-space: nowrap;
                        }

                        .column-wide {
                            white-space: nowrap;
                            min-width: 200px;
                            /* Sesuaikan dengan kebutuhan Anda */
                        }
                    </style>
                    <div class="col-md-12">
                        <div class="card ">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table tablesorter " id="dataTable">
                                        <thead class=" text-primary">
                                            <tr>
                                                <th class="text-center column-fixed">Nomor</th>
                                                <th class="text-center column-fixed">Tahun Anggaran</th>
                                                <th class="text-center column-fixed">Jumlah Anggaran</th>

                                                <th class="text-center column-fixed">Tanggal</th>
                                                <th class="text-center column-fixed">Nomor Rekening</th>
                                                <th class="text-center column-fixed">Jenis Transaksi</th>
                                                <th class="text-center column-fixed">Jumlah Transaksi</th>
                                                <th class="text-center column-fixed">Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            // Lakukan koneksi ke database
                                            include '../../keamanan/koneksi.php';
                                            // Ambil kata kunci pencarian dari URL jika ada
                                            $search_query = isset($_GET['search_query']) ? $_GET['search_query'] : '';
                                            // Query SQL untuk mengambil data dari tabel keuangan
                                            $query = "SELECT keuangan.*, anggaran_dana.tahun_anggaran AS tahun_anggaran, anggaran_dana.jumlah_anggaran AS jumlah_anggaran, anggaran_dana.saldo_kas AS sisah_saldo_kas
                                            FROM keuangan
                                            LEFT JOIN anggaran_dana ON keuangan.id_anggaran_dana = anggaran_dana.id_anggaran_dana";
                                            // Jika ada kata kunci pencarian, tambahkan klausa WHERE untuk mencocokkan 
                                            if (!empty($search_query)) {
                                                $query .= " WHERE anggaran_dana.tahun_anggaran LIKE '%$search_query%' OR anggaran_dana.jumlah_anggaran LIKE '%$search_query%' OR anggaran_dana.saldo_kas LIKE '%$search_query%' OR keuangan.tanggal LIKE '%$search_query%' OR keuangan.nomor_rekening LIKE '%$search_query%' OR keuangan.jenis_transaksi LIKE '%$search_query%' OR keuangan.jumlah LIKE '%$search_query%' OR keuangan.keterangan LIKE '%$search_query%'";
                                            }
                                            // Balik urutan data untuk memunculkan yang paling baru di atas
                                            $query .= " ORDER BY id_keuangan DESC";

                                            $result = mysqli_query($koneksi, $query);
                                            // Variabel untuk menyimpan nomor urut
                                            $counter = 1;
                                            // Cek jika query berhasil dieksekusi
                                            if ($result) {
                                                // Lakukan iterasi untuk menampilkan setiap baris data dalam tabel
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    $keterangan_sambung = str_replace(array("\r", "\n"), '', nl2br($row['keterangan']));
                                                    $tanggal_input = $row['tanggal'];
                                                    $tanggal_input_data = date('Y-m-d', strtotime($tanggal_input));
                                                    echo "<tr>";
                                                    echo "<td class='text-center'>" . htmlspecialchars($counter, ENT_QUOTES) . "</td>";
                                                    echo "<td class='text-center'>" . htmlspecialchars($row['tahun_anggaran'], ENT_QUOTES) . "</td>";
                                                    echo "<td class='text-center'>" . htmlspecialchars($row['jumlah_anggaran'], ENT_QUOTES) . "</td>";
                                                    echo "<td class='text-center'>" . htmlspecialchars($row['tanggal'], ENT_QUOTES) . "</td>";
                                                    echo "<td class='text-center'>" . htmlspecialchars($row['nomor_rekening'], ENT_QUOTES) . "</td>";
                                                    echo "<td class='text-center'>" . htmlspecialchars($row['jenis_transaksi'], ENT_QUOTES) . "</td>";
                                                    echo "<td class='text-center'>" . htmlspecialchars($row['jumlah'], ENT_QUOTES) . "</td>";
                                                    echo "<td class='text-center'>" . htmlspecialchars($row['keterangan'], ENT_QUOTES) . "</td>";
                                                    echo "</tr>";

                                                    // Increment nomor urut
                                                    $counter++;
                                                }
                                            } else {
                                                echo "<td class='text-center' colspan='7'><h3>Gagal mengambil data dari database</h3></td>";
                                            }

                                            // Tutup koneksi ke database
                                            mysqli_close($koneksi);
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <style>
                .button-like {
                    display: inline-block;
                    padding: 7px 20px;
                    background-color: #007bff;
                    border: 1px solid #ccc;
                    border-radius: 10px;
                    cursor: default;
                    color: #fff;
                }
            </style>
            <footer class="footer">
                <div class="container-fluid">
                    <ul class="nav">

                        <li class="nav-item">
                            <a href="javascript:void(0)" class="nav-link">
                                About Us
                            </a>
                        </li>

                    </ul>
                    <div class="copyright">
                        ©
                        <script>
                            document.write(new Date().getFullYear())
                        </script> ian
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!--=============== LOADING ===============-->
    <div class="loading">
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
    </div>

    <style>
        .loading {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            display: none;
            /* Mula-mula, loading disembunyikan */
            justify-content: center;
            align-items: center;
            z-index: 9999;
            /* Menempatkan loading di atas elemen lain */
            height: 100vh;
            width: 100vw;
            background-color: rgba(255, 255, 255, 0.932);
            /* Menambahkan latar belakang semi transparan */
        }

        .circle {
            width: 20px;
            height: 20px;
            background-color: #41a506;
            border-radius: 50%;
            margin: 0 10px;
            animation: bounce 0.5s infinite alternate;
        }

        .circle:nth-child(2) {
            animation-delay: 0.2s;
        }

        .circle:nth-child(3) {
            animation-delay: 0.4s;
        }

        @keyframes bounce {
            from {
                transform: translateY(0);
            }

            to {
                transform: translateY(-20px);
            }
        }
    </style>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        const loding = document.querySelector('.loading');

        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('form_tambah').addEventListener('submit', function(event) {
                event.preventDefault(); // Menghentikan aksi default form submit

                var form = this;
                var formData = new FormData(form);

                // Tampilkan elemen .loading sebelum mengirimkan permintaan AJAX
                loding.style.display = 'flex';

                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'keuangan/tambah.php', true);
                xhr.onload = function() {
                    // Sembunyikan elemen .loading setelah permintaan AJAX selesai
                    loding.style.display = 'none';

                    if (xhr.status === 200) {
                        var response = xhr.responseText.trim();
                        console.log(response); // Debugging

                        if (response === 'success') {
                            form.reset();
                            $('#modalTambah').modal('hide');
                            loadTable();
                            swal("Berhasil!", "Data berhasil ditambahkan", "success").then(() => {});
                        } else if (response === 'data_tidak_lengkap') {
                            swal("Error", "Data yang anda masukan belum lengkap", "info");
                        } else if (response === 'saldo_kas_tidak_mencukupi') {
                            swal("Salah", "Saldo kas tidak mencukupi!, saldo kas tinggal", "info");
                        } else {
                            swal("Error", "Gagal menambahkan data", "error");
                        }
                    } else {
                        swal("Error", "Terjadi kesalahan saat mengirim data", "error");
                    }
                };
                xhr.send(formData);
            });
        });

        // logika untuk mengedit Data
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('form_edit').addEventListener('submit', function(event) {
                event.preventDefault(); // Menghentikan aksi default form submit

                var form = this;
                var formData = new FormData(form);
                // Tampilkan elemen .loading sebelum mengirimkan permintaan AJAX
                loding.style.display = 'flex';

                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'keuangan/edit.php', true);
                xhr.onload = function() {

                    // Sembunyikan elemen .loading setelah permintaan AJAX selesai
                    loding.style.display = 'none';

                    if (xhr.status === 200) {
                        var response = xhr.responseText.trim();
                        console.log(response); // Debugging

                        if (response === 'success') {
                            form.reset();
                            $('#editModal').modal('hide');
                            loadTable();
                            swal("Berhasil!", "Data berhasil diedit", "success").then(() => {});
                        } else if (response === 'data_tidak_lengkap') {
                            swal("Error", "Data yang anda masukan belum lengkap", "info");
                        } else {
                            swal("Error", "Gagal mengedit data", "error");
                        }
                    } else {
                        swal("Error", "Terjadi kesalahan saat mengirim data", "error");
                    }
                };
                xhr.send(formData);
            });
        });

        // logika untuk menghapus data video
        function hapus(id) {
            swal({
                    title: "Apakah Anda yakin?",
                    text: "Setelah dihapus, Anda tidak akan dapat memulihkan data ini!",
                    icon: "warning",
                    buttons: ["Batal", "Ya, hapus!"],
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        // Jika pengguna mengonfirmasi untuk menghapus
                        var xhr = new XMLHttpRequest();

                        // Tampilkan elemen .loading sebelum mengirimkan permintaan AJAX
                        loding.style.display = 'flex';

                        xhr.open('POST', 'keuangan/hapus.php', true);
                        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                        xhr.onload = function() {

                            // Sembunyikan elemen .loading setelah permintaan AJAX selesai
                            loding.style.display = 'none';

                            if (xhr.status === 200) {
                                var response = xhr.responseText;
                                if (response === 'success') {
                                    swal("Sukses!", "Data berhasil dihapus.", "success")
                                    loadTable();
                                } else {
                                    swal("Error", "Gagal menghapus Data.", "error");
                                }
                            } else {
                                swal("Error", "Terjadi kesalahan saat mengirim data.", "error");
                            }
                        };
                        xhr.send("id=" + id);
                    } else {
                        // Jika pengguna membatalkan penghapusan
                        swal("Penghapusan dibatalkan", {
                            icon: "info",
                        });
                    }
                });
        }


        function loadTable() {
            var xhrTable = new XMLHttpRequest();
            xhrTable.onreadystatechange = function() {
                if (xhrTable.readyState == 4 && xhrTable.status == 200) {
                    // Perbarui konten tabel dengan respons dari server
                    document.getElementById('dataTable').innerHTML = xhrTable.responseText;
                }
            };
            xhrTable.open('GET', 'keuangan/load_table.php', true);
            xhrTable.send();
        }
    </script>


    <!--   Core JS Files   -->
    <script src="../../assets/js/core/jquery.min.js"></script>
    <script src="../../assets/js/core/popper.min.js"></script>
    <script src="../../assets/js/core/bootstrap.min.js"></script>
    <script src="../../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!--  Google Maps Plugin    -->
    <!-- Place this tag in your head or just before your close body tag. -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Chart JS -->
    <script src="../../assets/js/plugins/chartjs.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="../../assets/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Black Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../../assets/js/black-dashboard.min.js?v=1.0.0"></script>
    <!-- Black Dashboard DEMO methods, don't include it in your project! -->
    <script src="../../assets/demo/demo.js"></script>
    <script>
        $(document).ready(function() {
            // Javascript method's body can be found in assets/js/demos.js
            demo.initDashboardPageCharts();

        });
    </script>
    <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
    <script>
        window.TrackJS &&
            TrackJS.install({
                token: "ee6fab19c5a04ac1a32a645abde4613a",
                application: "black-dashboard-free"
            });
    </script>
</body>

</html>