<?php

class Comment{
    public $comment;
    public $commentDate;
    public $email;
    
    public function __construct($comment, $commentDate, $email){
        $this->comment = $comment;
        $this->commentDate = $commentDate;
        $this->email = $email;
    }
    
    
} 
?>