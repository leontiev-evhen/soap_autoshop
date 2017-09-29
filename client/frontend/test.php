<?php 
header("Content-Type: text/json; charset=utf-8");
$data = ['a' => 1, 'b' => 2];
echo json_encode($data);
die;