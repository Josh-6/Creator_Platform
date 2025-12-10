<?php
require_once __DIR__ . '/../config/Database.php';

class PostRepository {

    private $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }

    public function save(Post $post) {
        $stmt = $this->db->prepare("
            INSERT INTO Posts (user_id, title, body)
            VALUES (?, ?, ?)
        ");

        $stmt->bind_param("iss", $post->userId, $post->title, $post->body);
        $stmt->execute();
    }

    public function getAll() {
        $result = $this->db->query("SELECT * FROM Posts ORDER BY created_at DESC");
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
