<div id="container">
    <?php
        include("includes/connect.php");
        $sql_select = "SELECT * FROM creat_insert";
        $result = mysqli_query($conn, $sql_select);
        
            while($row = mysqli_fetch_array($result))
            { 
                ?>
                    <div id='image'>
                        <h4><?= $row['fname']?></h4>
                        <img src="<?='images/' . $row['img']?>">
                        <p><?= "$" . $row['price']?></p>
                        <div id="overlay">
                            <a href="" id="">Add to cart</a>
                        </div>
                    </div>

            <?php }?>
</div>






<di>
    <a href="cart_check.php">cart</a>
</di>


<div id="container">
    <?php
        include("includes/connect.php");
        $sql_select = "SELECT * FROM creat_insert";
        $result = mysqli_query($conn, $sql_select);
        
        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_array($result))
            { 
                ?>
                <form action="cart.php" method="post">
                    <div id='image'>
                        <p><?= $row['fname']?></p>
                        <img src="<?='images/' . $row['img']?>">
                        <p><?= "$" . $row['price']?></p>

                        <input type="text" id="quantity" name="quantity" value="1">
                        <!--input type="hidden" id="hidden_id" value="<?php //echo $row['id']?>"-->
                        <input type="hidden" name="hidden_name" value="<?php echo $row["fname"]?>">
                        <input type="hidden" name="hidden_image" value="<?php echo 'images/' . $row['img']?>">
                        <input type="hidden" name="hidden_price" value="<?php echo $row['price']?>">
                        <input type="submit" name="add" value="Add to cart">
                    </div>
                </form>    
            <?php }}?>
</div>






<!--Old sign up--> 

<?php 
    $page = "signup";
    include("header.php");
?>

<!--body id="signup_body"-->

<!--div id="signup_div">
    
    <h1>Sign up</h1>
    <form id="signup_form" action="includes/signup_insert.php" method="POST">

        <label>Förnamn</label>
        <input type="text" name="fname" placeholder="Förnamn...">

        <label>Efternamn</label>
        <input type="text" name="lname" placeholder="Efternamn...">
        
        <label>Användnamn</label>
        <input type="text" name="username" placeholder="Username...">

        <label>E-post</label>
        <input type="text" name="email" placeholder="E-pos...">

        <label>Lösenord</label>
        <input type="password" name="password" placeholder="Lösenord...">

        <label>Bekräfta Lösenord</label>
        <input type="password" name="conpassword" placeholder="Lösenord...">

        <label>Kön</label>
        <input type="text" id="" name="gender" placeholder="Kön...">

        <input type="submit" id="signup" name="signup" value="Sign Upp">
    </form>

    <p>Jag har ett konto redan <a href="signin.php">Login här</a></p>
</!--div>

</!--body-->




<!--?php/*
include("connect.php");

if(isset($_POST["signup"])){

    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $conpassword = $_POST["conpassword"];
    $gender = $_POST["gender"];



    $sql_select = "SELECT username FROM signup WHERE username = '$username'";
    $sqlres = mysqli_query($conn, $sql_select);
    $rowcount = mysqli_num_rows($sqlres);

    if($rowcount !=0){
        echo "Användare finns redan";
    }

    if($password != $conpassword){
        echo "Lösenordet stämmer inte";
    }

    if(($rowcount == 0) && ($password == $conpassword)){
        echo "You have successfully signed up";

        $sql_insert = "INSERT INTO signup (fname, lname, username, email, password, conpassword, gender) VALUES ('$fname', '$lname', '$username', '$email', '$password', '$conpassword', '$gender')";
        mysqli_query($conn, $sql_insert);

        header("Location: ./index.php?test=success");
    }
}
*/?>






<!-?php
include("connect.php");
require_once 'signupFunction.php';


$userName = $_POST["userName"];
$password = $_POST["password"];
$repPassword = $_POST["repPassword"];
$email = $_POST["email"];
$telNr = $_POST["telNr"];



if(isset($_POST['signup'])){

    if(isEmptyUserName($userName) || isEmptyPassword($password) || isEmptyRepPassword($repPassword) || isEmptyEmail($email) || isEmptyTelNe($telNr)){
        header("Location: ../signup.php?error=emtyField");
        exit();
    }

    if(!userNameValid($userName)){
        header("Location: ../signup.php?error=NotValidUserName");
        exit();
    }

    if(!emailValid($email)){
        header("Location: ../signup.php?error=NotValidEmail");
        exit();
    }

    if(!telNrValid($telNr)){
        header("Location: ../signup.php?error=NotValidTelNr");
        exit();
    }

    if(!passwordMatch($password, $repPassword)){
        header("Location: ../signup.php?error=NotMatchPwd");
        exit();
    }

    if(emailExist($email)){
        header("Location: ../signup.php?error=emailExist");
        exit();
    }
    
    if(userNameExist($userName)){
        header("Location: ../signup.php?error=userNameExist");
        exit();
    }

    if(userExist($userName, $email)){
        header("Location: ../signup.php?error=userExist");
        exit();
    }

    creatNewUser($userName, $password, $email, $telNr);


}
?->



