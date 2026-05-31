<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>Basic Seva Admin | Users Management (Standalone)</title>
    <!-- Font Awesome 6 (Free Icons) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Google Fonts: Inter for modern, readable UI -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #000000;   /* pure black background as required */
            font-family: 'Inter', sans-serif;
            color: #eef2ff;
            overflow-x: hidden;
        }

        /* No sidebar — full width user panel */
        .users-full-container {
            max-width: 1600px;
            margin: 0 auto;
            padding: 28px 32px;
            width: 100%;
        }

        /* Header welcome row */
        .welcome-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: 32px;
            background: #0c0c0c;
            padding: 20px 28px;
            border-radius: 32px;
            border: 1px solid #1f1f2a;
            box-shadow: 0 8px 20px rgba(0,0,0,0.3);
        }

        .welcome-header h1 {
            font-size: 1.9rem;
            font-weight: 700;
            background: linear-gradient(to right, #ffffff, #a5b4fc);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            letter-spacing: -0.3px;
        }

        .badge-admin {
            background: #1e1f2c;
            padding: 8px 22px;
            border-radius: 60px;
            font-size: 0.85rem;
            font-weight: 500;
            border: 1px solid #334155;
            backdrop-filter: blur(4px);
        }
        .badge-admin i {
            margin-right: 8px;
            color: #3b82f6;
        }

        /* stats grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 24px;
            margin-bottom: 42px;
        }

        .stat-card {
            background: #0c0f15;
            border-radius: 28px;
            padding: 22px 24px;
            border: 1px solid #232530;
            transition: transform 0.1s ease, box-shadow 0.2s;
            box-shadow: 0 6px 14px rgba(0, 0, 0, 0.5);
        }

        .stat-card:hover {
            background: #11141e;
            border-color: #2d3a5e;
        }

        .stat-title {
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #9ca3af;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .stat-number {
            font-size: 2.6rem;
            font-weight: 800;
            color: white;
            line-height: 1.1;
        }

        .stat-trend {
            font-size: 0.75rem;
            margin-top: 14px;
            color: #6ee7b7;
            background: #0f231f;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 4px 12px;
            border-radius: 40px;
        }

        /* section card style */
        .section-card {
            background: #0a0a0e;
            border-radius: 32px;
            padding: 28px 30px;
            margin-bottom: 38px;
            border: 1px solid #20222e;
            transition: all 0.2s;
        }

        .section-title {
            font-size: 1.55rem;
            font-weight: 600;
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            gap: 14px;
            border-left: 5px solid #3b82f6;
            padding-left: 20px;
        }

        /* users table (secure & detailed) */
        .users-table-wrapper {
            overflow-x: auto;
            border-radius: 24px;
        }

        .users-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.9rem;
        }

        .users-table th {
            text-align: left;
            padding: 18px 14px;
            background: #11161f;
            color: #cbd5e6;
            font-weight: 600;
            font-size: 0.85rem;
        }

        .users-table td {
            padding: 16px 14px;
            border-bottom: 1px solid #222530;
            color: #e2e8f0;
        }

        .users-table tr:hover td {
            background: #131822;
        }

        .badge-status {
            background: #1f3a2f;
            color: #a3e9c4;
            padding: 5px 12px;
            border-radius: 40px;
            font-size: 0.75rem;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            width: fit-content;
        }

        .badge-inactive {
            background: #3a2c2a;
            color: #fda4af;
        }

        .badge-pending {
            background: #3e3a1f;
            color: #fde047;
        }

        .action-icons i {
            margin: 0 6px;
            cursor: pointer;
            background: #1e2432;
            padding: 6px;
            border-radius: 40px;
            transition: 0.15s;
            font-size: 0.85rem;
        }

        .action-icons i:hover {
            background: #2d374f;
            color: white;
            transform: scale(1.02);
        }

        /* Employee overview flex */
        .employee-flex {
            display: flex;
            flex-wrap: wrap;
            gap: 24px;
            margin-top: 8px;
        }

        .employee-card {
            background: #0e111b;
            border-radius: 26px;
            padding: 20px 24px;
            flex: 1 1 200px;
            border: 1px solid #262b3c;
            transition: all 0.2s;
        }
        .employee-card h4 {
            font-weight: 500;
            margin-bottom: 10px;
            font-size: 1rem;
            color: #b9c3db;
        }
        .employee-card p {
            font-size: 2rem;
            font-weight: 800;
            margin: 8px 0;
        }

        /* recent activity styling */
        .activity-list {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .activity-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 12px;
            background: #10121c;
            padding: 16px 22px;
            border-radius: 22px;
            border-left: 4px solid #3b82f6;
        }

        /* security note + footer */
        .security-note {
            background: #070c12;
            border-radius: 28px;
            padding: 18px 28px;
            margin: 32px 0 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
            border: 1px solid #24283a;
        }

        footer {
            text-align: center;
            margin-top: 30px;
            padding: 22px;
            font-size: 0.75rem;
            color: #5f687f;
            border-top: 1px solid #1f2330;
        }

        /* responsive touches */
        @media (max-width: 750px) {
            .users-full-container {
                padding: 18px;
            }
            .stat-number {
                font-size: 1.9rem;
            }
            .section-title {
                font-size: 1.3rem;
            }
            .welcome-header h1 {
                font-size: 1.4rem;
            }
        }

        /* custom scroll */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
        ::-webkit-scrollbar-track {
            background: #0a0a0a;
        }
        ::-webkit-scrollbar-thumb {
            background: #2f3346;
            border-radius: 12px;
        }
        button, .action-icons i {
            cursor: pointer;
        }
        i.fa, i.far, i.fas {
            pointer-events: auto;
        }
    </style>
