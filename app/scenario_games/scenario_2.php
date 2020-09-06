<!DOCTYPE html>
<html>
<?php

require_once '../include/common.php';

$years = 5;

$bond_r = $_SESSION['bond_rate'];
$maturity_cnt = $_SESSION['maturity_count'];
$age = $_SESSION['age'] + $years;
$balance = $_SESSION['balance'];
$interest = $_SESSION['interest']

// echo $_SESSION["cpf"];

?>

<head>

  <style type="text/css">
    .centerDiv {
      width: 60%;
      height: 200px;
      margin: 0 auto;
      background-color: #D3D3D3;
    }
  </style>

</head>

<body>

  <?php include 'navbar.php'; ?>
  <div class="centerDiv">
    <h3> Scenario 2 </h3>
    <p>
      <?php
      echo "
                ... 5 years later, you are now $age years old
            ";
      ?>
    </p>
    <p>
        Oops! Recession is happening now and the economy is bad. Savings annual interest rate has dropped to 0.5%!
        You have also successfully repaid all your tuition fee loan!
    </p>
    <p>
      <?php
            // Tuition Fee Loan
            $loan = 10000 * (1.0475) ** 5;

            $current_balance = $balance * (1 + $interest) ** years - $loan;
            $current_mat_cnt = $maturity_cnt - $years;
            
            echo "
            
                Your current savings balance is: $current_balance </br>
                Your bonds have $current_mat_cnt years to mature </br>
            
            ";

      $_SESSION['age'] = $age;
      $_SESSION['balance'] = $current_balance;
      $_SESSION['maturity_count'] = $current_mat_cnt;
      $_SESSION['interest'] = 0.05;

      if ($current_balance >= 0) {
        echo "      
          <form action='scenario_3.php' method='post'>
              <input type='submit' value='Next'>
          </form>
      "; 
    } else {
      echo "<br><h4>Sorry but you have failed to maintain a good portfolio</h4>
          <form action='scenario_main.php' method='post'>
              <input type='submit' value='Go Back to Main Page'>
          </form>
      ";
    }

      ?>
    </p>
  </div>
</body>

</html>