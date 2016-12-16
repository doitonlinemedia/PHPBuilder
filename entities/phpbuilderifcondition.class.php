<?php
class PHPBuilderIfCondition
{
    private $condition = '';
    private $elements = array();
                      
    public function AddElement($element)
    {
        $this->elements[] = $element;
    }
    
    public function __construct($value)
    {
        $this->condition = $value;
    }
    
    public function Render(&$depth)
    {
        $file_contents = str_repeat(T, $depth);
        $file_contents .= 'if('.$this->condition.')'.N;
        $file_contents .= str_repeat(T, $depth).'{'.N;
        $depth++;
        foreach($this->elements as $element)
        {
            $file_contents .= $element->Render($depth);
        }
        $depth--;
        $file_contents .= str_repeat(T, $depth).'}'.N;
        return $file_contents;
    }
}