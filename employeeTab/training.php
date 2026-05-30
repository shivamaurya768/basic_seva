<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>BESIC SEVA - Training & Skill Development</title>
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

        .training-container {
            max-width: 1400px;
            margin: 0 auto;
        }

        /* Header Section */
        .page-header {
            background: white;
            border-radius: 32px;
            padding: 28px 36px;
            margin-bottom: 32px;
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

        /* Stats / Progress Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 22px;
            margin-bottom: 32px;
        }
        .stat-card {
            background: white;
            border-radius: 28px;
            padding: 22px 24px;
            display: flex;
            align-items: center;
            gap: 18px;
            border: 1px solid #eef2f8;
            transition: all 0.2s;
        }
        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 24px -12px rgba(0, 0, 0, 0.1);
        }
        .stat-icon {
            width: 58px;
            height: 58px;
            background: #e8f5ed;
            border-radius: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            color: #2d8a52;
        }
        .stat-info h3 {
            font-size: 1.8rem;
            font-weight: 800;
            color: #1e2a3e;
        }
        .stat-info p {
            font-size: 0.8rem;
            color: #6f8fae;
            font-weight: 500;
        }

        /* Tab Navigation for Training Categories */
        .training-tabs {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-bottom: 28px;
            background: white;
            padding: 8px 20px;
            border-radius: 60px;
            display: inline-flex;
            width: auto;
        }
        .tab-btn {
            background: transparent;
            border: none;
            padding: 10px 24px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.9rem;
            cursor: pointer;
            transition: 0.2s;
            color: #5c7a9a;
        }
        .tab-btn.active {
            background: #2d8a52;
            color: white;
            box-shadow: 0 4px 10px rgba(45, 138, 82, 0.25);
        }
        .tab-btn:hover:not(.active) {
            background: #e8f5ed;
        }
        .tabs-wrapper {
            margin-bottom: 28px;
        }

        /* Training Cards Grid */
        .training-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(340px, 1fr));
            gap: 28px;
            margin-bottom: 40px;
        }
        .training-card {
            background: white;
            border-radius: 28px;
            overflow: hidden;
            transition: all 0.3s;
            border: 1px solid #eef2f8;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.02);
        }
        .training-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 24px 36px -16px rgba(0, 0, 0, 0.15);
            border-color: #cde0d5;
        }
        .card-thumbnail {
            background: linear-gradient(135deg, #2d8a52 0%, #3aa86a 100%);
            padding: 28px 24px;
            color: white;
            position: relative;
        }
        .card-thumbnail i {
            font-size: 2.5rem;
            background: rgba(255,255,255,0.2);
            padding: 12px;
            border-radius: 20px;
        }
        .card-badge {
            position: absolute;
            top: 20px;
            right: 20px;
            background: rgba(255,255,255,0.95);
            color: #2d8a52;
            padding: 4px 12px;
            border-radius: 30px;
            font-size: 0.7rem;
            font-weight: 700;
        }
        .card-content {
            padding: 24px;
        }
        .card-title {
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: 8px;
        }
        .card-desc {
            font-size: 0.85rem;
            color: #5c7a9a;
            line-height: 1.4;
            margin-bottom: 16px;
        }
        .progress-section {
            margin: 16px 0;
        }
        .progress-label {
            display: flex;
            justify-content: space-between;
            font-size: 0.7rem;
            font-weight: 600;
            margin-bottom: 6px;
            color: #3a5a7a;
        }
        .progress-bar {
            height: 8px;
            background: #eef2f8;
            border-radius: 10px;
            overflow: hidden;
        }
        .progress-fill {
            height: 100%;
            background: #2d8a52;
            border-radius: 10px;
            width: 0%;
            transition: width 0.3s;
        }
        .card-meta {
            display: flex;
            gap: 16px;
            font-size: 0.7rem;
            color: #7e95b0;
            margin: 12px 0;
        }
        .card-actions {
            display: flex;
            gap: 12px;
            margin-top: 18px;
            flex-wrap: wrap;
        }
        .btn-primary-sm {
            background: #2d8a52;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 40px;
            font-weight: 600;
            font-size: 0.8rem;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: 0.2s;
        }
        .btn-outline-sm {
            background: transparent;
            border: 1px solid #cbdde9;
            padding: 10px 20px;
            border-radius: 40px;
            font-weight: 500;
            font-size: 0.8rem;
            cursor: pointer;
            transition: 0.2s;
        }
        .btn-primary-sm:hover {
            background: #236b41;
            transform: scale(0.97);
        }
        .btn-outline-sm:hover {
            background: #e8f5ed;
            border-color: #2d8a52;
        }

        /* Certificate & Achievements */
        .achievement-section {
            background: white;
            border-radius: 32px;
            padding: 28px 32px;
            margin-top: 20px;
            border: 1px solid #edf2f9;
        }
        .section-title {
            font-size: 1.4rem;
            font-weight: 700;
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            gap: 12px;
            border-left: 5px solid #2d8a52;
            padding-left: 20px;
        }
        .certificates-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .cert-card {
            background: #fafcff;
            border-radius: 20px;
            padding: 16px 20px;
            border: 1px solid #eef2f8;
            display: flex;
            align-items: center;
            gap: 16px;
            min-width: 240px;
            flex: 1;
            transition: 0.2s;
        }
        .cert-card:hover {
            border-color: #2d8a52;
            background: #f8fff9;
        }
        .cert-icon {
            font-size: 2rem;
            color: #2d8a52;
        }
        .cert-info h4 {
            font-size: 0.9rem;
            font-weight: 700;
        }
        .cert-info p {
            font-size: 0.7rem;
            color: #6f8fae;
        }
        .cert-download {
            color: #2d8a52;
            cursor: pointer;
            margin-left: auto;
            font-size: 1.2rem;
            transition: 0.2s;
        }
        .cert-download:hover {
            transform: scale(1.1);
        }

        /* Modal for Video/Lesson */
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
            max-width: 650px;
            max-height: 85vh;
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }
        .modal-header {
            padding: 20px 24px;
            border-bottom: 1px solid #eef2f8;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .modal-header h3 { font-size: 1.3rem; font-weight: 700; }
        .close-modal {
            background: #f0f4f9;
            border: none;
            width: 36px;
            height: 36px;
            border-radius: 30px;
            cursor: pointer;
            transition: 0.2s;
        }
        .close-modal:hover {
            background: #e0e6ef;
        }
        .modal-body {
            padding: 24px;
            overflow-y: auto;
        }
        .video-placeholder {
            background: linear-gradient(135deg, #1a4d2e, #2d8a52);
            border-radius: 24px;
            padding: 60px 20px;
            text-align: center;
            color: white;
        }

        @media (max-width: 780px) {
            body { padding: 16px; }
            .training-grid { grid-template-columns: 1fr; }
            .training-tabs { border-radius: 30px; padding: 6px 12px; width: 100%; justify-content: center; }
            .tab-btn { padding: 6px 16px; font-size: 0.75rem; }
            .page-header { padding: 20px; flex-direction: column; align-items: flex-start; gap: 12px; }
            .stats-grid { gap: 14px; }
            .stat-card { padding: 16px; }
            .stat-icon { width: 48px; height: 48px; font-size: 1.4rem; }
            .stat-info h3 { font-size: 1.4rem; }
            .card-actions { flex-direction: column; }
            .btn-primary-sm, .btn-outline-sm { width: 100%; justify-content: center; }
            .certificates-grid { flex-direction: column; }
            .cert-card { width: 100%; }
        }

        @media (max-width: 480px) {
            .training-tabs { gap: 6px; }
            .tab-btn { padding: 5px 12px; font-size: 0.7rem; }
            .card-thumbnail { padding: 20px; }
            .card-content { padding: 18px; }
            .section-title { font-size: 1.2rem; }
        }

        .empty-state {
            text-align: center;
            padding: 60px;
            color: #95adc7;
        }
        .footer-note {
            text-align: center;
            font-size: 0.7rem;
            color: #8aa0b8;
            margin-top: 28px;
        }
    </style>
</head>
<body>
<div class="training-container">
    <!-- Header -->
    <div class="page-header">
        <h1><i class="fas fa-chalkboard-user"></i> Training & Development</h1>
        <div class="header-badge"><i class="fas fa-graduation-cap"></i> Upskill • Earn More</div>
    </div>

    <!-- Stats Row -->
    <div class="stats-grid" id="statsGrid"></div>

    <!-- Category Tabs -->
    <div class="tabs-wrapper">
        <div class="training-tabs" id="trainingTabs">
            <button class="tab-btn active" data-cat="all">All Courses</button>
            <button class="tab-btn" data-cat="technical">Technical Skills</button>
            <button class="tab-btn" data-cat="soft">Soft Skills</button>
            <button class="tab-btn" data-cat="safety">Safety & Compliance</button>
        </div>
    </div>

    <!-- Training Cards Grid -->
    <div class="training-grid" id="trainingGrid"></div>

    <!-- Certificates & Achievements -->
    <div class="achievement-section">
        <div class="section-title">
            <i class="fas fa-award"></i> My Certificates & Achievements
        </div>
        <div class="certificates-grid" id="certificatesGrid"></div>
    </div>
    <div class="footer-note">
        <i class="fas fa-clock"></i> Complete courses to get certified • New training added every month
    </div>
</div>

<!-- Training Lesson Modal -->
<div id="lessonModal" class="modal-overlay">
    <div class="modal-container">
        <div class="modal-header">
            <h3 id="modalTitle">Training Module</h3>
            <button class="close-modal" id="closeModalBtn"><i class="fas fa-times"></i></button>
        </div>
        <div class="modal-body" id="modalBody">
            <div class="video-placeholder">
                <i class="fas fa-play-circle" style="font-size: 3rem; margin-bottom: 16px;"></i>
                <p>Interactive lesson content will appear here.<br>Complete the module to increase progress.</p>
                <button id="markCompleteBtn" style="margin-top: 20px; background: #2d8a52; border: none; padding: 10px 24px; border-radius: 40px; color: white; font-weight: bold; cursor: pointer;">Mark as Completed</button>
            </div>
        </div>
    </div>
</div>

<script>
    // -------------------------------
    // TRAINING DATABASE (Courses with progress tracking)
    // -------------------------------
    let trainingCourses = [
        {
            id: 1,
            title: "Advanced Electrical Wiring",
            category: "technical",
            description: "Master modern wiring techniques, safety protocols, and smart home installations.",
            duration: "4 hours",
            lessons: 6,
            progress: 75,
            thumbnailIcon: "fas fa-bolt",
            certificate: "Electrical Expert - Level 2"
        },
        {
            id: 2,
            title: "AC Repair & Maintenance",
            category: "technical",
            description: "Complete guide to troubleshooting, gas refilling, and servicing AC units.",
            duration: "5 hours",
            lessons: 8,
            progress: 45,
            thumbnailIcon: "fas fa-wind",
            certificate: "Certified HVAC Technician"
        },
        {
            id: 3,
            title: "Customer Communication Skills",
            category: "soft",
            description: "Improve client interaction, handle complaints professionally, and get 5-star ratings.",
            duration: "2.5 hours",
            lessons: 4,
            progress: 90,
            thumbnailIcon: "fas fa-comments",
            certificate: "Customer Excellence Badge"
        },
        {
            id: 4,
            title: "Plumbing Masterclass",
            category: "technical",
            description: "Pipe installation, leak detection, advanced plumbing tools.",
            duration: "6 hours",
            lessons: 10,
            progress: 20,
            thumbnailIcon: "fas fa-wrench",
            certificate: "Master Plumber Certification"
        },
        {
            id: 5,
            title: "Workplace Safety & PPE",
            category: "safety",
            description: "Essential safety practices, personal protective equipment, and first aid.",
            duration: "2 hours",
            lessons: 3,
            progress: 100,
            thumbnailIcon: "fas fa-hard-hat",
            certificate: "Safety Compliance Certified"
        },
        {
            id: 6,
            title: "Time Management for Technicians",
            category: "soft",
            description: "Optimize daily schedule, reduce downtime, and increase job completion rate.",
            duration: "1.5 hours",
            lessons: 3,
            progress: 30,
            thumbnailIcon: "fas fa-hourglass-half",
            certificate: "Productivity Pro"
        },
        {
            id: 7,
            title: "Smart Home Device Installation",
            category: "technical",
            description: "IoT devices, smart switches, and home automation setup.",
            duration: "3.5 hours",
            lessons: 5,
            progress: 0,
            thumbnailIcon: "fas fa-microchip",
            certificate: "Smart Home Specialist"
        },
        {
            id: 8,
            title: "Fire Safety & Emergency Response",
            category: "safety",
            description: "Fire extinguisher training, evacuation procedures, emergency handling.",
            duration: "2 hours",
            lessons: 4,
            progress: 60,
            thumbnailIcon: "fas fa-fire-extinguisher",
            certificate: "Fire Safety Certified"
        }
    ];

    // Achievements / Certificates earned (based on completed courses)
    let earnedCertificates = [];

    function updateCertificatesFromProgress() {
        const certMap = new Map();
        trainingCourses.forEach(course => {
            if (course.progress >= 100) {
                if (!certMap.has(course.certificate)) {
                    certMap.set(course.certificate, {
                        name: course.certificate,
                        courseName: course.title,
                        icon: "fas fa-certificate"
                    });
                }
            }
        });
        earnedCertificates = Array.from(certMap.values());
        renderCertificates();
    }

    // Load/Save progress to localStorage
    function loadProgressFromStorage() {
        const stored = localStorage.getItem('besic_training_progress_v2');
        if (stored) {
            const savedCourses = JSON.parse(stored);
            trainingCourses = trainingCourses.map(course => {
                const saved = savedCourses.find(s => s.id === course.id);
                if (saved) {
                    return { ...course, progress: saved.progress };
                }
                return course;
            });
        }
        updateCertificatesFromProgress();
    }

    function saveProgressToStorage() {
        const progressData = trainingCourses.map(c => ({ id: c.id, progress: c.progress }));
        localStorage.setItem('besic_training_progress_v2', JSON.stringify(progressData));
        updateCertificatesFromProgress();
        renderStats();
        renderTrainingGrid(currentCategory);
    }

    // Update course progress (increase by 20 or set to 100)
    function updateCourseProgress(courseId, increment = true) {
        const course = trainingCourses.find(c => c.id === courseId);
        if (course) {
            if (increment) {
                if (course.progress < 100) {
                    let newProgress = Math.min(course.progress + 25, 100);
                    course.progress = newProgress;
                } else {
                    alert("🎉 Course already completed! Certificate already earned.");
                    return;
                }
            } else {
                course.progress = Math.min(course.progress + 10, 100);
            }
            saveProgressToStorage();
            renderTrainingGrid(currentCategory);
            if (course.progress === 100) {
                alert(`🏆 Congratulations! You've completed "${course.title}" and earned certificate: ${course.certificate}`);
            } else {
                alert(`✅ Progress updated! "${course.title}" is now ${course.progress}% complete.`);
            }
        }
    }

    // Stats calculation
    function calculateStats() {
        const totalCourses = trainingCourses.length;
        const completed = trainingCourses.filter(c => c.progress === 100).length;
        const inProgress = trainingCourses.filter(c => c.progress > 0 && c.progress < 100).length;
        const avgProgress = Math.round(trainingCourses.reduce((sum, c) => sum + c.progress, 0) / totalCourses);
        return { totalCourses, completed, inProgress, avgProgress };
    }

    function renderStats() {
        const stats = calculateStats();
        const statsContainer = document.getElementById('statsGrid');
        statsContainer.innerHTML = `
            <div class="stat-card"><div class="stat-icon"><i class="fas fa-book-open"></i></div><div class="stat-info"><h3>${stats.totalCourses}</h3><p>Total Courses</p></div></div>
            <div class="stat-card"><div class="stat-icon"><i class="fas fa-certificate"></i></div><div class="stat-info"><h3>${stats.completed}</h3><p>Completed</p></div></div>
            <div class="stat-card"><div class="stat-icon"><i class="fas fa-chart-line"></i></div><div class="stat-info"><h3>${stats.inProgress}</h3><p>In Progress</p></div></div>
            <div class="stat-card"><div class="stat-icon"><i class="fas fa-percent"></i></div><div class="stat-info"><h3>${stats.avgProgress}%</h3><p>Avg Progress</p></div></div>
        `;
    }

    let currentCategory = "all";

    function renderTrainingGrid(category) {
        const filtered = category === "all" ? trainingCourses : trainingCourses.filter(c => c.category === category);
        const grid = document.getElementById('trainingGrid');
        if (!filtered.length) {
            grid.innerHTML = `<div class="empty-state"><i class="fas fa-folder-open"></i><p>No courses in this category. Check other tabs!</p></div>`;
            return;
        }
        let html = '';
        filtered.forEach(course => {
            const progressFillWidth = course.progress;
            html += `
                <div class="training-card" data-id="${course.id}">
                    <div class="card-thumbnail">
                        <i class="${course.thumbnailIcon}"></i>
                        <div class="card-badge">${course.duration}</div>
                    </div>
                    <div class="card-content">
                        <div class="card-title">${escapeHtml(course.title)}</div>
                        <div class="card-desc">${escapeHtml(course.description)}</div>
                        <div class="card-meta">
                            <span><i class="fas fa-video"></i> ${course.lessons} lessons</span>
                            <span><i class="fas fa-clock"></i> ${course.duration}</span>
                        </div>
                        <div class="progress-section">
                            <div class="progress-label"><span>Progress</span><span>${course.progress}%</span></div>
                            <div class="progress-bar"><div class="progress-fill" style="width: ${course.progress}%;"></div></div>
                        </div>
                        <div class="card-actions">
                            <button class="btn-primary-sm start-training" data-id="${course.id}"><i class="fas fa-play"></i> ${course.progress > 0 ? 'Continue' : 'Start'}</button>
                            <button class="btn-outline-sm mark-progress" data-id="${course.id}"><i class="fas fa-check-double"></i> Mark +25%</button>
                        </div>
                    </div>
                </div>
            `;
        });
        grid.innerHTML = html;

        // Attach event listeners
        document.querySelectorAll('.start-training').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.stopPropagation();
                const id = parseInt(btn.getAttribute('data-id'));
                const course = trainingCourses.find(c => c.id === id);
                if (course) openLessonModal(course);
            });
        });
        document.querySelectorAll('.mark-progress').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.stopPropagation();
                const id = parseInt(btn.getAttribute('data-id'));
                updateCourseProgress(id, true);
            });
        });
    }

    // Modal for training lesson simulation
    let currentModalCourse = null;
    function openLessonModal(course) {
        currentModalCourse = course;
        const modal = document.getElementById('lessonModal');
        const modalTitle = document.getElementById('modalTitle');
        const modalBody = document.getElementById('modalBody');
        modalTitle.innerText = `${course.title} - Learning Module`;
        modalBody.innerHTML = `
            <div class="video-placeholder" style="background: linear-gradient(135deg, #1a4d2e, #2d8a52);">
                <i class="fas fa-play-circle" style="font-size: 4rem; margin-bottom: 20px;"></i>
                <h3 style="margin-bottom: 12px;">${escapeHtml(course.title)}</h3>
                <p style="margin-bottom: 16px;">${escapeHtml(course.description)}</p>
                <div style="background: rgba(255,255,255,0.15); border-radius: 20px; padding: 16px; margin: 20px 0;">
                    <i class="fas fa-tasks"></i> Lesson Progress: ${course.progress}% complete<br>
                    <small>${course.lessons} interactive modules</small>
                </div>
                <button id="modalCompleteBtn" style="background: #2d8a52; border: none; padding: 12px 28px; border-radius: 50px; color: white; font-weight: bold; cursor: pointer; margin-top: 10px;">
                    <i class="fas fa-check-circle"></i> Mark Lesson Completed (+25%)
                </button>
                <button id="modalCloseBtn" style="background: rgba(255,255,255,0.2); border: none; padding: 12px 24px; border-radius: 50px; color: white; margin-left: 12px; cursor: pointer;">Close</button>
            </div>
        `;
        modal.classList.add('active');
        
        const completeBtn = document.getElementById('modalCompleteBtn');
        if (completeBtn) {
            completeBtn.addEventListener('click', () => {
                updateCourseProgress(course.id, true);
                closeModal();
            });
        }
        const modalCloseBtn = document.getElementById('modalCloseBtn');
        if (modalCloseBtn) {
            modalCloseBtn.addEventListener('click', closeModal);
        }
    }

    function closeModal() {
        document.getElementById('lessonModal').classList.remove('active');
        currentModalCourse = null;
    }

    function renderCertificates() {
        const certContainer = document.getElementById('certificatesGrid');
        if (!earnedCertificates.length) {
            certContainer.innerHTML = `<div class="empty-state" style="padding: 30px; width:100%;"><i class="fas fa-award"></i><p>Complete courses to earn certificates and badges.</p></div>`;
            return;
        }
        let certHtml = '';
        earnedCertificates.forEach(cert => {
            certHtml += `
                <div class="cert-card">
                    <div class="cert-icon"><i class="${cert.icon}"></i></div>
                    <div class="cert-info">
                        <h4>${escapeHtml(cert.name)}</h4>
                        <p>${escapeHtml(cert.courseName)}</p>
                    </div>
                    <i class="fas fa-download cert-download" title="Download Certificate"></i>
                </div>
            `;
        });
        certContainer.innerHTML = certHtml;
        // Download simulation
        document.querySelectorAll('.cert-download').forEach((icon) => {
            icon.addEventListener('click', () => {
                alert("📜 Certificate PDF will be generated. You've earned this credential!");
            });
        });
    }

    // Tab switching
    function bindTabs() {
        const tabs = document.querySelectorAll('.tab-btn');
        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                tabs.forEach(t => t.classList.remove('active'));
                tab.classList.add('active');
                currentCategory = tab.getAttribute('data-cat');
                renderTrainingGrid(currentCategory);
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

    // Initialization
    function init() {
        loadProgressFromStorage();
        bindTabs();
        renderStats();
        renderTrainingGrid("all");
        renderCertificates();
        document.getElementById('closeModalBtn')?.addEventListener('click', closeModal);
        const modalOverlay = document.getElementById('lessonModal');
        modalOverlay.addEventListener('click', (e) => {
            if (e.target === modalOverlay) closeModal();
        });
    }
    init();
</script>
</body>
</html>