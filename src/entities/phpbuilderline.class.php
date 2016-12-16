<?php
class PHPBuilderLine
{
    private $value;
    
    public function __construct($value)
    {
        $this->value = $value;
    }

    public function Render(&$depth)
    {
        $file_contents = str_repeat(T, $depth).$this->value.N;
        
        return $file_contents;
    }
}