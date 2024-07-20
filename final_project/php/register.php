<?php 
    include_once "../includes/header.php";
    session_start();
?>

<div class="contact-page mt-5">
    <form class="contact-container p-4" method='post' action="/receive.php">
      <?php
        if (isset($_SESSION['message'])) {
          echo "<p style='color: red;' class='text-center'>".$_SESSION['message']."</p>";
        }
      ?>
      <label for="heading">Register Today</label><br>
      <input type="text" id="fname" name="fname" placeholder="First Name"><br>
      <input type="text" id="lname" name="lname" placeholder="Last Name"><br>
      <input type="text" id="mail" name="mail" placeholder="E-mail Id"><br>
      <input type="password" id="password" name="password" placeholder="Password">
      <input type="password" id="cnfrm-password" name="cnfrm-password" placeholder="Confirm Password">
      <button type="submit">Submit</button>
    </form>
  </div>
  <?php 
    include_once "../includes/footer.php"
?>