<?php
require_once __DIR__ . '/../presentation/PostController.php';

$controller = new PostController();

// Determine current user (prototype mode)
$currentUserId = isset($_GET['user']) ? intval($_GET['user']) : 1;

$user1 = "creatorUser";
$user1 = "normalUser";

// Handle create post form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';
    $body = $_POST['body'] ?? '';

    $controller->create($currentUserId, $title, $body);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Creator Platform Prototype</title>
</head>
<body>

<h2>Prototype: Create & View Posts (Layered Monolith Demo)</h2>

<!-- USER SWITCHER -->
<form method="GET" style="margin-bottom:20px;">
    <label>Switch User: </label>
    <select name="user" onchange="this.form.submit()">
        <option value="1" <?= $currentUserId === 1 ? 'selected' : '' ?>>creatorUser (Creator)</option>
        <option value="2" <?= $currentUserId === 2 ? 'selected' : '' ?>>normalUser (Viewer)</option>
    </select>
</form>

<hr>

<h3>Logged in as: <?php echo $currentUserId == 1 ? "creatorUser" : "normalUser"; ?></h3>

<?php if ($currentUserId === 1): ?>
    <!-- POST CREATION FORM -->
    <h3>Create Post</h3>
    <form method="POST">
    Title: <br>
    <input type="text" name="title" placeholder="Title" required><br><br>

    Body: <br>
    <textarea name="body" placeholder="Write something..." required></textarea><br><br>

    <button type="submit">Create Post</button>
</form>
<?php else: ?>
    <p>You are not a creator. You cannot create posts.</p>
<?php endif; ?>

<hr>

<!-- SHOW POSTS -->
<h3>All Posts</h3>
<?php
$posts = $controller->listPosts();

foreach ($posts as $post) {
    echo "<div style='margin-bottom:15px;padding:10px;border:1px solid black;'>";
    echo "<strong>{$post['title']}</strong><br>";
    echo "{$post['body']}<br>";
    echo "<small>Posted by User {$post['creator_id']} on {$post['created_at']}</small>";
    echo "</div>";
}
?>

</body>
</html>
