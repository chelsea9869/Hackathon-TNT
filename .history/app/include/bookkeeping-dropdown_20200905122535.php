<?php
$csv_path = 'data/bookkeeping-category.csv';
$category = @fopen($csv_path,'r');

$type_dropdown= "<select id='bookkeeping-type' name='type[]'>
                    <option value='income'>";
$income_dropdown="<select id='bookkeeping-income' name='category[]'>";
$expense_dropdown="<select id='bookkeeping-expense' name='category[]'>";


while (($data = fgetcsv($category)) !== FALSE) {
    if($data[0] =='income'){
        $income_dropdown .= "<option value={$data[1]}>{$data[1]}</option>";
    }else{
        $expense_dropdown .= "<option value={$data[1]}>{$data[1]}</option>";
    }
}

$type_dropdown .= "</select>";
$income_dropdown  .= "</select>";
$expense_dropdown .= "</select>";
?>