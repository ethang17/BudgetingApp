<?php
/*SIGN IN AND LOGOUT*/
session_start();
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

    $sql = 'INSERT INTO users (usersName, usersEmail, usersUID, usersPWD, balanceCreated) values (?, ?, ?, ?, 0);';
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
            header("location: ../login.php?error=wronLogin");
            exit();
        }

        $pwdHashed = $uidExists['usersPWD'];
        $checkPwd = password_verify( $pwd, $pwdHashed);

        if($checkPwd === false){
            header("location:../login.php?error=wrongLogin");
            exit();
        }
        else if($checkPwd === true){

            $_SESSION["userId"] = $uidExists['usersID'];
            $_SESSION["useruid"] = $uidExists['usersUID'];
            $_SESSION["useremail"] = $uidExists['usersEmail'];
            $_SESSION["userName"] = $uidExists['usersName'];
            $_SESSION["balanceCreated"] = $uidExists['balanceCreated'];

            header("location:../index.php");
            exit();
        }
    }

    /*MAKING BUDGET*/

    function emptyFields($t, $c1, $p1, $c2, $p2, $c3, $p3){
        if( empty($t) || empty($c1) || empty($c2) ||empty($c3) || empty($p1) ||empty($p2) || empty($p3)){
            $result = true;
        }
        else{
            $result = false;
        }
        return $result;
    }
    function hundredPercent($p1, $p2, $p3){
        if(($p1 + $p2 + $p3) == 100){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }
    function createBudgetPlan($conn, $totalBudget, $cat){
        $sql = 'INSERT INTO financialInfo (userID, balance, categories) values (?, ?, ?);';
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location:../signup.php?error=sqlFail");
            exit();  
        }
        mysqli_stmt_bind_param($stmt, 'sss', $_SESSION['userId'], $totalBudget, $cat);
        

        mysqli_stmt_execute($stmt);
    
        mysqli_stmt_close($stmt);
    
        $sql2 = 'UPDATE users SET balanceCreated = 1 WHERE usersID = (?)';
        $statement = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($statement, $sql2)){
            header("location:../signup.php?error=sqlFail");
            exit();  
        }
        mysqli_stmt_bind_param($statement, 's', $_SESSION['userId']);
        mysqli_stmt_execute($statement);
    
        mysqli_stmt_close($statement);
        $_SESSION['balanceCreated'] = 1;
        header("location:../index.php");
        exit();  
        
    }

