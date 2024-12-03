<?php 
    $page = "signup";
    include("includes/connect.php");

    include("menu.php");
?>

<!--body id="signup_body"-->

<div id="signup_div">

    <form id="signup_form" action="signup.php" method="POST">

        <label>FirstName</label>
        <input type="text" name="FirstName" placeholder="Firstname...">

        <label>LastName</label>
        <input type="text" name="LastName" placeholder="Lastname...">


        <label>Username</label>
        <input type="text" name="userName" placeholder="Username...">

        <label>E-post</label>
        <input type="text" name="email" placeholder="Email...">

        <label>Password</label>
        <input type="password" name="password" placeholder="Password...">

        <label>Repeat Password</label>
        <input type="password" name="repPassword" placeholder="Password...">

        <label>TelNumber</label>
        <input type="text" id="" name="telNr" placeholder="Telefon...">

        <label>UserType</label>
        <select name="UserType" id="UserType">
            <option value="User">User</option>
            <option value="Admin">Admin</option>
        </select>

        <input type="submit" id="signup" name="signup" value="Sign Upp">
        <!--p>Jag har ett konto redan <a href="signin.php">Login här</a></!--p-->
    </form>

    <?php
        if(isset($_POST['signup'])){

            $firstName = $_POST["FirstName"];
            $lastName = $_POST["LastName"];
            $userName = $_POST["userName"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $repPassword = $_POST["repPassword"];
            $telNr = $_POST["telNr"];
            $UserType = $_POST["UserType"];
            $errors = array();

            $password_hash = password_hash($password, PASSWORD_DEFAULT);
        
            if(empty($firstName) || empty($lastName) || empty($userName) || empty($password) || empty($repPassword) || empty($email) || empty($telNr) || empty($UserType)){
                array_push($errors, "You should Fill in all fields!");
            }
        
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                array_push($errors, "Email is not valid!");
            }
        
        
            if(strlen($password)<4){
                array_push($errors, "Password must be at leas 8 character!");
            }
        
            if(($password !== $repPassword)){
                array_push($errors, "Password does not match!");
            }
        
            $sql = "SELECT * FROM signup WHERE email = '$email' OR username = '$userName'";
            $resultt = mysqli_query($conn, $sql);
            $rowCount = mysqli_num_rows($resultt);
            if($rowCount > 0){
                array_push($errors, "Email or UserName already exists!");
            }

            if(count($errors) >0){
                foreach($errors as $error){
                    echo "<div id='error'>$error</div>";
                }
            }
            else{
                $sql = "INSERT INTO signup(firstName, lastName, username, email, password, TELNR, UserType) VALUE( ?, ?, ?, ?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                $result = mysqli_stmt_prepare($stmt, $sql);
                if($result){
                    mysqli_stmt_bind_param($stmt, 'sssssss', $firstName, $lastName, $userName, $email, $password_hash, $telNr, $UserType);
                    mysqli_stmt_execute($stmt);
                    echo '<div id="error">Record inserted successfully!</div>';
                    
                }else{
                    die("Something went wrong");
                }
            }
        }
?>

</div>

</!--body>