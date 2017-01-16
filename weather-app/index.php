<?php
header('Content-Type: application/json');

function loadClass ($class)
{
    include_once 'vendor/weather/'.$class.'.php';
}
spl_autoload_register('loadClass');

$db=Db::getInstance();
$db->query("SELECT temperature, windspeed, windturn, `status`, humidity FROM weather");
$forecast = $db->fetch_all();

$weather = new Weather();

$arr = [];
foreach($forecast as $frcst)
{
    $weather->setTmp($frcst['temperature']);
    $weather->setWindSpeed($frcst['windspeed']);
    $weather->setWindTurn($frcst['windturn']);
    $weather->setStatus($frcst['status']);
    $weather->setHumidity($frcst['humidity']);
    $arr[] = $weather->showWeather();
}

echo json_encode($arr);





