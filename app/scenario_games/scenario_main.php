<?php 

$product_list = [
    "Bonds" => "A bond is a fixed income instrument that represents a loan made by an investor to a borrower (typically corporate or governmental).",
    "Insurance" => "Insurance is a contract, represented by a policy, in which an individual or entity receives financial protection or reimbursement against losses from an insurance company.",
    "Savings" => "Savings is the money a person has left over when they subtract their consumer spending from their disposable income over a given time period. ",
    "CPF" => "The Central Provident Fund (CPF) is a mandatory benefit account providing retirement earnings and healthcare for Singaporeans. Contributions to the retirement account originate from both the employee and the employer. "
]

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Safeguard Your Money</title>
</head>

<div id='main-content' >
        <div id='portfolio'>
        <form name='portfolio-form' action="scenario_1.php" method="post">
            <table id='portfolio-form-table' border="1px" width='50%'>
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Product Descriptions</th>
                            <th>Percentage of Investment</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($product_list as $prod=>$desc) {
                                echo "
                                <tr>
                                    <td>$prod</td>
                                    <td>$desc</td>
                                    <td><input type='number' name='$prod-percent' min='0' max='100' step='1'>%</td>
                                ";
                            }
                        ?>
                </table>
                
                <input type="submit" name="Proceed to Scenario Game">

            </form>
        </div>
    </div>
</html>