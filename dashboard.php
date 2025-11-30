<?php
require 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>
<!-- <!DOCTYPE html>
<html>
<head><title>Home</title></head>
<body>
<h2>Welcome Home</h2>
<p>Logged in as: <?php echo htmlspecialchars($_SESSION['username']); ?></p>
<p>Role: <?php echo htmlspecialchars($_SESSION['role']); ?></p>

<p><a href="patient_dashboard.php">Go to Patient Dashboard</a></p>
<p><a href="admin_register_patient.php">Go to Admin Patient Register (for admin)</a></p>
<p><a href="logout.php">Logout</a></p>
</body>
</html> -->
<!-- <?php
?>
<!DOCTYPE html>
<html>
<head>
  <title>HackIt NeoCare – Landing</title>
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
      max-width:700px;
      padding:20px;
    }
    .panel{
      background:rgba(10,14,35,0.9);
      border-radius:24px;
      padding:24px 24px 20px;
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
    .header{
      display:flex;
      justify-content:space-between;
      align-items:center;
      gap:10px;
      flex-wrap:wrap;
    }
    .hero-title{
      font-size:26px;
      font-weight:700;
      letter-spacing:0.04em;
      display:flex;
      align-items:center;
      gap:10px;
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
    .tagline{
      font-size:12px;
      color:#c2d7ff;
    }
    .hero-badges{
      display:flex;
      flex-wrap:wrap;
      gap:8px;
      margin:14px 0 18px 0;
    }
    .badge{
      padding:6px 12px;
      border-radius:999px;
      font-size:11px;
      background:linear-gradient(135deg,rgba(0,245,160,0.18),rgba(0,217,245,0.18));
      border:1px solid rgba(148,225,255,0.4);
      color:#e9f5ff;
    }
    .content{
      display:grid;
      grid-template-columns:1.3fr 1.1fr;
      gap:20px;
    }
    @media(max-width:700px){
      .content{grid-template-columns:1fr;}
    }
    .text-block{
      font-size:13px;
      color:#dee7ff;
      line-height:1.6;
    }
    .text-block h3{
      font-size:16px;
      margin-bottom:6px;
    }
    .list{
      margin-top:8px;
      list-style:none;
      padding-left:0;
    }
    .list li{
      margin-bottom:4px;
    }
    .pill{
      display:inline-block;
      margin-top:4px;
      padding:4px 10px;
      border-radius:999px;
      font-size:11px;
      border:1px solid rgba(148,163,184,0.9);
      color:#e5e7eb;
    }
    .card-mini{
      background:rgba(15,23,42,0.9);
      border-radius:16px;
      padding:14px 14px 12px;
      border:1px solid rgba(148,163,184,0.5);
      box-shadow:0 10px 24px rgba(0,0,0,0.7);
      font-size:12px;
      color:#d1d5db;
    }
    .card-mini h4{
      font-size:14px;
      margin-bottom:6px;
      color:#e5e7eb;
    }
  </style>
</head>
<body>
<div class="shell">
  <div class="panel">
    <div class="header">
      <div>
        <div class="hero-title">
          <div class="pulse-dot"></div>
          HackIt NeoCare
        </div>
        <div class="tagline">Smart hospital landing screen for patients, doctors and staff.</div>
      </div>
      <span class="pill">Prototype · Hospital Management</span>
    </div>

    <div class="hero-badges">
      <div class="badge">24/7 Consult</div>
      <div class="badge">OPD / IPD Flow</div>
      <div class="badge">Digital Prescriptions</div>
      <div class="badge">Doctor & Nurse Workspace</div>
    </div>

    <div class="content">
      <div class="text-block">
        <h3>Welcome to NeoCare</h3>
        <p>
          This landing page represents the front door of the HackIt NeoCare Hospital Management System.
          It showcases a modern, neon-glass theme with a clear focus on quick access to care.
        </p>
        <ul class="list">
          <li>• Patients can view their visits, prescriptions and follow‑ups.</li>
          <li>• Doctors and nurses get a unified view of active cases.</li>
          <li>• Admins can manage hospital data and workflows.</li>
        </ul>
      </div>

      <div class="card-mini">
        <h4>Admin Access</h4>
        <p>
          Admin users can log in from a dedicated admin portal to manage patients,
          staff, prescriptions and operational reports.
        </p>
        <p style="margin-top:6px;">
          In a full implementation, this card would include an “Admin Login” button
          leading to the secure admin dashboard.
        </p>
      </div>
    </div>
  </div>
</div>
</body>
</html>
 -->
<?php
// Dummy PHR data – replace later with DB values
$patientName   = "Aarav Sharma";
$patientId     = "HNC-P-00123";
$age           = 28;
$gender        = "Male";
$bloodGroup    = "O+";
$contact       = "+91 98765 43210";
$email         = "aarav.sharma@example.com";
$address       = "Indiranagar, Bengaluru, Karnataka";
$lastVisit     = "2025-11-18";
$primaryDoctor = "Dr. Meera Nair";
$primaryDept   = "Cardiology";

$conditions = ["Hypertension", "Mild Asthma"];
$allergies  = ["Penicillin", "Dust Allergy"];
$medList    = [
    ["name" => "Amlodipine 5mg", "dose" => "1-0-0", "note" => "After breakfast"],
    ["name" => "Inhaler (Salbutamol)", "dose" => "SOS", "note" => "Max 3/day"],
];
$nextVisit = "2025-12-05";
?>
<!DOCTYPE html>
<html>
<head>
  <title>HackIt NeoCare – Personal Health Record</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <style>
    *{box-sizing:border-box;margin:0;padding:0;}
    body{
      font-family:'Poppins',sans-serif;
      background:radial-gradient(circle at top left,#00f5a0 0%,#00d9f5 20%,#0061ff 55%,#2f1bff 100%);
      min-height:100vh;
      display:flex;
      align-items:center;
      justify-content:center;
      color:#e5f0ff;
      overflow-x:hidden;
    }
    .shell{
      width:100%;
      max-width:1080px;
      padding:18px;
    }
    .frame{
      position:relative;
      border-radius:28px;
      background:rgba(8,12,35,0.94);
      border:1px solid rgba(148,212,255,0.55);
      box-shadow:0 26px 60px rgba(3,7,18,0.95);
      overflow:hidden;
      padding:22px 24px 20px;
      backdrop-filter:blur(20px);
      transition:transform .25s ease, box-shadow .25s ease;
    }
    .frame:hover{
      transform:translateY(-4px);
      box-shadow:0 34px 80px rgba(3,7,18,1);
    }
    /* floating blobs as “images” */
    .blob{
      position:absolute;
      border-radius:50%;
      filter:blur(2px);
      opacity:.7;
      pointer-events:none;
    }
    .blob.b1{
      width:180px;height:180px;
      top:-60px;right:-40px;
      background:radial-gradient(circle,#38bdf8,#0f172a);
      animation: drift1 16s infinite alternate ease-in-out;
    }
    .blob.b2{
      width:120px;height:120px;
      bottom:-30px;left:-10px;
      background:radial-gradient(circle,#22c55e,#0f172a);
      animation: drift2 18s infinite alternate ease-in-out;
    }
    .blob.b3{
      width:80px;height:80px;
      top:50%;left:50%;
      transform:translate(-50%,-50%);
      background:radial-gradient(circle,#a855f7,#0f172a);
      mix-blend-mode:screen;
      opacity:.4;
      animation: drift3 20s infinite alternate ease-in-out;
    }
    @keyframes drift1{from{transform:translate3d(0,0,0);}to{transform:translate3d(-30px,25px,0);}}
    @keyframes drift2{from{transform:translate3d(0,0,0);}to{transform:translate3d(20px,-25px,0);}}
    @keyframes drift3{from{transform:translate(-50%,-50%) scale(1);}to{transform:translate(-40%,-45%) scale(1.2);}}

    .header{
      display:flex;
      justify-content:space-between;
      align-items:center;
      gap:16px;
      position:relative;
      z-index:2;
    }
    .brand{
      display:flex;
      align-items:center;
      gap:10px;
    }
    .pulse-dot{
      width:11px;height:11px;border-radius:50%;
      background:#22c55e;
      box-shadow:0 0 0 0 rgba(34,197,94,0.9);
      animation:pulse 1.3s infinite;
    }
    @keyframes pulse{
      0%{box-shadow:0 0 0 0 rgba(34,197,94,0.9);}
      70%{box-shadow:0 0 0 12px rgba(34,197,94,0);}
      100%{box-shadow:0 0 0 0 rgba(34,197,94,0);}
    }
    .title{
      font-size:24px;font-weight:700;letter-spacing:.04em;
    }
    .tag{
      font-size:11px;
      padding:4px 12px;
      border-radius:999px;
      border:1px solid rgba(148,163,184,0.85);
      text-transform:uppercase;
      letter-spacing:.08em;
      background:rgba(15,23,42,0.75);
    }

    .grid{
      margin-top:18px;
      display:grid;
      grid-template-columns: minmax(0,1.1fr) minmax(0,1.2fr);
      gap:18px;
      position:relative;
      z-index:2;
    }
    @media(max-width:900px){.grid{grid-template-columns:1fr;}}

    /* left profile card */
    .profile-card{
      border-radius:20px;
      background:radial-gradient(circle at top left,rgba(56,189,248,0.25),rgba(15,23,42,0.98));
      border:1px solid rgba(148,212,255,0.55);
      padding:16px 16px 14px;
      box-shadow:0 16px 40px rgba(15,23,42,0.9);
      display:grid;
      grid-template-columns:84px minmax(0,1fr);
      gap:12px;
      align-items:center;
    }
    .avatar-wrap{
      position:relative;
      width:78px;height:78px;
      border-radius:24px;
      background:conic-gradient(from 210deg,#22c55e,#38bdf8,#a855f7,#22c55e);
      padding:2px;
      transition:transform .2s ease;
    }
    .frame:hover .avatar-wrap{transform:rotate(-3deg) scale(1.02);}
    .avatar-inner{
      width:100%;height:100%;
      border-radius:22px;
      background:
        radial-gradient(circle at 30% 25%,rgba(248,250,252,0.95),rgba(148,163,184,0.15)),
        linear-gradient(145deg,#0f172a,#020617);
      display:flex;
      align-items:center;
      justify-content:center;
      font-size:36px;
      font-weight:600;
      color:#020617;
      text-shadow:0 1px 3px rgba(15,23,42,0.7);
    }
    .info-main h2{
      font-size:18px;
      font-weight:600;
      margin-bottom:2px;
    }
    .info-main span{
      font-size:11px;
      color:#c7d2fe;
    }
    .chips{
      margin-top:8px;
      display:flex;
      flex-wrap:wrap;
      gap:6px;
      font-size:10px;
    }
    .chip{
      padding:3px 9px;
      border-radius:999px;
      background:rgba(15,23,42,0.85);
      border:1px solid rgba(148,163,184,0.7);
      color:#e5e7eb;
    }

    /* details + meds */
    .card{
      border-radius:18px;
      background:rgba(15,23,42,0.95);
      border:1px solid rgba(30,64,175,0.8);
      padding:14px 14px 12px;
      box-shadow:0 14px 36px rgba(15,23,42,0.9);
      margin-bottom:10px;
    }
    .card h3{
      font-size:14px;
      font-weight:600;
      margin-bottom:6px;
      display:flex;
      justify-content:space-between;
      align-items:center;
    }
    .sub{
      font-size:11px;
      color:#9ca3af;
      margin-bottom:8px;
    }
    .rows{
      display:grid;
      grid-template-columns:repeat(2,minmax(0,1fr));
      column-gap:14px;
      row-gap:4px;
      font-size:11px;
    }
    @media(max-width:700px){.rows{grid-template-columns:1fr;}}
    .label{color:#9ca3af;}
    .value{color:#e5e7eb;font-weight:500;}

    .pills-row{
      display:flex;
      flex-wrap:wrap;
      gap:6px;
      margin-top:4px;
      font-size:11px;
    }
    .pill-green{
      padding:3px 9px;
      border-radius:999px;
      background:rgba(22,163,74,0.18);
      color:#bbf7d0;
      border:1px solid rgba(22,163,74,0.7);
    }
    .pill-red{
      padding:3px 9px;
      border-radius:999px;
      background:rgba(220,38,38,0.18);
      color:#fecaca;
      border:1px solid rgba(220,38,38,0.7);
    }

    table{
      width:100%;
      border-collapse:collapse;
      font-size:11px;
      margin-top:4px;
    }
    th,td{
      padding:6px 6px;
      text-align:left;
      white-space:nowrap;
    }
    th{
      background:rgba(15,23,42,0.95);
      color:#c7d2fe;
      border-bottom:1px solid rgba(30,64,175,0.8);
    }
    tr:nth-child(even) td{background:rgba(15,23,42,0.85);}
    tr:nth-child(odd) td{background:rgba(15,23,42,0.98);}

    .footer-row{
      margin-top:6px;
      display:flex;
      justify-content:space-between;
      align-items:center;
      font-size:11px;
      color:#9ca3af;
    }
    .footer-row span.highlight{
      color:#f9fafb;
      font-weight:500;
    }
    .hover-note{
      font-size:10px;
      color:#9ca3af;
      margin-top:4px;
      text-align:right;
    }
  </style>
</head>
<body>
<div class="shell">
  <div class="frame">
    <div class="blob b1"></div>
    <div class="blob b2"></div>
    <div class="blob b3"></div>

    <div class="header">
      <div class="brand">
        <div class="pulse-dot"></div>
        <div class="title">HackIt NeoCare</div>
      </div>
      <div class="tag">Personal Health Record · Live Preview</div>
    </div>

    <div class="grid">
      <!-- LEFT: profile -->
      <div class="profile-card">
        <div class="avatar-wrap">
          <div class="avatar-inner">
            <?php echo strtoupper(substr($patientName,0,1)); ?>
          </div>
        </div>
        <div class="info-main">
          <h2><?php echo htmlspecialchars($patientName); ?></h2>
          <span>Patient ID · <?php echo htmlspecialchars($patientId); ?></span>
          <div class="chips">
            <div class="chip">Age: <?php echo (int)$age; ?></div>
            <div class="chip">Gender: <?php echo htmlspecialchars($gender); ?></div>
            <div class="chip">Blood: <?php echo htmlspecialchars($bloodGroup); ?></div>
          </div>
        </div>
      </div>

      <!-- RIGHT: key snapshot -->
      <div class="card">
        <h3>
          Snapshot
          <span style="font-size:10px;color:#93c5fd;">Hover around the card to feel the glow</span>
        </h3>
        <div class="rows">
          <div>
            <div class="label">Primary Doctor</div>
            <div class="value"><?php echo htmlspecialchars($primaryDoctor); ?></div>
          </div>
          <div>
            <div class="label">Department</div>
            <div class="value"><?php echo htmlspecialchars($primaryDept); ?></div>
          </div>
          <div>
            <div class="label">Last Visit</div>
            <div class="value"><?php echo htmlspecialchars($lastVisit); ?></div>
          </div>
          <div>
            <div class="label">Next Visit</div>
            <div class="value"><?php echo htmlspecialchars($nextVisit); ?></div>
          </div>
        </div>
        <div class="footer-row" style="margin-top:10px;">
          <span>Contact: <span class="highlight"><?php echo htmlspecialchars($contact); ?></span></span>
          <span><?php echo htmlspecialchars($email); ?></span>
        </div>
      </div>
    </div>

    <!-- lower row: PHR detail -->
    <div class="grid" style="margin-top:8px;">
      <div class="card">
        <h3>Conditions & Allergies</h3>
        <div class="sub">A quick glance at ongoing conditions and documented allergies.</div>
        <div class="label">Chronic Conditions</div>
        <div class="pills-row">
          <?php foreach($conditions as $c): ?>
            <span class="pill-green"><?php echo htmlspecialchars($c); ?></span>
          <?php endforeach; ?>
        </div>

        <div class="label" style="margin-top:8px;">Allergies</div>
        <div class="pills-row">
          <?php foreach($allergies as $a): ?>
            <span class="pill-red"><?php echo htmlspecialchars($a); ?></span>
          <?php endforeach; ?>
        </div>

        <div class="label" style="margin-top:10px;">Address</div>
        <div class="value"><?php echo htmlspecialchars($address); ?></div>
      </div>

      <div class="card">
        <h3>Active Medication</h3>
        <div class="sub">Current medicines as per latest prescription.</div>
        <table>
          <thead>
            <tr>
              <th>Medicine</th>
              <th>Dose</th>
              <th>Note</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach($medList as $m): ?>
            <tr>
              <td><?php echo htmlspecialchars($m['name']); ?></td>
              <td><?php echo htmlspecialchars($m['dose']); ?></td>
              <td><?php echo htmlspecialchars($m['note']); ?></td>
            </tr>
          <?php endforeach; ?>
          </tbody>
        </table>
        <div class="hover-note">Move your mouse over the page to see soft glow effects.</div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
