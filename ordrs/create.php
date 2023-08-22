<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php $id=$_GET['id']; ?>
    <form action="create.php?id=<?=$id?>" method="post">
        <table align="center">
            <tr>
                <th>Client ID:</th>
                <td><input type="text" name="client_id" /></td>
            </tr>
            <tr>
                <th>count :</th>
                <td><input type="number" name="count" /></td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="Save">
                </td>
            </tr>
        </table>
    </form>


    <?php
        if(isset($_POST['client_id'])) {
            $client_id = $_POST['client_id'];
            $Product_id = $_GET['id'];
            $count = $_POST['count'];

            
            $connection = mysqli_connect("127.0.0.1", "root", "", "project__2");

            //Import the number of products from the database
            $Import = "SELECT count_in_stock FROM products WHERE id=$id";
            $result = mysqli_query($connection, $Import);
            $count_in_stock = mysqli_fetch_assoc($result);

            if($count <= $count_in_stock['count_in_stock']){
                $sql = "INSERT INTO ordrs (client_id,product_id,count)
            VALUES ($client_id,$Product_id,$count)";
            $result = mysqli_query($connection, $sql);


            $new_count_in_stock = $count_in_stock['count_in_stock'] - $count;
            $sqlu = "UPDATE products SET count_in_stock = '$new_count_in_stock'
            WHERE id = $id ";
            mysqli_query($connection,$sqlu);

            if($result) {
                header("location:index.php");
            }}
            else{
                echo "The number is not enough";
            }




            
            
        }
    ?>
</body>
</html>