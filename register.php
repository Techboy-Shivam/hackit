<?php
require 'config.php';
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'ADMIN') {
    header("Location: login.php");
    exit;
}

$message = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name         = $_POST['name'] ?? '';
    $dob          = $_POST['dob'] ?? null;
    $gender       = $_POST['gender'] ?? null;
    $blood_group  = $_POST['blood_group'] ?? '';
    $contact      = $_POST['contact'] ?? '';
    $address      = $_POST['address'] ?? '';
    $patient_type = $_POST['patient_type'] ?? 'OPD';

    if ($name && $dob && $gender && $blood_group) {
        $stmt = $pdo->prepare("INSERT INTO patients
            (name, dob, gender, blood_group, contact, address, patient_type)
            VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([
            $name,
            $dob,
            $gender,
            $blood_group,
            $contact,
            $address,
            $patient_type
        ]);
        $message = "Patient registered successfully!";
    } else {
        $message = "Please fill all required fields.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>HackIt NeoCare – Admin Patient Registration</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <style>
    /* use the same CSS from the previous single-panel design */
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
      padding:22px 20px 20px;
      border:1px solid rgba(152,212,255,0.45);
      box-shadow:0 18px 40px rgba(2,8,23,0.9);
      position:relative;
      overflow:hidden;
      backdrop-filter:blur(16px);
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
      gap:10px;
      margin-bottom:4px;
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
      margin:10px 0 16px 0;
    }
    .badge{
      padding:6px 12px;
      border-radius:999px;
      font-size:11px;
      background:linear-gradient(135deg,rgba(0,245,160,0.18),rgba(0,217,245,0.18));
      border:1px solid rgba(148,225,255,0.4);
      color:#e9f5ff;
    }
    .panel-sub{
      font-size:11px;
      color:#c2d7ff;
      margin-bottom:14px;
    }
    .msg{
      font-size:12px;
      color:#00f5a0;
      margin-bottom:10px;
    }
    .form-grid{
      display:grid;
      grid-template-columns:repeat(2,minmax(0,1fr));
      gap:12px 14px;
    }
    @media(max-width:600px){
      .form-grid{grid-template-columns:1fr;}
      .full-row{grid-column:span 1;}
    }
    label{
      font-size:11px;
      color:#cfe3ff;
      display:block;
      margin-bottom:4px;
    }
    input,select,textarea{
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
    input:focus,select:focus,textarea:focus{
      border-color:#00f5a0;
      box-shadow:0 0 0 1px rgba(0,245,160,0.8);
    }
    textarea{
      resize:vertical;
      min-height:60px;
    }
    .full-row{grid-column:span 2;}
    .btn-row{
      margin-top:14px;
      display:flex;
      gap:10px;
      justify-content:flex-end;
      align-items:center;
    }
    .btn-primary{
      padding:10px 18px;
      border-radius:999px;
      border:none;
      cursor:pointer;
      font-size:13px;
      font-weight:600;
      letter-spacing:0.04em;
      text-transform:uppercase;
      color:#020617;
      background:linear-gradient(135deg,#00f5a0,#00d9f5,#38bdf8);
      box-shadow:0 10px 24px rgba(15,23,42,0.9);
      transition:transform 0.12s ease,box-shadow 0.12s ease,filter 0.12s ease;
    }
    .btn-primary:hover{
      transform:translateY(-2px) scale(1.02);
      box-shadow:0 18px 40px rgba(15,23,42,0.95);
      filter:brightness(1.06);
    }
    .btn-ghost{
      padding:9px 16px;
      border-radius:999px;
      border:1px dashed rgba(148,193,255,0.9);
      cursor:pointer;
      font-size:11px;
      background:transparent;
      color:#e5f0ff;
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
      <div class="badge">Admin Panel</div>
      <div class="badge">Patient Registration</div>
      <div class="badge">OPD / IPD Flow</div>
    </div>
    <div class="panel-sub">
      Admin can store patient details here, and data is saved to the database.
    </div>

    <?php if ($message): ?>
      <div class="msg"><?php echo htmlspecialchars($message); ?></div>
    <?php endif; ?>

    <form method="POST">
      <div class="form-grid">
        <div>
          <label>Full Name *</label>
          <input type="text" name="name" required placeholder="e.g. Aarav Sharma">
        </div>
        <div>
          <label>Date of Birth *</label>
          <input type="date" name="dob" required>
        </div>
        <div>
          <label>Gender *</label>
          <select name="gender" required>
            <option value="">Select</option>
            <option value="M">Male</option>
            <option value="F">Female</option>
            <option value="O">Other</option>
          </select>
        </div>
        <div>
          <label>Blood Group *</label>
          <input type="text" name="blood_group" required placeholder="O+, A-, B+">
        </div>
        <div>
          <label>Contact</label>
          <input type="text" name="contact" placeholder="+91 9XXXXXXXXX">
        </div>
        <div>
          <label>Patient Type</label>
          <select name="patient_type">
            <option value="OPD">OPD</option>
            <option value="IPD">IPD</option>
          </select>
        </div>
        <div class="full-row">
          <label>Address</label>
          <textarea name="address" placeholder="Street, City, PIN"></textarea>
        </div>
      </div>
      <div class="btn-row">
        <button type="button" class="btn-ghost" onclick="document.querySelector('form').reset();">Reset</button>
        <button type="submit" class="btn-primary">Save Patient</button>
      </div>
    </form>
  </div>
</div>
</body>
</html>
