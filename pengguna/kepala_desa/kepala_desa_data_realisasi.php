<?php
session_start();

// Periksa apakah pengguna sudah masuk atau belum
if (!isset($_SESSION['id_kepala_desa'])) {
    // Pengguna belum masuk, arahkan kembali ke halaman masuk.php
    header("Location: ../../berlangganan/login_pegunah");
    exit; // Pastikan untuk menghentikan eksekusi skrip setelah mengarahkan
}

// Jika pengguna sudah masuk, Anda dapat melanjutkan menampilkan halaman kepala_desa.php seperti biasa
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../../images/logo_dinas.png">
    <title>
        DATA REALISASI
    </title>

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
                        <a href="./kepala_desa_data_anggaran_dana"> <!-- Ubah admin menjadi kepala_desa -->
                            <i class="tim-icons icon-coins" style="font-size: 24px; color: #000000;"></i> <!-- Ikon koin -->
                            <p style="font-size: 15px; color: #000000;">Anggaran Dana</p>
                        </a>
                    </li>
                    <li>
                        <a href="./kepala_desa_data_program_kerja"> <!-- Ubah admin menjadi kepala_desa -->
                            <i class="tim-icons icon-notes" style="font-size: 24px; color: #000000;"></i> <!-- Ikon catatan -->
                            <p style="font-size: 15px; color: #000000;">Program Kerja</p>
                        </a>
                    </li>
                    <li>
                        <a href="./kepala_desa_data_kegiatan"> <!-- Ubah admin menjadi kepala_desa -->
                            <i class="tim-icons icon-calendar-60" style="font-size: 24px; color: #000000;"></i> <!-- Ikon kalender -->
                            <p style="font-size: 15px; color: #000000;">Kegiatan</p>
                        </a>
                    </li>
                    <li>
                        <a href="./kepala_desa_data_realisasi"> <!-- Ubah admin menjadi kepala_desa -->
                            <i class="tim-icons icon-check-2" style="font-size: 24px; color: #000000;"></i> <!-- Ikon ceklis -->
                            <p style="font-size: 15px; color: #000000;">Realisasi</p>
                        </a>
                    </li>
                    <li style="opacity: 0;">
                        <a href="./kepala_desa_data_Report">
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
                        <a class="navbar-brand" href="javascript:void(0)">Dashboard Kepala Desa</a>
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

                                        // Periksa apakah session id_kepala_desa telah diset
                                        if (isset($_SESSION['id_kepala_desa'])) {
                                            $id_kepala_desa = $_SESSION['id_kepala_desa'];

                                            // Query SQL untuk mengambil data kepala_desa berdasarkan id_kepala_desa dari session
                                            $query = "SELECT * FROM kepala_desa WHERE id_kepala_desa = '$id_kepala_desa'";
                                            $result = mysqli_query($koneksi, $query);

                                            // Periksa apakah query berhasil dieksekusi
                                            if ($result) {
                                                // Periksa apakah terdapat data kepala_desa
                                                if (mysqli_num_rows($result) > 0) {
                                                    // Ambil data kepala_desa sebagai array asosiatif
                                                    $kepala_desa = mysqli_fetch_assoc($result);
                                        ?>
                                                    <?php if (!empty($kepala_desa['fp'])) : ?>
                                                        <img class="avatar" src="data_fp/<?php echo $kepala_desa['fp']; ?>" alt="...">
                                                    <?php else : ?>
                                                        <img class="avatar" src="../../assets/img/anime3.png" alt="Profile Photo">
                                                    <?php endif; ?>
                                                    <h5 class="title">
                                                        <?php echo $kepala_desa['id_kepala_desa']; ?>
                                                    </h5>
                                        <?php
                                                } else {
                                                    // Jika tidak ada data kepala_desa
                                                    echo "Tidak ada data kepala_desa.";
                                                }
                                            } else {
                                                // Jika query tidak berhasil dieksekusi
                                                echo "Gagal mengambil data kepala_desa: " . mysqli_error($koneksi);
                                            }
                                        } else {
                                            // Jika session id_kepala_desa tidak diset
                                            echo "Session id_kepala_desa tidak tersedia.";
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
                            <form id="form_tambah" action="realisasi/tambah.php" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="status">Status Realisasi :</label>
                                    <select class="form-control" id="status" name="status" required>
                                        <option value="">Pilih Status Realisasi </option>
                                        <option value="Sudah Direalisasi">Sudah Direalisasi</option>
                                        <option value="Belum Direalisasi">Belum Direalisasi</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="id_kegiatan">kegiatan:</label>
                                    <select class="form-control" id="id_kegiatan" name="id_kegiatan" required>
                                        <option value="" selected>Silakan Pilih</option>
                                        <?php
                                        // Menggunakan include untuk menyertakan file koneksi
                                        include '../../keamanan/koneksi.php';

                                        // Query untuk mendapatkan data kegiatan
                                        $query = "SELECT id_kegiatan, nama_kegiatan FROM kegiatan";
                                        $result = $koneksi->query($query);

                                        // Periksa apakah query berhasil dieksekusi
                                        if ($result) {
                                            // Loop melalui hasil query dan tambahkan setiap opsi ke dalam select
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<option value='" . $row['id_kegiatan'] . "'>" . $row['nama_kegiatan'] . "</option>";
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
                                    <label for="biaya">Biaya :</label>
                                    <input type="text" class="form-control" id="biaya" name="biaya" required>
                                </div>
                                <script>
                                    document.addEventListener("DOMContentLoaded", function() {
                                        const formatNumber = (num) => {
                                            return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                                        };

                                        const parseNumber = (num) => {
                                            return num.replace(/\./g, "");
                                        };

                                        const jumlahKeuangan = document.getElementById('biaya');

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
                            <!-- Form untuk menambahkan atau mengedit data realisasi -->
                            <form id="form_edit" action="realisasi/edit.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" id="editid_realisasi" name="id_realisasi">
                                <div class="form-group">
                                    <label for="status">Status Realisasi :</label>
                                    <select class="form-control" id="editstatus" name="status" required>
                                        <option value="">Pilih Status Realisasi </option>
                                        <option value="Sudah Direalisasi">Sudah Direalisasi</option>
                                        <option value="Belum Direalisasi">Belum Direalisasi</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="id_kegiatan">kegiatan:</label>
                                    <select class="form-control" id="editid_kegiatan" name="id_kegiatan" required>
                                        <option value="" selected>Silakan Pilih</option>
                                        <?php
                                        // Menggunakan include untuk menyertakan file koneksi
                                        include '../../keamanan/koneksi.php';

                                        // Query untuk mendapatkan data kegiatan
                                        $query = "SELECT id_kegiatan, nama_kegiatan FROM kegiatan";
                                        $result = $koneksi->query($query);

                                        // Periksa apakah query berhasil dieksekusi
                                        if ($result) {
                                            // Loop melalui hasil query dan tambahkan setiap opsi ke dalam select
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<option value='" . $row['id_kegiatan'] . "'>" . $row['nama_kegiatan'] . "</option>";
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
                                    <label for="biaya">Biaya :</label>
                                    <input type="text" class="form-control" id="editbiaya" name="biaya" required>
                                </div>
                                <script>
                                    document.addEventListener("DOMContentLoaded", function() {
                                        const formatNumber = (num) => {
                                            return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                                        };

                                        const parseNumber = (num) => {
                                            return num.replace(/\./g, "");
                                        };

                                        const jumlahKeuangan = document.getElementById('editbiaya');

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
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- js edit -->
            <script>
                function openEditModal(id_realisasi, id_kegiatan, biaya, status) {
                    // Isi data ke dalam form edit
                    document.getElementById('editid_realisasi').value = id_realisasi;
                    document.getElementById('editstatus').value = status;
                    document.getElementById('editid_kegiatan').value = id_kegiatan;
                    document.getElementById('editbiaya').value = biaya;
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
                                                Data Realisasi
                                            </h2>

                                            <p class="category">Clik untuk cetak data realisasi</p>
                                            <hr>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-8 ml-auto mr-auto">
                                            <div class="row justify-content-center align-items-center">
                                                <div class="col-md-4">
                                                    <a href="realisasi/export" target="_blank" class="btn btn-info btn-block" data-toggle="tooltip" data-original-title="Edit user">
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
                    <div class="col-md-12">
                        <div class="card ">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table tablesorter " id="dataTable">
                                        <thead class=" text-primary">
                                            <tr>
                                                <th class="text-center">Nomor</th>
                                                <th class="text-center">Tahun Realisasi</th>
                                                <th class="text-center">Nama Kegiatan</th>
                                                <th class="text-center">Biaya</th>
                                                <th class="text-center">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            // Lakukan koneksi ke database
                                            include '../../keamanan/koneksi.php';
                                            // Ambil kata kunci pencarian dari URL jika ada
                                            $search_query = isset($_GET['search_query']) ? $_GET['search_query'] : '';
                                            // Query SQL untuk mengambil data dari tabel realisasi
                                            $query = "SELECT realisasi.*, kegiatan.nama_kegiatan AS nama_kegiatan
                                            FROM realisasi
                                            LEFT JOIN kegiatan ON realisasi.id_kegiatan = kegiatan.id_kegiatan";
                                            // Jika ada kata kunci pencarian, tambahkan klausa WHERE untuk mencocokkan 
                                            if (!empty($search_query)) {
                                                $query .= " WHERE nama_kegiatan LIKE '%$search_query%'";
                                            }
                                            // Balik urutan data untuk memunculkan yang paling baru di atas
                                            $query .= " ORDER BY id_realisasi DESC";
                                            $result = mysqli_query($koneksi, $query);
                                            // Variabel untuk menyimpan nomor urut
                                            $counter = 1;
                                            // Cek jika query berhasil dieksekusi
                                            if ($result) {
                                                // Lakukan iterasi untuk menampilkan setiap baris data dalam tabel
                                                while ($row = mysqli_fetch_assoc($result)) {

                                                    echo "<tr>";
                                                    echo "<td class='text-center'>" . htmlspecialchars($counter, ENT_QUOTES) . "</td>";
                                                    echo "<td class='text-center'>" . htmlspecialchars($row['tahun_realisasi'], ENT_QUOTES) . "</td>";
                                                    echo "<td class='text-center'>" . htmlspecialchars($row['nama_kegiatan'], ENT_QUOTES) . "</td>";
                                                    echo "<td class='text-center'>" . htmlspecialchars($row['biaya'], ENT_QUOTES) . "</td>";
                                                    echo "<td class='text-center'>" . htmlspecialchars($row['status'], ENT_QUOTES) . "</td>";
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
                xhr.open('POST', 'realisasi/tambah.php', true);
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
                xhr.open('POST', 'realisasi/edit.php', true);
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

                        xhr.open('POST', 'realisasi/hapus.php', true);
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
            xhrTable.open('GET', 'realisasi/load_table.php', true);
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