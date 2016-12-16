<?php
class PHPBuilderClassMethodArgument
{
    private $name;
    private $hint;
    private $default;  
    
    public function __construct($value)
    {
        $this->name = $value;
    }
    
    public function setTypehint($value)
    {
        $this->hint = $value;
    }     
    
    public function setDefault($value)
    {           
        $this->default = $value;
    }
    
    public function Render()
    {
        $file_content = '';
        if(isset($this->hint))
        {
            $file_content .= $this->hint.' ';
        }
        $file_content .= '$'.$this->name;
        if(isset($this->default))
        {
            $file_content .= ' = '.$this->default;
        }
        return $file_content;
    }
}