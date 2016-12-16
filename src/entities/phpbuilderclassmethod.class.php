<?php
class PHPBuilderClassMethod
{
    private $static = false;
    private $visibility = PHPBUILDER_VISIBILITY_PUBLIC;
    private $name = '';
    private $arguments = array();
    private $elements = array();
    
    public function setStatic($value)
    {
        $this->static = $value;
    }
    
    public function setVisibility($value)
    {
        $this->visibility = $value;
    }
    
    public function AddArgument($argument)
    {
        $this->arguments[] = $argument;
    }
    
    public function AddElement($element)
    {
        $this->elements[] = $element;
    }
    
    public function __construct($name)
    {
        $this->name = $name;
    }
    
    public function Render(&$depth)
    {
        $file_contents = str_repeat(T, $depth);
        if($this->static)
        {
            $file_contents .= 'static ';
        }
        $file_contents .= $this->visibility.' function '.$this->name.'(';
        if(count($this->arguments) > 0)
        {
            foreach($this->arguments as $key => $value)
            {
                $this->arguments[$key] = $value->Render();
            }
            $file_contents .= implode(", ", $this->arguments);
        }
        $file_contents .= ')'.N;
        $file_contents .= str_repeat(T, $depth).'{'.N;
        $depth++;
        foreach($this->elements as $element)
        {
            $file_contents .= $element->Render($depth);
        }
        $depth--;
        $file_contents .= str_repeat(T, $depth).'}'.N;
        $file_contents .= N;
        return $file_contents;
    }
}