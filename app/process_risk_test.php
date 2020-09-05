<?PHP

$score = 0;
$result = "uncertain";

$answer_qn1 = $_POST["general"];
$answer_qn2 = $_POST["qn2"];
$answer_qn3 = $_POST["qn3"];
$answer_qn4 = $_POST["qn4"];
$answer_qn5 = $_POST["qn5"];
$answer_qn6 = $_POST["qn6"];

$score = $answer_qn1 + $answer_qn2 + $answer_qn3 + $answer_qn4 + $answer_qn5 + $answer_qn6;

// higher is risk taking

if ($score > 20){
    $result = "risk seeking";
} elseif ($score > 15) {
    $result = "risk tolerant";
}elseif ($score > 10) {
    $result = "risk neutral";
}elseif ($score > 6) {
    $result = "moderately risk averse";
}elseif ($score > 0) {
    $result = "risk tolerant";
}

echo "Your test result is: $result";
echo "<br></br>";
echo "TODO: add explaination";






?>

<html>
<head>
<title>Process Survey</title>
</head>



<body>
<?PHP print $voteMessage . "<BR>"; ?>
</body>
</html>

