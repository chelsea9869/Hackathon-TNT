<?php
include 'navbar.php';
require_once 'include/common.php';
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
    <title> The Millionnials </title>
    <style>
        thead{
            font-size:15px;
            background-color:#92b9f7;
            color: white;
        }

        table {
            width: 100%;
            padding:10px;
            font-size:15px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        
        .display-5{font-size:2.5rem;font-weight:300;line-height:1.2}

    </style>
</head>

<div id='main-content'>
    <div id='portfolio'>
    <div class="pricing-header text-center" style="margin-bottom:30px">
        <h1 class="display-5">Safeguard Your Money</h1>
    </div>
        <form name='portfolio-form' action="scenario_1.php" method="post">

            <table id='portfolio-form-table' border='1px' style='width:30%;height:15%;text-align:center;margin:auto'>
                <thead> 
                    <tr>
                        <th colspan="3"  style='padding:10px;height:5%'>Your Simulated Financial Information</th>
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
        </table>
        <br>
            <table id='portfolio-form-table' border='1px' style='width:70%;height:30%;text-align:center;margin:auto;padding:20px'>
                <thead>
                    <tr>
                        <th style='padding:10px;'>Product Name</th>
                        <th style='padding:10px;'>Product Descriptions</th>
                        <th style='padding:10px;'>Percentage of Investment</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($product_list as $prod => $desc) {

                        echo "
                            <tr>
                                <td style='width:10%'>$prod</td>
                                <td style='padding:10px'>$desc</td>
                                <td style='width:15%'><input type='number' name='$prod-percent' min='0' max='100' step='1'>%</td></tr>
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
            <div style="text-align:center">
                <input type="submit" value="Proceed to Scenario Game" class="btn btn-lg btn-primary" style='font-size:15px;'>
            </div>
        </form>
    </div>
</div>

</html>