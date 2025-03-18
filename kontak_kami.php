<?php
// Koneksi ke database
$servername = "sql105.infinityfree.com"; // Ganti dengan host database Anda
$username = "if0_38227943"; // Ganti dengan username database Anda
$password = "peninjawan123"; // Ganti dengan password database Anda
$dbname = "if0_38227943_kontak_kami"; // Ganti dengan nama database Anda

$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data kontak dari database
$sql = "SELECT * FROM kontak WHERE id=1"; // Asumsi hanya ada satu data kontak
$result = $conn->query($sql);
$kontak = $result->fetch_assoc();

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<title>Halaman Kontak</title>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Kontak Kami</title>
    <link href="header.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
    <link href="footer.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap"/>
    <style>
        .carousel {
            width: 40%;
            margin: 0 auto; /* Menempatkan slider di tengah */
        }
        .carousel-item img {
            width: 100%; /* Mengisi penuh area slider */
            height: auto; /* Menjaga rasio gambar */
        }
        .star-rating {
            color: gold;
        }
        .baris-1{
            width: 50%;
            border-bottom: 2px solid black;
            margin-bottom: 20px;
            justify-self: center;
        }
        .baris-2{
            width: 30%;
            border-bottom: 2px solid black;
            justify-self: center;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <header class="header-front">
        <!-- Logo Desa -->
        <img src="assets/Logo_lamtim.png" alt="Logo Desa" class="logo" width="50" />
        <!-- Logo UMKM -->
        <img src="assets/Logo_kkn.png" alt="Logo KKN" class="logo" width="50" />
        
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

    <div class="container" style="margin-top: 30px; background-color: #f8f9fa; padding:50px; border-radius:10px;" id="top">
        <div class="row">
            <div class="col-md-12">
                <div class="baris-1"></div>
                <div class="baris-2"></div>
                <h4 class="text-center"><?= $kontak['judul']; ?></h4>
                <div class="teks">
                    <p><?= $kontak['deskripsi']; ?></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-4">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31787.36816331369!2d105.39494776764862!3d-5.196322426360129!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e409553d33aaa35%3A0x713c733f26f7117e!2sKarya%20Mukti%2C%20Kec.%20Sekampung%2C%20Kabupaten%20Lampung%20Timur%2C%20Lampung!5e0!3m2!1sid!2sid!4v1738381390092!5m2!1sid!2sid" width="100%" height="450" style="border:0; display:block; border-radius:10px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.5);" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
        <div class="row">
            <!-- Informasi Kontak -->
            <div class="col-md-6">
                <div class="col-md-12 mt-4 pt-2 info_kontak" style="border: 1px solid black; border-radius:10px;">
                    <span style="font-weight: bold; font-size:20px;">Alamat</span>
                    <p class="mt-2"><?= $kontak['alamat']; ?></p>
                </div>
                <div class="col-md-12 mt-3 pt-2 info_kontak" style="border: 1px solid black; border-radius:10px;">
                    <span style="font-weight: bold; font-size:20px;">Telepon</span>
                    <p class="mt-2"><?= $kontak['telepon']; ?></p>
                </div>
                <div class="col-md-12 mt-3 pt-2 info_kontak" style="border: 1px solid black; border-radius:10px;">
                    <span style="font-weight: bold; font-size:20px;">Email</span>
                    <p class="mt-2"><?= $kontak['email']; ?></p>
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
