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
        Desa oelet | sekretaris Dashboard
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
                        <div class="modal-header">
                            <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="SEARCH">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <i class="tim-icons icon-simple-remove"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Navbar -->
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                           
                                <div class="places-buttons">
                                  
       
                            </div>
                        </div>
                    </div>

                    <style>
                        

                        .card-chart {
                            transition: transform 0.3s, box-shadow 0.3s;
                            cursor: pointer;
                        }

                        .card-chart:hover {
                            transform: translateY(-10px);
                            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
                        }

                        .card-category {
                            font-weight: bold;
                            color: #00c853;
                        }

                        .card-title i {
                            font-size: 2em;
                            margin-right: 10px;
                            color: #000000;
                        }

                        .card-body p {
                            margin: 0;
                            font-size: 1.1em;
                        }
                    </style>

                    <!-- Section for Total Dashboard -->
                    <?php
                    // Include the database connection file
                    include '../../keamanan/koneksi.php';

                    // Define queries for each table
                    $queries = [
                        "SELECT COUNT(*) AS total FROM kepala_desa",
                        "SELECT COUNT(*) AS total FROM sekretaris",
                        "SELECT COUNT(*) AS total FROM masyarakat",
                        "SELECT COUNT(*) AS total FROM anggaran_dana",
                        "SELECT COUNT(*) AS total FROM program_kerja",
                        "SELECT COUNT(*) AS total FROM kegiatan",
                        "SELECT COUNT(*) AS total FROM realisasi",
                        "SELECT COUNT(*) AS total FROM bidang",
                        "SELECT COUNT(*) AS total FROM rab"
                    ];

                    // Initialize the total count
                    $total_count = 0;

                    // Execute each query and add the count to the total
                    foreach ($queries as $query) {
                        $result = mysqli_query($koneksi, $query);
                        if ($result) {
                            $row = mysqli_fetch_assoc($result);
                            $total_count += $row['total'];
                        }
                    }

                    // Close the database connection
                    mysqli_close($koneksi);
                    ?>
                    <div class="col-lg-4">
                        <div class="card card-chart" onclick="location.href='./dashboard'">
                            <div class="card-header">
                                <h5 class="card-category"  style="font-size: 15px; font-weight: bold; color: black">Total Semua Data</h5>
                                <h3 class="card-title"><i class="tim-icons icon-chart-pie-36"></i>
                                    <?php echo $total_count; ?> Data</h3>
                            </div>
                            <div class="card-body p-4"  style="font-size: 15px; font-weight: bold; color: black">
                                Semua Data pada Sistem Dana Desa Oelet
                            </div>
                        </div>
                    </div>

                    <!-- Other cards here -->
                    <!-- Anggaran Dana -->
                    <div class="col-lg-4">
                        <div class="card card-chart" onclick="location.href='./sekretaris_data_anggaran_dana'">
                            <div class="card-header">
                                <h5 class="card-category"  style="font-size: 15px; font-weight: bold; color: black">Total Anggaran Dana</h5>
                                <?php
                                include '../../keamanan/koneksi.php';

                                $query_count_anggaran_dana = "SELECT COUNT(*) AS total_anggaran_dana FROM anggaran_dana";
                                $result_count_anggaran_dana = mysqli_query($koneksi, $query_count_anggaran_dana);

                                if ($result_count_anggaran_dana) {
                                    $row_count_anggaran_dana = mysqli_fetch_assoc($result_count_anggaran_dana);
                                    $total_data_anggaran_dana = $row_count_anggaran_dana['total_anggaran_dana'];

                                    echo "<h3 class='card-title'><i class='tim-icons icon-coins'></i> $total_data_anggaran_dana Data</h3>";
                                } else {
                                    echo "<h3 class='font-weight-bolder'>Error</h3>";
                                }

                                mysqli_close($koneksi);
                                ?>
                            </div>
                            <div class="card-body p-4">
                                Jumlah data Anggaran Dana pada Sistem Dana Desa Oelet
                            </div>
                        </div>
                    </div>

                    <!-- Program Kerja -->
                    <div class="col-lg-4">
                        <div class="card card-chart" onclick="location.href='./sekretaris_data_program_kerja'">
                            <div class="card-header">
                                <h5 class="card-category" style="font-size: 15px; font-weight: bold; color: black">Total Program Kerja</h5>
                                <?php
                                include '../../keamanan/koneksi.php';

                                $query_count_program_kerja = "SELECT COUNT(*) AS total_program_kerja FROM program_kerja";
                                $result_count_program_kerja = mysqli_query($koneksi, $query_count_program_kerja);

                                if ($result_count_program_kerja) {
                                    $row_count_program_kerja = mysqli_fetch_assoc($result_count_program_kerja);
                                    $total_data_program_kerja = $row_count_program_kerja['total_program_kerja'];

                                    echo "<h3 class='card-title'><i class='tim-icons icon-notes'></i> $total_data_program_kerja Data</h3>";
                                } else {
                                    echo "<h3 class='font-weight-bolder'>Error</h3>";
                                }

                                mysqli_close($koneksi);
                                ?>
                            </div>
                            <div class="card-body p-4" style="font-size: 15px; font-weight: bold; color: black">
                                Jumlah data Program Kerja pada Sistem Dana Desa Oelet
                            </div>
                        </div>
                    </div>

                    <!-- Kegiatan -->
                    <div class="col-lg-4">
                        <div class="card card-chart" onclick="location.href='./sekretaris_data_kegiatan'">
                            <div class="card-header">
                                <h5 class="card-category" style="font-size: 15px; font-weight: bold; color: black">Total Kegiatan</h5>
                                <?php
                                include '../../keamanan/koneksi.php';

                                $query_count_kegiatan = "SELECT COUNT(*) AS total_kegiatan FROM kegiatan";
                                $result_count_kegiatan = mysqli_query($koneksi, $query_count_kegiatan);

                                if ($result_count_kegiatan) {
                                    $row_count_kegiatan = mysqli_fetch_assoc($result_count_kegiatan);
                                    $total_data_kegiatan = $row_count_kegiatan['total_kegiatan'];

                                    echo "<h3 class='card-title'><i class='tim-icons icon-calendar-60'></i> $total_data_kegiatan Data</h3>";
                                } else {
                                    echo "<h3 class='font-weight-bolder'>Error</h3>";
                                }

                                mysqli_close($koneksi);
                                ?>
                            </div>
                            <div class="card-body p-4"  style="font-size: 15px; font-weight: bold; color: black">
                                Jumlah data Kegiatan pada Sistem Dana Desa Oelet
                            </div>
                        </div>
                    </div>

                    <!-- Realisasi -->
                    <div class="col-lg-4">
                        <div class="card card-chart" onclick="location.href='./sekretaris_data_realisasi'">
                            <div class="card-header">
                                <h5 class="card-category" style="font-size: 15px; font-weight: bold; color: black">Total Realisasi</h5>
                                <?php
                                include '../../keamanan/koneksi.php';

                                $query_count_realisasi = "SELECT COUNT(*) AS total_realisasi FROM realisasi";
                                $result_count_realisasi = mysqli_query($koneksi, $query_count_realisasi);

                                if ($result_count_realisasi) {
                                    $row_count_realisasi = mysqli_fetch_assoc($result_count_realisasi);
                                    $total_data_realisasi = $row_count_realisasi['total_realisasi'];

                                    echo "<h3 class='card-title'><i class='tim-icons icon-check-2'></i> $total_data_realisasi Data</h3>";
                                } else {
                                    echo "<h3 class='font-weight-bolder'>Error</h3>";
                                }

                                mysqli_close($koneksi);
                                ?>
                            </div>
                            <div class="card-body p-4"  style="font-size: 15px; font-weight: bold; color: black">
                                Jumlah data Realisasi pada Sistem Dana Desa Oelet
                            </div>
                        </div>
                    </div>

                </div>
            </div>
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
                        </script> Dibuat Oleh ian
                    </div>
                </div>
            </footer>
        </div>
    </div>

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