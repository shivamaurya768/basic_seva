<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
  <title>BESIC SEVA - Earnings Summary | Financial Dashboard</title>
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

    .earnings-container {
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
    .date-badge {
      background: #eef2fa;
      padding: 8px 20px;
      border-radius: 40px;
      color: #2c5a7a;
      font-weight: 500;
      font-size: 0.85rem;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    /* Main Earnings Cards (3 major ones) */
    .earnings-cards {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 22px;
      margin-bottom: 32px;
    }
    .earning-card {
      background: white;
      border-radius: 28px;
      padding: 24px 28px;
      box-shadow: 0 4px 14px rgba(0, 0, 0, 0.05);
      transition: transform 0.2s, box-shadow 0.2s;
      border: 1px solid #edf2f8;
    }
    .earning-card:hover {
      transform: translateY(-3px);
      box-shadow: 0 12px 24px -10px rgba(0, 0, 0, 0.12);
    }
    .card-label {
      font-size: 0.85rem;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 1px;
      color: #6f8fae;
      margin-bottom: 12px;
      display: flex;
      align-items: center;
      gap: 8px;
    }
    .card-amount {
      font-size: 2.5rem;
      font-weight: 800;
      color: #1e2a3e;
      margin-bottom: 8px;
    }
    .card-amount small {
      font-size: 1rem;
      font-weight: 500;
      color: #6c86a0;
    }
    .card-sub {
      font-size: 0.75rem;
      color: #5f7d9c;
      border-top: 1px solid #eef2f8;
      margin-top: 12px;
      padding-top: 12px;
    }
    .total-earnings .card-amount { color: #1f6392; }
    .received-earnings .card-amount { color: #27ae60; }
    .pending-earnings .card-amount { color: #e67e22; }

    /* Stats row - daily & completion */
    .stats-row {
      display: flex;
      flex-wrap: wrap;
      gap: 22px;
      margin-bottom: 32px;
    }
    .stats-card {
      flex: 1;
      background: white;
      border-radius: 24px;
      padding: 20px 24px;
      border: 1px solid #eef2f6;
      display: flex;
      align-items: center;
      justify-content: space-between;
      flex-wrap: wrap;
    }
    .stats-left h4 {
      font-size: 0.75rem;
      font-weight: 600;
      color: #7a8ea8;
      letter-spacing: 0.5px;
      margin-bottom: 8px;
    }
    .stats-left .value {
      font-size: 1.8rem;
      font-weight: 800;
      color: #2c3e50;
    }
    .stats-left .label-sm {
      font-size: 0.7rem;
      color: #5c7a9a;
      margin-top: 4px;
    }
    .progress-circle {
      width: 70px;
      height: 70px;
      background: #f0f5fa;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 800;
      font-size: 1.6rem;
      color: #1f6392;
      position: relative;
    }
    .progress-circle::before {
      content: '';
      position: absolute;
      width: 60px;
      height: 60px;
      border-radius: 50%;
      border: 4px solid #e0e9f2;
      border-top-color: #1f6392;
      transform: rotate(0deg);
    }

    /* Transaction History Table / List */
    .history-section {
      background: white;
      border-radius: 28px;
      padding: 28px 32px;
      box-shadow: 0 6px 18px rgba(0, 0, 0, 0.03);
      border: 1px solid #edf2f9;
      margin-bottom: 24px;
    }
    .section-title {
      font-size: 1.4rem;
      font-weight: 700;
      margin-bottom: 22px;
      display: flex;
      align-items: center;
      gap: 12px;
      border-left: 5px solid #1f6392;
      padding-left: 20px;
    }
    .transaction-list {
      display: flex;
      flex-direction: column;
      gap: 16px;
    }
    .transaction-item {
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
      padding: 16px 8px;
      border-bottom: 1px solid #f0f4fa;
      transition: background 0.2s;
    }
    .transaction-item:hover {
      background: #fafcff;
      border-radius: 20px;
      padding-left: 12px;
      padding-right: 12px;
    }
    .transaction-info {
      display: flex;
      align-items: center;
      gap: 14px;
      flex-wrap: wrap;
    }
    .transaction-icon {
      width: 45px;
      height: 45px;
      background: #eef3fc;
      border-radius: 30px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #2c6e9e;
      font-size: 1.2rem;
    }
    .transaction-details h4 {
      font-size: 1rem;
      font-weight: 700;
      margin-bottom: 5px;
    }
    .transaction-details p {
      font-size: 0.7rem;
      color: #7b8ea8;
      display: flex;
      gap: 12px;
      flex-wrap: wrap;
    }
    .transaction-amount {
      text-align: right;
    }
    .amount-positive {
      font-weight: 800;
      font-size: 1.2rem;
      color: #27ae60;
    }
    .amount-negative {
      font-weight: 800;
      font-size: 1.2rem;
      color: #e26d5c;
    }
    .status-badge {
      font-size: 0.65rem;
      padding: 4px 10px;
      border-radius: 40px;
      background: #eaf4e8;
      color: #2d6a4f;
      font-weight: 600;
    }
    .status-pending-badge {
      background: #fff1e0;
      color: #c97e00;
    }

    /* Payout summary & tools */
    .payout-tools {
      background: linear-gradient(135deg, #f0f7fe 0%, #ffffff 100%);
      border-radius: 24px;
      padding: 24px 28px;
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      align-items: center;
      gap: 20px;
      border: 1px solid #e2edf7;
    }
    .payout-text h3 {
      font-size: 1.2rem;
      font-weight: 700;
      margin-bottom: 5px;
    }
    .payout-text p {
      font-size: 0.8rem;
      color: #51718c;
    }
    .btn-primary {
      background: #1f6392;
      color: white;
      border: none;
      padding: 12px 28px;
      border-radius: 50px;
      font-weight: 600;
      font-size: 0.9rem;
      cursor: pointer;
      transition: 0.2s;
      display: inline-flex;
      align-items: center;
      gap: 10px;
    }
    .btn-primary:hover {
      background: #0e4a70;
      transform: scale(0.98);
    }
    .btn-outline {
      background: transparent;
      border: 1.5px solid #cbdde9;
      padding: 10px 24px;
      border-radius: 50px;
      font-weight: 500;
      cursor: pointer;
      transition: 0.2s;
    }
    .btn-outline:hover {
      background: #eef3fc;
    }

    @media (max-width: 700px) {
      body { padding: 16px; }
      .page-header { flex-direction: column; align-items: flex-start; gap: 12px; }
      .earning-card { padding: 18px; }
      .card-amount { font-size: 1.9rem; }
      .transaction-item { flex-direction: column; align-items: flex-start; gap: 12px; }
      .transaction-amount { text-align: left; }
    }

    .footer-note {
      text-align: center;
      font-size: 0.7rem;
      color: #8aa0b8;
      margin-top: 28px;
      padding-top: 12px;
    }
    hr {
      margin: 20px 0;
      border-color: #ecf3f9;
    }
  </style>
</head>
<body>
<div class="earnings-container">
  <!-- Header -->
  <div class="page-header">
    <h1><i class="fas fa-chart-line"></i> Earnings Summary</h1>
    <div class="date-badge"><i class="far fa-calendar-alt"></i> May 2024 | This Month</div>
  </div>

  <!-- Main Earnings Cards (Total, Received, Pending) -->
  <div class="earnings-cards" id="earningsCards"></div>

  <!-- Stats row: Today's Earnings + Completion Rate + Rating -->
  <div class="stats-row" id="statsRow"></div>

  <!-- Transaction & Payout History -->
  <div class="history-section">
    <div class="section-title">
      <i class="fas fa-history"></i> Payout & Transaction History
    </div>
    <div class="transaction-list" id="transactionList"></div>
  </div>

  <!-- Tools: Payout, Referrals, Support -->
  <div class="payout-tools">
    <div class="payout-text">
      <h3><i class="fas fa-wallet"></i> Withdraw Earnings</h3>
      <p>Instant transfer to bank or UPI • No extra fees</p>
    </div>
    <div style="display: flex; gap: 12px; flex-wrap: wrap;">
      <button class="btn-primary" id="requestPayoutBtn"><i class="fas fa-rupee-sign"></i> Request Payout</button>
      <button class="btn-outline" id="payoutHistoryBtn"><i class="fas fa-receipt"></i> Full History</button>
    </div>
  </div>
  <div class="footer-note">
    <i class="fas fa-shield-alt"></i> Secure payments • Settlements within 3-5 business days
  </div>
</div>

<script>
  // ------------------------------------------------------------
  // EARNINGS DATA (as per the employee image + realistic details)
  // ------------------------------------------------------------
  const earningsData = {
    totalEarnings: 12450,      // ₹12,450
    receivedAmount: 2350,      // ₹2,350
    pendingAmount: 10100,      // ₹10,100
    todaysEarnings: 4560,      // Today's Earnings: ₹4,560
    completionRate: 98,        // 98% completion
    rating: 4.8                // 4.8 rating
  };

  // Transaction history (jobs + payouts)
  const transactions = [
    {
      id: 1,
      type: "credit",
      title: "Plumber Service - Aliganj",
      date: "24 May 2024 • 10:00 AM",
      amount: 300,
      status: "completed",
      jobStatus: "Completed"
    },
    {
      id: 2,
      type: "credit",
      title: "AC Repair - Gomti Nagar",
      date: "23 May 2024 • 11:30 AM",
      amount: 350,
      status: "completed",
      jobStatus: "Completed",
      rating: 5.0
    },
    {
      id: 3,
      type: "credit",
      title: "Electrical Installation - Hazratganj",
      date: "24 May 2024 • 01:00 PM",
      amount: 450,
      status: "pending_settlement",
      jobStatus: "Upcoming (earnings will reflect after completion)"
    },
    {
      id: 4,
      type: "credit",
      title: "Fan Repair - Indira Nagar",
      date: "24 May 2024 • 03:30 PM",
      amount: 250,
      status: "pending_settlement",
      jobStatus: "Upcoming"
    },
    {
      id: 5,
      type: "credit",
      title: "Plumber (Emergency) - Aliganj",
      date: "24 May 2024 • 11:00 AM",
      amount: 350,
      status: "pending_settlement",
      jobStatus: "Pending Completion"
    },
    {
      id: 6,
      type: "debit",
      title: "Payout Transfer to Bank",
      date: "15 May 2024 • Withdrawal",
      amount: 1800,
      status: "settled",
      meta: "UPI: amit@okicici"
    },
    {
      id: 7,
      type: "credit",
      title: "Water Purifier Service",
      date: "22 May 2024 • 04:00 PM",
      amount: 280,
      status: "completed",
      jobStatus: "Completed"
    },
    {
      id: 8,
      type: "credit",
      title: "Geyser Repair - Jankipuram",
      date: "25 May 2024 • 09:30 AM",
      amount: 400,
      status: "pending_settlement",
      jobStatus: "Upcoming"
    }
  ];

  // Helper to render main earnings cards
  function renderEarningsCards() {
    const container = document.getElementById('earningsCards');
    if (!container) return;
    container.innerHTML = `
      <div class="earning-card total-earnings">
        <div class="card-label"><i class="fas fa-chart-simple"></i> TOTAL EARNINGS</div>
        <div class="card-amount">₹${formatAmount(earningsData.totalEarnings)}<small></small></div>
        <div class="card-sub">Lifetime gross earnings (including pending)</div>
      </div>
      <div class="earning-card received-earnings">
        <div class="card-label"><i class="fas fa-check-circle"></i> RECEIVED</div>
        <div class="card-amount">₹${formatAmount(earningsData.receivedAmount)}<small></small></div>
        <div class="card-sub">Settled & transferred to your account</div>
      </div>
      <div class="earning-card pending-earnings">
        <div class="card-label"><i class="fas fa-clock"></i> PENDING CLEARANCE</div>
        <div class="card-amount">₹${formatAmount(earningsData.pendingAmount)}<small></small></div>
        <div class="card-sub">Awaiting completion / approval</div>
      </div>
    `;
  }

  // Today's earnings & completion row
  function renderStatsRow() {
    const container = document.getElementById('statsRow');
    if (!container) return;
    container.innerHTML = `
      <div class="stats-card">
        <div class="stats-left">
          <h4><i class="fas fa-sun"></i> TODAY'S EARNINGS</h4>
          <div class="value">₹${formatAmount(earningsData.todaysEarnings)}</div>
          <div class="label-sm">From completed jobs • 24 May 2024</div>
        </div>
        <div class="progress-circle" style="background: #eef3fc;"><span>📈</span></div>
      </div>
      <div class="stats-card">
        <div class="stats-left">
          <h4><i class="fas fa-tasks"></i> COMPLETION RATE</h4>
          <div class="value">${earningsData.completionRate}%</div>
          <div class="label-sm">Excellent • 24 jobs completed</div>
        </div>
        <div class="progress-circle" style="font-size: 1.5rem;">${earningsData.completionRate}%</div>
      </div>
      <div class="stats-card">
        <div class="stats-left">
          <h4><i class="fas fa-star"></i> RATING (AVG)</h4>
          <div class="value">${earningsData.rating} ★</div>
          <div class="label-sm">Based on 20+ reviews</div>
        </div>
        <div class="progress-circle"><i class="fas fa-medal" style="font-size: 2rem; color:#f5b042;"></i></div>
      </div>
    `;
    // Add small visual progress for completion circle (CSS pseudo effect)
    const completionCircle = document.querySelectorAll('.progress-circle')[1];
    if (completionCircle) {
      const rate = earningsData.completionRate;
      const conicGrad = `conic-gradient(#1f6392 ${rate}%, #e0e9f2 ${rate}%)`;
      completionCircle.style.background = conicGrad;
      completionCircle.style.backgroundSize = 'cover';
      completionCircle.style.fontWeight = 'bold';
      completionCircle.style.color = '#1f6392';
    }
  }

  // Render full transaction history list (my jobs earnings + payouts)
  function renderTransactionHistory() {
    const container = document.getElementById('transactionList');
    if (!container) return;
    if (!transactions.length) {
      container.innerHTML = '<div style="text-align:center; padding: 40px;">No transaction history available</div>';
      return;
    }

    let historyHtml = '';
    // sort by date (most recent first) but keep original order with newer jobs first? we'll display reverse for better readability
    const sortedTx = [...transactions].reverse();
    sortedTx.forEach(tx => {
      const isCredit = tx.type === 'credit';
      const amountFormatted = `₹${formatAmount(tx.amount)}`;
      const amountClass = isCredit ? 'amount-positive' : 'amount-negative';
      const sign = isCredit ? '+' : '-';
      
      let statusBadgeHtml = '';
      if (tx.status === 'completed') {
        statusBadgeHtml = `<span class="status-badge"><i class="fas fa-check-circle"></i> Settled</span>`;
      } else if (tx.status === 'pending_settlement') {
        statusBadgeHtml = `<span class="status-badge status-pending-badge"><i class="fas fa-hourglass-half"></i> Pending Clearance</span>`;
      } else if (tx.status === 'settled') {
        statusBadgeHtml = `<span class="status-badge"><i class="fas fa-bank"></i> Withdrawn</span>`;
      } else {
        statusBadgeHtml = `<span class="status-badge">${tx.status}</span>`;
      }
      
      let extraInfo = '';
      if (tx.jobStatus && tx.type === 'credit' && tx.status !== 'completed') {
        extraInfo = `<span style="color:#e67e22;"><i class="fas fa-info-circle"></i> ${tx.jobStatus}</span>`;
      } else if (tx.meta) {
        extraInfo = `<span><i class="fas fa-credit-card"></i> ${tx.meta}</span>`;
      } else if (tx.rating && tx.type === 'credit') {
        extraInfo = `<span><i class="fas fa-star" style="color:#f5b042;"></i> ${tx.rating} ★ rating</span>`;
      }
      
      historyHtml += `
        <div class="transaction-item">
          <div class="transaction-info">
            <div class="transaction-icon">
              <i class="${isCredit ? 'fas fa-wallet' : 'fas fa-arrow-down'}"></i>
            </div>
            <div class="transaction-details">
              <h4>${escapeHtml(tx.title)}</h4>
              <p>
                <span><i class="far fa-clock"></i> ${tx.date}</span>
                ${extraInfo ? `<span>${extraInfo}</span>` : ''}
                ${statusBadgeHtml}
              </p>
            </div>
          </div>
          <div class="transaction-amount">
            <div class="${amountClass}">${sign} ${amountFormatted}</div>
          </div>
        </div>
      `;
    });
    container.innerHTML = historyHtml;
  }

  // Format amount with commas
  function formatAmount(amount) {
    return amount.toLocaleString('en-IN');
  }

  // Simple XSS escape
  function escapeHtml(str) {
    if (!str) return '';
    return str.replace(/[&<>]/g, function(m) {
      if (m === '&') return '&amp;';
      if (m === '<') return '&lt;';
      if (m === '>') return '&gt;';
      return m;
    });
  }

  // Simulated actions for payout request & history
  function setupEventHandlers() {
    const payoutBtn = document.getElementById('requestPayoutBtn');
    if (payoutBtn) {
      payoutBtn.addEventListener('click', () => {
        const pending = earningsData.pendingAmount;
        const received = earningsData.receivedAmount;
        alert(`💰 Withdrawal Request\n\nAvailable Balance: ₹${formatAmount(received)}\nPending Clearance: ₹${formatAmount(pending)}\n\nYou can request payout up to ₹${formatAmount(received)}. Our team will process within 24 hours.`);
      });
    }
    const historyBtn = document.getElementById('payoutHistoryBtn');
    if (historyBtn) {
      historyBtn.addEventListener('click', () => {
        alert("📜 Full Payout History\n\n• 15 May 2024: ₹1,800 transferred to UPI\n• 02 May 2024: ₹550 transferred to Bank\n• More details available in the Earnings Summary.\n\nAll transactions are secure.");
      });
    }
  }

  // Additional dynamic update for better responsiveness: show earnings summary from image also
  function renderEarningsInsight() {
    // ensures no missing elements; also adds a note about pending jobs.
    const pendingNote = document.createElement('div');
    // optional, but we already show transaction history, it's fine.
  }
  
  // Initialize all
  function init() {
    renderEarningsCards();
    renderStatsRow();
    renderTransactionHistory();
    setupEventHandlers();
  }
  
  init();
</script>
</body>
</html>