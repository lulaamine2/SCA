<?php
    include("includes/connect.php");

    if(isset($_POST["add"])){
        //$productID = $_GET["id"];
        $productName = $_POST["hidden_name"];
        $productImage = $_POST["hidden_image"];
        $productPrice = $_POST["hidden_price"];
        $productQuantity = $_POST["quantity"];
        
        $sql = "INSERT INTO `cart_second`(`fname`, `img`, `price`, `quantity`) VALUES ('$productName', '$productImage', '$productPrice', '$productQuantity')";
        $result = mysqli_query($conn, $sql);

        header("Location: index.php");
    }
?>