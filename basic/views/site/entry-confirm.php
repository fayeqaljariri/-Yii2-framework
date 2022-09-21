<?php


$weather = "";
$error = "";

// print_r($model->city)
$context = stream_context_create(['http' => ['ignore_errors' => true]]);
$url = "https://api.openweathermap.org/data/2.5/weather?q=" . $model->city . "&appid=0f39619d4400483ac9dee526e1739d81";
$urlContents = file_get_contents($url, false, $context);



$weatherArray = json_decode($urlContents, true);

if ($weatherArray['cod'] == 200) {
    echo "<div class='alert alert-success' role='alert'>
    <h4 class='alert-heading'>Well done!</h4>";

    $weather = "The weather in " . $model->city . " is currently '" . $weatherArray['weather'][0]['description'] . "'. ";
    echo  $weather;


    $tempInCelcius = intval($weatherArray['main']['temp'] - 273);

    $weather = " The temperature is " . $tempInCelcius . "&deg;C and the wind speed is " . $weatherArray['wind']['speed'] . "m/s.";
    echo "</br>";
    echo  $weather;
} else {

    $error = "Could not find city - please try again.";
    echo "<div class='alert alert-warning' role='alert'>
    <h4 class='alert-heading'>try again</h4>";
    echo  $error;
}



?>



</div>