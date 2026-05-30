<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
  <title>BESIC SEVA - My Jobs | Job Listings & History</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700&display=swap" rel="stylesheet">
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

    /* main container - only job listing & history section */
    .jobs-container {
      max-width: 1200px;
      margin: 0 auto;
      background: #f4f7fc;
    }

    /* page header with stats (optional but matches context) */
    .page-header {
      background: white;
      border-radius: 24px;
      padding: 20px 28px;
      margin-bottom: 24px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.03);
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      align-items: center;
    }
    .page-header h1 {
      font-size: 1.8rem;
      font-weight: 700;
      color: #0a2b38;
      display: flex;
      align-items: center;
      gap: 12px;
    }
    .online-badge {
      background: #e6f7ec;
      padding: 8px 20px;
      border-radius: 40px;
      color: #1e7e34;
      font-weight: 600;
      font-size: 0.85rem;
      display: flex;
      align-items: center;
      gap: 8px;
    }
    .online-dot {
      width: 10px;
      height: 10px;
      background: #2ecc71;
      border-radius: 50%;
      display: inline-block;
      animation: pulse 1.5s infinite;
    }

    /* stats mini cards */
    .stats-mini {
      display: flex;
      gap: 16px;
      flex-wrap: wrap;
      margin-bottom: 28px;
    }
    .stat-card {
      background: white;
      border-radius: 24px;
      padding: 16px 22px;
      flex: 1;
      min-width: 140px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.02);
      border: 1px solid #eef2f6;
    }
    .stat-number {
      font-size: 2rem;
      font-weight: 800;
      color: #1f6392;
    }
    .stat-label {
      font-size: 0.8rem;
      color: #5a6e85;
      margin-top: 6px;
    }

    /* JOBS SECTION - main listing & history */
    .jobs-section {
      background: white;
      border-radius: 28px;
      padding: 24px 28px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.04);
      border: 1px solid #edf2f7;
    }
    .section-title {
      font-size: 1.5rem;
      font-weight: 700;
      margin-bottom: 24px;
      display: flex;
      align-items: center;
      gap: 12px;
      border-left: 5px solid #1f6392;
      padding-left: 18px;
    }
    .job-card {
      background: #ffffff;
      border-radius: 24px;
      padding: 20px;
      margin-bottom: 18px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
      border: 1px solid #eef2f8;
      transition: all 0.2s ease;
    }
    .job-card:hover {
      transform: translateY(-2px);
      box-shadow: 0 12px 22px -10px rgba(0, 0, 0, 0.1);
      border-color: #dce5ed;
    }
    .job-header {
      display: flex;
      justify-content: space-between;
      flex-wrap: wrap;
      align-items: baseline;
      margin-bottom: 12px;
    }
    .job-title {
      font-size: 1.25rem;
      font-weight: 700;
      color: #1e2a3e;
    }
    .job-status {
      font-size: 0.75rem;
      font-weight: 600;
      padding: 5px 12px;
      border-radius: 50px;
      background: #f1f5f9;
      color: #2c3e50;
    }
    .status-completed {
      background: #e0f2e9;
      color: #116b3c;
    }
    .status-upcoming {
      background: #fff3e0;
      color: #b85c00;
    }
    .status-pending {
      background: #ffe8e6;
      color: #bc3900;
    }
    .job-details {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      margin: 14px 0 12px;
      font-size: 0.9rem;
      color: #4a627a;
    }
    .job-details span i {
      width: 22px;
      margin-right: 6px;
      color: #7f8fa4;
    }
    .job-price {
      font-weight: 700;
      color: #1c6e43;
      background: #f0faf4;
      padding: 4px 14px;
      border-radius: 40px;
      display: inline-block;
      font-size: 0.9rem;
    }
    .rating-star {
      color: #f5b042;
      letter-spacing: 2px;
      margin-top: 8px;
      font-size: 0.85rem;
      display: flex;
      align-items: center;
      gap: 8px;
    }
    .rating-star i {
      font-size: 0.9rem;
    }
    .job-footer {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-top: 16px;
      flex-wrap: wrap;
      gap: 12px;
    }
    .btn-sm {
      background: #f0f4f9;
      border: none;
      padding: 8px 18px;
      border-radius: 40px;
      font-weight: 500;
      font-size: 0.8rem;
      color: #2c5a7a;
      cursor: pointer;
      transition: 0.2s;
      font-family: 'Inter', sans-serif;
    }
    .btn-sm:hover {
      background: #e3eaf1;
      transform: scale(0.97);
    }
    .distance-badge {
      font-size: 0.75rem;
      background: #f2f5f9;
      border-radius: 30px;
      padding: 4px 12px;
      display: inline-flex;
      align-items: center;
      gap: 5px;
    }

    @keyframes pulse {
      0% { opacity: 0.6; transform: scale(1);}
      100% { opacity: 1; transform: scale(1.05);}
    }

    /* responsive */
    @media (max-width: 760px) {
      body { padding: 16px; }
      .jobs-section { padding: 18px; }
      .job-header { flex-direction: column; gap: 8px; align-items: flex-start; }
      .stats-mini { flex-direction: column; }
      .stat-card { min-width: auto; }
      .page-header h1 { font-size: 1.4rem; }
    }
    @media (max-width: 480px) {
      .job-details { flex-direction: column; gap: 8px; }
    }

    .empty-jobs {
      text-align: center;
      padding: 48px 20px;
      color: #7e8c9e;
    }
    .footer-note {
      font-size: 0.75rem;
      text-align: center;
      margin-top: 24px;
      padding-top: 12px;
      border-top: 1px solid #ecf3f9;
      color: #93a3b8;
    }
  </style>
