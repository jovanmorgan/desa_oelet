<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DANA DESA OELET</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="style.css" />
    <link rel="shortcut icon" href="images/logo_dinas.png" type="" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            text-decoration: none;
            list-style: none;
        }

        .topnav {
            background-color: #000000;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .topnav a {
            color: #ffffff;
            text-decoration: none;
        }

        .topnav a i {
            margin-right: 5px;
        }

        .column-fixed {
            white-space: nowrap;
        }

        .column-wide {
            white-space: nowrap;
            min-width: 200px;
        }

        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
            font-size: 18px;
        }

        table th, table td {
            padding: 8px 12px;
            text-align: center;
            border: 1px solid #000;
        }

        table th {
            background-color: #f8f9fa;
            font-weight: bold;
            color: #007bff;
        }

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .footer-text {
            position: fixed;
            bottom: 0;
            width: 100%;
            text-align: center;
            padding: 10px;
            background-color: #f8f9fa;
            font-size: 14px;
            color: #000;
        }

        .loading {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            height: 100vh;
            width: 100vw;
            background-color: rgba(255, 255, 255, 0.932);
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
</head>

<body>
    <nav class="topnav">
        <a href="#"><i class="fa fa-fw fa-phone"></i>085737850151 / 82340378021</a>
        <a href="#"><i class="fa fa-fw fa-map-marker"></i>Jl.EON FENAI, Desa Oelet, Amanuban Timur, TTS, Nusa Tenggara Timur.</a>
        <a href="#"><i class="fa fa-fw fa-envelope"></i>desaoelet@gmail.com</a>
    </nav>

    <nav class="navbar navbar-expand-lg bg-light navbar-light sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="images/logo_dinas.png"
                    style="width: 50px; height: 50px; margin-right: 10px;" alt=""> DESA OELET</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="homepage.php">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Informasi</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="pengumuman.php">Pengumuman</a></li>
                            <li><a class="dropdown-item" href="Program_kerja.php">Program Kerja</a></li>
                            <li><a class="dropdown-item" href="anggaran_dana.php">Anggaran Dana Desa</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link " href="galeri.php">Galeri</a>

                    </li>
                </ul>
            </div>
            <a href="berlangganan/login_pegunah.php"><button type="button" class="btn btn-info">Login</button></a>
        </div>
    </nav>

    <!-- Carousel -->
    <div id="demo" class="carousel slide" data-bs-ride="carousel">
        <!-- Indicators/dots -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
        </div>
    </div>

    <div class="col-md-12">
        <div class="text-bg-secondary p-3">Laporan Program Kerja Tahun Anggaran 2024/2025</div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nomor</th>
                        <th>Nama Program</th>
                        <th>Tahun Anggaran</th>
                        <th>Jumlah Anggaran</th>
                        <th>Tujuan Program</th>
                        <th>Periode Pelaksanaan</th>
                        <th>Penggunaan Rab</th>
                        <th>Tanggal Pelaksanaan Rab</th>
                        <th>Nama Bidang</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                                            // Lakukan koneksi ke database
                                            include 'keamanan/koneksi.php';

                                            // Ambil kata kunci pencarian dari URL jika ada
                                            $search_query = isset($_GET['search_query']) ? $_GET['search_query'] : '';

                                            // Query SQL untuk mengambil data dari tabel program_kerja
                                            $query = "SELECT program_kerja.*, anggaran_dana.tahun_anggaran AS tahun_anggaran, anggaran_dana.jumlah_anggaran AS jumlah_anggaran, anggaran_dana.saldo_kas AS sisah_saldo_kas, rab.penggunaan AS penggunaan_rab, rab.tgl_pelaksanaan AS tgl_pelaksanaan_rab, rab.tgl_rab AS tgl_rab, bidang.nama_bidang AS nama_bidang
                                                            FROM program_kerja
                                                            LEFT JOIN anggaran_dana ON program_kerja.id_anggaran_dana = anggaran_dana.id_anggaran_dana
                                                            LEFT JOIN bidang ON anggaran_dana.id_bidang = bidang.id_bidang
                                                            LEFT JOIN rab ON program_kerja.id_rab = rab.id_rab";

                                            // Jika ada kata kunci pencarian, tambahkan klausa WHERE untuk mencocokkan 
                                            if (!empty($search_query)) {
                                                $query .= " WHERE program_kerja.nama_program LIKE '%$search_query%' OR program_kerja.tujuan_program LIKE '%$search_query%' OR program_kerja.periode_pelaksanaan LIKE '%$search_query%' OR program_kerja.status LIKE '%$search_query%' OR anggaran_dana.tahun_anggaran LIKE '%$search_query%' OR anggaran_dana.jumlah_anggaran LIKE '%$search_query%' OR anggaran_dana.saldo_kas LIKE '%$search_query%' OR rab.penggunaan LIKE '%$search_query%' OR rab.tgl_pelaksanaan LIKE '%$search_query%' OR rab.tgl_rab LIKE '%$search_query%' OR bidang.nama_bidang LIKE '%$search_query%'";
                                            }

                                            // Balik urutan data untuk memunculkan yang paling baru di atas
                                            $query .= " ORDER BY id_program_kerja DESC";
                                            $result = mysqli_query($koneksi, $query);

                                            // Variabel untuk menyimpan nomor urut
                                            $counter = 1;

                                            // Cek jika query berhasil dieksekusi
                                            if ($result) {
                                                // Lakukan iterasi untuk menampilkan setiap baris data dalam tabel
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    $tujuan_program_sambung = str_replace(array("\r", "\n"), '', nl2br($row['tujuan_program']));
                                                    $periode_pelaksanaan_input = $row['periode_pelaksanaan'];
                                                    $periode_pelaksanaan_input_data = date('Y-m-d', strtotime($periode_pelaksanaan_input));
                                                    echo "<tr>";
                                                    echo "<td class='text-center'>" . htmlspecialchars($counter, ENT_QUOTES) . "</td>";
                                                    echo "<td class='text-center'>" . htmlspecialchars($row['nama_program'], ENT_QUOTES) . "</td>";
                                                    echo "<td class='text-center'>" . htmlspecialchars($row['tahun_anggaran'], ENT_QUOTES) . "</td>";
                                                    echo "<td class='text-center'>" . htmlspecialchars($row['jumlah_anggaran'], ENT_QUOTES) . "</td>";
                                                    echo "<td class='text-center'>" . $tujuan_program_sambung . "</td>";
                                                    echo "<td class='text-center'>" . htmlspecialchars($row['periode_pelaksanaan'], ENT_QUOTES) . "</td>";
                                                    echo "<td class='text-center'>" . htmlspecialchars($row['penggunaan_rab'], ENT_QUOTES) . "</td>";
                                                    echo "<td class='text-center'>" . htmlspecialchars($row['tgl_pelaksanaan_rab'], ENT_QUOTES) . "</td>";
                                                    echo "<td class='text-center'>" . htmlspecialchars($row['nama_bidang'], ENT_QUOTES) . "</td>";
                                                    // Modifikasi bagian tampilan status
                                                    echo "<td class='text-center'>";
                                                    if ($row['status'] == "Telah Diverifikasi") {
                                                        echo "<span class=''>Telah Diverifikasi</span>";
                                                    } else {
                                                        echo "<span class=''>Belum Verifikasi</span>";
                                                    }
                                                    echo "</td>";
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

    <div class="footer-text">© 2024 DESA OELET</div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>

</html>
