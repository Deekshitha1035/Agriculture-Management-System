<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head><title>Dashboard</title></head>
<body>
<h1>Welcome, <?php echo htmlspecialchars($_SESSION["username"]); ?>!</h1>
<p><a href="index.html">Home</a> | <a href="products.html">Products</a></p>
</body>
</html>
