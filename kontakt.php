<?php 
    $page = "kontakt";
    include("includes/connect.php");

    include("menu.php");
?>


<h3>Contact us</h3>

<div class="container_kontakt">
    <form id="kontact_form" action="kontakt.php" method="POST">
        <label for="fullName">Full Name</label>
        <input type="text" id="fullname" name="fullname" placeholder="Your full name..">

        <label for="Email">Email</label>
        <input type="text" id="email" name="email" placeholder="Your Email..">

        <label for="help">How can we help you!</label>
        <textarea id="help" name="message" placeholder="Write something.."></textarea>

        <input type="submit" name="skicka" value="skicka">
    </form>

    <?php
        if(isset($_POST["skicka"])){
            $fullName = $_POST["fullname"];
            $email = $_POST['email'];
            $message = $_POST['message'];
            $errors = array();

            if(empty($fullName) OR empty($email) OR empty($message)){
                echo "You should Fill in all fields!";
            }
            
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                echo "Email is not valid!";
            }

            else{
                $sql_message = "INSERT INTO `contact`(`fullName`, `email`, `message`) VALUES ('$fullName', '$email', ' $message')";
                $result = mysqli_query($conn, $sql_message);
        
                if($result){
                    echo "Data inserted";
                }else{
                    echo "Data  not inserted";
                }
            }
        }
?>
</div>
