<!DOCTYPE html>
<html >
<link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/chomsky" type="text/css"/>
<?php
    
    include 'navbar.php';
    require_once 'include/common.php';

    $years = 3;

    $insurance_percent = $_SESSION['insurance'];
    
    $bondsfinal = $_SESSION['bondsfinal'];
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
      height:auto;
      margin: 0 auto;
      background-color:#ADD8E6 ;
      /* opacity */
    }
    h3 {
      text-align: center;
      font-family: 'ChomskyRegular';
      font-weight: normal;
      font-style: normal;
    }
    h5 {
      text-align: center;
    }

    #tabletext {
      text-align: center;
    }

    .button {
      border: none;
      color: auto;
      padding: 15px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
    }

    .button1 {
      background-color: #4CAF50; /* Green */
    }

    .button2 {
      background-color: #00FF00; /* light green */
    }

    .button3 {
      background-color: #fed8b1; /* light orange */
    }

    .button4 {
      background-color: #DC143C; /* light red */
    }

    .button5 {
      background-color: #696969; /*  grey */
    }

  </style>

</head>
<body>
  <div class="centerDiv">
    <br>
    <h3> Congratulations </h3>
    <p> 
        <?php 
            echo "
                <h5>You have completed the simulation game and successfully went through all major milestones or challenges in life.<br>
                    Your portfolio allows you to have a great future!
                </h5>
            "; 
        ?>
        
    </p>

    <p id="tabletext">
      Here is the summary report for your portfolio. Share the report with your friends now!

          <table class="center">
            <tr>
              <th>Item</th>
              <th>Details</th>
            </tr>

            <tr>
              <td>Your final balance from savings</td>
              <td>$<?php echo $balance; ?></td>
            </tr>

            <tr>
              <td>Total amount earned from Bonds</td>
              <td>$<?php echo $bondsfinal; ?></td>
            </tr>

            <tr>
              <td>Insurance helped you saved</td>
              <td>$20000</td>
            </tr>

            <tr>
              <td>Your portfolio rating</td>
              <td>
                <?php
                  if ( $balance >= 25000) {
                    echo "<button class='button button1'>Outstanding</button>";
                  } elseif ($balance >= 15000) {
                    echo "<button class='button button2'>Excellent</button>";
                  } elseif ($balance >= 10000) {
                    echo "<button class='button button3'>Great</button>";
                  } elseif ($balance >= 5000) {
                    echo "<button class='button button4'>Fair</button>";
                  } else {
                    echo "<button class='button button5'>Poor</button>";
                  }
                ?>
              </td>
            </tr>

          </table>
       
    </p>

    <p>
        
        <?php
          
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

        ?>

    </p>
  </div>
</body>
</html>