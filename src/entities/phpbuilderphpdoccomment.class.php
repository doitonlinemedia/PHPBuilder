<?php
class PHPBuilderPHPDocComment
{
    private $comment;
    
    public function __construct($comment)
    {
        $this->comment = $comment;
    }

    public function Render()
    {
        $file_contents = '/**'.N;
        foreach($this->comment as $line)
        {
            $file_contents .= '* '.$line.N;
        }
        $file_contents .= '*/'.N;
        
        return $file_contents;
    }
}