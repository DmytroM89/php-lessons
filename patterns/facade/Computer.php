<?php

require_once('Cpu.php');
require_once('Harddrive.php');
require_once('Memory.php');

class Computer
{
    protected $cpu;
    protected $harddrive;
    protected $memory;

    function __construct() {
        $this->cpu = new Cpu();
        $this->harddrive = new Harddrive();
        $this->memory = new Memory();
    }

    public function StartComputer()
    {
        $this->cpu->freeze();
        $this->memory->load("bootadress", $this->harddrive->read("bootsector", "1024Mb"));
        $this->cpu->jump("bootadress");
        $this->cpu->execute();
    }
}
