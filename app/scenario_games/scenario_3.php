<!DOCTYPE html>
<html >

<?php
    
    require_once '../include/common.php';

    $years = 3;

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
        Yay! Your bonds have just matured! The lump sum is saved to your savings account! <br>
        However, you have just experienced an accident.
        <?php 
          echo $insurance_percent;
          if($insurance_percent >= 10) {
            echo "Thankfully, you have invested more than 10% in your insurance and that is enough to cover your hospitalisation fees";
            $hospitalisation = 0;
          } else {
            echo "You did not purchased enough insurance to cover your hospitalisation fees, $10,000 dollars have deducted from your account to pay for the fees";
            $hospitalisation = 10000;
          }
        ?>
    </p>
    <p>
        
        <?php
          
            // bonds
            // Principle * (1 + interest) ** years at par value
            $bonds = ($bonds_percent / 2) * (1 + 0.05) ** $years; 
            
            $current_balance = $balance * (1 + $interest) ** years - $hospitalisation + $years;
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