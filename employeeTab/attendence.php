<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
  <title>BESIC SEVA - Dynamic Attendance Calendar | Current Month First</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      background: #f4f7fc;
      font-family: 'Inter', sans-serif;
      color: #1e2a3e;
      padding: 24px;
    }

    .attendance-container {
      max-width: 1300px;
      margin: 0 auto;
    }

    /* Header Section */
    .page-header {
      background: white;
      border-radius: 28px;
      padding: 24px 32px;
      margin-bottom: 28px;
      box-shadow: 0 2px 12px rgba(0, 0, 0, 0.04);
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      align-items: center;
    }
    .page-header h1 {
      font-size: 1.9rem;
      font-weight: 700;
      color: #0a2b38;
      display: flex;
      align-items: center;
      gap: 14px;
    }
    .page-header h1 i {
      color: #1f6392;
      font-size: 2rem;
    }
    .month-nav {
      display: flex;
      align-items: center;
      gap: 16px;
      background: #eef2fa;
      padding: 8px 20px;
      border-radius: 60px;
    }
    .month-nav button {
      background: transparent;
      border: none;
      font-size: 1.2rem;
      cursor: pointer;
      color: #2c5a7a;
      padding: 6px 12px;
      border-radius: 40px;
      transition: 0.2s;
    }
    .month-nav button:hover {
      background: #ffffff80;
    }
    .current-month {
      font-weight: 700;
      font-size: 1rem;
      min-width: 160px;
      text-align: center;
      color: #1f6392;
    }

    /* Stats Cards */
    .stats-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 20px;
      margin-bottom: 32px;
    }
    .stat-card {
      background: white;
      border-radius: 24px;
      padding: 20px 24px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.03);
      border: 1px solid #eef2f6;
      transition: transform 0.2s;
    }
    .stat-card:hover {
      transform: translateY(-2px);
    }
    .stat-icon {
      width: 48px;
      height: 48px;
      background: #eef3fc;
      border-radius: 30px;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 12px;
      color: #1f6392;
      font-size: 1.4rem;
    }
    .stat-value {
      font-size: 2rem;
      font-weight: 800;
      color: #1e2a3e;
      margin-bottom: 4px;
    }
    .stat-label {
      font-size: 0.8rem;
      color: #6f8fae;
      font-weight: 500;
    }

    /* Check-in / Check-out Panel */
    .attendance-action {
      background: linear-gradient(135deg, #ffffff 0%, #f8fbfe 100%);
      border-radius: 28px;
      padding: 28px 32px;
      margin-bottom: 32px;
      border: 1px solid #e2edf7;
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      align-items: center;
      gap: 20px;
    }
    .attendance-status {
      display: flex;
      align-items: center;
      gap: 20px;
      flex-wrap: wrap;
    }
    .status-indicator {
      display: flex;
      align-items: center;
      gap: 12px;
      background: #f0f6fe;
      padding: 10px 20px;
      border-radius: 60px;
    }
    .online-dot {
      width: 12px;
      height: 12px;
      background: #2ecc71;
      border-radius: 50%;
      animation: pulse 1.5s infinite;
    }
    .offline-dot {
      background: #e67e22;
      animation: none;
    }
    .check-btn {
      background: #1f6392;
      color: white;
      border: none;
      padding: 14px 32px;
      border-radius: 50px;
      font-weight: 600;
      font-size: 1rem;
      cursor: pointer;
      transition: 0.2s;
      display: inline-flex;
      align-items: center;
      gap: 10px;
    }
    .check-btn-out {
      background: #e67e22;
    }
    .check-btn:hover {
      transform: scale(0.98);
      filter: brightness(0.95);
    }
    .last-check {
      font-size: 0.75rem;
      color: #5f7d9c;
    }

    /* Calendar Section - DYNAMIC */
    .calendar-section {
      background: white;
      border-radius: 28px;
      padding: 28px 32px;
      margin-bottom: 28px;
      box-shadow: 0 4px 14px rgba(0, 0, 0, 0.03);
      border: 1px solid #edf2f9;
    }
    .section-title {
      font-size: 1.4rem;
      font-weight: 700;
      margin-bottom: 24px;
      display: flex;
      align-items: center;
      gap: 12px;
      border-left: 5px solid #1f6392;
      padding-left: 20px;
    }
    .calendar-grid {
      display: grid;
      grid-template-columns: repeat(7, 1fr);
      gap: 8px;
      margin-bottom: 20px;
    }
    .calendar-weekday {
      text-align: center;
      font-weight: 600;
      font-size: 0.8rem;
      color: #5c7a9a;
      padding: 10px 0;
    }
    .calendar-day {
      background: #fafcff;
      border: 1px solid #eef2f8;
      border-radius: 16px;
      padding: 12px 6px;
      text-align: center;
      transition: 0.15s;
      cursor: pointer;
      position: relative;
    }
    .calendar-day:hover {
      background: #f0f5fc;
      transform: translateY(-2px);
      box-shadow: 0 4px 8px rgba(0,0,0,0.05);
    }
    .day-number {
      font-weight: 700;
      font-size: 0.95rem;
      margin-bottom: 6px;
    }
    .attendance-badge {
      font-size: 0.65rem;
      padding: 3px 8px;
      border-radius: 30px;
      display: inline-block;
      margin-top: 4px;
      font-weight: 600;
    }
    .present-badge {
      background: #e0f2e9;
      color: #116b3c;
    }
    .absent-badge {
      background: #ffe8e6;
      color: #bc3900;
    }
    .halfday-badge {
      background: #fff3e0;
      color: #b85c00;
    }
    .holiday-badge {
      background: #eef2fa;
      color: #5c7a9a;
    }
    .legend {
      display: flex;
      gap: 20px;
      flex-wrap: wrap;
      margin-top: 20px;
      padding-top: 16px;
      border-top: 1px solid #ecf3f9;
    }
    .legend-item {
      display: flex;
      align-items: center;
      gap: 8px;
      font-size: 0.75rem;
    }
    .legend-color {
      width: 14px;
      height: 14px;
      border-radius: 4px;
    }

    /* History List */
    .history-list {
      background: white;
      border-radius: 28px;
      padding: 28px 32px;
      border: 1px solid #edf2f9;
    }
    .history-item {
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
      padding: 16px 0;
      border-bottom: 1px solid #f0f4fa;
    }
    .history-date {
      font-weight: 600;
      min-width: 120px;
    }
    .history-status {
      padding: 5px 14px;
      border-radius: 50px;
      font-size: 0.75rem;
      font-weight: 600;
    }
    .history-time {
      color: #6c86a0;
      font-size: 0.75rem;
    }
    .btn-sm {
      background: #f0f4f9;
      border: none;
      padding: 6px 14px;
      border-radius: 30px;
      font-size: 0.7rem;
      cursor: pointer;
      transition: 0.2s;
    }
    .btn-sm:hover {
      background: #e3eaf1;
    }

    @keyframes pulse {
      0% { opacity: 0.6; transform: scale(1);}
      100% { opacity: 1; transform: scale(1.05);}
    }

    @media (max-width: 700px) {
      body { padding: 16px; }
      .calendar-grid { gap: 4px; }
      .calendar-day { padding: 8px 2px; }
      .day-number { font-size: 0.7rem; }
      .attendance-badge { font-size: 0.55rem; padding: 2px 4px; }
      .page-header { flex-direction: column; align-items: flex-start; gap: 12px; }
      .attendance-action { flex-direction: column; align-items: stretch; }
      .history-item { flex-direction: column; align-items: flex-start; gap: 8px; }
    }

    .footer-note {
      text-align: center;
      font-size: 0.7rem;
      color: #8aa0b8;
      margin-top: 28px;
    }
    .mark-attendance-btn {
      margin-top: 8px;
      font-size: 0.65rem;
      background: #eef2fa;
      border: none;
      padding: 4px 10px;
      border-radius: 20px;
      cursor: pointer;
      transition: 0.2s;
    }
    .mark-attendance-btn:hover {
      background: #dce5f0;
    }
  </style>
</head>
<body>
<div class="attendance-container">
  <!-- Header with Dynamic Month Navigation -->
  <div class="page-header">
    <h1><i class="fas fa-calendar-check"></i> Attendance Calendar</h1>
    <div class="month-nav">
      <button id="prevMonthBtn"><i class="fas fa-chevron-left"></i></button>
      <span class="current-month" id="currentMonthDisplay">Loading...</span>
      <button id="nextMonthBtn"><i class="fas fa-chevron-right"></i></button>
    </div>
  </div>

  <!-- Stats Cards (Dynamic) -->
  <div class="stats-grid" id="statsGrid"></div>

  <!-- Check-in / Check-out Panel -->
  <div class="attendance-action">
    <div class="attendance-status">
      <div class="status-indicator">
        <span class="online-dot" id="statusDot"></span>
        <span id="sessionStatusText">Currently Clocked In</span>
      </div>
      <div class="last-check" id="lastCheckInfo">Last check-in: Today 09:15 AM</div>
    </div>
    <div>
      <button class="check-btn" id="checkInBtn"><i class="fas fa-sign-in-alt"></i> Check In</button>
      <button class="check-btn check-btn-out" id="checkOutBtn" style="background:#a0b8ce; margin-left: 10px;"><i class="fas fa-sign-out-alt"></i> Check Out</button>
    </div>
  </div>

  <!-- Dynamic Calendar Section -->
  <div class="calendar-section">
    <div class="section-title">
      <i class="fas fa-calendar-week"></i> <span id="calendarTitle">Attendance Calendar</span>
    </div>
    <div class="calendar-grid" id="calendarGrid">
      <!-- Dynamic calendar injected via JS -->
    </div>
    <div class="legend">
      <div class="legend-item"><div class="legend-color" style="background:#e0f2e9;"></div> Present</div>
      <div class="legend-item"><div class="legend-color" style="background:#ffe8e6;"></div> Absent</div>
      <div class="legend-item"><div class="legend-color" style="background:#fff3e0;"></div> Half Day</div>
      <div class="legend-item"><div class="legend-color" style="background:#eef2fa;"></div> Holiday / Off</div>
      <div class="legend-item"><div class="legend-color" style="background:#fafcff; border:1px solid #cbdde9;"></div> No Record</div>
      <div class="legend-item"><i class="fas fa-mouse-pointer"></i> Click on any day to mark attendance</div>
    </div>
  </div>

  <!-- Attendance History List -->
  <div class="history-list">
    <div class="section-title" style="margin-bottom: 20px;">
      <i class="fas fa-list-ul"></i> Attendance History (<span id="historyMonthLabel">Loading...</span>)
    </div>
    <div id="attendanceHistoryList"></div>
  </div>
  <div class="footer-note">
    <i class="fas fa-sync-alt"></i> Dynamic calendar • Click any date to update attendance • Changes reflect instantly • First load shows current month
  </div>
</div>

<script>
  // ==================== DYNAMIC ATTENDANCE SYSTEM ====================
  // Store attendance data in localStorage for persistence across month changes
  // Structure: attendanceDB[year_month] = { day: { status, checkIn, checkOut, note } }
  
  let currentYear = new Date().getFullYear();
  let currentMonth = new Date().getMonth(); // 0-indexed: current month
  let currentViewYear = currentYear;
  let currentViewMonth = currentMonth;
  
  // Global attendance database
  let attendanceDB = {};
  
  // Load from localStorage
  function loadAttendanceDB() {
    const stored = localStorage.getItem('besic_attendance_db');
    if (stored) {
      attendanceDB = JSON.parse(stored);
    } else {
      // Initialize with sample data for current month and previous months
      const today = new Date();
      const currY = today.getFullYear();
      const currM = today.getMonth();
      
      // Sample data for current month (dynamic dates)
      const daysInCurrMonth = new Date(currY, currM + 1, 0).getDate();
      const sampleMonthData = {};
      
      for (let d = 1; d <= daysInCurrMonth; d++) {
        const date = new Date(currY, currM, d);
        const dayOfWeek = date.getDay();
        
        if (d <= 5 && d <= daysInCurrMonth) {
          // Some present days
          if (d <= 20) {
            sampleMonthData[d] = { status: 'present', checkIn: '09:0' + (d % 10) + ' AM', checkOut: '06:00 PM' };
          }
        }
        // Mark Sundays as holidays
        if (dayOfWeek === 0) {
          sampleMonthData[d] = { status: 'holiday', note: 'Sunday Off' };
        }
      }
      // Add some specific examples
      if (currM === 4 || currM === 5) {
        sampleMonthData[1] = { status: 'present', checkIn: '09:05 AM', checkOut: '06:10 PM' };
        sampleMonthData[5] = { status: 'halfday', checkIn: '09:10 AM', checkOut: '01:30 PM', note: 'Half day' };
        sampleMonthData[10] = { status: 'absent', note: 'Medical leave' };
      }
      
      const currentMonthKey = `${currY}_${currM}`;
      attendanceDB[currentMonthKey] = sampleMonthData;
      
      // Also add sample for previous month
      const prevMonth = currM === 0 ? 11 : currM - 1;
      const prevYear = currM === 0 ? currY - 1 : currY;
      const prevMonthKey = `${prevYear}_${prevMonth}`;
      const daysInPrev = new Date(prevYear, prevMonth + 1, 0).getDate();
      const prevMonthData = {};
      for (let d = 1; d <= daysInPrev; d++) {
        const date = new Date(prevYear, prevMonth, d);
        if (date.getDay() === 0) {
          prevMonthData[d] = { status: 'holiday', note: 'Sunday Off' };
        } else if (d % 3 === 0) {
          prevMonthData[d] = { status: 'present', checkIn: '09:00 AM', checkOut: '06:00 PM' };
        } else if (d % 7 === 2) {
          prevMonthData[d] = { status: 'halfday', checkIn: '09:15 AM', checkOut: '01:45 PM' };
        } else if (d % 10 === 0) {
          prevMonthData[d] = { status: 'absent', note: 'Leave' };
        }
      }
      attendanceDB[prevMonthKey] = prevMonthData;
      
      saveAttendanceDB();
    }
  }
  
  function saveAttendanceDB() {
    localStorage.setItem('besic_attendance_db', JSON.stringify(attendanceDB));
  }
  
  // Get current month key
  function getMonthKey(year, month) {
    return `${year}_${month}`;
  }
  
  // Get attendance for a specific day in given month
  function getAttendance(year, month, day) {
    const key = getMonthKey(year, month);
    if (!attendanceDB[key]) return null;
    return attendanceDB[key][day] || null;
  }
  
  // Set attendance for a specific day
  function setAttendance(year, month, day, data) {
    const key = getMonthKey(year, month);
    if (!attendanceDB[key]) {
      attendanceDB[key] = {};
    }
    attendanceDB[key][day] = { ...data };
    saveAttendanceDB();
    refreshAll(); // Refresh UI after change
  }
  
  // Calculate stats for given month
  function calculateStats(year, month) {
    const daysInMonth = new Date(year, month + 1, 0).getDate();
    let present = 0, absent = 0, halfday = 0, holiday = 0;
    
    for (let day = 1; day <= daysInMonth; day++) {
      const att = getAttendance(year, month, day);
      if (!att) continue;
      if (att.status === 'present') present++;
      else if (att.status === 'absent') absent++;
      else if (att.status === 'halfday') halfday++;
      else if (att.status === 'holiday') holiday++;
    }
    
    const totalWorkDays = daysInMonth - holiday;
    const attendanceRate = totalWorkDays > 0 ? Math.round(((present + halfday * 0.5) / totalWorkDays) * 100) : 0;
    return { present, absent, halfday, holiday, attendanceRate, totalWorkDays, daysInMonth };
  }
  
  // Render stats
  function renderStats() {
    const stats = calculateStats(currentViewYear, currentViewMonth);
    const container = document.getElementById('statsGrid');
    if (!container) return;
    container.innerHTML = `
      <div class="stat-card">
        <div class="stat-icon"><i class="fas fa-user-check"></i></div>
        <div class="stat-value">${stats.present}</div>
        <div class="stat-label">Present Days</div>
      </div>
      <div class="stat-card">
        <div class="stat-icon"><i class="fas fa-user-slash"></i></div>
        <div class="stat-value">${stats.absent}</div>
        <div class="stat-label">Absent Days</div>
      </div>
      <div class="stat-card">
        <div class="stat-icon"><i class="fas fa-sun"></i></div>
        <div class="stat-value">${stats.halfday}</div>
        <div class="stat-label">Half Days</div>
      </div>
      <div class="stat-card">
        <div class="stat-icon"><i class="fas fa-percent"></i></div>
        <div class="stat-value">${stats.attendanceRate}%</div>
        <div class="stat-label">Attendance Rate</div>
      </div>
    `;
  }
  
  // Render dynamic calendar
  function renderCalendar() {
    const gridContainer = document.getElementById('calendarGrid');
    const calendarTitle = document.getElementById('calendarTitle');
    const monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    calendarTitle.innerText = `${monthNames[currentViewMonth]} ${currentViewYear} - Attendance Calendar`;
    
    if (!gridContainer) return;
    
    const weekdays = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
    let html = '';
    weekdays.forEach(day => {
      html += `<div class="calendar-weekday">${day}</div>`;
    });
    
    const firstDayOfMonth = new Date(currentViewYear, currentViewMonth, 1).getDay();
    const daysInMonth = new Date(currentViewYear, currentViewMonth + 1, 0).getDate();
    const today = new Date();
    const isCurrentMonthView = (today.getFullYear() === currentViewYear && today.getMonth() === currentViewMonth);
    const todayDate = today.getDate();
    
    // Empty cells before 1st
    for (let i = 0; i < firstDayOfMonth; i++) {
      html += `<div class="calendar-day" style="background:#fafcff; opacity:0.5;"><div class="day-number">-</div></div>`;
    }
    
    // Days of month
    for (let day = 1; day <= daysInMonth; day++) {
      const att = getAttendance(currentViewYear, currentViewMonth, day);
      let badgeHtml = '';
      let badgeClass = '';
      let statusText = '';
      
      if (att) {
        switch(att.status) {
          case 'present': badgeClass = 'present-badge'; statusText = 'Present'; break;
          case 'absent': badgeClass = 'absent-badge'; statusText = 'Absent'; break;
          case 'halfday': badgeClass = 'halfday-badge'; statusText = 'Half Day'; break;
          case 'holiday': badgeClass = 'holiday-badge'; statusText = 'Holiday'; break;
          default: statusText = '--';
        }
        badgeHtml = `<div class="attendance-badge ${badgeClass}">${statusText}</div>`;
      } else {
        badgeHtml = `<div class="attendance-badge" style="background:#f5f7fb; color:#8aa0b8;">--</div>`;
      }
      
      const isToday = (isCurrentMonthView && day === todayDate);
      const todayStyle = isToday ? 'background: #eef6ff; border: 2px solid #1f6392;' : '';
      
      html += `
        <div class="calendar-day" style="${todayStyle}" data-day="${day}">
          <div class="day-number">${day}</div>
          ${badgeHtml}
          <button class="mark-attendance-btn" data-day="${day}" data-status="present">📝 Mark</button>
        </div>
      `;
    }
    gridContainer.innerHTML = html;
    
    // Attach click handlers for marking attendance
    document.querySelectorAll('.mark-attendance-btn').forEach(btn => {
      btn.addEventListener('click', (e) => {
        e.stopPropagation();
        const day = parseInt(btn.getAttribute('data-day'));
        showAttendanceOptions(day);
      });
    });
    
    // Also make whole day clickable
    document.querySelectorAll('.calendar-day').forEach(dayEl => {
      const dayNum = dayEl.getAttribute('data-day');
      if (dayNum && !isNaN(parseInt(dayNum))) {
        dayEl.addEventListener('click', (e) => {
          if (e.target.classList.contains('mark-attendance-btn')) return;
          showAttendanceOptions(parseInt(dayNum));
        });
      }
    });
  }
  
  // Show options to mark attendance
  function showAttendanceOptions(day) {
    const currentAtt = getAttendance(currentViewYear, currentViewMonth, day);
    const monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    
    const statuses = [
      { value: 'present', label: '✅ Present (Full Day)', icon: 'fa-check-circle' },
      { value: 'absent', label: '❌ Absent', icon: 'fa-times-circle' },
      { value: 'halfday', label: '🌓 Half Day', icon: 'fa-sun' },
      { value: 'holiday', label: '🏖️ Holiday / Off', icon: 'fa-umbrella-beach' }
    ];
    
    let message = `📅 Mark Attendance for ${day} ${monthNames[currentViewMonth]} ${currentViewYear}\n\n`;
    message += `Current: ${currentAtt ? currentAtt.status.toUpperCase() : 'Not marked'}\n\n`;
    statuses.forEach((s, idx) => {
      message += `${idx+1}. ${s.label}\n`;
    });
    message += `\nEnter choice (1-4) or Cancel:`;
    
    const choice = prompt(message);
    if (choice && !isNaN(choice)) {
      const idx = parseInt(choice) - 1;
      if (idx >= 0 && idx < statuses.length) {
        const selected = statuses[idx];
        const now = new Date();
        const timeStr = now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
        
        let newData = { status: selected.value };
        if (selected.value === 'present') {
          newData.checkIn = currentAtt?.checkIn || '09:00 AM';
          newData.checkOut = currentAtt?.checkOut || '06:00 PM';
        } else if (selected.value === 'halfday') {
          newData.checkIn = '09:00 AM';
          newData.checkOut = '01:30 PM';
          newData.note = 'Marked half day';
        } else if (selected.value === 'absent') {
          newData.note = 'Marked absent';
        } else if (selected.value === 'holiday') {
          newData.note = 'Holiday / Off';
        }
        
        setAttendance(currentViewYear, currentViewMonth, day, newData);
        alert(`✅ Attendance marked as ${selected.label} for ${day}/${currentViewMonth+1}/${currentViewYear}`);
        refreshAll();
      }
    }
  }
  
  // Render history list
  function renderHistoryList() {
    const container = document.getElementById('attendanceHistoryList');
    const historyLabel = document.getElementById('historyMonthLabel');
    const monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    historyLabel.innerText = `${monthNames[currentViewMonth]} ${currentViewYear}`;
    
    if (!container) return;
    
    const daysInMonth = new Date(currentViewYear, currentViewMonth + 1, 0).getDate();
    const historyDays = [];
    
    for (let day = daysInMonth; day >= 1; day--) {
      const att = getAttendance(currentViewYear, currentViewMonth, day);
      if (att) {
        historyDays.push({ day, record: att });
      }
    }
    
    if (historyDays.length === 0) {
      container.innerHTML = '<div style="text-align:center; padding: 32px;">No attendance records for this month. Click on any day to mark attendance.</div>';
      return;
    }
    
    let html = '';
    historyDays.forEach(item => {
      const day = item.day;
      const record = item.record;
      let statusDisplay = '';
      let statusClass = '';
      let timeInfo = '';
      
      switch(record.status) {
        case 'present':
          statusDisplay = 'Present (Full Day)';
          statusClass = 'present-badge';
          timeInfo = `⏱️ In: ${record.checkIn || '09:00 AM'} | Out: ${record.checkOut || '06:00 PM'}`;
          break;
        case 'absent':
          statusDisplay = 'Absent';
          statusClass = 'absent-badge';
          timeInfo = record.note || 'No check-in recorded';
          break;
        case 'halfday':
          statusDisplay = 'Half Day';
          statusClass = 'halfday-badge';
          timeInfo = `In: ${record.checkIn} | Out: ${record.checkOut}${record.note ? ` (${record.note})` : ''}`;
          break;
        case 'holiday':
          statusDisplay = 'Holiday / Off';
          statusClass = 'holiday-badge';
          timeInfo = record.note || 'Scheduled off';
          break;
        default:
          statusDisplay = 'Recorded';
          statusClass = '';
          timeInfo = '';
      }
      
      const monthNamesShort = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
      const dateStr = `${day} ${monthNamesShort[currentViewMonth]} ${currentViewYear}`;
      html += `
        <div class="history-item">
          <div class="history-date"><i class="far fa-calendar-alt"></i> ${dateStr}</div>
          <div><span class="history-status ${statusClass}">${statusDisplay}</span></div>
          <div class="history-time">${timeInfo}</div>
          <div><button class="btn-sm edit-history-day" data-day="${day}"><i class="fas fa-edit"></i> Edit</button></div>
        </div>
      `;
    });
    container.innerHTML = html;
    
    // Edit handlers
    document.querySelectorAll('.edit-history-day').forEach(btn => {
      btn.addEventListener('click', (e) => {
        const day = parseInt(btn.getAttribute('data-day'));
        showAttendanceOptions(day);
      });
    });
  }
  
  // Check-in/out simulation (global session)
  let isCheckedIn = true;
  let currentCheckInTime = "09:15 AM";
  
  function updateUIForSession() {
    const statusDot = document.getElementById('statusDot');
    const statusText = document.getElementById('sessionStatusText');
    const lastCheckInfo = document.getElementById('lastCheckInfo');
    const checkInBtn = document.getElementById('checkInBtn');
    const checkOutBtn = document.getElementById('checkOutBtn');
    
    if (isCheckedIn) {
      statusDot.className = 'online-dot';
      statusText.innerText = '✅ Currently Clocked In';
      lastCheckInfo.innerHTML = `Last check-in: Today at ${currentCheckInTime}`;
      if (checkOutBtn) checkOutBtn.style.background = "#e67e22";
      if (checkInBtn) checkInBtn.style.background = "#a0b8ce";
    } else {
      statusDot.className = 'online-dot offline-dot';
      statusText.innerText = '⏸️ Clocked Out';
      lastCheckInfo.innerHTML = `Last check-out: Today at ${new Date().toLocaleTimeString([], {hour:'2-digit', minute:'2-digit'})}`;
      if (checkOutBtn) checkOutBtn.style.background = "#a0b8ce";
      if (checkInBtn) checkInBtn.style.background = "#1f6392";
    }
  }
  
  function handleCheckIn() {
    if (isCheckedIn) { alert("Already checked in!"); return; }
    const now = new Date();
    const timeStr = now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
    currentCheckInTime = timeStr;
    isCheckedIn = true;
    updateUIForSession();
    alert(`✅ Checked in at ${timeStr}`);
    const today = new Date().getDate();
    const currentMonthNow = new Date().getMonth();
    const currentYearNow = new Date().getFullYear();
    if (currentYearNow === currentViewYear && currentMonthNow === currentViewMonth) {
      const existing = getAttendance(currentViewYear, currentViewMonth, today);
      if (!existing || existing.status !== 'present') {
        setAttendance(currentViewYear, currentViewMonth, today, { status: 'present', checkIn: timeStr, checkOut: null });
      } else if (existing && !existing.checkIn) {
        existing.checkIn = timeStr;
        setAttendance(currentViewYear, currentViewMonth, today, existing);
      }
    }
    refreshAll();
  }
  
  function handleCheckOut() {
    if (!isCheckedIn) { alert("Not checked in!"); return; }
    const now = new Date();
    const timeStr = now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
    isCheckedIn = false;
    updateUIForSession();
    alert(`✅ Checked out at ${timeStr}`);
    const today = new Date().getDate();
    const currentMonthNow = new Date().getMonth();
    const currentYearNow = new Date().getFullYear();
    if (currentYearNow === currentViewYear && currentMonthNow === currentViewMonth) {
      const existing = getAttendance(currentViewYear, currentViewMonth, today);
      if (existing && existing.status === 'present') {
        existing.checkOut = timeStr;
        setAttendance(currentViewYear, currentViewMonth, today, existing);
      }
    }
    refreshAll();
  }
  
  function changeMonth(delta) {
    let newMonth = currentViewMonth + delta;
    let newYear = currentViewYear;
    if (newMonth < 0) {
      newMonth = 11;
      newYear--;
    } else if (newMonth > 11) {
      newMonth = 0;
      newYear++;
    }
    currentViewYear = newYear;
    currentViewMonth = newMonth;
    const monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    document.getElementById('currentMonthDisplay').innerText = `${monthNames[currentViewMonth]} ${currentViewYear}`;
    refreshAll();
  }
  
  function refreshAll() {
    renderStats();
    renderCalendar();
    renderHistoryList();
  }
  
  function bindEvents() {
    document.getElementById('prevMonthBtn').addEventListener('click', () => changeMonth(-1));
    document.getElementById('nextMonthBtn').addEventListener('click', () => changeMonth(1));
    document.getElementById('checkInBtn').addEventListener('click', handleCheckIn);
    document.getElementById('checkOutBtn').addEventListener('click', handleCheckOut);
  }
  
  function initSession() {
    isCheckedIn = true;
    currentCheckInTime = "09:15 AM";
    updateUIForSession();
  }
  
  function init() {
    loadAttendanceDB();
    // Set current view to CURRENT month (not hardcoded)
    const now = new Date();
    currentViewYear = now.getFullYear();
    currentViewMonth = now.getMonth();
    const monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    document.getElementById('currentMonthDisplay').innerText = `${monthNames[currentViewMonth]} ${currentViewYear}`;
    bindEvents();
    initSession();
    refreshAll();
  }
  
  init();
</script>
</body>
</html>