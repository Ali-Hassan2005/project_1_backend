<?php

$connection = mysqli_connect("127.0.0.1", "root", "", "project__2");

if(!$connection) {
    echo "Error in connecting with DB.";
    die();
}

$id = $_GET['id'];


$sql = "SELECT * FROM products WHERE id=$id";


$result = mysqli_query($connection, $sql);

$product = mysqli_fetch_assoc($result);

echo "<p><a href='index.php'>All products</a> || <a href='create.php'>Create</a></p>";

echo "<p>ID: " . $product['id'] . "</p>";
echo "<p>Name: " . $product['name'] . "</p>";
echo "<p>Size: " . $product['size'] . "</p>";
echo "<p>Color: " . $product['color'] . "</p>";
echo "<p>Count in stock: " . $product['count_in_stock'] . "</p>";
echo "<p>Created At: " . $product['created_at'] . "</p>";
echo "<p>Updated At: " . $product['updated_at'] . "</p>";