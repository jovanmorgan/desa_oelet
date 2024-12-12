<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DANA DESA OELET</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <script src="https://unpkg.com/feather-icons"></script>
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

        .hero {
            background-image: url('images/do-1.jpeg');
            background-size: cover;
            background-position: center;
            color: #fff;
            text-align: center;
            padding: 230px 0;
            position: relative;
        }

        .hero h1 {
            font-size: 50px;
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

        .pengumuman {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .pengumuman h2 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 2em;
            color: #333;
        }

        .pengumuman-wrapper {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .pengumuman-item {
            background-color: white;
            width: 23%;
            margin-bottom: 30px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            border-radius: 8px;
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .pengumuman-item:hover {
            transform: translateY(-10px);
        }

        .image-container {
            position: relative;
        }

        .image-container img {
            width: 100%;
            height: auto;
        }

        .tag {
            position: absolute;
            top: 10px;
            left: 10px;
            background-color: yellow;
            padding: 5px 10px;
            font-size: 0.9em;
            font-weight: bold;
        }

        .pengumuman-item h3 {
            font-size: 1.2em;
            color: #333;
            padding: 15px;
        }

        .pengumuman-item p {
            padding: 0 15px;
            font-size: 0.95em;
            color: #777;
        }

        .date {
            padding: 0 15px;
            font-size: 0.85em;
            color: #999;
        }

        .selengkapnya {
            display: inline-block;
            padding: 10px 15px;
            margin: 15px;
            background-color: #ffa500;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 0.9em;
            transition: background-color 0.3s ease;
        }

        .selengkapnya:hover {
            background-color: #ff8500;
        }

        @media only screen and (max-width: 678px) {
            .topnav {
                display: none;
            }
        }
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        

        header {
            background-color: #3f3077;
            padding: 20px;
            text-align: left;
            color: white;
        }

        .header-content h1 {
            font-size: 2.5rem;
        }

        .header-content h2 {
            font-size: 2rem;
            margin-top: 10px;
        }

        .gallery-container {
            padding: 20px;
        }

        .gallery {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            justify-content: center;
        }

        .gallery img {
            width: calc(20% - 10px); /* Untuk 5 kolom gambar yang lebih kecil */
            height: auto;
        }

        @media (max-width: 768px) {
            .gallery img {
                width: calc(33.333% - 10px); /* Tiga kolom untuk layar lebih kecil */
            }
        }

        @media (max-width: 480px) {
            .gallery img {
                width: calc(50% - 10px); /* Dua kolom untuk layar sangat kecil */
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
                        <a class="nav-link" href="galeri.php" >Galeri</a>
                    
                    </li>
                </ul>
            </div>
            <a href="berlangganan/login_pegunah.php"><button type="button" class="btn btn-info">Login</button></a>
        </div>
    </nav>

    <main>
        <section class="hero">
            <div class="hero-content">
                <h1>SISTEM INFORMASI PENGELOLAAN DANA DESA</h1>
            </div>
        </section>

        <!-- Pengumuman Section -->
        <section class="pengumuman">
            <h2>PENGUMUMAN</h2>
            <div class="pengumuman-wrapper">
                <div class="pengumuman-item">
                    <div class="image-container">
                        <img src="images/gambar1.jpg" alt="Pengelolaan Dana Desa">
                        <div class="tag">PENGUMUMAN</div>
                    </div>
                    <h3>Pembangunan pos Keamanan</h3>
                    <p>Kami informasikan bahwa pada bulan depan, tepatnya tanggal 10 Oktober 2024, akan dilaksanakan pembangunan Pos Keamanan yang berlokasi di RT 02/RW 01 Desa Oelet....</p>
                    <div class="date">23 September 2024</div>
                    <a href="Pengumuman/pengumuman1.php" class="selengkapnya">Selengkapnya</a>
                </div>

                <div class="pengumuman-item">
                    <div class="image-container">
                        <img src="images/gambar2.jpg" alt="Pengelolaan Dana Desa">
                        <div class="tag">PENGUMUMAN</div>
                    </div>
                    <h3>Rincian Penggunaan Dana Desa 2024</h3>
                    <p>Pembangunan fasilitas umum, pemberdayaan masyarakat, dan kesejahteraan sosial adalah bagian dari fokus utama pengelolaan Dana Desa...</p>
                    <div class="date">23 September 2024</div>
                    <a href="#" class="selengkapnya">Selengkapnya</a>
                </div>

                <div class="pengumuman-item">
                    <div class="image-container">
                        <img src="images/gambar3.jpeg" alt="Pengelolaan Dana Desa">
                        <div class="tag">PENGUMUMAN</div>
                    </div>
                    <h3>Musyawarah Desa Dana Desa 2024</h3>
                    <p>Seluruh warga diundang hadir pada musyawarah desa untuk membahas rincian penggunaan Dana Desa yang akan dilaksanakan di Balai Desa...</p>
                    <div class="date">23 September 2024</div>
                    <a href="#" class="selengkapnya">Selengkapnya</a>
                </div>

                <div class="pengumuman-item">
                    <div class="image-container">
                        <img src="images/gambar4.JPG" alt="Pengelolaan Dana Desa">
                        <div class="tag">PENGUMUMAN</div>
                    </div>
                    <h3>Laporan Akhir Tahun Pengelolaan Dana Desa</h3>
                    <p>Laporan akhir tahun mengenai pengelolaan Dana Desa akan dipublikasikan pada bulan Desember mendatang. Mohon bagi seluruh warga...</p>
                    <div class="date">23 September 2024</div>
                    <a href="#" class="selengkapnya">Selengkapnya</a>
                </div>
            </div>
        </section>
    </main>
    <header>
        <div class="header-content">
            <h1># WELCOME</h1>
            <h2>Galery Pengelolaan Dana Desa Oelet</h2>
        </div>
    </header>

    <div class="gallery-container">
        <div class="gallery">
            <img src="images/gambar1.jpg" alt="Gambar 1">
            <img src="images/gambar2.jpg" alt="Gambar 2">
            <img src="images/gambar5.jpeg" alt="Gambar 3">
            <img src="images/gambar6.jpg" alt="Gambar 4">
            <img src="images/gambar7.jpg" alt="Gambar 5">
            <img src="images/gambar8.png" alt="Gambar 6">
            <img src="images/gambar9.jpg" alt="Gambar 7">
            <img src="images/gambar10.jpg" alt="Gambar 8">
            <img src="image9.jpg" alt="Gambar 9">
            <img src="image10.jpg" alt="Gambar 10">
        </div>
    </div>
    <!-- Footer -->
    <footer class="text-center text-lg-start bg-dark text-light">
        <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
            <div class="me-5 d-none d-lg-block">
                <span>Kontak Kami:</span>
            </div>
            <div class="social media">
                <a href="" class="me-4 text-reset">
                    <i class="fa fa-envelope"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fa fa-instagram"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fa fa-facebook"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fa fa-youtube"></i>
                </a>
            </div>
        </section>

        <section class="">
            <div class="container text-center text-md-start mt-5">
                <div class="row mt-3">
                    <div class="col-md-12 col-lg-12 col-xl-6 mx-auto mb-4">
                        <h6 class="text-uppercase fw-bold mb-4">
                            <img class="me-2" src="images/do-1.jpeg" style="width: 30px; height: 30px;" alt="">DESA OELET
                        </h6>
                        <p>
                            Desa Oelet adalah sebuah Desa yang beralamat di Jalan EON FENAI , Desa Oelet , Amanuban Timur, TTS , Nusa Tenggara Timur. Desa Oelet, yang berpenduduk 1.717 jiwa, terbagi atas 4 RW dan 13 RT.
                        </p>
                    </div>

                    <div class="col-md-12 col-lg-12 col-xl-6 mx-auto mb-md-0 mb-4">
                        <h6 class="text-uppercase fw-bold mb-4">Kunjungi Kami</h6>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d62922.9710552348!2d124.48977698774125!3d-9.707843933559264!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2cff5fbfd94d2671%3A0x47dd991e7bbbbf7f!2sOelet%2C%20Kec.%20Amanuban%20Tim.%2C%20Kabupaten%20Timor%20Tengah%20Selatan%2C%20Nusa%20Tenggara%20Tim.!5e0!3m2!1sid!2sid!4v1724347605173!5m2!1sid!2sid" 
                            width="600" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </section>

        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2024 Desa Oelet:
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
