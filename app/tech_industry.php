<html>
    <head>
        <title>Technology Stock</title>
    </head>
    </body>
    
<?php

# Insert your code here #


function get_percentage($total, $number)
{
  if ( $total > 0 ) {
   return round($number / ($total / 100),2);
  } else {
    return 0;
  }
}

$tickerArray = ['MSFT','AAPL','AMZN','FB','BABA','TSLA','PYPL']; 
$tickerDic = array();
foreach ($tickerArray as $ticker) {
$tickerDic[$ticker] = array();
}

foreach ($tickerArray as $ticker) {

//echo ($ticker);
$queryString = http_build_query([ 
    'access_key' => 'a59f4f814f11f0044dd5136f4bce3567', 
    'symbols' => $ticker
    // 'date_from' => '2020-09-01', 
    // 'date_to' => '2020-09-06' 
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

//   echo "<pre>";
//   print_r($response_json["data"]);
//   $data = $response_json["data"];
//   echo "</pre>";
  $data = $response_json["data"];
  $last = $data[0]['adj_close'];
  $previous = $data[1]['adj_close'];
//   echo ($last);
//   echo ($previous);
  $change = $last - $previous;
  $percentChange = get_percentage($previous,$change).'%';
  //echo($change);
  //echo ($percentChange);

  $tickerDic[$ticker]['last'] = $last;
  $tickerDic[$ticker]['previous'] = $previous;
  $tickerDic[$ticker]['change'] = $change;
  $tickerDic[$ticker]['percentage'] = $percentChange;
}
?>
    

<table style="width:100%">
<tr>
    <th>Company</th>
    <th>Symbol</th>
    <th>Last Price</th>
    <th>Change</th>
    <th>Change %</th>
    <th>Volumn</th>
    <th>Market Cap</th>
    <th>Beta</th>
  </tr>

  <tr>
    <td>Microsoft Corporation</td>
    <td> <a href='individual_Stock_Page.php'> MSFT </td>
    <td><?php echo ($tickerDic['MSFT']['last'])?></td>
    <td><?php echo ($tickerDic['MSFT']['change'])?></td>
    <td>  <?php echo ($tickerDic['MSFT']['percentage'])?> </td>
    <td>56.78M</td>
    <td>1728.44B</td>
    <td>0.8</td>
  </tr>

  <tr>
    <td>Apple Inc.</td>
    <td>AAPL</td>
    <td><?php echo ($tickerDic['AAPL']['last'])?></td>
    <td><?php echo ($tickerDic['AAPL']['change'])?></td>
    <td>  <?php echo ($tickerDic['AAPL']['percentage'])?> </td>
    <td>56.78M</td>
    <td>1728.44B</td>
    <td>?</td>
  </tr>

  <tr>
    <td>Amazon.com</td>
    <td>AMZN</td>
    <td><?php echo ($tickerDic['AMZN']['last'])?></td>
    <td><?php echo ($tickerDic['AMZN']['change'])?></td>
    <td> <?php echo ($tickerDic['AMZN']['percentage'])?> </td>
    <td>1728.44B</td>
    <td>?</td>
  </tr>

  
  <tr>
    <td>Facebook</td>
    <td>FB</td>
    <td><?php echo ($tickerDic['FB']['last'])?></td>
    <td><?php echo ($tickerDic['FB']['change'])?></td>
    <td> <?php echo ($tickerDic['FB']['percentage'])?> </td>
    <td>56.78M</td>
    <td>1728.44B</td>
    <td>?</td>
  </tr>

  <tr>
    <td>Alibaba Group Holding Limited</td>
    <td>BABA</td>
    <td><?php echo ($tickerDic['BABA']['last'])?></td>
    <td><?php echo ($tickerDic['BABA']['change'])?></td>
    <td> <?php echo ($tickerDic['BABA']['percentage'])?> </td>
    <td>56.78M</td>
    <td>1728.44B</td>
    <td>?</td>
  </tr>

  <tr>
    <td>Tesla, Inc.</td>
    <td>TSLA</td>
    <td><?php echo ($tickerDic['TSLA']['last'])?></td>
    <td><?php echo ($tickerDic['TSLA']['change'])?></td>
    <td> <?php echo ($tickerDic['TSLA']['percentage'])?> </td>
    <td>56.78M</td>
    <td>1728.44B</td>
    <td>?</td>
  </tr>

  <tr>
    <td>PayPal Holdings, Inc.</td>
    <td>PYPL</td>
    <td><?php echo ($tickerDic['PYPL']['last'])?></td>
    <td><?php echo ($tickerDic['PYPL']['change'])?></td>
    <td> <?php echo ($tickerDic['PYPL']['percentage'])?> </td>
    <td>56.78M</td>
    <td>1728.44B</td>
    <td>?</td>
  </tr>


</table>
</body>
    
</html>
