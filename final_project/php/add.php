<?php
include_once "../includes/header.php";
require_once '../db/conn.php';
session_start();

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Create variables for user input
    $title = $_POST['title'];
    $date = $_POST['date'];
    $recipe = $_POST['recipe'];
    $email = $_SESSION['email'];
    $like=0;

    $sql = "INSERT INTO content (email_id,date,title, recipes,likes) VALUES ('$email', '$date', '$title', '$recipe','$like')";
    if (mysqli_query($conn, $sql)) {
        echo "Recipe Published Successfully!";
        header("Location: myPage.php");
        exit();
    } else {
       
            echo "Error: " . mysqli_error($conn);
    }
    
}
?>

<div class="contact-page">
    <form class="contact-container" action="add.php" method="post" enctype="multipart/form-data">
        <label for="fname">Upload Your Content</label><br>
        <input type="text" id="title" name="title" placeholder="Title" required><br>
        <input type="date" id="date" name="date" placeholder="Date" required><br>
        <input type="textbox" id="recipe" name="recipe" placeholder="Enter your recipe here.." required><br>
        <button type="submit">Submit</button>
    </form>
</div>

<?php 
include_once "../includes/footer.php";
?>
