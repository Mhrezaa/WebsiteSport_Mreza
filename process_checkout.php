<?php
session_start();
include 'database.php'; // Koneksi database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id'];
    
    // Generate a unique order ID
    $order_id = uniqid(); 
    $checkout_date = date('Y-m-d H:i:s'); // Current timestamp

    // Iterate through the cart items
    foreach ($_SESSION['cart'] as $product_id => $quantity) {
        // Get the product price
        $result = $conn->query("SELECT price FROM products WHERE id = $product_id");
        $product = $result->fetch_assoc();
        $price = $product['price'];
        
        
        

        // Insert into orders table
        $stmt = $conn->prepare("INSERT INTO orders (order_id, user_id, product_id, total_price, quantity, tanggal) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("siidis", $order_id, $user_id, $product_id, $price, $quantity, $checkout_date);
        $stmt->execute();
        $order_id = $stmt->insert_id;
        $stmt->close();
        
    }

    // Kosongkan keranjang
    unset($_SESSION['cart']);

    header('Location: index.php'); // Arahkan ke halaman sukses
    exit();
}
?>
