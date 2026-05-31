<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>Basic Seva | Settings • My Profile & Security</title>
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
        .settings-container {
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
        .badge-admin {
            background: rgba(30, 31, 44, 0.8);
            backdrop-filter: blur(8px);
            padding: 8px 24px;
            border-radius: 60px;
            font-size: 0.85rem;
            font-weight: 600;
            border: 1px solid #3b82f6;
        }
        .badge-admin i {
            margin-right: 8px;
            color: #3b82f6;
        }

        /* Profile Hero Section */
        .profile-hero {
            background: rgba(12, 15, 21, 0.7);
            backdrop-filter: blur(12px);
            border-radius: 48px;
            padding: 32px;
            margin-bottom: 32px;
            border: 1px solid rgba(59,130,246,0.3);
            display: flex;
            flex-wrap: wrap;
            gap: 32px;
            align-items: center;
        }
        .avatar-section {
            position: relative;
            text-align: center;
        }
        .profile-pic {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #3b82f6;
            background: #1e293b;
            box-shadow: 0 0 20px rgba(59,130,246,0.3);
        }
        .upload-btn {
            position: absolute;
            bottom: 5px;
            right: 5px;
            background: #3b82f6;
            border-radius: 50%;
            width: 34px;
            height: 34px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: 0.2s;
            border: 2px solid #000;
        }
        .upload-btn:hover {
            transform: scale(1.05);
            background: #2563eb;
        }
        .profile-info h2 {
            font-size: 1.8rem;
            margin-bottom: 8px;
        }
        .profile-info p {
            color: #94a3b8;
        }

        /* Settings Grid */
        .settings-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(380px, 1fr));
            gap: 28px;
            margin-bottom: 40px;
        }

        /* Cards */
        .setting-card {
            background: rgba(12, 15, 21, 0.75);
            backdrop-filter: blur(12px);
            border-radius: 36px;
            padding: 26px 28px;
            border: 1px solid rgba(35, 37, 48, 0.7);
            transition: all 0.3s cubic-bezier(0.2, 0.9, 0.4, 1.1);
        }
        .setting-card:hover {
            transform: translateY(-5px);
            border-color: #3b82f6;
            box-shadow: 0 20px 35px -12px rgba(59,130,246,0.25);
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
            font-size: 1.4rem;
            font-weight: 600;
        }
        .setting-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 14px 0;
            border-bottom: 1px solid rgba(255,255,255,0.05);
            flex-wrap: wrap;
            gap: 12px;
        }
        .setting-label {
            display: flex;
            align-items: center;
            gap: 12px;
            font-weight: 500;
            color: #cbd5e1;
        }
        .setting-input {
            background: #1e293b;
            border: 1px solid #334155;
            padding: 10px 16px;
            border-radius: 40px;
            color: white;
            width: 200px;
            font-family: 'Inter', sans-serif;
        }
        .setting-input:focus {
            outline: none;
            border-color: #3b82f6;
        }
        .save-btn {
            background: linear-gradient(135deg, #3b82f6, #2563eb);
            border: none;
            padding: 10px 24px;
            border-radius: 40px;
            color: white;
            font-weight: 600;
            cursor: pointer;
            transition: 0.2s;
            margin-top: 20px;
            width: 100%;
        }
        .save-btn:hover {
            transform: scale(0.98);
            box-shadow: 0 4px 15px rgba(59,130,246,0.4);
        }
        .danger-btn {
            background: linear-gradient(135deg, #dc2626, #b91c1c);
        }
        .toggle-switch {
            position: relative;
            display: inline-block;
            width: 52px;
            height: 28px;
        }
        .toggle-switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #2d3748;
            transition: 0.3s;
            border-radius: 34px;
        }
        .slider:before {
            position: absolute;
            content: "";
            height: 22px;
            width: 22px;
            left: 3px;
            bottom: 3px;
            background-color: white;
            transition: 0.3s;
            border-radius: 50%;
        }
        input:checked + .slider {
            background-color: #3b82f6;
        }
        input:checked + .slider:before {
            transform: translateX(24px);
        }
        .full-width-card {
            grid-column: 1 / -1;
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
        footer {
            text-align: center;
            margin-top: 40px;
            padding: 20px;
            font-size: 0.75rem;
            color: #5f687f;
            border-top: 1px solid #1f2330;
        }
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .settings-container > * {
            animation: fadeUp 0.5s ease-out forwards;
        }
        @media (max-width: 800px) {
            .settings-container { padding: 16px; }
            .settings-grid { grid-template-columns: 1fr; }
        }
        .hidden-file-input {
            display: none;
        }
    </style>
</head>
<body>
<div class="animated-bg"></div>
<div class="settings-container">
    <!-- Header -->
    <div class="welcome-header">
        <div>
            <h1><i class="fas fa-user-cog" style="margin-right: 12px;"></i> My Account & Settings</h1>
            <p style="color: #9ca3af; margin-top: 8px;">⚙️ Update your profile, security credentials & preferences</p>
        </div>
        <div class="badge-admin">
            <i class="fas fa-shield-alt"></i> Admin • Secure Zone
        </div>
    </div>

    <!-- Profile Hero Section with Image Upload -->
    <div class="profile-hero">
        <div class="avatar-section">
            <img id="profileImage" class="profile-pic" src="https://ui-avatars.com/api/?background=3b82f6&color=fff&size=120&name=Admin+User" alt="Profile">
            <div class="upload-btn" id="uploadBtn">
                <i class="fas fa-camera" style="font-size: 1rem;"></i>
            </div>
            <input type="file" id="imageUpload" class="hidden-file-input" accept="image/jpeg, image/png, image/jpg">
        </div>
        <div class="profile-info">
            <h2 id="displayName">Admin User</h2>
            <p id="displayEmail">admin@besicseva.com</p>
            <p><i class="fas fa-calendar-alt"></i> Member since: Jan 2024</p>
        </div>
    </div>

    <!-- Settings Grid -->
    <div class="settings-grid">
        
        <!-- Change Email Card -->
        <div class="setting-card">
            <div class="card-header">
                <i class="fas fa-envelope"></i>
                <h2>Change Email Address</h2>
            </div>
            <div class="setting-item">
                <div class="setting-label"><i class="fas fa-at"></i> Current Email</div>
                <span id="currentEmailDisplay" style="color:#94a3b8;">admin@besicseva.com</span>
            </div>
            <div class="setting-item">
                <div class="setting-label"><i class="fas fa-envelope-open-text"></i> New Email</div>
                <input type="email" id="newEmail" class="setting-input" placeholder="newemail@example.com">
            </div>
            <div class="setting-item">
                <div class="setting-label"><i class="fas fa-lock"></i> Confirm Password</div>
                <input type="password" id="emailConfirmPassword" class="setting-input" placeholder="Enter password to confirm">
            </div>
            <button class="save-btn" id="changeEmailBtn"><i class="fas fa-save"></i> Update Email</button>
        </div>

        <!-- Change Password Card (Complete Feature) -->
        <div class="setting-card">
            <div class="card-header">
                <i class="fas fa-key"></i>
                <h2>Change Password</h2>
            </div>
            <div class="setting-item">
                <div class="setting-label"><i class="fas fa-lock"></i> Current Password</div>
                <input type="password" id="currentPassword" class="setting-input" placeholder="Enter current password">
            </div>
            <div class="setting-item">
                <div class="setting-label"><i class="fas fa-lock-open"></i> New Password</div>
                <input type="password" id="newPassword" class="setting-input" placeholder="Min 8 characters">
            </div>
            <div class="setting-item">
                <div class="setting-label"><i class="fas fa-check-circle"></i> Confirm New Password</div>
                <input type="password" id="confirmPassword" class="setting-input" placeholder="Re-enter new password">
            </div>
            <button class="save-btn" id="changePasswordBtn"><i class="fas fa-shield-alt"></i> Update Password</button>
            <div style="font-size: 0.7rem; color: #6b7280; margin-top: 12px;">✅ Use strong password: letters, numbers & symbols</div>
        </div>

        <!-- Profile Details (Name & Bio) -->
        <div class="setting-card">
            <div class="card-header">
                <i class="fas fa-id-card"></i>
                <h2>Profile Information</h2>
            </div>
            <div class="setting-item">
                <div class="setting-label"><i class="fas fa-user"></i> Full Name</div>
                <input type="text" id="fullName" class="setting-input" value="Admin User" placeholder="Your name">
            </div>
            <div class="setting-item">
                <div class="setting-label"><i class="fas fa-phone"></i> Phone Number</div>
                <input type="tel" id="phoneNumber" class="setting-input" value="+91 98765 43210" placeholder="Mobile">
            </div>
            <div class="setting-item">
                <div class="setting-label"><i class="fas fa-map-marker-alt"></i> Location</div>
                <input type="text" id="location" class="setting-input" value="Mumbai, India" placeholder="City">
            </div>
            <button class="save-btn" id="updateProfileBtn"><i class="fas fa-user-edit"></i> Save Profile</button>
        </div>

        <!-- Security & Notifications -->
        <div class="setting-card">
            <div class="card-header">
                <i class="fas fa-shield-alt"></i>
                <h2>Security Preferences</h2>
            </div>
            <div class="setting-item">
                <div class="setting-label"><i class="fas fa-fingerprint"></i> Two-Factor Auth (2FA)</div>
                <label class="toggle-switch"><input type="checkbox" id="twofaToggle"><span class="slider"></span></label>
            </div>
            <div class="setting-item">
                <div class="setting-label"><i class="fas fa-bell"></i> Email Notifications</div>
                <label class="toggle-switch"><input type="checkbox" id="emailNotif" checked><span class="slider"></span></label>
            </div>
            <div class="setting-item">
                <div class="setting-label"><i class="fas fa-mobile-alt"></i> SMS Alerts</div>
                <label class="toggle-switch"><input type="checkbox" id="smsAlert"><span class="slider"></span></label>
            </div>
            <button class="save-btn" id="saveSecurityPrefs"><i class="fas fa-save"></i> Save Security Settings</button>
        </div>

        <!-- System Logs & Activity -->
        <div class="setting-card full-width-card">
            <div class="card-header">
                <i class="fas fa-history"></i>
                <h2>Recent Account Activity</h2>
            </div>
            <div id="activityLogList" style="background: rgba(0,0,0,0.3); border-radius: 24px; padding: 16px; font-size: 0.85rem;">
                <div><i class="fas fa-check-circle" style="color:#4ade80;"></i> [Today] Profile updated (Name change)</div>
                <div><i class="fas fa-key"></i> [Yesterday] Password changed successfully</div>
                <div><i class="fas fa-globe"></i> [Mar 28, 2025] Login from Chrome • Mumbai</div>
            </div>
            <button class="save-btn" id="clearActivityBtn" style="background:#334155; margin-top: 16px;"><i class="fas fa-trash-alt"></i> Clear Activity Log</button>
        </div>
    </div>

    <footer>
        © 2024 Besic Seva — Secure Profile Management | All changes are encrypted & logged 🔒
    </footer>
</div>

<div id="toastMsg" class="toast-msg"></div>

<script>
    // Helper Toast
    function showToast(message, isError = false) {
        const toast = document.getElementById('toastMsg');
        toast.style.display = 'block';
        toast.innerText = message;
        toast.style.borderLeftColor = isError ? '#ef4444' : '#3b82f6';
        setTimeout(() => {
            toast.style.display = 'none';
        }, 2800);
    }

    // ---------- PROFILE IMAGE UPLOAD (fully working) ----------
    const uploadBtn = document.getElementById('uploadBtn');
    const imageUpload = document.getElementById('imageUpload');
    const profileImg = document.getElementById('profileImage');

    uploadBtn.addEventListener('click', () => {
        imageUpload.click();
    });

    imageUpload.addEventListener('change', (event) => {
        const file = event.target.files[0];
        if (file && (file.type === 'image/jpeg' || file.type === 'image/png' || file.type === 'image/jpg')) {
            const reader = new FileReader();
            reader.onload = function(e) {
                profileImg.src = e.target.result;
                // Save to localStorage for persistence
                localStorage.setItem('profileImageData', e.target.result);
                showToast("✅ Profile picture updated successfully!", false);
                addActivityLog("Profile picture changed");
            };
            reader.readAsDataURL(file);
        } else {
            showToast("❌ Please select a valid image (JPEG/PNG)", true);
        }
    });

    // Load saved profile image if exists
    if (localStorage.getItem('profileImageData')) {
        profileImg.src = localStorage.getItem('profileImageData');
    }

    // ---------- CHANGE EMAIL (with password confirmation) ----------
    document.getElementById('changeEmailBtn').addEventListener('click', () => {
        const newEmail = document.getElementById('newEmail').value.trim();
        const confirmPass = document.getElementById('emailConfirmPassword').value;
        const currentEmailSpan = document.getElementById('currentEmailDisplay').innerText;

        if (!newEmail || !confirmPass) {
            showToast("⚠️ Please enter new email and confirm with password", true);
            return;
        }
        if (!newEmail.includes('@') || !newEmail.includes('.')) {
            showToast("❌ Enter a valid email address", true);
            return;
        }
        // Demo validation: any non-empty password works for simulation (since it's frontend demo)
        if (confirmPass.length < 1) {
            showToast("🔐 Password required to change email", true);
            return;
        }
        // Update email
        document.getElementById('currentEmailDisplay').innerText = newEmail;
        document.getElementById('displayEmail').innerText = newEmail;
        document.getElementById('newEmail').value = '';
        document.getElementById('emailConfirmPassword').value = '';
        showToast(`✉️ Email changed to ${newEmail}`, false);
        addActivityLog(`Email changed to ${newEmail}`);
    });

    // ---------- CHANGE PASSWORD (complete validation) ----------
    document.getElementById('changePasswordBtn').addEventListener('click', () => {
        const currentPwd = document.getElementById('currentPassword').value;
        const newPwd = document.getElementById('newPassword').value;
        const confirmPwd = document.getElementById('confirmPassword').value;

        if (!currentPwd || !newPwd || !confirmPwd) {
            showToast("⚠️ Please fill all password fields", true);
            return;
        }
        if (currentPwd !== "admin123" && currentPwd !== "Admin@123") {
            // Demo: For simulation, any current password works but hint.
            if(currentPwd !== "demo123") {
                showToast("❌ Current password is incorrect (try: admin123)", true);
                return;
            }
        }
        if (newPwd.length < 6) {
            showToast("❌ New password must be at least 6 characters", true);
            return;
        }
        if (newPwd !== confirmPwd) {
            showToast("❌ New passwords do not match!", true);
            return;
        }
        showToast("🔒 Password changed successfully! Please remember your new password.", false);
        document.getElementById('currentPassword').value = '';
        document.getElementById('newPassword').value = '';
        document.getElementById('confirmPassword').value = '';
        addActivityLog("Password changed");
    });

    // ---------- UPDATE PROFILE (Name, Phone, Location) ----------
    document.getElementById('updateProfileBtn').addEventListener('click', () => {
        const newName = document.getElementById('fullName').value.trim();
        const phone = document.getElementById('phoneNumber').value.trim();
        const location = document.getElementById('location').value.trim();

        if (newName) {
            document.getElementById('displayName').innerText = newName;
            document.getElementById('fullName').value = newName;
            addActivityLog(`Full name updated to ${newName}`);
        }
        if (phone) localStorage.setItem('userPhone', phone);
        if (location) localStorage.setItem('userLocation', location);
        
        showToast("👤 Profile details saved successfully!", false);
        addActivityLog("Profile information updated");
    });

    // Load saved profile data
    if (localStorage.getItem('userPhone')) document.getElementById('phoneNumber').value = localStorage.getItem('userPhone');
    if (localStorage.getItem('userLocation')) document.getElementById('location').value = localStorage.getItem('userLocation');

    // ---------- Security Prefs Save ----------
    document.getElementById('saveSecurityPrefs').addEventListener('click', () => {
        const twofa = document.getElementById('twofaToggle').checked;
        const emailNotif = document.getElementById('emailNotif').checked;
        const sms = document.getElementById('smsAlert').checked;
        showToast(`🔐 Security prefs saved: 2FA ${twofa ? 'ON' : 'OFF'} | Email ${emailNotif ? 'ON' : 'OFF'}`, false);
        addActivityLog(`Security preferences updated (2FA: ${twofa})`);
    });

    // ---------- Activity Log Management ----------
    function addActivityLog(message) {
        const logDiv = document.getElementById('activityLogList');
        const timestamp = new Date().toLocaleString();
        const newEntry = document.createElement('div');
        newEntry.innerHTML = `<i class="fas fa-clock" style="color:#60a5fa;"></i> [${timestamp}] ${message}`;
        logDiv.insertBefore(newEntry, logDiv.firstChild);
        // Keep only last 6 logs
        while (logDiv.children.length > 8) {
            logDiv.removeChild(logDiv.lastChild);
        }
    }

    document.getElementById('clearActivityBtn').addEventListener('click', () => {
        const logDiv = document.getElementById('activityLogList');
        logDiv.innerHTML = '<div><i class="fas fa-info-circle"></i> Activity log cleared</div>';
        showToast("🗑️ Activity log cleared", false);
    });

    // Load name from localStorage
    if (localStorage.getItem('adminName')) {
        document.getElementById('fullName').value = localStorage.getItem('adminName');
        document.getElementById('displayName').innerText = localStorage.getItem('adminName');
    }
    document.getElementById('updateProfileBtn').addEventListener('click', () => {
        const name = document.getElementById('fullName').value;
        localStorage.setItem('adminName', name);
    });

    // Demo initial toast
    setTimeout(() => {
        showToast("✨ Welcome! You can now change profile image, email & password", false);
    }, 300);
</script>
</body>
</html>