<?php
session_start();
require_once(__DIR__ . "/config/db.php");
include(__DIR__ . "/assets/header.php");
?>

<section class="container">
    <h2>Welcome to ArtConnect PH</h2>

    <a href="artworks/create.php" class="btn">Upload Artwork</a>
    <br><br>
    <a href="forum/posts.php" class="btn">Create Forum Post</a>
</section>

<?php include(__DIR__ . "/assets/footer.php"); ?>
