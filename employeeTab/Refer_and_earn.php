<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>BESIC SEVA - Refer & Earn | Invite Friends, Earn Rewards</title>
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

        .refer-container {
            max-width: 1300px;
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

        /* Hero Banner */
        .hero-banner {
            background: linear-gradient(135deg, #2d8a52 0%, #3aa86a 100%);
            border-radius: 32px;
            padding: 40px 48px;
            margin-bottom: 32px;
            color: white;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            gap: 30px;
        }
        .hero-content h2 {
            font-size: 2rem;
            font-weight: 800;
            margin-bottom: 12px;
        }
        .hero-content p {
            font-size: 1rem;
            opacity: 0.95;
            margin-bottom: 20px;
            max-width: 500px;
        }
        .hero-stats {
            display: flex;
            gap: 30px;
            flex-wrap: wrap;
        }
        .hero-stat {
            text-align: center;
            background: rgba(255,255,255,0.15);
            padding: 16px 24px;
            border-radius: 28px;
            backdrop-filter: blur(10px);
        }
        .hero-stat .value {
            font-size: 2rem;
            font-weight: 800;
        }
        .hero-stat .label {
            font-size: 0.75rem;
            opacity: 0.9;
        }
        .hero-icon {
            font-size: 5rem;
            opacity: 0.9;
        }

        /* Stats Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
            margin-bottom: 32px;
        }
        .stat-card {
            background: white;
            border-radius: 24px;
            padding: 20px 24px;
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
            width: 54px;
            height: 54px;
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

        /* Referral Code Section */
        .referral-section {
            background: white;
            border-radius: 28px;
            padding: 28px 32px;
            margin-bottom: 32px;
            border: 1px solid #eef2f8;
            text-align: center;
        }
        .referral-title {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 16px;
            color: #2d8a52;
        }
        .code-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 16px;
            margin-bottom: 20px;
        }
        .referral-code {
            background: #f8fafd;
            border: 2px dashed #cbdde9;
            padding: 16px 32px;
            border-radius: 60px;
            font-size: 1.5rem;
            font-weight: 800;
            letter-spacing: 4px;
            color: #2d8a52;
            font-family: monospace;
        }
        .copy-btn {
            background: #2d8a52;
            color: white;
            border: none;
            padding: 12px 28px;
            border-radius: 50px;
            font-weight: 600;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: 0.2s;
        }
        .copy-btn:hover {
            background: #236b41;
            transform: scale(0.98);
        }
        .share-buttons {
            display: flex;
            gap: 12px;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 16px;
        }
        .share-btn {
            padding: 10px 24px;
            border-radius: 50px;
            border: none;
            font-weight: 600;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: 0.2s;
        }
        .share-wa { background: #25D366; color: white; }
        .share-fb { background: #1877F2; color: white; }
        .share-twitter { background: #1DA1F2; color: white; }
        .share-btn:hover { transform: scale(0.97); opacity: 0.9; }

        /* Referral History Table */
        .history-section {
            background: white;
            border-radius: 28px;
            padding: 28px 32px;
            border: 1px solid #eef2f8;
        }
        .section-title {
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            gap: 12px;
            border-left: 4px solid #2d8a52;
            padding-left: 18px;
        }
        .table-wrapper {
            overflow-x: auto;
        }
        .referral-table {
            width: 100%;
            border-collapse: collapse;
        }
        .referral-table th, .referral-table td {
            padding: 14px 12px;
            text-align: left;
            border-bottom: 1px solid #f0f4fa;
        }
        .referral-table th {
            font-weight: 700;
            color: #2d8a52;
            font-size: 0.8rem;
        }
        .referral-table td {
            font-size: 0.85rem;
        }
        .status-completed {
            background: #e8f5ed;
            color: #2d8a52;
            padding: 4px 12px;
            border-radius: 30px;
            font-size: 0.7rem;
            font-weight: 600;
            display: inline-block;
        }
        .status-pending {
            background: #fff3e0;
            color: #e67e22;
            padding: 4px 12px;
            border-radius: 30px;
            font-size: 0.7rem;
            font-weight: 600;
            display: inline-block;
        }
        .empty-state {
            text-align: center;
            padding: 50px;
            color: #95adc7;
        }

        /* How It Works */
        .howitworks-section {
            background: white;
            border-radius: 28px;
            padding: 28px 32px;
            margin-top: 32px;
            border: 1px solid #eef2f8;
        }
        .steps-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 24px;
            margin-top: 20px;
        }
        .step-card {
            text-align: center;
            padding: 24px;
        }
        .step-number {
            width: 48px;
            height: 48px;
            background: #2d8a52;
            color: white;
            border-radius: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            font-weight: 800;
            margin: 0 auto 16px;
        }
        .step-card h4 {
            font-size: 1rem;
            margin-bottom: 8px;
        }
        .step-card p {
            font-size: 0.8rem;
            color: #6f8fae;
        }

        @media (max-width: 780px) {
            body { padding: 16px; }
            .hero-banner { padding: 28px; flex-direction: column; text-align: center; }
            .hero-content h2 { font-size: 1.5rem; }
            .hero-icon { font-size: 3rem; }
            .referral-code { font-size: 1rem; padding: 12px 20px; letter-spacing: 2px; }
            .stats-grid { gap: 12px; }
            .stat-card { padding: 14px; }
            .stat-icon { width: 44px; height: 44px; font-size: 1.2rem; }
            .stat-info h3 { font-size: 1.4rem; }
            .referral-table th, .referral-table td { padding: 10px 8px; font-size: 0.75rem; }
            .steps-grid { gap: 16px; }
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
<div class="refer-container">
    <!-- Header -->
    <div class="page-header">
        <h1><i class="fas fa-gift"></i> Refer & Earn</h1>
        <div class="header-badge"><i class="fas fa-users"></i> Invite Friends • Earn Rewards</div>
    </div>

    <!-- Hero Banner -->
    <div class="hero-banner">
        <div class="hero-content">
            <h2>Invite Friends, Earn ₹200 Each!</h2>
            <p>Share your unique referral code with friends. When they join BESIC SEVA and complete their first job, you both get ₹200 bonus!</p>
            <div class="hero-stats">
                <div class="hero-stat">
                    <div class="value">₹200</div>
                    <div class="label">Per Referral</div>
                </div>
                <div class="hero-stat">
                    <div class="value">Unlimited</div>
                    <div class="label">No Limit</div>
                </div>
                <div class="hero-stat">
                    <div class="value">Instant</div>
                    <div class="label">Credits</div>
                </div>
            </div>
        </div>
        <div class="hero-icon">
            <i class="fas fa-handshake"></i>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="stats-grid" id="statsGrid"></div>

    <!-- Referral Code Section -->
    <div class="referral-section">
        <div class="referral-title"><i class="fas fa-share-alt"></i> Your Unique Referral Code</div>
        <div class="code-container">
            <div class="referral-code" id="referralCode">BESIC2024</div>
            <button class="copy-btn" id="copyCodeBtn"><i class="fas fa-copy"></i> Copy Code</button>
        </div>
        <div class="share-buttons">
            <button class="share-btn share-wa" id="shareWA"><i class="fab fa-whatsapp"></i> WhatsApp</button>
            <button class="share-btn share-fb" id="shareFB"><i class="fab fa-facebook-f"></i> Facebook</button>
            <button class="share-btn share-twitter" id="shareTwitter"><i class="fab fa-twitter"></i> Twitter</button>
        </div>
        <p style="font-size: 0.7rem; margin-top: 16px; color: #6f8fae;">
            <i class="fas fa-info-circle"></i> Share this code with friends. They'll enter it during signup.
        </p>
    </div>

    <!-- Referral History -->
    <div class="history-section">
        <div class="section-title">
            <i class="fas fa-history"></i> Referral History
        </div>
        <div class="table-wrapper">
            <table class="referral-table" id="referralTable">
                <thead>
                    <tr><th>Friend Name</th><th>Referred On</th><th>Status</th><th>Bonus Earned</th></tr>
                </thead>
                <tbody id="referralTableBody"></tbody>
            </table>
        </div>
    </div>

    <!-- How It Works -->
    <div class="howitworks-section">
        <div class="section-title">
            <i class="fas fa-question-circle"></i> How It Works
        </div>
        <div class="steps-grid">
            <div class="step-card">
                <div class="step-number">1</div>
                <h4>Share Your Code</h4>
                <p>Share your unique referral code with friends via WhatsApp, SMS, or social media.</p>
            </div>
            <div class="step-card">
                <div class="step-number">2</div>
                <h4>Friend Joins</h4>
                <p>Your friend signs up on BESIC SEVA using your referral code.</p>
            </div>
            <div class="step-card">
                <div class="step-number">3</div>
                <h4>Complete First Job</h4>
                <p>Your friend completes their first service job successfully.</p>
            </div>
            <div class="step-card">
                <div class="step-number">4</div>
                <h4>Earn Rewards</h4>
                <p>You both get ₹200 instantly credited to your wallet!</p>
            </div>
        </div>
    </div>
    <div class="footer-note">
        <i class="fas fa-trophy"></i> Unlimited referrals • No expiry • Bonus credited within 24 hours of friend's first job completion
    </div>
</div>

<script>
    // ------------------------------
    // REFER & EARN DATA (LocalStorage)
    // ------------------------------
    let referralData = {
        userCode: "BESIC2024",
        totalReferrals: 8,
        totalEarned: 1600,
        pendingBonus: 400,
        referrals: [
            { id: 1, name: "Rahul Sharma", referredOn: "15 May 2024", status: "completed", bonus: 200 },
            { id: 2, name: "Priya Patel", referredOn: "18 May 2024", status: "completed", bonus: 200 },
            { id: 3, name: "Amit Verma", referredOn: "20 May 2024", status: "completed", bonus: 200 },
            { id: 4, name: "Sneha Singh", referredOn: "22 May 2024", status: "completed", bonus: 200 },
            { id: 5, name: "Vikash Kumar", referredOn: "24 May 2024", status: "completed", bonus: 200 },
            { id: 6, name: "Neha Gupta", referredOn: "25 May 2024", status: "completed", bonus: 200 },
            { id: 7, name: "Rajesh Mishra", referredOn: "26 May 2024", status: "pending", bonus: 0 },
            { id: 8, name: "Anjali Mehta", referredOn: "27 May 2024", status: "pending", bonus: 0 }
        ]
    };

    // Load from localStorage
    function loadReferralData() {
        const stored = localStorage.getItem('besic_referral_data');
        if (stored) {
            referralData = JSON.parse(stored);
        } else {
            saveReferralData();
        }
        updateStatsFromReferrals();
    }

    function saveReferralData() {
        localStorage.setItem('besic_referral_data', JSON.stringify(referralData));
    }

    function updateStatsFromReferrals() {
        const completedCount = referralData.referrals.filter(r => r.status === 'completed').length;
        const pendingCount = referralData.referrals.filter(r => r.status === 'pending').length;
        const totalEarnedCalc = referralData.referrals.filter(r => r.status === 'completed').reduce((sum, r) => sum + r.bonus, 0);
        const pendingBonusCalc = referralData.referrals.filter(r => r.status === 'pending').length * 200;
        
        referralData.totalReferrals = referralData.referrals.length;
        referralData.totalEarned = totalEarnedCalc;
        referralData.pendingBonus = pendingBonusCalc;
        
        saveReferralData();
    }

    function renderStats() {
        document.getElementById('statsGrid').innerHTML = `
            <div class="stat-card"><div class="stat-icon"><i class="fas fa-users"></i></div><div class="stat-info"><h3>${referralData.totalReferrals}</h3><p>Total Referrals</p></div></div>
            <div class="stat-card"><div class="stat-icon"><i class="fas fa-rupee-sign"></i></div><div class="stat-info"><h3>₹${referralData.totalEarned}</h3><p>Total Earned</p></div></div>
            <div class="stat-card"><div class="stat-icon"><i class="fas fa-clock"></i></div><div class="stat-info"><h3>₹${referralData.pendingBonus}</h3><p>Pending Bonus</p></div></div>
            <div class="stat-card"><div class="stat-icon"><i class="fas fa-trophy"></i></div><div class="stat-info"><h3>Unlimited</h3><p>Referral Limit</p></div></div>
        `;
    }

    function renderReferralTable() {
        const tbody = document.getElementById('referralTableBody');
        if (!referralData.referrals.length) {
            tbody.innerHTML = '<tr><td colspan="4" class="empty-state">No referrals yet. Share your code to start earning!</td></tr>';
            return;
        }
        
        let html = '';
        referralData.referrals.forEach(ref => {
            const statusClass = ref.status === 'completed' ? 'status-completed' : 'status-pending';
            const statusText = ref.status === 'completed' ? 'Completed ✓' : 'Pending';
            const bonusText = ref.status === 'completed' ? `₹${ref.bonus}` : '—';
            html += `
                <tr>
                    <td>${escapeHtml(ref.name)}</td>
                    <td>${ref.referredOn}</td>
                    <td><span class="${statusClass}">${statusText}</span></td>
                    <td><strong>${bonusText}</strong></td>
                </tr>
            `;
        });
        tbody.innerHTML = html;
    }

    // Copy referral code
    function copyReferralCode() {
        const code = referralData.userCode;
        navigator.clipboard.writeText(code).then(() => {
            const btn = document.getElementById('copyCodeBtn');
            const originalText = btn.innerHTML;
            btn.innerHTML = '<i class="fas fa-check"></i> Copied!';
            setTimeout(() => {
                btn.innerHTML = originalText;
            }, 2000);
            alert(`✅ Referral code "${code}" copied to clipboard!`);
        }).catch(() => {
            alert("Press Ctrl+C to copy: " + code);
        });
    }

    // Share functions
    function shareOnWhatsApp() {
        const text = `Join BESIC SEVA using my referral code: ${referralData.userCode} and earn ₹200 bonus! Download the app now.`;
        window.open(`https://wa.me/?text=${encodeURIComponent(text)}`, '_blank');
    }

    function shareOnFacebook() {
        const url = "https://besicseva.com/refer";
        const text = `Join BESIC SEVA using my referral code: ${referralData.userCode} and earn ₹200 bonus!`;
        window.open(`https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(url)}&quote=${encodeURIComponent(text)}`, '_blank');
    }

    function shareOnTwitter() {
        const text = `Join BESIC SEVA using my referral code: ${referralData.userCode} and earn ₹200 bonus! @BESICSEVA`;
        window.open(`https://twitter.com/intent/tweet?text=${encodeURIComponent(text)}`, '_blank');
    }

    // Simulate new referral (for demo - add a new referral)
    function addDemoReferral() {
        // This is just for demonstration - adds a new pending referral every 30 seconds
        // But we'll make it optional so user doesn't get confused
        // Actually we'll not auto-add, but provide a small simulate button (hidden)
    }

    // For demo - allow admin to mark pending as completed (simulate friend completing job)
    function setupDemoActions() {
        // Add a small floating action for demo - double click on stats to simulate completion
        const statsContainer = document.getElementById('statsGrid');
        if (statsContainer) {
            statsContainer.addEventListener('dblclick', () => {
                const pendingRefs = referralData.referrals.filter(r => r.status === 'pending');
                if (pendingRefs.length > 0) {
                    const firstPending = pendingRefs[0];
                    firstPending.status = 'completed';
                    firstPending.bonus = 200;
                    updateStatsFromReferrals();
                    renderStats();
                    renderReferralTable();
                    saveReferralData();
                    alert(`🎉 Demo: ${firstPending.name} completed their first job! ₹200 credited to your wallet.`);
                } else {
                    alert("No pending referrals to simulate completion.");
                }
            });
        }
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

    // Initialize
    function init() {
        loadReferralData();
        renderStats();
        renderReferralTable();
        
        // Event listeners
        document.getElementById('copyCodeBtn').addEventListener('click', copyReferralCode);
        document.getElementById('shareWA').addEventListener('click', shareOnWhatsApp);
        document.getElementById('shareFB').addEventListener('click', shareOnFacebook);
        document.getElementById('shareTwitter').addEventListener('click', shareOnTwitter);
        
        setupDemoActions();
        
        // Display referral code
        document.getElementById('referralCode').innerText = referralData.userCode;
    }
    
    init();
</script>
</body>
</html>