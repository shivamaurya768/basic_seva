<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>Basic Seva | Services • Interactive Admin Panel</title>
    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Google Fonts: Inter + Poppins mix -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;400;500;600;700;800&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #000000;
            font-family: 'Inter', sans-serif;
            color: #ffffff;
            overflow-x: hidden;
        }

        /* animated bg effect */
        .animated-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -2;
            background: radial-gradient(circle at 20% 50%, #0a0a0a, #000000);
        }
        .animated-bg::before {
            content: '';
            position: absolute;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(59,130,246,0.03) 0%, transparent 60%);
            animation: slowDrift 30s infinite linear;
        }
        @keyframes slowDrift {
            0% { transform: translate(-10%, -10%) rotate(0deg); }
            100% { transform: translate(10%, 10%) rotate(360deg); }
        }

        /* main container */
        .services-container {
            max-width: 1600px;
            margin: 0 auto;
            padding: 28px 32px;
            position: relative;
            z-index: 2;
        }

        /* glassmorphism header */
        .welcome-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: 32px;
            background: rgba(12, 12, 18, 0.7);
            backdrop-filter: blur(12px);
            padding: 20px 32px;
            border-radius: 48px;
            border: 1px solid rgba(59, 130, 246, 0.3);
            box-shadow: 0 8px 32px rgba(0,0,0,0.4), 0 0 0 1px rgba(59,130,246,0.1) inset;
            transition: all 0.3s ease;
        }
        .welcome-header:hover {
            border-color: rgba(59,130,246,0.6);
            box-shadow: 0 12px 40px rgba(59,130,246,0.15);
        }

        .welcome-header h1 {
            font-size: 2rem;
            font-weight: 800;
            background: linear-gradient(135deg, #ffffff, #a5b4fc, #60a5fa);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            letter-spacing: -0.5px;
        }

        .badge-admin {
            background: rgba(30, 31, 44, 0.8);
            backdrop-filter: blur(8px);
            padding: 8px 24px;
            border-radius: 60px;
            font-size: 0.85rem;
            font-weight: 600;
            border: 1px solid #3b82f6;
            transition: 0.2s;
        }
        .badge-admin i {
            margin-right: 8px;
            color: #3b82f6;
        }

        /* stats cards with hover animations */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 24px;
            margin-bottom: 42px;
        }

        .stat-card {
            background: rgba(12, 15, 21, 0.8);
            backdrop-filter: blur(8px);
            border-radius: 32px;
            padding: 24px 26px;
            border: 1px solid rgba(35, 37, 48, 0.8);
            transition: all 0.3s cubic-bezier(0.2, 0.9, 0.4, 1.1);
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }
        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(59,130,246,0.1), transparent);
            transition: left 0.5s;
        }
        .stat-card:hover::before {
            left: 100%;
        }
        .stat-card:hover {
            transform: translateY(-6px);
            border-color: #3b82f6;
            box-shadow: 0 20px 35px -12px rgba(59,130,246,0.25);
            background: rgba(17, 20, 30, 0.9);
        }
        .stat-title {
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: #9ca3af;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .stat-number {
            font-size: 2.8rem;
            font-weight: 800;
            background: linear-gradient(135deg, #fff, #cbd5e1);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            line-height: 1.1;
        }
        .stat-trend {
            font-size: 0.75rem;
            margin-top: 14px;
            color: #4ade80;
            background: rgba(34, 197, 94, 0.12);
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 5px 14px;
            border-radius: 40px;
            font-weight: 500;
        }

        /* section cards - glassmorph */
        .section-card {
            background: rgba(10, 10, 14, 0.7);
            backdrop-filter: blur(10px);
            border-radius: 36px;
            padding: 28px 32px;
            margin-bottom: 38px;
            border: 1px solid rgba(32, 34, 46, 0.8);
            transition: all 0.25s ease;
        }
        .section-card:hover {
            border-color: rgba(59, 130, 246, 0.4);
        }
        .section-title {
            font-size: 1.6rem;
            font-weight: 700;
            margin-bottom: 28px;
            display: flex;
            align-items: center;
            gap: 14px;
            background: linear-gradient(135deg, #e2e8f0, #94a3b8);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        /* tables with modern design */
        .services-table-wrapper {
            overflow-x: auto;
            border-radius: 24px;
        }
        .services-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.9rem;
        }
        .services-table th {
            text-align: left;
            padding: 18px 14px;
            background: rgba(17, 22, 31, 0.6);
            color: #94a3b8;
            font-weight: 600;
            font-size: 0.85rem;
        }
        .services-table td {
            padding: 16px 14px;
            border-bottom: 1px solid rgba(34, 37, 48, 0.6);
            color: #e2e8f0;
            transition: 0.15s;
        }
        .services-table tr:hover td {
            background: rgba(59, 130, 246, 0.08);
        }

        .badge-active {
            background: linear-gradient(135deg, #1f3a2f, #0f2c24);
            color: #6ee7b7;
            padding: 5px 14px;
            border-radius: 40px;
            font-size: 0.75rem;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            width: fit-content;
            box-shadow: 0 0 8px rgba(110,231,183,0.2);
        }
        .badge-inactive {
            background: rgba(58, 44, 42, 0.7);
            color: #fda4af;
            padding: 5px 12px;
            border-radius: 40px;
            font-size: 0.75rem;
        }
        .category-chip {
            background: linear-gradient(135deg, #1e293b, #0f172a);
            padding: 5px 14px;
            border-radius: 30px;
            font-size: 0.75rem;
            font-weight: 500;
            display: inline-block;
            border: 1px solid #334155;
        }
        .trend-up {
            background: #0f2c24;
            color: #4ade80;
            padding: 2px 8px;
            border-radius: 20px;
            font-size: 0.7rem;
            margin-left: 6px;
        }

        /* interactive action buttons */
        .action-icons i {
            margin: 0 5px;
            cursor: pointer;
            background: rgba(30, 36, 50, 0.8);
            padding: 8px 10px;
            border-radius: 40px;
            transition: all 0.2s ease;
            font-size: 0.85rem;
        }
        .action-icons i:hover {
            background: #3b82f6;
            color: white;
            transform: scale(1.08) translateY(-2px);
            box-shadow: 0 6px 14px rgba(59,130,246,0.4);
        }

        /* chart container animation */
        .chart-container {
            background: rgba(14, 17, 27, 0.6);
            backdrop-filter: blur(4px);
            border-radius: 28px;
            padding: 20px;
            margin-top: 16px;
            border: 1px solid #262d3f;
            transition: 0.2s;
        }

        .kpi-flex {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin: 25px 0 10px;
        }
        .kpi-badge {
            background: rgba(17, 22, 32, 0.7);
            backdrop-filter: blur(4px);
            border-radius: 32px;
            padding: 18px 22px;
            flex: 1;
            min-width: 160px;
            border: 1px solid #2a2f42;
            transition: 0.2s;
            cursor: pointer;
        }
        .kpi-badge:hover {
            border-color: #3b82f6;
            transform: scale(0.98);
            background: rgba(59,130,246,0.1);
        }

        .activity-item {
            background: rgba(16, 18, 28, 0.6);
            backdrop-filter: blur(8px);
            padding: 16px 24px;
            border-radius: 28px;
            border-left: 4px solid #3b82f6;
            transition: all 0.2s;
            margin-bottom: 12px;
        }
        .activity-item:hover {
            background: rgba(30, 35, 55, 0.8);
            transform: translateX(6px);
        }

        .security-note {
            background: rgba(7, 12, 18, 0.7);
            backdrop-filter: blur(12px);
            border-radius: 32px;
            padding: 20px 32px;
            margin: 32px 0 24px;
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 20px;
            border: 1px solid #24283a;
        }

        footer {
            text-align: center;
            margin-top: 30px;
            padding: 22px;
            color: #5f687f;
            border-top: 1px solid #1f2330;
        }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .services-container > * {
            animation: fadeUp 0.5s ease-out forwards;
        }
        .stat-card:nth-child(1) { animation-delay: 0.05s; }
        .stat-card:nth-child(2) { animation-delay: 0.1s; }
        .stat-card:nth-child(3) { animation-delay: 0.15s; }
        .stat-card:nth-child(4) { animation-delay: 0.2s; }

        @media (max-width: 750px) {
            .services-container { padding: 16px; }
            .section-title { font-size: 1.3rem; }
            .stat-number { font-size: 2rem; }
        }
    </style>
</head>
<body>
<div class="animated-bg"></div>
<div class="services-container">
    <!-- Header -->
    <div class="welcome-header">
        <div>
            <h1><i class="fas fa-magic" style="margin-right: 12px;"></i> Services Studio</h1>
            <p style="color: #9ca3af; margin-top: 8px;">⚡ Manage, scale & grow your service ecosystem</p>
        </div>
        <div class="badge-admin">
            <i class="fas fa-crown"></i> Live Admin | Interactive Mode
        </div>
    </div>

    <!-- Stats Cards - dynamic -->
    <div class="stats-grid">
        <div class="stat-card" onclick="alert('🌟 Total active services driving revenue!')">
            <div class="stat-title"><i class="fas fa-rocket"></i> Total Services</div>
            <div class="stat-number">24</div>
            <div class="stat-trend"><i class="fas fa-plus-circle"></i> +3 new this month</div>
        </div>
        <div class="stat-card">
            <div class="stat-title"><i class="fas fa-fire"></i> Live Services</div>
            <div class="stat-number">22</div>
            <div class="stat-trend"><i class="fas fa-chart-line"></i> 91% active</div>
        </div>
        <div class="stat-card">
            <div class="stat-title"><i class="fas fa-chart-simple"></i> Total Revenue</div>
            <div class="stat-number">₹12.45L</div>
            <div class="stat-trend"><i class="fas fa-arrow-up"></i> ↑15.7% vs last month</div>
        </div>
        <div class="stat-card">
            <div class="stat-title"><i class="fas fa-trophy"></i> Top Service</div>
            <div class="stat-number">AC Repair</div>
            <div class="stat-trend"><i class="fas fa-chart-line"></i> 1,245 bookings</div>
        </div>
    </div>

    <!-- MAIN SERVICES TABLE - Fully Interactive -->
    <div class="section-card">
        <div class="section-title">
            <i class="fas fa-th-large"></i> All Services · Performance Hub
        </div>
        <div class="services-table-wrapper">
            <table class="services-table">
                <thead>
                    <tr><th>Service</th><th>Category</th><th>Price</th><th>Bookings</th><th>Employees</th><th>Revenue</th><th>Rating</th><th>Status</th><th>Actions</th></tr>
                </thead>
                <tbody>
                    <tr><td><i class="fas fa-snowflake" style="color:#60a5fa"></i> AC Repair</td><td><span class="category-chip">Electronics</span></td><td>₹399</td><td>1,245 <span class="trend-up">↑12%</span></td><td>356</td><td>₹2.45L</td><td>4.8 ★</td><td><span class="badge-active"><i class="fas fa-circle"></i> Active</span></td><td class="action-icons"><i class="fas fa-edit"></i> <i class="fas fa-chart-line"></i> <i class="fas fa-eye"></i></td></tr>
                    <tr><td><i class="fas fa-wrench"></i> Plumber</td><td><span class="category-chip">Home</span></td><td>₹349</td><td>1,102 <span class="trend-up">↑8%</span></td><td>289</td><td>₹1.85L</td><td>4.7 ★</td><td><span class="badge-active">Active</span></td><td class="action-icons"><i class="fas fa-edit"></i> <i class="fas fa-chart-line"></i> <i class="fas fa-eye"></i></td></tr>
                    <tr><td><i class="fas fa-bolt"></i> Electrician</td><td><span class="category-chip">Home</span></td><td>₹399</td><td>980 <span class="trend-up">↑5%</span></td><td>312</td><td>₹1.65L</td><td>4.6 ★</td><td><span class="badge-active">Active</span></td><td class="action-icons"><i class="fas fa-edit"></i> <i class="fas fa-chart-line"></i> <i class="fas fa-eye"></i></td></tr>
                    <tr><td><i class="fas fa-car"></i> Car Repair</td><td><span class="category-chip">Auto</span></td><td>₹599</td><td>875 <span class="trend-up">↑15%</span></td><td>265</td><td>₹1.45L</td><td>4.9 ★</td><td><span class="badge-active">Active</span></td><td class="action-icons"><i class="fas fa-edit"></i> <i class="fas fa-chart-line"></i> <i class="fas fa-eye"></i></td></tr>
                    <tr><td><i class="fas fa-paint-bucket"></i> Painter</td><td><span class="category-chip">Home</span></td><td>₹299</td><td>645 <span class="trend-up">↑3%</span></td><td>198</td><td>₹98.4K</td><td>4.5 ★</td><td><span class="badge-active">Active</span></td><td class="action-icons"><i class="fas fa-edit"></i> <i class="fas fa-chart-line"></i> <i class="fas fa-eye"></i></td></tr>
                    <tr><td><i class="fas fa-mobile-alt"></i> Mobile Repair</td><td><span class="category-chip">Electronics</span></td><td>₹249</td><td>623 <span class="trend-up">🔥22%</span></td><td>145</td><td>₹89.2K</td><td>4.7 ★</td><td><span class="badge-active">Active</span></td><td class="action-icons"><i class="fas fa-edit"></i> <i class="fas fa-chart-line"></i> <i class="fas fa-eye"></i></td></tr>
                </tbody>
            </table>
        </div>
        <div style="margin-top: 20px; text-align: right;"><i class="fas fa-database"></i> Real-time sync · Last updated 2 min ago</div>
    </div>

    <!-- Categories & Performance Chart -->
    <div class="section-card">
        <div class="section-title"><i class="fas fa-chart-pie"></i> Category Firepower 🔥</div>
        <div class="kpi-flex">
            <div class="kpi-badge" onclick="alert('Home Services 🔥 4,520 bookings this quarter')"><i class="fas fa-home"></i> Home Services <br><strong>4,520 bookings</strong> <span style="color:#4ade80">↑21%</span></div>
            <div class="kpi-badge" onclick="alert('Electronics fastest growing +32% MoM')"><i class="fas fa-microchip"></i> Electronics <br><strong>₹4.12L revenue</strong> <span style="color:#4ade80">↑32%</span></div>
            <div class="kpi-badge" onclick="alert('Automotive highest rated ⭐ 4.9')"><i class="fas fa-car"></i> Automotive <br><strong>4.9★ rating</strong> <span>🔥 top</span></div>
        </div>
        <div class="chart-container">
            <canvas id="serviceTrendChart" style="max-height: 260px; width:100%"></canvas>
        </div>
    </div>

    <!-- Live activity feed (mast wala) -->
    <div class="section-card">
        <div class="section-title"><i class="fas fa-bell"></i> Live Action <span style="font-size: 0.8rem; background:#3b82f6; padding:2px 12px; border-radius:50px;">LIVE</span></div>
        <div class="activity-item"><div><i class="fas fa-plus-circle" style="color:#4ade80"></i> <strong>New Service Request</strong> — "Smart Home Setup" added by admin</div><div style="color:#60a5fa">2 min ago</div></div>
        <div class="activity-item"><div><i class="fas fa-star" style="color:gold"></i> <strong>Rating boost!</strong> — Car Repair now 4.9★ after 45 reviews</div><div>1 hour ago</div></div>
        <div class="activity-item"><div><i class="fas fa-chart-line" style="color:#f97316"></i> <strong>Mobile repair bookings spiked 🔥 +22%</strong> — Summer offer active</div><div>3 hours ago</div></div>
        <div class="activity-item"><div><i class="fas fa-user-check"></i> <strong>45 new technicians assigned</strong> to AC Repair & Plumber</div><div>Yesterday</div></div>
    </div>

    <!-- testi + payments -->
    <div class="stats-grid" style="margin-bottom: 20px;">
        <div class="stat-card"><div class="stat-title"><i class="fas fa-comment-dots"></i> Testimonials</div><div class="stat-number">1,284</div><div class="stat-trend">💬 94% positive vibe</div></div>
        <div class="stat-card"><div class="stat-title"><i class="fas fa-credit-card"></i> Service Payments</div><div class="stat-number">₹11.85L</div><div class="stat-trend">↑15.7% growth</div></div>
        <div class="stat-card"><div class="stat-title"><i class="fas fa-clock"></i> Avg. Completion</div><div class="stat-number">2.4 hrs</div><div class="stat-trend">⚡ faster by 0.3hr</div></div>
    </div>

    <div class="security-note">
        <div><i class="fas fa-shield-alt fa-lg" style="color:#3b82f6"></i> <strong>Secure & Encrypted</strong> — All actions logged with role based access</div>
        <div><i class="fas fa-fingerprint"></i> 2FA for critical changes</div>
        <div><i class="fas fa-chart-line"></i> Live analytics</div>
    </div>
    <footer>© 2024 Besic Seva — Next Gen Admin Panel | Interactive Mode v2.0 🔥</footer>
</div>

<script>
    // Chart JS - interactive bar chart
    const ctx = document.getElementById('serviceTrendChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['AC Repair', 'Plumber', 'Electrician', 'Car Repair', 'Mobile Repair', 'Painter'],
            datasets: [{
                label: 'Bookings (Last 30d)',
                data: [1245, 1102, 980, 875, 623, 645],
                backgroundColor: 'rgba(59,130,246,0.7)',
                borderRadius: 12,
                borderSkipped: false,
            },{
                label: 'Growth %',
                data: [12, 8, 5, 15, 22, 3],
                type: 'line',
                borderColor: '#f97316',
                backgroundColor: 'transparent',
                borderWidth: 3,
                pointBackgroundColor: '#ff8c42',
                pointRadius: 6,
                tension: 0.2,
                yAxisID: 'y1'
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { labels: { color: '#cbd5e1', font: { weight: 'bold' } } },
                tooltip: { mode: 'index', intersect: false, backgroundColor: '#000000cc' }
            },
            scales: {
                y: { title: { display: true, text: 'Bookings', color: '#9ca3af' }, grid: { color: '#1e293b' }, ticks: { color: '#cbd5e6' } },
                y1: { position: 'right', title: { text: 'Growth %', color: '#f97316' }, grid: { drawOnChartArea: false }, ticks: { color: '#f97316' } },
                x: { ticks: { color: '#cbd5e6', font: { weight: '500' } }, grid: { color: '#1e293b' } }
            }
        }
    });

    // Interactive action icons with fun alerts
    document.querySelectorAll('.action-icons i').forEach(icon => {
        icon.addEventListener('click', (e) => {
            e.stopPropagation();
            if(icon.classList.contains('fa-edit')) alert("✏️ Edit Mode: Update pricing, description or category (audit logged)");
            else if(icon.classList.contains('fa-chart-line')) alert("📈 Detailed analytics: Revenue trend, employee performance & demand forecast");
            else if(icon.classList.contains('fa-eye')) alert("👁️ Service insights: Ratings, reviews & heatmap");
            else alert("⚡ Action recorded — Super secure zone");
        });
    });
    // Card click effect
    document.querySelectorAll('.stat-card').forEach(card => {
        card.addEventListener('click', () => {});
    });
</script>
</body>
</html>