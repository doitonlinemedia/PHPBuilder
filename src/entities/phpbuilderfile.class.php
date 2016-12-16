<?php
class PHPBuilderFile
{
    private $elements = array();
    private $file;
    private $depth = 0;
    
    public function __construct($file)
    {
        $this->file = $file;
    }
    
    public function AddElement($element)
    {
        $this->elements[] = $element;
    }     
    
    public function Render()
    {
        $file_contents = '';
        foreach($this->elements as $element)
        {
            $file_contents .= $element->Render($this->depth);
        }
        
        $file_contents = trim($file_contents);
        file_put_contents($this->file, $file_contents);
    }
}