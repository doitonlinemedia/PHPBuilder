<?php
class PHPBuilderClass
{
    private $name = '';
    private $elements = array();
    private $extends;
    private $implements = array();

    public function __construct($value)
    {
        $this->name = $value;
    }
    
    public function AddElement($element)
    {
        $this->elements[] = $element;
    }
    
    public function setExtends($value)
    {
        $this->extends = $value;
    }
    
    public function AddImplements($value)
    {
        $this->implements[] = $value;
    }
        
    public function Render(&$depth)
    {
        $file_contents = str_repeat(T, $depth).'class '.$this->name;
        if(isset($this->extends))
        {
            $file_contents .= ' extends '.$this->extends;
        }
        if(count($this->implements) > 0)
        {
            $file_contents .= ' implements '.implode(" ,", $this->implements);
        }
        $file_contents .= N;
        $file_contents .= str_repeat(T, $depth).'{'.N;
        $file_sub_contents = '';
        $depth++;
        foreach($this->elements as $element)
        {
            $file_sub_contents .= $element->Render($depth);
        }
        $file_contents .= trim($file_sub_contents,N).N;
        $depth--;
        $file_contents .= str_repeat(T, $depth).'}'.N;
        
        return $file_contents;
    }
}