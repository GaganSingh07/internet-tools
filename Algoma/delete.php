<?php
include 'db.php';

if (isset($_POST['delete']) && !empty($_POST['string_id'])) {
    $string_id = intval($_POST['string_id']);

    $stmt = $pdo->prepare("DELETE FROM string_info WHERE string_id = :string_id");
    $stmt->bindParam(':string_id', $string_id, PDO::PARAM_INT);

    try {
        $stmt->execute();
        header("Location: showAll.php?deleted=1");
        exit();
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
} else {
    header("Location: showAll.php");
    exit();
}
?>

// After successful deletion
header("Location: showAll.php?deleted=1");

// If there's an error
header("Location: showAll.php?error=" . urlencode($e->getMessage()));