<?php

class Developer1
{
    public function culc($a, $b)
    {
        return $a+$b;
    }
}

class Developer2
{
    public function culcMyResult($a, $b)
    {
        return $a+$b;
    }
}

interface IAdapter
{
    public function sum($a, $b);
}

class ConcreteAdapter1 implements IAdapter
{
    protected $obj;
    public function sum($a, $b)
    {
        return $this->obj->culc($a, $b);
    }
    public function __construct()
    {
        $this->obj = new Developer1();
    }
}

class ConcreteAdapter2 implements IAdapter
{
    protected $obj;
    public function sum($a, $b)
    {
        return $this->obj->culcMyResult($a, $b);
    }
    public function __construct()
    {
        $this->obj = new Developer2();
    }
}

$ca1 = new ConcreteAdapter1();
echo $ca1->sum(2,3);

$ca2 = new ConcreteAdapter2();
echo $ca2->sum(3,3);