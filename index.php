<?php
echo '<!doctype html>';
echo '<html lang="en">';
echo '<head>';
echo '<meta http-equiv="refresh" content="60">';
//import stylesheets for background and bootstrap cuz i totaly love bootstrap
echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">';
echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">';
echo '<canvas id=c></canvas>';
echo  '<script  src="./script.js"></script>';
echo "<link rel='stylesheet' href='style.css'>";
echo '<link rel="stylesheet" href="./style.css">';
echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>';
echo '<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>';
echo '<link rel="stylesheet" href="stylesheet.css">';
//close head tag as we have imported all we need
echo '</head>';
echo '<body>';
//get json and decode it
$string = file_get_contents("https://raw.githubusercontent.com/jagsblast/DogeV2/master/mock.json");
$json_a = json_decode($string, true);
//creating navbar that will contain WorkTribe logo and DogeView V2 on it
echo '<nav class="navbar navbar-expand-md navbar-dark bg-dark">';
echo '<div class="mx-auto order-0">';
//adding WT logo to navbar
echo '<a class="navbar-brand mx-auto"><img src="Worktribe-logo-white-web.png" width="35%"></a>';
echo '<button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">';
echo '<span class="navbar-toggler-icon"></span>';
echo '</button>';
echo '</div>';
//hiding navbar dropdown button as it is not needed
echo '<div class="navbar-collapse collapse w-100 order-3 dual-collapse2">';
echo '<ul class="navbar-nav ml-auto">';
echo '<li class="nav-item">';
//adding dogeview v2 to right of navbar
echo '<a class="nav-link">Timestamp: ' . date('d/m/y' . "  	" . 'h:m:s',  $json_a["timestamp"]) . '</a>';
echo '<li class="nav-item">';
echo '<a class="nav-link">DogeView V2</a>';
echo '</li>';
echo '</ul>';
echo '</div>';
echo '</nav>';
echo '<div class="card-deck pt-4">';

//creating var to store number cards created to create new line at 6 cards
$card =0;
//looping through first array that has an array called servers which contains all the information passed about server status. Saving name of servers as $key and each atribute of the server passed
//under the array $value to be called later then we use strtolower which stands for string to lower case so we don't have to acadate for multiple capitilisations with the switch or if else loops.

foreach ($json_a["servers"] as $key => $value) {
    echo "<br/>";
    $var = strtolower($value["status"]);
    switch($var){
        case "error":
            echo '<div class="card text-white bg-danger mb-3" style="max-width: 18rem;">';
            echo '<div class="card-header">' . strtoupper($key) . '</div>';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . $value["status"] . '</h5>';
            echo '<p class="card-text">Error: ' . $value["message"] . '</p>';
            echo '<p class="card-text">Raised: ' . $value["raised"] . '</p>';
            echo '</div>';
            echo '</div>';
            $card = $card+1;
            if ($card >= 6){
                echo '</div>';
                echo '<div class="card-deck pt-4">';
                $card = 0;
            }
        }
    }
foreach ($json_a["servers"] as $key => $value) {
    echo "<br/>";
    $var = strtolower($value["status"]);
    switch($var){
        case ($var == "ok" && $value["message"] != null):
        // -------------
        echo '<div class="card text-white bg-success mb-3" style="max-width: 18rem;">';
        echo '<div class="card-header">' . strtoupper($key) . '</div>';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $value["status"] . '</h5>';
        echo '<p class="card-text">Error: ' . $value["message"] . '</p>';
        echo '<p class="card-text">Raised: ' . $value["raised"] . '</p>';
        echo '</div>';
        echo '</div>';
        $card = $card+1;
            if ($card >= 6){
                echo '</div>';
                echo '<div class="card-deck pt-4">';
                $card = 0;
            }
    }
}
foreach ($json_a["servers"] as $key => $value) {
    echo "<br/>";
    $var = strtolower($value["status"]);
    switch($var){
        case ($var == "ok" && $value["message"] == null):
        // -------------
        echo '<div class="card text-white bg-success mb-3" style="max-width: 18rem;">';
        echo '<div class="card-header">' . strtoupper($key) . '</div>';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $value["status"] . '</h5>';
        echo '</div>';
        echo '</div>';
        $card = $card+1;
            if ($card >= 6){
                echo '</div>';
                echo '<div class="card-deck pt-4">';
                $card = 0;
            }
    }
}
echo '</div>';
