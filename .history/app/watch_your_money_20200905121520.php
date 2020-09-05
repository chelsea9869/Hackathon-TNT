<?php
require_once 'include/bookkeeping-dropdown.php'
echo $income_dropdown;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Watch Your Money</title>
</head>
<body>
    <h1>Watch Your Money</h1>
    <hr>
    <div id='function' style='display: flex;justify-content: space-around;'>
        <div id='bookkeeping-button'>
            <button disabled="disabled">Bookkeeping</button>
        </div>
        <div id='check-records-button'>
            <button>Check My Records</button>
        </div>
    </div>
    <hr>
    <div id='main-content'>
        <div id='bookkeeping'>
        <form name='bookkeeping-form' action="post">
            <table id='bookkeeping-form-table' border="1px" width='50%'>
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Category</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="text" name="item[]" placeholder="Enter your item..."></td>
                            <td></td>
                            <td>C</td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</body>
</html>