<!DOCTYPE html>
<html>
<link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/chomsky" type="text/css" />
<?php

include 'navbar.php';
require_once 'include/common.php';

$years = 3;

$insurance_percent = $_SESSION['insurance'];
$bondsfinal = $_SESSION['bondsfinal'];
$maturity_cnt = $_SESSION['maturity_count'];
$age = $_SESSION['age'] + $years;
$balance = $_SESSION['balance'];
$interest = $_SESSION['interest']

?>

<head>

  <style type="text/css">
    .centerDiv {
      width: 60%;
      height: auto;
      margin: 0 auto;
      background-color: #ADD8E6;
      /* opacity */
    }

    h3 {
      text-align: center;
      /* font-family: 'ChomskyRegular';
      font-weight: normal;
      font-style: normal; */
    }

    h5 {
      text-align: center;
    }

    #tabletext {
      text-align: center;
    }

    .button {
      border: none;
      color: black;
      padding: 15px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
    }

    .button1 {
      background-color: #4CAF50;
      /* Green */
    }

    .button2 {
      background-color: #00FF00;
      /* light green */
    }

    .button3 {
      background-color: #fed8b1;
      /* light orange */
    }

    .button4 {
      background-color: #DC143C;
      /* light red */
    }

    .button5 {
      background-color: #696969;
      /*  grey */
    }
  </style>

</head>

<body>

  <div class="container">

    <div class="jumbotron mt-3">
      <h3> Congratulations! </h3>

      <br>
      <h4>
        <p class="text-center"> You have completed the simulation game and successfully went through all major milestones or challenges in life.<br>
          Your portfolio allows you to have a great future! </p>
      </h4>
      <br>

      <p id="tabletext">
        Here is the summary report for your portfolio. Share the report with your friends now!

        <table class="table" style="width:85%">
          <thead class="thead-light">
            <tr>
              <th style="text-align: center; vertical-align: middle;" scope="col">Item</th>
              <th style="text-align: center; vertical-align: middle;" scope="col">Details</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th style="text-align: center; vertical-align: middle;" scope="row">Your final balance from savings</th>
              <td style="text-align: center; vertical-align: middle;">$<?php echo (number_format($balance, 2)); ?></td>
            </tr>
            <tr>
              <th style="text-align: center; vertical-align: middle;" scope="row">Total amount earned from Bonds</th>
              <td style="text-align: center; vertical-align: middle;">$<?php echo (number_format($bondsfinal, 2)); ?></td>
            </tr>
            <tr>
              <th style="text-align: center; vertical-align: middle;" scope="row">Insurance helped you saved</th>
              <td style="text-align: center; vertical-align: middle;">$20,000.00</td>
            </tr>
            <tr>
              <th style="text-align: center; vertical-align: middle;" scope="row">Your portfolio rating</th>
              <td style="text-align: center; vertical-align: middle;"> <?php
                                                                        if ($balance >= 25000) {
                                                                          echo '<div class="p-3 mb-2 bg-success text-white">Outstanding</div>';
                                                                        } elseif ($balance >= 15000) {
                                                                          echo '<div class="p-3 mb-2 bg-success text-white">Excellent</div>';
                                                                        } elseif ($balance >= 10000) {
                                                                          echo '<div class="p-3 mb-2 bg-success text-white">Great</div>';
                                                                        } elseif ($balance >= 5000) {
                                                                          echo '<div class="p-3 mb-2 bg-secondary text-white">Fair</div>';
                                                                        } else {
                                                                          echo '<div class="p-3 mb-2 bg-danger text-white">Poor</div>';
                                                                        }

                                                                        ?></td>
            </tr>
            <!-- <tr>
              <th style="text-align: center; vertical-align: middle;" scope="row"></th>
              <td style="text-align: right; vertical-align: middle;">
                <a class="btn btn-lg btn-primary mr-1" href="scenario_main.php" role="button">&laquo; Play Again</a>

              </td>
            </tr> -->
          </tbody>
        </table>
        <a class="btn btn-lg btn-primary mr-1" href="scenario_main.php" role="button">&laquo; Play Again</a>

      </p>


    </div>
  </div>




  <!-- <p>

  // bonds
  // Principle * (1 + interest) ** years at par value
  //   $bonds = ($bonds_percent / 2) * (1 + 0.05) ** $years; 

  //   $current_balance = $balance * (1 + $interest) ** years - $hospitalisation + $years;
  //   $current_mat_cnt = $maturity_cnt - $years;

  //   echo "

  //       Your current savings balance is: $current_balance </br>

  //   ";

  //   $_SESSION['age'] = $age;
  //   $_SESSION['balance'] = $current_balance;
  //   $_SESSION['maturity_count'] = $current_mat_cnt;

  //   if ($balance >= 0) {
  //     echo "      
  //       <form action='scenario_4.php' method='post'>
  //           <input type='submit' value='Next'>
  //       </form>
  //   "; 
  //   } else {
  //     echo "Sorry but you have failed to maintain a good portfolio
  //       <form action='scenario_main.php' method='post'>
  //           <input type='submit' value='Go Back to Main Page'>
  //       </form>
  //   ";
  // }
</p> -->
  </div>
</body>

</html>