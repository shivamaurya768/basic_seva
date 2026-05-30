<?php
    session_start();
    require_once "db_conn.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" href="logo.png" type="image/x-icon">
<title>Besic Seva  Worker </title>
<link href="https://cdn.jsdelivr.net/npm/remixicon@4.8.0/fonts/remixicon.css" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Noto+Sans:wght@400;500;600&display=swap" rel="stylesheet">
<link rel="styleSheet"  href="style/empStyles.css">
</head>
<body>

<!-- HEADER -->
<header>
  <button class="hamburger" id="hamburgerBtn" aria-label="Open menu">☰</button>
  <div class="logo">
    <div class="logo-icon"><img src="logo.png"></div>
    <span class="logo-text">BESIC SEVA</span>
  </div>
  <div class="spacer"></div>
  <div class="header-actions">
    <?php
      if(isset($_SESSION['username'])){
        echo "<button class='loginBtn'> <a href='logout.php' class='loginBtn'>Logout</a> </button>";
      }
    ?>
    <button class="notif-btn" aria-label="Notifications">
      🔔
      <span class="notif-badge">3</span>
    </button>
    <div class="profile-chip">
      <div class="profile-avatar-placeholder">
         <?php
            if(isset($_SESSION['username'])){
            // Fetch image from database
                $query = $conn->prepare("SELECT image_profile FROM logins WHERE username=?");
                $query->execute([$_SESSION['username']]);
                $result = $query->fetch(PDO::FETCH_ASSOC);
            }
            if(isset($_SESSION['image'])) {
                echo '<img src="uploads/' . $_SESSION['image'] . '" alt="Profile Picture">';
            }elseif(!empty($result['image_profile'])) {
                    echo '<img src="uploads/' . $result['image_profile'] . '" alt="Profile Picture">';
            }
             else {
                echo '<img src="image/profile.jpeg" alt="" >';
            }
        ?>

      </div>
      <div class="profile-info">
        <div class="profile-name">
          <?php
            if(isset($_SESSION['name'])){
              echo $_SESSION['name'];
            }
            else{
              echo "demo xyz";
            }
          ?>
        </div>
        <div class="profile-role">Electrician</div>
      </div>
    </div>
  </div>
</header>

<!-- SIDEBAR OVERLAY -->
<div class="sidebar-overlay" id="sidebarOverlay"></div>

