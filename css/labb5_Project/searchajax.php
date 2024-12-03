<?php
    include("includes/connect.php");


    if(isset($_GET["delete"])){
        $ID = $_GET["name"];
        $deleteQuery = "DELETE FROM `signup` WHERE signup_id = '$ID'";
        mysqli_query($conn, $deleteQuery);

    }

        $name = $_POST["name"];

        $sql_select = "SELECT * FROM signup WHERE firstName LIKE '$name%'";
        $result = mysqli_query($conn, $sql_select);
        $data = "";
        while($row = mysqli_fetch_assoc($result)){ 
            $data .= 
            "<tr>
                <td>" . $row['signup_id'] ."</td>
                <td>" . $row['firstName'] . "</td>
                <td>".  $row['lastName']. "</td>
                <td>".   $row['email']."</td>
                <td>" . $row['TELNR'] ."<td>
                <a href='Admin_users.php?delete&name=" . $row['signup_id'] . "'><i class='fa fa-trash' aria-hidden='true'></i></a>
            <tr>";
        }

        echo $data;
?> 