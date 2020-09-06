<!DOCTYPE html>
<html >

<?php
    
    require_once '../include/common.php';

    $years = 5;

    $bonds_percent = $_SESSION["bonds"] = $_POST["Bonds-percent"];
    $insurance_percent = $_SESSION["insurance"] = $_POST["Insurance-percent"];
    $savings_percent = $_SESSION["savings"] = $_POST["Savings-percent"];
    $cpf_percent = $_SESSION["cpf"] = $_POST["CPF-percent"];
    
    $bond_r = $_SESSION['bond_rate'];
    $maturity_cnt = $_SESSION['maturity_count'];
    $age = $_SESSION['age']+$years;
    $balance = $_SESSION['balance'];
    $interest = $_SESSION['interest']
    
    // echo $_SESSION["cpf"];

?>

<head>

  <style type="text/css">
    .centerDiv
    {
      width: 60%;
      height:200px;
      margin: 0 auto;
      background-color:#D3D3D3 ;
    }
  </style>

</head>
<body>
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
    </p>
    <p>
        
        <?php

            $current_balance = $balance * (1 + $interest / 100) ** years;
            $current_mat_cnt = $maturity_cnt - $years;
            
            echo "
            
                Your current savings balance is: $current_balance </br>
                Your bonds have $current_mat_cnt years to mature </br>
            
            ";

            $_SESSION['age'] = $age;
            $_SESSION['balance'] = $current_balance;
            $_SESSION['maturity_count'] = $current_mat_cnt;

        ?>

        <form action="scenario_3.php" method="post">
            <input type="submit">
        </form>
    </p>
  </div>
</body>
</html>