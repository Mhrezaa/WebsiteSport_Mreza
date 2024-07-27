<?php
session_start(); // Memulai sesi
include 'database.php'; // Memasukkan file konfigurasi database
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Sport shop</title>
    <link rel="stylesheet" href="assets/css/style.css"> <!-- Sesuaikan path jika diperlukan -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
<body>
    <style>
       
       .wrapper {
    width: 1100px;
    margin: auto;
    position: relative;
}

.logo a {
    font-size: 30px;
    float: left;
    font-family:  sans-serif ;
    font-weight: 500;
    color: blue;
}

.main-menu {
    text-align: center;
}

.main-nav {
    width: 100%;
    margin: auto;
    display: flex;
    line-height: 80px;
    position: sticky;
    position: -webkit-sticky;
    top: 0;
    background:		#8000000;
    z-index: 1;
    border: 1 solid #034931;
}

.main-nav ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
}

.main-nav ul li {
    float: center;
    text-align: center;
}

.main-nav ul li a {
    color: white;
    font-weight: 400;
    text-align: center;
    
    text-decoration: none;
}
.home-wrapper {
    height: 100%;
    align-items: center;
    min-height: 100vh;
    position: relative;
    background: url('assets/images/back.jpg');
    background-size: cover;
    background-position: center center;
    
    /* background-color: #218B67; */
}
.home-wrapper:before {
    content: '';
    position: absolute;
    left: 0; right: 0;
    top: 0; bottom: 0;
}

.kolom {

}

.kolom .deskripsi {
    font-size: 32px;
    font-weight: 600;
    margin-bottom: 3px;
    text-align: center;
    color:	#FFFFFF;
}

.deksripsi-h2 {
    font-size: 48px;
    font-weight: 600;
    margin-bottom: 3px;
    text-align: center;
    color: 	#FFFFFF;
    width: 100%;
}

.deksripsi-h3 {
    font-size: 24px;
    font-weight: 500;
    color: 	#FFFFFF;
}

.deskripsi-a {
    position: relative;
    font-size: 39px;
    font-weight: 800;
    margin-top: -30px;
}

.deskripsi-a2 {
    font-size: 33px;
    font-weight: 400;
    margin-top: 26px;
}

.tagline {
    font-size: 32px;
    font-weight: 600;
    margin-top: 26px;
}
    </style>
    
    <nav class="main-nav">
        <div class="wrapper">
            <div class="logo"><a href=''></a></div>
            <div class="main-menu">
            <ul>
                <li><a href="cart.php"><i class="fas fa-shopping-cart"></i></a></li>
                <li><a href="index.php">Home</a></li>
                <li><a href="index (1).php">laporan</a></li>
                <li><a href="products.php">Produk</a></li>
                <li><a href="about.php">Tentang Kami</a></li>
                <li><a href="contact.php">Kontak</a></li>
				<li><a href="register.php">Register</a></li>
                <?php if(isset($_SESSION['user_id'])): ?>
                    <li><a href="profile.php">Profil</a></li>
                    <li><a href="logout.php">Logout</a></li>
                <?php else: ?>
                    <li><a href="login.php">Login</a></li>
                <?php endif; ?>
            </ul>
        </nav>

        <!-- Home -->
        <div class="home-wrapper">
            <section class="wrapper" id="Home">
            <div class="kolom">
                    <p class="deskripsi">Selamat Datang Di</p>
                    <H2 class="deksripsi-h2">SPORT SHOP<br/>
                    
                      <p class="deksripsi-h3">TERSEDIA BERBAGAI MACAM MACAM PERALATAN SPORT<br/>
                </div>
            </section>
        </div>
    <

    <main>
        <section id="featured-products">
            <h2>Produk Unggulan</h2>
            <div class="products">
                <?php
                // Query untuk mendapatkan produk unggulan
                $query = "SELECT * FROM products LIMIT 5";
                $result = $conn->query($query);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<div class='product'>";
                        echo "<img src='assets/images/" . htmlspecialchars($row["image"]) . "' alt='" . htmlspecialchars($row["name"]) . "'>";
                        echo "<h3>" . htmlspecialchars($row["name"]) . "</h3>";
                        echo "<p>" . htmlspecialchars($row["description"]) . "</p>";
                        echo "<p>Rp" . htmlspecialchars($row["price"]) . "</p>";
                        echo "</div>";
                    }
                } else {
                    echo "<p>Tidak ada produk unggulan saat ini.</p>";
                }
                
                ?>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Guitar Line. Semua hak dilindungi.</p>
    </footer>
</body>
</html>
