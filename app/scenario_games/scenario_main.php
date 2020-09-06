<?php
include '../navbar.php';
require_once '../include/common.php';
session_unset();

$product_list = [
    "Bonds" => "A bond is a fixed income instrument that represents a loan made by an investor to a borrower (typically corporate or governmental).
    Bond Information, Face Value: $1000, Interest 10%, Matruity Date: 10 years later",
    "Insurance" => "Insurance is a contract, represented by a policy, in which an individual or entity receives financial protection or reimbursement against losses from an insurance company.",
    "Savings" => "Savings is the money a person has left over when they subtract their consumer spending from their disposable income over a given time period. "
];

$_SESSION['balance'] = 50000;
$_SESSION['age'] = 22;
$_SESSION['interest'] = 0.01;
$_SESSION['bond_rate'] = 0.05;
$_SESSION['maturity_count'] = 10;


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Safeguard Your Money</title>
</head>

<?php include 'navbar.php'; ?>

<div id='main-content'>
    <div id='portfolio'>
        <form name='portfolio-form' action="scenario_1.php" method="post">



            <table id='portfolio-form-table' border="1px" width='50%'>
                <thead>
                    <tr>
                        <th colspan="3">Your Simulated Financial Information</th>
                    </tr>
                </thead>

                <tr>
                    <td>Initial Balance:</td>
                    <td colspan="2">S$50,000</td>
                </tr>
                <tr>
                    <td>Age:</td>
                    <td colspan="2">22</td>
                </tr>
                <tr>
                    <td>Annual Savings Interest:</td>
                    <td colspan="2">1.00%</td>
                </tr>

                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Product Descriptions</th>
                        <th>Percentage of Investment</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($product_list as $prod => $desc) {

                        echo "
                            <tr>
                                <td>$prod</td>
                                <td>$desc</td>
                                <td><input type='number' name='$prod-percent' min='0' max='100' step='1'>%</td></tr>
                            ";
                        // if ($prod != 'CPF') {
                        //     echo "<td><input type='number' name='$prod-percent' min='0' max='100' step='1'>%</td></tr>";
                        // } else {
                        //     echo "<td><input type='number' name='$prod-percent' min='20' max='100' step='1'>%</td></tr>";
                        // }
                    }
                    ?>
            </table>
            <br>
            <input type="submit" value="Proceed to Scenario Game">

        </form>
    </div>
</div>

</html>