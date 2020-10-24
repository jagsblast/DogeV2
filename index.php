<?php
$string = file_get_contents("https://raw.githubusercontent.com/jagsblast/DogeV2/master/mock.json");
// echo $string;
$json_a = json_decode($string, true);
echo '<!doctype html>';
echo '<html lang="en">';
echo '<head>';
echo '<link rel="stylesheet" href="stylesheet.css">';
echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">';
echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">';
echo '</head>';
echo '<body>';
echo '<nav class="navbar navbar-expand-md navbar-dark bg-dark">';
echo '<div class="mx-auto order-0">';
echo '<a class="navbar-brand mx-auto"><img src="Worktribe-logo-white-web.png" width="35%"></a>';
echo '<button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">';
echo '<span class="navbar-toggler-icon"></span>';
echo '</button>';
echo '</div>';
echo '<div class="navbar-collapse collapse w-100 order-3 dual-collapse2">';
echo '<ul class="navbar-nav ml-auto">';
echo '<li class="nav-item">';
echo '<a class="nav-link">DogeView V2</a>';
echo '</li>';
echo '</ul>';
echo '</div>';
echo '</nav>';
echo '<div class="card-deck pt-4">';



foreach ($json_a["servers"] as $key => $value) {
    echo "<br/>";
    $var = strtolower($value["status"]);

    switch($var){
        case "ok":
            // echo $key;
            // echo '<div class="spinner-grow text-success" role="status">';
            // echo '<span class="sr-only">Loading...</span>';
            // echo '</div> <br/>';
            // echo 'Status: ' . $value["status"] . "<br/> <br/>";
            echo '<div class="card text-white bg-success mb-3" style="max-width: 18rem;">';
            echo '<div class="card-header">' . $key . '</div>';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . $value["status"] . '</h5>';
            echo '</div>';
            echo '</div>';
            
            
            break;
        case "error":
            echo '<div class="card text-white bg-danger mb-3" style="max-width: 18rem;">';
            echo '<div class="card-header">' . $key. '</div>';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . $value["status"] . '</h5>';
            echo '<p class="card-text">' . $value["message"] . '</p>';
            echo '<p class="card-text">Raised: ' . $value["raised"] . '</p>';
            echo '</div>';
            echo '</div>';
        }
}
echo '</div>';
//timestamp
echo "<br/>";
echo "timestamp";
echo "<br/>";
echo date('d/m/y' . "  	" . 'h:m:s',  $json_a["timestamp"]);