<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

     
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <title> The Millionnials </title>

    <!-- local style sheet -->
    
<style>
table, td, th {  
  border: 1px solid #ddd;
  text-align: left;
}

table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 15px;
}



th {
  background-color: #92b9f7;
  color: white;
}

.CellWithComment{
  position:relative;
}

.CellComment{
  display:none;
  position:absolute; 
  z-index:100;
  border:1px;
  background-color:white;
  border-style:solid;
  border-width:1px;
  border-color:black;
  padding:3px;
  color:black; 
  top:5px; 
  left:5px;
}

.CellWithComment:hover span.CellComment{
  display:block;
}

</style>
     
</head>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
       
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


  $data = $response_json["data"];
  $last = $data[0]['adj_close'];
  $previous = $data[1]['adj_close'];

  $change = $last - $previous;
  $percentChange = get_percentage($previous,$change).'%';
 
  $tickerDic[$ticker]['last'] = $last;
  $tickerDic[$ticker]['previous'] = $previous;
  $tickerDic[$ticker]['change'] = $change;
  $tickerDic[$ticker]['percentage'] = $percentChange;
}
?>

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

<div class="container">
  
  <header class="header">
      <h1 id="title" class="text-center">Technology Industry</h1>
      <p id="description" class="description text-center"></p>
  </header>
</div>

<div class="container">
<div class="card-deck mb- text-center">
<div class="card mb-4 box-shadow">

<table style="width:100%">
<tr>
    <th>Company</th>
    <th>Symbol</th>
    <th>Last Price</th>
    <th>Change</th>
    <th>Change %</th>
    
    <th class="CellWithComment"> <u>Volume</u>
        <span class="CellComment"> <h6>Volume measures the number of shares traded in a stock or contracts traded in futures or options.</h6></span>
    </th>

    <th class="CellWithComment"> <u>P/E Ratio</u>
        <span class="CellComment"> <h6>The price-earnings ratio (P/E ratio) relates a company's share price to its earnings per share.
A high P/E ratio could mean that a company's stock is over-valued, or else that investors are expecting high growth rates in the future.</h6></span>
    </th>

    <th class="CellWithComment"> <u>Market Cap</u>
        <span class="CellComment"> <h6>Market capitalization refers to how much a company is worth as determined by the stock market.</h6></span>
    </th>
    
    <th class="CellWithComment"> <u>Beta</u>
        <span class="CellComment"> <h6>Beta is a measure of the volatility of the stock compared to the market. Higher beta indicates higher risk.</h6></span>
    </th>

  </tr>

  <tr>
    <td>Microsoft Corporation</td>
    <td> <a href='individual_stock.php?Ticker=MSFT'> MSFT </td>
    
    <td><?php echo ($tickerDic['MSFT']['last'])?></td>
    <td><?php echo ($tickerDic['MSFT']['change'])?></td>
    <td>  <?php echo ($tickerDic['MSFT']['percentage'])?> </td>
    <td>37.20</td>
    <td>56.78M</td>
    <td>1728.44B</td>
    <td>0.8</td>
  </tr>

  <tr>
    <td>Apple Inc.</td>
    <td><a href='individual_stock.php?Ticker=AAPL'>AAPL</td>
    <td><?php echo ($tickerDic['AAPL']['last'])?></td>
    <td><?php echo ($tickerDic['AAPL']['change'])?></td>
    <td>  <?php echo ($tickerDic['AAPL']['percentage'])?> </td>
    <td>36.70</td>
    <td>332.61M</td>
    <td>2.069T</td>
    <td>1.28</td>
  </tr>

  <tr>
    <td>Amazon.com</td>
    <td><a href='individual_stock.php?Ticker=AMZN'> AMZN</td>
    <td><?php echo ($tickerDic['AMZN']['last'])?></td>
    <td><?php echo ($tickerDic['AMZN']['change'])?></td>
    <td> <?php echo ($tickerDic['AMZN']['percentage'])?> </td>
    <td>126.54</td>
    <td>8.6M</td>
    <td>1.65T</td>
    <td>1.32</td>
  </tr>

  
  <tr>
    <td>Facebook</td>
    <td><a href='individual_stock.php?Ticker=FB'>FB</td>
    <td><?php echo ($tickerDic['FB']['last'])?></td>
    <td><?php echo ($tickerDic['FB']['change'])?></td>
    <td> <?php echo ($tickerDic['FB']['percentage'])?> </td>
    <td>34.57</td>
    <td>29.81M</td>
    <td>805.447B</td>
    <td>1.26</td>
  </tr>

  <tr>
    <td>Alibaba Group Holding Limited</td>
    <td><a href='individual_stock.php?Ticker=BABA'>BABA</td>
    <td><?php echo ($tickerDic['BABA']['last'])?></td>
    <td><?php echo ($tickerDic['BABA']['change'])?></td>
    <td> <?php echo ($tickerDic['BABA']['percentage'])?> </td>
    <td>80.47</td>
    <td>15.727M</td>
    <td>790.576B</td>
    <td>1.56</td>
  </tr>

  <tr>
    <td>Tesla, Inc.</td>
    <td><a href='individual_stock.php?Ticker=TSLA'>TSLA</td>
    <td><?php echo ($tickerDic['TSLA']['last'])?></td>
    <td><?php echo ($tickerDic['TSLA']['change'])?></td>
    <td> <?php echo ($tickerDic['TSLA']['percentage'])?> </td>
    <td>1,083.73</td>
    <td>110.321M</td>
    <td>389.794B</td>
    <td>1.64</td>
  </tr>

  <tr>
    <td>PayPal Holdings, Inc.</td>
    <td><a href='individual_stock.php?Ticker=PYPL'>PYPL</td>
    <td><?php echo ($tickerDic['PYPL']['last'])?></td>
    <td><?php echo ($tickerDic['PYPL']['change'])?></td>
    <td><?php echo ($tickerDic['PYPL']['percentage'])?> </td>
    <td>88.04 </td>
    <td>17.1M</td>
    <td>225.086B</td>
    <td>1.14</td>
  </tr>


</table>
</div>
</div>
</div>

<footer class="pt-4 my-md-5 pt-md-5 border-top">
            <div class="row">
                <div class="col-12 col-md">
                    <img class="mb-2" src="img/logo.jpg" alt="" width="140" height="40">
                    <small class="d-block mb-3 text-muted">&copy; 2020-2021</small>
                </div>
                <div class="col-6 col-md">
                    <h5>Features</h5>
                    <ul class="list-unstyled text-small">
                        <li><a class="text-muted" href="#">Cool stuff</a></li>
                        <li><a class="text-muted" href="#">Stuff for developers</a></li>
                    </ul>
                </div>
                <div class="col-6 col-md">
                    <h5>Resources</h5>
                    <ul class="list-unstyled text-small">
                        <li><a class="text-muted" href="#">Resource</a></li>
                    </ul>
                </div>
                <div class="col-6 col-md">
                    <h5>About</h5>
                    <ul class="list-unstyled text-small">
                        <li><a class="text-muted" href="#">Team</a></li>
                        <li><a class="text-muted" href="#">Locations</a></li>
                        <li><a class="text-muted" href="#">Privacy</a></li>
                        <li><a class="text-muted" href="#">Terms</a></li>
                    </ul>
                </div>
            </div>
        </footer>
</body>
    
</html>
