

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Besic Seva – Employee Onboarding</title>
<link href="https://fonts.googleapis.com/css2?family=Sora:wght@300;400;500;600;700;800&family=Noto+Sans:wght@400;500&display=swap" rel="stylesheet">
<style>
:root {
  --g1: #0f4c2a;
  --g2: #1d7a47;
  --g3: #2eaa63;
  --g4: #e6f5ed;
  --amber: #f59e0b;
  --red: #ef4444;
  --blue: #3b82f6;
  --ink: #0d1b12;
  --ink2: #2d3f35;
  --ink3: #607060;
  --ink4: #a0b0a8;
  --border: #d4e4da;
  --bg: #f0f7f3;
  --card: #ffffff;
  --radius: 16px;
  --radius-sm: 10px;
  --shadow: 0 4px 24px rgba(15,76,42,0.10);
  --shadow-lg: 0 8px 40px rgba(15,76,42,0.16);
}
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0;}
body{
  font-family:'Sora','Noto Sans',sans-serif;
  background:var(--bg);
  color:var(--ink);
  min-height:100vh;
  padding:0;
}

/* BG PATTERN */
body::before{
  content:'';position:fixed;inset:0;z-index:0;
  background:
    radial-gradient(ellipse 60% 40% at 10% 20%, rgba(46,170,99,0.12) 0%, transparent 70%),
    radial-gradient(ellipse 50% 50% at 90% 80%, rgba(29,122,71,0.10) 0%, transparent 70%);
  pointer-events:none;
}

/* TOP NAV */
.topnav{
  position:sticky;top:0;z-index:100;
  background:rgba(255,255,255,0.92);backdrop-filter:blur(16px);
  border-bottom:1px solid var(--border);
  padding:0 24px;height:60px;
  display:flex;align-items:center;gap:14px;
  box-shadow:0 1px 10px rgba(15,76,42,0.07);
}
.logo-mark{
  width:36px;height:36px;border-radius:10px;
  background:linear-gradient(135deg,var(--g1),var(--g3));
  display:flex;align-items:center;justify-content:center;
  color:#fff;font-weight:800;font-size:13px;letter-spacing:-0.5px;
}
.logo-name{font-size:17px;font-weight:800;color:var(--g1);letter-spacing:-0.4px;}
.nav-spacer{flex:1;}
.nav-badge{
  font-size:12px;font-weight:600;color:var(--g2);
  background:var(--g4);padding:5px 14px;border-radius:20px;
  border:1px solid var(--border);
}

/* CONTAINER */
.container{
  position:relative;z-index:1;
  max-width:900px;margin:0 auto;
  padding:32px 20px 60px;
}

/* PAGE HEADER */
.page-head{text-align:center;margin-bottom:36px;}
.page-head h1{
  font-size:clamp(22px,4vw,34px);font-weight:800;
  color:var(--g1);letter-spacing:-0.8px;line-height:1.2;
}
.page-head p{
  font-size:15px;color:var(--ink3);margin-top:8px;font-weight:400;
}

/* STEPPER */
.stepper{
  display:flex;align-items:center;justify-content:center;
  gap:0;margin-bottom:36px;
  flex-wrap:nowrap;overflow-x:auto;padding:4px 0;
}
.step{
  display:flex;flex-direction:column;align-items:center;
  position:relative;flex:1;min-width:70px;max-width:160px;
  cursor:pointer;
}
.step-line{
  position:absolute;top:18px;left:calc(50% + 22px);
  right:calc(-50% + 22px);height:2px;
  background:var(--border);z-index:0;
  transition:background 0.4s;
}
.step:last-child .step-line{display:none;}
.step-dot{
  width:36px;height:36px;border-radius:50%;
  border:2.5px solid var(--border);background:#fff;
  display:flex;align-items:center;justify-content:center;
  font-size:14px;font-weight:700;color:var(--ink4);
  position:relative;z-index:1;
  transition:all 0.3s;
}
.step.active .step-dot{
  background:var(--g2);border-color:var(--g2);
  color:#fff;box-shadow:0 0 0 5px rgba(46,170,99,0.2);
}
.step.done .step-dot{
  background:var(--g3);border-color:var(--g3);color:#fff;
}
.step.done .step-line,.step.active .step-line{background:var(--g3);}
.step-label{
  font-size:11px;font-weight:600;color:var(--ink4);
  margin-top:7px;text-align:center;line-height:1.3;
  transition:color 0.3s;
}
.step.active .step-label,.step.done .step-label{color:var(--g1);}

/* FORM CARD */
.form-card{
  background:var(--card);border-radius:var(--radius);
  box-shadow:var(--shadow-lg);border:1px solid var(--border);
  overflow:hidden;
  animation:slideUp 0.4s ease both;
}
@keyframes slideUp{from{opacity:0;transform:translateY(18px);}to{opacity:1;transform:translateY(0);}}

.form-card-header{
  background:linear-gradient(135deg,var(--g1) 0%,var(--g2) 100%);
  padding:22px 28px;color:#fff;
  display:flex;align-items:center;gap:14px;
}
.form-card-icon{
  width:48px;height:48px;border-radius:12px;
  background:rgba(255,255,255,0.15);
  display:flex;align-items:center;justify-content:center;
  font-size:22px;flex-shrink:0;
}
.form-card-title{font-size:19px;font-weight:800;letter-spacing:-0.3px;}
.form-card-sub{font-size:13px;opacity:0.75;margin-top:2px;}

.form-body{padding:28px 28px 20px;}

/* SECTION */
.form-section{margin-bottom:28px;}
.section-title{
  font-size:13px;font-weight:700;letter-spacing:0.8px;
  text-transform:uppercase;color:var(--g2);
  margin-bottom:16px;
  display:flex;align-items:center;gap:8px;
}
.section-title::after{
  content:'';flex:1;height:1px;background:var(--border);
}

/* GRID */
.fg{display:grid;gap:16px;}
.fg-2{grid-template-columns:1fr 1fr;}
.fg-3{grid-template-columns:1fr 1fr 1fr;}
.fg-1{grid-template-columns:1fr;}

/* FIELD */
.field{display:flex;flex-direction:column;gap:6px;}
.field label{
  font-size:13px;font-weight:600;color:var(--ink2);
  display:flex;align-items:center;gap:5px;
}
.req{color:var(--red);font-size:12px;}
.field input,.field select,.field textarea{
  width:100%;padding:11px 14px;
  border:1.5px solid var(--border);border-radius:var(--radius-sm);
  font-family:inherit;font-size:14px;color:var(--ink);
  background:#fff;outline:none;
  transition:border-color 0.2s,box-shadow 0.2s;
  -webkit-appearance:none;appearance:none;
}
.field select{
  background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='8' viewBox='0 0 12 8'%3E%3Cpath d='M1 1l5 5 5-5' stroke='%23607060' stroke-width='1.5' fill='none' stroke-linecap='round'/%3E%3C/svg%3E");
  background-repeat:no-repeat;background-position:right 14px center;
  padding-right:36px;cursor:pointer;
}
.field textarea{resize:vertical;min-height:90px;}
.field input:focus,.field select:focus,.field textarea:focus{
  border-color:var(--g2);box-shadow:0 0 0 3px rgba(46,170,99,0.15);
}
.field input.error,.field select.error,.field textarea.error{
  border-color:var(--red);box-shadow:0 0 0 3px rgba(239,68,68,0.10);
}
.field-hint{font-size:11px;color:var(--ink4);margin-top:2px;}
.field-error{font-size:11px;color:var(--red);margin-top:2px;display:none;}
.field-error.show{display:block;}