</head>
<body>
<div class="users-full-container">
    <!-- Header with admin greeting (no sidebar) -->
    <div class="welcome-header">
        <div>
            <h1><i class="fas fa-user-shield" style="margin-right: 12px;"></i> Users Control Center</h1>
            <p style="color: #9ca3af; margin-top: 8px;">Complete user administration · Secure role management & analytics</p>
        </div>
        <div class="badge-admin">
            <i class="fas fa-shield-alt"></i> Admin Secure Session | Version 2.0
        </div>
    </div>

    <!-- STATS CARDS (total/active/new users + growth) -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-title"><i class="fas fa-users"></i> Total Users</div>
            <div class="stat-number">12,845</div>
            <div class="stat-trend"><i class="fas fa-arrow-up"></i> ↑12.5% vs last month</div>
        </div>
        <div class="stat-card">
            <div class="stat-title"><i class="fas fa-user-check"></i> Active Users</div>
            <div class="stat-number">9,256</div>
            <div class="stat-trend"><i class="fas fa-chart-line"></i> 72% active ratio</div>
        </div>
        <div class="stat-card">
            <div class="stat-title"><i class="fas fa-user-plus"></i> New Users (30d)</div>
            <div class="stat-number">1,245</div>
            <div class="stat-trend"><i class="fas fa-calendar-week"></i> ↑8.3% growth</div>
        </div>
        <div class="stat-card">
            <div class="stat-title"><i class="fas fa-chart-simple"></i> Avg. Spend / User</div>
            <div class="stat-number">₹972</div>
            <div class="stat-trend">LTV ↑6% vs quarter</div>
        </div>
    </div>

    <!-- MAIN USERS TABLE (detailed, role-based, secure preview) -->
    <div class="section-card">
        <div class="section-title">
            <i class="fas fa-table-list"></i> Registered Users & Secure Access
        </div>
        <div class="users-table-wrapper">
            <table class="users-table">
                <thead>
                    <tr>
                        <th>User ID</th><th>Full Name</th><th>Email / Phone</th><th>Status</th><th>Total Bookings</th><th>Joined Date</th><th>Role</th><th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>#USR1001</td><td>Arjun Mehta</td><td>arjun.mehta@besic.com</td>
                        <td><span class="badge-status"><i class="fas fa-circle" style="font-size: 0.5rem;"></i> Active</span></td>
                        <td>24</td><td>12 Jan 2025</td><td>Customer</td>
                        <td class="action-icons"><i class="fas fa-edit" title="Edit permissions"></i> <i class="fas fa-ban" title="Suspend"></i> <i class="fas fa-eye" title="Details"></i></td>
                    </tr>
                    <tr>
                        <td>#USR1002</td><td>Priya Sharma</td><td>priya.sharma@example.com</td>
                        <td><span class="badge-status">Active</span></td><td>18</td><td>04 Feb 2025</td><td>Customer</td>
                        <td class="action-icons"><i class="fas fa-edit"></i> <i class="fas fa-ban"></i> <i class="fas fa-eye"></i></td>
                    </tr>
                    <tr>
                        <td>#USR1003</td><td>Rahul Verma</td><td>rahul.v@servicehub.com</td>
                        <td><span class="badge-status badge-inactive"><i class="fas fa-circle"></i> Suspended</span></td>
                        <td>3</td><td>22 Nov 2024</td><td>Customer</td>
                        <td class="action-icons"><i class="fas fa-edit"></i> <i class="fas fa-redo-alt" title="Activate"></i> <i class="fas fa-eye"></i></td>
                    </tr>
                    <tr>
                        <td>#USR1004</td><td>Neha Gupta</td><td>neha.gupta@besic.com</td>
                        <td><span class="badge-status">Active</span></td><td>42</td><td>01 Mar 2025</td><td>Premium</td>
                        <td class="action-icons"><i class="fas fa-edit"></i> <i class="fas fa-ban"></i> <i class="fas fa-eye"></i></td>
                    </tr>
                    <tr>
                        <td>#USR1005</td><td>Sanjay Rawat</td><td>sanjay.rawat@mail.com</td>
                        <td><span class="badge-status">Active</span></td><td>9</td><td>18 Dec 2024</td><td>Customer</td>
                        <td class="action-icons"><i class="fas fa-edit"></i> <i class="fas fa-ban"></i> <i class="fas fa-eye"></i></td>
                    </tr>
                    <tr>
                        <td>#USR1006</td><td>Kavita Nair</td><td>kavitanair@besic.co</td>
                        <td><span class="badge-status">Active</span></td><td>31</td><td>29 Jan 2025</td><td>Customer</td>
                        <td class="action-icons"><i class="fas fa-edit"></i> <i class="fas fa-ban"></i> <i class="fas fa-eye"></i></td>
                    </tr>
                    <tr>
                        <td>#USR1007</td><td>Vikram Singh</td><td>vikram.s@besicseva.com</td>
                        <td><span class="badge-status badge-pending"><i class="fas fa-clock"></i> Email Pending</span></td>
                        <td>0</td><td>28 Mar 2025</td><td>Guest</td>
                        <td class="action-icons"><i class="fas fa-edit"></i> <i class="fas fa-check-circle" title="Verify"></i> <i class="fas fa-eye"></i></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div style="margin-top: 22px; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 12px;">
            <div><i class="fas fa-fingerprint"></i> <span style="color:#9aa2b5;">RBAC enabled | 2FA for admin edits</span></div>
            <div><i class="fas fa-database"></i> Last audit: Today, 10:23 AM IST</div>
        </div>
    </div>

    <!-- EMPLOYEE OVERVIEW (As per original UI metrics for admin panel) -->
    <div class="section-card">
        <div class="section-title">
            <i class="fas fa-briefcase"></i> Employee Partner Insights
        </div>
        <div class="employee-flex">
            <div class="employee-card">
                <h4><i class="fas fa-users"></i> Total Employees</h4>
                <p>2,453</p>
                <span style="color:#6ee7b7;"><i class="fas fa-arrow-up"></i> ↑12.5% vs last month</span>
            </div>
            <div class="employee-card">
                <h4><i class="fas fa-user-check"></i> Active Employees</h4>
                <p>2,150</p>
                <span>87.6% active rate</span>
            </div>
            <div class="employee-card">
                <h4><i class="fas fa-bed"></i> On Leave</h4>
                <p>303</p>
                <span>Temporary coverage</span>
            </div>
            <div class="employee-card">
                <h4><i class="fas fa-chart-line"></i> Avg Performance</h4>
                <p>4.82★</p>
                <span>Top rated 1,289 employees</span>
            </div>
        </div>
        <div style="margin-top: 20px; background: #0e111b; border-radius: 20px; padding: 14px 20px; border: 1px solid #262d3f;">
            <i class="fas fa-chart-simple"></i> <strong>Employee efficiency:</strong> ↑8.3% vs last month &nbsp;|&nbsp; <i class="fas fa-rupee-sign"></i> Monthly payroll processed: ₹48.2L &nbsp;|&nbsp; <i class="fas fa-tasks"></i> Total assigned tasks: 7.2k
        </div>
    </div>

    <!-- RECENT ACTIVITY & BOOKINGS / Payments (original metrics integration) -->
    <div class="section-card">
        <div class="section-title"><i class="fas fa-bell"></i> Real-time Activity & Bookings Feed</div>
        <div class="activity-list">
            <div class="activity-item">
                <div><i class="fas fa-user-plus"></i> <strong>New user registered</strong> — Priya Sharma (ID: #USR1023)</div>
                <div>5 hours ago</div>
                <div class="action-icons"><i class="fas fa-eye" title="View"></i></div>
            </div>
            <div class="activity-item">
                <div><i class="fas fa-wrench"></i> <strong>Booking completed</strong> — AC Repair · User Arjun Mehta</div>
                <div>₹2,450</div>
                <div><span class="badge-status">Completed</span></div>
            </div>
            <div class="activity-item">
                <div><i class="fas fa-credit-card"></i> <strong>Payment received</strong> — Booking #BK12345 (Plumber Service)</div>
                <div>₹1,850</div>
                <div><span class="badge-status">Success</span></div>
            </div>
            <div class="activity-item">
                <div><i class="fas fa-user-tie"></i> <strong>New employee registered</strong> — Rahul Kumar (Electrician)</div>
                <div>1 hour ago</div>
                <div><span class="badge-status">Pending verification</span></div>
            </div>
            <div class="activity-item">
                <div><i class="fas fa-chart-line"></i> <strong>Revenue milestone</strong> — Total platform revenue ₹12.45L (↑18.2% vs last month)</div>
                <div>Today</div>
                <div><i class="fas fa-chart-simple"></i></div>
            </div>
            <div class="activity-item">
                <div><i class="fas fa-file-invoice-dollar"></i> <strong>Payout pending</strong> — Employee settlements aggregating ₹1,09,800</div>
                <div>Pending</div>
                <div><span class="badge-status badge-inactive">Processing</span></div>
            </div>
        </div>
    </div>

    <!-- PAYMENTS & REVENUE SECTION (admin kpi secure) -->
    <div class="stats-grid" style="margin-bottom: 20px;">
        <div class="stat-card">
            <div class="stat-title"><i class="fas fa-hand-holding-usd"></i> Total Payments (All)</div>
            <div class="stat-number">₹11,85,400</div>
            <div class="stat-trend">↑15.7% vs previous quarter</div>
        </div>
        <div class="stat-card">
            <div class="stat-title"><i class="fas fa-coins"></i> Platform Revenue</div>
            <div class="stat-number">₹12,45,780</div>
            <div class="stat-trend"><i class="fas fa-arrow-up"></i> 18.2% vs last month</div>
        </div>
        <div class="stat-card">
            <div class="stat-title"><i class="fas fa-hourglass-half"></i> Pending Payouts</div>
            <div class="stat-number">₹1,09,800</div>
            <div class="stat-trend">Expected by 5th April</div>
        </div>
        <div class="stat-card">
            <div class="stat-title"><i class="fas fa-wallet"></i> Avg Transaction Value</div>
            <div class="stat-number">₹1,240</div>
            <div class="stat-trend">↑4.2% vs last month</div>
        </div>
    </div>

    <!-- SECURITY & LOGGING (transparency & robust controls) -->
    <div class="security-note">
        <div><i class="fas fa-shield-alt fa-lg" style="color:#3b82f6;"></i> <strong>Security Hardening</strong> — All user actions are logged, encrypted audit trails. RBAC enforced.</div>
        <div><i class="fas fa-history"></i> System Logs: Real-time monitoring | IP restrictions active</div>
        <div><i class="fas fa-key"></i> MFA required for critical roles</div>
    </div>

    <!-- additional: Popular services table stub (mirroring original UI for better admin context) -->
    <div class="section-card">
        <div class="section-title"><i class="fas fa-fire"></i> Popular Services (User Engagement)</div>
        <div class="users-table-wrapper">
            <table class="users-table">
                <thead>
                    <tr><th>Service Name</th><th>Bookings</th><th>Employees</th><th>Revenue</th><th>Action</th></tr>
                </thead>
                <tbody>
                    <tr><td>AC Repair</td><td>1,245</td><td>356</td><td>₹2,45,000</td><td class="action-icons"><i class="fas fa-chart-line"></i></td></tr>
                    <tr><td>Plumber</td><td>1,102</td><td>289</td><td>₹1,85,500</td><td class="action-icons"><i class="fas fa-chart-line"></i></td></tr>
                    <tr><td>Electrician</td><td>980</td><td>312</td><td>₹1,65,200</td><td class="action-icons"><i class="fas fa-chart-line"></i></td></tr>
                    <tr><td>Car Repair</td><td>875</td><td>265</td><td>₹1,45,700</td><td class="action-icons"><i class="fas fa-chart-line"></i></td></tr>
                    <tr><td>Painter</td><td>645</td><td>198</td><td>₹98,400</td><td class="action-icons"><i class="fas fa-chart-line"></i></td></tr>
                </tbody>
            </table>
        </div>
    </div>

    <footer>
        © 2024 Besic Seva. All rights reserved. Version 1.0.0 | Secure Admin Zone — User Management Console | <i class="fas fa-lock"></i> Encrypted Data
    </footer>
</div>

<!-- Minimal secure JS for action feedback (non-intrusive) -->
<script>
    (function() {
        // Provide secure demo interaction for edit/view icons - ensures admin-level feedback
        const allActionIcons = document.querySelectorAll('.action-icons i');
        allActionIcons.forEach(icon => {
            icon.addEventListener('click', (e) => {
                e.stopPropagation();
                const actionClass = Array.from(icon.classList);
                if (actionClass.some(c => c.includes('fa-edit'))) {
                    alert("[SECURE] Edit user: role-based permission required. Demo mode — actual changes require elevated access.");
                } else if (actionClass.some(c => c.includes('fa-ban') || c.includes('fa-redo-alt'))) {
                    alert("[MODERATION] User status toggle would require 2FA verification in production.");
                } else if (actionClass.some(c => c.includes('fa-eye'))) {
                    alert("🔍 Viewing user details (encrypted profile). Full data access logged.");
                } else {
                    alert("Admin action - audit trail recorded.");
                }
            });
        });

        // Additional security simulation: console log only
        console.log("Users Tab (standalone) | Black background | Fully responsive | Secure RBAC preview");
    })();
</script>
</body>
</html>