<?php
session_start();

if (!isset($_SESSION["cart"])) {
    $_SESSION["cart"] = [];
}

// Add item to cart
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product = $_POST["product"];
    $quantity = $_POST["quantity"];

    $_SESSION["cart"][] = ["product" => $product, "quantity" => $quantity];
    echo json_encode(["message" => "Item added to cart", "cart" => $_SESSION["cart"]]);
}

// Get cart items
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    echo json_encode($_SESSION["cart"]);
}

// Clear cart
if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
    $_SESSION["cart"] = [];
    echo json_encode(["message" => "Cart cleared"]);
}
?>
