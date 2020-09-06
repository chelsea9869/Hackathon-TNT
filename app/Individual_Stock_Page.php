<html>
    <head>
    
        <title>
            Individual Stock Page 
        </title>
        Microsoft Stock Information
</head>

<body>
<div id="curve_chart" style="width: 900px; height: 500px"></div>


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


  <!-- <body>
    <div id="curve_chart" style="width: 900px; height: 500px"></div>
    <div> P/E ratio: 37.20 </div>
    <div> Earning per share: 5.76 </div>
    <div> Beta: 0.89</div>
    <div> Market cap:1.728T</div>
  </body> -->
              
  
  

  <?php
    
    $queryString = http_build_query([ 
      'access_key' => 'a59f4f814f11f0044dd5136f4bce3567', 
      'symbols' => 'MSFT', 
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

    //echo "<pre>";
    //print_r($response_json["data"]);
    $data = $response_json["data"];
    //echo "</pre>";

    $data_array = array();
    foreach($data as $day){
      $datetime = $day['date'];
      $date = substr($datetime,0,10);
      $price = $day['adj_close'];
      //echo($date);
      array_push($data_array, [$date,$price] );
      
      
    }

    $reserved_data = array_reverse($data_array);
    //print_r($reserved_data);

    
    
    ?>
  




    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

    //prepare data 
    var dataArray= <?php echo json_encode($reserved_data); ?>;
    
    //google charts 

      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = new google.visualization.DataTable();
      data.addColumn('string', 'Date');
      data.addColumn('number', 'Price');

      // data.addRows([
      //   [0, 0],   [1, 10], [40, 64], [41, 65] 
      // ]);

      data.addRows(dataArray);

        var options = {
          title: 'Microsoft Stock',
          //curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>


    </body>
</html>