<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>BESIC SEVA - My Documents | Secure Vault with Preview & Download</title>
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
            padding: 20px;
        }

        .documents-container {
            max-width: 1400px;
            margin: 0 auto;
        }

        /* Header */
        .page-header {
            background: white;
            border-radius: 32px;
            padding: 24px 32px;
            margin-bottom: 28px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 12px rgba(0,0,0,0.03);
            border: 1px solid #eef2f8;
        }
        .page-header h1 {
            font-size: 1.9rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 12px;
            color: #0a2b38;
        }
        .page-header h1 i { color: #1f6392; }
        .header-badge {
            background: #eef3fc;
            padding: 8px 20px;
            border-radius: 40px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        /* Stats Cards */
        .stats-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 32px;
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
        .stat-icon {
            width: 52px;
            height: 52px;
            background: #eef3fc;
            border-radius: 28px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: #1f6392;
        }
        .stat-info h3 { font-size: 1.8rem; font-weight: 800; }
        .stat-info p { font-size: 0.75rem; color: #6f8fae; }

        /* Document Grid */
        .documents-section {
            background: white;
            border-radius: 32px;
            padding: 28px 32px;
            margin-bottom: 32px;
            border: 1px solid #edf2f9;
        }
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            margin-bottom: 28px;
        }
        .section-title {
            font-size: 1.4rem;
            font-weight: 700;
            border-left: 5px solid #1f6392;
            padding-left: 18px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .upload-btn {
            background: #1f6392;
            color: white;
            border: none;
            padding: 12px 28px;
            border-radius: 50px;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: 0.2s;
        }
        .upload-btn:hover { background: #0e4a70; transform: scale(0.97); }

        .documents-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(310px, 1fr));
            gap: 24px;
        }
        .doc-card {
            background: #ffffff;
            border-radius: 24px;
            border: 1px solid #eef2f8;
            padding: 20px;
            transition: all 0.25s;
            cursor: pointer;
        }
        .doc-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 30px -12px rgba(0,0,0,0.1);
            border-color: #cde0ef;
        }
        .doc-card-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 12px;
        }
        .doc-icon {
            width: 55px;
            height: 55px;
            background: #f0f7fe;
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            color: #1f6392;
        }
        .doc-status {
            padding: 4px 12px;
            border-radius: 30px;
            font-size: 0.7rem;
            font-weight: 600;
        }
        .status-verified { background: #e0f2e9; color: #116b3c; }
        .status-pending { background: #fff3e0; color: #b85c00; }
        .doc-title {
            font-weight: 700;
            font-size: 1.1rem;
            margin: 12px 0 6px;
        }
        .doc-meta {
            font-size: 0.7rem;
            color: #7e95b0;
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            margin-bottom: 12px;
        }
        .card-actions {
            display: flex;
            gap: 12px;
            margin-top: 16px;
            padding-top: 12px;
            border-top: 1px solid #f0f4fa;
        }
        .action-btn {
            background: #f4f8fe;
            padding: 7px 14px;
            border-radius: 40px;
            font-size: 0.7rem;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            cursor: pointer;
            transition: 0.2s;
        }
        .action-btn:hover { background: #e3eaf3; }

        /* Modal for Preview (DOM-based document viewer) */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.7);
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
            max-width: 700px;
            max-height: 85vh;
            display: flex;
            flex-direction: column;
            overflow: hidden;
            box-shadow: 0 30px 50px rgba(0,0,0,0.3);
        }
        .modal-header {
            padding: 20px 24px;
            border-bottom: 1px solid #eef2f8;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .modal-header h3 { font-size: 1.4rem; font-weight: 700; }
        .close-modal {
            background: #f0f4f9;
            border: none;
            width: 36px;
            height: 36px;
            border-radius: 30px;
            cursor: pointer;
            font-size: 1.2rem;
        }
        .modal-body {
            padding: 24px;
            overflow-y: auto;
            flex: 1;
        }
        .doc-preview-card {
            background: #fafcff;
            border-radius: 24px;
            padding: 24px;
            text-align: center;
            border: 1px solid #eef2f8;
        }
        .preview-icon {
            font-size: 5rem;
            color: #1f6392;
            margin-bottom: 20px;
        }
        .preview-details p {
            margin: 12px 0;
            font-size: 0.95rem;
        }
        .download-from-modal {
            background: #1f6392;
            color: white;
            border: none;
            padding: 12px 28px;
            border-radius: 50px;
            font-weight: 600;
            margin-top: 20px;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        /* Upload Modal */
        .upload-modal {
            max-width: 480px;
        }
        .upload-modal input, .upload-modal select {
            width: 100%;
            padding: 14px;
            border: 1px solid #dce5ef;
            border-radius: 24px;
            margin-bottom: 16px;
            font-family: inherit;
        }
        .modal-buttons {
            display: flex;
            gap: 12px;
            justify-content: flex-end;
            margin-top: 20px;
        }

        @media (max-width: 700px) {
            body { padding: 12px; }
            .documents-section { padding: 18px; }
            .documents-grid { grid-template-columns: 1fr; }
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
            margin-top: 24px;
        }
    </style>
</head>
<body>
<div class="documents-container">
    <div class="page-header">
        <h1><i class="fas fa-folder-open"></i> My Documents</h1>
        <div class="header-badge"><i class="fas fa-shield-alt"></i> Secure Vault • View & Download</div>
    </div>

    <!-- Stats -->
    <div class="stats-row" id="statsRow"></div>

    <!-- Documents Grid -->
    <div class="documents-section">
        <div class="section-header">
            <div class="section-title"><i class="fas fa-file-alt"></i> Official Documents</div>
            <button class="upload-btn" id="openUploadBtn"><i class="fas fa-plus-circle"></i> Upload New</button>
        </div>
        <div class="documents-grid" id="documentsGrid"></div>
    </div>
    <div class="footer-note">
        <i class="fas fa-eye"></i> Click "Preview" to view document details • <i class="fas fa-download"></i> Download files instantly
    </div>
</div>

<!-- Preview Modal (View Document) -->
<div id="previewModal" class="modal-overlay">
    <div class="modal-container">
        <div class="modal-header">
            <h3><i class="fas fa-file-alt"></i> Document Preview</h3>
            <button class="close-modal" id="closePreviewBtn"><i class="fas fa-times"></i></button>
        </div>
        <div class="modal-body" id="previewBody">
            <!-- dynamic preview content -->
        </div>
    </div>
</div>

<!-- Upload Modal -->
<div id="uploadModal" class="modal-overlay">
    <div class="modal-container upload-modal">
        <div class="modal-header">
            <h3><i class="fas fa-cloud-upload-alt"></i> Upload Document</h3>
            <button class="close-modal" id="closeUploadBtn"><i class="fas fa-times"></i></button>
        </div>
        <div class="modal-body">
            <input type="text" id="docName" placeholder="Document Name (e.g., Aadhar Card)" autocomplete="off">
            <select id="docType">
                <option value="Identity">Identity Proof</option>
                <option value="Address">Address Proof</option>
                <option value="Education">Education Certificate</option>
                <option value="Professional">Professional License</option>
                <option value="Banking">Bank Details</option>
                <option value="Other">Other</option>
            </select>
            <input type="file" id="docFile" accept=".pdf,.jpg,.png,.jpeg,.txt">
            <div class="modal-buttons">
                <button id="cancelUploadBtn" style="background:#eef2f8;">Cancel</button>
                <button id="confirmUploadBtn" style="background:#1f6392; color:white;">Upload</button>
            </div>
        </div>
    </div>
</div>

<script>
    // ------------------------------
    // MOCK DATABASE (simulated localStorage)
    // Each document stores base64 content for preview/download demo
    // For real files, we generate dataURL for images and text, for PDF we simulate.
    // ------------------------------
    let documents = [];
    let nextId = 6;

    // Helper to generate dummy base64 for demonstration (image placeholder + text)
    function generatePreviewContent(fileName, type, docName) {
        // For preview we show rich info and if image we embed dummy, for PDF we give info
        if (fileName && fileName.match(/\.(jpg|jpeg|png)$/i)) {
            // return a placeholder dataURL with a demo image icon
            return "data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'%3E%3Crect width='100' height='100' fill='%23eef3fc'/%3E%3Ctext x='50' y='55' font-size='12' text-anchor='middle' fill='%231f6392'%3E📄 Image%3C/text%3E%3C/svg%3E";
        } else {
            // text preview
            return `📄 Document Content: ${docName}\nType: ${type}\nUploaded via BESIC SEVA.\nThis is a secure preview. Original file can be downloaded.`;
        }
    }

    // Load initial data + localStorage
    function loadInitialDocuments() {
        const stored = localStorage.getItem('besic_docs_full');
        if (stored) {
            documents = JSON.parse(stored);
            if (documents.length) {
                nextId = Math.max(...documents.map(d => d.id), 0) + 1;
                return;
            }
        }
        // Seed rich documents (with preview data)
        documents = [
            {
                id: 1,
                name: "Aadhar Card",
                type: "Identity",
                fileName: "aadhar_amit.pdf",
                uploadedOn: "15 Jan 2024",
                status: "verified",
                size: "245 KB",
                icon: "fas fa-id-card",
                fileData: null, // no base64 stored, will generate preview
                mimeType: "application/pdf"
            },
            {
                id: 2,
                name: "PAN Card",
                type: "Identity",
                fileName: "pan_card.pdf",
                uploadedOn: "20 Feb 2024",
                status: "verified",
                size: "128 KB",
                icon: "fas fa-credit-card",
                fileData: null
            },
            {
                id: 3,
                name: "Electrician License",
                type: "Professional",
                fileName: "license_electrical.pdf",
                uploadedOn: "10 Mar 2024",
                status: "verified",
                size: "1.2 MB",
                icon: "fas fa-certificate",
                fileData: null
            },
            {
                id: 4,
                name: "Bank Account Proof",
                type: "Banking",
                fileName: "bank_statement.pdf",
                uploadedOn: "05 Apr 2024",
                status: "pending",
                size: "890 KB",
                icon: "fas fa-university",
                fileData: null
            },
            {
                id: 5,
                name: "Profile Photo",
                type: "Identity",
                fileName: "profile.jpg",
                uploadedOn: "18 May 2024",
                status: "verified",
                size: "2.1 MB",
                icon: "fas fa-image",
                fileData: "data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 200 200'%3E%3Ccircle cx='100' cy='100' r='90' fill='%23d9e8f5'/%3E%3Ctext x='100' y='110' font-size='20' text-anchor='middle' fill='%231f6392'%3E📸 Photo%3C/text%3E%3C/svg%3E",
                mimeType: "image/jpeg"
            }
        ];
        nextId = 6;
        saveToLocal();
    }

    function saveToLocal() {
        localStorage.setItem('besic_docs_full', JSON.stringify(documents));
    }

    // Stats render
    function renderStats() {
        const total = documents.length;
        const verified = documents.filter(d => d.status === 'verified').length;
        const pending = documents.filter(d => d.status === 'pending').length;
        document.getElementById('statsRow').innerHTML = `
            <div class="stat-card"><div class="stat-icon"><i class="fas fa-folder-open"></i></div><div class="stat-info"><h3>${total}</h3><p>Total Docs</p></div></div>
            <div class="stat-card"><div class="stat-icon"><i class="fas fa-check-circle"></i></div><div class="stat-info"><h3>${verified}</h3><p>Verified</p></div></div>
            <div class="stat-card"><div class="stat-icon"><i class="fas fa-clock"></i></div><div class="stat-info"><h3>${pending}</h3><p>Pending</p></div></div>
            <div class="stat-card"><div class="stat-icon"><i class="fas fa-database"></i></div><div class="stat-info"><h3>${total * 0.8} MB</h3><p>Storage</p></div></div>
        `;
    }

    // Grid Render
    function renderDocumentsGrid() {
        const grid = document.getElementById('documentsGrid');
        if (!documents.length) {
            grid.innerHTML = `<div class="empty-state"><i class="fas fa-cloud-upload-alt" style="font-size:3rem;"></i><p>No documents. Click "Upload New"</p></div>`;
            return;
        }
        let html = '';
        documents.forEach(doc => {
            const statusClass = doc.status === 'verified' ? 'status-verified' : 'status-pending';
            const statusText = doc.status === 'verified' ? '✓ Verified' : '⏳ Pending Review';
            html += `
                <div class="doc-card" data-id="${doc.id}">
                    <div class="doc-card-header">
                        <div class="doc-icon"><i class="${doc.icon}"></i></div>
                        <div class="doc-status ${statusClass}">${statusText}</div>
                    </div>
                    <div class="doc-title">${escapeHtml(doc.name)}</div>
                    <div class="doc-meta">
                        <span><i class="fas fa-tag"></i> ${doc.type}</span>
                        <span><i class="far fa-calendar"></i> ${doc.uploadedOn}</span>
                        <span><i class="fas fa-database"></i> ${doc.size}</span>
                    </div>
                    <div class="card-actions">
                        <span class="action-btn preview-doc" data-id="${doc.id}"><i class="fas fa-eye"></i> Preview</span>
                        <span class="action-btn download-doc" data-id="${doc.id}"><i class="fas fa-download"></i> Download</span>
                        <span class="action-btn delete-doc" data-id="${doc.id}"><i class="fas fa-trash-alt"></i> Delete</span>
                    </div>
                </div>
            `;
        });
        grid.innerHTML = html;

        // Attach event listeners
        document.querySelectorAll('.preview-doc').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.stopPropagation();
                const id = parseInt(btn.getAttribute('data-id'));
                const doc = documents.find(d => d.id === id);
                if (doc) openPreviewModal(doc);
            });
        });
        document.querySelectorAll('.download-doc').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.stopPropagation();
                const id = parseInt(btn.getAttribute('data-id'));
                const doc = documents.find(d => d.id === id);
                if (doc) downloadDocument(doc);
            });
        });
        document.querySelectorAll('.delete-doc').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.stopPropagation();
                const id = parseInt(btn.getAttribute('data-id'));
                if (confirm("Delete this document?")) {
                    documents = documents.filter(d => d.id !== id);
                    saveToLocal();
                    renderStats();
                    renderDocumentsGrid();
                }
            });
        });
    }

    // PREVIEW MODAL (show document details + content preview)
    function openPreviewModal(doc) {
        const modal = document.getElementById('previewModal');
        const previewBody = document.getElementById('previewBody');
        // generate preview content based on file type or metadata
        let previewHtml = `
            <div class="doc-preview-card">
                <div class="preview-icon"><i class="${doc.icon} fa-4x"></i></div>
                <h3>${escapeHtml(doc.name)}</h3>
                <p><strong>Type:</strong> ${doc.type} &nbsp;|&nbsp; <strong>Size:</strong> ${doc.size} &nbsp;|&nbsp; <strong>Status:</strong> ${doc.status}</p>
                <p><strong>Uploaded:</strong> ${doc.uploadedOn}</p>
                <hr style="margin: 16px 0; border-color:#eef2f8;">
                <div style="background:#f8fafd; border-radius: 20px; padding: 20px; margin: 16px 0;">
        `;
        // Show inline preview for images, else show text content
        if (doc.fileName && doc.fileName.match(/\.(jpg|jpeg|png)$/i)) {
            let imgSrc = doc.fileData || "data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 200 200'%3E%3Crect width='200' height='200' fill='%23eef3fc'/%3E%3Ctext x='100' y='110' font-size='16' text-anchor='middle' fill='%231f6392'%3EImage Preview%3C/text%3E%3C/svg%3E";
            previewHtml += `<img src="${imgSrc}" style="max-width:100%; border-radius: 20px; margin-bottom: 12px;" alt="Preview">`;
            previewHtml += `<p><i class="fas fa-image"></i> Image document ready for download.</p>`;
        } else {
            // Text / PDF preview: show document info + dummy content
            previewHtml += `
                <div style="font-family: monospace; white-space: pre-wrap; background:#fff; padding:16px; border-radius:16px;">
                    📄 <strong>Document Preview</strong><br>
                    File: ${doc.fileName}<br>
                    Content: "${doc.name}" official document registered with BESIC SEVA.<br>
                    <span style="color:#1f6392;">✓ Verified credentials attached.</span><br>
                    (Full document available for download)
                </div>
            `;
        }
        previewHtml += `
                </div>
                <button class="download-from-modal" data-id="${doc.id}"><i class="fas fa-download"></i> Download Document</button>
            </div>
        `;
        previewBody.innerHTML = previewHtml;
        modal.classList.add('active');

        // Attach download inside modal
        const modalDownloadBtn = previewBody.querySelector('.download-from-modal');
        if (modalDownloadBtn) {
            modalDownloadBtn.addEventListener('click', () => {
                downloadDocument(doc);
            });
        }
    }

    // DOWNLOAD FUNCTION (generates a blob from document data or creates dummy file)
    function downloadDocument(doc) {
        let content, fileName = doc.fileName || `${doc.name}.pdf`;
        let mimeType = "application/octet-stream";
        
        // If we have stored fileData (base64) then use it (for images)
        if (doc.fileData && doc.fileData.startsWith('data:')) {
            const arr = doc.fileData.split(',');
            const mime = arr[0].match(/:(.*?);/)[1];
            const bstr = atob(arr[1]);
            let n = bstr.length;
            const u8arr = new Uint8Array(n);
            while (n--) { u8arr[n] = bstr.charCodeAt(n); }
            const blob = new Blob([u8arr], { type: mime });
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = fileName;
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            URL.revokeObjectURL(url);
            alert(`✅ Downloaded: ${doc.name}`);
            return;
        }
        
        // For PDFs and other documents: create a text-based blob with document info
        if (doc.fileName && doc.fileName.endsWith('.pdf')) {
            content = `%PDF-1.4\nThis is a demo PDF content for ${doc.name}.\nBESIC SEVA Document: ${doc.name}\nType: ${doc.type}\nUploaded: ${doc.uploadedOn}\nStatus: ${doc.status}`;
            mimeType = "application/pdf";
        } else {
            content = `Document Name: ${doc.name}\nType: ${doc.type}\nUpload Date: ${doc.uploadedOn}\nStatus: ${doc.status.toUpperCase()}\n\nThis is a secure document from BESIC SEVA platform.`;
            mimeType = "text/plain";
            if (!fileName.endsWith('.txt')) fileName += '.txt';
        }
        
        const blob = new Blob([content], { type: mimeType });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = fileName;
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);
        alert(`📥 Download started: ${doc.name}`);
    }

    // Upload new document with file reading for preview/download
    function uploadNewDocument() {
        const name = document.getElementById('docName').value.trim();
        const type = document.getElementById('docType').value;
        const fileInput = document.getElementById('docFile');
        if (!name) { alert("Enter document name"); return; }
        if (!fileInput.files || !fileInput.files[0]) { alert("Please select a file"); return; }
        
        const file = fileInput.files[0];
        const reader = new FileReader();
        reader.onload = function(e) {
            const fileDataUrl = e.target.result; // base64
            const fileSizeKB = (file.size / 1024).toFixed(0);
            const sizeStr = fileSizeKB > 1024 ? (fileSizeKB/1024).toFixed(1)+" MB" : fileSizeKB+" KB";
            const now = new Date();
            const formattedDate = `${now.getDate()} ${now.toLocaleString('default', { month: 'short' })} ${now.getFullYear()}`;
            let icon = "fas fa-file-alt";
            if (file.type.startsWith('image/')) icon = "fas fa-image";
            else if (file.name.endsWith('.pdf')) icon = "fas fa-file-pdf";
            else icon = "fas fa-file";
            
            const newDoc = {
                id: nextId++,
                name: name,
                type: type,
                fileName: file.name,
                uploadedOn: formattedDate,
                status: "pending",
                size: sizeStr,
                icon: icon,
                fileData: fileDataUrl,
                mimeType: file.type
            };
            documents.push(newDoc);
            saveToLocal();
            renderStats();
            renderDocumentsGrid();
            closeUploadModal();
            alert(`✅ "${name}" uploaded successfully!`);
        };
        reader.readAsDataURL(file);
    }

    // Modal Control
    const uploadModal = document.getElementById('uploadModal');
    const previewModal = document.getElementById('previewModal');
    
    function openUploadModal() { uploadModal.classList.add('active'); }
    function closeUploadModal() { uploadModal.classList.remove('active'); document.getElementById('docName').value = ''; document.getElementById('docFile').value = ''; }
    function closePreviewModal() { previewModal.classList.remove('active'); }

    function bindEvents() {
        document.getElementById('openUploadBtn').addEventListener('click', openUploadModal);
        document.getElementById('closeUploadBtn').addEventListener('click', closeUploadModal);
        document.getElementById('cancelUploadBtn').addEventListener('click', closeUploadModal);
        document.getElementById('confirmUploadBtn').addEventListener('click', uploadNewDocument);
        document.getElementById('closePreviewBtn').addEventListener('click', closePreviewModal);
        previewModal.addEventListener('click', (e) => { if (e.target === previewModal) closePreviewModal(); });
        uploadModal.addEventListener('click', (e) => { if (e.target === uploadModal) closeUploadModal(); });
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

    function init() {
        loadInitialDocuments();
        bindEvents();
        renderStats();
        renderDocumentsGrid();
    }
    init();
</script>
</body>
</html>