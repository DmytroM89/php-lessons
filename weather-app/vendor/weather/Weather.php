<?php
class Weather implements WeatherInterface
{
    private $tmp;
    private $windSpeed;
    private $windTurn;
    private $status;
    private $humidity;
    
    public function getTmp()
    {
        return $this->tmp;
    }
    public function getWindSpeed()
    {
        return $this->windSpeed;
    }
    public function getWindTurn()
    {
        return $this->windTurn;
    }
    public function getStatus()
    {
        return $this->status;
    }
    public function getHumidity()
    {
        return $this->humidity;
    }
    
    public function setTmp($tmp)
    {
        $this->tmp = $tmp;
    }
    public function setWindSpeed($windSpeed)
    {
        $this->windSpeed = $windSpeed;
    }
    public function setWindTurn($windTurn)
    {
        $this->windTurn = $windTurn;
    }
    public function setStatus($status)
    {
        $this->status = $status;
    }
    public function setHumidity($humidity)
    {
        $this->humidity = $humidity;
    }
    
    public function showWeather()
    {
        return [
            'tmp' => $this->tmp,
            'windspeed' => $this->windSpeed,
            'windturn' => $this->windTurn,
            'status' => $this->status,
            'humidity' => $this->humidity
        ];
    }
}