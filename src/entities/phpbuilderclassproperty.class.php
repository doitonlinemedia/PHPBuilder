<?php
class PHPBuilderClassProperty
{
    private $static = false;
    private $visibility = PHPBUILDER_VISIBILITY_PUBLIC;
    private $name;
    private $value;
    private $custom;

    public function __construct($name)
    {
        $this->name = $name;
    }
        
    public function setStatic($value)
    {
        $this->static = $value;
    }
    
    public function setVisibility($value)
    {
        $this->visibility = $value;
    }
    
    public function setCustom($value)
    {
        $this->custom = $value;
    }
    
    public function setValue($value)
    {
        $this->value = $value;
    }
    
    public function Render(&$depth)
    {
        $file_content = str_repeat(T, $depth);
        $file_content .= $this->visibility.' ';
        if($this->static)
        {
            $file_content .= 'static ';
        }
        $file_content .= '$'.$this->name;
        if(isset($this->value))
        {
            if(isset($this->custom) && $this->custom == 'arrayCollapse')
            {
                $file_content .= ' = '.PHPBuilderParser::CVariableToPHP($this->value, $depth);
            }
            else
            {
                $file_content .= ' = '.PHPBuilderParser::VariableToPHP($this->value, $depth);
            }
        }
        $file_content .= ';'.N;
        return $file_content;
    }
}