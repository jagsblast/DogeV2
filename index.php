<?php
$string = file_get_contents("https://raw.githubusercontent.com/jagsblast/Doge2/main/mock.json");
// echo $string;
$json_a = json_decode($string, true);

foreach ($json_a["servers"] as $key => $value) {
    echo $key;
    echo "<br/>";
    // var_dump($value["status"]);
    if ($value["status"] == "ok" || $value["status"] == "OK")
    {
        echo 'Status: ' . $value["status"] . "<br/> <br/>";
    }
    else
    {
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