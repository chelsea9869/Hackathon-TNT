<!DOCTYPE html>
<html>
<?php
include 'navbar.php';
require_once 'include/common.php';

$years = 5;

$bond_r = $_SESSION['bond_rate'];
$maturity_cnt = $_SESSION['maturity_count'];
$age = $_SESSION['age'] + $years;
$balance = $_SESSION['balance'];
$interest = $_SESSION['interest']

// echo $_SESSION["cpf"];

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
  <div class="card mb-2 box-shadow">
      <div class="card-header">
          <h5 class="my-0 font-weight-normal"><p style="color:green">Scenario 2: Recession</p></h5>
      </div>
      <div class="card-body">
          <!-- <h1 class="card-title pricing-card-title">$0 <small class="text-muted">/ mo</small></h1> -->
          <img src="img/recession.jpg" width="300">
          <ul class="list-unstyled mt-3 mb-4">
              <li>
                <?php
                  echo "
                    5 years later, you are now $age years old <br>
                  ";
                ?>
              </li>
              <br>
              <li>
                Oops! Recession is happening now and the economy is bad. Savings annual interest rate has dropped to 0.5%!
                You have also successfully repaid all your tuition fee loan!
              <li>

          <?php

            // Tuition Fee Loan
            $loan = 10000 * (1.0475) ** 5;
            echo "$loan <br>";
            echo "$interest <br>";
            echo "$years <br>";
            echo "$balance <br>";

            $current_balance = ($balance * (1 + $interest) ** $years) - $loan;
            $current_balance = number_format($current_balance, 2);

            echo "$current_balance <br>";

            $current_mat_cnt = $maturity_cnt - $years;
            
            echo "
            <br>
                Your current savings balance is: $$current_balance </br>
                Your bonds have $current_mat_cnt years to mature </br>
            ";

            $_SESSION['age'] = $age;
            $_SESSION['balance'] = $current_balance;
            $_SESSION['maturity_count'] = $current_mat_cnt;
            $_SESSION['interest'] = 0.05;

          ?>
          </li>
          </ul>
            <?php 
              if ($current_balance >= 0) {
                $url_link = "scenario_3.php";
                $url_text = "Next";
              } else {
                echo "<br><h4>Sorry but you have failed to maintain a good portfolio</h4>
                ";
                $url_link = "scenario_main.php";
                $url_text = "Go Back to Main page";
              }
            ?>
          <p style="text-align:center">
            <button type="button" class="btn btn-lg btn-block btn-outline-primary" onclick="window.location.href='<?php echo $url_link ?>'"><?php echo $url_text ?></button>
          </p>
      </div>
  </div>









<!-- 

  <div class="centerDiv">
    <h3> Scenario 2 </h3>
    <p> -->
      <?php
      // echo "
      //           ... 5 years later, you are now $age years old
      //       ";
      ?>
    <!-- </p>
    <p>
        Oops! Recession is happening now and the economy is bad. Savings annual interest rate has dropped to 0.5%!
        You have also successfully repaid all your tuition fee loan!
    </p>
    <p> -->
      <?php
    //         // Tuition Fee Loan
    //         $loan = 10000 * (1.0475) ** 5;

    //         $current_balance = $balance * (1 + $interest) ** $years - $loan;
    //         $current_mat_cnt = $maturity_cnt - $years;
            
    //         echo "
    //         <br><br>
    //             Your current savings balance is: $current_balance </br>
    //             Your bonds have $current_mat_cnt years to mature </br>
            
    //         ";

    //   $_SESSION['age'] = $age;
    //   $_SESSION['balance'] = $current_balance;
    //   $_SESSION['maturity_count'] = $current_mat_cnt;
    //   $_SESSION['interest'] = 0.05;

    //   if ($current_balance >= 0) {
    //     echo "      
    //       <form action='scenario_3.php' method='post'>
    //           <input type='submit' value='Next'>
    //       </form>
    //   "; 
    // } else {
    //   echo "<br><h4>Sorry but you have failed to maintain a good portfolio</h4>
    //       <form action='scenario_main.php' method='post'>
    //           <input type='submit' value='Go Back to Main Page'>
    //       </form>
    //   ";
    // }

      ?>
    <!-- </p>
  </div> -->
</body>

</html>