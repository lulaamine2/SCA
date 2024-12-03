<?php
include("connect.php");

if(isset($_POST["signin"])){
    $username = $_POST["username"];
    $password = $_POST["password"];


    $signin_select = "SELECT * FROM signup WHERE username = '$username' AND password = '$password'";
    $sqlres = mysqli_query($conn, $signin_select);
    $countrows = mysqli_num_rows($sqlres);

    //echo $countrows;

    if($countrows == 0){
        echo "Denna konto finn ej, skapa konto först. <a href='signup.php'>Signup here</a>";
    }
    else{
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['sendusername'] = $username;
        header('Location: ../index.php');
    }
}

?>