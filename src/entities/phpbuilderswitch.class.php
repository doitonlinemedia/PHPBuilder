<?php
class PHPBuilderSwitch
{
    private $item = '';
    private $elements = array();
    private $default = array();
                      
    public function AddElementToCase($case, $element)
    {
        $this->elements[$case][] = $element;
    }
    
    public function __construct($item)
    {
        $this->item = $item;
    }
    
    public function AddElementToDefault($default)
    {
        $this->default[] = $default;
    }
    
    public function Render(&$depth)
    {
        $file_contents = str_repeat(T, $depth);
        $file_contents .= 'switch('.$this->item.')'.N;
        $file_contents .= str_repeat(T, $depth).'{'.N;
        $depth++;
        foreach($this->elements as $case => $elements)
        {
            $file_contents .= str_repeat(T, $depth).'case:'.N;
            $depth++;
            foreach($elements as $element)
            {
                $file_contents .= $element->Render($depth);
            }
            $file_contents .= str_repeat(T, $depth).'break;'.N;
            $depth--;
        }
        $depth--;
        
        if(isset($this->default))
        {
            $depth++;  
            $file_contents .= str_repeat(T, $depth).'default:'.N;
            $depth++;
            foreach($this->default as $element)
            {
                $file_contents .= $element->Render($depth);
            }
            $depth--;
            $depth--;
        }                
        $file_contents .= str_repeat(T, $depth).'}'.N;
        return $file_contents;
    }
}