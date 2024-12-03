<?php
    $page = 'cart';
    include("includes/connect.php");

    include("menu.php");
?>

<?php
    if(isset($_GET["delete"])){
        $productName = $_GET["name"];
        $deleteQuery = "DELETE FROM `cart_second` WHERE fname = '$productName'";
        mysqli_query($conn, $deleteQuery);

    }
?>


<div id="div_table">
    <table>

        <?php
        
            $total = 0;

            $sql_select = "SELECT * FROM cart_second";
            $result = mysqli_query($conn, $sql_select);
            
            if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_array($result))
                { 
                    ?>
                    <tr>
                        <td><img src="<?= $row['img']?>"></td>
                        <td><?php echo $row["fname"]?></td>
                        <td><?php echo $row['price'] . "$"?></td>
                        <td><?php echo $row['quantity']?></td>

                        <!--td><!?php echo number_format($row['quantity']*$row['price'], 2) . "$"?></!--td-->
                        <td><a href="cart_check.php?delete&name=<?php echo $row["fname"]?>"><span><i class="fa fa-trash" aria-hidden="true"></i></span></a></td>
                        
                        <?php
                            $total = $total + $row["quantity"]*$row["price"]; 
                        ?>
            <?php }}?>            
            </tr>
            <tr></tr>
            <tr>
                <td></td>
                <td></td>
                <td>Total <?php echo  " " . number_format($total, 2) ."$"?></td>
            </tr>
    </table>
</div>

<input type="button" id="payment_input" value="Proceed to payment" onClick="showHideDiv('payment_button')"/>

<div id="payment_button" style="display:none;">
    <form id="check_form" action="" method="post">
        <label for="">Name</label>
        <input type="text">

        <label for="">Card number</label>
        <input type="text">

        <label for="">Exp year</label>
        <input type="text">

        <label for="">Exp month</label>
        <input type="text">

        <input type="submit" value="Order" style="width: 94%;">
    </form>
</div>
