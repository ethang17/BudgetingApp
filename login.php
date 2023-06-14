<?php
include_once 'header.php'
?>
<section class='signUpSection'>
    <div class="signUpForm">
        <h2>Login</h2>
        <form action="includes/login.inc.php" method="post">
            <input type='text' name='uid' placeholder='Username or Email...'>
            <input type='password' name='pwd' placeholder='Password...'>
            <button type="submit" name = 'submit'>Login</button>

        </form>
        <?php
            if(isset($_GET['error'])){
                if($_GET['error'] == "emptyinput"){
                    echo"<p>Fill in all fields!</p>";
                }
            }
            if(isset($_GET['error'])){
                if($_GET['error'] == "wrongLogin"){
                    echo"<p>Check your username and password</p>";
                }
            }
            
            ?>
    </div>
</section>

<?php
include_once 'footer.php'
?>