<?php
include "db.php";
session_start();

$result = $conn->query("SELECT * FROM products");

while ($product = $result->fetch_assoc()) {
    echo "<div>";
    echo "<h3>{$product['name']}</h3>";
    echo "<p>\${$product['price']}</p>";
    echo "<form method='POST' action='cart.php'>";
    echo "<input type='hidden' name='product_id' value='{$product['id']}'>";
    echo "<input type='number' name='quantity' value='1'>";
    echo "<button type='submit'>Add to Cart</button>";
    echo "</form>";
    echo "</div>";
}
?>
