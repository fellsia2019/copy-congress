<?php
$string = file_get_contents('api_placeholder.json');

$data = json_decode($string);
  $json = json_encode($data);
  
  header('Content-Type: application/json');
  echo $json;

?>