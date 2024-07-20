<?php
include_once "../includes/header.php";
require_once '../db/conn.php';
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit();
}

    $email = $_SESSION['email'];

    if (isset($_GET['delete_id'])) {
        $title = $_GET['delete_id'];
        $delete_sql = "DELETE FROM content WHERE email_id='$email' AND title='$title'";
        if (mysqli_query($conn, $delete_sql)) {
            header("Location: myPage.php"); // Redirect to the same page to show the updated list
            exit();
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }
    }

    $sql = "SELECT * FROM content WHERE email_id='$email'";
    $result = mysqli_query($conn, $sql);
?>
<div class="container mt-4">
    <table class="center-table">
        <tr>
            <th>Title</th>
            <th>Uploaded Date</th>
            <th>Like</th>
            <th>Delete</th>
        </tr>
        <?php
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $title = htmlspecialchars($row['title']);
                    $date = htmlspecialchars($row['date']);
                    $likes = htmlspecialchars($row['likes']);
                    $url = "../php/home.php?title=" . urlencode($title) . "&user=" . urlencode($email);
                    echo "<tr>";
                    echo "<td><a href='$url'>$title</a></td>";
                    echo "<td>$date</td>";
                    echo "<td>$likes</td>"; // Assuming there is a column for likes
                    echo "<td><a href='myPage.php?delete_id=$title'>Delete</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No records found</td></tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Error executing query: " . mysqli_error($conn) . "</td></tr>";
        }
        ?>
    </table>
</div>
<?php
include_once "../includes/footer.php";
?>
