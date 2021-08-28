<?php

$state = $_GET['state'];
$district = $_GET['district'];
$season = $_GET['season'];
$crop = $_GET['crop'];
$area = $_GET['area'];


// $res = shell_exec("python3 predict_yield.py '".$state."' '".$district."' '".$season."' '".$crop."' '".$area."' 2>&1");
$res = shell_exec('python predict_yield.py "'.$state.'" "'.$district.'" "'.$season.'" "'.$crop.'" "'.$area.'" ');

echo $res;



?>
