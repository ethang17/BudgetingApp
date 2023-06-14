<!--DATABASE HANDLER--->
<?php


$serverName ='localhost';
$dbUsername ='root';
$dbPassword ='';
$dbName ='loginSystemBudgeter';

$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

if(!$conn){
    die('Connecion failed: ' . mysqli_connect_error());
}