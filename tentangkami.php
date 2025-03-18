<?php
include 'tentangkami_db.php';

$conn1 = new mysqli("sql105.infinityfree.com", "if0_38227943", "peninjawan123", "if0_38227943_sejarahdesa_db");
$conn2 = new mysqli("sql105.infinityfree.com", "if0_38227943", "peninjawan123", "if0_38227943_kepala_desa");

if ($conn1->connect_error || $conn2->connect_error || $conn3->connect_error) {
    die("Koneksi gagal: " . $conn1->connect_error);
}

// Mendapatkan daftar produk dari database
$sejarahDesa = getDeskripsiSejarah();
$nama_kepala_desa = getNamaKepalaDesa();

// Mendapatkan daftar slider dari database
$namaKepalaDesa = [];
$tahunPemerintahan = [];

$result = $conn2->query("SELECT nama, tahun FROM kepala_desa");
if ($result) {
    while ($row = $result->fetch_assoc()) {
        // Menambahkan nama dan tahun ke dalam array
        if (isset($row['nama']) && isset($row['tahun']) && is_string($row['nama'])) {
            $namaKepalaDesa[] = $row['nama']; // Menambahkan nama ke dalam array
            $tahunPemerintahan[] = $row['tahun']; // Menambahkan tahun ke dalam array
        }
    }
}

$conn1->close();
$conn2->close();

?>

<!DOCTYPE html>
<html>
<title>Halaman Tentang Kami</title>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sejarah Desa Karyamukti</title>
    <link href="tentangkami.css" rel="stylesheet">
    <link href="header.css" rel="stylesheet">
    <link href="footer.css" rel="stylesheet"> 
