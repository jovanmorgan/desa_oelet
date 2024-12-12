<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../../../images/logo_dinas.png">
    <title>Data Anggaran Dana | Desa Oelet</title>
    <!-- Link Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Link html2pdf.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
    <style>
    /* Tambahkan kelas untuk menampilkan elemen saat mencetak ke PDF */
    /* Tampilkan hanya saat di PDF */
    .show-for-pdf {
        display: block !important;
        /* Paksa elemen untuk tampil saat di PDF */
    }

    /* Sembunyikan kop surat di tampilan web */



    .kop-surat {
        border-bottom: 2px solid black;
        padding-bottom: 10px;
        margin-bottom: 20px;

    }

    table {
        border-collapse: collapse;
        /* Gabungkan border agar rapi */
        width: 100%;
        margin-top: 20px;
        font-size: 10px;
        /* Mengurangi ukuran font */

    }

    table th,
    table td {
        padding: 8px 12px;
        /* Tambahkan padding untuk sel */
        text-align: center;
        /* Rata tengah untuk semua teks */
        border: 1px solid #ddd;
        /* Tambahkan border pada sel */
    }

    table th {
        background-color: #f8f9fa;
        /* Warna latar belakang header */
        font-weight: bold;
        /* Buat teks header tebal */
        color: #007bff;
        /* Warna teks header */
    }

    table tr:nth-child(even) {
        background-color: #f2f2f2;
        /* Warna latar belakang berbeda untuk baris genap */
    }

    .status-text {
        padding: 5px;
        font-size: 14px;
        color: white;
        border-radius: 5px;
        display: inline-block;
    }

    .status-belum {
        background-color: #17a2b8;
        /* Warna biru muda untuk status belum diverifikasi */
    }

    .status-telah {
        background-color: #28a745;
        /* Warna hijau untuk status telah diverifikasi */
    }

    #date {
        margin-bottom: 0;
        /* Hilangkan margin bawah pada tanggal */
    }

    .signature p {
        line-height: 1;
        /* Sesuaikan jarak antar baris */
    }

    .signature {
        margin-top: 25px;
        text-align: right;

    }

    .signature-name {
        font-family: cursive;
        /* Font yang menyerupai tulisan tangan */
        font-size: 15px;
        margin-top: 50px;
        /* Tambahkan margin atas yang lebih besar untuk ruang tanda tangan */
    }
    </style>
</head>

