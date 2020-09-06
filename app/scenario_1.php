<!DOCTYPE html>
<html>

<?php
include 'navbar.php';
require_once 'include/common.php';

$years = 2;

$bonds_percent = $_SESSION["bonds"] = $_POST["Bonds-percent"];
$insurance_percent = $_SESSION["insurance"] = $_POST["Insurance-percent"];
$savings_percent = $_SESSION["savings"] = $_POST["Savings-percent"];
// $cpf_percent = $_SESSION["cpf"] = $_POST["CPF-percent"];

$bond_r = $_SESSION['bond_rate'];
$maturity_cnt = $_SESSION['maturity_count'];
$age = $_SESSION['age'] + $years;
$balance = $_SESSION['balance'];
$interest = $_SESSION['interest'];

// echo $_SESSION["cpf"];
// echo $_SESSION["insurance"];

?>

<head>
  <title> The Millionnials </title>
  <style type="text/css">
    .centerDiv {
      width: 60%;
      height: auto;
      margin: 0 auto;
      background-color: #D3D3D3;
    }
  </style>

</head>

<body>

  <div class="centerDiv">
    <h3> Scenario 1 </h3>
    <p>
      <?php
      echo "
                ... 2 years later, you are now $age years old
            ";
      ?>
    </p>
    <p>
        Congratulations on your recent graduation from SMU! It is time for you to start repaying your tuition fee loan. You have opted to 
        repay your loans at one shot. You have to pay $10,000 within 5 years with annual interest of 4.75%, compounded every 5 years.
    </p>
    <p>

      <?php

      $current_balance = ($savings_percent / 100) * $balance * (1 + $interest) ** $years;

      $current_mat_cnt = $maturity_cnt - $years;
      echo "
      <br><br>
                Your current savings balance is: $current_balance </br>
                Your bonds have $current_mat_cnt years to mature </br>
            
            ";

      $_SESSION['age'] = $age;
      $_SESSION['balance'] = $current_balance;
      $_SESSION['maturity_count'] = $current_mat_cnt;

      if ($current_balance >= 0) {
          echo "      
            <form action='scenario_2.php' method='post'>
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