<?php 
include_once 'header.php';
include_once 'includes/chartSetup.inc.php';
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<div>
    <h1 class = "homeTitle">
        Hey <?php echo($_SESSION['userName']);?>!
        
    </h1>
    <canvas id="goalChart" style="width:100%;max-width:600px"></canvas>
</div>

<script>
const xValues = ["Italy", "France", "Spain", "USA", "Argentina"];
const yValues = [55, 49, 44, 24, 15];
const barColors = ["#FFEE12", "green","blue","orange","brown"];
new Chart("goalChart", {
  type: "pie",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    legend: {display: true},
    title: {
      display: true,
      text: "Goal Budget: $"+ <?php echo $_SESSION['budgetBalance'];?>,
    }
  }
});
</script>
<?php
include_once 'footer.php'
?>