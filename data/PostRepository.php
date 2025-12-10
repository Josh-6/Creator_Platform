<?php
require_once __DIR__ . '/../config/Database.php';

class PostRepository {

    private $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }

    public function save(Post $post) {
        $stmt = $this->db->prepare("
            INSERT INTO Posts (Creator_ID, Title, Body)
            VALUES (?, ?, ?)
        ");

        $stmt->bind_param("iss", $post->creator_id, $post->title, $post->body);
        $stmt->execute();
    }

    public function getAll() {
        $result = $this->db->query("SELECT 
                Post_ID AS post_id,
                Creator_ID AS creator_id,
                Title AS title,
                Body AS body,
                Created_At AS created_at 
                FROM Posts 
                ORDER BY created_at DESC");
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
