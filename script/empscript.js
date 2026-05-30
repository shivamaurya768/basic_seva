 
  //employee javaScript
  const hamburgerBtn = document.getElementById('hamburgerBtn');
  const sidebar = document.getElementById('sidebar');
  const overlay = document.getElementById('sidebarOverlay');

  hamburgerBtn.addEventListener('click', () => {
    sidebar.classList.toggle('open');
    overlay.classList.toggle('open');
  });
  overlay.addEventListener('click', () => {
    sidebar.classList.remove('open');
    overlay.classList.remove('open');
  });

  // Online toggle
  document.getElementById('onlineToggle').addEventListener('click', function() {
    this.classList.toggle('on');
  });

  // Job request actions
  function handleAccept(btn) {
    const card = btn.closest('.job-request-card');
    card.style.background = '#dcfce7';
    card.querySelector('.jrc-actions').innerHTML =
      '<div style="width:100%;text-align:center;font-size:13px;font-weight:700;color:#16a34a;padding:4px;">✅ Job Accepted!</div>';
  }
  function handleReject(btn) {
    const card = btn.closest('.job-request-card');
    card.style.transition = 'opacity 0.4s';
    card.style.opacity = '0';
    setTimeout(() => card.remove(), 420);
  }

  // Tab filtering
  function filterTab(tab, filter) {
    document.querySelectorAll('.tab').forEach(t => t.classList.remove('active'));
    tab.classList.add('active');
    // All tabs just show all items for demo
    document.querySelectorAll('#jobsList .job-item').forEach(item => {
      item.style.display = '';
    });
  }
// All Tabs
const tabs = {
    addDetails: document.querySelector('#addDetails'),
    dashboard: document.querySelector('#deshboard'),
    myjob: document.querySelector('#myjob'),
    earning: document.querySelector('#Earning'),
    attendance: document.querySelector('#attendence'),
    myDocument: document.querySelector('#myDocument'),
    training: document.querySelector('#training'),
    serviceCatalog: document.querySelector('#service_catalog'),
    notification: document.querySelector('#natification'),
    referEranTab: document.querySelector("#referEran"),
    settingTab: document.querySelector("#setting")
};

// All Sections
const sections = {
    addDetails: document.querySelector('.add_details'),
    dashboard: document.querySelector('.deshboard'),
    myjob: document.querySelector('.Myjob'),
    earning: document.querySelector('.earning'),
    attendance: document.querySelector('.attendence'),
    myDocument: document.querySelector('.myDocument'),
    training: document.querySelector('.traning'),
    serviceCatalog: document.querySelector('.service_catalog'),
    notification: document.querySelector('.natification'),
    referEran: document.querySelector('.referEran'),
    setting: document.querySelector('.setting')
};

// Function
function showSection(activeTab, activeSection){

    // Remove active class from all tabs
    Object.values(tabs).forEach(tab => {
        tab.classList.remove('active');
    });

    // Hide all sections
    Object.values(sections).forEach(section => {
        section.style.display = "none";
    });

    // Active current tab
    activeTab.classList.add('active');

    // Show current section
    activeSection.style.display = "block";
}


// Events
tabs.addDetails.addEventListener('click', () => {
    showSection(tabs.addDetails, sections.addDetails);
});

tabs.dashboard.addEventListener('click', () => {
    showSection(tabs.dashboard, sections.dashboard);
});

tabs.myjob.addEventListener('click', () => {
    showSection(tabs.myjob, sections.myjob);
});

tabs.earning.addEventListener('click', () => {
    showSection(tabs.earning, sections.earning);
});

tabs.attendance.addEventListener('click', () => {
    showSection(tabs.attendance, sections.attendance);
});

tabs.myDocument.addEventListener('click', () => {
    showSection(tabs.myDocument, sections.myDocument);
});

tabs.training.addEventListener('click', () => {
    showSection(tabs.training, sections.training);
});

tabs.serviceCatalog.addEventListener('click', () => {
    showSection(tabs.serviceCatalog, sections.serviceCatalog);
});

tabs.notification.addEventListener('click', () => {
    showSection(tabs.notification, sections.notification);
});

tabs.referEranTab.addEventListener('click', () => {
    showSection(tabs.referEranTab, sections.referEran);
});
tabs.settingTab.addEventListener('click', () => {
    showSection(tabs.settingTab, sections.setting);
});