/* PHONE INPUT */
.phone-wrap{display:flex;gap:8px;}
.phone-code{
  width:90px;flex-shrink:0;
  padding:11px 10px;border:1.5px solid var(--border);
  border-radius:var(--radius-sm);font-family:inherit;
  font-size:14px;color:var(--ink);background:#fff;
  outline:none;transition:border-color 0.2s;
}
.phone-code:focus{border-color:var(--g2);box-shadow:0 0 0 3px rgba(46,170,99,0.15);}
.phone-num{flex:1;}

/* UPLOAD BOX */
.upload-box{
  border:2px dashed var(--border);border-radius:var(--radius-sm);
  padding:20px;text-align:center;cursor:pointer;
  transition:all 0.2s;background:#fafcfb;
  position:relative;
}
.upload-box:hover,.upload-box.dragover{
  border-color:var(--g2);background:var(--g4);
}
.upload-box input[type=file]{
  position:absolute;inset:0;opacity:0;cursor:pointer;width:100%;height:100%;
}
.upload-icon{font-size:28px;margin-bottom:8px;}
.upload-label{font-size:13px;font-weight:600;color:var(--g2);}
.upload-sub{font-size:11px;color:var(--ink4);margin-top:3px;}
.upload-preview{
  display:none;align-items:center;gap:10px;
  padding:10px 14px;background:var(--g4);
  border-radius:var(--radius-sm);border:1.5px solid var(--g3);
  margin-top:8px;
}
.upload-preview.show{display:flex;}
.preview-icon{font-size:22px;}
.preview-name{font-size:13px;font-weight:600;color:var(--g1);flex:1;min-width:0;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;}
.preview-remove{
  background:none;border:none;cursor:pointer;
  color:var(--red);font-size:18px;padding:2px;
  border-radius:4px;transition:background 0.15s;
}
.preview-remove:hover{background:#fee2e2;}

/* UPLOAD GRID */
.upload-grid{display:grid;grid-template-columns:1fr 1fr;gap:14px;}

/* CHECKBOX / RADIO */
.check-group{display:flex;flex-wrap:wrap;gap:10px;}
.check-item{
  display:flex;align-items:center;gap:8px;
  padding:9px 14px;border-radius:var(--radius-sm);
  border:1.5px solid var(--border);cursor:pointer;
  font-size:13px;font-weight:500;color:var(--ink2);
  transition:all 0.2s;background:#fff;
  user-select:none;
}
.check-item:hover{border-color:var(--g2);background:var(--g4);}
.check-item input{display:none;}
.check-item.selected{border-color:var(--g2);background:var(--g4);color:var(--g1);font-weight:600;}
.check-dot{
  width:16px;height:16px;border-radius:50%;
  border:2px solid var(--border);background:#fff;
  display:flex;align-items:center;justify-content:center;
  flex-shrink:0;transition:all 0.2s;
}
.check-item.selected .check-dot{
  background:var(--g2);border-color:var(--g2);
}
.check-item.selected .check-dot::after{
  content:'';width:6px;height:6px;background:#fff;border-radius:50%;
}

/* SKILL TAGS */
.skill-input-wrap{display:flex;gap:8px;margin-bottom:10px;}
.skill-input-wrap input{flex:1;}
.add-skill-btn{
  padding:11px 16px;border:none;border-radius:var(--radius-sm);
  background:var(--g2);color:#fff;font-size:14px;font-weight:700;
  cursor:pointer;transition:opacity 0.2s;white-space:nowrap;
}
.add-skill-btn:hover{opacity:0.85;}
.skill-tags{display:flex;flex-wrap:wrap;gap:8px;}
.skill-tag{
  display:flex;align-items:center;gap:6px;
  padding:5px 12px;border-radius:20px;
  background:var(--g4);border:1.5px solid var(--g3);
  font-size:12px;font-weight:600;color:var(--g1);
}
.skill-tag button{
  background:none;border:none;cursor:pointer;
  color:var(--ink3);font-size:14px;line-height:1;
  padding:0;
}
.skill-tag button:hover{color:var(--red);}

/* AADHAR STYLED */
.aadhar-wrap{display:flex;gap:8px;align-items:center;}
.aadhar-part{
  flex:1;padding:11px 10px;text-align:center;
  border:1.5px solid var(--border);border-radius:var(--radius-sm);
  font-family:inherit;font-size:16px;font-weight:600;
  letter-spacing:3px;color:var(--ink);background:#fff;
  outline:none;transition:border-color 0.2s;
}
.aadhar-part:focus{border-color:var(--g2);box-shadow:0 0 0 3px rgba(46,170,99,0.15);}
.aadhar-sep{font-size:20px;color:var(--ink4);font-weight:300;}

/* PHOTO UPLOAD */
.photo-upload{
  display:flex;align-items:center;gap:20px;flex-wrap:wrap;
}
.photo-circle{
  width:88px;height:88px;border-radius:50%;
  border:3px dashed var(--border);background:var(--g4);
  display:flex;flex-direction:column;align-items:center;justify-content:center;
  cursor:pointer;position:relative;overflow:hidden;
  transition:border-color 0.2s;flex-shrink:0;
}
.photo-circle:hover{border-color:var(--g2);}
.photo-circle input[type=file]{position:absolute;inset:0;opacity:0;cursor:pointer;}
.photo-circle img{
  width:100%;height:100%;object-fit:cover;
  display:none;border-radius:50%;
}
.photo-circle-icon{font-size:26px;}
.photo-circle-label{font-size:10px;color:var(--ink4);margin-top:3px;}
.photo-info{font-size:13px;color:var(--ink3);line-height:1.7;}

/* NAVIGATION BUTTONS */
.form-nav{
  display:flex;justify-content:space-between;align-items:center;
  padding:20px 28px 24px;
  border-top:1px solid var(--border);
  background:#fafcfb;
  gap:12px;
}
.btn-back{
  display:flex;align-items:center;gap:7px;
  padding:11px 22px;border-radius:var(--radius-sm);
  border:1.5px solid var(--border);background:#fff;
  font-family:inherit;font-size:14px;font-weight:600;
  color:var(--ink2);cursor:pointer;transition:all 0.2s;
}
.btn-back:hover{border-color:var(--g2);color:var(--g1);}
.btn-back:disabled{opacity:0.4;cursor:not-allowed;}
.btn-next{
  display:flex;align-items:center;gap:7px;
  padding:12px 28px;border-radius:var(--radius-sm);
  border:none;
  background:linear-gradient(135deg,var(--g1),var(--g3));
  font-family:inherit;font-size:14px;font-weight:700;
  color:#fff;cursor:pointer;
  box-shadow:0 4px 16px rgba(15,76,42,0.25);
  transition:all 0.2s;
}
.btn-next:hover{opacity:0.9;transform:translateY(-1px);}
.step-counter{
  font-size:12px;font-weight:600;color:var(--ink4);
}

/* SUCCESS */
.success-screen{
  display:none;text-align:center;padding:48px 28px 40px;
  animation:slideUp 0.5s ease both;
}
.success-screen.show{display:block;}
.success-icon{
  width:80px;height:80px;border-radius:50%;
  background:linear-gradient(135deg,var(--g2),var(--g3));
  display:flex;align-items:center;justify-content:center;
  font-size:36px;margin:0 auto 20px;
  box-shadow:0 8px 32px rgba(46,170,99,0.35);
  animation:popIn 0.5s 0.2s ease both;
}
@keyframes popIn{from{transform:scale(0.5);opacity:0;}to{transform:scale(1);opacity:1;}}
.success-title{font-size:26px;font-weight:800;color:var(--g1);letter-spacing:-0.5px;}
.success-sub{font-size:15px;color:var(--ink3);margin-top:10px;line-height:1.6;}
.success-id{
  display:inline-block;margin:20px 0;
  padding:12px 28px;border-radius:40px;
  background:var(--g4);border:1.5px solid var(--g3);
  font-size:15px;font-weight:700;color:var(--g1);
  letter-spacing:1px;
}
.restart-btn{
  padding:12px 32px;border-radius:var(--radius-sm);
  border:none;background:linear-gradient(135deg,var(--g1),var(--g3));
  color:#fff;font-family:inherit;font-size:15px;font-weight:700;
  cursor:pointer;box-shadow:0 4px 16px rgba(15,76,42,0.25);
  transition:opacity 0.2s;margin-top:8px;
}
.restart-btn:hover{opacity:0.9;}

/* RESPONSIVE */
@media(max-width:640px){
  .fg-2,.fg-3{grid-template-columns:1fr;}
  .upload-grid{grid-template-columns:1fr;}
  .form-body{padding:20px 16px 14px;}
  .form-card-header{padding:18px 16px;}
  .form-nav{padding:16px 16px 20px;}
  .aadhar-wrap{flex-wrap:wrap;}
  .aadhar-sep{display:none;}
  .stepper{gap:0;}
  .step-label{font-size:9px;}
  .step-dot{width:30px;height:30px;font-size:12px;}
  .step-line{top:15px;}
}
@media(max-width:400px){
  .step-label{display:none;}
  .form-nav{flex-wrap:wrap;}
  .btn-next{width:100%;justify-content:center;}
  .btn-back{flex:1;justify-content:center;}
}
</style>
</head>
<body>

<!-- TOP NAV -->
<div class="container">
  <div class="page-head">
    <h1>Employee Registration Form</h1>
    <p>Please fill in all details carefully. All fields marked <span style="color:var(--red)">*</span> are required.</p>
  </div>

  <!-- STEPPER -->
  <div class="stepper" id="stepper">
    <div class="step active" data-step="1">
      <div class="step-dot">1</div>
      <div class="step-line"></div>
      <div class="step-label">Personal<br>Info</div>
    </div>
    <div class="step" data-step="2">
      <div class="step-dot">2</div>
      <div class="step-line"></div>
      <div class="step-label">Contact &amp;<br>Address</div>
    </div>
    <div class="step" data-step="3">
      <div class="step-dot">3</div>
      <div class="step-line"></div>
      <div class="step-label">Work &amp;<br>Skills</div>
    </div>
    <div class="step" data-step="4">
      <div class="step-dot">4</div>
      <div class="step-line"></div>
      <div class="step-label">Documents<br>Upload</div>
    </div>
    <div class="step" data-step="5">
      <div class="step-dot">5</div>
      <div class="step-line"></div>
      <div class="step-label">Bank &amp;<br>Legal</div>
    </div>
    <div class="step" data-step="6">
      <div class="step-dot">✓</div>
      <div class="step-label">Review &amp;<br>Submit</div>
    </div>
  </div>

  
<form action="employeeTab/form.php" method="post" enctype="multipart/form-data">
  <!-- FORM CARD -->
  <div class="form-card">

    <!-- ══════════════════════════════ STEP 1: PERSONAL INFO ══════════════════════════════ -->
    <div id="step1">
      <div class="form-card-header">
        <div class="form-card-icon">👤</div>
        <div>
          <div class="form-card-title">Personal Information</div>
          <div class="form-card-sub">Basic details about the employee</div>
        </div>
      </div>
      <div class="form-body">

        <!-- Photo Upload -->
        <div class="form-section">
          <div class="section-title">Profile Photo</div>
          <div class="photo-upload">
            <div class="photo-circle" id="photoCircle" title="Click to upload photo">
              <input type="file"  name="profile_photo" accept="image/*" id="photoInput" onchange="previewPhoto(this)">
              <img id="photoPreviewImg" alt="Profile">
              <div class="photo-circle-icon" id="photoIcon">📷</div>
              <div class="photo-circle-label" id="photoLbl">Upload</div>
            </div>
            <div class="photo-info">
              Upload a clear, professional photo<br>
              JPG or PNG · Max 2MB<br>
              <span style="font-size:12px;color:var(--ink4);">Recommended: 300×300px or larger</span>
            </div>
          </div>
        </div>

        <!-- Full Name -->
        <div class="form-section">
          <div class="section-title">Full Name</div>
          <div class="fg fg-3">
            <div class="field">
              <label> Name <span class="req">*</span></label>
              <input type="text" id="firstName" name="name" placeholder="Enter full name" required>
              <div class="field-error" id="err-firstName">Please enter first name</div>
            </div>
           
          </div>
        </div>

        <!-- Demographics -->
        <div class="form-section">
          <div class="section-title">Personal Details</div>
          <div class="fg fg-2">
            <div class="field">
              <label>Date of Birth <span class="req">*</span></label>
              <input type="date" id="dob" required name="dob">
              <div class="field-error" id="err-dob">Please enter date of birth</div>
            </div>
            <div class="field">
              <label>Gender <span class="req">*</span></label>
              <select id="gender" required name="gender">
                <option value="">Select Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
                <option value="prefer_not_to_say">Prefer not to say</option>
              </select>
              <div class="field-error" id="err-gender">Please select gender</div>
            </div>
            <div class="field">
              <label>Marital Status</label>
              <select name="marital_status">
                <option value="">Select</option>
                <option value="single">Single</option>
                <option value="married">Married</option>
                <option value="divorced">Divorced</option>
                <option value="widowed">Widowed</option>
              </select>
            </div>
            
            <div class="field">
              <label>Nationality</label>
              <input type="text" value="Indian" placeholder="Indian" name="nationality">
            </div>  
          </div>
        </div>

        <!-- Emergency Contact -->

      </div>
      <div class="form-nav">
        <button type="button" class="btn-back" disabled>← Back</button>
        <span class="step-counter">Step 1 of 5</span>
        <button  type="button" class="btn-next" onclick="goNext(1)">Next →</button>
      </div>
    </div>

    <!-- ══════════════════════════════ STEP 2: CONTACT & ADDRESS ══════════════════════════════ -->
    <div id="step2" style="display:none;">
      <div class="form-card-header">
        <div class="form-card-icon">📍</div>
        <div>
          <div class="form-card-title">Contact &amp; Address</div>
          <div class="form-card-sub">How we can reach you</div>
        </div>
      </div>
      <div class="form-body">

        <!-- Contact -->
        <div class="form-section">
          <div class="section-title">Contact Information</div>
          <div class="fg fg-2">
            <div class="field">
              <label>Mobile Number <span class="req">*</span></label>
              <div class="phone-wrap">
                <input class="phone-code" type="tel" name="mobile" placeholder="98XXXXXXXX" maxlength="15" id="mobile">
              </div>
              <div class="field-error" id="err-mobile">Please enter valid 10-digit mobile number</div>
            </div>
            <div class="field">
              <label>Alternate Mobile</label>
              <div class="phone-wrap">
                <input class="phone-code" type="tel" name="alternate_mobile"  maxlength="15">
              </div>
            </div>
            <div class="field">
              <label>Email Address <span class="req">*</span></label>
              <input type="email" id="email" name="email" placeholder="name@example.com">
              <div class="field-error" id="err-email">Please enter valid email</div>
            </div>
            <div class="field">
              <label>WhatsApp Number</label>
              <div class="phone-wrap">
                <input class="phone-code" type="tel" name="whatsapp" placeholder="Same as mobile" >
              </div>
            </div>
          </div>
        </div>

        <!-- Current Address -->
        <div class="form-section">
          <div class="section-title">Current Address</div>
          <div class="fg fg-1">
            <div class="field">
              <label>Address Line 1 <span class="req">*</span></label>
              <input type="text" id="addr1" name="addr1" placeholder="House/Flat No., Street Name">
              <div class="field-error" id="err-addr1">Required</div>
            </div>
            <div class="field">
              <label>Address Line 2</label>
              <input type="text" name="addr2" placeholder="Area / Locality (optional)">
            </div>
          </div>
          <div class="fg fg-3" style="margin-top:16px;">
            <div class="field">
              <label>City <span class="req">*</span></label>
              <input type="text" id="city" name="city" placeholder="Lucknow">
              <div class="field-error" id="err-city">Required</div>
            </div>
            <div class="field">
              <label>State <span class="req">*</span></label>
              <select id="state" name="state">
                <option value="">Select State</option>
                <option value="Uttar Pradesh">Uttar Pradesh</option><option value="Delhi">Delhi</option>
                <option value="Maharashtra">Maharashtra</option><option value="Bihar">Bihar</option>
                <option value="Rajasthan">Rajasthan</option><option value="Madhya Pradesh">Madhya Pradesh</option>
                <option value="Gujarat">Gujarat</option><option value="West Bengal">West Bengal</option>
                <option value="Tamil Nadu">Tamil Nadu</option><option value="Karnataka">Karnataka</option>
                <option value="Other">Other</option>
              </select>
              <div class="field-error" id="err-state">Required</div>
            </div>
            <div class="field">
              <label>PIN Code <span class="req">*</span></label>
              <input type="text" id="pin" name="pin_no" placeholder="226001" maxlength="6">
              <div class="field-error" id="err-pin">Enter valid 6-digit PIN</div>
            </div>
          </div>
        </div>

      
      </div>
      <div class="form-nav">
        <button type="button" class="btn-back" onclick="goPrev(2)">← Back</button>
        <span class="step-counter">Step 2 of 5</span>
        <button type="button" class="btn-next" onclick="goNext(2)">Next →</button>
      </div>
    </div>

    <!-- ══════════════════════════════ STEP 3: WORK & SKILLS ══════════════════════════════ -->
    <div id="step3" style="display:none;">
      <div class="form-card-header">
        <div class="form-card-icon">🛠️</div>
        <div>
          <div class="form-card-title">Work &amp; Skills</div>
          <div class="form-card-sub">Professional background and service expertise</div>
        </div>
      </div>
      <div class="form-body">

        <!-- Job Role -->
        <div class="form-section">
          <div class="section-title">Job Details</div>
          <div class="fg fg-2">
            <div class="field">
              <label>Job Role / Designation <span class="req">*</span></label>
              <select id="jobRole" name="jobRole">
                <option value="">Select Role</option>
                <option value="Electrician">Electrician</option><option value="Plumber">Plumber</option>
                <option value="AC Technician">AC Technician</option><option value="Carpenter">Carpenter</option>
                <option value="Painter">Painter</option><option value="Welder">Welder</option>
                <option value="Mason">Mason</option><option value="Cleaner">Cleaner</option>
                <option value="Driver">Driver</option><option value="Security Guard">Security Guard</option>
                <option value="Cook / Chef">Cook / Chef</option><option value="Babysitter">Babysitter</option>
                <option value="Other">Other</option>
              </select>
              <div class="field-error" id="err-jobRole">Required</div>
            </div>
            <div class="field">
              <label>Department</label>
              <select name="department">
                <option value="Home Services">Home Services</option><option value="Technical">Technical</option>
                <option value="Maintenance">Maintenance</option><option value="Support Staff">Support Staff</option>
              </select>
            </div>
            <div class="field">
              <label>Employment Type <span class="req">*</span></label>
              <select id="empType" name="empType">
                <option value="">Select</option>
                <option value="Full Time">Full Time</option><option value="Part Time">Part Time</option>
                <option value="Contract">Contract</option><option value="Freelancer">Freelancer</option>
              </select>
              <div class="field-error" id="err-empType">Required</div>
            </div>
            <div class="field">
              <label>Joining Date</label>
              <input type="date" id="joinDate" name="joinDate">
            </div>
            <div class="field">
              <label>Expected Salary (₹/month)</label>
              <input type="number" placeholder="e.g. 15000" min="0" name="expectedSalary">
            </div>
            <div class="field">
              <label>Work Location</label>
              <input type="text" placeholder="City or Area" name="workLocation">
            </div>
          </div>
        </div>

        <!-- Education -->
        <div class="form-section">
          <div class="section-title">Education</div>
          <div class="fg fg-3">
            <div class="field">
              <label>Highest Qualification</label>
              <select name="highestQualification">
                <option value="">Select</option>
                <option value="10th Pass">10th Pass</option><option value="12th Pass">12th Pass</option>
                <option value="ITI">ITI</option><option value="Diploma">Diploma</option>
                <option value="Graduate">Graduate</option><option value="Post Graduate">Post Graduate</option>
                <option value="No Formal Education">No Formal Education</option>
              </select>
            </div>
            <div class="field">
              <label>Specialisation / Stream</label>
              <input type="text" placeholder="e.g. Electrical, Commerce" name="specialisation">
            </div>
            <div class="field">
              <label>Year of Passing</label>
              <input type="number" placeholder="2020" min="1980" max="2030" name="yearOfPassing">
            </div>
          </div>
        </div>

        <!-- Experience -->
        <div class="form-section">
          <div class="section-title">Work Experience</div>
          <div class="fg fg-2">
            <div class="field">
              <label>Total Experience</label>
              <select name="totalExperience">
                <option value="">Select</option>
                <option value="Fresher (0 years)">Fresher (0 years)</option>
                <option value="Less than 1 year">Less than 1 year</option>
                <option value="1-2 years">1–2 years</option>
                <option value="2-5 years">2–5 years</option>
                <option value="5-10 years">5–10 years</option>
                <option value="10+ years">10+ years</option>
              </select>
            </div>
            <div class="field">
              <label>Previous Employer</label>
              <input type="text" placeholder="Company / Individual Name" name="previousEmployer">
            </div>
          </div>
          <div class="fg fg-1" style="margin-top:16px;">
            <div class="field">
              <label>Brief Work Description</label>
              <textarea placeholder="Describe your previous work experience, duties performed, etc. (optional)" name="workDescription"></textarea>
            </div>
          </div>
        </div>

        <!-- Skills -->
        <div class="form-section">
          <div class="section-title">Skills &amp; Expertise</div>
          <div class="check-group" id="skillCheckGroup">
            <label class="check-item" onclick="toggleCheck(this)"><input type="checkbox" name="skills[]"><div class="check-dot"></div>AC Repair</label>
            <label class="check-item" onclick="toggleCheck(this)"><input type="checkbox" name="skills[]"><div class="check-dot"></div>Electrical Wiring</label>
            <label class="check-item" onclick="toggleCheck(this)"><input type="checkbox" name="skills[]"><div class="check-dot"></div>Plumbing</label>
            <label class="check-item" onclick="toggleCheck(this)"><input type="checkbox" name="skills[]"><div class="check-dot"></div>Carpentry</label>
            <label class="check-item" onclick="toggleCheck(this)"><input type="checkbox" name="skills[]"><div class="check-dot"></div>Painting</label>
            <label class="check-item" onclick="toggleCheck(this)"><input type="checkbox" name="skills[]"><div class="check-dot"></div>Welding</label>
            <label class="check-item" onclick="toggleCheck(this)"><input type="checkbox" name="skills[]"><div class="check-dot"></div>Tiling</label>
            <label class="check-item" onclick="toggleCheck(this)"><input type="checkbox" name="skills[]"><div class="check-dot"></div>Cooking</label>
            <label class="check-item" onclick="toggleCheck(this)"><input type="checkbox" name="skills[]"><div class="check-dot"></div>Driving</label>
          </div>
          <div style="margin-top:14px;">
            <div class="field">
              <label>Add Custom Skill</label>
              <div class="skill-input-wrap">
                <input type="text" name="skills[]" id="customSkillInput" placeholder="e.g. Solar Panel Installation" onkeydown="if(event.key==='Enter'){addSkill();event.preventDefault();}">
                <button class="add-skill-btn" onclick="addSkill()">+ Add</button>
              </div>
            </div>
            <div class="skill-tags" id="skillTags"></div>
          </div>
        </div>

        <!-- Languages -->
        <div class="form-section">
          <div class="section-title">Languages Known</div>
          <div class="check-group">
            <label class="check-item" onclick="toggleCheck(this)"><input type="checkbox" name="languages[]"><div class="check-dot"></div>Hindi</label>
            <label class="check-item" onclick="toggleCheck(this)"><input type="checkbox" name="languages[]"><div class="check-dot"></div>English</label>
            <label class="check-item" onclick="toggleCheck(this)"><input type="checkbox" name="languages[]"><div class="check-dot"></div>Urdu</label>
            <label class="check-item" onclick="toggleCheck(this)"><input type="checkbox" name="languages[]"><div class="check-dot"></div>Bengali</label>
            <label class="check-item" onclick="toggleCheck(this)"><input type="checkbox" name="languages[]"><div class="check-dot"></div>Marathi</label>
            <label class="check-item" onclick="toggleCheck(this)"><input type="checkbox" name="languages[]"><div class="check-dot"></div>Punjabi</label>
            <label class="check-item" onclick="toggleCheck(this)"><input type="checkbox" name="languages[]"><div class="check-dot"></div>Tamil</label>
            <label class="check-item" onclick="toggleCheck(this)"><input type="checkbox" name="languages[]"><div class="check-dot"></div>Telugu</label>
          </div>
        </div>

      </div>
      <div class="form-nav">
        <button type="button" class="btn-back" onclick="goPrev(3)">← Back</button>
        <span class="step-counter">Step 3 of 5</span>
        <button type="button" class="btn-next" onclick="goNext(3)">Next →</button>
      </div>
    </div>

    <!-- ══════════════════════════════ STEP 4: DOCUMENTS ══════════════════════════════ -->
    <div id="step4" style="display:none;">
      <div class="form-card-header">
        <div class="form-card-icon">📁</div>
        <div>
          <div class="form-card-title">Document Upload</div>
          <div class="form-card-sub">Upload clear, readable copies of all documents</div>
        </div>
      </div>
      <div class="form-body">

        <!-- ID Documents -->
        <div class="form-section">
          <div class="section-title">Identity Documents</div>
          <div class="upload-grid">
            <div class="field">
              <label>Aadhar Card (Front) <span class="req">*</span></label>
              <div class="upload-box" id="box-aadharF" ondragover="dragOver(event,this)" ondragleave="dragLeave(this)" ondrop="dropFile(event,'aadharF')">
                <input type="file" accept="image/*,.pdf" name="aadharF"  onchange="fileSelected(this,'aadharF')">
                <div class="upload-icon">🪪</div>
                <div class="upload-label">Click or drag to upload</div>
                <div class="upload-sub">JPG, PNG or PDF · Max 5MB</div>
              </div>
              <div class="upload-preview" id="prev-aadharF">
                <span class="preview-icon">📄</span>
                <span class="preview-name" id="prevName-aadharF"></span>
                <button class="preview-remove" onclick="removeFile('aadharF')">✕</button>
              </div>
            </div>
            <div class="field">
              <label>Aadhar Card (Back) <span class="req">*</span></label>
              <div class="upload-box" id="box-aadharB" ondragover="dragOver(event,this)" ondragleave="dragLeave(this)" ondrop="dropFile(event,'aadharB')">
                <input type="file" accept="image/*,.pdf" name="aadharB" onchange="fileSelected(this,'aadharB')">
                <div class="upload-icon">🪪</div>
                <div class="upload-label">Click or drag to upload</div>
                <div class="upload-sub">JPG, PNG or PDF · Max 5MB</div>
              </div>
              <div class="upload-preview" id="prev-aadharB">
                <span class="preview-icon">📄</span>
                <span class="preview-name" id="prevName-aadharB"></span>
                <button class="preview-remove" onclick="removeFile('aadharB')">✕</button>
              </div>
            </div>
            <div class="field">
              <label>PAN Card</label>
              <div class="upload-box" id="box-pan" ondragover="dragOver(event,this)" ondragleave="dragLeave(this)" ondrop="dropFile(event,'pan')">
                <input type="file" accept="image/*,.pdf" name="pan" onchange="fileSelected(this,'pan')">
                <div class="upload-icon">💳</div>
                <div class="upload-label">Click or drag to upload</div>
                <div class="upload-sub">JPG, PNG or PDF · Max 5MB</div>
              </div>
              <div class="upload-preview" id="prev-pan">
                <span class="preview-icon">📄</span>
                <span class="preview-name" id="prevName-pan"></span>
                <button class="preview-remove" onclick="removeFile('pan')">✕</button>
              </div>
            </div>
            <div class="field">
              <label>Voter ID / Driving License</label>
              <div class="upload-box" id="box-voterId" ondragover="dragOver(event,this)" ondragleave="dragLeave(this)" ondrop="dropFile(event,'voterId')">
                <input type="file" accept="image/*,.pdf" name="voterId" onchange="fileSelected(this,'voterId')">
                <div class="upload-icon">🗳️</div>
                <div class="upload-label">Click or drag to upload</div>
                <div class="upload-sub">JPG, PNG or PDF · Max 5MB</div>
              </div>
              <div class="upload-preview" id="prev-voterId">
                <span class="preview-icon">📄</span>
                <span class="preview-name" id="prevName-voterId"></span>
                <button class="preview-remove" onclick="removeFile('voterId')">✕</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Professional Documents -->
        <div class="form-section">
          <div class="section-title">Professional Documents</div>
          <div class="upload-grid">
            <div class="field">
              <label>Resume / CV <span class="req">*</span></label>
              <div class="upload-box" id="box-resume" ondragover="dragOver(event,this)" ondragleave="dragLeave(this)" ondrop="dropFile(event,'resume')">
                <input type="file" accept=".pdf,.doc,.docx" name="resume" onchange="fileSelected(this,'resume')">
                <div class="upload-icon">📝</div>
                <div class="upload-label">Click or drag to upload</div>
                <div class="upload-sub">PDF or Word Doc · Max 10MB</div>
              </div>
              <div class="upload-preview" id="prev-resume">
                <span class="preview-icon">📄</span>
                <span class="preview-name" id="prevName-resume"></span>
                <button class="preview-remove" onclick="removeFile('resume')">✕</button>
              </div>
            </div>
            <div class="field">
              <label>Experience Certificate</label>
              <div class="upload-box" id="box-expCert" ondragover="dragOver(event,this)" ondragleave="dragLeave(this)" ondrop="dropFile(event,'expCert')">
                <input type="file" accept="image/*,.pdf" name="expCert" onchange="fileSelected(this,'expCert')">
                <div class="upload-icon">🏅</div>
                <div class="upload-label">Click or drag to upload</div>
                <div class="upload-sub">JPG, PNG or PDF · Max 5MB</div>
              </div>
              <div class="upload-preview" id="prev-expCert">
                <span class="preview-icon">📄</span>
                <span class="preview-name" id="prevName-expCert"></span>
                <button class="preview-remove" onclick="removeFile('expCert')">✕</button>
              </div>
            </div>
            <div class="field">
              <label>Educational Certificate</label>
              <div class="upload-box" id="box-eduCert" ondragover="dragOver(event,this)" ondragleave="dragLeave(this)" ondrop="dropFile(event,'eduCert')">
                <input type="file" accept="image/*,.pdf" name="eduCert" onchange="fileSelected(this,'eduCert')">
                <div class="upload-icon">🎓</div>
                <div class="upload-label">Click or drag to upload</div>
                <div class="upload-sub">JPG, PNG or PDF · Max 5MB</div>
              </div>
              <div class="upload-preview" id="prev-eduCert">
                <span class="preview-icon">📄</span>
                <span class="preview-name" id="prevName-eduCert"></span>
                <button class="preview-remove" onclick="removeFile('eduCert')">✕</button>
              </div>
            </div>
            <div class="field">
              <label>Skill / Trade Certificate</label>
              <div class="upload-box" id="box-skillCert" ondragover="dragOver(event,this)" ondragleave="dragLeave(this)" ondrop="dropFile(event,'skillCert')">
                <input type="file" accept="image/*,.pdf" name="skillCert" onchange="fileSelected(this,'skillCert')">
                <div class="upload-icon">🛠️</div>
                <div class="upload-label">Click or drag to upload</div>
                <div class="upload-sub">JPG, PNG or PDF · Max 5MB</div>
              </div>
              <div class="upload-preview" id="prev-skillCert">
                <span class="preview-icon">📄</span>
                <span class="preview-name" id="prevName-skillCert"></span>
                <button class="preview-remove" onclick="removeFile('skillCert')">✕</button>
              </div>
            </div>
          </div>
        </div>

      </div>
      <div class="form-nav">
        <button type="button" btn-back" onclick="goPrev(4)">← Back</button>
        <span class="step-counter">Step 4 of 5</span>
        <button type="button" class="btn-next" onclick="goNext(4)">Next →</button>
      </div>
    </div>

    <!-- ══════════════════════════════ STEP 5: BANK & LEGAL ══════════════════════════════ -->
    <div id="step5" style="display:none;">
      <div class="form-card-header">
        <div class="form-card-icon">🏦</div>
        <div>
          <div class="form-card-title">Bank &amp; Legal Details</div>
          <div class="form-card-sub">For salary payment and compliance</div>
        </div>
      </div>
      <div class="form-body">

        <!-- Aadhar Number -->
        <div class="form-section">
          <div class="section-title">Aadhar Card Number</div>
          <div class="field">
            <label>12-digit Aadhar Number <span class="req">*</span></label>
            <div class="aadhar-wrap">
              <input class="aadhar-part" type="text" id="aadhar1" maxlength="12" placeholder="Enter aadhar number" oninput="aadharNext(this,'aadhar2')">
            </div>
            <div class="field-hint">🔒 This information is encrypted and securely stored</div>
            <div class="field-error" id="err-aadhar">Please enter valid 12-digit Aadhar number</div>
          </div>
        </div>

        <!-- PAN -->
        <div class="form-section">
          <div class="section-title">PAN Card Number</div>
          <div class="fg fg-2">
            <div class="field">
              <label>PAN Number</label>
              <input type="text" id="panNo" name="pan_no" placeholder="ABCDE1234F" maxlength="10" style="letter-spacing:2px;font-weight:600;text-transform:uppercase;">
              <div class="field-hint">Format: ABCDE1234F</div>
            </div>
          </div>
        </div>

        <!-- Bank -->
        <div class="form-section">
          <div class="section-title">Bank Account Details</div>
          <div class="fg fg-2">
            <div class="field">
              <label>Account Holder Name <span class="req">*</span></label>
              <input type="text" id="accName" name="accName" placeholder="As per bank records">
              <div class="field-error" id="err-accName">Required</div>
            </div>
            <div class="field">
              <label>Bank Name <span class="req">*</span></label>
              <select id="bankName" name="bankName">
                <option value="">Select Bank</option>
                <option value="SBI">State Bank of India</option>
                <option value="PNB">Punjab National Bank</option>
                <option value="BOB">Bank of Baroda</option>
                <option value="CANARA">Canara Bank</option>
                <option value="HDFC">HDFC Bank</option>
                <option value="ICICI">ICICI Bank</option>
                <option value="AXIS">Axis Bank</option>
                <option value="KOTAK">Kotak Mahindra Bank</option>
                <option value="YES">Yes Bank</option>
                <option value="UNION">Union Bank of India</option>
                <option value="BANK_OF_INDIA">Bank of India</option>
                <option value="OTHER">Other</option>
              </select>
              <div class="field-error" id="err-bankName">Required</div>
            </div>
            <div class="field">
              <label>Account Number <span class="req">*</span></label>
              <input type="text" id="accNo" name="accNo" placeholder="Enter account number" maxlength="18">
              <div class="field-error" id="err-accNo">Required</div>
            </div>
            <div class="field">
              <label>Confirm Account Number <span class="req">*</span></label>
              <input type="text" id="accNoConfirm" name="accNoConfirm" placeholder="Re-enter account number" maxlength="18">
              <div class="field-error" id="err-accNoConfirm">Numbers do not match</div>
            </div>
            <div class="field">
              <label>IFSC Code <span class="req">*</span></label>
              <input type="text" id="ifsc" name="ifsc" placeholder="SBIN0001234" maxlength="11" style="letter-spacing:1.5px;text-transform:uppercase;">
              <div class="field-hint">11-character code (e.g. SBIN0001234)</div>
              <div class="field-error" id="err-ifsc">Enter valid IFSC code</div>
            </div>
            <div class="field">
              <label>Account Type</label>
              <select name="accountType">
                <option value="savings_a/c">Savings Account</option>
                <option value="current_a/c">Current Account</option>
                <option value="jan_dhan_a/c">Jan Dhan Account</option>
              </select>
            </div>
          </div>
          <div class="fg fg-1" style="margin-top:16px;">
            <div class="field">
              <label>Passbook / Cancelled Cheque</label>
              <div class="upload-box" id="box-passbook" ondragover="dragOver(event,this)" ondragleave="dragLeave(this)" ondrop="dropFile(event,'passbook')">
                <input type="file" accept="image/*,.pdf" name="passbook" onchange="fileSelected(this,'passbook')">
                <div class="upload-icon">🏦</div>
                <div class="upload-label">Upload passbook front page or   cancelled cheque</div>
                <div class="upload-sub">JPG, PNG or PDF · Max 5MB</div>
              </div>
              <div class="upload-preview" id="prev-passbook">
                <span class="preview-icon">📄</span>
                <span class="preview-name" id="prevName-passbook"></span>
                <button class="preview-remove" onclick="removeFile('passbook')">✕</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Declaration -->
        <div class="form-section">
          <div class="section-title">Declaration</div>
          <div style="background:var(--g4);border:1.5px solid var(--border);border-radius:var(--radius-sm);padding:16px;margin-bottom:14px;">
            <p style="font-size:13px;color:var(--ink2);line-height:1.7;">
              I hereby declare that all the information provided above is true, correct, and complete to the best of my knowledge and belief. I understand that any false information or omission of information may result in disqualification from employment or termination of service without notice.
            </p>
          </div>
          <label class="check-item" id="declarationLabel" onclick="toggleCheck(this)" style="width:100%;">
            <input type="checkbox" id="declarationCheck" name="declarationCheck">
            <div class="check-dot"></div>
            I agree to the above declaration and Besic Seva's Terms of Service &amp; Privacy Policy
          </label>
          <div class="field-error" id="err-declaration" style="margin-top:8px;">Please accept the declaration to proceed</div>
        </div>

      </div>
      <div class="form-nav">
        <button type="button" class="btn-back" onclick="goPrev(5)">← Back</button>
        <span class="step-counter">Step 5 of 5</span>
        <input  type="submit" name="submit" class="btn-next" onclick="submitForm()"
         style="background:linear-gradient(135deg,#0f6b30,#2eaa63);">
          ✅ Submit Registration
        
      </div>
    </div>

    <!-- ══════════════════════════════ SUCCESS SCREEN ══════════════════════════════ -->
    <div class="success-screen" id="successScreen">
      <div class="success-icon">✅</div>
      <div class="success-title">Registration Successful!</div>
      <div class="success-sub">
        Thank you! The employee profile has been submitted successfully.<br>
        Our team will review and verify the documents within <strong>24–48 hours</strong>.
      </div>
      <div class="success-id" id="successId">Employee ID: #BS-2024-XXXX</div>
      <p style="font-size:13px;color:var(--ink4);margin-bottom:20px;">
        A confirmation will be sent to the registered mobile number.
      </p>
      <button type="reset" class="restart-btn" onclick="restartForm()">+ Register Another Employee</button>
    </div>

  </div><!-- /form-card -->
</div>
</form>
<!-- /container -->


<script>
let currentStep = 1;
const totalSteps = 5;

// ── NAVIGATION ──
function goNext(step) {
  if (!validateStep(step)) return;
  currentStep = step + 1;
  showStep(currentStep);
  updateStepper(currentStep);
  scrollToTop();
}
function goPrev(step) {
  currentStep = step - 1;
  showStep(currentStep);
  updateStepper(currentStep);
  scrollToTop();
}
function showStep(n) {
  for(let i=1;i<=totalSteps;i++) {
    const el = document.getElementById('step'+i);
    if(el) el.style.display = (i===n) ? '' : 'none';
  }
  if(n > totalSteps) {
    // hide all steps, show success
    for(let i=1;i<=totalSteps;i++) {
      const el = document.getElementById('step'+i);
      if(el) el.style.display = 'none';
    }
    document.getElementById('successScreen').classList.add('show');
  }
}
function scrollToTop(){
  document.querySelector('.form-card').scrollIntoView({behavior:'smooth',block:'start'});
}

// ── STEPPER UPDATE ──
function updateStepper(active) {
  document.querySelectorAll('.step').forEach((el,i) => {
    const sn = i+1;
    el.classList.remove('active','done');
    if(sn < active) el.classList.add('done');
    else if(sn === active) el.classList.add('active');
    // update dot
    const dot = el.querySelector('.step-dot');
    if(sn < active) dot.textContent = '✓';
    else if(sn <= totalSteps) dot.textContent = sn;
    else dot.textContent = '✓';
    // update lines
    const line = el.querySelector('.step-line');
    if(line){
      line.style.background = sn < active ? 'var(--g3)' : 'var(--border)';
    }
  });
}

// ── VALIDATION ──
function validateStep(step) {
  let valid = true;

  function req(id, errId, checkFn) {
    const el = document.getElementById(id);
    const err = document.getElementById(errId);
    if(!el) return;
    const pass = checkFn ? checkFn(el.value) : el.value.trim() !== '';
    if(!pass) {
      el.classList.add('error');
      if(err) err.classList.add('show');
      valid = false;
    } else {
      el.classList.remove('error');
      if(err) err.classList.remove('show');
    }
  }

  if(step === 1) {
    req('firstName','err-firstName');
    req('lastName','err-lastName');
    req('dob','err-dob');
    req('gender','err-gender');
    req('emgName','err-emgName');
    req('emgPhone','err-emgPhone', v => /^\d{10}$/.test(v.trim()));
  }
  if(step === 2) {
    req('mobile','err-mobile', v => /^\d{10}$/.test(v.trim()));
    req('email','err-email', v => /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v.trim()));
    req('addr1','err-addr1');
    req('city','err-city');
    req('state','err-state');
    req('pin','err-pin', v => /^\d{6}$/.test(v.trim()));
  }
  if(step === 3) {
    req('jobRole','err-jobRole');
    req('empType','err-empType');
  }
  if(step === 4) {
    // optional: just proceed
  }
  if(step === 5) {
    req('aadhar1','err-aadhar', v => /^\d{4}$/.test(v.trim()));
    req('accName','err-accName');
    req('bankName','err-bankName');
    req('accNo','err-accNo');
    req('ifsc','err-ifsc', v => /^[A-Z]{4}0[A-Z0-9]{6}$/.test(v.trim().toUpperCase()));
    // confirm acc
    const accNo = document.getElementById('accNo').value;
    const accNoC = document.getElementById('accNoConfirm').value;
    const accErr = document.getElementById('err-accNoConfirm');
    if(accNo !== accNoC || accNoC === '') {
      document.getElementById('accNoConfirm').classList.add('error');
      accErr.classList.add('show'); valid = false;
    } else {
      document.getElementById('accNoConfirm').classList.remove('error');
      accErr.classList.remove('show');
    }
    // declaration
    const decl = document.getElementById('declarationCheck');
    const declLabel = document.getElementById('declarationLabel');
    const declErr = document.getElementById('err-declaration');
    if(!declLabel.classList.contains('selected')) {
      declErr.classList.add('show'); valid = false;
    } else {
      declErr.classList.remove('show');
    }
  }

  return valid;
}

