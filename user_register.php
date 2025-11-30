<?php
require 'config.php';

$msg = "";
$color = "red";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    $mobile   = trim($_POST['mobile'] ?? '');

    if ($username && $password && $mobile) {
        // check if username already exists
        $stmt = $pdo->prepare("SELECT id FROM users WHERE username = ?");
        $stmt->execute([$username]);
        if ($stmt->fetch()) {
            $msg = "Username already exists. Please choose a different name.";
            $color = "red";
        } else {
            $hash = md5($password); // demo only
            $stmt = $pdo->prepare(
                "INSERT INTO users (username, password_hash, mobile, role) VALUES (?, ?, ?, 'PATIENT')"
            );
            $stmt->execute([$username, $hash, $mobile]);
            $msg = "Registration successful. You can now login.";
            $color = "green";
        }
    } else {
        $msg = "All fields are required.";
        $color = "red";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>HackIt NeoCare – Register</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <style>
    *{box-sizing:border-box;margin:0;padding:0;}
    body{
      font-family:'Poppins',sans-serif;
      background:radial-gradient(circle at top left,#00f5a0 0%,#00d9f5 25%,#0061ff 60%,#2f1bff 100%);
      min-height:100vh;
      display:flex;
      align-items:center;
      justify-content:center;
      color:#f8fbff;
    }
    .shell{
      width:100%;
      max-width:420px;
      padding:20px;
    }
    .panel{
      background:rgba(10,14,35,0.9);
      border-radius:26px;
      padding:24px 22px 22px;
      border:1px solid rgba(152,212,255,0.45);
      box-shadow:0 18px 40px rgba(2,8,23,0.9);
      position:relative;
      overflow:hidden;
      backdrop-filter:blur(16px);
    }
    .hero-title{
      font-size:24px;
      font-weight:700;
      letter-spacing:0.04em;
      display:flex;
      align-items:center;
      gap:10px;
      margin-bottom:6px;
    }
    .pulse-dot{
      width:10px;height:10px;border-radius:50%;
      background:#00f5a0;
      box-shadow:0 0 0 0 rgba(0,245,160,0.9);
      animation:pulse 1.4s infinite;
    }
    @keyframes pulse{
      0%{box-shadow:0 0 0 0 rgba(0,245,160,0.9);}
      70%{box-shadow:0 0 0 12px rgba(0,245,160,0);}
      100%{box-shadow:0 0 0 0 rgba(0,245,160,0);}
    }
    label{
      font-size:12px;
      color:#cfe3ff;
      display:block;
      margin:10px 0 4px 0;
    }
    input{
      width:100%;
      padding:9px 10px;
      border-radius:12px;
      border:1px solid rgba(176,210,255,0.5);
      background:rgba(7,15,35,0.9);
      color:#f4f7ff;
      font-size:12px;
      outline:none;
      box-shadow:inset 0 0 0 1px rgba(6,22,70,0.7);
    }
    input:focus{
      border-color:#00f5a0;
      box-shadow:0 0 0 1px rgba(0,245,160,0.8);
    }
    .btn-main{
      margin-top:16px;
      width:100%;
      padding:11px 0;
      border-radius:999px;
      border:none;
      cursor:pointer;
      font-size:14px;
      font-weight:600;
      letter-spacing:0.05em;
      text-transform:uppercase;
      color:#020617;
      background:linear-gradient(135deg,#00f5a0,#00d9f5,#38bdf8);
      box-shadow:0 10px 24px rgba(15,23,42,0.9);
    }
    .msg{
      margin-top:10px;
      font-size:12px;
    }
    a{
      color:#38bdf8;
      text-decoration:none;
      font-size:12px;
    }
  </style>
</head>
<body>
<div class="shell">
  <div class="panel">
    <div class="hero-title">
      <div class="pulse-dot"></div>
      HackIt NeoCare – Register
    </div>

    <?php if ($msg): ?>
      <div class="msg" style="color:<?php echo $color; ?>;">
        <?php echo htmlspecialchars($msg); ?>
      </div>
    <?php endif; ?>

    <form method="POST">
      <label>Username</label>
      <input type="text" name="username" required placeholder="Choose unique username">

      <label>Password</label>
      <input type="password" name="password" required placeholder="Enter password">

      <label>Mobile Number</label>
      <input type="text" name="mobile" required placeholder="+91 9XXXXXXXXX">

      <button type="submit" class="btn-main">Register</button>
    </form>

    <p class="msg" style="margin-top:12px;">Already registered?
      <a href="login.php">Login here</a>
    </p>
  </div>
</div>
</body>
</html>
