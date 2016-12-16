<?php
class PHPBuilderPHPOpen
{
    public function __construct()
    {

    }

    public function Render(&$depth)
    {
        $file_contents = str_repeat(T, $depth).'<?php'.N;
        
        return $file_contents;
    }
}