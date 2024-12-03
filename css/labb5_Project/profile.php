
<?php
    //$page = 'profile';
    session_start();
    include("includes/connect.php");
?>

<h4>Profile</h4>


<?php

    $sql = "SELECT * FROM signup";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Loop through the result set and display data
        while ($row = mysqli_fetch_assoc($result)) 
        {
            echo "UserName: " . $row['username'] . "<br>";
            echo "Email: " . $row['email'] . "<br>";
            // Display other columns as needed
            echo "<br>";
        }
    }

?>

