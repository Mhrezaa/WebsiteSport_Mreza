<?php
session_start();
include 'database.php'; // Include your database connection

if (isset($_GET['action']) && $_GET['action'] == 'add') {
    $product_id = $_GET['id'];
    
    // Fetch product details from database
    $stmt = $conn->prepare("SELECT name, price FROM products WHERE id = ?");
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();

    if ($product) {
        $item = [
            'id' => $product_id,
            'name' => $product['name'],
            'price' => $product['price'],
            'quantity' => 1 // Default quantity
        ];

        // Check if the item already exists in the cart
        if (isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id]['quantity'] += 1; // Increase quantity
        } else {
            $_SESSION['cart'][$product_id] = $item; // Add new item
        }
    }

    header('Location: cart.php'); // Redirect to cart
}
?>
