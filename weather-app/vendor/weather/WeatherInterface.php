<?php
interface WeatherInterface
{
    public function getTmp();
    public function getWindSpeed();
    public function getWindTurn();
    public function getStatus();
    public function getHumidity();
}