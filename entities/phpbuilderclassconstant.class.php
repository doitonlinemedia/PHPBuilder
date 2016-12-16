<?php
class PHPBuilderClassConstant
{
    private $name;
    private $value;
    
    public function __construct($name)
    {
        $this->name = $name;
    }

    public function setValue($value)
    {
        $this->value = $value;
    }
    
    public function Render(&$depth)
    {
        $file_content = str_repeat(T, $depth);
        $file_content .= 'const '.$this->name;
        if(isset($this->value))
        {
            $file_content .= ' = '.PHPBuilderParser::VariableToPHP($this->value, $depth);
        }
        $file_content .= ';'.N;
        return $file_content;
    }
}