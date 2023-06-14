<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Budgeter</title>
        <meta name ='viewport' content="width=device-width, initial-scale = 1.0">
        <link rel="stylesheet" href="style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto+Mono:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">        
    </head>
    <body>
        <div class="navbar">
            <nav>
                <div>
                    <a href="index.php">
                        <h1>HOME</h1>
                    </a>
                </div>
                <div class="navLinks">
                    <ul>
                        <?php
                            if(isset($_SESSION['useruid'])){
                                echo("<li><a href='profile.php'>PROFILE</a></li>");
                                echo("<li><a href='includes/logout.inc.php'>LOGOUT</a></li>");
                            }
                            else{
                                echo("<li><a href='signup.php'>SIGNUP</a></li>");
                                echo("<li><a href='login.php'>LOGIN</a></li>");
                            }
                        ?>
                        
                </div>
            </nav>
        </div>