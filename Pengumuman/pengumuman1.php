<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DANA DESA OELET</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="shortcut icon" href="../images/logo_dinas.png" type="">
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
            background-color: #000;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
        }

        .topnav a {
            color: #fff;
            text-decoration: none;
        }

        .topnav a i {
            margin-right: 5px;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.3);
        }

        .hero-content {
            position: relative;
            z-index: 1;
        }

        @media only screen and (max-width: 678px) {
            .topnav {
                display: none;
            }
        }

        h1 {
            font-size: 2em;
            margin-bottom: 20px;
            text-align: center;
            color: #333;
        }

        .content {
            background-color: #f9f9f9;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            max-width: 800px;
        }

        .content p {
            font-size: 1.1em;
            color: #555;
            margin-bottom: 20px;
        }

        .list-item {
            margin-bottom: 10px;
        }

        .contact {
            margin-top: 30px;
        }

        .contact strong {
            display: inline-block;
            width: 60px;
        }
    </style>
</head>

<body>
    <!-- Top Navigation -->
    <nav class="topnav">
        <a href="#"><i class="fa fa-fw fa-phone"></i> 085737850151 / 82340378021</a>
        <a href="#"><i class="fa fa-fw fa-map-marker"></i> Jl. EON FENAI, Desa Oelet, Amanuban Timur, TTS, Nusa Tenggara Timur</a>
        <a href="#"><i class="fa fa-fw fa-envelope"></i> desaoelet@gmail.com</a>
    </nav>

    <!-- Main Navigation -->
    <nav class="navbar navbar-expand-lg bg-light navbar-light sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="../images/logo_dinas.png" style="width: 50px; height: 50px; margin-right: 10px;" alt=""> DESA OELET
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="../homepage.php">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Informasi</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../pengumuman.php">Pengumuman</a></li>
                            <li><a class="dropdown-item" href="../Program_kerja.php">Program Kerja</a></li>
                            <li><a class="dropdown-item" href="../anggaran_dana.php">Anggaran Dana Desa</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Galeri</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Galeri Foto</a></li>
                            <li><a class="dropdown-item" href="#">Galeri Video</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <a href="berlangganan/login_pegunah.php">
                <button type="button" class="btn btn-info">Login</button>
            </a>
        </div>
    </nav>

    <!-- Content -->
    <div class="container">
        <h1>Pengumuman Pembangunan Pos Keamanan Desa Oelet</h1>
        <div class="content">
            <p>Kepada seluruh warga Desa Oelet,</p>
            <p>Kami informasikan bahwa pada bulan depan, tepatnya tanggal <strong>10 Oktober 2024</strong>, akan dilaksanakan pembangunan Pos Keamanan yang berlokasi di <strong>RT 02/RW 01 Desa Oelet</strong>. Pembangunan ini merupakan salah satu program yang didanai melalui Dana Desa Tahun 2024 dengan tujuan meningkatkan keamanan dan kenyamanan lingkungan bagi seluruh warga desa.</p>

            <p>Beberapa rincian kegiatan pembangunan yang akan dilakukan adalah sebagai berikut:</p>
            <ul>
                <li class="list-item">Pembangunan struktur utama pos keamanan.</li>
                <li class="list-item">Penyediaan perlengkapan keamanan dasar, seperti alat komunikasi dan penerangan.</li>
                <li class="list-item">Pembangunan pagar keliling pos serta akses masuk.</li>
                <li class="list-item">Penugasan petugas keamanan lokal secara bergilir setelah pos selesai dibangun.</li>
            </ul>

            <p>Seluruh warga diharapkan dapat mendukung kelancaran proses pembangunan ini. Untuk keterlibatan warga dalam gotong royong, lebih lanjut akan diinformasikan oleh kepala RT masing-masing.</p>

            <p>Besar harapan kami, dengan adanya pos keamanan ini, lingkungan desa akan semakin aman dan kondusif bagi semua.</p>

            <div class="contact">
                <p><strong>Kontak:</strong></p>
                <p><strong>Telp:</strong> 085737850151 / 82340378021</p>
                <p><strong>Email:</strong> desaoelet@gmail.com</p>
            </div>

            <p><strong>Terima kasih atas perhatian dan kerja samanya.</strong></p>
            <p><em>Salam,</em></p>
            <p><strong>Pemerintah Desa Oelet</strong></p>
        </div>
    </div>

    <!-- Footer -->
    <footer class="text-center text-lg-start bg-dark text-light mt-5">
        <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
            <div class="me-5 d-none d-lg-block">
                <span>Kontak Kami:</span>
            </div>
            <div class="social-media">
                <a href="#" class="me-4 text-reset"><i class="fa fa-envelope"></i></a>
                <a href="#" class="me-4 text-reset"><i class="fa fa-instagram"></i></a>
                <a href="#" class="me-4 text-reset"><i class="fa fa-facebook"></i></a>
                <a href="#" class="me-4 text-reset"><i class="fa fa-youtube"></i></a>
            </div>
        </section>

        <section class="mt-4">
            <div class="container ">
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <h6 class="text-uppercase fw-bold mb-4">
                            <img class="me-2" src="../images/do-1.jpeg" style="width: 30px; height: 30px;" alt="">DESA OELET
                        </h6>
                        <p>Desa Oelet adalah sebuah Desa yang beralamat di Jalan EON FENAI, Desa Oelet, Amanuban Timur, TTS, Nusa Tenggara Timur. Desa Oelet, yang berpenduduk 1.717 jiwa, terbagi atas 4 RW dan 13 RT.</p>
                    </div>

                    <div class="col-md-6 mb-4">
                        <h6 class="text-uppercase fw-bold mb-4">Kunjungi Kami</h6>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d62922.9710552348!2d124.48977698774125!3d-9.707843933559264!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2cff5fbfd94d2671%3A0x47dd991e7bbbbf7f!2sOelet%2C%20Kec.%20Amanuban%20Tim.%2C%20Kabupaten%20Timor%20Tengah%20Selatan%2C%20Nusa%20Tenggara%20Tim.!5e0!3m2!1sid!2sid!4v1724347605173!5m2!1sid!2sid"
                            width="600" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </section>

        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2024 Desa Oelet
        </div>
    </footer>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        feather.replace();
    </script>

    <script src="js/script.js"></script>
</body>

</html>
