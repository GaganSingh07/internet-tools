<?php 
include_once "../includes/header.php";
include_once "../db/conn.php";
session_start();

// Check if a specific recipe is requested via GET
$title = isset($_GET['title']) ? htmlspecialchars($_GET['title']) : 'Default';
$user = isset($_GET['user']) ? htmlspecialchars($_GET['user']) : 'Default';
$search = isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '';

// Check if 'next' parameter is set in GET, indicating that the 'Next' button was clicked
if (isset($_GET['next'])) {
    // Get the current recipe ID from session or default to the first recipe
    $current_id = isset($_SESSION['current_id']) ? $_SESSION['current_id'] : 0;
    
    // Fetch the next recipe based on current_id
    $sql = "SELECT * FROM content WHERE id > $current_id ORDER BY id ASC LIMIT 1";
    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $heading = $row["title"];
        $recipe = $row["recipes"];
        $_SESSION['current_id'] = $row['id']; // Update session with new current ID
    } else {
        // No more recipes, reset to the first recipe
        $sql = "SELECT * FROM content ORDER BY id ASC LIMIT 1";
        $result = mysqli_query($conn, $sql);
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $heading = $row["title"];
            $recipe = $row["recipes"];
            $_SESSION['current_id'] = $row['id'];
        } else {
            $heading = "No data available.";
            $recipe = "";
        }
    }
}else if (!empty($search)) {
    // Handle search functionality
    $sql = "SELECT * FROM content WHERE title LIKE '%$search%' OR recipes LIKE '%$search%'";
    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $heading = $row["title"];
        $recipe = $row["recipes"];
        $_SESSION['current_id'] = $row['id']; // Update session with new current ID
    } else {
        $heading = "No results found.";
        $recipe = "";
    }
}else if ($title === 'Default' && $user === 'Default') {
    // Default case when no specific recipe is requested and 'Next' button is not clicked
    $sql = "SELECT * FROM content ORDER BY id ASC LIMIT 1";
    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $heading = $row["title"];
        $recipe = $row["recipes"];
        $_SESSION['current_id'] = $row['id'];
    } else {
        $heading = "No data available.";
        $recipe = "";
    }
} else {
    // Specific recipe requested via GET parameters
    $sql = "SELECT * FROM content WHERE email_id='$user' AND title='$title'";
    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $heading = $row["title"];
        $recipe = $row["recipes"];
        $_SESSION['current_id'] = $row['id']; // Update session with new current ID
    } else {
        $heading = "No data available.";
        $recipe = "";
    }
}
?>

    <form class="search-container" method="GET" action="">
        <input type="text" name="search" placeholder="Search Recipe..." class="search-input">
        <button type="submit" class="search-button">Go</button>
    </form>

<div class="f">
    <button class="like-button" onclick="location.href='?next=true'">
       Next
    </button>
</div>

<div class="main1-container">
    <?php echo "<h1>$heading</h1>";
          echo "<p>$recipe</p>"; ?>
</div>

<?php 
include_once "../includes/footer.php";
?>
