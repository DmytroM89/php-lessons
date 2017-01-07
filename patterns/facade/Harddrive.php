<?php

class Harddrive
{
    public function read($lba, $size)
    {
        echo $lba.' + '.$size;
    }
}
