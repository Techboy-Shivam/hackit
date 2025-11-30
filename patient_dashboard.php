<?php
<?php
require 'config.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}


?>
<!DOCTYPE html>
<html>
<head><title>Patient Dashboard</title></head>
<body>
<h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></h2>
<p>Your disease, medicine, prescription details will appear here once the admin/doctor adds them.</p>
<a href="logout.php">Logout</a>
</body>
</html>
