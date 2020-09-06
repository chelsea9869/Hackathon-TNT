<!DOCTYPE html>
<html>

<?php

require_once '../include/common.php';

$years = 2;

$bonds_percent = $_SESSION["bonds"] = $_POST["Bonds-percent"];
$insurance_percent = $_SESSION["insurance"] = $_POST["Insurance-percent"];
$savings_percent = $_SESSION["savings"] = $_POST["Savings-percent"];
$cpf_percent = $_SESSION["cpf"] = $_POST["CPF-percent"];

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
      repay your loans at one shot. You have to pay $10,000 within 5 years with annual interest of 4.75%
    </p>
    <p>

      <?php

      $current_balance = ($savings_percent / 100) * $balance * (1 + $interest) ** $years;

      $current_mat_cnt = $maturity_cnt - $years;
      echo "
            
                Your current savings balance is: $current_balance </br>
                Your bonds have $current_mat_cnt years to mature </br>
            
            ";

      $_SESSION['age'] = $age;
      $_SESSION['balance'] = $current_balance;
      $_SESSION['maturity_count'] = $current_mat_cnt;

      ?>

      <form action="scenario_2.php" method="post">
        <input type="submit">
      </form>
    </p>
  </div>
</body>

</html>