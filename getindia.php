<?php


$vaccine_data = file_get_contents("vaccine_data.json");
$response_data = json_decode($vaccine_data,true);
$latest_vaccince_data = $response_data;

echo json_encode($latest_vaccince_data);

?>