
<?php 
    //session_start();
    include("includes/connect.php");
    $page = 'Home';
    //include("header.php");

?>

<!--a <!?php if($page == 'creat_product'){echo "class='active'";}?> href="creat_product.php" id="ceart_link">Creat product</!--a-->
<?php
    include("menu.php");
?>

<?php
    include("slider.php");
?>


<div id="container">
    <?php
        include("includes/connect.php");
        $sql_select = "SELECT * FROM creat_product LIMIT 9";
        $result = mysqli_query($conn, $sql_select);
        
        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_array($result))
            { 
                ?>
                <form action="cart.php" method="post">
                    <div id='image'>
                        <img src="<?='images/' . $row['img']?>">
                        <p><?= $row['fname']?></p>
                        <p><?= "$" . $row['price']?></p>

                        <input type="text" id="quantity" name="quantity" value="1">
                        <!--input type="hidden" id="hidden_id" value="<?php //echo $row['id']?>"-->
                        <input type="hidden" name="hidden_name" value="<?php echo $row["fname"]?>">
                        <input type="hidden" name="hidden_image" value="<?php echo 'images/' . $row['img']?>">
                        <input type="hidden" name="hidden_price" value="<?php echo $row['price']?>">
                        <input type="submit" id="add" name="add" value="Add to cart">
                    </div>
                </form>    
            <?php }}?>
</div>

<?php 
    include("includes/footer.php");
?>



