<?php
$csv_path = 'data/bookkeeping-category.csv';
$category = @fopen($csv_file,'r');

$type_dropdown= "<select id='bookkeeping-type' name='type'>";
$category_dropdown="<select id='bookkeeping-category' name='category'>";
foreach (($heading = fgetcsv($category);) as $key => $value) {
    # code...
}






while (($data = fgetcsv($category)) !== FALSE) {

}



?>