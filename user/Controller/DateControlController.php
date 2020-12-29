<?php
$date1=date('2020-07-11');
$date=date('Y-m-d');
$start = strtotime($date1);
$end = strtotime($date);

$days_between = ceil(abs($end - $start) / 86400);


if($days_between==31){
   echo "Old Order";
}
// $date1 = '2000-01-25';
// $date2 = '2010-06-20';

// $ts1 = strtotime($date1);
// $ts2 = strtotime($date2);

// $year1 = date('Y', $ts1);
// $year2 = date('Y', $ts2);

// $month1 = date('m', $ts1);
// $month2 = date('m', $ts2);

// $diff = ($month2 - $month1);
// echo $diff;
?>