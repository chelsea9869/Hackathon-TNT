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

  <title>
    Individual Stock Page
  </title>

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


  <div class="container">
  
  <header class="header">
      <h1 id="title" class="text-center"> </h1>
      <p id="description" class="description text-center"> <?php echo($name);?>s </p>
  </header>
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




<!-- 
  <table style="width:100%">

    <tr>
      <td>Earning per share</td>
      <td>5.76</td>
    </tr>
    <tr>
      <td>P/E Ratio</td>
      <td>37.20</td>
    </tr>
    <tr>
      <td>Beta</td>
      <td>0.89</td>
    </tr>
    <tr>
      <td>Market Cap</td>
      <td>1.728T</td>
    </tr>
  </table>
 -->



<?php
  
     

  $queryString = http_build_query([
    'access_key' => 'a59f4f814f11f0044dd5136f4bce3567',
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