</head>
<body>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <header class="header-front">
        <!-- Logo Desa -->
        <img src="assets/logo_lamtim.png" alt="Logo Desa" class="logo" width="50" />
        <!-- Logo UMKM -->
        <img src="assets/logo_kkn.png" alt="Logo KKN" class="logo" width="50" />
        
        <!-- Teks Container -->
        <div class="text-container">
            <h1>Website UMKM</h1>
            <p>Desa Karyamukti</p>
        </div>
        
        <!-- Separator antara teks dan menu -->
        <div class="separator"></div>

        <!-- Hamburger Icon -->
        <div class="hamburger" onclick="toggleMenu()" aria-label="Toggle navigation menu">☰</div>
        
        <!-- Navigation Menu -->
        <nav class="menu">
            <a href="beranda.php" class="beranda">BERANDA</a>
            <a href="tentangkami.php" class="tentang-kami">TENTANG KAMI</a>
            <a href="produk.php" class="produk-layanan">PRODUK / LAYANAN</a>
            <a href="kontak_kami.php" class="kontak-kami">KONTAK KAMI</a>
        </nav>
    </header>
    <div class="container" style="margin-top: 30px;" id="top">
        <div class="container1"> 
        <h1 style="z-index: 10;">SEJARAH DESA KARYAMUKTI</h1>
        <hr>
        <p class="text-justify" style="z-index: 10;">
            <?php echo $sejarahDesa; ?>
        </p>
        <div class="table-container" style="z-index: 10;">
            <h1>Nama-Nama Kepala Desa / PJS Desa Karyamukti</h1>
            <table>
                <tr>
                    <th><p>No</p></th>
                    <th>Nama Kepala Desa</th>
                    <th>Tahun Pemerintahan</th>
                </tr>
                <tbody>
                <?php
                if (count($namaKepalaDesa) > 0) {
                    foreach ($namaKepalaDesa as $index => $nama) {
                        // Pastikan kita menampilkan tahun yang sesuai
                        $tahun = isset($tahunPemerintahan[$index]) ? $tahunPemerintahan[$index] : "Tahun tidak tersedia"; // Cek jika tahun ada
                        echo "<tr>
                                <td>" . ($index + 1) . "</td>
                                <td>" . htmlspecialchars($nama) . "</td>
                                <td>" . htmlspecialchars($tahun) . "</td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='3' class='text-center'>Data kepala desa tidak ditemukan.</td></tr>";
                }
                ?>
            </tbody>
            </table>
        </div>
    </div>
    </div>
    <div class="content-all">
    <div class="content">
        <div class="head">
            <h2>VISI DAN MISI</h2>
            <h2>DESA KARYAMUKTI</h2>
            <hr>
        </div>
        <div class="visi">
            <div class="visi-title" style="z-index: 200; position: relative;">VISI</div>
            <p style="z-index: 200; position: relative;">"Kompeten dan berprestasi dalam IPTEK dan IMTAQ dengan indikator : 

            <li>Kompeten dalam perolehan nilai akademik
            <li>Kompeten dalam kegiatan ekstrakurikuler</li>
            <li>Kompeten dalam pemberdayaan potensi wilayah pesisir"</li></p>
        </div>
        <div class="misi">
            <div class="misi-title" style="z-index: 200;">MISI</div>
            <div class="misi-content">
                <div class="misi-item">
                    <h3 style="height: 60px; z-index: 200;">Mengembangkan model pembelajaran yang inovatif dan efektif</h3>
                    <ul style="margin-top: 30px; border-top: 1px solid black; padding-top: 20px; z-index: 200;">
                        <li>Terlaksana proses pembelajaran yang inovatif dan efektif</li>
                    </ul>
                </div>
                <div class="misi-item">
                    <h3 style="height: 60px; z-index: 200; "> Meningkatkan kegiatan ekstrakurikuler yang berkelanjutan dan kompetitif</h3>
                    <ul style="margin-top: 30px;  border-top: 1px solid black;  padding-top: 20px; z-index: 200;">
                        <li>Tercapainya prestasi siswa dalam kompetisi tingkat kabupaten dan provinsi</li>
                    </ul>
                </div>
                <div class="misi-item">
                    <h3 style="height: 60px; z-index: 200;">Mengembangkan kurikulum muatan lokal yang berbasis pemberdayaan wilayah pesisir</h3>
                    <ul style="margin-top: 30px;  border-top: 1px solid black;  padding-top: 20px; z-index: 200;">
                        <li>Tercapainya kurikulum yang memperdayakan potensi wilayah pesisir</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
        <footer class="footer-front">
            <div class="footer-content">
                <div class="footer-left">
                    <h2>UMKM Berdaya,<br />Desa Berjaya</h2>
                    <p style="color: white;">34382<br />Desa Karyamukti, Kecamatan Sekampung, Kabupaten Lampung Timur, Lampung</p>
                    <p style="color: white;">Big Thanks to Tubes-KSI-Lebungfarm Team and KKN 2025 ITERA Group 97</p>
                </div>
                <div class="footer-right">
                    <h2>Quick Links</h2>
                    <ul>
                        <li><a href="beranda.php">❯ Beranda</a></li>
                        <li><a href="tentangkami.php">❯ Tentang Kami</a></li>
                        <li><a href="produk.php">❯ Produk / Layanan</a></li>
                        <li><a href="kontak_kami.php">❯ Kontak Kami</a></li>
                    </ul>
                </div>
            </div>
        </footer>
        <div class="footer-bottom">
            <p>&copy; 2025 UMKM Karyamukti | All rights reserved</p>
            <div class="login-container">
                <a href="index.php">
                    <button class="login-button">
                    <img src="assets/login.png" alt="Login Icon" class="login-icon" />
                    Login
                    </button>
                </a>
            </div>
        </div>
        <script src="scriptTentangKami.js"></script>
        <script>
            const hamburger = document.querySelector('.hamburger');
            const menu = document.querySelector('.menu');
        
            hamburger.addEventListener('click', () => {
            menu.classList.toggle('open');
            hamburger.classList.toggle('active');
            });
        </script>
</body>
</html>