// ── SUBMIT ──
function submitForm() {
  if(!validateStep(5)) return;
  // Generate random ID
  const id = 'BS-2024-' + Math.floor(1000 + Math.random()*9000);
  document.getElementById('successId').textContent = 'Employee ID: #' + id;
  updateStepper(6);
  showStep(6); // triggers success
}

// ── RESTART ──
function restartForm() {
  document.getElementById('successScreen').classList.remove('show');
  currentStep = 1;
  showStep(1);
  updateStepper(1);
  scrollToTop();
}

// ── PHOTO PREVIEW ──
function previewPhoto(input) {
  const file = input.files[0];
  if(!file) return;
  const reader = new FileReader();
  reader.onload = e => {
    const img = document.getElementById('photoPreviewImg');
    img.src = e.target.result;
    img.style.display = 'block';
    document.getElementById('photoIcon').style.display = 'none';
    document.getElementById('photoLbl').style.display = 'none';
  };
  reader.readAsDataURL(file);
}

// ── FILE UPLOAD ──
function fileSelected(input, key) {
  const file = input.files[0];
  if(!file) return;
  showPreview(key, file.name);
}
function showPreview(key, name) {
  const prev = document.getElementById('prev-'+key);
  const nameEl = document.getElementById('prevName-'+key);
  if(prev && nameEl) {
    nameEl.textContent = name;
    prev.classList.add('show');
  }
}
function removeFile(key) {
  const prev = document.getElementById('prev-'+key);
  if(prev) prev.classList.remove('show');
  const box = document.getElementById('box-'+key);
  if(box) {
    const inp = box.querySelector('input[type=file]');
    if(inp) inp.value = '';
  }
}
function dragOver(e, el) {
  e.preventDefault();
  el.classList.add('dragover');
}
function dragLeave(el) {
  el.classList.remove('dragover');
}
function dropFile(e, key) {
  e.preventDefault();
  const box = document.getElementById('box-'+key);
  if(box) box.classList.remove('dragover');
  const file = e.dataTransfer.files[0];
  if(file) showPreview(key, file.name);
}

