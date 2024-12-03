<?php
    include("connect.php");

    $msg = " ";

    if(isset($_POST['add'])){

        $fname = $_POST['name'];
        $price = $_POST['price'];
        $file = $_FILES['image']['name'];
        $brand = $_POST['brand'];

        $target = "images/" . basename($_FILES['image']['name']);
        $sql_insert = "INSERT INTO creat_product (fname, price, img, brand_id) VALUES('$fname', '$price', '$file', '$brand')";
        mysqli_query($conn, $sql_insert);

        if(move_uploaded_file($_FILES['image']["tmp_name"], $target)){
            $msg = "image uploaded successfully";
        }else{
            $msg = "the was a problem uploading image";
        }

        //header("Location: ../index.php");
        //exit;
    }
?>

