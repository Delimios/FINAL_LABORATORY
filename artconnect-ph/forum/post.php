<?php
session_start();
require_once(__DIR__ . "/../config/db.php");

include(__DIR__ . "/../assets/header.php");
?>

<section class="container">
    <h2>Forum Posts</h2>
    <?php
    $stmt = $pdo->query("SELECT * FROM forum_posts ORDER BY created_at DESC");
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($posts) {
        foreach ($posts as $post) {
            echo "<div class='post'>";
            echo "<h3>" . htmlspecialchars($post['title']) . "</h3>";
            echo "<p>" . htmlspecialchars($post['content']) . "</p>";
            echo "<small>Posted by user #" . $post['user_id'] . "</small>";
            echo "</div><hr>";
        }
    } else {
        echo "<p>No posts yet.</p>";
    }
    ?>
</section>

<?php include(__DIR__ . "/../assets/footer.php"); ?>
