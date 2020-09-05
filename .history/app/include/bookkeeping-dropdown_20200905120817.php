<?php
$csv_path = 'data/bookkeeping-category.csv';
$category = @fopen($csv_file,'r');

$type_dropdown= "<select id='bookkeeping-type' name='type'>";
$income_dropdown="<select id='bookkeeping-income' name='category'>";
$expense_dropdown="<select id='bookkeeping-expense' name='category'>";

foreach (($heading = fgetcsv($category))as $idx => $type) {
    $type_dropdown += "<option value=$type>$type</option>";
}
$type_dropdown += "</select>";


while (($data = fgetcsv($category)) !== FALSE) {
    if($data[0] =='income'){
        $income_dropdown += "<option value=$data[1]>$data[1]</option>";
    }
}



?>