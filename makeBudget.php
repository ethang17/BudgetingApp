<?php
include_once 'header.php'
?>
<div>
    <h3 class="homeTitle">Making a Budget</h3>
    <form class= 'budgetForm' action="includes/chartinfo.inc.php" method="post">
            <div class="budgetRow">
                <h3>$</h3>
                <input class='total' type='number' name='total' placeholder='Total Budget'>
            </div>
            <div class="budgetRow">
                <input class= 'budgetCol' type='color' name='colorOne' value='#121212'>
                <input class = "cat" type='text' name='catOne' placeholder='First Category'>
                <input class = 'perc' type='number' name='percentOne' placeholder='Percentage of Total' min=0 max=100 >
                <h3>%</h3>
            </div>
            <div class="budgetRow">
                <input class= 'budgetCol' type='color' name='colorTwo' value='#03a52e'>
                <input class = "cat" type='text' name='catTwo' placeholder='Second Category'>
                <input class = 'perc' type='number' name='percentTwo' placeholder='Percentage of Total' min=0 max=100 >
                <h3>%</h3>
            </div>
            <div class="budgetRow">
                <input class= 'budgetCol' type='color' name='colorThree' value='#e7c100'>
                <input class = "cat" type='text' name='catThree' placeholder='Third Category'>
                <input class = 'perc' type='number' name='percentThree' placeholder='Percentage of Total' min=0 max=100 >
                <h3>%</h3>
            </div>
            <button type="submit" name = 'submit'>Create Budget</button>



        </form>
        <?php
            if(isset($_GET['error'])){
                if($_GET['error'] == "emptyField"){
                    echo"<p>Fill in all fields!</p>";
                }
                else if ($_GET['error']=='hundred'){
                    echo '<p>Percentages must add up to 100%!</p>';
                }
            }
            ?>
</div>

<?php
include_once 'footer.php'
?>