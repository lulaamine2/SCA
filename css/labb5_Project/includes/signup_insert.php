<?php
include("connect.php");
//require_once 'signupFunction.php';



if(isset($_POST['signup'])){

    $userName = $_POST["userName"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $repPassword = $_POST["repPassword"];
    $telNr = $_POST["telNr"];
    $errors = array();

    if(empty($userName) || empty($password) || empty($repPassword) || empty($email) || empty($telNr)){
        array_push($errors, "All fields are required!");
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        array_push($errors, "Email is not valid!");
    }


    if(strlen($password)<8){
        array_push($errors, "Password must be at leas 8 character!");
    }

    if(($password !== $repPassword)){
        array_push($errors, "Password does not match!");
    }

    if(count($errors) >0){
        foreach($errors as $error){
            echo "<div class='alert alert-danger'>$error</div>";
        }
    }
    else{
        
    }
    

}
?>