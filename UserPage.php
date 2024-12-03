<?php

$page = 'UserPage';
include("menu.php");
include("includes/connect.php");


    if (!isset($_SESSION['UserID'])) {
        header("location: ../signin.php");
        exit;
    }
?>



<h1>
    Welcome to User Page
    <span><?php echo $_SESSION['UserID']; ?></span>
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
        include("includes/connect.php");
        $sql_select = "SELECT * FROM signup WHERE signup_id =" . $_SESSION['UserID'];
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