// ── CHECKBOX TOGGLE ──
function toggleCheck(el) {
  el.classList.toggle('selected');
  const cb = el.querySelector('input[type=checkbox]');
  if(cb) cb.checked = el.classList.contains('selected');
}

// ── SAME ADDRESS TOGGLE ──
function toggleSameAddr(el) {
  el.classList.toggle('selected');
  const cb = el.querySelector('input[type=checkbox]');
  cb.checked = el.classList.contains('selected');
  const fields = document.getElementById('permAddrFields');
  fields.style.display = el.classList.contains('selected') ? 'none' : '';
}

// ── SKILL TAGS ──
function addSkill() {
  const input = document.getElementById('customSkillInput');
  const val = input.value.trim();
  if(!val) return;
  const tags = document.getElementById('skillTags');
  const tag = document.createElement('div');
  tag.className = 'skill-tag';
  tag.innerHTML = `<span>${val}</span><button onclick="this.parentElement.remove()" title="Remove">✕</button>`;
  tags.appendChild(tag);
  input.value = '';
  input.focus();
}

// ── AADHAR AUTO-ADVANCE ──
function aadharNext(el, nextId) {
  if(el.value.length >= 4) {
    const next = document.getElementById(nextId);
    if(next) next.focus();
  }
}

// ── IFSC UPPERCASE ──
document.addEventListener('DOMContentLoaded', () => {
  const ifsc = document.getElementById('ifsc');
  if(ifsc) ifsc.addEventListener('input', function() {
    this.value = this.value.toUpperCase();
  });
  const pan = document.getElementById('panNo');
  if(pan) pan.addEventListener('input', function() {
    this.value = this.value.toUpperCase();
  });
});
</script>
</body>
</html>