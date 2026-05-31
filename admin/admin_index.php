<?php
    session_start();
    require_once "../db_conn.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Besic Seva — Admin Panel</title>
<link href="https://fonts.googleapis.com/css2?family=Sora:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<style>
    <?php include 'style.css'; ?>
</style>
</head>
<body>

<!-- Sidebar Overlay -->
<div class="sidebar-overlay" id="overlay" onclick="toggleSidebar()"></div>

<div class="layout">
  <!-- ─── SIDEBAR ─── -->
  <aside class="sidebar" id="sidebar">
    <a href="#" class="sidebar-logo">
      <div class="logo-icon"><img src="../logo.png" alt="logo"></div>
      <div class="logo-text">
        <div class="logo-name">Besic Seva</div>
        <div class="logo-sub">Admin Panel</div>
      </div>
    </a>

    <div class="sidebar-section">
      <div class="sidebar-section-label">Manage</div>
      <a href="#" class="nav-item"><i class="fas fa-gauge-high"></i> Dashboard</a>
      <a href="#" class="nav-item active"><i class="fas fa-users"></i> Users <span class="nav-badge green">12.8k</span></a>
      <a href="#" class="nav-item"><i class="fas fa-user-tie"></i> Employees</a>
      <a href="#" class="nav-item"><i class="fas fa-briefcase"></i> Services</a>
      <a href="#" class="nav-item"><i class="fas fa-calendar-check"></i> Bookings <span class="nav-badge">3</span></a>
      <a href="#" class="nav-item"><i class="fas fa-tags"></i> Categories</a>
      <a href="#" class="nav-item"><i class="fas fa-star"></i> Testimonials</a>
    </div>

    <div class="sidebar-section">
      <div class="sidebar-section-label">Finance</div>
      <a href="#" class="nav-item"><i class="fas fa-credit-card"></i> Payments</a>
      <a href="#" class="nav-item"><i class="fas fa-chart-line"></i> Earnings</a>
      <a href="#" class="nav-item"><i class="fas fa-money-bill-transfer"></i> Payouts</a>
      <a href="#" class="nav-item"><i class="fas fa-receipt"></i> Transactions</a>
    </div>

    <div class="sidebar-section">
      <div class="sidebar-section-label">Content</div>
      <a href="#" class="nav-item"><i class="fas fa-image"></i> Banners</a>
      <a href="#" class="nav-item"><i class="fas fa-bell"></i> Notifications</a>
      <a href="#" class="nav-item"><i class="fas fa-circle-question"></i> FAQs</a>
      <a href="#" class="nav-item"><i class="fas fa-file-lines"></i> Pages</a>
    </div>

    <div class="sidebar-section">
      <div class="sidebar-section-label">Settings</div>
      <a href="#" class="nav-item"><i class="fas fa-gear"></i> Settings</a>
      <a href="#" class="nav-item"><i class="fas fa-shield-halved"></i> Roles & Permissions</a>
      <a href="#" class="nav-item"><i class="fas fa-terminal"></i> System Logs</a>
      <a href="#" class="nav-item"><i class="fas fa-headset"></i> Support Tickets <span class="nav-badge">5</span></a>
    </div>

    <div class="sidebar-bottom">
      <a href="#" class="nav-item"><i class="fas fa-arrow-up-right-from-square"></i> View Website</a>
      <a href="#" class="nav-item logout"><i class="fas fa-right-from-bracket"></i> Logout</a>
    </div>
  </aside>

  <!-- ─── MAIN ─── -->
  <div class="main">
    <!-- TOPBAR -->
    <header class="topbar">
      <button class="topbar-menu-btn" onclick="toggleSidebar()"><i class="fas fa-bars"></i></button>
      <div class="search-bar">
        <i class="fas fa-magnifying-glass"></i>
        <input type="text" placeholder="Search anything...">
        <span class="search-shortcut">Ctrl + /</span>
      </div>
      <div class="topbar-actions">
        <div class="icon-btn tooltip-wrap">
          <i class="fas fa-bell"></i>
          <span class="badge">6</span>
          <div class="tooltip">6 notifications</div>
        </div>
        <div class="icon-btn tooltip-wrap">
          <i class="fas fa-envelope"></i>
          <span class="badge blue">2</span>
          <div class="tooltip">2 messages</div>
        </div>
        <div class="icon-btn tooltip-wrap" style="display:none" id="fullscreenBtn" onclick="toggleFullscreen()">
          <i class="fas fa-expand" id="fullscreenIcon"></i>
          <div class="tooltip">Fullscreen</div>
        </div>
        <div class="admin-chip">
          <div class="admin-avatar">
            if(!empty($_SESSION['image'])) {

              echo '<img src="uploads/' . $_SESSION['image'] . '" alt="Profile Picture">';

// Then check database image
        } elseif(!empty($result['image_profile'])) {

             echo '<img src="uploads/' . $result['image_profile'] . '" alt="Profile Picture">';

// Default image
      } else {

    echo '<img src="image/profile.jpeg" alt="Default Profile">';

}
?>
          </div>
          <div class="admin-info">
            <div class="admin-name">Admin</div>
            <div class="admin-role">Super Admin</div>
          </div>
          <i class="fas fa-chevron-down" style="font-size:10px;color:var(--text-muted);margin-left:4px;"></i>
        </div>
      </div>
    </header>

    <!-- CONTENT -->
    <div class="content">

      <!-- Page Header -->
      <div class="page-header">
        <div>
          <div class="page-title">Welcome back, Admin! 👋</div>
          <div class="page-subtitle">Here's what's happening with your platform today.</div>
        </div>
        <button class="period-select">
          <i class="fas fa-calendar"></i> This Month <i class="fas fa-chevron-down" style="font-size:10px"></i>
        </button>
      </div>

      <!-- Stats Grid -->
      <div class="stats-grid">
        <div class="stat-card blue">
          <div class="stat-top">
            <span class="stat-label">Total Users</span>
            <div class="stat-icon blue"><i class="fas fa-users"></i></div>
          </div>
          <div class="stat-value">12,845</div>
          <div><span class="stat-change up"><i class="fas fa-arrow-up"></i> 12.5%</span></div>
          <div class="stat-vs">vs last month</div>
        </div>
        <div class="stat-card green">
          <div class="stat-top">
            <span class="stat-label">Total Employees</span>
            <div class="stat-icon green"><i class="fas fa-user-tie"></i></div>
          </div>
          <div class="stat-value">2,453</div>
          <div><span class="stat-change up"><i class="fas fa-arrow-up"></i> 8.3%</span></div>
          <div class="stat-vs">vs last month</div>
        </div>
        <div class="stat-card amber">
          <div class="stat-top">
            <span class="stat-label">Total Bookings</span>
            <div class="stat-icon amber"><i class="fas fa-calendar-check"></i></div>
          </div>
          <div class="stat-value">8,946</div>
          <div><span class="stat-change up"><i class="fas fa-arrow-up"></i> 15.7%</span></div>
          <div class="stat-vs">vs last month</div>
        </div>
        <div class="stat-card purple">
          <div class="stat-top">
            <span class="stat-label">Total Revenue</span>
            <div class="stat-icon purple"><i class="fas fa-indian-rupee-sign"></i></div>
          </div>
          <div class="stat-value mono">₹12,45,780</div>
          <div><span class="stat-change up"><i class="fas fa-arrow-up"></i> 18.2%</span></div>
          <div class="stat-vs">vs last month</div>
        </div>
      </div>

      <!-- Bookings Overview + Bookings by Status -->
      <div class="grid-2">
        <div class="card">
          <div class="card-header">
            <span class="card-title">Bookings Overview</span>
            <div style="display:flex;align-items:center;gap:10px;">
              <select style="background:var(--bg-hover);border:1px solid var(--border);color:var(--text-secondary);font-family:var(--font);font-size:12px;padding:5px 10px;border-radius:7px;cursor:pointer;outline:none;">
                <option>This Month</option>
                <option>Last Month</option>
                <option>Last 3 Months</option>
              </select>
            </div>
          </div>
          <div class="chart-legend" style="padding:14px 20px 0;">
            <span class="legend-item"><span class="legend-dot" style="background:var(--accent)"></span>Bookings</span>
            <span class="legend-item"><span class="legend-dot" style="background:var(--accent2)"></span>Completed</span>
          </div>
          <div class="chart-wrap">
            <svg viewBox="0 0 540 180" width="100%" height="180" xmlns="http://www.w3.org/2000/svg">
              <defs>
                <linearGradient id="gBlue" x1="0" y1="0" x2="0" y2="1">
                  <stop offset="0%" stop-color="#3b82f6" stop-opacity=".25"/>
                  <stop offset="100%" stop-color="#3b82f6" stop-opacity="0"/>
                </linearGradient>
                <linearGradient id="gGreen" x1="0" y1="0" x2="0" y2="1">
                  <stop offset="0%" stop-color="#06d6a0" stop-opacity=".2"/>
                  <stop offset="100%" stop-color="#06d6a0" stop-opacity="0"/>
                </linearGradient>
              </defs>
              <!-- Grid lines -->
              <line x1="40" y1="20" x2="530" y2="20" stroke="#1e2d4a" stroke-width="1"/>
              <line x1="40" y1="55" x2="530" y2="55" stroke="#1e2d4a" stroke-width="1"/>
              <line x1="40" y1="90" x2="530" y2="90" stroke="#1e2d4a" stroke-width="1"/>
              <line x1="40" y1="125" x2="530" y2="125" stroke="#1e2d4a" stroke-width="1"/>
              <line x1="40" y1="160" x2="530" y2="160" stroke="#1e2d4a" stroke-width="1"/>
              <!-- Y labels -->
              <text x="32" y="23" text-anchor="end">1K</text>
              <text x="32" y="58" text-anchor="end">800</text>
              <text x="32" y="93" text-anchor="end">600</text>
              <text x="32" y="128" text-anchor="end">400</text>
              <text x="32" y="163" text-anchor="end">200</text>
              <!-- Area Blue -->
              <path d="M40,90 C70,75 90,60 130,50 C160,42 180,65 210,55 C240,45 260,30 290,40 C320,50 340,35 370,28 C400,21 420,50 450,45 C480,40 510,50 530,45 L530,160 L40,160 Z" fill="url(#gBlue)"/>
              <!-- Line Blue -->
              <path d="M40,90 C70,75 90,60 130,50 C160,42 180,65 210,55 C240,45 260,30 290,40 C320,50 340,35 370,28 C400,21 420,50 450,45 C480,40 510,50 530,45" fill="none" stroke="#3b82f6" stroke-width="2.5" stroke-linecap="round"/>
              <!-- Area Green -->
              <path d="M40,130 C70,120 90,110 130,105 C160,100 180,115 210,108 C240,100 260,90 290,95 C320,100 340,88 370,82 C400,76 420,95 450,90 C480,85 510,95 530,88 L530,160 L40,160 Z" fill="url(#gGreen)"/>
              <!-- Line Green -->
              <path d="M40,130 C70,120 90,110 130,105 C160,100 180,115 210,108 C240,100 260,90 290,95 C320,100 340,88 370,82 C400,76 420,95 450,90 C480,85 510,95 530,88" fill="none" stroke="#06d6a0" stroke-width="2.5" stroke-linecap="round"/>
              <!-- X labels -->
              <text x="40" y="175" text-anchor="middle">1 May</text>
              <text x="150" y="175" text-anchor="middle">8 May</text>
              <text x="260" y="175" text-anchor="middle">15 May</text>
              <text x="380" y="175" text-anchor="middle">22 May</text>
              <text x="490" y="175" text-anchor="middle">31 May</text>
            </svg>
          </div>
        </div>

        <div class="card">
          <div class="card-header">
            <span class="card-title">Bookings by Status</span>
          </div>
          <div class="donut-wrap">
            <div class="donut-chart">
              <svg viewBox="0 0 120 120" width="140" height="140" xmlns="http://www.w3.org/2000/svg">
                <!-- Completed 63% -->
                <circle cx="60" cy="60" r="48" fill="none" stroke="#06d6a0" stroke-width="14"
                  stroke-dasharray="188 301" stroke-dashoffset="0"/>
                <!-- Pending 24% -->
                <circle cx="60" cy="60" r="48" fill="none" stroke="#f59e0b" stroke-width="14"
                  stroke-dasharray="72 301" stroke-dashoffset="-188"/>
                <!-- Cancelled 9% -->
                <circle cx="60" cy="60" r="48" fill="none" stroke="#ef4444" stroke-width="14"
                  stroke-dasharray="27 301" stroke-dashoffset="-260"/>
                <!-- In Progress 4% -->
                <circle cx="60" cy="60" r="48" fill="none" stroke="#3b82f6" stroke-width="14"
                  stroke-dasharray="12 301" stroke-dashoffset="-287"/>
              </svg>
              <div class="donut-center">
                <div class="donut-center-val">8,946</div>
                <div class="donut-center-sub">Total</div>
              </div>
            </div>
            <div class="donut-legend">
              <div class="donut-legend-item">
                <div class="donut-legend-left"><div class="donut-legend-dot" style="background:#06d6a0"></div>Completed</div>
                <div style="display:flex;gap:12px;align-items:center;">
                  <span style="font-size:11px;color:var(--text-muted);">5,689</span>
                  <span class="donut-legend-pct">63%</span>
                </div>
              </div>
              <div class="donut-legend-item">
                <div class="donut-legend-left"><div class="donut-legend-dot" style="background:#f59e0b"></div>Pending</div>
                <div style="display:flex;gap:12px;align-items:center;">
                  <span style="font-size:11px;color:var(--text-muted);">2,145</span>
                  <span class="donut-legend-pct">24%</span>
                </div>
              </div>
              <div class="donut-legend-item">
                <div class="donut-legend-left"><div class="donut-legend-dot" style="background:#ef4444"></div>Cancelled</div>
                <div style="display:flex;gap:12px;align-items:center;">
                  <span style="font-size:11px;color:var(--text-muted);">856</span>
                  <span class="donut-legend-pct">9%</span>
                </div>
              </div>
              <div class="donut-legend-item">
                <div class="donut-legend-left"><div class="donut-legend-dot" style="background:#3b82f6"></div>In Progress</div>
                <div style="display:flex;gap:12px;align-items:center;">
                  <span style="font-size:11px;color:var(--text-muted);">256</span>
                  <span class="donut-legend-pct">4%</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Popular Services + Top Services + Recent Bookings -->
      <div style="margin-bottom:20px;">
        <div class="card">
          <div class="card-header">
            <span class="card-title">Popular Services</span>
            <a href="#" class="view-all">View All</a>
          </div>
          <div class="card-body" style="padding-top:12px;">
            <table class="data-table">
              <thead>
                <tr>
                  <th>Service Name</th>
                  <th>Bookings</th>
                  <th>Employees</th>
                  <th>Revenue</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><div class="svc-name"><div class="svc-icon blue"><i class="fas fa-snowflake"></i></div>AC Repair</div></td>
                  <td>1,245</td>
                  <td>356</td>
                  <td><span class="revenue-val">₹2,45,000</span></td>
                  <td><button class="action-btn"><i class="fas fa-ellipsis"></i></button></td>
                </tr>
                <tr>
                  <td><div class="svc-name"><div class="svc-icon amber"><i class="fas fa-wrench"></i></div>Plumber</div></td>
                  <td>1,102</td>
                  <td>289</td>
                  <td><span class="revenue-val">₹1,85,500</span></td>
                  <td><button class="action-btn"><i class="fas fa-ellipsis"></i></button></td>
                </tr>
                <tr>
                  <td><div class="svc-name"><div class="svc-icon purple"><i class="fas fa-bolt"></i></div>Electrician</div></td>
                  <td>980</td>
                  <td>312</td>
                  <td><span class="revenue-val">₹1,65,200</span></td>
                  <td><button class="action-btn"><i class="fas fa-ellipsis"></i></button></td>
                </tr>
                <tr>
                  <td><div class="svc-name"><div class="svc-icon green"><i class="fas fa-car"></i></div>Car Repair</div></td>
                  <td>875</td>
                  <td>265</td>
                  <td><span class="revenue-val">₹1,45,700</span></td>
                  <td><button class="action-btn"><i class="fas fa-ellipsis"></i></button></td>
                </tr>
                <tr>
                  <td><div class="svc-name"><div class="svc-icon red"><i class="fas fa-paint-roller"></i></div>Painter</div></td>
                  <td>645</td>
                  <td>198</td>
                  <td><span class="revenue-val">₹98,400</span></td>
                  <td><button class="action-btn"><i class="fas fa-ellipsis"></i></button></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- Top Services + Recent Bookings + Activity -->
      <div class="grid-3">
        <div class="card">
          <div class="card-header">
            <span class="card-title">Top Services</span>
            <a href="#" class="view-all">View All</a>
          </div>
          <div class="card-body" style="padding-top:8px;">
            <div class="services-list">
              <div class="service-row">
                <div class="service-row-left">
                  <div class="service-row-rank">1</div>
                  <div class="svc-icon blue" style="width:26px;height:26px;font-size:11px;"><i class="fas fa-snowflake"></i></div>
                  <div class="service-row-name">AC Repair</div>
                </div>
                <div class="service-row-count">1,245</div>
              </div>
              <div class="service-row">
                <div class="service-row-left">
                  <div class="service-row-rank">2</div>
                  <div class="svc-icon amber" style="width:26px;height:26px;font-size:11px;"><i class="fas fa-wrench"></i></div>
                  <div class="service-row-name">Plumber</div>
                </div>
                <div class="service-row-count">1,102</div>
              </div>
              <div class="service-row">
                <div class="service-row-left">
                  <div class="service-row-rank">3</div>
                  <div class="svc-icon purple" style="width:26px;height:26px;font-size:11px;"><i class="fas fa-bolt"></i></div>
                  <div class="service-row-name">Electrician</div>
                </div>
                <div class="service-row-count">980</div>
              </div>
              <div class="service-row">
                <div class="service-row-left">
                  <div class="service-row-rank">4</div>
                  <div class="svc-icon green" style="width:26px;height:26px;font-size:11px;"><i class="fas fa-car"></i></div>
                  <div class="service-row-name">Car Repair</div>
                </div>
                <div class="service-row-count">875</div>
              </div>
              <div class="service-row">
                <div class="service-row-left">
                  <div class="service-row-rank">5</div>
                  <div class="svc-icon red" style="width:26px;height:26px;font-size:11px;"><i class="fas fa-broom"></i></div>
                  <div class="service-row-name">Home Cleaning</div>
                </div>
                <div class="service-row-count">645</div>
              </div>
            </div>
          </div>
        </div>

        <div class="card">
          <div class="card-header">
            <span class="card-title">Recent Bookings</span>
            <a href="#" class="view-all">View All</a>
          </div>
          <div class="card-body" style="padding-top:8px;">
            <div class="bookings-list">
              <div class="booking-row">
                <div class="booking-avatar" style="background:linear-gradient(135deg,#3b82f6,#6366f1)">A</div>
                <div class="booking-info">
                  <div class="booking-svc">AC Repair</div>
                  <div class="booking-id">#BK12345</div>
                </div>
                <span class="badge-pill completed">Completed</span>
              </div>
              <div class="booking-row">
                <div class="booking-avatar" style="background:linear-gradient(135deg,#f59e0b,#f97316)">P</div>
                <div class="booking-info">
                  <div class="booking-svc">Plumber Service</div>
                  <div class="booking-id">#BK12346</div>
                </div>
                <span class="badge-pill pending">Pending</span>
              </div>
              <div class="booking-row">
                <div class="booking-avatar" style="background:linear-gradient(135deg,#a855f7,#ec4899)">E</div>
                <div class="booking-info">
                  <div class="booking-svc">Electrical Work</div>
                  <div class="booking-id">#BK12347</div>
                </div>
                <span class="badge-pill inprogress">In Progress</span>
              </div>
              <div class="booking-row">
                <div class="booking-avatar" style="background:linear-gradient(135deg,#06d6a0,#0ea5e9)">C</div>
                <div class="booking-info">
                  <div class="booking-svc">Car Repair</div>
                  <div class="booking-id">#BK12348</div>
                </div>
                <span class="badge-pill completed">Completed</span>
              </div>
              <div class="booking-row">
                <div class="booking-avatar" style="background:linear-gradient(135deg,#ef4444,#f97316)">H</div>
                <div class="booking-info">
                  <div class="booking-svc">Home Cleaning</div>
                  <div class="booking-id">#BK12349</div>
                </div>
                <span class="badge-pill pending">Pending</span>
              </div>
            </div>
          </div>
        </div>

        <div class="card">
          <div class="card-header">
            <span class="card-title">Recent Activity</span>
            <a href="#" class="view-all">View All</a>
          </div>
          <div class="card-body" style="padding-top:8px;">
            <div class="activity-list">
              <div class="activity-item">
                <div class="activity-icon" style="background:rgba(59,130,246,.15);color:var(--accent)"><i class="fas fa-calendar-plus"></i></div>
                <div class="activity-content">
                  <div class="activity-text"><strong style="color:var(--text-primary)">New booking</strong> received</div>
                  <div class="activity-sub">AC Repair · #BK12350</div>
                </div>
                <div class="activity-time">2m</div>
              </div>
              <div class="activity-item">
                <div class="activity-icon" style="background:rgba(6,214,160,.15);color:var(--accent2)"><i class="fas fa-indian-rupee-sign"></i></div>
                <div class="activity-content">
                  <div class="activity-text"><strong style="color:var(--text-primary)">Payment received</strong></div>
                  <div class="activity-sub">Booking #BK12345</div>
                </div>
                <div class="activity-time">15m</div>
              </div>
              <div class="activity-item">
                <div class="activity-icon" style="background:rgba(168,85,247,.15);color:var(--accent5)"><i class="fas fa-user-plus"></i></div>
                <div class="activity-content">
                  <div class="activity-text"><strong style="color:var(--text-primary)">New employee</strong> registered</div>
                  <div class="activity-sub">Rahul Kumar</div>
                </div>
                <div class="activity-time">1h</div>
              </div>
              <div class="activity-item">
                <div class="activity-icon" style="background:rgba(245,158,11,.15);color:var(--accent3)"><i class="fas fa-pen-to-square"></i></div>
                <div class="activity-content">
                  <div class="activity-text"><strong style="color:var(--text-primary)">Service updated</strong></div>
                  <div class="activity-sub">Plumber Service</div>
                </div>
                <div class="activity-time">3h</div>
              </div>
              <div class="activity-item">
                <div class="activity-icon" style="background:rgba(59,130,246,.15);color:var(--accent)"><i class="fas fa-user"></i></div>
                <div class="activity-content">
                  <div class="activity-text"><strong style="color:var(--text-primary)">New user</strong> registered</div>
                  <div class="activity-sub">Priya Sharma</div>
                </div>
                <div class="activity-time">5h</div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Users Overview + Employees Overview -->
      <div class="grid-2-equal" style="margin-bottom:20px;">
        <div class="overview-card">
          <div class="overview-card-header">
            <div class="overview-card-title">Users Overview</div>
            <a href="#" class="view-all">View All</a>
          </div>
          <div class="overview-metrics">
            <div class="overview-metric">
              <div class="overview-metric-label">Total Users</div>
              <div class="overview-metric-val">12,845</div>
            </div>
            <div class="overview-metric">
              <div class="overview-metric-label">Active Users</div>
              <div class="overview-metric-val">9,256</div>
              <div class="overview-metric-change up">↑ 10.2%</div>
            </div>
            <div class="overview-metric">
              <div class="overview-metric-label">New Users</div>
              <div class="overview-metric-val">1,245</div>
              <div class="overview-metric-change up">↑ 12.4%</div>
            </div>
          </div>
          <div>
            <div style="display:flex;justify-content:space-between;font-size:11px;color:var(--text-muted);margin-bottom:5px;">
              <span>Active Users</span><span style="color:var(--accent2)">72%</span>
            </div>
            <div class="progress-bar">
              <div class="progress-fill" style="width:72%;background:linear-gradient(90deg,var(--accent),var(--accent2))"></div>
            </div>
          </div>
        </div>

        <div class="overview-card">
          <div class="overview-card-header">
            <div class="overview-card-title">Employees Overview</div>
            <a href="#" class="view-all">View All</a>
          </div>
          <div class="overview-metrics">
            <div class="overview-metric">
              <div class="overview-metric-label">Total Employees</div>
              <div class="overview-metric-val">2,453</div>
            </div>
            <div class="overview-metric">
              <div class="overview-metric-label">Active</div>
              <div class="overview-metric-val">2,150</div>
              <div class="overview-metric-change up">↑ 8.7%</div>
            </div>
            <div class="overview-metric">
              <div class="overview-metric-label">On Leave</div>
              <div class="overview-metric-val">303</div>
              <div class="overview-metric-change down">↑ 2.1%</div>
            </div>
          </div>
          <div>
            <div style="display:flex;justify-content:space-between;font-size:11px;color:var(--text-muted);margin-bottom:5px;">
              <span>Active Employees</span><span style="color:var(--accent2)">87%</span>
            </div>
            <div class="progress-bar">
              <div class="progress-fill" style="width:87%;background:linear-gradient(90deg,var(--accent5),var(--accent))"></div>
            </div>
          </div>
        </div>
      </div>

      <!-- Revenue Overview + Payments Overview -->
      <div class="grid-2-equal">
        <div class="overview-card">
          <div class="overview-card-header">
            <div class="overview-card-title">Revenue Overview</div>
            <select style="background:var(--bg-hover);border:1px solid var(--border);color:var(--text-secondary);font-family:var(--font);font-size:11px;padding:4px 8px;border-radius:6px;cursor:pointer;outline:none;">
              <option>This Month</option><option>Last Month</option>
            </select>
          </div>
          <div class="overview-metrics">
            <div class="overview-metric">
              <div class="overview-metric-label">Total Revenue</div>
              <div class="overview-metric-val" style="font-family:var(--mono)">₹12,45,780</div>
              <div class="overview-metric-change up">↑ 18.2% vs last month</div>
            </div>
          </div>
          <svg viewBox="0 0 300 60" width="100%" height="60" xmlns="http://www.w3.org/2000/svg">
            <defs>
              <linearGradient id="revGrad" x1="0" y1="0" x2="0" y2="1">
                <stop offset="0%" stop-color="#3b82f6" stop-opacity=".3"/>
                <stop offset="100%" stop-color="#3b82f6" stop-opacity="0"/>
              </linearGradient>
            </defs>
            <path d="M0,45 C30,40 50,30 80,25 C110,20 130,35 160,28 C190,21 210,15 240,18 C270,21 285,14 300,12 L300,60 L0,60 Z" fill="url(#revGrad)"/>
            <path d="M0,45 C30,40 50,30 80,25 C110,20 130,35 160,28 C190,21 210,15 240,18 C270,21 285,14 300,12" fill="none" stroke="#3b82f6" stroke-width="2.5" stroke-linecap="round"/>
          </svg>
        </div>

        <div class="overview-card">
          <div class="overview-card-header">
            <div class="overview-card-title">Payments Overview</div>
            <select style="background:var(--bg-hover);border:1px solid var(--border);color:var(--text-secondary);font-family:var(--font);font-size:11px;padding:4px 8px;border-radius:6px;cursor:pointer;outline:none;">
              <option>This Month</option><option>Last Month</option>
            </select>
          </div>
          <div class="overview-metrics">
            <div class="overview-metric">
              <div class="overview-metric-label">Total Payments</div>
              <div class="overview-metric-val" style="font-family:var(--mono)">₹11,85,400</div>
            </div>
          </div>
          <div style="display:flex;gap:20px;margin-top:4px;">
            <div>
              <div style="font-size:11px;color:var(--text-muted)">Paid</div>
              <div style="font-family:var(--mono);font-size:15px;font-weight:700;color:var(--accent2)">₹10,75,600</div>
            </div>
            <div>
              <div style="font-size:11px;color:var(--text-muted)">Pending</div>
              <div style="font-family:var(--mono);font-size:15px;font-weight:700;color:var(--accent3)">₹1,09,800</div>
            </div>
          </div>
          <div class="progress-bar" style="margin-top:12px;">
            <div class="progress-fill" style="width:90.8%;background:linear-gradient(90deg,var(--accent2),#0ea5e9)"></div>
          </div>
          <div class="progress-label">
            <span>Paid 90.8%</span><span>Pending 9.2%</span>
          </div>
        </div>
      </div>

    </div><!-- /content -->

    <footer class="footer">
      <span>© 2024 Besic Seva. All rights reserved.</span>
      <span class="footer-version">Version 1.0.0</span>
    </footer>
  </div><!-- /main -->
</div><!-- /layout -->

<script src="script.js"></script>
</body>
</html>