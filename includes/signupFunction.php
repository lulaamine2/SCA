<?php
require_once 'connect.php';

function isEmptyUserName($userName){
    $result = null;
    if(empty($userName)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function isEmptyPassword($password){
    $result = null;
    if(empty($password)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}


function isEmptyRepPassword($repPassword){
    $result = null;
    if(empty($repPassword)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}



function isEmptyEmail($email){
    $result = null;
    if(empty($email)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}



function isEmptyTelNe($telNr){
    $result = null;
    if(empty($telN)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}




function userNameValid($userName){
    $result = null;
    if(preg_match("/^[a-zA-Z0-9_-]{6,12}$/", $userName)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}


function emailValid($email){
    $result = null;
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function telNrValid($telNr){
    $result = null;
    if(preg_match("/^[0-9]{7,14}$/", $telNr)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}


function passwordMatch($password, $repPassword){
    $result = null;
    if($password == $repPassword){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function emailExist($email){
    $result = null;
    $sql = "SELECT * FROM signup WHERE email = '$email'";
    $query = mysqli_query($GLOBALS['conn'], $sql);
    $numRows=mysqli_num_rows($query);

    if($numRows>0){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}


function userNameExist($userName){
    $result = null;
    $sql = "SELECT * FROM signup WHERE username = '$userName'";
    $query = mysqli_query($GLOBALS['conn'], $sql);
    $numRows=mysqli_num_rows($query);

    if($numRows>0){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function userExist($userName, $email){
    $result = null;
    $sql = "SELECT * FROM signup WHERE username = ? or email = ?;";

    $stmt = mysqli_stmt_init($GLOBALS['conn']);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=NotValidStatement");
        exit();
    }
    mysqli_stmt_bind_param($stmt, 'ss', $userName, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($user = mysqli_fetch_assoc($resultData)){
        return $user;
    }else{
        $result = false;
        return $result;
    }
}

function creatNewUser($userName, $password, $email, $telNr){
    $result = null;
    $sql = "INSERT INTO signup (username, email, password, TELNR) VALUE(?,?,?,?);";

    $stmt = mysqli_stmt_init($GLOBALS['conn']);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=NotValidInsertStmt");
        exit();
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, 'ssss', $userName, $$hashedPassword, $email, $telNr);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header('location: ../signup.php?error=none');
}





?>