</head>
<body>
<div class="jobs-container">
  <!-- header with status -->
  <div class="page-header">
    <h1><i class="fas fa-clipboard-list"></i> Job Listings & History</h1>
    <div class="online-badge"><span class="online-dot"></span> Online • Accepting Jobs</div>
  </div>

  <!-- stats overview (jobs completed, pending, rating etc) -->
  <div class="stats-mini" id="statsContainer"></div>

  <!-- main jobs section: listing and history -->
  <div class="jobs-section">
    <div class="section-title">
      <i class="fas fa-history"></i> All Jobs | Activity & History
    </div>
    <div id="jobsListContainer"></div>
    <div class="footer-note">
      <i class="fas fa-sync-alt"></i> Live updates • Showing complete job history & upcoming tasks
    </div>
  </div>
</div>

<script>
  // --------------------------------------------------------------
  // Complete job listing & history data as per the employee image
  // Contains: Completed, Upcoming, Pending jobs with full details
  // --------------------------------------------------------------
  const jobHistoryData = [
    {
      id: 1,
      title: "Plumber Service",
      location: "Aliganj, Lucknow",
      datetime: "24 May 2024 • 10:00 AM",
      price: 300,
      status: "Completed",
      distance: "2.5 km away",
      rating: null,
      completionNote: "Completed on time"
    },
    {
      id: 2,
      title: "Electrical Installation",
      location: "Hazratganj, Lucknow",
      datetime: "24 May 2024 • 01:00 PM",
      price: 450,
      status: "Upcoming",
      distance: "4.1 km away",
      rating: null
    },
    {
      id: 3,
      title: "Fan Repair",
      location: "Indira Nagar, Lucknow",
      datetime: "24 May 2024 • 03:30 PM",
      price: 250,
      status: "Upcoming",
      distance: "3.2 km away",
      rating: null
    },
    {
      id: 4,
      title: "AC Repair",
      location: "Gomti Nagar, Lucknow",
      datetime: "23 May 2024 • 11:30 AM",
      price: 350,
      status: "Completed",
      distance: "6.0 km away",
      rating: 5.0,
      review: "Excellent service!"
    },
    {
      id: 5,
      title: "Plumber Service (Emergency)",
      location: "Aliganj, Lucknow",
      datetime: "24 May 2024 • 11:00 AM",
      price: 350,
      status: "Pending",
      distance: "2.5 km away",
      rating: null,
      note: "Customer requested urgent"
    },
    {
      id: 6,
      title: "Geyser Repair",
      location: "Jankipuram, Lucknow",
      datetime: "25 May 2024 • 09:30 AM",
      price: 400,
      status: "Upcoming",
      distance: "5.0 km away",
      rating: null
    },
    {
      id: 7,
      title: "Water Purifier Service",
      location: "Gomti Nagar, Lucknow",
      datetime: "22 May 2024 • 04:00 PM",
      price: 280,
      status: "Completed",
      distance: "3.8 km away",
      rating: 4.5,
      review: "Great work"
    },
    {
      id: 8,
      title: "Smart TV Installation",
      location: "Hazratganj, Lucknow",
      datetime: "26 May 2024 • 12:00 PM",
      price: 550,
      status: "Upcoming",
      distance: "2.9 km away",
      rating: null
    }
  ];

  // compute dynamic stats
  const completedJobs = jobHistoryData.filter(job => job.status === "Completed");
  const pendingJobs = jobHistoryData.filter(job => job.status === "Pending");
  const upcomingJobs = jobHistoryData.filter(job => job.status === "Upcoming");
  const totalActive = pendingJobs.length + upcomingJobs.length;
  const totalJobs = jobHistoryData.length;
  
  // average rating from completed jobs that have rating
  let avgRating = 0;
  const ratedJobs = completedJobs.filter(job => job.rating !== null && typeof job.rating === 'number');
  if (ratedJobs.length > 0) {
    const sumRating = ratedJobs.reduce((acc, job) => acc + job.rating, 0);
    avgRating = (sumRating / ratedJobs.length).toFixed(1);
  } else {
    avgRating = "4.8"; // as per design from image
  }

  // render stats section
  function renderStats() {
    const statsContainer = document.getElementById('statsContainer');
    if (statsContainer) {
      statsContainer.innerHTML = `
        <div class="stat-card"><div class="stat-number">${completedJobs.length}</div><div class="stat-label">Jobs Completed</div></div>
        <div class="stat-card"><div class="stat-number">${totalActive}</div><div class="stat-label">Active / Pending Jobs</div></div>
        <div class="stat-card"><div class="stat-number">${totalJobs}</div><div class="stat-label">Total Jobs (History)</div></div>
        <div class="stat-card"><div class="stat-number"><i class="fas fa-star" style="font-size: 1.2rem;"></i> ${avgRating}</div><div class="stat-label">Rating</div></div>
      `;
    }
  }

  // Helper to get status style
  function getStatusClass(status) {
    if (status === 'Completed') return 'status-completed';
    if (status === 'Upcoming') return 'status-upcoming';
    if (status === 'Pending') return 'status-pending';
    return '';
  }

  // Render full job listing & history cards
  function renderJobsList() {
    const container = document.getElementById('jobsListContainer');
    if (!container) return;
    
    if (jobHistoryData.length === 0) {
      container.innerHTML = `<div class="empty-jobs"><i class="fas fa-tools" style="font-size: 3rem; opacity:0.5;"></i><p>No jobs found. Stay online to receive service requests!</p></div>`;
      return;
    }

    let jobsHTML = '';
    // we can sort by date for better readability: most recent first? preserve order but we'll put upcoming + pending first optionally? 
    // but to match design exactly, show as per original ordering: maintain listing & history 
    // but we can order: show pending/upcoming first then completed? but the requirement says "job listing & history", showing all cards in clear groups.
    // We'll show as is, but we group with subtle divider? but not needed. Let's render all cards with clear status.
    
    // to make experience better, sort by status priority: Pending -> Upcoming -> Completed (history)
    const sortedJobs = [...jobHistoryData].sort((a, b) => {
      const order = { 'Pending': 1, 'Upcoming': 2, 'Completed': 3 };
      return (order[a.status] || 4) - (order[b.status] || 4);
    });
    
    for (const job of sortedJobs) {
      const statusClass = getStatusClass(job.status);
      let ratingHtml = '';
      if (job.rating && job.status === 'Completed') {
        const stars = generateStars(job.rating);
        ratingHtml = `<div class="rating-star"><i class="fas fa-star" style="color:#f5b042;"></i> ${job.rating}  ${stars}</div>`;
      } else if (job.status === 'Completed' && !job.rating) {
        // fallback if completed but rating not present
        ratingHtml = `<div class="rating-star"><i class="far fa-star"></i> Not rated yet</div>`;
      }

      // additional review text if exists
      let reviewHtml = '';
      if (job.review && job.status === 'Completed') {
        reviewHtml = `<div style="font-size:0.75rem; color:#4f7a5b; margin-top: 6px;"><i class="fas fa-comment-dots"></i> "${job.review}"</div>`;
      }

      jobsHTML += `
        <div class="job-card">
          <div class="job-header">
            <div class="job-title">${escapeHtml(job.title)}</div>
            <div class="job-status ${statusClass}">${job.status}</div>
          </div>
          <div class="job-details">
            <span><i class="fas fa-map-marker-alt"></i> ${escapeHtml(job.location)}</span>
            <span><i class="far fa-calendar-alt"></i> ${escapeHtml(job.datetime)}</span>
            <span class="distance-badge"><i class="fas fa-road"></i> ${job.distance}</span>
          </div>
          <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 8px;">
            <span class="job-price"><i class="fas fa-rupee-sign"></i> ₹${job.price}</span>
            ${ratingHtml}
          </div>
          ${reviewHtml}
          <div class="job-footer">
            <button class="btn-sm view-job-details" data-id="${job.id}" data-title="${escapeHtml(job.title)}" data-location="${escapeHtml(job.location)}" data-datetime="${job.datetime}" data-price="${job.price}" data-status="${job.status}" data-distance="${job.distance}" data-rating="${job.rating || ''}" data-review="${job.review || ''}">
              <i class="fas fa-eye"></i> View Details
            </button>
            ${job.status === 'Upcoming' ? '<button class="btn-sm start-job-action" data-job="'+job.id+'"><i class="fas fa-play"></i> Mark Ongoing</button>' : ''}
            ${job.status === 'Pending' ? '<button class="btn-sm accept-job-action" data-job="'+job.id+'"><i class="fas fa-check-circle"></i> Accept & Start</button>' : ''}
            ${job.status === 'Completed' ? '<button class="btn-sm" disabled style="opacity:0.6; cursor:default;"><i class="fas fa-check-double"></i> Completed</button>' : ''}
          </div>
        </div>
      `;
    }
    container.innerHTML = jobsHTML;

    // Attach event listeners for View Details buttons
    document.querySelectorAll('.view-job-details').forEach(btn => {
      btn.addEventListener('click', (e) => {
        const title = btn.getAttribute('data-title');
        const location = btn.getAttribute('data-location');
        const datetime = btn.getAttribute('data-datetime');
        const price = btn.getAttribute('data-price');
        const status = btn.getAttribute('data-status');
        const distance = btn.getAttribute('data-distance');
        const rating = btn.getAttribute('data-rating');
        const review = btn.getAttribute('data-review');
        
        let ratingMsg = '';
        if (rating && rating !== 'null' && rating !== '') {
          ratingMsg = `\n⭐ Rating: ${rating}`;
        }
        let reviewMsg = '';
        if (review && review !== 'null' && review !== '') {
          reviewMsg = `\n💬 Review: "${review}"`;
        }
        alert(`📋 JOB DETAILS\n━━━━━━━━━━━━━━━━\n🔧 Service: ${title}\n📍 Location: ${location}\n📅 Date & Time: ${datetime}\n💰 Amount: ₹${price}\n📌 Status: ${status}\n🚗 Distance: ${distance}${ratingMsg}${reviewMsg}`);
      });
    });

    // handle mark ongoing / accept actions (simulated user friendly)
    document.querySelectorAll('.start-job-action').forEach(btn => {
      btn.addEventListener('click', (e) => {
        e.preventDefault();
        alert("✅ Job marked as Ongoing! BESIC SEVA will update the schedule. You can now navigate to customer location.");
      });
    });
    document.querySelectorAll('.accept-job-action').forEach(btn => {
      btn.addEventListener('click', (e) => {
        e.preventDefault();
        alert("🎉 Job Accepted! Contact customer if needed. Status will change to ongoing shortly.");
      });
    });
  }

  // helper to generate star rating
  function generateStars(rating) {
    const fullStars = Math.floor(rating);
    const hasHalf = rating - fullStars >= 0.5;
    let starsHtml = '';
    for (let i = 0; i < fullStars; i++) starsHtml += '★';
    if (hasHalf) starsHtml += '½';
    const emptyCount = 5 - Math.ceil(rating);
    for (let i = 0; i < emptyCount; i++) starsHtml += '☆';
    return `<span style="font-size:0.85rem; letter-spacing:2px;">${starsHtml}</span>`;
  }

  // simple escape to avoid XSS
  function escapeHtml(str) {
    if (!str) return '';
    return str.replace(/[&<>]/g, function(m) {
      if (m === '&') return '&amp;';
      if (m === '<') return '&lt;';
      if (m === '>') return '&gt;';
      return m;
    }).replace(/[\uD800-\uDBFF][\uDC00-\uDFFF]/g, function(c) {
      return c;
    });
  }

  // Initialize and render everything
  function init() {
    renderStats();
    renderJobsList();
  }
  
  init();
</script>
</body>
</html>