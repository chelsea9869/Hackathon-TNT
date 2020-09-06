<?PHP
require_once 'include/common.php';
$username='Alice very Old';
$userDao = new UserDAO();
    
$profile_explanation=[
    "Risk Seeking"=>"Investors with aggressive risk tolerance tend to be market-savvy. A deep understanding of securities and their propensities allows such individuals and institutional investors to purchase highly volatile instruments, such as small-company stocks that can plummet to zero or options contracts that can expire worthlessly. While maintaining a base of riskless securities, aggressive investors reach for maximum returns with maximum risk.",
    "Risk Tolerant"=>"You typically invest in areas that have potential for higher returns than market averages or a relative benchmark.",
    "Risk Neutral"=>"Risk neutral investors accept some risk to the principal but adopt a balanced approach with intermediate-term time horizons of five to 10 years. Combining large-company mutual funds with less volatile bonds and riskless securities, moderate investors often pursue a 50/50 structure. A typical strategy might involve investing half of the portfolio in a dividend-paying, growth fund.",
    "Moderately Risk Averse"=>"Conservative investors are willing to accept little to no volatility in their investment portfolios. Often, retirees who have spent decades building a nest egg are unwilling to allow any type of risk to their principal. A conservative investor targets vehicles that are guaranteed and highly liquid. Risk-averse individuals opt for bank certificates of deposit (CDs), money markets, or U.S. Treasuries for income and preservation of capital.",
    "Risk Avoider"=>"You tend to choose the preservation of capital over the potential for a higher-than-average return."
];
if(isset($_POST) && !empty($_POST)){
    $score = 0;
    $result = "uncertain";
    $explaination = "";
    
    $answer_qn1 = $_POST["general"];
    $answer_qn2 = $_POST["q2"];
    $answer_qn3 = $_POST["q3"];
    $answer_qn4 = $_POST["q4"];
    $answer_qn5 = $_POST["q5"];
    $answer_qn6 = $_POST["q6"];
    
    $score = $answer_qn1 + $answer_qn2 + $answer_qn3 + $answer_qn4 + $answer_qn5 + $answer_qn6;
    
    // higher is risk taking

    
    if ($score > 20) {
        $result = "Risk Seeking";
    } elseif ($score > 15) {
        $result = "Risk Tolerant" ;
    } elseif ($score > 10) {
        $result = "Risk Neutral";
    } elseif ($score > 6) {
        $result = "Risk Neutral";
    } elseif ($score > 0) {
        $result = 'Risk Avoider';
    }

    $userDao->updateRiskProfile($username,$result);
    
}elseif(isset($_GET) && !empty($_GET) && $_GET['survey']=='False'){
    $result=$userDao->retrieveProfile($username);
}else{
    header('Location: risk_test.php');
    exit;
}

$explaination = $profile_explanation[$result];

?>

<html>

<head>
    <title> The Millionnials </title>
</head>

<body>

    <?php include 'navbar.php'; ?>

    <div class="container">
        <div class="jumbotron mt-3">
            <h2>Your risk tolerance level is: <?php echo "$result" ?></h2>
            <p class="lead"><?php echo "$explaination" ?> </p>
            <button onclick="window.location.href='risk_test.php?survey=True'" class="btn btn-lg btn-primary" style='font-size:15px'>Retake Assessment</button>
            <br>
            <br>
            <h4>Set a realistic goal according to your risk appetite:</h4>
            <br>

            <form>
                <div class="form-group">
                    <label for="exampleInputEmail1">Starting Investment Amount</label>
                    <input type="text" class="form-control" id="amount" aria-describedby="emailHelp" placeholder="Enter the amount you want to invest">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Item you want to buy</label>
                    <input type="text" class="form-control" id="item" placeholder="Enter the item you want to purchase i.e. Nintendo Switch">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">How much does it cost</label>
                    <input type="text" class="form-control" id="cost" placeholder="Enter the cost of the item">
                </div>

                <!-- <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div> -->
                <!-- <button type="submit" class="btn btn-primary" value="dada">Grow Your Money  &raquo;</button> -->
            </form>

            <a class="btn btn-lg btn-primary" href="grow_your_money_main.php" role="button">Grow Your Money &raquo;</a>
        </div>
    </div>
</body>

</html>