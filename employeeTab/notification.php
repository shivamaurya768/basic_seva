<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>BESIC SEVA - Notifications | Alerts & Updates</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #f0f4f9;
            font-family: 'Inter', sans-serif;
            color: #1e2a3e;
            padding: 24px;
        }

        .notifications-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Header Section */
        .page-header {
            background: white;
            border-radius: 32px;
            padding: 28px 36px;
            margin-bottom: 28px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.03);
            border: 1px solid #eef2f8;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
        }
        .page-header h1 {
            font-size: 2rem;
            font-weight: 700;
            color: #0a2b38;
            display: flex;
            align-items: center;
            gap: 14px;
        }
        .page-header h1 i {
            color: #2d8a52;
            font-size: 2rem;
        }
        .header-badge {
            background: #e8f5ed;
            padding: 10px 22px;
            border-radius: 60px;
            font-size: 0.85rem;
            font-weight: 500;
            color: #2d8a52;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        /* Stats Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 28px;
        }
        .stat-card {
            background: white;
            border-radius: 24px;
            padding: 18px 22px;
            display: flex;
            align-items: center;
            gap: 16px;
            border: 1px solid #eef2f8;
            transition: 0.2s;
        }
        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.05);
        }
        .stat-icon {
            width: 52px;
            height: 52px;
            background: #e8f5ed;
            border-radius: 28px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: #2d8a52;
        }
        .stat-info h3 {
            font-size: 1.8rem;
            font-weight: 800;
            color: #1e2a3e;
        }
        .stat-info p {
            font-size: 0.75rem;
            color: #6f8fae;
            font-weight: 500;
        }

        /* Action Bar */
        .action-bar {
            background: white;
            border-radius: 28px;
            padding: 16px 24px;
            margin-bottom: 24px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
            border: 1px solid #eef2f8;
        }
        .filter-tabs {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }
        .filter-tab {
            background: transparent;
            border: none;
            padding: 8px 20px;
            border-radius: 40px;
            font-weight: 500;
            font-size: 0.85rem;
            cursor: pointer;
            transition: 0.2s;
            color: #5c7a9a;
        }
        .filter-tab.active {
            background: #2d8a52;
            color: white;
        }
        .filter-tab:hover:not(.active) {
            background: #e8f5ed;
        }
        .action-buttons {
            display: flex;
            gap: 12px;
        }
        .action-btn {
            background: #f0f4f9;
            border: none;
            padding: 8px 18px;
            border-radius: 40px;
            font-size: 0.75rem;
            font-weight: 500;
            cursor: pointer;
            transition: 0.2s;
            display: flex;
            align-items: center;
            gap: 6px;
        }
        .action-btn:hover {
            background: #e0e8f0;
        }
        .mark-all-btn {
            background: #2d8a52;
            color: white;
        }
        .mark-all-btn:hover {
            background: #236b41;
        }

        /* Notifications List */
        .notifications-list {
            background: white;
            border-radius: 28px;
            border: 1px solid #eef2f8;
            overflow: hidden;
        }
        .notification-item {
            display: flex;
            gap: 18px;
            padding: 20px 28px;
            border-bottom: 1px solid #f0f4fa;
            transition: 0.2s;
            cursor: pointer;
            position: relative;
        }
        .notification-item:hover {
            background: #fafcff;
        }
        .notification-item.unread {
            background: #fefef9;
        }
        .notification-item.unread::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 4px;
            background: #2d8a52;
            border-radius: 0 4px 4px 0;
        }
        .notification-icon {
            width: 52px;
            height: 52px;
            background: #f0f4f9;
            border-radius: 28px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
            flex-shrink: 0;
        }
        .notification-icon.earning { background: #e8f5ed; color: #2d8a52; }
        .notification-icon.job { background: #e3f0ff; color: #1f6392; }
        .notification-icon.reminder { background: #fff3e0; color: #e67e22; }
        .notification-icon.system { background: #f0e6ff; color: #8e44ad; }
        .notification-icon.achievement { background: #ffe8e6; color: #e74c3c; }
        
        .notification-content {
            flex: 1;
        }
        .notification-title {
            font-weight: 700;
            font-size: 1rem;
            margin-bottom: 6px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: baseline;
            gap: 8px;
        }
        .notification-message {
            font-size: 0.85rem;
            color: #5c7a9a;
            line-height: 1.4;
            margin-bottom: 8px;
        }
        .notification-time {
            font-size: 0.7rem;
            color: #8aa0b8;
            display: flex;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
        }
        .unread-badge {
            background: #2d8a52;
            color: white;
            font-size: 0.6rem;
            padding: 2px 10px;
            border-radius: 30px;
            font-weight: 600;
        }
        .notification-actions {
            display: flex;
            gap: 12px;
            align-items: center;
        }
        .notif-action {
            background: transparent;
            border: none;
            color: #8aa0b8;
            cursor: pointer;
            font-size: 0.9rem;
            padding: 6px;
            transition: 0.2s;
            border-radius: 30px;
        }
        .notif-action:hover {
            color: #2d8a52;
            background: #e8f5ed;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 60px 30px;
            color: #95adc7;
        }
        .empty-state i {
            font-size: 4rem;
            margin-bottom: 16px;
            opacity: 0.5;
        }

        /* Modal */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.75);
            backdrop-filter: blur(6px);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 2000;
            visibility: hidden;
            opacity: 0;
            transition: 0.2s;
        }
        .modal-overlay.active {
            visibility: visible;
            opacity: 1;
        }
        .modal-container {
            background: white;
            border-radius: 36px;
            width: 90%;
            max-width: 500px;
            padding: 28px;
        }
        .modal-container h3 {
            font-size: 1.3rem;
            margin-bottom: 16px;
        }
        .modal-buttons {
            display: flex;
            gap: 12px;
            justify-content: flex-end;
            margin-top: 24px;
        }
        .modal-buttons button {
            padding: 10px 24px;
            border-radius: 40px;
            border: none;
            cursor: pointer;
            font-weight: 500;
        }

        @media (max-width: 680px) {
            body { padding: 16px; }
            .notification-item { padding: 16px; flex-direction: column; gap: 12px; }
            .notification-icon { width: 44px; height: 44px; font-size: 1.1rem; }
            .action-bar { flex-direction: column; align-items: stretch; }
            .filter-tabs { justify-content: center; }
            .action-buttons { justify-content: center; }
            .page-header { flex-direction: column; align-items: flex-start; gap: 12px; }
            .stats-grid { gap: 12px; }
            .stat-card { padding: 14px; }
            .stat-icon { width: 44px; height: 44px; font-size: 1.2rem; }
            .stat-info h3 { font-size: 1.4rem; }
        }

        .footer-note {
            text-align: center;
            font-size: 0.7rem;
            color: #8aa0b8;
            margin-top: 24px;
        }
    </style>
</head>
<body>
<div class="notifications-container">
    <!-- Header -->
    <div class="page-header">
        <h1><i class="fas fa-bell"></i> Notifications</h1>
        <div class="header-badge"><i class="fas fa-sync-alt"></i> Real-time updates</div>
    </div>

    <!-- Stats -->
    <div class="stats-grid" id="statsGrid"></div>

    <!-- Action Bar -->
    <div class="action-bar">
        <div class="filter-tabs" id="filterTabs">
            <button class="filter-tab active" data-filter="all">All</button>
            <button class="filter-tab" data-filter="unread">Unread</button>
            <button class="filter-tab" data-filter="earning">Earnings</button>
            <button class="filter-tab" data-filter="job">Jobs</button>
            <button class="filter-tab" data-filter="reminder">Reminders</button>
        </div>
        <div class="action-buttons">
            <button class="action-btn" id="markAllReadBtn"><i class="fas fa-check-double"></i> Mark all as read</button>
            <button class="action-btn" id="clearAllBtn"><i class="fas fa-trash-alt"></i> Clear all</button>
        </div>
    </div>

    <!-- Notifications List -->
    <div class="notifications-list" id="notificationsList"></div>
    <div class="footer-note">
        <i class="fas fa-bell-slash"></i> Notifications are auto-deleted after 30 days
    </div>
</div>

<!-- Confirmation Modal -->
<div id="confirmModal" class="modal-overlay">
    <div class="modal-container">
        <h3 id="modalTitle">Confirm Action</h3>
        <p id="modalMessage">Are you sure you want to proceed?</p>
        <div class="modal-buttons">
            <button id="modalCancelBtn" style="background:#f0f4f9;">Cancel</button>
            <button id="modalConfirmBtn" style="background:#2d8a52; color:white;">Confirm</button>
        </div>
    </div>
</div>

<script>
    // ------------------------------
    // NOTIFICATIONS DATABASE
    // ------------------------------
    let notifications = [];
    let nextId = 13;
    let currentFilter = "all";
    let pendingAction = null;

    // Load from localStorage
    function loadNotifications() {
        const stored = localStorage.getItem('besic_notifications');
        if (stored) {
            notifications = JSON.parse(stored);
            if (notifications.length) {
                nextId = Math.max(...notifications.map(n => n.id), 0) + 1;
                return;
            }
        }
        // Initialize with rich demo notifications
        const now = new Date();
        const today = new Date();
        const yesterday = new Date(now);
        yesterday.setDate(yesterday.getDate() - 1);
        const twoDaysAgo = new Date(now);
        twoDaysAgo.setDate(twoDaysAgo.getDate() - 2);
        
        notifications = [
            { id: 1, type: "earning", title: "💰 New Earnings Credit", message: "You received ₹450 for Electrical Installation job at Hazratganj.", time: today.toLocaleTimeString([], {hour:'2-digit', minute:'2-digit'}), date: "Today", read: false, iconClass: "earning", icon: "fas fa-rupee-sign" },
            { id: 2, type: "job", title: "🔧 New Job Assignment", message: "Plumber Service requested at Aliganj, Lucknow. Schedule: Tomorrow 10:00 AM.", time: "10:30 AM", date: "Today", read: false, iconClass: "job", icon: "fas fa-briefcase" },
            { id: 3, type: "reminder", title: "⏰ Upcoming Job Reminder", message: "Fan Repair at Indira Nagar in 2 hours. Please be on time.", time: "01:30 PM", date: "Today", read: true, iconClass: "reminder", icon: "fas fa-clock" },
            { id: 4, type: "earning", title: "⭐ 5-Star Rating Received", message: "Customer gave you 5-star rating for AC Repair service. +10 rating points!", time: "Yesterday", date: "Yesterday", read: true, iconClass: "achievement", icon: "fas fa-star" },
            { id: 5, type: "job", title: "✅ Job Completed", message: "AC Repair at Gomti Nagar marked as completed. ₹350 credited to wallet.", time: "06:30 PM", date: "Yesterday", read: true, iconClass: "job", icon: "fas fa-check-circle" },
            { id: 6, type: "system", title: "📢 Important Update", message: "New service catalog added: Smart Home Installation. Check it out!", time: "Yesterday", date: "Yesterday", read: false, iconClass: "system", icon: "fas fa-info-circle" },
            { id: 7, type: "reminder", title: "📋 Document Verification Pending", message: "Your PAN Card verification is pending. Upload to avoid service delay.", time: "2 days ago", date: "2 days ago", read: false, iconClass: "reminder", icon: "fas fa-file-alt" },
            { id: 8, type: "earning", title: "🎉 Weekly Bonus Earned", message: "Congratulations! You earned ₹500 bonus for completing 10 jobs this week.", time: "2 days ago", date: "2 days ago", read: true, iconClass: "earning", icon: "fas fa-gift" },
            { id: 9, type: "job", title: "🔄 Job Rescheduled", message: "Plumber Service at Aliganj rescheduled to 11:30 AM tomorrow.", time: "2 days ago", date: "2 days ago", read: true, iconClass: "job", icon: "fas fa-exchange-alt" },
            { id: 10, type: "system", title: "🛠️ Maintenance Update", message: "App will be under maintenance on Sunday 2 AM - 4 AM.", time: "3 days ago", date: "3 days ago", read: true, iconClass: "system", icon: "fas fa-wrench" },
            { id: 11, type: "achievement", title: "🏆 Achievement Unlocked", message: "You've completed 50 jobs! Platinum Service badge earned.", time: "3 days ago", date: "3 days ago", read: true, iconClass: "achievement", icon: "fas fa-medal" },
            { id: 12, type: "reminder", title: "📅 Training Session Reminder", message: "Advanced Electrical Wiring training at 4:00 PM today. Don't miss!", time: "3 days ago", date: "3 days ago", read: true, iconClass: "reminder", icon: "fas fa-chalkboard" }
        ];
        saveToLocal();
    }

    function saveToLocal() {
        localStorage.setItem('besic_notifications', JSON.stringify(notifications));
    }

    // Stats
    function renderStats() {
        const total = notifications.length;
        const unread = notifications.filter(n => !n.read).length;
        const earningCount = notifications.filter(n => n.type === 'earning').length;
        const jobCount = notifications.filter(n => n.type === 'job').length;
        
        document.getElementById('statsGrid').innerHTML = `
            <div class="stat-card"><div class="stat-icon"><i class="fas fa-bell"></i></div><div class="stat-info"><h3>${total}</h3><p>Total</p></div></div>
            <div class="stat-card"><div class="stat-icon"><i class="fas fa-envelope"></i></div><div class="stat-info"><h3>${unread}</h3><p>Unread</p></div></div>
            <div class="stat-card"><div class="stat-icon"><i class="fas fa-rupee-sign"></i></div><div class="stat-info"><h3>${earningCount}</h3><p>Earnings Alerts</p></div></div>
            <div class="stat-card"><div class="stat-icon"><i class="fas fa-briefcase"></i></div><div class="stat-info"><h3>${jobCount}</h3><p>Job Updates</p></div></div>
        `;
    }

    // Filter notifications
    function getFilteredNotifications() {
        let filtered = [...notifications];
        if (currentFilter === 'unread') {
            filtered = filtered.filter(n => !n.read);
        } else if (currentFilter !== 'all') {
            filtered = filtered.filter(n => n.type === currentFilter);
        }
        // Sort by read status (unread first) then by id descending (newer first)
        filtered.sort((a, b) => {
            if (a.read !== b.read) return a.read ? 1 : -1;
            return b.id - a.id;
        });
        return filtered;
    }

    // Mark as read
    function markAsRead(notificationId) {
        const notif = notifications.find(n => n.id === notificationId);
        if (notif && !notif.read) {
            notif.read = true;
            saveToLocal();
            renderAll();
        }
    }

    function markAllAsRead() {
        notifications.forEach(n => { n.read = true; });
        saveToLocal();
        renderAll();
    }

    function deleteNotification(notificationId) {
        notifications = notifications.filter(n => n.id !== notificationId);
        saveToLocal();
        renderAll();
    }

    function clearAllNotifications() {
        notifications = [];
        saveToLocal();
        renderAll();
    }

    // Render notifications list
    function renderNotifications() {
        const container = document.getElementById('notificationsList');
        const filtered = getFilteredNotifications();
        
        if (filtered.length === 0) {
            container.innerHTML = `
                <div class="empty-state">
                    <i class="fas fa-bell-slash"></i>
                    <h3>No notifications</h3>
                    <p>You're all caught up! New notifications will appear here.</p>
                </div>
            `;
            return;
        }
        
        let html = '';
        filtered.forEach(notif => {
            const unreadClass = !notif.read ? 'unread' : '';
            let iconBgClass = '';
            switch(notif.type) {
                case 'earning': iconBgClass = 'earning'; break;
                case 'job': iconBgClass = 'job'; break;
                case 'reminder': iconBgClass = 'reminder'; break;
                case 'system': iconBgClass = 'system'; break;
                case 'achievement': iconBgClass = 'achievement'; break;
                default: iconBgClass = 'earning';
            }
            
            html += `
                <div class="notification-item ${unreadClass}" data-id="${notif.id}">
                    <div class="notification-icon ${iconBgClass}">
                        <i class="${notif.icon}"></i>
                    </div>
                    <div class="notification-content">
                        <div class="notification-title">
                            <span>${escapeHtml(notif.title)}</span>
                            ${!notif.read ? '<span class="unread-badge">New</span>' : ''}
                        </div>
                        <div class="notification-message">${escapeHtml(notif.message)}</div>
                        <div class="notification-time">
                            <span><i class="far fa-clock"></i> ${notif.date} at ${notif.time}</span>
                        </div>
                    </div>
                    <div class="notification-actions">
                        ${!notif.read ? `<button class="notif-action mark-read" data-id="${notif.id}" title="Mark as read"><i class="fas fa-check-circle"></i></button>` : ''}
                        <button class="notif-action delete-notif" data-id="${notif.id}" title="Delete"><i class="fas fa-trash-alt"></i></button>
                    </div>
                </div>
            `;
        });
        container.innerHTML = html;
        
        // Attach event listeners
        document.querySelectorAll('.notification-item').forEach(item => {
            item.addEventListener('click', (e) => {
                if (e.target.closest('.mark-read') || e.target.closest('.delete-notif')) return;
                const id = parseInt(item.getAttribute('data-id'));
                markAsRead(id);
            });
        });
        
        document.querySelectorAll('.mark-read').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.stopPropagation();
                const id = parseInt(btn.getAttribute('data-id'));
                markAsRead(id);
            });
        });
        
        document.querySelectorAll('.delete-notif').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.stopPropagation();
                const id = parseInt(btn.getAttribute('data-id'));
                showConfirmModal("Delete Notification", "Are you sure you want to delete this notification?", () => {
                    deleteNotification(id);
                });
            });
        });
    }

    // Modal handling
    function showConfirmModal(title, message, onConfirm) {
        const modal = document.getElementById('confirmModal');
        document.getElementById('modalTitle').innerText = title;
        document.getElementById('modalMessage').innerText = message;
        modal.classList.add('active');
        
        pendingAction = onConfirm;
    }

    function closeModal() {
        document.getElementById('confirmModal').classList.remove('active');
        pendingAction = null;
    }

    function confirmAction() {
        if (pendingAction) {
            pendingAction();
        }
        closeModal();
    }

    // Filter tabs
    function bindFilterTabs() {
        const tabs = document.querySelectorAll('.filter-tab');
        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                tabs.forEach(t => t.classList.remove('active'));
                tab.classList.add('active');
                currentFilter = tab.getAttribute('data-filter');
                renderNotifications();
                renderStats();
            });
        });
    }

    // Action buttons
    function bindActionButtons() {
        document.getElementById('markAllReadBtn').addEventListener('click', () => {
            const unreadCount = notifications.filter(n => !n.read).length;
            if (unreadCount === 0) {
                alert("No unread notifications to mark.");
                return;
            }
            showConfirmModal("Mark All as Read", `Mark all ${unreadCount} unread notifications as read?`, () => {
                markAllAsRead();
            });
        });
        
        document.getElementById('clearAllBtn').addEventListener('click', () => {
            if (notifications.length === 0) {
                alert("No notifications to clear.");
                return;
            }
            showConfirmModal("Clear All Notifications", `Delete all ${notifications.length} notifications? This action cannot be undone.`, () => {
                clearAllNotifications();
            });
        });
    }

    function renderAll() {
        renderStats();
        renderNotifications();
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

    // Simulate real-time notification (for demo)
    function simulateNewNotification() {
        setTimeout(() => {
            const newNotif = {
                id: nextId++,
                type: "earning",
                title: "💰 Payment Received",
                message: "You received ₹300 for Plumber Service at Aliganj. Amount credited to wallet.",
                time: "Just now",
                date: "Today",
                read: false,
                iconClass: "earning",
                icon: "fas fa-rupee-sign"
            };
            notifications.unshift(newNotif);
            saveToLocal();
            renderAll();
        }, 5000);
    }

    // Initialize
    function init() {
        loadNotifications();
        bindFilterTabs();
        bindActionButtons();
        renderAll();
        
        // Modal event listeners
        document.getElementById('modalCancelBtn').addEventListener('click', closeModal);
        document.getElementById('modalConfirmBtn').addEventListener('click', confirmAction);
        const modalOverlay = document.getElementById('confirmModal');
        modalOverlay.addEventListener('click', (e) => {
            if (e.target === modalOverlay) closeModal();
        });
        
        // Simulate new notification after 5 seconds (to show real-time feel)
        simulateNewNotification();
    }
    
    init();
</script>
</body>
</html>