
<?php
require 'config.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>HackIt NeoCare – Welcome</title>
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
      max-width:480px;
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
      text-align:center;
    }
    .panel::before{
      content:"";
      position:absolute;
      left:-60px;
      bottom:-60px;
      width:160px;
      height:160px;
      border-radius:50%;
      background:radial-gradient(circle,rgba(0,245,160,0.4),transparent);
      opacity:0.4;
    }
    .hero-title{
      font-size:26px;
      font-weight:700;
      letter-spacing:0.04em;
      display:flex;
      align-items:center;
      justify-content:center;
      gap:10px;
      margin-bottom:6px;
    }
    .pulse-dot{
      width:10px;
      height:10px;
      border-radius:50%;
      background:#00f5a0;
      box-shadow:0 0 0 0 rgba(0,245,160,0.9);
      animation:pulse 1.4s infinite;
    }
    @keyframes pulse{
      0%{box-shadow:0 0 0 0 rgba(0,245,160,0.9);}
      70%{box-shadow:0 0 0 12px rgba(0,245,160,0);}
      100%{box-shadow:0 0 0 0 rgba(0,245,160,0);}
    }
    .hero-badges{
      display:flex;
      flex-wrap:wrap;
      gap:8px;
      justify-content:center;
      margin:10px 0 14px 0;
    }
    .badge{
      padding:6px 12px;
      border-radius:999px;
      font-size:11px;
      background:linear-gradient(135deg,rgba(0,245,160,0.18),rgba(0,217,245,0.18));
      border:1px solid rgba(148,225,255,0.4);
      color:#e9f5ff;
    }
    .hero-sub{
      font-size:12px;
      color:#c2d7ff;
      margin-bottom:18px;
    }
    .btn-main{
      display:block;
      width:100%;
      margin-bottom:12px;
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
      text-decoration:none;
    }
    .btn-main:hover{
      filter:brightness(1.06);
      transform:translateY(-1px);
    }
    .btn-outline{
      display:block;
      width:100%;
      padding:10px 0;
      border-radius:999px;
      border:1px dashed rgba(148,193,255,0.9);
      cursor:pointer;
      font-size:12px;
      color:#e5f0ff;
      background:transparent;
      text-decoration:none;
    }
    .btn-outline:hover{
      background:rgba(15,23,42,0.8);
    }
    .admin-link{
      margin-top:14px;
      font-size:11px;
      color:#cfe3ff;
    }
    .admin-link a{
      color:#38bdf8;
      text-decoration:none;
      font-weight:500;
    }
  </style>
</head>
<body>
<div class="shell">
  <div class="panel">
    <div class="hero-title">
      <div class="pulse-dot"></div>
      HackIt NeoCare
    </div>
    <div class="hero-badges">
      <div class="badge">24/7 Consult</div>
      <div class="badge">OPD / IPD Flow</div>
      <div class="badge">Just a Call Away</div>
    </div>
    <div class="hero-sub">
      Welcome to HackIt NeoCare. Login or register to access your health records. Admins can manage patients and prescriptions.
    </div>

    <a href="login.php" class="btn-main">User Login</a>
    <a href="user_register.php" class="btn-outline">New User? Register</a>

    <div class="admin-link">
      Admin? <a href="login.php">Click here to login</a>
    </div>
  </div>
</div>
</body>
</html>
