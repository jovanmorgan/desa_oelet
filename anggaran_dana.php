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
        body {
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
        <a href="#"><i class="fa fa-fw fa-map-marker"></i>Jl.EON FENAI , Desa Oelet , Amanuban Timur, TTS , Nusa Tenggara Timur.</a>
        <a href="#"><i class="fa fa-fw fa-envelope"></i>desaoelet@gmail.com</a>
    </nav>

    <nav class="navbar navbar-expand-lg bg-light navbar-light sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="images/logo_dinas.png" style="width: 50px; height: 50px; margin-right: 10px;" alt=""> DESA OELET</a>
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
                        <a class="nav-link dropdown-toggle" href="galeri.php">Galeri</a>

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
        <div class="text-bg-secondary p-3">Laporan Anggaran Dana Desa Tahun Anggaran 2024/2025</div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nomor</th>
                        <th>Tahun Anggaran</th>
                        <th>Jumlah Anggaran</th>
                        <th>Sumber Anggaran</th>
                        <th>Saldo Kas</th>
                        <th>Nama Bidang</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'keamanan/koneksi.php';
                    $search_query = isset($_GET['search_query']) ? $_GET['search_query'] : '';
                    $query = "SELECT anggaran_dana.*, bidang.nama_bidang AS nama_bidang FROM anggaran_dana LEFT JOIN bidang ON anggaran_dana.id_bidang = bidang.id_bidang";
                    if (!empty($search_query)) {
                        $query .= " WHERE bidang.nama_bidang LIKE '%$search_query%' OR anggaran_dana.tahun_anggaran LIKE '%$search_query%' OR anggaran_dana.jumlah_anggaran LIKE '%$search_query%' OR anggaran_dana.sumber_anggaran LIKE '%$search_query%' OR anggaran_dana.saldo_kas LIKE '%$search_query%'";
                    }
                    $query .= " ORDER BY id_anggaran_dana DESC";
                    $result = mysqli_query($koneksi, $query);
                    $counter = 1;
                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td class='text-center'>" . htmlspecialchars($counter, ENT_QUOTES) . "</td>";
                            echo "<td class='text-center'>" . htmlspecialchars($row['tahun_anggaran'], ENT_QUOTES) . "</td>";
                            echo "<td class='text-center'>" . htmlspecialchars($row['jumlah_anggaran'], ENT_QUOTES) . "</td>";
                            echo "<td class='text-center'>" . htmlspecialchars($row['sumber_anggaran'], ENT_QUOTES) . "</td>";
                            echo "<td class='text-center'>" . htmlspecialchars($row['saldo_kas'], ENT_QUOTES) . "</td>";
                            echo "<td class='text-center'>" . htmlspecialchars($row['nama_bidang'], ENT_QUOTES) . "</td>";
                            echo "</tr>";
                            $counter++;
                        }
                    } else {
                        echo "<td class='text-center' colspan='7'><h3>Gagal mengambil data dari database</h3></td>";
                    }
                    mysqli_close($koneksi);
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="footer-text">© 2024 DESA OELET</div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