<div class="layout">
  <!-- SIDEBAR -->
  <aside class="sidebar" id="sidebar">
    <nav class="nav-section">
      <a class="nav-item active" id="deshboard" href="#">
      <i class="ri-home-fill"></i> Dashboard
      </a>
      <a class="nav-item" id="addDetails">
        <span class="nav-icon"><i class="ri-file-list-3-fill"></i></span> Add details
        
      </a>
      
      <a class="nav-item" id="myjob">
        <span class="nav-icon" ><i class="ri-shopping-bag-4-fill"></i></span> My Jobs
        <span class="nav-badge">7</span>
      </a>
      <a class="nav-item" id="Earning">
        <span class="nav-icon">💰</span> Earnings
      </a>
      <a class="nav-item" id="attendence">
        <span class="nav-icon">📅</span> Attendance
      </a>
      <a class="nav-item" id="myDocument">
        <span class="nav-icon">📄</span> My Documents
      </a>
      <a class="nav-item" href="#">
        <span class="nav-icon">🧾</span> Payout History
      </a>
    </nav>
    <div class="nav-section">
      <div class="nav-label">Resources</div>
      <a class="nav-item" id="training">
        <span class="nav-icon">🎓</span> Training
      </a>
      <a class="nav-item" id="service_catalog">
        <span class="nav-icon">📋</span> Service Catalog
      </a>
      <a class="nav-item" id="natification">
        <span class="nav-icon">🔔</span> Notifications
        <span class="nav-badge">3</span>
      </a>
    </div>
    <div class="nav-section">
      <div class="nav-label">Support</div>
      <a class="nav-item" href="#">
        <span class="nav-icon">🆘</span> Support
      </a>
      <a class="nav-item" id="referEran">
        <span class="nav-icon">👥</span> Refer &amp; Earn
      </a>
      <a class="nav-item" id="setting">
        <span class="nav-icon">⚙️</span> Settings
      </a>
    </div>
    <button class="go-online-btn">
      <span>⏻</span> Go Online
    </button>
    <div class="online-status">
      <div class="online-dot"></div> You are Online
    </div>
  </aside>

  <!-- MAIN CONTENT -->
  <main class="main">
  <div class="deshboard">
    <!-- HERO CARD -->
    <div class="hero-card">
      <div class="hero-avatar">
        <?php
            if(isset($_SESSION['username'])){
            // Fetch image from database
                $query = $conn->prepare("SELECT image_profile FROM logins WHERE username=?");
                $query->execute([$_SESSION['username']]);
                $result = $query->fetch(PDO::FETCH_ASSOC);
            }
            if(isset($_SESSION['image'])) {
                echo '<img src="uploads/' . $_SESSION['image'] . '" alt="Profile Picture">';
            }elseif(!empty($result['image_profile'])) {
                    echo '<img src="uploads/' . $result['image_profile'] . '" alt="Profile Picture">';
            }
             else {
                echo '<img src="image/profile.jpeg" alt="" >';
            }
        ?></div>
      <div class="hero-info">
        <div class="hero-name">
          <?php
          if(isset($_SESSION['name'])){
              echo $_SESSION['name'];
            }
            else{
              echo "demo xyz";
            }
          ?>
        </div>
        <div class="hero-role">Electrician <span class="star-icon">★</span></div>
        <div class="hero-loc">📍 Lucknow, Uttar Pradesh</div>
      </div>
      <div class="toggle-wrap">
        Online
        <div class="toggle on" id="onlineToggle" title="Toggle Online Status"></div>
      </div>
      <div class="hero-stats">
        <div class="hero-stat">
          <div class="hero-stat-val">12</div>
          <div class="hero-stat-label">Jobs Today</div>
        </div>
        <div class="hero-stat">
          <div class="hero-stat-val">₹4,560</div>
          <div class="hero-stat-label">Today's Earning</div>
        </div>
        <div class="hero-stat">
          <div class="hero-stat-val">98%</div>
          <div class="hero-stat-label">Completion</div>
        </div>
        <div class="hero-stat">
          <div class="hero-stat-val">4.8 ★</div>
          <div class="hero-stat-label">Rating</div>
        </div>
      </div>
    </div>

    <!-- TOP SECTION: Schedule + Performance -->
    <div class="grid-2" style="margin-bottom:20px;">

      <!-- TODAY'S SCHEDULE -->
      <div class="card">
        <div class="card-header">
          <div style="display:flex;align-items:center;gap:6px;">
            <span class="card-title">Today's Schedule</span>
          </div>
          <a class="view-all" href="#">View All</a>
        </div>
        <div class="schedule-item">
          <div class="schedule-icon">🔧</div>
          <div class="schedule-info">
            <div class="schedule-name">Plumber Service</div>
            <div class="schedule-loc">Aliganj, Lucknow</div>
            <div class="schedule-time">🕙 10:00 AM</div>
          </div>
          <span class="status-chip completed">Completed</span>
          <span class="chevron">›</span>
        </div>
        <div class="schedule-item">
          <div class="schedule-icon">⚡</div>
          <div class="schedule-info">
            <div class="schedule-name">Electrical Installation</div>
            <div class="schedule-loc">Hazratganj, Lucknow</div>
            <div class="schedule-time">🕐 01:00 PM</div>
          </div>
          <span class="status-chip upcoming">Upcoming</span>
          <span class="chevron">›</span>
        </div>
        <div class="schedule-item">
          <div class="schedule-icon">🌀</div>
          <div class="schedule-info">
            <div class="schedule-name">Fan Repair</div>
            <div class="schedule-loc">Indira Nagar, Lucknow</div>
            <div class="schedule-time">🕞 03:30 PM</div>
          </div>
          <span class="status-chip upcoming">Upcoming</span>
          <span class="chevron">›</span>
        </div>
      </div>

      <!-- PERFORMANCE OVERVIEW -->
      <div class="card">
        <div class="card-header">
          <span class="card-title">Performance Overview</span>
          <select style="font-size:12px;font-weight:600;color:var(--green-mid);border:none;background:none;cursor:pointer;">
            <option>This Week</option>
            <option>This Month</option>
          </select>
        </div>
        <div class="perf-grid">
          <div class="perf-item">
            <div class="perf-icon green">✅</div>
            <div>
              <div class="perf-val">24</div>
              <div class="perf-label">Jobs Completed</div>
            </div>
          </div>
          <div class="perf-item">
            <div class="perf-icon amber">⏳</div>
            <div>
              <div class="perf-val">2</div>
              <div class="perf-label">Jobs Pending</div>
            </div>
          </div>
          <div class="perf-item">
            <div class="perf-icon purple">⭐</div>
            <div>
              <div class="perf-val">4.8</div>
              <div class="perf-label">Avg. Rating</div>
            </div>
          </div>
          <div class="perf-item">
            <div class="perf-icon blue">📈</div>
            <div>
              <div class="perf-val">96%</div>
              <div class="perf-label">Completion Rate</div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- MAIN SECTION: Job Requests + My Jobs -->
    <div class="grid-main">

      <!-- LEFT COLUMN -->
      <div style="display:flex;flex-direction:column;gap:20px;">

        <!-- NEW JOB REQUESTS -->
        <div class="card">
          <div class="card-header">
            <div style="display:flex;align-items:center;">
              <span class="card-title">New Job Requests</span>
              <span class="card-badge">3</span>
            </div>
            <a class="view-all" href="#">View All</a>
          </div>
          <div class="job-request-card">
            <div class="jrc-top">
              <div class="jrc-icon">❄️</div>
              <div class="jrc-info">
                <div class="jrc-name">AC Repair</div>
                <div class="jrc-loc">Gomti Nagar, Lucknow</div>
                <div class="jrc-dist">📍 2.5 km away</div>
                <div class="jrc-date">📅 24 May 2024 · 11:00 AM</div>
              </div>
              <div style="text-align:right;">
                <div class="jrc-price">₹350</div>
                <div class="jrc-status-wrap"><span class="status-chip pending">Pending</span></div>
              </div>
            </div>
            <div class="jrc-actions">
              <button class="btn btn-outline" onclick="handleReject(this)">Reject</button>
              <button class="btn btn-primary" onclick="handleAccept(this)">Accept</button>
            </div>
          </div>
          <div class="job-request-card">
            <div class="jrc-top">
              <div class="jrc-icon">🔌</div>
              <div class="jrc-info">
                <div class="jrc-name">Wiring Work</div>
                <div class="jrc-loc">Alambagh, Lucknow</div>
                <div class="jrc-dist">📍 4.1 km away</div>
                <div class="jrc-date">📅 24 May 2024 · 02:00 PM</div>
              </div>
              <div style="text-align:right;">
                <div class="jrc-price">₹500</div>
                <div class="jrc-status-wrap"><span class="status-chip pending">Pending</span></div>
              </div>
            </div>
            <div class="jrc-actions">
              <button class="btn btn-outline" onclick="handleReject(this)">Reject</button>
              <button class="btn btn-primary" onclick="handleAccept(this)">Accept</button>
            </div>
          </div>
        </div>

        <!-- MY JOBS -->
        <div class="card">
          <div class="card-header">
            <span class="card-title">My Jobs</span>
            <button class="filter-btn">🔽 Filter</button>
          </div>
          <div class="jobs-tabs">
            <div class="tab active" onclick="filterTab(this,'all')">All (8)</div>
            <div class="tab" onclick="filterTab(this,'completed')">Completed (24)</div>
            <div class="tab" onclick="filterTab(this,'pending')">Pending (3)</div>
            <div class="tab" onclick="filterTab(this,'cancelled')">Cancelled (1)</div>
          </div>
          <div id="jobsList">
            <div class="job-item" data-status="completed">
              <div class="job-icon">🔧</div>
              <div class="job-info">
                <div class="job-name">Plumber Service</div>
                <div class="job-loc">Aliganj, Lucknow</div>
                <div class="job-date">📅 24 May 2024 · 10:00 AM</div>
              </div>
              <div class="job-right">
                <div class="job-amount">₹300</div>
                <span class="status-chip completed">Completed</span>
              </div>
              <span class="chevron">›</span>
            </div>
            <div class="job-item" data-status="upcoming">
              <div class="job-icon">⚡</div>
              <div class="job-info">
                <div class="job-name">Electrical Installation</div>
                <div class="job-loc">Hazratganj, Lucknow</div>
                <div class="job-date">📅 24 May 2024 · 01:00 PM</div>
              </div>
              <div class="job-right">
                <div class="job-amount">₹450</div>
                <span class="status-chip upcoming">Upcoming</span>
              </div>
              <span class="chevron">›</span>
            </div>
            <div class="job-item" data-status="upcoming">
              <div class="job-icon">🌀</div>
              <div class="job-info">
                <div class="job-name">Fan Repair</div>
                <div class="job-loc">Indira Nagar, Lucknow</div>
                <div class="job-date">📅 24 May 2024 · 03:30 PM</div>
              </div>
              <div class="job-right">
                <div class="job-amount">₹250</div>
                <span class="status-chip upcoming">Upcoming</span>
              </div>
              <span class="chevron">›</span>
            </div>
            <div class="job-item" data-status="completed">
              <div class="job-icon">❄️</div>
              <div class="job-info">
                <div class="job-name">AC Repair</div>
                <div class="job-loc">Gomti Nagar, Lucknow</div>
                <div class="job-date">📅 23 May 2024 · 11:30 AM</div>
                <div class="job-rating">★★★★★ <span style="color:var(--ink-3);">5.0</span></div>
              </div>
              <div class="job-right">
                <div class="job-amount">₹350</div>
                <span class="status-chip completed">Completed</span>
              </div>
              <span class="chevron">›</span>
            </div>
          </div>
        </div>
      </div>

      <!-- RIGHT COLUMN -->
      <div style="display:flex;flex-direction:column;gap:20px;">

        <!-- EARNINGS SUMMARY -->
        <div class="card">
          <div class="earn-top">
            <span class="earn-title">Earnings Summary</span>
            <select class="period-select">
              <option>This Week ▾</option>
              <option>This Month</option>
            </select>
          </div>
          <div class="earn-stats">
            <div class="earn-stat">
              <div class="earn-val">₹12,450</div>
              <div class="earn-label">Total Earnings</div>
            </div>
            <div class="earn-divider"></div>
            <div class="earn-stat">
              <div class="earn-val">₹2,350</div>
              <div class="earn-label">Received</div>
            </div>
            <div class="earn-divider"></div>
            <div class="earn-stat">
              <div class="earn-val">₹10,100</div>
              <div class="earn-label">Pending</div>
            </div>
          </div>
          <div class="earn-bar-wrap">
            <div class="earn-bar-label">
              <span>Received</span><span>Pending</span>
            </div>
            <div class="earn-bar-bg">
              <div class="earn-bar-fill" style="width:19%"></div>
            </div>
          </div>
          <button class="withdraw-btn">💳 Withdraw Earnings</button>
        </div>

        <!-- TOOLS & RESOURCES -->
        <div class="card">
          <div class="card-header">
            <span class="card-title">Tools &amp; Resources</span>
          </div>
          <div class="tools-grid">
            <div class="tool-item">
              <div class="tool-icon-wrap" style="background:#e8f5ee;">✅</div>
              <div class="tool-label">Attendance</div>
            </div>
            <div class="tool-item">
              <div class="tool-icon-wrap" style="background:#eff6ff;">📄</div>
              <div class="tool-label">My Documents</div>
            </div>
            <div class="tool-item">
              <div class="tool-icon-wrap" style="background:#fff8ec;">💸</div>
              <div class="tool-label">Payout History</div>
            </div>
            <div class="tool-item">
              <div class="tool-icon-wrap" style="background:#f3f0ff;">🎓</div>
              <div class="tool-label">Training</div>
            </div>
            <div class="tool-item">
              <div class="tool-icon-wrap" style="background:#fef9c3;">📋</div>
              <div class="tool-label">Service Catalog</div>
            </div>
            <div class="tool-item">
              <div class="tool-icon-wrap" style="background:#fee2e2;">🔔</div>
              <div class="tool-label">Notifications</div>
            </div>
          </div>
        </div>

      </div>
    </div>
