<?php
require_once 'include/BookkeepingDAO.php';
$_SESSION['username'] = 'amy';
$username = $_SESSION['username'];

// for dropdown list
$csv_path = 'data/bookkeeping-category.csv';
$category = @fopen($csv_path,'r');
$income_dropdown =  $expense_dropdown = "<select id='bookkeeping-category' name='category'> <option value='' disabled selected>Please select type</option>";
while (($data = fgetcsv($category)) !== FALSE) {
    if($data[0] =='income'){
        $income_dropdown .= "<option value={$data[1]}>{$data[1]}</option>";
    }elseif($data[0] =='expense'){
        $expense_dropdown .= "<option value={$data[1]}>{$data[1]}</option>";
    }
}
$income_dropdown.="</select>";
$expense_dropdown.="</select>";

// for interaction with database
$bookkeepingDao = new BookkeepingDAO();
$date = date("Y-m-d");

// for adding records
if(isset($_POST) and !empty($_POST)){
    $status = $bookkeepingDao->addRecord($username,$date,$_POST);
}

// retrieving today's records and summarize
$todayRecords= $bookkeepingDao->retrieveByPersonByDate($username,$date);
$summary = [
    "expense"=>["total"=>0],
    "income"=>["total"=>0]
];

foreach($todayRecords as $record){
    $summary[$record['type']]['total'] += (float)$record['amount'];
    if(array_key_exists($record['category'],$summary[$record['type']])){
        $summary[$record['type']][$record['category']] += (float)($record['amount']);
    }else{
        $summary[$record['type']][$record['category']] = (float)($record['amount']);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Watch Your Money</title>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>
    <script src= 'https://unpkg.com/chart.js@2.8.0/dist/Chart.bundle.js'> </script>
    <style>
        input {
            width:80%
        }
        h1,h2 {
            text-align: center;
        }
        h2{
            margin-bottom: 10px;
            margin-left: auto;
            margin-right: auto;
        }
        table, th, td {
            border: 1px solid black;
            text-align: center;
        }
        table{
            width:100%;
        }
        thead{
            font-size: large;
        }

        #summary-table td{
            text-align:right;
            padding-right:5px;
        }

        #summary-table th{
            text-align:left;
            padding-left:5px;
        }
    </style>
</head>
<body>
    <h1>Watch Your Money</h1>
    <hr>
    <div id='function' style='display: flex;justify-content: space-around;'>
        <div id='bookkeeping-button'>
            <button disabled="disabled">Bookkeeping</button>
        </div>
        <div id='check-records-button'>
            <button disabled="disabled">Check My Records</button>
        </div>
    </div>
    <hr>
    <div id='main-content' style='width:100%'>
        <div id='left-content' style='width:50%;display:inline-table;margin-top:20px'>
            <div id='bookkeeping-input-expense' style='width:100%;'>
                <h2> Input Your Expense</h2>
                <form id='record-form' action='bookkeeping.php' method='POST'>
                    <table id='record-form-table'>
                            <thead>
                                <tr>
                                    <th>Item</th>
                                    <th>Category</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="text" name="item" placeholder="Enter your item..."></td>
                                    <td><?=$expense_dropdown?><input type='hidden' name='type' value='expense'></td>
                                    <td>$&nbsp;&nbsp;<input type='number' name='amount' min='0' step='0.01'></td>
                                </tr>
                            </tbody>
                        </table>
                    <button id='add-expense' style='margin:5px;position:absolute;right:50%'>Add Expense</button>
                </form>
            </div>

            <div id='bookkeeping-input-income' style='width:100%;margin-top:50px'>
                <h2> Input Your Income</h2>
                <form id='record-form' action='bookkeeping.php' method='POST'>
                    <table id='record-form-table'>
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th>Category</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" name="item" placeholder="Enter your item..."></td>
                                <td><?=$income_dropdown?><input type='hidden' name='type' value='income'></td>
                                <td>$&nbsp;&nbsp;<input type='number' name='amount' min='0' step='0.01'></td>
                            </tr>
                        </tbody>
                    </table>
                    <button id='add-income' style='margin:5px;position:absolute;right:50%'>Add Income</button>
                </form>
            </div>

            <div id='daily-summary' style='margin-top:50px'>
                <h2>Daily Summary</h2>
                <table id='summary-table' style='font-size:large;width:60%;margin-left: auto;margin-right: auto;'>
                    <tr>
                        <th>Date</th>
                        <td><?=$date?></td>
                    </tr>
                    <tr>
                        <th>Total Expenses</th>
                        <td>$&nbsp;&nbsp;<?=$summary['expense']['total']?></td>
                    </tr>
                    <tr>
                        <th>Total Income</th>
                        <td>$&nbsp;&nbsp;<?=$summary['income']['total']?></td>
                    </tr>
                    <tr>
                        <th>Net</th>
                        <td>$&nbsp;&nbsp;<?=$summary['income']['total'] - $summary['expense']['total'] ?></td>
                    </tr>
                </table>

            </div>
        </div>
        <div id='right-content' style='width:45%;display:inline-table;margin-left:3%'>
            <h2>Proportion of Expenses and Income by Category</h2>
            <div id='daily-chart' style='width:100%'>
                <table style='border:0px;width:100%'>
                    <tr><td style='border:0px;'>
                        <canvas id="expense-distribution" width="300px" height="300px"></canvas>
                    </td></tr>
                    <tr><td style='border:0px;'></td></tr>
                    <tr><td style='border:0px;'> 
                        <canvas id="income-distribution"width="300px" height="300px"></canvas>
                    </td></tr>
                </table>
            </div>

        </div>
    </div>
</body>
</html>

<script>
var colourCode = ["#0074D9", "#FF4136", "#2ECC40", "#FF851B", "#7FDBFF", "#B10DC9", "#FFDC00", "#001f3f", "#39CCCC", "#01FF70", "#85144b", "#F012BE", "#3D9970", "#111111", "#AAAAAA"];

var expenseArray= <?=json_encode($summary['expense'])?>;
delete expenseArray['total'];
new Chart(document.getElementById("expense-distribution"), {
  //type: 'polarArea',
  type: 'doughnut',
  data: {

      labels: Object.keys(expenseArray),
      datasets: [
        {
          label: "Income Proportion",
          data: Object.values(expenseArray),
          backgroundColor:colourCode
        }
      ]
    },
    options: {
        maintainAspectRatio: false,
      legend: { display: true },
      title: {
        display: true,
        text: "Source of Today's Income by Category",
        aspectRatio: 1
        
      }
    }
});

var incomeArray= <?=json_encode($summary['income'])?>;
delete incomeArray['total'];
new Chart(document.getElementById("income-distribution"), {
  //type: 'polarArea',
  type: 'doughnut',
  data: {

      labels: Object.keys(incomeArray),
      datasets: [
        {
          label: "Expenses Proportion",
          data: Object.values(incomeArray),
          backgroundColor:colourCode
        }
      ]
    },
    options: {
      maintainAspectRatio: false,
      legend: { display: true },
      title: {
        display: true,
        text: "Source of Today's Expenses by Category",
        aspectRatio: 1
        
      }
    }
});

</script>