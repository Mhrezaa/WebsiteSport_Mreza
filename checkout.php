<?php
session_start();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <style>
        /* Same styles as cart.php */
    </style>
</head>
<body>
    <div class="container">
        <h1>Checkout</h1>
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
            <button type="submit" class="btn">Konfirmasi Pembelian</button>
        </form>
        <a href="cart.php" class="btn">Kembali ke Keranjang</a>
    </div>
</body>
</html>
