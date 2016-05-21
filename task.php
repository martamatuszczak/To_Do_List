<?php

class Task {
    
    private $name;
    private $content;
    private $done;


    public function __construct($name, $content) {
        $this->name = (is_string($name)) ?$name :"";
        $this->content = (is_string($content)) ?$content :"";
        $this->done = false;
    }
    
    public function setName($name) {
        $this->name = (is_string($name)) ?$name :"";
    }
    
    public function setContent($content) {
        $this->content = (is_string($content)) ?$content :"";
    }
    
    public function getName() {
        return $this->name;
    }
    
    public function getContent() {
        return $this->content;
    }
    
    public function getStatus() {
        return $this->done;
    }
    
    public function finishTask() {
        $this->done = true;
        return $this;
    }

    public function displayTask() {
        if($this->done == false) {
            echo("$this->name:  $this->content");
        }
        else {
            echo("<strike>$this->name:  $this->content</strike>");
        }
        
    }
}
