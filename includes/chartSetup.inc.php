<?php

require_once 'dbh.inc.php';
require_once 'functions.inc.php';

   $budgetArray = getBudgetInfo($conn);
   $budgetCategoryString = $budgetArray['categories'];
    $budgetBalance = $budgetArray['balance'];
    echo($budgetBalance);
    echo($budgetCategoryString);

