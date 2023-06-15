<?php 
include_once 'header.php'
?>
        <div class="indexPage">
            <?php
                echo('<h1 class="homeTitle"> Hey ' . $_SESSION['userName']. "!</h1>");
                if($_SESSION['balanceCreated']==="0"){
                    echo('<h3 class="notMade">It looks like you have not set up your account yet</h3>');
                    echo('<a href = "makeBudget.php" class="makeButton" ><h2 class ="makeBudget">Start Spending Splendid</h2></a>');
                }
                

                ?>
                
        </div>
        <?php

        ?>
<?php
include_once 'footer.php'
?>