<?php 

$product_list = ['Bonds'->"A type of financial product", 
                "Insurance", "Savings", "CPF"]

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Safeguard Your Money</title>
</head>

<div id='main-content'>
        <div id='portfolio'>
        <form name='portfolio-form' action="post">
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
                            foreach($product_list as $prod):
                                echo "
                                <tr>
                                    <td>$prod</td>
                                "
                        ?>

                </table>
            </form>
        </div>
    </div>

</html>