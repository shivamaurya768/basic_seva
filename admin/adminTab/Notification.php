<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>Basic Seva | Notifications • Real-time Alerts</title>
    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;400;500;600;700;800&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
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

        /* Animated background */
        .animated-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -2;
            background: radial-gradient(circle at 30% 40%, #0a0a0f, #000000);
        }
        .animated-bg::before {
            content: '';
            position: absolute;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(59,130,246,0.04) 0%, transparent 70%);
            animation: slowDrift 35s infinite alternate ease-in-out;
        }
        @keyframes slowDrift {
            0% { transform: translate(-10%, -10%) rotate(0deg); opacity: 0.5; }
            100% { transform: translate(10%, 10%) rotate(360deg); opacity: 1; }
        }

        /* Main container */
        .notif-container {
            max-width: 1600px;
            margin: 0 auto;
            padding: 28px 32px;
            position: relative;
            z-index: 2;
        }

        /* Glass header */
        .welcome-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: 32px;
            background: rgba(12, 12, 18, 0.65);
            backdrop-filter: blur(14px);
            padding: 20px 32px;
            border-radius: 48px;
            border: 1px solid rgba(59, 130, 246, 0.3);
            transition: all 0.3s;
        }
        .welcome-header:hover {
            border-color: rgba(59,130,246,0.6);
            box-shadow: 0 12px 40px rgba(59,130,246,0.2);
        }
        .welcome-header h1 {
            font-size: 2rem;
            font-weight: 800;
            background: linear-gradient(135deg, #ffffff, #a5b4fc, #60a5fa);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
        .badge-live {
            background: rgba(239,68,68,0.2);
            backdrop-filter: blur(8px);
            padding: 6px 20px;
            border-radius: 60px;
            font-size: 0.8rem;
            font-weight: 600;
            border: 1px solid #ef4444;
            animation: pulse 2s infinite;
        }
        @keyframes pulse {
            0% { opacity: 0.6; }
            50% { opacity: 1; box-shadow: 0 0 10px #ef4444; }
            100% { opacity: 0.6; }
        }
        .badge-live i {
            margin-right: 6px;
            color: #ef4444;
        }

        /* Stats Row */
        .stats-mini {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 32px;
        }
        .stat-bubble {
            background: rgba(12, 15, 21, 0.6);
            backdrop-filter: blur(8px);
            border-radius: 28px;
            padding: 18px 22px;
            text-align: center;
            border: 1px solid rgba(59,130,246,0.3);
            transition: 0.2s;
        }
        .stat-bubble:hover {
            border-color: #3b82f6;
            transform: translateY(-3px);
        }
        .stat-bubble h3 {
            font-size: 2rem;
            font-weight: 800;
        }
        .stat-bubble p {
            color: #94a3b8;
            font-size: 0.8rem;
        }

        /* Two Column Layout */
        .notif-grid {
            display: grid;
            grid-template-columns: 1fr 1.2fr;
            gap: 28px;
            margin-bottom: 40px;
        }

        /* Cards Base */
        .glass-card {
            background: rgba(12, 15, 21, 0.7);
            backdrop-filter: blur(12px);
            border-radius: 36px;
            padding: 24px 28px;
            border: 1px solid rgba(35, 37, 48, 0.7);
            transition: all 0.3s;
        }
        .glass-card:hover {
            border-color: rgba(59,130,246,0.5);
        }
        .card-header {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 24px;
            border-bottom: 1px solid rgba(59,130,246,0.3);
            padding-bottom: 16px;
        }
        .card-header i {
            font-size: 1.8rem;
            color: #3b82f6;
            background: rgba(59,130,246,0.15);
            padding: 10px;
            border-radius: 20px;
        }
        .card-header h2 {
            font-size: 1.5rem;
            font-weight: 600;
        }

        /* Create Notification Form */
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #cbd5e1;
            font-weight: 500;
            font-size: 0.85rem;
        }
        .form-group input, .form-group select, .form-group textarea {
            width: 100%;
            background: #1e293b;
            border: 1px solid #334155;
            padding: 12px 16px;
            border-radius: 24px;
            color: white;
            font-family: 'Inter', sans-serif;
            transition: 0.2s;
        }
        .form-group input:focus, .form-group textarea:focus, .form-group select:focus {
            outline: none;
            border-color: #3b82f6;
        }
        .send-btn {
            background: linear-gradient(135deg, #3b82f6, #2563eb);
            border: none;
            padding: 12px 24px;
            border-radius: 40px;
            color: white;
            font-weight: 600;
            cursor: pointer;
            width: 100%;
            transition: 0.2s;
            margin-top: 8px;
        }
        .send-btn:hover {
            transform: scale(0.98);
            box-shadow: 0 4px 15px rgba(59,130,246,0.4);
        }

        /* Notifications List */
        .notif-list {
            max-height: 500px;
            overflow-y: auto;
            padding-right: 8px;
        }
        .notif-item {
            background: rgba(0,0,0,0.4);
            border-radius: 24px;
            padding: 16px 20px;
            margin-bottom: 14px;
            border-left: 4px solid #3b82f6;
            transition: 0.2s;
            cursor: pointer;
        }
        .notif-item:hover {
            background: rgba(59,130,246,0.1);
            transform: translateX(5px);
        }
        .notif-item.unread {
            background: rgba(59,130,246,0.08);
            border-left-color: #f59e0b;
        }
        .notif-title {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
            flex-wrap: wrap;
        }
        .notif-title strong {
            font-size: 1rem;
        }
        .notif-badge {
            font-size: 0.65rem;
            background: #ef4444;
            padding: 2px 8px;
            border-radius: 30px;
        }
        .notif-msg {
            color: #cbd5e6;
            font-size: 0.85rem;
            margin: 8px 0;
        }
        .notif-time {
            font-size: 0.7rem;
            color: #6b7280;
            display: flex;
            gap: 12px;
            margin-top: 8px;
        }
        .action-icon {
            cursor: pointer;
            margin-left: 12px;
            transition: 0.1s;
        }
        .action-icon:hover {
            color: #ef4444;
        }
        .empty-state {
            text-align: center;
            padding: 40px;
            color: #64748b;
        }

        /* Templates Section */
        .template-chip {
            display: inline-block;
            background: #1e293b;
            padding: 6px 14px;
            border-radius: 40px;
            font-size: 0.75rem;
            margin: 5px;
            cursor: pointer;
            transition: 0.1s;
        }
        .template-chip:hover {
            background: #3b82f6;
        }

        /* Responsive */
        @media (max-width: 1000px) {
            .notif-grid {
                grid-template-columns: 1fr;
            }
            .notif-container {
                padding: 16px;
            }
        }
        ::-webkit-scrollbar {
            width: 5px;
        }
        ::-webkit-scrollbar-track {
            background: #1e293b;
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb {
            background: #3b82f6;
            border-radius: 10px;
        }
        footer {
            text-align: center;
            margin-top: 30px;
            padding: 20px;
            font-size: 0.75rem;
            color: #5f687f;
            border-top: 1px solid #1f2330;
        }
        .toast-msg {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background: #0f172ad9;
            backdrop-filter: blur(12px);
            padding: 12px 24px;
            border-radius: 60px;
            border-left: 4px solid #3b82f6;
            color: white;
            z-index: 999;
            display: none;
            font-weight: 500;
        }
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .notif-container > * {
            animation: fadeUp 0.4s ease-out forwards;
        }
    </style>
</head>
<body>
<div class="animated-bg"></div>
<div class="notif-container">
    <!-- Header -->
    <div class="welcome-header">
        <div>
            <h1><i class="fas fa-bell" style="margin-right: 12px;"></i> Notification Center</h1>
            <p style="color: #9ca3af; margin-top: 8px;">📢 Real-time alerts, announcements & user broadcasts</p>
        </div>
        <div class="badge-live">
            <i class="fas fa-circle"></i> LIVE · Real-time
        </div>
    </div>

    <!-- Stats Mini -->
    <div class="stats-mini">
        <div class="stat-bubble">
            <h3 id="totalNotifCount">12</h3>
            <p>Total Notifications</p>
        </div>
        <div class="stat-bubble">
            <h3 id="unreadCount">3</h3>
            <p>Unread Alerts</p>
        </div>
        <div class="stat-bubble">
            <h3>8</h3>
            <p>Sent Today</p>
        </div>
        <div class="stat-bubble">
            <h3><i class="fas fa-users"></i> 12.8k</h3>
            <p>Recipients</p>
        </div>
    </div>

    <!-- Main Grid -->
    <div class="notif-grid">
        <!-- Left: Create Notification Panel -->
        <div class="glass-card">
            <div class="card-header">
                <i class="fas fa-paper-plane"></i>
                <h2>Compose Notification</h2>
            </div>
            <div class="form-group">
                <label><i class="fas fa-tag"></i> Notification Type</label>
                <select id="notifType">
                    <option value="announcement">📢 Announcement (All Users)</option>
                    <option value="promotion">🎉 Promotional Offer</option>
                    <option value="alert">⚠️ System Alert</option>
                    <option value="update">🔄 Service Update</option>
                </select>
            </div>
            <div class="form-group">
                <label><i class="fas fa-heading"></i> Title</label>
                <input type="text" id="notifTitle" placeholder="E.g., Summer Discount Live!">
            </div>
            <div class="form-group">
                <label><i class="fas fa-message"></i> Message</label>
                <textarea rows="3" id="notifMsg" placeholder="Write your notification message here..."></textarea>
            </div>
            <div class="form-group">
                <label><i class="fas fa-users"></i> Target Audience</label>
                <select id="targetAudience">
                    <option value="all">🌍 All Users (Customers + Employees)</option>
                    <option value="customers">👥 Only Customers</option>
                    <option value="employees">👷 Only Employees</option>
                    <option value="admins">🔐 Admins Only</option>
                </select>
            </div>
            <div class="form-group">
                <label><i class="fas fa-clock"></i> Schedule (Optional)</label>
                <input type="datetime-local" id="scheduleTime">
            </div>
            <!-- Quick Templates -->
            <div style="margin-bottom: 16px;">
                <span style="font-size:0.7rem; color:#94a3b8;">Quick Templates:</span>
                <span class="template-chip" data-title="🎉 Weekend Offer!" data-msg="Flat 20% off on all services this weekend! Use code WEEKEND20">Weekend Offer</span>
                <span class="template-chip" data-title="⚠️ System Maintenance" data-msg="System will be under maintenance on Sunday 2 AM - 4 AM. Service might be affected.">Maintenance</span>
                <span class="template-chip" data-title="✅ New Feature Alert" data-msg="Now track your service live! Real-time updates available in app.">New Feature</span>
            </div>
            <button class="send-btn" id="sendNotifBtn"><i class="fas fa-broadcast-tower"></i> Send Notification Now</button>
        </div>

        <!-- Right: Notifications List & Management -->
        <div class="glass-card">
            <div class="card-header">
                <i class="fas fa-list-ul"></i>
                <h2>All Notifications</h2>
                <div style="margin-left: auto;">
                    <i class="fas fa-check-double" id="markAllReadBtn" style="cursor: pointer; background: #334155; padding: 8px 12px; border-radius: 40px; font-size: 0.8rem;"></i>
                </div>
            </div>
            <div class="notif-list" id="notifListContainer">
                <!-- Dynamic notifications will appear here -->
                <div class="empty-state" id="emptyNotifState">
                    <i class="fas fa-bell-slash" style="font-size: 3rem; opacity: 0.5;"></i>
                    <p>No notifications yet. Create one!</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Broadcast History / Recent Activity -->
    <div class="glass-card" style="margin-top: 0;">
        <div class="card-header">
            <i class="fas fa-chart-line"></i>
            <h2>Recent Broadcast Activity</h2>
        </div>
        <div style="display: flex; gap: 20px; flex-wrap: wrap; justify-content: space-between;">
            <div><i class="fas fa-envelope-open-text"></i> Last sent: <strong id="lastSentTime">Just now</strong></div>
            <div><i class="fas fa-chart-simple"></i> Open rate: <strong>74%</strong> <span style="color:#4ade80;">↑12%</span></div>
            <div><i class="fas fa-bell"></i> Push notifications enabled for <strong>10,284 users</strong></div>
        </div>
        <div style="margin-top: 16px; background: #0f1119; border-radius: 24px; padding: 14px; font-size: 0.8rem;" id="broadcastLog">
            📡 [10:45 AM] Promotional broadcast sent to 8.2k users<br>
            📡 [Yesterday] System maintenance alert delivered<br>
        </div>
    </div>

    <footer>
        © 2024 Besic Seva — Real-time Notification Engine | Push + In-App Alerts 🔔
    </footer>
</div>
<div id="toastMsg" class="toast-msg"></div>

<script>
    // ---------- Notification Data Store ----------
    let notifications = [
        {
            id: "notif1",
            title: "🎉 Welcome to Besic Seva!",
            message: "Get started with amazing service professionals near you.",
            type: "announcement",
            audience: "all",
            timestamp: new Date(Date.now() - 2 * 60 * 60 * 1000).toISOString(),
            read: false,
            isNew: true
        },
        {
            id: "notif2",
            title: "⚡ AC Service Flash Sale",
            message: "50% off on AC repair & service. Limited period offer!",
            type: "promotion",
            audience: "customers",
            timestamp: new Date(Date.now() - 5 * 60 * 60 * 1000).toISOString(),
            read: false,
            isNew: true
        },
        {
            id: "notif3",
            title: "🔧 Employee Training Completed",
            message: "45 new technicians are now certified for Electrician services.",
            type: "update",
            audience: "employees",
            timestamp: new Date(Date.now() - 24 * 60 * 60 * 1000).toISOString(),
            read: true,
            isNew: false
        },
        {
            id: "notif4",
            title: "⚠️ Server Maintenance",
            message: "Scheduled downtime on April 5th, 2 AM to 4 AM.",
            type: "alert",
            audience: "all",
            timestamp: new Date(Date.now() - 2 * 24 * 60 * 60 * 1000).toISOString(),
            read: true,
            isNew: false
        }
    ];

    // Helper functions
    function formatTime(isoString) {
        const date = new Date(isoString);
        const now = new Date();
        const diffMs = now - date;
        const diffMins = Math.floor(diffMs / 60000);
        if (diffMins < 1) return "Just now";
        if (diffMins < 60) return `${diffMins} min ago`;
        if (diffMins < 1440) return `${Math.floor(diffMins / 60)} hours ago`;
        return date.toLocaleDateString();
    }

    function getTypeIcon(type) {
        switch(type) {
            case 'announcement': return '<i class="fas fa-bullhorn" style="color:#60a5fa;"></i>';
            case 'promotion': return '<i class="fas fa-tag" style="color:#f97316;"></i>';
            case 'alert': return '<i class="fas fa-exclamation-triangle" style="color:#ef4444;"></i>';
            case 'update': return '<i class="fas fa-sync-alt" style="color:#4ade80;"></i>';
            default: return '<i class="fas fa-bell"></i>';
        }
    }

    function renderNotifications() {
        const container = document.getElementById('notifListContainer');
        const unreadCountSpan = document.getElementById('unreadCount');
        const totalSpan = document.getElementById('totalNotifCount');
        
        const unread = notifications.filter(n => !n.read).length;
        unreadCountSpan.innerText = unread;
        totalSpan.innerText = notifications.length;
        
        if (notifications.length === 0) {
            container.innerHTML = `<div class="empty-state"><i class="fas fa-bell-slash" style="font-size: 3rem; opacity: 0.5;"></i><p>No notifications yet. Create one!</p></div>`;
            return;
        }
        
        // Sort by newest first
        const sorted = [...notifications].sort((a,b) => new Date(b.timestamp) - new Date(a.timestamp));
        container.innerHTML = sorted.map(notif => `
            <div class="notif-item ${!notif.read ? 'unread' : ''}" data-id="${notif.id}">
                <div class="notif-title">
                    <strong>${getTypeIcon(notif.type)} ${escapeHtml(notif.title)}</strong>
                    ${!notif.read ? '<span class="notif-badge">NEW</span>' : ''}
                </div>
                <div class="notif-msg">${escapeHtml(notif.message)}</div>
                <div class="notif-time">
                    <span><i class="far fa-clock"></i> ${formatTime(notif.timestamp)}</span>
                    <span><i class="fas fa-users"></i> ${notif.audience === 'all' ? 'All Users' : notif.audience === 'customers' ? 'Customers' : notif.audience === 'employees' ? 'Employees' : 'Admins'}</span>
                    <span style="margin-left: auto;">
                        <i class="fas fa-check-circle action-icon mark-read" data-id="${notif.id}" title="Mark as read" style="color:#4ade80;"></i>
                        <i class="fas fa-trash-alt action-icon delete-notif" data-id="${notif.id}" title="Delete" style="color:#f87171;"></i>
                    </span>
                </div>
            </div>
        `).join('');
        
        // Add event listeners for mark read & delete
        document.querySelectorAll('.mark-read').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.stopPropagation();
                const id = btn.getAttribute('data-id');
                const notif = notifications.find(n => n.id === id);
                if (notif && !notif.read) {
                    notif.read = true;
                    renderNotifications();
                    showToast(`✅ Marked "${notif.title}" as read`, false);
                    addToBroadcastLog(`Notification marked as read: ${notif.title}`);
                }
            });
        });
        
        document.querySelectorAll('.delete-notif').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.stopPropagation();
                const id = btn.getAttribute('data-id');
                notifications = notifications.filter(n => n.id !== id);
                renderNotifications();
                showToast(`🗑️ Notification deleted`, false);
                addToBroadcastLog(`Notification removed from list`);
            });
        });
    }
    
    function escapeHtml(str) {
        if (!str) return '';
        return str.replace(/[&<>]/g, function(m) {
            if (m === '&') return '&amp;';
            if (m === '<') return '&lt;';
            if (m === '>') return '&gt;';
            return m;
        });
    }
    
    function addToBroadcastLog(message) {
        const logDiv = document.getElementById('broadcastLog');
        const timeStr = new Date().toLocaleTimeString([], {hour:'2-digit', minute:'2-digit'});
        logDiv.innerHTML = `📡 [${timeStr}] ${message}<br>` + logDiv.innerHTML;
        if (logDiv.children.length > 5) {
            // keep limited
        }
    }
    
    function showToast(message, isError = false) {
        const toast = document.getElementById('toastMsg');
        toast.style.display = 'block';
        toast.innerText = message;
        toast.style.borderLeftColor = isError ? '#ef4444' : '#3b82f6';
        setTimeout(() => {
            toast.style.display = 'none';
        }, 2800);
    }
    
    // Send new notification
    document.getElementById('sendNotifBtn').addEventListener('click', () => {
        const type = document.getElementById('notifType').value;
        const title = document.getElementById('notifTitle').value.trim();
        const message = document.getElementById('notifMsg').value.trim();
        const audience = document.getElementById('targetAudience').value;
        let schedule = document.getElementById('scheduleTime').value;
        
        if (!title || !message) {
            showToast("❌ Please enter both title and message", true);
            return;
        }
        
        const newNotif = {
            id: Date.now().toString(),
            title: title,
            message: message,
            type: type,
            audience: audience,
            timestamp: new Date().toISOString(),
            read: false,
            isNew: true
        };
        
        notifications.unshift(newNotif);
        renderNotifications();
        
        // Update last sent time
        document.getElementById('lastSentTime').innerText = "Just now";
        addToBroadcastLog(`📢 "${title}" sent to ${audience === 'all' ? 'ALL users' : audience}`);
        
        // Clear form
        document.getElementById('notifTitle').value = '';
        document.getElementById('notifMsg').value = '';
        document.getElementById('scheduleTime').value = '';
        
        showToast(`✨ Notification "${title}" sent successfully!`, false);
        
        // Optional: Show a live floating alert preview
        setTimeout(() => {
            showToast(`🔔 New Alert: ${title}`, false);
        }, 300);
    });
    
    // Mark All as Read
    document.getElementById('markAllReadBtn').addEventListener('click', () => {
        let changed = false;
        notifications.forEach(n => {
            if (!n.read) {
                n.read = true;
                changed = true;
            }
        });
        if (changed) {
            renderNotifications();
            showToast("✅ All notifications marked as read", false);
            addToBroadcastLog("All notifications marked read by admin");
        } else {
            showToast("No unread notifications", false);
        }
    });
    
    // Templates
    document.querySelectorAll('.template-chip').forEach(chip => {
        chip.addEventListener('click', () => {
            const title = chip.getAttribute('data-title');
            const msg = chip.getAttribute('data-msg');
            document.getElementById('notifTitle').value = title;
            document.getElementById('notifMsg').value = msg;
            showToast("📋 Template loaded! Customize and send.", false);
        });
    });
    
    // Initial render
    renderNotifications();
    
    // Simulate real-time notification every 45 seconds (just for demo)
    setInterval(() => {
        const demoMessages = [
            { title: "💎 New User Milestone", msg: "10,000 users joined this month! Thank you community." },
            { title: "📊 Weekly Report Ready", msg: "Your platform analytics report is now available for download." }
        ];
        const random = demoMessages[Math.floor(Math.random() * demoMessages.length)];
        const autoNotif = {
            id: "auto_" + Date.now(),
            title: random.title,
            message: random.msg,
            type: "update",
            audience: "all",
            timestamp: new Date().toISOString(),
            read: false,
            isNew: true
        };
        notifications.unshift(autoNotif);
        renderNotifications();
        showToast(`🔔 New: ${random.title}`, false);
        addToBroadcastLog(`Auto-generated: ${random.title}`);
    }, 45000);
</script>
</body>
</html>