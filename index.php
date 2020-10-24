<?php
$string = file_get_contents("https://raw.githubusercontent.com/jagsblast/DogeV2/master/mock.json");
// echo $string;
$json_a = json_decode($string, true);

foreach ($json_a["servers"] as $key => $value) {
    echo $key;
    echo "<br/>";
    $var = strtolower($value["status"]);

    switch($var){
        case "ok":
            echo 'Status: ' . $value["status"] . "<br/> <br/>";
            break;
        case "error":
            echo 'Status: ' . $value["status"] . "<br/>";
            echo 'Message: ' . $value["message"] . "<br/>";
            echo 'Raised: ' . $value["raised"] . "<br/>";
            echo 'Updated: ' . $value["updated"] . "<br/>";
            echo "<br/>";
        }
}
//timestamp
echo "<br/>";
echo "timestamp";
echo "<br/>";
echo date('d/m/y' . "  	" . 'h:m:s',  $json_a["timestamp"]);