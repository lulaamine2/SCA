
<?php 
    $page = "signin";
    include("includes/connect.php");

    include("menu.php");
?>


<div id="signin_div">
    <h1>Sign in</h1> 
    <form action="signin.php" id="signin_form" method="POST">

        <label>Användnamn</label>
        <input type="text" name="username" placeholder="Enter UserName">

        <label>Lösenord</label>
        <input type="password" name="password" placeholder="Enter Password">

        <input type="submit" id="signin" name="signin" value="Sign In">

    </form>

    <?php
        if(isset($_POST["signin"])){
            $userName = $_POST["username"];
            $password = $_POST["password"];

            $sql = "SELECT * FROM signup WHERE username = '$userName'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if($user){
                if(password_verify($password, $user["password"])){

                    // session_start();
                    // $_SESSION["username"] = $user["username"];

                    if($user["UserType"] == 'Admin'){
                        
                        $_SESSION["AdminID"] = $user["signup_id"];
                        header('Location: AdminPage.php');
                    }
                    else if($user["UserType"] == 'User'){
                            $_SESSION["UserID"] = $user["signup_id"];
                            header('Location: UserPage.php');
                    }
                }else{
                    echo "<div id='error'>Password does not match!</div>";
                }
            }else{
                echo "<div id='error'>User does not match!</div>";
            }
        }

?>

</div>

