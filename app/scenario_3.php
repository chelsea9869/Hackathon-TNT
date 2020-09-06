<!DOCTYPE html>
<html >

<?php
   include 'navbar.php';
   require_once 'include/common.php';

    $years = 3;

    $insurance_percent = $_SESSION['insurance'];
    $bonds_percent = $_SESSION['bonds'];
    $bond_r = $_SESSION['bond_rate'];
    $maturity_cnt = $_SESSION['maturity_count'];
    $age = $_SESSION['age']+$years;
    $balance = $_SESSION['balance'];
    $interest = $_SESSION['interest']
    
    // echo $_SESSION["cpf"];

?>

<head>
  <title> The Millionnials </title>
  <style type="text/css">
    .centerDiv
    {
      width: 60%;
      height:auto;
      margin: 0 auto;
      background-color:#D3D3D3 ;
    }
  </style>

</head>
<body>


<div class="centerDiv">
  <div class="card mb-2 box-shadow">
      <div class="card-header">
          <h5 class="my-0 font-weight-normal"><p style="color:green">Scenario 3: Hospitalisation</p></h5>
      </div>
      <div class="card-body">
          <!-- <h1 class="card-title pricing-card-title">$0 <small class="text-muted">/ mo</small></h1> -->
          <img src="img/hospitalisation.jpg" width="300">
          <ul class="list-unstyled mt-3 mb-4">
              <li>
                <?php

                  // bonds
                  // Principle * (1 + interest) ** years at par value
                  $bonds = ($bonds_percent / 100) * 50000 * (1 + 0.1) ** $years; 
                  $bonds = number_format($bonds, 2);
                  $_SESSION['bondsfinal'] = $bonds;

                  echo "
                    3 years later, you are now $age years old <br>
                  ";

                ?>
              </li>

              <br>

              <li>
                Yay! Your bonds have just matured! The lump sum of $<?php echo $bonds; ?> is saved to your savings account! <br><br>
                However, you have just experienced an accident. 
                <?php 
                  
                  if($insurance_percent >= 10) {
                    echo "Thankfully, you have invested more than 10% in your insurance and that is enough to cover your hospitalisation fees";
                    $hospitalisation = 0;
                  } else {
                    echo "You did not purchased enough insurance to cover your hospitalisation fees, $20,000 dollars have deducted from your account to pay for the fees";
                    $hospitalisation = 20000;
                  }

                ?>
              <li>

          <?php

            $current_balance = $balance * (1 + $interest) ** $years - $hospitalisation + $bonds;
            $current_balance_1 = number_format($current_balance, 2);
            $current_mat_cnt = $maturity_cnt - $years;
          
            echo "
            <br>
                Your current savings balance is: $$current_balance_1 </br>
            ";

            $_SESSION['age'] = $age;
            $_SESSION['balance'] = $current_balance;
            $_SESSION['maturity_count'] = $current_mat_cnt;

          ?>
          </li>
          </ul>
            <?php 
              if ($current_balance >= 0) {
                $url_link = "scenario_final_report.php";
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
    <h3> Scenario 3 </h3>
    <p>  -->
        <?php 
            // // bonds
            // // Principle * (1 + interest) ** years at par value
            // $bonds = ($bonds_percent / 100) * 50000 * (1 + 0.1) ** $years; 
            // $_SESSION['bondsfinal'] = $bonds;

            // echo "
            //     ... 5 years later, you are now $age years old
            // "; 
        ?>
    <!-- </p>
    <p>
        Yay! Your bonds have just matured! The lump sum of <?php echo $bonds; ?> is saved to your savings account! <br><br>
        However, you have just experienced an accident. <br><br> -->
        <?php 
          
          // if($insurance_percent >= 10) {
          //   echo "Thankfully, you have invested more than 10% in your insurance and that is enough to cover your hospitalisation fees";
          //   $hospitalisation = 0;
          // } else {
          //   echo "You did not purchased enough insurance to cover your hospitalisation fees, $20,000 dollars have deducted from your account to pay for the fees";
          //   $hospitalisation = 20000;
          // }

        ?>
    </p>
    <p>
        
        <?php
            
          //   $current_balance = $balance * (1 + $interest) ** $years - $hospitalisation + $bonds;
          //   $current_mat_cnt = $maturity_cnt - $years;
          
          //   echo "
          //   <br>
          //       Your current savings balance is: $current_balance </br>
            
          //   ";

          //   $_SESSION['age'] = $age;
          //   $_SESSION['balance'] = $current_balance;
          //   $_SESSION['maturity_count'] = $current_mat_cnt;

          //   if ($current_balance >= 0) {
          //     echo "      
          //       <form action='scenario_final_report.php' method='post'>
          //           <input type='submit' value='Next'>
          //       </form>
          //   "; 
          //   } else {
          //     echo "<br><h4>Sorry but you have failed to maintain a good portfolio</h4>
          //       <form action='scenario_main.php' method='post'>
          //           <input type='submit' value='Go Back to Main Page'>
          //       </form>
          //   ";
          // }

        ?>
<!-- 
    </p>
  </div> -->
</body>
</html>