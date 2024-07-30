<?php include 'header.php'; ?>
<div class="container">
    <h1>String Submission</h1>
    <form action="submit.php" method="POST">
        <input type="text" name="message" maxlength="50" required>
        <button type="submit" name="submit">Submit</button>
    </form>
    <a href="showAll.php">Show all records</a>
</div>
</body>
</html>
