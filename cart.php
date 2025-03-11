<?php
session_start();
include "db.php";

if (!isset($_SESSION["cart"])) {
    $_SESSION["cart"] = [];
}

// Add item to cart
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_id = $_POST["product_id"];
    $quantity = $_POST["quantity"];

    $_SESSION["cart"][] = ["product_id" => $product_id, "quantity" => $quantity];
    echo "Item added to cart!";
}

// View cart
echo "<h2>Shopping Cart</h2>";
foreach ($_SESSION["cart"] as $item) {
    $product_id = $item["product_id"];
    $result = $conn->query("SELECT * FROM products WHERE id=$product_id");
    $product = $result->fetch_assoc();
    echo "<p>{$product['name']} - Quantity: {$item['quantity']} - Price: {$product['price']}</p>";
}

// Checkout button
echo "<a href='checkout.php'>Proceed to Checkout</a>";
?>
