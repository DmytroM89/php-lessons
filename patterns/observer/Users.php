<?php

class Users implements Observer
{
    public function notify($obj);
    
    if($obj instanceof ExchangeRate) {
        echo $obj->getExRate();
    }
    
    public function __construct()
    {
        ExchangeRate::getInstance()->registerObserver($this);
    }
}