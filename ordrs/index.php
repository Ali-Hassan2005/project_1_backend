<?php

$connection = mysqli_connect("127.0.0.1", "root", "", "project__2");

$sql = "SELECT * FROM ordrs";
$result = mysqli_query($connection, $sql);


$records = [];
for($i = 0; $i < mysqli_num_rows($result); $i++) {
    $records[] = mysqli_fetch_assoc($result);
}

echo "<h2>Orders</h2>";
echo "<p><a href='../products/index.php'>All products</a></p>";

foreach($records as $product) {
    $id = $product['product_id'];
    
    $client_id = $product['client_id'];
    echo "<p>$id) $client_id </p>";
}