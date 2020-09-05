<?php
$csv_path = 'data/bookkeeping-category.csv';
$category = @fopen($csv_path,'r');

$type_dropdown= "<select id='bookkeeping-type' name='type[]'>
                    <option value='' disabled>Select Type</option>                    
                    <option value='expense'>Expense</option>
                    <option value='expense'>Income</option>
                    </select>";
$income_dropdown="<select id='bookkeeping-income' name='category[]'>";
$expense_dropdown="<select id='bookkeeping-expense' name='category[]'>";

while (($data = fgetcsv($category)) !== FALSE) {
    if($data[0] =='income'){
        $income_dropdown .= "<option value={$data[1]}>".strtoupper($data[1])."</option>";
    }else{
        $expense_dropdown .= "<option value={$data[1]}>".strtoupper($data[1])."</option>";
    }
}

$income_dropdown  .= "</select>";
$expense_dropdown .= "</select>";
?>