</div>
<div class="add_details">
   <?php include "employeeTab/Employee_form.php"; ?>
</div>
<div class="Myjob">
    <?php include "employeeTab/Myjob.php"; ?>
</div>
<div class="earning">
    <?php include "employeeTab/Earning.php"; ?>
</div>
<div class="attendence">
    <?php include "employeeTab/attendence.php"; ?>
</div>
<div class="myDocument">
    <?php include "employeeTab/mydocument.php";?>
</div>
<div class="traning">
    <?php include "employeeTab/training.php";?>
</div>
<div class="service_catalog">
    <?php include "employeeTab/service_catalog.php";?>
</div>
<div class="natification">
    <?php include "employeeTab/notification.php";?>
</div>
<div class="referEran">
    <?php include "employeeTab/Refer_and_earn.php";?>
</div>
<div class="setting">
    <?php include "employeeTab/setting.php";?>
</div>
  </main>




</div>
</div>

<!-- FOOTER -->
<footer>
        <div class="footer-content" id="contact">
            <h3>Content As</h3>
           <div>
             <p>Your trusted partner for reliable and affordable services.</p>
            <ul class="socials">
                <li><a href="https://www.instagram.com/shivammaurya768?utm_source=qr&igsh=Zmo3NWM3enJ4b2xp"> Instagram <i class="ri-instagram-line"></i> </a></li>
                <li><a href="https://www.facebook.com/share/p/1ApnPHD2gL/"> Facebook  <i class="ri-facebook-line"></i>  </a></li>
                <li><a href="#">Twitter    <i class="ri-twitter-line"></i>   </a></li>
                <li><a href="https://www.linkedin.com/in/shivam-maurya-10508036b?utm_source=share_via&utm_content=profile&utm_medium=member_android">Linkedin   <i class="ri-linkedin-line"></i>  </a></li>
                <li><a href="https://github.com/shivamaurya768">Github <i class="ri-github-line">  </i>  </a> </li>
            </ul>
           </div>    
        </div>
        <div class="footer-bottom">
            <p> Developer Shivam Maurya | Designer Shivam Maurya | &copy; 2026 Basic Seve. All rights reserved.</p>
        </div>
    </footer>

<script src="script/empScript.js"></script>
</body>
</html>