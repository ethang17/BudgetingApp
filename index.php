<?php 
include_once 'header.php'
?>
        <div class="indexPage">
            <?php
            if(isset($_SESSION['useruid'])){
                if($_SESSION['balanceCreated']==="0"){
                    echo('<h1 class="homeTitle"> Hey ' . $_SESSION['userName']. "!</h1>");

                    include_once 'NotSetUpHome.php';
                }
                else{
                    include_once 'home.php';
                }
            }
            else{

            }
                

                ?>
                
        </div>
        <?php

        ?>
<?php
include_once 'footer.php'
?>