<?php

/* Observer */

class ExchangeRate
{
    static private $instance = null;
    private $observers = [];
    private $ex_rate;
    private function __construct(){}
    private function __clone(){}
    
    public static function getInstance()
    {
        if(self::$instance == null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    public function getExRate()
    {
        return $this->ex_rate;
    }
    
    public function setExRate($ex_rate)
    {
        $this->ex_rate = $ex_rate;
        $this->notifyObservers();
    }
    
    // Описываем NotifyObservers
    public function notifyObservers()
    {
        foreach($this->observers as $val) {
            $val->notify($this);
        }
    }
    
    // Регистрация Observers
    public function registerObserver(Observer $obj)
    {
        $this->observers[] = $obj;
    }
}