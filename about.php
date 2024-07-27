<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami - Sport Shop</title>
    <link rel="stylesheet" href="assets/css/style.css"> <!-- Sesuaikan path sesuai dengan struktur folder Anda -->
    <style>
        /* Tambahkan CSS langsung di dalam dokumen jika diperlukan */
        body {
            font-family: 'Arial', sans-serif;
            background-image: url('assets/images/about.jfif');
            color: #fff;
            line-height: 1.6;
            padding: 20px;
            margin: 0;
        }

        header {
            background: #blue; /* Warna latar belakang putih */
            color: #white; /* Warna teks hitam */
            padding-top: 30px;
            padding-bottom: 15px;
            display: flex;
            justify-content: space-between; /* Memposisikan elemen secara horizontal */
            align-items: center; /* Mengatur elemen secara vertikal di tengah */
            margin-bottom: 20px;
        }

        header h1 {
            margin: 0;
            padding: 0;
            font-weight: normal;
        }

        header h2,
        nav ul li a {
            color: #white; /* Warna teks hitam */
            text-decoration: none;
            font-weight: bold;
        }

        nav ul {
            padding: 0;
            list-style: none;
            display: flex;
            justify-content: flex-end; /* Memposisikan navigasi di sebelah kanan */
            align-items: center;
            order: 2; /* Menempatkan navigasi di kanan */
        }

        nav ul li {
            margin-left: 15px;
        }

        nav ul li:first-child {
            margin-left: 0;
        }

        .about-us {
            background-color: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            width: 600px;
        }

        .about-us h1 {
            font-size: 24px;
        }

        .about-us p {
            font-size: 16px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Selamat Datang di penjualan toko sport Online</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="products.php">Produk</a></li>
                <li><a href="about.php">Tentang Kami</a></li>
                <li><a href="contact.php">Kontak</a></li>
                <?php if(isset($_SESSION['user_id'])): ?>
                    <li><a href="profile.php">Profil</a></li>
                    <li><a href="logout.php">Logout</a></li>
                <?php else: ?>
                    <li><a href="login.php">Login</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>

    <main>
        <section class="about-us">
            <h2>Tentang Kami</h2>
            <p>Sport Online adalah toko yang berkomitmen untuk memberikan kemudahan dalam jual beli sport online <a href="contact.php">menghubungi kami</a>.</p>
        </section>
    </main>

    <!-- <?php include 'includes/footer.php'; ?> <!-- Sesuaikan path sesuai dengan struktur folder Anda -->
</body>
</html>