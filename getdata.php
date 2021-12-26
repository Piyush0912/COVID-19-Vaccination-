<?php


$vaccine_data = file_get_contents("vaccine_data.json");
$response_data = json_decode($vaccine_data,true);
$latest_vaccince_data = $response_data["vacc_st_data"];

foreach ($latest_vaccince_data as $lat_vac_data) {
	if($lat_vac_data["state_id"] == $_GET['state_id']){
        echo json_encode($lat_vac_data);
        break;
    }
}
?>