<body>
    <div class="container " id="pdfContent">
        <!-- Kop Surat -->
        <div class="row kop-surat">
            <div class="col-2">
                <!-- Logo -->
                <img src="../../../images/logo_dinas.png" alt="Logo" style="width: 100px; height: auto;">
            </div>
            <div class="col-8 text-center">
                <h2 style="font-size: 20px; font-weight: bold;">
                    PEMERINTAH KABUPATEN TIMOR TENGAH SELATAN <br>
                    KECAMATAN AMANUBAN TIMUR <br>
                    DESA OELET
                </h2>
                <p>Jl.Eon Fenai No,5 Telp 082146236246 Kode Pos 61253</p>
            </div>
        </div>

        <p>
        <div class="">
            <h3 class="text-center">Data Anggaran Dana</h3>
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
                        // Lakukan koneksi ke database
                        include '../../../keamanan/koneksi.php';
                        // Ambil kata kunci pencarian dari URL jika ada
                        $search_query = isset($_GET['search_query']) ? $_GET['search_query'] : '';
                        // Query SQL untuk mengambil data dari tabel anggaran_dana
                        $query = "SELECT anggaran_dana.*, bidang.nama_bidang AS nama_bidang
                                            FROM anggaran_dana
                                            LEFT JOIN bidang ON anggaran_dana.id_bidang = bidang.id_bidang";
                        // Jika ada kata kunci pencarian, tambahkan klausa WHERE untuk mencocokkan 
                        if (!empty($search_query)) {
                            $query .= " WHERE bidang.nama_bidang LIKE '%$search_query%' OR anggaran_dana.tahun_anggaran LIKE '%$search_query%' OR anggaran_dana.jumlah_anggaran LIKE '%$search_query%' OR anggaran_dana.sumber_anggaran LIKE '%$search_query%' OR anggaran_dana.saldo_kas LIKE '%$search_query%'";
                        }
                        // Balik urutan data untuk memunculkan yang paling baru di atas
                        $query .= " ORDER BY id_anggaran_dana DESC";

                        $result = mysqli_query($koneksi, $query);
                        // Variabel untuk menyimpan nomor urut
                        $counter = 1;
                        // Cek jika query berhasil dieksekusi
                        if ($result) {
                            // Lakukan iterasi untuk menampilkan setiap baris data dalam tabel
                            while ($row = mysqli_fetch_assoc($result)) {

                                echo "<tr>";
                                echo "<td class='text-center'>" . htmlspecialchars($counter, ENT_QUOTES) . "</td>";
                                echo "<td class='text-center'>" . htmlspecialchars($row['tahun_anggaran'], ENT_QUOTES) . "</td>";
                                echo "<td class='text-center'>" . htmlspecialchars($row['jumlah_anggaran'], ENT_QUOTES) . "</td>";
                                echo "<td class='text-center'>" . htmlspecialchars($row['sumber_anggaran'], ENT_QUOTES) . "</td>";
                                echo "<td class='text-center'>" . htmlspecialchars($row['saldo_kas'], ENT_QUOTES) . "</td>";
                                echo "<td class='text-center'>" . htmlspecialchars($row['nama_bidang'], ENT_QUOTES) . "</td>";
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
        </p>
        <div class="signature" id="signature">
            <p id="date"></p>
            <p>Mengetahui</p>
            <p><strong>Kepala Desa Oelet</strong></p>
            <p class="signature-name" id="kepalaDesaName"></p> <!-- Ganti 'Nama Kepala Desa' dengan nama sebenarnya -->
        </div>
    </div>


    <div class="text-center mt-3">
        <button id="downloadPDF" class="btn btn-primary">Download PDF</button>
        <button id="changeName" class="btn btn-primary">Ganti Nama Kepala Desa</button>
    </div>
    <script>
    document.addEventListener('DOMContentLoaded', () => {
        const dateElement = document.getElementById('date');
        const today = new Date();
        const day = today.getDate();
        const month = today.getMonth() + 1; // Januari adalah 0
        const year = today.getFullYear();

        const months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September",
            "Oktober", "November", "Desember"
        ];
        const formattedDate = `${day} ${months[month - 1]} ${year}`;

        dateElement.textContent = `Oelet, ${formattedDate}`;
    });
    document.addEventListener('DOMContentLoaded', () => {
        const namaKepalaDesa = localStorage.getItem('namaKepalaDesa') ||
            "John Doe"; // Default "John Doe" jika belum disimpan di Local Storage
        document.getElementById('kepalaDesaName').textContent = namaKepalaDesa;

        // Event listener untuk tombol "Ganti Nama Kepala Desa"
        document.getElementById('changeName').addEventListener('click', () => {
            const newName = prompt("Masukkan nama Kepala Desa yang baru:", namaKepalaDesa);
            if (newName) {
                localStorage.setItem('namaKepalaDesa', newName); // Simpan nama baru di Local Storage
                document.getElementById('kepalaDesaName').textContent = newName; // Tampilkan nama baru
            }
        });
    });
    document.getElementById('downloadPDF').addEventListener('click', function() {
        const element = document.getElementById('pdfContent'); // Ambil elemen konten PDF

        // Opsi untuk PDF
        const opt = {
            margin: 1, // margin dalam cm
            filename: 'Laporan_Anggaran_Dana.pdf', // Ganti dengan nama file yang diinginkan
            image: {
                type: 'jpeg',
                quality: 0.98
            },
            html2canvas: {
                scale: 2
            },
            jsPDF: {
                unit: 'cm',
                format: 'a4',
                orientation: 'landscape'
            } // Format A4 dengan orientasi landscape
        };

        // Menghasilkan PDF dari elemen
        html2pdf().from(element).set(opt).save();
    });
    </script>

</body>

</html>