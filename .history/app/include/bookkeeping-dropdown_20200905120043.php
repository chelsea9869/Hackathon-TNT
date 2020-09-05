<?php
$csv_path = 'data/bookkeeping-category.csv';
$category = @fopen($csv_file,'r');

$dropdown_str= "<select id";
$heading = fgetcsv($category);

while (($data = fgetcsv($category)) !== FALSE) {

}



?>