<?php
require_once __DIR__ . '/../../domain/Post.php';
require_once __DIR__ . '/../../data/PostRepository.php';

class PostService {

    private $repo;

    public function __construct() {
        $this->repo = new PostRepository();
    }

    public function createPost($userId, $title, $body) {

        // Domain model
        $post = new Post($userId, $title, $body);

        // Save
        return $this->repo->save($post);
    }

    public function getAllPosts() {
        return $this->repo->getAll();
    }
}
