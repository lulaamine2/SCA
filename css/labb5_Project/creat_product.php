<?php
    $page = "creat_product";
    include("header.php");
    include("includes/connect.php")

?>


<?php
    if (isset($_SESSION['AdminID'])) {?>

    <div id="creat_product_div">
        <h2 id="creat_product_header">Skapa Produkt</h2>
        <form  method="POST"  action="includes/creat_insert.php" enctype="multipart/form-data" id="creat_product_form">
            <input type="text" name="name" placeholder="Enter product name" id="name_form">
            <input type="number" name="price" placeholder="Enter product price" id="price_form">
            <input type="file" name="image" id="image_form">

            <select name="brand" id="select">
                <option value="">Select Brand</option>
                <?php
                    $sql = "SELECT * FROM category";
                    $result = mysqli_query($conn, $sql);

                    while($row = mysqli_fetch_array($result)){
                ?>
                <option value="<?php echo $row['id']?>"><?php echo $row['brand_name']?></option>
            <?php }?>
            </select>
            <input type="submit" name="add" id="add_product" value="Add Product">
        </form>
    </div>
        <?php }
    else {
        
    }
?>



