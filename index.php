<?php
function getVaccine()
{
   
$api_url = 'https://www.mygov.in/sites/default/files/covid/vaccine/covid_vaccine_timeline.json';

// Read JSON file
$json_data = file_get_contents($api_url);
$response_data = json_decode($json_data,true);
$latest_vaccince_data = end($response_data["vaccine_data"]);
$vaccine_data=json_encode($latest_vaccince_data);
function isJSON($string){
   return is_string($string) && is_array(json_decode($string, true)) && (json_last_error() == JSON_ERROR_NONE) ? true : false;
}

if(isJSON($vaccine_data)){
   $myfile = fopen("vaccine_data.json", "w") or die("Unable to open file!");
   fwrite($myfile,$vaccine_data);
   fclose($myfile);
  // $myfile = fopen("date.txt", "w") or die("Unable to open file!");
   //fwrite($myfile,$date);
   //fclose($myfile);
}
}
getVaccine();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vaccination</title>
    <link rel="stylesheet" href="js\index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
<!-- Navigation -->
<header class="header">
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="map.php">India Map</a>
        </li>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled">Disabled</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
</header>
    <div class="container">
        <div style="display: flex;">
            <img src="vaccine.png" alt="Responsive image" class="img">
            <h1 class="india">Covid Vaccination In India</h1>
        </div>
        <div class="row">
    <div  class="col-lg-4 vaccination-block">
    <div class="vaccinated view">
    <div class ="ve-title"> "VACCINATION DOSE STATUS"
    </div>
    <div id="today-count">
    <strong class="vaccine-live-count" id="totaltoday">... </strong>
    <span>Total Vaccination</span>
    </div>
    <div class="total-vcount">
    <strong id="dose1">...</strong>
    <span> 1st Dose</span>
    </div>
    <div class="total-vcount">
    <strong id="dose2">---</strong>
    <span> 2nd Dose </span>
    </div>
    </div>
    </div>
    <div  class="col-lg-4 testing-block">
    <div class="vaccinated view">
    <div class ="ve-title"> "VACCINATION DOSE STATUS"
    </div>
    <div id="today-count">
    <strong class="vaccine-live-count" id="todaydoses"> </strong>
    <span>Today Vaccination</span>
    </div>
    <div class="total-vcount">
    <strong id="todaydose1">---</strong>
    <span> 1st Dose </span>
    </div>
    <div class="total-vcount">
    <strong id="todaydose2">---</strong>
    <span> 2nd Dose </span>
    </div>
    </div>
    </div>
</div>
<div class="table-responsive w-100 d-block d-md-table">
        <table class="table" id="state_data">
            <thead>
                <tr>
                    <th scope="col">State</th>
                    <th scope="col">1st Dose </th>
                    <th scope="col">2nd Dose</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            
        </table>
</div>
<script src="js/main.js">
</script>
</body>
</html>
