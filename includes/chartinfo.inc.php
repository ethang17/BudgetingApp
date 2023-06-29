<?php

    if (isset($_POST["submit"])) {
        echo('It Works');
        $totalBudget = $_POST['total'];

        $catOne = $_POST['catOne'];
        $percOne = $_POST['percentOne'];
        $colorOne = $_POST['colorOne'];

        $catTwo = $_POST['catTwo'];
        $percTwo = $_POST['percentTwo'];
        $colorTwo = $_POST['colorTwo'];

        $catThree = $_POST['catThree'];
        $percThree = $_POST['percentThree'];
        $colorThree = $_POST['colorThree'];

        require_once 'dbh.inc.php';
        require_once 'functions.inc.php';



        if (emptyFields($totalBudget, $catOne, $percOne, $catTwo, $percTwo, $catThree, $percThree)){
            header('location:../makeBudget.php?error=emptyField');
            exit();
        }
        if(hundredPercent($percOne, $percTwo, $percThree)){
            header('location:../makeBudget.php?error=hundred');
            exit();
        }else{
            header('location:../index.php');
            exit();
        }

    }

