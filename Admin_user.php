<?php
    $page = 'Admin_user';
    include("header.php");
    include("includes/connect.php");
?>


    <h1>Your Info</h1>

    <h1>
    Welcome to Your Page
    <span id="span"><?php echo $_SESSION['AdminID']; ?></span>
</h1>

<div id="container">
    <table>
        <tr>
            <th>ID</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Telephone</th>
            
        </tr>
    <?php
        $sql_select = "SELECT * FROM signup WHERE signup_id =" . $_SESSION['AdminID'];
        $result = mysqli_query($conn, $sql_select);
        
        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_array($result))
            { ?>

            <tr>
                <td><?php echo $row["signup_id"]?></td>
                <td><?php echo $row['firstName']?></td>
                <td><?php echo $row['lastName']?></td> 
                <td><?php echo $row['email']?></td>  
                <td><?php echo $row['TELNR']?></td>
            </tr>
            <?php }}
                else{echo "<p>No Results Found!</p>";}
            ?>
    </table>
</div>