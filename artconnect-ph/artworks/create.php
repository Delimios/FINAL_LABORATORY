<?php
session_start();
require_once(__DIR__ . "/../config/db.php");

if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['artwork'])) {
    $file = $_FILES['artwork'];
    $uploadDir = __DIR__ . "/../uploads/";
    $filePath = $uploadDir . basename($file['name']);

    if (move_uploaded_file($file['tmp_name'], $filePath)) {
        $stmt = $pdo->prepare("INSERT INTO artworks (user_id, file_path) VALUES (:user_id, :file_path)");
        $stmt->execute(['user_id' => $_SESSION['user_id'], 'file_path' => $filePath]);
        $success = "Artwork uploaded successfully!";
    } else {
        $error = "Failed to upload artwork.";
    }
}

include(__DIR__ . "/../assets/header.php");
?>

<section class="container">
    <h2>Upload Artwork</h2>
    <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <?php if (!empty($success)) echo "<p style='color:green;'>$success</p>"; ?>
    <form method="POST" enctype="multipart/form-data">
        <label>Select Artwork:</label><br>
        <input type="file" name="artwork" required><br><br>
        <button type="submit">Upload</button>
    </form>
</section>

<?php include(__DIR__ . "/../assets/footer.php"); ?>
