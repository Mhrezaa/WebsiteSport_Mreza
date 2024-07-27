<?php
session_start();
require 'database.php';

// Ambil data riwayat pembelian berdasarkan user_id dari sesi
if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
    $query = $conn->prepare("SELECT * FROM orders WHERE user_id = ?");
    $query->bind_param("i", $userId);
    $query->execute();
    $result = $query->get_result();
} else {
    // Jika tidak ada user_id, mungkin harus dilakukan autentikasi terlebih dahulu atau redirect ke halaman login
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pembelian</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Riwayat Pembelian</h1>
        <?php if ($result->num_rows > 0) : ?>
            <div class="list-group mt-3">
                <?php while ($row = $result->fetch_assoc()) : ?>
                    <div class="list-group-item">
                        <h5 class="mb-1">Nama: <?= $row['nama'] ?></h5>
                        <p class="mb-1">Alamat: <?= $row['alamat'] ?></p>
                        <p class="mb-1">Total Harga: Rp. <?= number_format($row['total_price'], 2, ',', '.') ?></p>
                        <p class="mb-1">Status: <?= $row['status'] ?></p>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else : ?>
            <p class="mt-3">Belum ada riwayat pembelian.</p>
        <?php endif; ?>
        <a href="index.php" class="btn btn-primary mt-3">Kembali ke Beranda</a>
    </div>
    <!-- Bootstrap JS (optional) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>