<?php 
    $page = "produkter";
    include("includes/connect.php");

    include("menu.php");
    
?>

<script>
    $(document).ready(function(){
    $("#brand").change(function(){
        var brandID = $("#brand").val();
        //alert(brandID);
        if(brandID){
                $.get(
                    "ajax.php",
                    {brand : brandID},
                    function(date){
                        $('#brand_category').html(date);
                    }
                );
            }else{
                $('#brand_category').hmtl('<option> Select brand first</option>')
            }
    });
});
</script>
<?php
?>


<h3>Shop by Category</h3>


<?php
    if (isset($_SESSION['AdminID'])) {
        echo "<a href='creatBrand.php' id='add_new_brand_link'>Add new Brand</a>";
    } else {
        
    }
?>


<!--?php include("cart.php");?-->

<div class="brand_class">
    <form action="">
        <select name="brand" id="brand">
            <option value="">Select Brand</option>
            <?php
                $sql = "SELECT * FROM category";
                $result = mysqli_query($conn, $sql);

                while($row = mysqli_fetch_assoc($result)){
            ?>
            <option value="<?php echo $row['id']?>"><?php echo $row['brand_name']?></option>
        <?php }?>
        </select>

    </form>
</div>


<div class="selected_brand_class">
    <div id="brand_category">

    </div>
</div>

