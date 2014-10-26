<?php
$date = date_create();
//date_add($date, date_interval_create_from_date_string('-365 days'));

date_add(date_create($this->getValue('AuthorCutOff')), date_interval_create_from_date_string('-365 days'));

echo date_format($date, 'Y-m-d');
?>