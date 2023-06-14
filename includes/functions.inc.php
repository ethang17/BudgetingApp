<?php

function emptyInputSignup($name, $email, $username, $password, $repeatPWD){
    $result;
    if(empty($name) || empty($email) || empty($username) || empty($password) || empty($repeatPWD)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function invalidUid($username){
    $result;
    if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
function invalidEmail($email){
    $result;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
function pwdMatch($password, $repeatPWD){
    $result;
    if($password !== $repeatPWD){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
function uidExists($conn, $username, $email){
    $sql = 'SELECT * FROM users WHERE usersUID = ? OR usersEmail = ?;';
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location:../signup.php?error=sqlFail");
        exit();  
    }
    mysqli_stmt_bind_param($stmt, 'ss', $username, $email);
    mysqli_stmt_execute($stmt);

    $resultsData = mysqli_stmt_get_result($stmt);
    if($row = mysqli_fetch_assoc($resultsData)){
        return $row;
    }
    else{
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
    
}
function createUser($conn, $name, $email, $username, $pwd){

    $sql = 'INSERT INTO users (usersName, usersEmail, usersUID, usersPWD) values (?, ?, ?, ?);';
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location:../signup.php?error=sqlFail");
        exit();  
    }
    $hashedPWD = password_hash($pwd, PASSWORD_DEFAULT);


    mysqli_stmt_bind_param($stmt, 'ssss', $name, $email, $username, $hashedPWD);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);

    header("location:../signup.php?error=none");
    exit();  
    

}
    function emptyInputLogin($username, $pwd){
        $result;
        if(empty($username) || empty($pwd)){
            $result = true;
        }
        else{
            $result = false;
        }
        return $result;
    }

    function loginUser($conn, $username, $pwd){
        $uidExists = uidExists($conn, $username, $username);

        if($uidExists === false){
            header("location: ../login.php?errpr=wronLogin");
            exit();
        }

        $pwdHashed = $uidExists['usersPWD'];
        $checkPwd = password_verify( $pwd, $pwdHashed);

        if($checkPwd === false){
            header("location:../login.php?error=wrongLogin");
            exit();
        }
        else if($checkPwd === true){
            session_start();
            $_SESSION["userId"] = $uidExists['usersID'];
            $_SESSION["useruid"] = $uidExists['usersUID'];
            header("location:../index.php");
            exit();
        }
    }
