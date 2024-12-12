<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DANA DESA OELET</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="shortcut icon" href="images/logo_dinas.png" type="">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
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
            width: calc(25% - 25px); /* Untuk 5 kolom gambar yang lebih kecil */
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
                        <a class="nav-link " href="galeri.php">Galeri</a>
                    </li>
                </ul>
            </div>
            <a href="berlangganan/login_pegunah.php"><button type="button" class="btn btn-info">Login</button></a>
        </div>
    </nav>
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
