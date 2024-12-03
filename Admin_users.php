
<?php
    $page = 'Admin_users';
    include("includes/connect.php");
    include("header.php");
?>

<?php
    if(isset($_GET["delete"])){
        $ID = $_GET["name"];
        $deleteQuery = "DELETE FROM `signup` WHERE signup_id = '$ID'";
        mysqli_query($conn, $deleteQuery);
    }
?>



<div id="admin_user">
<div>
    <div id="search_ID">
        <input type="text" id="getName" placeholder="Search User">
    </div>
</div>
    <table id="admin_table">
    <tr>
            <th>ID</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Telephone</th>
            <th>Delete</th>
            
    </tr>
    <tbody id="showdata">
        <?php
            if (isset($_SESSION['AdminID'])) {
                $sql_select = "SELECT * FROM signup";
                $result = mysqli_query($conn, $sql_select);
                        
                if(mysqli_num_rows($result)>0){
                    while($row = mysqli_fetch_assoc($result)){ ?>
                
                    <tr>
                        <td><?php echo $row["signup_id"]?></td>
                        <td><?php echo $row['firstName']?></td> 
                        <td><?php echo $row["lastName"]?></td>
                        <td><?php echo $row['email']?></td>  
                        <td><?php echo $row['TELNR']?></td>
                        <td><a href="Admin_users.php?delete&name=<?php echo $row["signup_id"]?>"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                    </tr>                
            <?php }}} 
            else {
                header("location: ../signin.php");
            }
            ?>
        </tbody>
    </table>
</div>

<script>
    $(document).ready(function(){
        $("#getName").on("keyup", function(){
            var getName = $(this).val();
            $.ajax({
                method: 'POST',
                url: 'searchajax.php',
                data:{name:getName},
                success:function(response){
                    $("#showdata").html(response);
                }
            })
        });
    });
</script>
