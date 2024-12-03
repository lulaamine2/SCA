

<?php
    include("header.php");
    include("connect.php");

    if(isset($_POST["search"])){
        $fname = $_POST["search_name"];

        $sql_select = mysqli_query($conn, "SELECT * FROM creat_product WHERE fname LIKE '%{$fname}%'");
        $result = mysqli_query($conn, $query);
        $count = mysqli_num_rows($result);


        if($count > 0){
            while($row = mysqli_fetch_assoc($result)){
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
<?php }}}?>

