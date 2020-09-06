<!DOCTYPE html>
<html >

<?php
    
    $bonds_percent = $_SESSION["bonds"] = $_POST["Bonds-percent"];
    $insurance_percent = $_SESSION["insurance"] = $_POST["Insurance-percent"];
    $savings_percent = $_SESSION["savings"] = $_POST["Savings-percent"];
    $cpf_percent = $_SESSION["cpf"] = $_POST["CPF-percent"];

    // echo $_SESSION["cpf"];

?>

<head>

  <style type="text/css">
    .centerDiv
    {
      width: 60%;
      height:200px;
      margin: 0 auto;
      background-color:#FFA500 ;
    }
  </style>

</head>
<body>
  <div class="centerDiv">
    <h3> &nbsp Scenario 1 <?php echo $bonds_percent;?></h3>
    <p>  </p>
    <p>
        Congratulations on your recent graduation from SMU! It is time for you to start repaying your tuition fee loan. You have opted to 
        repay your loans at one shot. 
    </p>
  </div>
</body>
</html>