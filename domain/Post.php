<?php

class Post {
    public $creator_id;
    public $title;
    public $body;

    public function __construct($creator_id, $title, $body) {
        $this->creator_id = $creator_id;
        $this->title = $title;
        $this->body = $body;
    }
}
