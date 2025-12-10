<?php
require_once __DIR__ . '/../app/services/PostService.php';

class PostController {

    private $service;

    public function __construct() {
        $this->service = new PostService();
    }

    public function create($creatorId, $title, $body) {
        $this->service->createPost($creatorId, $title, $body);

        echo "<p style='color:green;'>Post created successfully!</p>";
        header("Location: index.php?success=1");
        exit;
    }

    public function listPosts() {
        return $this->service->getAllPosts();
    }
}
