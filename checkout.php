<?php
session_start();
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    unset($_SESSION["cart"]);
    echo "Order placed successfully!";
}

echo "<h2>Checkout</h2>";
foreach ($_SESSION["cart"] as $item) {
    $product_id = $item["product_id"];
    $result = $conn->query("SELECT * FROM products WHERE id=$product_id");
    $product = $result->fetch_assoc();
    echo "<p>{$product['name']} - Quantity: {$item['quantity']} - Price: {$product['price']}</p>";
}
?>
<form method="POST">
    <button type="submit">Place Order</button>
</form>
