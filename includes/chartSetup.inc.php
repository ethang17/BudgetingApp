<?php

require_once 'dbh.inc.php';
require_once 'functions.inc.php';

   $budgetArray = getBudgetInfo($conn);
   $budgetCategoryString = $budgetArray['categories'];
   $budgetBalance = $budgetArray['balance'];
   $_SESSION['budgetBalance'] = $budgetBalance;

   $categories = explode("^", $budgetCategoryString);
   $index = 0;
   foreach($categories as $cat){
    $categories[$index] = explode("-", $cat);
    $index = $index + 1;
   }
   $_SESSION['budgetCat'] = $categories;




