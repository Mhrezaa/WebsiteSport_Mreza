<?php
session_start();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f4f4f4; color: #333; }
        .container { width: 80%; margin: auto; }
        table { width: 100%; margin-top: 20px; border-collapse: collapse; }
        th, td { padding: 10px; text-align: left; border: 1px solid #ddd; }
        th { background-color: #f2f2f2; }
        .btn { padding: 10px 20px; background-color: #0275d8; color: white; border: none; border-radius: 5px; cursor: pointer; }
        .btn:hover { background-color: #01447e; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Keranjang Belanja</h1>
        <table>
            <thead>
                <tr>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0): ?>
                    <?php 
                    $grand_total = 0;
                    foreach ($_SESSION['cart'] as $item): 
                        $item_total = $item['price'] * $item['quantity'];
                        $grand_total += $item_total;
                    ?>
                        <tr>
                            <td><?= htmlspecialchars($item['name']); ?></td>
                            <td>Rp<?= number_format($item['price'], 2, ',', '.'); ?></td>
                            <td><?= $item['quantity']; ?></td>
                            <td>Rp<?= number_format($item_total, 2, ',', '.'); ?></td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td colspan="3">Total Keseluruhan:</td>
                        <td>Rp<?= number_format($grand_total, 2, ',', '.'); ?></td>
                    </tr>
                <?php else: ?>
                    <tr><td colspan="4">Keranjang Anda kosong.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
        <form action="process_checkout.php" method="POST">
            <button type="submit" class="btn">Proses Checkout</button>
        </form>
        <a href="products.php" class="btn">Kembali ke Produk</a>
    </div>
</body>
</html>
