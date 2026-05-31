<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>Basic Seva Admin | Employees Management</title>
    <!-- Font Awesome 6 (Free Icons) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Google Fonts: Inter for modern, readable UI -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700&display=swap" rel="stylesheet">
    <!-- Chart.js CDN for optional analytics (lightweight & secure) -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #000000;   /* pure black background as requested */
            font-family: 'Inter', sans-serif;
            color: #eef2ff;
            overflow-x: hidden;
        }

        /* main container without sidebar */
        .employee-dashboard {
            max-width: 1600px;
            margin: 0 auto;
            padding: 28px 32px;
            width: 100%;
        }

        /* header section */
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
            transition: all 0.2s ease;
            box-shadow: 0 6px 14px rgba(0, 0, 0, 0.5);
        }

        .stat-card:hover {
            background: #11141e;
            border-color: #2d3a5e;
            transform: translateY(-2px);
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

        /* section card */
        .section-card {
            background: #0a0a0e;
            border-radius: 32px;
            padding: 28px 30px;
            margin-bottom: 38px;
            border: 1px solid #20222e;
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

        /* employees table */
        .employees-table-wrapper {
            overflow-x: auto;
            border-radius: 24px;
        }

        .employees-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.9rem;
        }

        .employees-table th {
            text-align: left;
            padding: 18px 14px;
            background: #11161f;
            color: #cbd5e6;
            font-weight: 600;
            font-size: 0.85rem;
        }

        .employees-table td {
            padding: 16px 14px;
            border-bottom: 1px solid #222530;
            color: #e2e8f0;
        }

        .employees-table tr:hover td {
            background: #131822;
        }

        .badge-active {
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

        .badge-leave {
            background: #3e3a1f;
            color: #fde047;
        }

        .action-icons i {
            margin: 0 6px;
            cursor: pointer;
            background: #1e2432;
            padding: 6px 8px;
            border-radius: 40px;
            transition: 0.15s;
            font-size: 0.85rem;
        }

        .action-icons i:hover {
            background: #2d374f;
            color: white;
            transform: scale(1.02);
        }

        /* performance chart container */
        .chart-container {
            background: #0e111b;
            border-radius: 24px;
            padding: 20px;
            margin-top: 16px;
            border: 1px solid #262d3f;
        }

        canvas {
            max-height: 280px;
            width: 100%;
        }

        /* kpi row small */
        .kpi-flex {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin: 20px 0 10px;
        }
        .kpi-badge {
            background: #111620;
            border-radius: 28px;
            padding: 16px 24px;
            flex: 1;
            min-width: 160px;
            border: 1px solid #2a2f42;
        }

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

        @media (max-width: 750px) {
            .employee-dashboard {
                padding: 18px;
            }
            .stat-number {
                font-size: 1.9rem;
            }
            .section-title {
                font-size: 1.3rem;
            }
        }

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
    </style>
</head>
<body>
<div class="employee-dashboard">
    <!-- Header with employee focus -->
    <div class="welcome-header">
        <div>
            <h1><i class="fas fa-user-tie" style="margin-right: 12px;"></i> Employees Management</h1>
            <p style="color: #9ca3af; margin-top: 8px;">Monitor workforce, performance, payouts & role-based access</p>
        </div>
        <div class="badge-admin">
            <i class="fas fa-shield-alt"></i> HR Admin | Secure Zone
        </div>
    </div>

    <!-- STATS CARDS: total employees / active / on leave / new hires (inspired by original UI metrics) -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-title"><i class="fas fa-users"></i> Total Employees</div>
            <div class="stat-number">2,453</div>
            <div class="stat-trend"><i class="fas fa-arrow-up"></i> ↑12.5% vs last month</div>
        </div>
        <div class="stat-card">
            <div class="stat-title"><i class="fas fa-user-check"></i> Active Employees</div>
            <div class="stat-number">2,150</div>
            <div class="stat-trend"><i class="fas fa-chart-line"></i> 87.6% active rate</div>
        </div>
        <div class="stat-card">
            <div class="stat-title"><i class="fas fa-coffee"></i> On Leave</div>
            <div class="stat-number">303</div>
            <div class="stat-trend">Planned coverage active</div>
        </div>
        <div class="stat-card">
            <div class="stat-title"><i class="fas fa-user-plus"></i> New Hires (30d)</div>
            <div class="stat-number">184</div>
            <div class="stat-trend">↑8.3% vs last month</div>
        </div>
    </div>

    <!-- MAIN EMPLOYEES TABLE (detailed, secure, role-based) -->
    <div class="section-card">
        <div class="section-title">
            <i class="fas fa-id-card"></i> Employee Directory & Status
        </div>
        <div class="employees-table-wrapper">
            <table class="employees-table">
                <thead>
                    <tr>
                        <th>ID</th><th>Full Name</th><th>Service Role</th><th>Email / Phone</th><th>Status</th><th>Bookings</th><th>Rating</th><th>Earnings (MTD)</th><th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>#EMP101</td><td>Rahul Kumar</td><td>AC Repair Expert</td><td>rahul.k@besic.com</td>
                        <td><span class="badge-active"><i class="fas fa-circle" style="font-size: 0.5rem;"></i> Active</span></td>
                        <td>142</td><td>4.9 ★</td><td>₹28,450</td>
                        <td class="action-icons"><i class="fas fa-edit" title="Edit"></i> <i class="fas fa-chart-line" title="Performance"></i> <i class="fas fa-eye" title="Details"></i></td>
                    </tr>
                    <tr>
                        <td>#EMP102</td><td>Neha Sharma</td><td>Plumber</td><td>neha.s@besic.com</td>
                        <td><span class="badge-active">Active</span></td><td>118</td><td>4.8 ★</td><td>₹24,200</td>
                        <td class="action-icons"><i class="fas fa-edit"></i> <i class="fas fa-chart-line"></i> <i class="fas fa-eye"></i></td>
                    </tr>
                    <tr>
                        <td>#EMP103</td><td>Vikram Singh</td><td>Electrician</td><td>vikram.s@besic.com</td>
                        <td><span class="badge-active">Active</span></td><td>97</td><td>4.7 ★</td><td>₹21,550</td>
                        <td class="action-icons"><i class="fas fa-edit"></i> <i class="fas fa-chart-line"></i> <i class="fas fa-eye"></i></td>
                    </tr>
                    <tr>
                        <td>#EMP104</td><td>Anjali Mehta</td><td>Car Repair</td><td>anjali.m@besic.com</td>
                        <td><span class="badge-leave"><i class="fas fa-clock"></i> On Leave</span></td>
                        <td>63</td><td>4.9 ★</td><td>₹12,800</td>
                        <td class="action-icons"><i class="fas fa-edit"></i> <i class="fas fa-calendar-alt" title="Leave mgmt"></i> <i class="fas fa-eye"></i></td>
                    </tr>
                    <tr>
                        <td>#EMP105</td><td>Sanjay Patil</td><td>Painter</td><td>sanjay.p@besic.com</td>
                        <td><span class="badge-active">Active</span></td><td>84</td><td>4.6 ★</td><td>₹18,900</td>
                        <td class="action-icons"><i class="fas fa-edit"></i> <i class="fas fa-chart-line"></i> <i class="fas fa-eye"></i></td>
                    </tr>
                    <tr>
                        <td>#EMP106</td><td>Priyanka Das</td><td>AC Service</td><td>priyanka.d@besic.com</td>
                        <td><span class="badge-inactive"><i class="fas fa-ban"></i> Suspended</span></td>
                        <td>22</td><td>3.9 ★</td><td>₹5,200</td>
                        <td class="action-icons"><i class="fas fa-edit"></i> <i class="fas fa-redo-alt" title="Reactivate"></i> <i class="fas fa-eye"></i></td>
                    </tr>
                    <tr>
                        <td>#EMP107</td><td>Arvind Nair</td><td>Plumber Senior</td><td>arvind.n@besic.com</td>
                        <td><span class="badge-active">Active</span></td><td>201</td><td>5.0 ★</td><td>₹42,300</td>
                        <td class="action-icons"><i class="fas fa-edit"></i> <i class="fas fa-trophy"></i> <i class="fas fa-eye"></i></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div style="margin-top: 22px; display: flex; justify-content: space-between; flex-wrap: wrap; gap: 12px;">
            <div><i class="fas fa-fingerprint"></i> <span style="color:#9aa2b5;">Role-based permissions | Attendance logs encrypted</span></div>
            <div><i class="fas fa-history"></i> Last payroll sync: Today, 09:45 AM</div>
        </div>
    </div>

    <!-- EMPLOYEE PERFORMANCE & WORKLOAD CHART (using Chart.js - secure) -->
    <div class="section-card">
        <div class="section-title">
            <i class="fas fa-chart-simple"></i> Performance Overview (Weekly Bookings)
        </div>
        <div class="chart-container">
            <canvas id="employeePerformanceChart" width="800" height="250" style="max-height: 260px; width:100%"></canvas>
        </div>
        <div class="kpi-flex">
            <div class="kpi-badge"><i class="fas fa-star"></i> <strong>Avg Rating</strong><br>4.72 ★ <span style="color:#6ee7b7;">↑0.3</span></div>
            <div class="kpi-badge"><i class="fas fa-tasks"></i> <strong>Total Bookings (All)</strong><br>8,946 <span style="color:#6ee7b7;">↑15.7%</span></div>
            <div class="kpi-badge"><i class="fas fa-rupee-sign"></i> <strong>Total Employee Earnings</strong><br>₹48,20,500 <span>MTD</span></div>
            <div class="kpi-badge"><i class="fas fa-chart-line"></i> <strong>Completion Rate</strong><br>94.2% <span>✅</span></div>
        </div>
    </div>

    <!-- RECENT ACTIVITY FEED & PAYMENT SECTION (mirroring original ui with employee updates) -->
    <div class="section-card">
        <div class="section-title"><i class="fas fa-bell"></i> Recent Employee Activity & Updates</div>
        <div class="employee-activities" style="display: flex; flex-direction: column; gap: 16px;">
            <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; background: #10121c; padding: 16px 22px; border-radius: 22px; border-left: 4px solid #3b82f6;">
                <div><i class="fas fa-user-plus"></i> <strong>New employee registered</strong> — Rahul Kumar (AC Repair)</div>
                <div>1 hour ago</div>
                <div><span class="badge-active">Pending Verification</span></div>
            </div>
            <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; background: #10121c; padding: 16px 22px; border-radius: 22px; border-left: 4px solid #10b981;">
                <div><i class="fas fa-trophy"></i> <strong>Top performer this month</strong> — Arvind Nair (Plumber) • 201 bookings</div>
                <div>Yesterday</div>
                <div><i class="fas fa-award"></i> ₹5,000 bonus</div>
            </div>
            <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; background: #10121c; padding: 16px 22px; border-radius: 22px; border-left: 4px solid #f59e0b;">
                <div><i class="fas fa-hand-holding-usd"></i> <strong>Payout processed</strong> — 1,245 employees | Total ₹42.8L</div>
                <div>3 hours ago</div>
                <div><span class="badge-active">Completed</span></div>
            </div>
            <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; background: #10121c; padding: 16px 22px; border-radius: 22px; border-left: 4px solid #ef4444;">
                <div><i class="fas fa-calendar-week"></i> <strong>Leave approved</strong> — 12 employees on scheduled leave (Plumber & Electrician)</div>
                <div>Today</div>
                <div><span class="badge-leave">Coverage arranged</span></div>
            </div>
            <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; background: #10121c; padding: 16px 22px; border-radius: 22px; border-left: 4px solid #8b5cf6;">
                <div><i class="fas fa-chart-line"></i> <strong>Employee efficiency ↑8.3% vs last month</strong> — Platform revenue boost</div>
                <div>Today</div>
                <div><i class="fas fa-chart-simple"></i></div>
            </div>
        </div>
    </div>

    <!-- PAYOUTS + EARNINGS STATS (original admin style) -->
    <div class="stats-grid" style="margin-bottom: 20px;">
        <div class="stat-card">
            <div class="stat-title"><i class="fas fa-wallet"></i> Total Payouts (MTD)</div>
            <div class="stat-number">₹42,80,500</div>
            <div class="stat-trend">↑12.2% vs last month</div>
        </div>
        <div class="stat-card">
            <div class="stat-title"><i class="fas fa-chart-pie"></i> Pending Payouts</div>
            <div class="stat-number">₹1,09,800</div>
            <div class="stat-trend">Settlement by 5th April</div>
        </div>
        <div class="stat-card">
            <div class="stat-title"><i class="fas fa-coins"></i> Avg Earnings/Employee</div>
            <div class="stat-number">₹19,650</div>
            <div class="stat-trend">↑5.4% growth</div>
        </div>
        <div class="stat-card">
            <div class="stat-title"><i class="fas fa-clock"></i> Leave Balance Pool</div>
            <div class="stat-number">1,842 days</div>
            <div class="stat-trend">Utilization 21%</div>
        </div>
    </div>

    <!-- Popular Services with employee assignment (original UI style) -->
    <div class="section-card">
        <div class="section-title"><i class="fas fa-concierge-bell"></i> Service-wise Employee Allocation</div>
        <div class="employees-table-wrapper">
            <table class="employees-table">
                <thead>
                    <tr><th>Service Name</th><th>Assigned Employees</th><th>Total Bookings</th><th>Revenue Generated</th><th>Performance</th></tr>
                </thead>
                <tbody>
                    <tr><td>AC Repair</td><td>356</td><td>1,245</td><td>₹2,45,000</td><td><span class="badge-active">4.8 ★</span></td></tr>
                    <tr><td>Plumber</td><td>289</td><td>1,102</td><td>₹1,85,500</td><td><span class="badge-active">4.7 ★</span></td></tr>
                    <tr><td>Electrician</td><td>312</td><td>980</td><td>₹1,65,200</td><td><span class="badge-active">4.6 ★</span></td></tr>
                    <tr><td>Car Repair</td><td>265</td><td>875</td><td>₹1,45,700</td><td><span class="badge-active">4.9 ★</span></td></tr>
                    <tr><td>Painter</td><td>198</td><td>645</td><td>₹98,400</td><td><span class="badge-active">4.5 ★</span></td></tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Security & Audit Logs note -->
    <div class="security-note">
        <div><i class="fas fa-shield-alt fa-lg" style="color:#3b82f6;"></i> <strong>Secure Employee Management</strong> — All changes logged, role-based permissions (HR/Manager).</div>
        <div><i class="fas fa-database"></i> System Logs: Employee activity & payroll audit trail</div>
        <div><i class="fas fa-key"></i> MFA required for payout modifications</div>
    </div>

    <footer>
        © 2024 Besic Seva. All rights reserved. Version 1.0.0 | Employees Admin Panel — Encrypted Workforce Data
    </footer>
</div>

<script>
    // Performance Chart for Employee Weekly Bookings (secure, no external calls)
    document.addEventListener('DOMContentLoaded', function () {
        const ctx = document.getElementById('employeePerformanceChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Week 1 (May)', 'Week 2 (May)', 'Week 3 (May)', 'Week 4 (May)', 'This Week'],
                datasets: [{
                    label: 'Completed Bookings (Employees)',
                    data: [1840, 2100, 2450, 2680, 1890],
                    borderColor: '#3b82f6',
                    backgroundColor: 'rgba(59,130,246,0.1)',
                    borderWidth: 3,
                    pointBackgroundColor: '#60a5fa',
                    pointBorderColor: '#000000',
                    pointRadius: 5,
                    tension: 0.3,
                    fill: true
                }, {
                    label: 'Avg Employee Rating (out of 5)',
                    data: [4.5, 4.62, 4.7, 4.78, 4.82],
                    borderColor: '#10b981',
                    backgroundColor: 'transparent',
                    borderWidth: 2,
                    pointBackgroundColor: '#34d399',
                    borderDash: [5, 5],
                    yAxisID: 'y1'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    tooltip: { mode: 'index', intersect: false },
                    legend: { labels: { color: '#cbd5e1', font: { size: 11 } } }
                },
                scales: {
                    y: { title: { display: true, text: 'Bookings Count', color: '#9ca3af' }, grid: { color: '#1e293b' }, ticks: { color: '#cbd5e6' } },
                    y1: { position: 'right', title: { text: 'Rating (★)', color: '#9ca3af' }, min: 3.8, max: 5.1, grid: { drawOnChartArea: false }, ticks: { color: '#cbd5e6' } },
                    x: { ticks: { color: '#cbd5e6' }, grid: { color: '#1e293b' } }
                }
            }
        });
    });

    // Security feedback for action icons (demo but ensures admin interaction)
    const actionIcons = document.querySelectorAll('.action-icons i');
    actionIcons.forEach(icon => {
        icon.addEventListener('click', (e) => {
            e.stopPropagation();
            if(icon.classList.contains('fa-edit')) alert("[SECURE] Edit employee: Role-based write access required (Audit log active).");
            else if(icon.classList.contains('fa-eye')) alert("Viewing employee profile – encrypted personal data.");
            else if(icon.classList.contains('fa-chart-line') || icon.classList.contains('fa-trophy')) alert("Performance analytics dashboard (real-time data).");
            else alert("Action logged for admin review.");
        });
    });
</script>
</body>
</html>