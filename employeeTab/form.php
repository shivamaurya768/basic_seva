<?php
session_start();

require_once __DIR__ . "/../db_conn.php";
?>
<?php
$profile_photo = $_FILES['profile_photo'];
$name = trim($_POST['name']);
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$contact_number = trim($_POST['mobile']);
$alternate_mobile = trim($_POST['alternate_mobile']);
$email = trim($_POST['email']);
$marital_status = $_POST['marital_status'];
$nationality = trim($_POST['nationality']);
$mobile = $_POST['mobile'];
$alternate_mobile = $_POST['alternate_mobile'];
$email = trim($_POST['email']);
$whatsapp= $_POST['whatsapp'];
$addr1 = trim($_POST['addr1']);
$addr2 = trim($_POST['addr2']);
$city = trim($_POST['city']);
$state = trim($_POST['state']);
$pin_no = trim($_POST['pin_no']);
$jobRole = trim($_POST['jobRole']);
$department = trim($_POST['department']);
$empType = trim($_POST['empType']);
$joining_date = trim($_POST['joinDate']);
$workLocation = trim($_POST['workLocation']);
// $reporting_manager = trim($_POST['reporting_manager']);
$highestQualification = trim($_POST['highestQualification']);
$yearOfPassing = trim($_POST['yearOfPassing']);
$totalExperience = trim($_POST['totalExperience']);
$previousEmployer = trim($_POST['previousEmployer']);
$skills = $_POST['skills'];
// $languages=$_POST['languages'];
$aadharFront = $_FILES['aadharF'];
$aadharBack = $_FILES['aadharB'];
$panCard = $_FILES['pan'];
$voterId = $_FILES['voterId'];
$resume = $_FILES['resume'];
$expCert = $_FILES['expCert'];
$eduCert = $_FILES['eduCert'];
$skillCert = $_FILES['skillCert'];
$pan_no = trim($_POST['pan_no']);
$accName = trim($_POST['accName']);
$bankName = trim($_POST['bankName']);
$accNo = trim($_POST['accNo']);
$ifsc = trim($_POST['ifsc']);
$accountType = trim($_POST['accountType'])      ;
$passbook = $_FILES['passbook'];
// store the data in employees table
if(isset($_POST['submit']))
{
    if (!is_dir('../uploads')) {
        mkdir('../uploads', 0777, true);
    }

    // Profile Photo all files will be stored in uploads folder with unique name to avoid overwriting
    $profile_photo_path = "";

    if($_FILES['profile_photo']['error'] == 0)
    {
        $profile_photo_path =
            "../uploads/" . time() . "_" .
            basename($_FILES['profile_photo']['name']);

        move_uploaded_file(
            $_FILES['profile_photo']['tmp_name'],
            $profile_photo_path
        );
    }

    $skills_json = json_encode($_POST['skills']);

    $stmt = $conn->prepare("
        INSERT INTO employees
        (
            image_profile,
            names,
            date_of_birth,
            gender,
            mobile,
            alternate_mobile,
            username,
            marital_status,
            nationality,
            whatsapp,
            address_1,
            address_2,
            city,
            states,
            pin_code,
            job_role,
            department,
            employment_type,
            joining_date,
            work_location,
            highest_qualification,
            passing_year,
            total_experience,
            previous_employer,
            skill_certificate,
            pan_number,
            account_holder_name,
            bank_name,
            account_number,
            ifsc_code,
            account_type
        )
        VALUES
        (
            ?,?,?,?,?,?,?,?,?,?,
            ?,?,?,?,?,?,?,?,?,?,
            ?,?,?,?,?,?,?,?,?,?,
            ?
        )
    ");

    $stmt->execute([
        $profile_photo_path,
        $name,
        $dob,
        $gender,
        $contact_number,
        $alternate_mobile,
        $email,
        $marital_status,
        $nationality,
        $whatsapp,
        $addr1,
        $addr2,
        $city,
        $state,
        $pin_no,
        $jobRole,
        $department,
        $empType,
        $joining_date,
        $workLocation,
        $highestQualification,
        $yearOfPassing,
        $totalExperience,
        $previousEmployer,
        $skills_json,
        $pan_no,
        $accName,
        $bankName,
        $accNo,
        $ifsc,
        $accountType
    ]);


    $documents = [
        'aadhar_front' => $_FILES['aadharF'],
        'aadhar_back' => $_FILES['aadharB'],
        'pan_card' => $_FILES['pan'],
        'voter_id' => $_FILES['voterId'],
        'resume' => $_FILES['resume'],
        'experience_certificate' => $_FILES['expCert'],
        'education_certificate' => $_FILES['eduCert'],
        'skill_certificate' => $_FILES['skillCert'],
        'passbook' => $_FILES['passbook']
    ];

    foreach($documents as $doc_type => $file)
    {
        if($file['error'] == 0)
        {
            $doc_path =
                "../uploads/" .
                time() . "_" .
                basename($file['name']);

            move_uploaded_file(
                $file['tmp_name'],
                $doc_path
            );
        // store the document in employees table 
            $stmt = $conn->prepare("
                UPDATE employees
                SET $doc_type = ?
                WHERE username = ?
            ");

            $stmt->execute([$doc_path, $email]);


            
        }
    }
    // update the name,profile image in login table
    $stmt = $conn->prepare("
        UPDATE login
        SET profile_image = ?

        WHERE username = ?
    ");
    $stmt->execute([$profile_photo_path, $email]);
    $stmt = $conn->prepare("
        UPDATE login
        SET names = ?
        WHERE username = ?
    ");
    $stmt->execute([$name, $email]);

    // add all information in session to display in employee details page
    $_SESSION['image'] = $profile_photo_path;
    $_SESSION['name'] = $name;
    $_SESSION['dob'] = $dob;
    $_SESSION['gender'] = $gender;
    $_SESSION['mobile'] = $contact_number;
    $_SESSION['alternate_mobile'] = $alternate_mobile;
    $_SESSION['email'] = $email;
    $_SESSION['marital_status'] = $marital_status;
    $_SESSION['nationality'] = $nationality;
    $_SESSION['whatsapp'] = $whatsapp;
    $_SESSION['address_1'] = $addr1;
    $_SESSION['address_2'] = $addr2;
    $_SESSION['city'] = $city;
    $_SESSION['states'] = $state;
    $_SESSION['pin_code'] = $pin_no;
    $_SESSION['job_role'] = $jobRole;
    $_SESSION['department'] = $department;
    $_SESSION['employment_type'] = $empType;
    $_SESSION['joining_date'] = $joining_date;
    $_SESSION['work_location'] = $workLocation;
    $_SESSION['highest_qualification'] = $highestQualification;
    $_SESSION['passing_year'] = $yearOfPassing;
    $_SESSION['total_experience'] = $totalExperience;
    $_SESSION['previous_employer'] = $previousEmployer;
    $_SESSION['skill_certificate'] = $skills_json;
    $_SESSION['pan_number'] = $pan_no;
    $_SESSION['account_holder_name'] = $accName;
    $_SESSION['bank_name'] = $bankName;
    $_SESSION['account_number'] = $accNo;
    $_SESSION['ifsc_code'] = $ifsc;
    $_SESSION['account_type'] = $accountType;
    header("Location: ../employee.php");
}
?>