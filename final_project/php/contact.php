<?php 
    include_once "../includes/header.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  echo "<div style='background-color: #d4edda;
  color: #155724;
  border: 1px solid #c3e6cb;
  padding: 10px;
  margin: 20px auto;
  text-align: center;
  width: 50%;
  border-radius: 5px;'>Your response recorded successfully</div>";
}
?>

<div class="contact-page">
    <form class="contact-container mt-5" method="post" action="">
      <label for="fname">Contact Us Today</label><br>
      <input type="text" id="fname" name="fname" placeholder="First Name"><br>
      <input type="text" id="lname" name="lname" placeholder="Last Name"><br>
      <input type="text" id="mail" name="mail" placeholder="E-mail Id"><br>
      <input type="text" id="content" name="content" placeholder="Ask your question here...">
      <button type="submit">Submit</button>
    </form>
  </div>
<?php 
    include_once "../includes/footer.php"
?>
