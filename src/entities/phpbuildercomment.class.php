<?php
class PHPBuilderComment
{
    private $comment;
    
    public function __construct($comment)
    {
        $this->comment = $comment;
    }

    public function Render()
    {
        $file_contents = '/* '.$this->comment.' */'.N;
        
        return $file_contents;
    }
}