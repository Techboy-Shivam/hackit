<!-- <?php
require 'config.php';
$msg = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($username && $password) {
        $hash = md5($password);
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ? AND password_hash = ?");
        $stmt->execute([$username, $hash]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            $_SESSION['user_id']  = $user['id'];
            $_SESSION['role']     = $user['role'];
            $_SESSION['username'] = $user['username'];

            header("Location: dashboard.php");
            exit;
        } else {
            $msg = "Invalid credentials.";
        }
    } else {
        $msg = "Enter username and password.";
    }
}
?>
<!DOCTYPE html>
<html>
<head><title>Login</title></head>
<body>
<h2>Login</h2>
<p style="color:red;"><?php echo htmlspecialchars($msg); ?></p>
<form method="POST">
  <label>Username</label><br>
  <input type="text" name="username" required><br>
  <label>Password</label><br>
  <input type="password" name="password" required><br><br>
  <button type="submit">Login</button>
</form>
<a href="user_register.php">New user? Register</a>
</body>
</html> -->
<?php
require 'config.php';
$msg = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($username && $password) {

        // md5 login (same as current system)
        $hash = md5($password);
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ? AND password_hash = ?");
        $stmt->execute([$username, $hash]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            $_SESSION['user_id']  = $user['id'];
            $_SESSION['role']     = $user['role'];
            $_SESSION['username'] = $user['username'];

            header("Location: dashboard.php");
            exit;
        } else {
            $msg = "Invalid username or password.";
        }
    } else {
        $msg = "Please enter login details.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>HackIt NeoCare – Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>
/* SAME CSS AS REGISTER PAGE */
*{margin:0;padding:0;box-sizing:border-box;}
body{
    font-family:'Poppins',sans-serif;
    background:radial-gradient(circle at top left,#00f5a0,#00d9f5 30%,#0061ff 65%,#2f1bff 100%);
    height:100vh;display:flex;justify-content:center;align-items:center;color:#fff;
}
.shell{width:100%;max-width:420px;padding:20px;}
.panel{
    background:rgba(10,14,35,0.92);
    border-radius:25px;padding:25px;border:1px solid rgba(152,212,255,0.4);
    box-shadow:0 18px 45px rgba(0,0,0,0.7);position:relative;backdrop-filter:blur(15px);
}
.panel::before{
    content:"";position:absolute;left:-50px;bottom:-50px;
    width:160px;height:160px;border-radius:50%;
    background:radial-gradient(circle,rgba(0,245,160,0.4),transparent);
}
.hero-title{
    font-size:28px;font-weight:700;display:flex;gap:10px;align-items:center;margin-bottom:10px;
}
.pulse-dot{
    width:11px;height:11px;border-radius:50%;
    background:#00f5a0;box-shadow:0 0 0 0 rgba(0,245,160,.9);
    animation:pulse 1.5s infinite;
}
@keyframes pulse{
    0%{box-shadow:0 0 0 0 rgba(0,245,160,.9);}
    70%{box-shadow:0 0 0 13px transparent;}
    100%{box-shadow:0 0 0 0 transparent;}
}
label{font-size:12px;color:#d8e9ff;margin-bottom:5px;display:block;}
input{
    width:100%;padding:10px;border-radius:12px;background:rgba(7,15,36,.95);
    border:1px solid rgba(176,210,255,.6);color:#fff;font-size:13px;margin-bottom:14px;
}
input:focus{
    border-color:#00f5a0;box-shadow:0 0 0 1px #00f5a0;
}
.msg{color:#00f5a0;font-size:13px;margin-bottom:8px;text-align:center;}
.btn-primary{
    width:100%;padding:12px;border:none;border-radius:999px;cursor:pointer;
    background:linear-gradient(135deg,#00f5a0,#00d9f5,#38bdf8);
    color:#020617;font-weight:600;letter-spacing:.5px;font-size:14px;
}
.btn-primary:hover{
    transform:scale(1.02);filter:brightness(1.05);
}
.small-link{
    display:block;text-align:center;margin-top:12px;font-size:13px;color:#d7eaff;
    text-decoration:none;opacity:.9;
}
.small-link:hover{text-decoration:underline;}
</style>
</head>

<body>
<div class="shell">
<div class="panel">

<div class="hero-title">
    <div class="pulse-dot"></div>
    HackIt NeoCare – Login
</div>

<?php if($msg): ?>
    <div class="msg"><?= htmlspecialchars($msg) ?></div>
<?php endif; ?>

<form method="POST">
    <label>Username</label>
    <input type="text" name="username" required placeholder="Enter username">

    <label>Password</label>
    <input type="password" name="password" required placeholder="Enter password">

    <button type="submit" class="btn-primary">Login</button>
</form>

<a class="small-link" href="user_register.php">New user? Create account</a>
</div>
</div>
</body>
</html>
