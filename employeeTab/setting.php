<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>BESIC SEVA - Advanced Settings | Account Management</title>
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

        .settings-container {
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

        /* Settings Layout */
        .settings-layout {
            display: flex;
            flex-wrap: wrap;
            gap: 28px;
        }

        /* Sidebar Navigation */
        .settings-sidebar {
            flex: 0 0 300px;
            background: white;
            border-radius: 28px;
            padding: 24px 16px;
            border: 1px solid #eef2f8;
            height: fit-content;
            position: sticky;
            top: 20px;
        }
        .profile-mini {
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 16px;
            background: #e8f5ed;
            border-radius: 24px;
            margin-bottom: 24px;
        }
        .profile-mini-avatar {
            width: 56px;
            height: 56px;
            background: #2d8a52;
            border-radius: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
        }
        .profile-mini-info h4 {
            font-size: 1rem;
            margin-bottom: 4px;
        }
        .profile-mini-info p {
            font-size: 0.7rem;
            color: #5c7a9a;
        }
        .settings-nav-item {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 14px 18px;
            margin: 4px 0;
            border-radius: 20px;
            font-weight: 500;
            font-size: 0.9rem;
            color: #4a627a;
            cursor: pointer;
            transition: 0.2s;
        }
        .settings-nav-item i {
            width: 24px;
            font-size: 1.1rem;
            color: #8aa0b8;
        }
        .settings-nav-item:hover {
            background: #f0f4f9;
        }
        .settings-nav-item.active {
            background: #e8f5ed;
            color: #2d8a52;
        }
        .settings-nav-item.active i {
            color: #2d8a52;
        }

        /* Content Panel */
        .settings-content {
            flex: 1;
            background: white;
            border-radius: 28px;
            border: 1px solid #eef2f8;
            overflow: hidden;
        }
        .settings-pane {
            display: none;
            padding: 32px;
            animation: fadeIn 0.3s ease;
        }
        .settings-pane.active-pane {
            display: block;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(5px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .pane-title {
            font-size: 1.4rem;
            font-weight: 700;
            margin-bottom: 24px;
            border-left: 4px solid #2d8a52;
            padding-left: 18px;
        }

        /* Form Styles */
        .form-group {
            margin-bottom: 24px;
        }
        .form-group label {
            display: block;
            font-weight: 600;
            font-size: 0.85rem;
            margin-bottom: 8px;
            color: #2c3e50;
        }
        .form-group input, .form-group select, .form-group textarea {
            width: 100%;
            padding: 14px 18px;
            border: 1px solid #e2e8f0;
            border-radius: 20px;
            font-family: 'Inter', sans-serif;
            font-size: 0.9rem;
            transition: 0.2s;
            background: #fefefe;
        }
        .form-group input:focus, .form-group select:focus, .form-group textarea:focus {
            outline: none;
            border-color: #2d8a52;
            box-shadow: 0 0 0 3px rgba(45, 138, 82, 0.1);
        }
        .btn-save {
            background: #2d8a52;
            color: white;
            border: none;
            padding: 12px 32px;
            border-radius: 50px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.2s;
        }
        .btn-save:hover {
            background: #236b41;
            transform: scale(0.98);
        }
        .btn-danger {
            background: #e74c3c;
            color: white;
            border: none;
            padding: 12px 28px;
            border-radius: 50px;
            font-weight: 600;
            cursor: pointer;
        }
        .btn-danger:hover {
            background: #c0392b;
        }
        .btn-secondary {
            background: #95a5a6;
            color: white;
            border: none;
            padding: 12px 28px;
            border-radius: 50px;
            font-weight: 600;
            cursor: pointer;
        }

        /* Toggle Switch */
        .toggle-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 16px 0;
            border-bottom: 1px solid #f0f4fa;
        }
        .toggle-info h4 {
            font-size: 1rem;
            margin-bottom: 4px;
        }
        .toggle-info p {
            font-size: 0.75rem;
            color: #6f8fae;
        }
        .switch {
            position: relative;
            display: inline-block;
            width: 52px;
            height: 28px;
        }
        .switch input {
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
            background-color: #cbdde9;
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
            background-color: #2d8a52;
        }
        input:checked + .slider:before {
            transform: translateX(24px);
        }

        /* Language Grid */
        .language-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(140px, 1fr));
            gap: 12px;
            margin-top: 16px;
        }
        .lang-option {
            padding: 12px 16px;
            border: 1px solid #e2e8f0;
            border-radius: 20px;
            text-align: center;
            cursor: pointer;
            transition: 0.2s;
        }
        .lang-option:hover {
            border-color: #2d8a52;
            background: #e8f5ed;
        }
        .lang-option.active {
            background: #2d8a52;
            color: white;
            border-color: #2d8a52;
        }

        /* Payment Methods */
        .payment-method-card {
            border: 1px solid #e2e8f0;
            border-radius: 20px;
            padding: 16px;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 12px;
        }
        .payment-method-info {
            display: flex;
            align-items: center;
            gap: 14px;
        }
        .payment-icon {
            width: 48px;
            height: 48px;
            background: #e8f5ed;
            border-radius: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            color: #2d8a52;
        }
        .add-payment-btn {
            background: #f0f4f9;
            border: 1px dashed #cbdde9;
            padding: 14px;
            border-radius: 20px;
            text-align: center;
            cursor: pointer;
            transition: 0.2s;
            color: #2d8a52;
        }
        .add-payment-btn:hover {
            background: #e8f5ed;
        }

        /* Schedule Settings */
        .schedule-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 0;
            border-bottom: 1px solid #f0f4fa;
        }
        .schedule-day {
            font-weight: 600;
            width: 100px;
        }
        .schedule-time {
            display: flex;
            gap: 12px;
            align-items: center;
        }
        .schedule-time input {
            padding: 8px 12px;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
        }

        /* Data Management */
        .data-card {
            background: #f8fafd;
            border-radius: 20px;
            padding: 20px;
            margin-bottom: 16px;
        }

        @media (max-width: 780px) {
            body { padding: 16px; }
            .settings-sidebar { flex: 0 0 100%; position: static; margin-bottom: 16px; }
            .settings-nav-item { padding: 12px 16px; }
            .settings-pane { padding: 20px; }
            .pane-title { font-size: 1.2rem; }
            .payment-method-card { flex-direction: column; align-items: flex-start; }
        }

        .footer-note {
            text-align: center;
            font-size: 0.7rem;
            color: #8aa0b8;
            margin-top: 28px;
        }
        hr {
            margin: 20px 0;
            border-color: #eef2f8;
        }
        .toast-message {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background: #2d8a52;
            color: white;
            padding: 12px 24px;
            border-radius: 50px;
            font-size: 0.85rem;
            z-index: 3000;
            animation: slideIn 0.3s ease;
        }
        @keyframes slideIn {
            from { transform: translateX(100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
    </style>
</head>
<body>
<div class="settings-container">
    <!-- Header -->
    <div class="page-header">
        <h1><i class="fas fa-sliders-h"></i> Advanced Settings</h1>
        <div class="header-badge"><i class="fas fa-user-cog"></i> Full Control • Your Account</div>
    </div>

    <div class="settings-layout">
        <!-- Sidebar Navigation -->
        <div class="settings-sidebar">
            <div class="profile-mini">
                <div class="profile-mini-avatar"><i class="fas fa-user"></i></div>
                <div class="profile-mini-info">
                    <h4>Amit Kumar</h4>
                    <p>Electrician • Lucknow</p>
                    <p style="font-size: 0.65rem;">⭐ 4.8 ★ (98% completion)</p>
                </div>
            </div>
            <div class="settings-nav-item active" data-pane="profile">
                <i class="fas fa-user-circle"></i> Profile
            </div>
            <div class="settings-nav-item" data-pane="security">
                <i class="fas fa-lock"></i> Security & Login
            </div>
            <div class="settings-nav-item" data-pane="payment">
                <i class="fas fa-wallet"></i> Payment Methods
            </div>
            <div class="settings-nav-item" data-pane="notifications">
                <i class="fas fa-bell"></i> Notifications
            </div>
            <div class="settings-nav-item" data-pane="schedule">
                <i class="fas fa-calendar-alt"></i> Work Schedule
            </div>
            <div class="settings-nav-item" data-pane="privacy">
                <i class="fas fa-shield-alt"></i> Privacy
            </div>
            <div class="settings-nav-item" data-pane="language">
                <i class="fas fa-language"></i> Language
            </div>
            <div class="settings-nav-item" data-pane="data">
                <i class="fas fa-database"></i> Data Management
            </div>
            <div class="settings-nav-item" data-pane="support">
                <i class="fas fa-headset"></i> Support
            </div>
            <hr>
            <div class="settings-nav-item" data-pane="danger">
                <i class="fas fa-exclamation-triangle"></i> Danger Zone
            </div>
        </div>

        <!-- Content Panels -->
        <div class="settings-content">
            <!-- Profile Pane -->
            <div class="settings-pane active-pane" id="pane-profile">
                <div class="pane-title"><i class="fas fa-user-edit"></i> Profile Information</div>
                <form id="profileForm">
                    <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" id="fullName" value="Amit Kumar" placeholder="Enter your full name">
                    </div>
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" id="email" value="amit.kumar@besicseva.com" placeholder="your@email.com">
                    </div>
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="tel" id="phone" value="+91 98765 43210" placeholder="Mobile number">
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <textarea id="address" rows="3" placeholder="Your complete address">Lucknow, Uttar Pradesh, India - 226001</textarea>
                    </div>
                    <div class="form-group">
                        <label>Skills / Expertise</label>
                        <input type="text" id="skills" value="Electrician, Plumbing, AC Repair, Smart Home Installation" placeholder="e.g., Electrician, Plumber">
                    </div>
                    <div class="form-group">
                        <label>Profile Photo</label>
                        <input type="file" id="profilePhoto" accept="image/*">
                        <small style="color: #6f8fae;">Upload a profile picture (JPG, PNG)</small>
                    </div>
                    <button type="submit" class="btn-save"><i class="fas fa-save"></i> Save Changes</button>
                </form>
            </div>

            <!-- Security Pane -->
            <div class="settings-pane" id="pane-security">
                <div class="pane-title"><i class="fas fa-shield-alt"></i> Security & Login</div>
                <form id="passwordForm">
                    <div class="form-group">
                        <label>Current Password</label>
                        <input type="password" id="currentPassword" placeholder="Enter current password">
                    </div>
                    <div class="form-group">
                        <label>New Password</label>
                        <input type="password" id="newPassword" placeholder="Enter new password">
                        <small>Minimum 8 characters with uppercase, lowercase & number</small>
                    </div>
                    <div class="form-group">
                        <label>Confirm New Password</label>
                        <input type="password" id="confirmPassword" placeholder="Confirm new password">
                    </div>
                    <button type="submit" class="btn-save"><i class="fas fa-key"></i> Update Password</button>
                </form>
                <hr>
                <div class="toggle-item" style="border: none; padding: 8px 0;">
                    <div class="toggle-info">
                        <h4>Two-Factor Authentication (2FA)</h4>
                        <p>Add an extra layer of security to your account</p>
                    </div>
                    <label class="switch">
                        <input type="checkbox" id="twoFactorToggle">
                        <span class="slider"></span>
                    </label>
                </div>
                <div class="form-group" style="margin-top: 20px;">
                    <label>Trusted Devices</label>
                    <div class="data-card">
                        <p><i class="fas fa-mobile-alt"></i> iPhone 13 - Last login: Today, 09:30 AM</p>
                        <p><i class="fas fa-laptop"></i> Windows Laptop - Last login: Yesterday, 08:15 PM</p>
                        <button class="btn-secondary" style="margin-top: 10px; padding: 6px 16px; font-size: 0.75rem;">Revoke All Devices</button>
                    </div>
                </div>
            </div>

            <!-- Payment Methods Pane -->
            <div class="settings-pane" id="pane-payment">
                <div class="pane-title"><i class="fas fa-credit-card"></i> Payment Methods</div>
                <div id="paymentMethodsList">
                    <div class="payment-method-card">
                        <div class="payment-method-info">
                            <div class="payment-icon"><i class="fab fa-google-pay"></i></div>
                            <div><strong>Google Pay</strong><br>amit@okicici</div>
                        </div>
                        <button class="btn-secondary" style="padding: 6px 16px; font-size: 0.7rem;">Set Default</button>
                    </div>
                    <div class="payment-method-card">
                        <div class="payment-method-info">
                            <div class="payment-icon"><i class="fas fa-university"></i></div>
                            <div><strong>Bank Account</strong><br>State Bank of India • ****1234</div>
                        </div>
                        <button class="btn-secondary" style="padding: 6px 16px; font-size: 0.7rem;">Set Default</button>
                    </div>
                </div>
                <div class="add-payment-btn" id="addPaymentBtn">
                    <i class="fas fa-plus-circle"></i> Add New Payment Method
                </div>
                <hr>
                <div class="form-group">
                    <label>Payout Settings</label>
                    <select id="payoutFrequency">
                        <option>Instant (upon completion)</option>
                        <option>Daily Settlement</option>
                        <option selected>Weekly Settlement</option>
                        <option>Monthly Settlement</option>
                    </select>
                </div>
                <button class="btn-save" id="savePayoutBtn">Save Payout Settings</button>
            </div>

            <!-- Notifications Pane -->
            <div class="settings-pane" id="pane-notifications">
                <div class="pane-title"><i class="fas fa-bell"></i> Notification Preferences</div>
                <div class="toggle-item">
                    <div class="toggle-info">
                        <h4>Push Notifications</h4>
                        <p>Receive real-time alerts on your device</p>
                    </div>
                    <label class="switch"><input type="checkbox" id="pushNotif" checked><span class="slider"></span></label>
                </div>
                <div class="toggle-item">
                    <div class="toggle-info">
                        <h4>Email Notifications</h4>
                        <p>Get updates via email about jobs and earnings</p>
                    </div>
                    <label class="switch"><input type="checkbox" id="emailNotif" checked><span class="slider"></span></label>
                </div>
                <div class="toggle-item">
                    <div class="toggle-info">
                        <h4>SMS Alerts</h4>
                        <p>Receive SMS for urgent job updates</p>
                    </div>
                    <label class="switch"><input type="checkbox" id="smsNotif"><span class="slider"></span></label>
                </div>
                <div class="toggle-item">
                    <div class="toggle-info">
                        <h4>Job Alerts</h4>
                        <p>Notify when new jobs are available in your area</p>
                    </div>
                    <label class="switch"><input type="checkbox" id="jobAlerts" checked><span class="slider"></span></label>
                </div>
                <div class="toggle-item">
                    <div class="toggle-info">
                        <h4>Earnings Updates</h4>
                        <p>Get notified when you receive payments</p>
                    </div>
                    <label class="switch"><input type="checkbox" id="earningAlerts" checked><span class="slider"></span></label>
                </div>
                <button class="btn-save" id="saveNotifBtn"><i class="fas fa-save"></i> Save Preferences</button>
            </div>

            <!-- Work Schedule Pane -->
            <div class="settings-pane" id="pane-schedule">
                <div class="pane-title"><i class="fas fa-calendar-alt"></i> Work Schedule</div>
                <div id="scheduleList"></div>
                <button class="btn-save" id="saveScheduleBtn">Save Schedule</button>
            </div>

            <!-- Privacy Pane -->
            <div class="settings-pane" id="pane-privacy">
                <div class="pane-title"><i class="fas fa-user-secret"></i> Privacy Settings</div>
                <div class="toggle-item">
                    <div class="toggle-info"><h4>Profile Visibility</h4><p>Make your profile visible to customers</p></div>
                    <label class="switch"><input type="checkbox" id="profileVisibility" checked><span class="slider"></span></label>
                </div>
                <div class="toggle-item">
                    <div class="toggle-info"><h4>Show Earnings Publicly</h4><p>Display your earnings badge on profile</p></div>
                    <label class="switch"><input type="checkbox" id="showEarnings"><span class="slider"></span></label>
                </div>
                <div class="toggle-item">
                    <div class="toggle-info"><h4>Data Sharing</h4><p>Allow anonymous data for service improvement</p></div>
                    <label class="switch"><input type="checkbox" id="dataSharing" checked><span class="slider"></span></label>
                </div>
                <div class="toggle-item">
                    <div class="toggle-info"><h4>Location Sharing</h4><p>Share live location for better job matching</p></div>
                    <label class="switch"><input type="checkbox" id="locationSharing" checked><span class="slider"></span></label>
                </div>
                <button class="btn-save" id="savePrivacyBtn"><i class="fas fa-save"></i> Save Privacy Settings</button>
            </div>

            <!-- Language Pane -->
            <div class="settings-pane" id="pane-language">
                <div class="pane-title"><i class="fas fa-globe"></i> Language Preference</div>
                <div class="language-grid" id="languageGrid">
                    <div class="lang-option active" data-lang="en">English</div>
                    <div class="lang-option" data-lang="hi">हिन्दी (Hindi)</div>
                    <div class="lang-option" data-lang="bn">বাংলা (Bengali)</div>
                    <div class="lang-option" data-lang="te">తెలుగు (Telugu)</div>
                    <div class="lang-option" data-lang="mr">मराठी (Marathi)</div>
                    <div class="lang-option" data-lang="ta">தமிழ் (Tamil)</div>
                    <div class="lang-option" data-lang="ur">اردو (Urdu)</div>
                    <div class="lang-option" data-lang="gu">ગુજરાતી (Gujarati)</div>
                </div>
            </div>

            <!-- Data Management Pane -->
            <div class="settings-pane" id="pane-data">
                <div class="pane-title"><i class="fas fa-database"></i> Data Management</div>
                <div class="data-card">
                    <h4><i class="fas fa-download"></i> Export My Data</h4>
                    <p>Download all your personal data, job history, and earnings records.</p>
                    <button class="btn-save" id="exportDataBtn" style="margin-top: 12px;">Export Data (JSON)</button>
                </div>
                <div class="data-card">
                    <h4><i class="fas fa-chart-line"></i> Analytics & Reports</h4>
                    <p>View your performance reports and earning analytics.</p>
                    <button class="btn-secondary" id="viewReportsBtn">View Reports</button>
                </div>
                <div class="data-card">
                    <h4><i class="fas fa-history"></i> Activity Log</h4>
                    <p>Last login: Today at 09:30 AM • Password changed: 15 May 2024</p>
                    <button class="btn-secondary">View Full Activity Log</button>
                </div>
            </div>

            <!-- Support Pane -->
            <div class="settings-pane" id="pane-support">
                <div class="pane-title"><i class="fas fa-life-ring"></i> Support & Help</div>
                <div class="form-group">
                    <label>Issue / Query Type</label>
                    <select id="supportType">
                        <option>Account Issue</option>
                        <option>Payment Problem</option>
                        <option>Technical Issue</option>
                        <option>Job Related</option>
                        <option>Feature Request</option>
                        <option>Other</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Subject</label>
                    <input type="text" id="supportSubject" placeholder="Brief subject line">
                </div>
                <div class="form-group">
                    <label>Describe your issue</label>
                    <textarea id="supportMessage" rows="4" placeholder="Please provide details about your issue..."></textarea>
                </div>
                <div class="form-group">
                    <label>Attach Screenshot (Optional)</label>
                    <input type="file" accept="image/*">
                </div>
                <button class="btn-save" id="submitSupportBtn"><i class="fas fa-paper-plane"></i> Submit Request</button>
                <hr>
                <div class="form-group">
                    <label>Emergency Support</label>
                    <p style="background: #f0f4f9; padding: 14px; border-radius: 20px;">
                        <i class="fas fa-phone-alt"></i> <strong>24/7 Helpline:</strong> +91 1800 123 4567<br>
                        <i class="fas fa-envelope"></i> <strong>Email:</strong> support@besicseva.com<br>
                        <i class="fab fa-whatsapp"></i> <strong>WhatsApp:</strong> +91 98765 43210
                    </p>
                </div>
            </div>

            <!-- Danger Zone Pane -->
            <div class="settings-pane" id="pane-danger">
                <div class="pane-title"><i class="fas fa-exclamation-triangle"></i> Danger Zone</div>
                <div style="background: #fff5f5; border: 1px solid #fcd6d6; border-radius: 24px; padding: 24px;">
                    <h4 style="color: #e74c3c; margin-bottom: 12px;">⚠️ Delete Account</h4>
                    <p style="font-size: 0.85rem; color: #5c7a9a; margin-bottom: 20px;">Once you delete your account, all your data including earnings, job history, and documents will be permanently removed. This action cannot be undone.</p>
                    <button class="btn-danger" id="deleteAccountBtn"><i class="fas fa-trash-alt"></i> Delete My Account</button>
                </div>
                <hr>
                <div style="background: #fff8e8; border: 1px solid #fde6b6; border-radius: 24px; padding: 24px; margin-top: 20px;">
                    <h4 style="color: #e67e22; margin-bottom: 12px;">📤 Deactivate Account</h4>
                    <p style="font-size: 0.85rem; color: #5c7a9a; margin-bottom: 20px;">Temporarily deactivate your account. You can reactivate anytime by logging in.</p>
                    <button class="btn-save" id="deactivateBtn" style="background: #e67e22;"><i class="fas fa-pause-circle"></i> Deactivate Account</button>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-note">
        <i class="fas fa-lock"></i> Your data is secure • Settings saved locally
    </div>
</div>

<script>
    // Schedule Data
    const weekDays = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
    let workSchedule = {
        Monday: { enabled: true, start: '09:00', end: '18:00' },
        Tuesday: { enabled: true, start: '09:00', end: '18:00' },
        Wednesday: { enabled: true, start: '09:00', end: '18:00' },
        Thursday: { enabled: true, start: '09:00', end: '18:00' },
        Friday: { enabled: true, start: '09:00', end: '18:00' },
        Saturday: { enabled: true, start: '10:00', end: '16:00' },
        Sunday: { enabled: false, start: '00:00', end: '00:00' }
    };

    function renderSchedule() {
        const container = document.getElementById('scheduleList');
        let html = '';
        weekDays.forEach(day => {
            const schedule = workSchedule[day];
            html += `
                <div class="schedule-item">
                    <div class="schedule-day">${day}</div>
                    <div class="schedule-time">
                        <input type="time" id="start_${day}" value="${schedule.start}" ${!schedule.enabled ? 'disabled' : ''}>
                        <span>to</span>
                        <input type="time" id="end_${day}" value="${schedule.end}" ${!schedule.enabled ? 'disabled' : ''}>
                        <label class="switch" style="margin-left: 15px;">
                            <input type="checkbox" class="schedule-toggle" data-day="${day}" ${schedule.enabled ? 'checked' : ''}>
                            <span class="slider"></span>
                        </label>
                    </div>
                </div>
            `;
        });
        container.innerHTML = html;
        
        document.querySelectorAll('.schedule-toggle').forEach(toggle => {
            toggle.addEventListener('change', (e) => {
                const day = toggle.getAttribute('data-day');
                const startInput = document.getElementById(`start_${day}`);
                const endInput = document.getElementById(`end_${day}`);
                if (toggle.checked) {
                    startInput.disabled = false;
                    endInput.disabled = false;
                    workSchedule[day].enabled = true;
                } else {
                    startInput.disabled = true;
                    endInput.disabled = true;
                    workSchedule[day].enabled = false;
                }
            });
        });
    }

    function saveSchedule() {
        weekDays.forEach(day => {
            if (workSchedule[day].enabled) {
                workSchedule[day].start = document.getElementById(`start_${day}`).value;
                workSchedule[day].end = document.getElementById(`end_${day}`).value;
            }
        });
        localStorage.setItem('besic_work_schedule', JSON.stringify(workSchedule));
        showToast('✅ Work schedule saved successfully!');
    }

    function loadSchedule() {
        const saved = localStorage.getItem('besic_work_schedule');
        if (saved) {
            workSchedule = JSON.parse(saved);
        }
        renderSchedule();
    }

    function showToast(message) {
        const toast = document.createElement('div');
        toast.className = 'toast-message';
        toast.innerHTML = message;
        document.body.appendChild(toast);
        setTimeout(() => toast.remove(), 3000);
    }

    // Load/Save Settings
    function loadSettings() {
        const saved = localStorage.getItem('besic_settings_v2');
        if (saved) {
            const settings = JSON.parse(saved);
            if (settings.profile) {
                document.getElementById('fullName').value = settings.profile.fullName || 'Amit Kumar';
                document.getElementById('email').value = settings.profile.email || 'amit.kumar@besicseva.com';
                document.getElementById('phone').value = settings.profile.phone || '+91 98765 43210';
                document.getElementById('address').value = settings.profile.address || 'Lucknow, Uttar Pradesh, India - 226001';
                document.getElementById('skills').value = settings.profile.skills || 'Electrician, Plumbing, AC Repair, Smart Home Installation';
            }
            if (settings.notifications) {
                document.getElementById('pushNotif').checked = settings.notifications.pushNotif !== false;
                document.getElementById('emailNotif').checked = settings.notifications.emailNotif !== false;
                document.getElementById('smsNotif').checked = settings.notifications.smsNotif || false;
                document.getElementById('jobAlerts').checked = settings.notifications.jobAlerts !== false;
                document.getElementById('earningAlerts').checked = settings.notifications.earningAlerts !== false;
            }
            if (settings.privacy) {
                document.getElementById('profileVisibility').checked = settings.privacy.profileVisibility !== false;
                document.getElementById('showEarnings').checked = settings.privacy.showEarnings || false;
                document.getElementById('dataSharing').checked = settings.privacy.dataSharing !== false;
                document.getElementById('locationSharing').checked = settings.privacy.locationSharing !== false;
            }
            if (settings.language) {
                document.querySelectorAll('.lang-option').forEach(el => {
                    el.classList.remove('active');
                    if (el.getAttribute('data-lang') === settings.language) el.classList.add('active');
                });
            }
            if (settings.twoFactor) document.getElementById('twoFactorToggle').checked = settings.twoFactor;
            if (settings.payoutFrequency) document.getElementById('payoutFrequency').value = settings.payoutFrequency;
        }
    }

    function saveProfileSettings() {
        const settings = JSON.parse(localStorage.getItem('besic_settings_v2')) || {};
        settings.profile = {
            fullName: document.getElementById('fullName').value,
            email: document.getElementById('email').value,
            phone: document.getElementById('phone').value,
            address: document.getElementById('address').value,
            skills: document.getElementById('skills').value
        };
        localStorage.setItem('besic_settings_v2', JSON.stringify(settings));
        showToast('✅ Profile saved successfully!');
    }

    function saveNotificationSettings() {
        const settings = JSON.parse(localStorage.getItem('besic_settings_v2')) || {};
        settings.notifications = {
            pushNotif: document.getElementById('pushNotif').checked,
            emailNotif: document.getElementById('emailNotif').checked,
            smsNotif: document.getElementById('smsNotif').checked,
            jobAlerts: document.getElementById('jobAlerts').checked,
            earningAlerts: document.getElementById('earningAlerts').checked
        };
        localStorage.setItem('besic_settings_v2', JSON.stringify(settings));
        showToast('✅ Notification preferences saved!');
    }

    function savePrivacySettings() {
        const settings = JSON.parse(localStorage.getItem('besic_settings_v2')) || {};
        settings.privacy = {
            profileVisibility: document.getElementById('profileVisibility').checked,
            showEarnings: document.getElementById('showEarnings').checked,
            dataSharing: document.getElementById('dataSharing').checked,
            locationSharing: document.getElementById('locationSharing').checked
        };
        localStorage.setItem('besic_settings_v2', JSON.stringify(settings));
        showToast('✅ Privacy settings saved!');
    }

    function savePayoutSettings() {
        const settings = JSON.parse(localStorage.getItem('besic_settings_v2')) || {};
        settings.payoutFrequency = document.getElementById('payoutFrequency').value;
        localStorage.setItem('besic_settings_v2', JSON.stringify(settings));
        showToast('✅ Payout settings saved!');
    }

    function updatePassword() {
        const current = document.getElementById('currentPassword').value;
        const newPass = document.getElementById('newPassword').value;
        const confirm = document.getElementById('confirmPassword').value;
        if (!current || !newPass || !confirm) { showToast('❌ Please fill all fields'); return; }
        if (newPass !== confirm) { showToast('❌ Passwords do not match'); return; }
        if (newPass.length < 8) { showToast('❌ Password must be at least 8 characters'); return; }
        showToast('✅ Password updated successfully!');
        document.getElementById('passwordForm').reset();
    }

    function saveTwoFactor() {
        const isEnabled = document.getElementById('twoFactorToggle').checked;
        const settings = JSON.parse(localStorage.getItem('besic_settings_v2')) || {};
        settings.twoFactor = isEnabled;
        localStorage.setItem('besic_settings_v2', JSON.stringify(settings));
        showToast(isEnabled ? '✅ 2FA enabled!' : '❌ 2FA disabled');
    }

    // Navigation
    function initNavigation() {
        document.querySelectorAll('.settings-nav-item').forEach(item => {
            item.addEventListener('click', () => {
                const paneId = item.getAttribute('data-pane');
                document.querySelectorAll('.settings-nav-item').forEach(nav => nav.classList.remove('active'));
                item.classList.add('active');
                document.querySelectorAll('.settings-pane').forEach(pane => pane.classList.remove('active-pane'));
                document.getElementById(`pane-${paneId}`).classList.add('active-pane');
            });
        });
    }

    function initLanguage() {
        document.querySelectorAll('.lang-option').forEach(opt => {
            opt.addEventListener('click', () => {
                document.querySelectorAll('.lang-option').forEach(o => o.classList.remove('active'));
                opt.classList.add('active');
                const settings = JSON.parse(localStorage.getItem('besic_settings_v2')) || {};
                settings.language = opt.getAttribute('data-lang');
                localStorage.setItem('besic_settings_v2', JSON.stringify(settings));
                showToast(`🌐 Language changed to ${opt.innerText}`);
            });
        });
    }

    function initSupport() {
        document.getElementById('submitSupportBtn').addEventListener('click', () => {
            const type = document.getElementById('supportType').value;
            const subject = document.getElementById('supportSubject').value;
            const message = document.getElementById('supportMessage').value;
            if (!message.trim()) { showToast('❌ Please describe your issue'); return; }
            showToast(`✅ Support request submitted! We'll respond within 24 hours.`);
            document.getElementById('supportMessage').value = '';
            document.getElementById('supportSubject').value = '';
        });
    }

    function initDangerZone() {
        document.getElementById('deleteAccountBtn').addEventListener('click', () => {
            if (confirm('⚠️ WARNING: This will permanently delete your account. Type "DELETE" to confirm')) {
                const confirmText = prompt('Type "DELETE" to confirm:');
                if (confirmText === 'DELETE') {
                    showToast('Account deleted. Redirecting...');
                    setTimeout(() => localStorage.clear(), 1000);
                } else showToast('Account deletion cancelled');
            }
        });
        document.getElementById('deactivateBtn').addEventListener('click', () => {
            if (confirm('Deactivate your account? You can reactivate by logging in.')) {
                showToast('Account deactivated');
                setTimeout(() => localStorage.clear(), 1000);
            }
        });
    }

    function initExport() {
        document.getElementById('exportDataBtn')?.addEventListener('click', () => {
            const data = localStorage.getItem('besic_settings_v2');
            const blob = new Blob([data || '{}'], { type: 'application/json' });
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = `besic_data_${new Date().toISOString().slice(0,10)}.json`;
            a.click();
            URL.revokeObjectURL(url);
            showToast('📥 Data exported successfully!');
        });
        document.getElementById('viewReportsBtn')?.addEventListener('click', () => {
            showToast('📊 Generating performance report...');
        });
    }

    function bindForms() {
        document.getElementById('profileForm')?.addEventListener('submit', (e) => { e.preventDefault(); saveProfileSettings(); });
        document.getElementById('passwordForm')?.addEventListener('submit', (e) => { e.preventDefault(); updatePassword(); });
        document.getElementById('saveNotifBtn')?.addEventListener('click', saveNotificationSettings);
        document.getElementById('savePrivacyBtn')?.addEventListener('click', savePrivacySettings);
        document.getElementById('savePayoutBtn')?.addEventListener('click', savePayoutSettings);
        document.getElementById('saveScheduleBtn')?.addEventListener('click', saveSchedule);
        document.getElementById('twoFactorToggle')?.addEventListener('change', saveTwoFactor);
        document.getElementById('addPaymentBtn')?.addEventListener('click', () => showToast('💳 Add payment method feature coming soon!'));
    }

    initNavigation();
    initLanguage();
    initSupport();
    initDangerZone();
    initExport();
    bindForms();
    loadSettings();
    loadSchedule();
</script>
</body>
</html>