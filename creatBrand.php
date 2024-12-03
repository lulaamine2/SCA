<?php
    $page = "CreatBrand";
    include("header.php");
    include("includes/connect.php");

    if(isset($_POST["AddCategory"])){
        $categoryName = $_POST['category_name'];

        if(empty($categoryName)){
            echo "<script>alert('Please fill all the required fields')</script>";
    }
    else {
        $sql="INSERT INTO category (brand_name) VALUES ('$categoryName')";
        if ($conn->query($sql) === TRUE){
            header("Location: category.php?=New category added successfully");
        }
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>


<div id="AddCategory">
    <form action="creatBrand.php" method="post" id="category_form">
        <input type="text"  name="category_name" id="category_name" placeholder="Add New Brand Category">
        <input type="submit" name="AddCategory" value="Add New Brand" id="brandSubmit">
    </form>
</div>