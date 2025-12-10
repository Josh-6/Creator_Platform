<?php
require_once __DIR__ . '/../app/services/PostService.php';

class PostController {

    private $service;

    public function __construct() {
        $this->service = new PostService();
    }

    public function create($userId, $title, $body) {
        $this->service->createPost($userId, $title, $body);

        echo "<p style='color:green;'>Post created successfully!</p>";
    }

    public function listPosts() {
        return $this->service->getAllPosts();
    }
}