<!-div-- id="error">
        <!-?php
            if(isset($_GET['error'])){
                if($_GET['error'] == 'emtyField'){
                    echo "<p> You should Fill in all fields! </p>";
                }
                else if($_GET['error'] == 'NotValidUserName'){
                    echo "<p> UserName not valid.. You should add numner and letter from 6-12 digits! </p>";
                }
                else if($_GET['error'] == 'NotValidEmail'){
                    echo "<p> Email not valid.. You should add proper Email like m@gmail.com! </p>";
                }
                else if($_GET['error'] == 'NotValidTelNr'){
                    echo "<p> TelefonNumber not valid.. You should add numner and letter from 6-12 digits! </p>";
                }
                else if($_GET['error'] == 'NotMatchPwd'){
                    echo "<p>  You should match Repeate password! </p>";
                }

                else if($_GET['error'] == 'emailExist'){
                    echo "<p> Email is exist.. Please write new Email! </p>";
                }
                
                else if($_GET['error'] == 'userNameExist'){
                    echo "<p> UserName is exist.. Please write new UserName! </p>";
                }
                
                else if($_GET['error'] == 'userExist'){
                    echo "<p> User is exist.. Please add new UserName! </p>";
                }

                else if($_GET['error'] == 'NotValidStatement'){
                    echo "<p> Not value select statement! </p>";
                }
                else if($_GET['error'] == 'NotValidInsertStmt'){
                    echo "<p> Not value insert statement! </p>";
                }
                else if($_GET['error'] == 'none'){
                    echo "<p> Well done.. You add new User! </p>";
                }
            }
        ?>
    </!-div-->



    <li id="produkt"><a <?php if($page == 'produkter'){echo "class='active'";}?> href="category.php">Category</a></li>
        <li id="kontakt"><a <?php if($page == 'kontakt'){echo "class='active'";}?> href="kontakt.php">Kontakt</a></li>
        <li id="omoss" ><a <?php if($page == 'omoss'){echo "class='active'";}?> href="om_oss.php">Om oss</a></li>


    <li><a <?php if($page == 'cart'){echo "class='active'";}?> href="cart_check.php"><i class="fafa-shopping-cart" aria-hidden="true"></i></ ></li>
    <li id="signup_menu"><a <?php if($page == 'profile'){echo "class='active'";}?> href="profile.php">Sign up</a></li>
    <li id="signup_menu"><a <?php if($page == 'logout'){echo "class='active'";}?> href="logout.php">Sign up</a></li>

            <li id="signin_menu"><a <?php if($page == 'signin'){echo "class='active'";}?> href="signin.php">Sign in</a></li>
            <li id="signup_menu"><a <?php if($page == 'signup'){echo "class='active'";}?> href="signup.php">Sign up</a></li>

            
            <!-- <li><a <!?php if($page == 'cart'){echo "class='active'";}?> href="cart_check.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li> -->
            <!-- <li id="signin_menu"><a <!?php if($page == 'signin'){echo "class='active'";}?> href="signin.php">Sign in</a></li> -->
            <!-- <li id="signup_menu"><a <!?php if($page == 'signup'){echo "class='active'";}?> href="signup.php">Sign up</a></li> -->



            
            if (!isset($_SESSION['user'])) {
                echo "<li id=signin_menu'><a href='profile.php'>Profile</a></li>";
                echo "<li id=signin_menu'><a href='logout.php'>Logout</a></li>";
            } else {
                echo "<li id=signin_menu'><a href='signin.php'>Login</a></li>";
                echo "<li id=signin_menu'><a href='signup.php'>Signup</a></li>";
            }





            <?php
        if(isset($_POST["signin"])){
            $userName = $_POST["username"];
            $password = $_POST["password"];
            $UserType = $_POST["UserType"];

            $sql = "SELECT * FROM signup WHERE username = '$userName'";
            $result = mysqli_query($conn, $sql);
            
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if($user){
                if(password_verify($password, $user["password"])){

                    session_start();
                    $_SESSION["username"] = $user["username"];
                    $_SESSION["UserType"] = $user["UserType"];
                    header("Location: index.php");
                    die();
                }else{
                    echo "<div id='error'>Password does not match!</div>";
                }
            }else{
                echo "<div id='error'>User does not match!</div>";
            }
        }






        if($row["UserType"] == 'Admin'){
            $_SESSION["AdminName"] = $row["username"];
            header('Location: Admin/AdminPage.php');
        }
        elseif($row["UserType"] == 'User'){
                $_SESSION["UserName"] = $row["username"];
                header('Location: kontakt.php');
        }












        // users search
        
        /*
            
<?php
    $page = 'AdminPage';
    include("includes/connect.php");
    include("menu.php");
?>    

<?php
    if(isset($_GET["delete"])){
        $ID = $_GET["name"];
        $deleteQuery = "DELETE FROM `signup` WHERE signup_id = '$ID'";
        mysqli_query($conn, $deleteQuery);
    }
?>

<div id="admin_div">
    <li>
    <?php
            if (isset($_SESSION['AdminID'])) { ?>
                <a href="javascript:void(0);" onclick="loadPage('Admin_user.php')">Home</a>
                <?php } else {
                    echo "Error";
                }
        ?>
    </li>
    <li>
        <?php
                if (isset($_SESSION['AdminID'])) { ?>
                    <a href="javascript:void(0);" onclick="loadPage('Admin_users.php')">Users</a>
            <?php } else {
                    echo "Error";
                }
        ?>
    </li>
    <li>
        <?php
            if (isset($_SESSION['AdminID'])) { ?>
                <a href="javascript:void(0);" onclick="loadPage('creat_product.php')">Creat Product</a>

            <?php } else {
                echo "Error";
            }
        ?>
    </li>
</div>


<h1>
    Welcome to Admin Page
    <span id="span"><?php echo $_SESSION['AdminID']; ?></span>
</h1>

<iframe id="contentFrame" src="" frameborder="0"></iframe>


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


<script>
        function loadPage(page) {
            document.getElementById('contentFrame').src = page;
        }
</script>
        */