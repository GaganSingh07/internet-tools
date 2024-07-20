<?php
include_once "../includes/header.php";
require_once '../db/conn.php';
session_start();

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']){
    echo '
    <div class="p-5">
        <div class="alert alert-info text-center mt-4">
            <p>You are already logged in.</p>
            <hr>
            <a href="/logout.php" class="btn btn-primary ml-2">Click Here to log out</a>
        </div>
    </div>
    
    ';
    exit();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['mail'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM user";
    $result = mysqli_query($conn, $sql);
    if($result){
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                if($row["email_id"]===$email && $row["password"]===$password){
                    // Set session variables
                   $_SESSION['loggedin'] = true;
                   $_SESSION['email'] = $email;
                   // Redirect to myPage
                   header("Location: /index.php");
                   exit();
               }
            }
            $error = "Invalid email or password.";
        }
        else{
            echo "No records found";
        }
    }
    else{                           
        echo "Error executing query: " . mysqli_error($conn);
    } 
}
?>

<div class="contact-page">
    <form class="contact-container update" action="login.php" method="post">
        <?php
            if (isset($error)) {
                echo "<p style='color: red;' class='text-center'>$error</p>";
            }
        ?>
        <label for="heading" class="mt-5">Login</label><br>
        <input type="text" id="mail" name="mail" placeholder="E-mail Id"><br>
        <input type="password" id="password" name="password" placeholder="Password"><br>
        <button type="submit mt-3">Submit</button>
    </form>
</div>

<?php
include_once "../includes/footer.php";
?>
