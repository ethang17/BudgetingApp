<?php

    if (isset($_POST["submit"])) {
        echo "It works";
        $name = $_POST['name'];
        $email = $_POST['email'];
        $username = $_POST['uid'];
        $password = $_POST['pwd'];
        $repeatPWD = $_POST['pwdrepeat'];

        require_once 'dbh.inc.php';
        require_once 'functions.inc.php';

        if(emptyInputSignup($name, $email, $username, $password, $repeatPWD) !== false){
            header("location:../signup.php?error=emptyinput");
            exit();
        }
        if(invalidUid($username) !== false){
            header("location:../signup.php?error=invaliduid");
            exit();
        }
        if(invalidEmail($email) !== false){
            header("location:../signup.php?error=invalidemail");
            exit();
        }
        if(pwdMatch($password, $repeatPWD)!==false){
            header("location:../signup.php?error=passmatch");
            exit();
        }
        if(uidExists($conn, $username, $email)!==false){
            header("location:../signup.php?error=usernametaken");
            exit();  
        }


        createUser($conn, $name, $email, $username, $password);
    }
    else{
        header("location:../signup.php");
        exit();
    }


