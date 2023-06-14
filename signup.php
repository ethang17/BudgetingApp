<?php 
include_once 'header.php'
?>
<section class='signUpSection'>
    <div class='signUpForm'>    
        <h2>Sign Up</h2>
        <form action="includes/signup.inc.php" method="post">
            <input type='text' name='name' placeholder='Full Name...'>
            <input type='text' name='email' placeholder='Email...'>
            <input type='text' name='uid' placeholder='Username...'>
            <input type='password' name='pwd' placeholder='Password...'>
            <input type='password' name='pwdrepeat' placeholder='Repeat Password...'>
            <button type="submit" name = 'submit'>Sign Up</button>

        </form>
        <?php
            if(isset($_GET['error'])){
                if($_GET['error'] == "emptyinput"){
                    echo"<p>Fill in all fields!</p>";
                }
            }
            if(isset($_GET['error'])){
                if($_GET['error'] == "invaliduid"){
                    echo"<p>This username is invalid</p>";
                }
            }
            if(isset($_GET['error'])){
                if($_GET['error'] == "invalidemail"){
                    echo"<p>This email is invalid</p>";
                }
            }
            if(isset($_GET['error'])){
                if($_GET['error'] == "passmatch"){
                    echo"<p>Your passwords must match</p>";
                }
            }
            if(isset($_GET['error'])){
                if($_GET['error'] == "usernametaken"){
                    echo"<p>This username or email is taken</p>";
                }
            }
            if(isset($_GET['error'])){
                if($_GET['error'] == "none"){
                    echo"<p>You are signed up!</p>";
                }
            }

        ?>
</div>

</section>

<?php
include_once 'footer.php'
?>