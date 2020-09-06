<?PHP

$score = 0;
$result = "uncertain";
$explaination = "";

$answer_qn1 = $_POST["general"];
$answer_qn2 = $_POST["qn2"];
$answer_qn3 = $_POST["qn3"];
$answer_qn4 = $_POST["qn4"];
$answer_qn5 = $_POST["qn5"];
$answer_qn6 = $_POST["qn6"];

$score = $answer_qn1 + $answer_qn2 + $answer_qn3 + $answer_qn4 + $answer_qn5 + $answer_qn6;

// higher is risk taking

if ($score > 20){
    $result = "Risk Seeking";
    $explaination = "Investors with aggressive risk tolerance tend to be market-savvy. A deep understanding of securities and their propensities allows such individuals and institutional investors to purchase highly volatile instruments, such as small-company stocks that can plummet to zero or options contracts that can expire worthlessly. While maintaining a base of riskless securities, aggressive investors reach for maximum returns with maximum risk.";
} elseif ($score > 15) {
    $result = "Risk Tolerant";
    $explaination = "You typically invest in areas that have potential for higher returns than market averages or a relative benchmark.";
}elseif ($score > 10) {
    $result = "Risk Neutral";
    $explaination = "Risk neutral investors accept some risk to the principal but adopt a balanced approach with intermediate-term time horizons of five to 10 years. Combining large-company mutual funds with less volatile bonds and riskless securities, moderate investors often pursue a 50/50 structure. A typical strategy might involve investing half of the portfolio in a dividend-paying, growth fund.";
}elseif ($score > 6) {
    $result = "Moderately Risk Averse";
    $explaination = "Conservative investors are willing to accept little to no volatility in their investment portfolios. Often, retirees who have spent decades building a nest egg are unwilling to allow any type of risk to their principal. A conservative investor targets vehicles that are guaranteed and highly liquid. Risk-averse individuals opt for bank certificates of deposit (CDs), money markets, or U.S. Treasuries for income and preservation of capital.";
}elseif ($score > 0) {
    $result = "Risk Avoider";
    $explaination = "You tend to choose the preservation of capital over the potential for a higher-than-average return.";
}

?>

<html>
<head>
<title>Risk Test Result</title>
</head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>


<body>
<div class="container">
      <div class="jumbotron mt-3">
        <h1>Your risk tolerance level is: <?php echo "$result" ?></h1>
        <p class="lead"><?php echo "$explaination" ?> </p>
        <a class="btn btn-lg btn-primary" href="scenario_game.php" role="button">Start Scenario Game &raquo;</a>
      </div>
    </div>
    <nav class="navbar fixed-bottom navbar-expand-sm navbar-dark bg-dark">
      <a class="navbar-brand" href="#">Bottom navbar</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#">Disabled</a>
          </li>
          <li class="nav-item dropup">
            <a class="nav-link dropdown-toggle" href="https://getbootstrap.com/" id="dropdown10" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropup</a>
            <div class="dropdown-menu" aria-labelledby="dropdown10">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
</body>
</html>

