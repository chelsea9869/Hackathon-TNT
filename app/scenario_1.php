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

    h3 {
      text-align: center
    }

  </style>

</head>

<body>

  <div class="centerDiv">
  <div class="card mb-2 box-shadow">
      <div class="card-header">
          <h5 class="my-0 font-weight-normal"><p style="color:green">Scenario 1: Graduation</p></h5>
      </div>
      <div class="card-body">
          <!-- <h1 class="card-title pricing-card-title">$0 <small class="text-muted">/ mo</small></h1> -->
          <img src="img/grad.jpg" width="300">
          <ul class="list-unstyled mt-3 mb-4">
            <li>
              <?php
                echo "
                  2 years later, you are now $age years old
                ";
              ?>
            </li>
            <br>
            <li>Congratulations on your recent graduation from SMU! It is time for you to start repaying your tuition fee loan. You have opted to 
              repay your loans at one shot. You have to pay $10,000 within 5 years with annual interest of 4.75%, compounded every 5 years.</li>
            <li>
          <?php

            $current_balance = ($savings_percent / 100) * $balance * (1 + $interest) ** $years;
            $current_balance_1 = number_format($current_balance, 2);
            $current_mat_cnt = $maturity_cnt - $years;
            echo "
            <br>
                      Your current savings balance is: $$current_balance_1 </br>
                      Your bonds have $current_mat_cnt years to mature </br>
                  
                  ";

            $_SESSION['age'] = $age;
            $_SESSION['balance'] = $current_balance;
            $_SESSION['maturity_count'] = $current_mat_cnt;

          ?>
          </li>
          </ul>
            <?php 
              if ($current_balance >= 0) {
                $url_link = "scenario_2.php";
                $url_text = "Next";
              } else {
                echo "<br><h4>Sorry but you have failed to maintain a good portfolio</h4>
                ";
                $url_link = "scenario_main.php";
                $url_text = "Go Back to Main Page";
              }
            ?>
          <p style="text-align:center">
            <button type="button" class="btn btn-lg btn-block btn-outline-primary" onclick="window.location.href='<?php echo $url_link ?>'"><?php echo $url_text ?></button>
          </p>
      </div>
  </div>






<!--   
    <h3> Scenario 1 </h3>
    <p>
      <?php
      // echo "
      //           ... 2 years later, you are now $age years old
      //       ";
      ?>
    </p>
    <p>
        Congratulations on your recent graduation from SMU! It is time for you to start repaying your tuition fee loan. You have opted to 
        repay your loans at one shot. You have to pay $10,000 within 5 years with annual interest of 4.75%, compounded every 5 years.
    </p>
    <p> -->

      <?php

      // $current_balance = ($savings_percent / 100) * $balance * (1 + $interest) ** $years;

      // $current_mat_cnt = $maturity_cnt - $years;
      // echo "
      // <br><br>
      //           Your current savings balance is: $current_balance </br>
      //           Your bonds have $current_mat_cnt years to mature </br>
            
      //       ";

      // $_SESSION['age'] = $age;
      // $_SESSION['balance'] = $current_balance;
      // $_SESSION['maturity_count'] = $current_mat_cnt;

      // if ($current_balance >= 0) {
      //     echo "      
      //       <form action='scenario_2.php' method='post'>
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
  <!-- //   </p>
  // </div> -->
</body>

</html>