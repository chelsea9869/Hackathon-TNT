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
    <h3> Scenario 3 </h3>
    <p> 
        <?php 
            // bonds
            // Principle * (1 + interest) ** years at par value
            $bonds = ($bonds_percent / 100) * 50000 * (1 + 0.1) ** $years; 

            echo "
                ... 5 years later, you are now $age years old
            "; 
        ?>
    </p>
    <p>
        Yay! Your bonds have just matured! The lump sum of <?php echo $bonds; ?> is saved to your savings account! <br><br>
        However, you have just experienced an accident. <br><br>
        <?php 
          
          if($insurance_percent >= 10) {
            echo "Thankfully, you have invested more than 10% in your insurance and that is enough to cover your hospitalisation fees";
            $hospitalisation = 0;
          } else {
            echo "You did not purchased enough insurance to cover your hospitalisation fees, $20,000 dollars have deducted from your account to pay for the fees";
            $hospitalisation = 20000;
          }

        ?>
    </p>
    <p>
        
        <?php
            
            $current_balance = $balance * (1 + $interest) ** years - $hospitalisation + $bonds;
            $current_mat_cnt = $maturity_cnt - $years;
          
            echo "
            <br>
                Your current savings balance is: $current_balance </br>
            
            ";

            $_SESSION['age'] = $age;
            $_SESSION['balance'] = $current_balance;
            $_SESSION['maturity_count'] = $current_mat_cnt;

            if ($current_balance >= 0) {
              echo "      
                <form action='final_report.php' method='post'>
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