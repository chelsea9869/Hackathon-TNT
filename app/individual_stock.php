<html>

<?php
 require_once 'include/common.php';
 $ticker = $_GET['Ticker'];
 $name_array =  array(
  "MSFT" => "Microsoft Corporation",
  "AAPL" => "Apple Inc.",
  "FB" => "Facebook, Inc.",
  "BABA"=> "Alibaba Group Holding Limited",
  "TSLA" =>	"Tesla, Inc.",
  "AMZN" => "Amazon.com",
  "PYPL" => "PayPal Holdings, Inc." 
);
 $name = $name_array[$ticker];

?>
<head>


<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

     
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



  <title> The Millionnials </title>
  <style>
    .display-5{font-size:2.5rem;font-weight:300;line-height:1.2}
  </style>
</head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

<body>

  <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
    <img class="my-0 mr-md-auto font-weight-normal" onclick="window.location.href='index.php'" src="img/logo.jpg" alt="" width="180" height="54"> </img>
    <nav class="my-2 my-md-0 mr-md-3">
      <a class="p-2 text-dark" href="#">Features</a>
      <a class="p-2 text-dark" href="#">Support</a>
      <a class="p-2 text-dark" href="#">Donate</a>
      <a class="p-2 text-dark" href="#">Contact</a>
    </nav>
    <a class="btn btn-outline-primary" href="#">Log in</a>
  </div>

  <div class="row">
    <div class="col-sm-8"> </div>
    <div class="col-sm-4">
       <div class="container">
       <p>Goal: <mark> Nike AJ $200 </mark> Current Earnings:<mark> $0 </mark> </p>
       </div>
    </div>
</div>


  
<div class="pricing-header text-center" style="margin-bottom:5px;margin-top:5px;">
  <h1 class="display-5"><?=$name?></h1>
</div>


  <div class="container">
    <div class="card-deck mb- text-center">
      <div class="card mb-2 box-shadow">
        <div id="curve_chart" style="height: 500px">
        </div>
      </div>
    </div>
  </div>

  
  <div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4"><button type="button" class="btn btn-lg btn-block btn-outline-primary" onclick="window.location.href='invest.php'">Invest</button></div>
    <div class="col-sm-4"></div>
  </div>

<?php
  
     

  $queryString = http_build_query([
    //'access_key' => 'a59f4f814f11f0044dd5136f4bce3567',
    'access_key' => 'd8b97a4271e5595a7248980e05e7e14d',
    //'access_key' => 'd8b97a4271e5595a7248980e05e7e4d',
    'symbols' => $ticker,
    'date_from' => '2020-01-01',
    'date_to' => '2020-09-05'
  ]);

  // API URL with query string 
  $apiURL = sprintf('%s?%s', 'http://api.marketstack.com/v1/eod', $queryString);


  // Initialize cURL 
  $ch = curl_init();

  // Set URL and other appropriate options 
  curl_setopt($ch, CURLOPT_URL, $apiURL);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

  // Execute and get response from API 
  $api_response = curl_exec($ch);

  // Close cURL 
  curl_close($ch);

  $response_json = json_decode($api_response, true);

  //print_r($response_json);


  if (array_key_exists("error",$response_json)){

    $data2 = array (['2020-09-01', 227.27 ],['2020-08-31', 222.53 ],['2020-08-28', 221.27 ],['2020-08-27', 220.27 ], ['2020-08-26', 223.27 ],['2020-08-25', 219.27 ],['2020-08-24', 218.27 ],);
    $reserved_data = array_reverse($data2); 
  }else{
    $data = $response_json["data"];

    $data_array = array();
    foreach ($data as $day) {
      $datetime = $day['date'];
      $date = substr($datetime, 0, 10);
      $price = $day['adj_close'];
      //echo($date);
      array_push($data_array, [$date, $price]);
      
  }

    $reserved_data = array_reverse($data_array);
    //print_r($reserved_data);
  }

 




  ?>





  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    //prepare data 
    var dataArray = <?php echo json_encode($reserved_data); ?>;

    //google charts 

    google.charts.load('current', {
      'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Date');
      data.addColumn('number', 'Price');

    

      data.addRows(dataArray);

      var options = {
        //title: 'Stock Price',
        //curveType: 'function',
        legend: {
          position: 'bottom'
        }
      };

      var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

      chart.draw(data, options);
    }
  </script>


</body>

</html>