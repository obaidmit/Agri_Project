<?php

$state = $_GET['state'];
$district = $_GET['district'];
$pH = $_GET['pH'];
$potassium = $_GET['potassium'];
$phosphorous = $_GET['phosphorous'];
$nitrogen = $_GET['nitrogen'];



$res = shell_exec('python recommend_crop.py "'.$state.'" "'.$district.'" "'.$pH.'" "'.$potassium.'" "'.$phosphorous.'" "'.$nitrogen.'" ');

echo $res;



?>
