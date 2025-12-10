<?php

class Post {
    public $userId;
    public $title;
    public $body;

    public function __construct($userId, $title, $body) {
        $this->userId = $userId;
        $this->title  = $title;
        $this->body   = $body;
    }
}
