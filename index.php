<?php
    session_start();
    require_once "db_conn.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic Seve</title>
    <link rel="icon" href="logo.png" type="image/x-icon">
    <link rel="stylesheet" href="style/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.8.0/fonts/remixicon.css"
  rel="stylesheet"/>
</head>
<body>
    <!-- header -->
    <div id="header">
         <?php include "include/profile.php"; ?>   
        <?php include "include/menu.php";?>

    <h1 style="color:white"><br> <br>
    </h1>


    </div>
    
<!-- header end  -->
<?php
if(isset($_SESSION['username'])){
?>
    <div id="profile-view-edit">

        <div id="profile-img">
            <div id="profilePic">
               <?php
$result = null;

if(isset($_SESSION['username'])) {

    // Fetch image from database
    $query = $conn->prepare("SELECT image_profile FROM logins WHERE username=?");
    $query->execute([$_SESSION['username']]);
    $result = $query->fetch(PDO::FETCH_ASSOC);
}

// First check session image
if(!empty($_SESSION['image'])) {

    echo '<img src="uploads/' . $_SESSION['image'] . '" alt="Profile Picture">';

// Then check database image
} elseif(!empty($result['image_profile'])) {

    echo '<img src="uploads/' . $result['image_profile'] . '" alt="Profile Picture">';

// Default image
} else {

    echo '<img src="image/profile.jpeg" alt="Default Profile">';

}
?>
            </div>

            <button id="Editbtn">
                <i class="ri-pencil-ai-fill" id="edit"></i>
            </button>
        </div>

<div id="profile-view">
<?php 

if(isset($_SESSION['name'])){
    echo "<h3>Your name: " . $_SESSION['name'] . "</h3>";
}

if(isset($_SESSION['username'])){
    echo "<h3>Your email: " . $_SESSION['username'] . "</h3>";
}

/* PHONE */

if(isset($_SESSION['username'])){

    $query = $conn->prepare("SELECT Phone_no FROM logins WHERE username=?");
    $query->execute([$_SESSION['username']]);
    $result = $query->fetch(PDO::FETCH_ASSOC);

    if(!empty($result['Phone_no'])){
        echo "<h3>Your phone: " . $result['Phone_no'] . "</h3>";
    } 
    else if(isset($_SESSION['phone'])){
        echo "<h3>Your phone: " . $_SESSION['phone'] . "</h3>";
    }
    else{
        echo "<h3>Your phone: Not provided</h3>";
    }
}

/* ADDRESS */

if(isset($_SESSION['username'])){

    $query = $conn->prepare("SELECT Address FROM logins WHERE username=?");
    $query->execute([$_SESSION['username']]);
    $result = $query->fetch(PDO::FETCH_ASSOC);

    if(!empty($result['Address'])){
        echo "<h3". " id='adrs'".">Your address: " . $result['Address'] . "</h3>";
    } 
    else if(isset($_SESSION['address'])){
        echo "<h3". " id='adrs'".">Your address: " . $_SESSION['address'] . "</h3>";
    }
    else{
        echo "<h3 id='adrs'>Your address: Not provided</h3>";
    }
}

?>
        </div>

        <div id="profile-edit">
            <form action="" method="POST" enctype="multipart/form-data">
                
                <label>Name:</label>
                <input type="text" name="user_name"
                    value="<?php echo isset($_SESSION['name']) ? $_SESSION['name'] : ''; ?>" required><br>

                <label>Email:</label>
                <input type="email" name="email"
                    value="<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?>" required><br>

                <label>Phone:</label>
                <input type="text" name="phone"
                    value="<?php echo isset($_SESSION['phone']) ? $_SESSION['phone'] : ''; ?>" required><br>

                <label>Address:</label>
                <input type="text" name="address" id="address"
                    value="<?php echo isset($_SESSION['address']) ? $_SESSION['address'] : ''; ?>" required><br>
                 <label>Profile Image:</label>
                <input type="file" name="image" accept="image/*"><br>
                <button type="submit" name="update">Update Profile</button>

            </form>
        </div>

    </div>
<?php
}
?>
<?php
if(isset($_POST['update'])){
    $NewName = trim($_POST['user_name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $address = trim($_POST['address']);
    $image = $_FILES['image']['name'];
    $oldname = $_SESSION['username'];
    // check image folder exist or not not exist then create
    if (!is_dir('uploads')) {
        mkdir('uploads', 0777, true);
    }
    if($image) {
        $targetDir = "uploads/";
        $targetFile = $targetDir . basename($image);
        move_uploaded_file($_FILES['image']['tmp_name'], $targetFile);
    } else {
        echo "<script>alert('No image uploaded, keeping existing profile picture');</script>";
        $image = $_SESSION['image']; // keep existing image if no new image is uploaded
    }
    if(!empty($NewName) && !empty($email) && !empty($phone) && !empty($address) && filter_var($email, FILTER_VALIDATE_EMAIL)){
        try{
            $stmt = $conn->prepare("UPDATE logins SET names=?, username=?, Phone_no=?, Address=?, image_profile=? WHERE username=?");
            $stmt->execute([$NewName, $email, $phone, $address, $image, $oldname]);

            // update session
            $_SESSION['name'] = $NewName;
            $_SESSION['username'] = $email;
            $_SESSION['phone'] = $phone;
            $_SESSION['address'] = $address;
            $_SESSION['image'] = $image;
            echo "<script> 
                    
            </script>";
        }catch(PDOException $e){
            echo "<h3>Database error: " . $e->getMessage() . "</h3>";
        }
    }
}
?>

    <!-- parsone image -->
     <div id="parsone" >
    <h3>SERVICES MAN</h3>
    <center>
    <img src="image/img1.jpg" alt="" class="img_person" id="img1">
     <img src="image/img2.jpg" alt="" class="img_person" id="img2">
     <img src="image/img3.jpg" alt="" class="img_person" id="img3">
    </center>
    </div>
    <!-- end parsone image  -->
    
    <!-- SERVIES PROVIDES  -->
    <div id="service_proviode">
        <h2>SERVICES WE PROVIDE</h2>
        <div class="service_box" onclick="showServiceInfo('Services_image/plumber-removebg-preview.png', 'PLUMBER', 'Our skilled plumbers are ready to tackle any plumbing issue you may have, from leaky faucets to clogged drains. We provide prompt and reliable service to ensure your plumbing system is functioning smoothly.', 'John Doe', '123-456-7890','john@gmail.com','123 Main St, Cityville')">
            <img src="Services_image/plumber-removebg-preview.png" alt="" class="service_img">
            <h3>PLUMBER</h3>
        </div>
        <div class="service_box" onclick="showServiceInfo('Services_image/AC.png', 'AC REPAIR', 'Our skilled AC technicians are ready to tackle any air conditioning issue you may have, from broken compressors to refrigerant leaks. We provide prompt and reliable service to ensure your AC system is functioning smoothly.', 'Jane Smith', '987-654-3210','jane@gmail.com','456 Oak St, Townsville')">
            <img src="Services_image/AC.png" alt="" class="service_img">
            <h3>AC REPAIR</h3>
        </div>
        <div class="service_box" onclick="showServiceInfo('Services_image/bike.png', 'BIKE REPAIR', 'Our skilled bike mechanics are ready to tackle any bicycle issue you may have, from broken chains to flat tires. We provide prompt and reliable service to ensure your bike is functioning smoothly.', 'Mike Johnson', '555-123-4567','mike@gmail.com','789 Pine St, Villagetown')">
            <img src="Services_image/bike.png" alt="" class="service_img">
            <h3>BIKE REPAIR</h3>
        </div>
        <div class="service_box" onclick="showServiceInfo('Services_image/car.png', 'CAR REPAIR', 'Our skilled car mechanics are ready to tackle any automotive issue you may have, from engine problems to brake repairs. We provide prompt and reliable service to ensure your car is functioning smoothly.', 'Sarah Williams', '111-222-3333','sarah@gmail.com','101 Elm St, Cityville')">
            <img src="Services_image/car.png" alt="" class="service_img">
            <h3>CAR REPAIR</h3>
        </div>
        <div class="service_box" onclick="showServiceInfo('Services_image/electrician.jpg', 'ELECTRICIAN', 'Our skilled electricians are ready to tackle any electrical issue you may have, from faulty wiring to circuit breaker problems. We provide prompt and reliable service to ensure your electrical system is functioning smoothly.', 'Robert Brown', '444-555-6666','robert@gmail.com','202 Maple St, Townsville')">
            <img src="Services_image/electrician.jpg" alt="" class="service_img">
            <h3>ELECTRICIAN</h3>
            </div>
         <div class="service_box" onclick="showServiceInfo('Services_image/network engineer.png', 'NETWORK ENGINEER', 'Our skilled network engineers are ready to tackle any networking issue you may have, from router configuration to network security. We provide prompt and reliable service to ensure your network is functioning smoothly.', 'David Wilson', '777-888-9999','david@gmail.com','303 Cedar St, Cityville')">
            <img src="Services_image/network engineer.png" alt="" class="service_img">
            <h3>NETWORK ENGINEER</h3>
         </div>
         <div class="service_box" onclick="showServiceInfo('Services_image/painter.png', 'PAINTER', 'Our skilled painters are ready to tackle any painting issue you may have, from interior painting to exterior finishing. We provide prompt and reliable service to ensure your property looks great.', 'Emily Davis', '222-333-4444','emily@gmail.com','505 Spruce St, Townsville')">
            <img src="Services_image/painter.png" alt="" class="service_img">
            <h3>PAINTER</h3>
         </div>
            <div class="service_box" onclick="showServiceInfo('Services_image/carpenter.jpg', 'CARPENTER', 'Our skilled carpenters are ready to tackle any woodworking issue you may have, from furniture assembly to structural repairs. We provide prompt and reliable service to ensure your project is completed perfectly.', 'James Miller', '333-444-5555','james@gmail.com','404 Oak St, Villagetown')">
                <img src="Services_image/carpenter.jpg" alt="" class="service_img">
                <h3>CARPENTER</h3>
            </div>
        <div class="service_box" onclick="showServiceInfo('Services_image/tiles and marble filters.jpeg', 'TILES AND MARBLE FITTER', 'Our skilled tile and marble fitters are ready to tackle any tiling or marble installation issue you may have, from bathroom tiles to kitchen countertops. We provide prompt and reliable service to ensure your space looks beautiful.', 'Lisa Anderson', '666-777-8888','lisa@gmail.com','606 Birch St, Cityville')">
            <img src="Services_image/tiles and marble filters.jpeg" alt="" class="service_img">
            <h3>TILES AND MARBLE FITTER</h3>
            </div>
        <div class="service_box" onclick="showServiceInfo('Services_image/welder.jpeg', 'WELDER', 'Our skilled welders are ready to tackle any welding issue you may have, from structural repairs to custom fabrication. We provide prompt and reliable service to ensure your project is completed perfectly.', 'Michael Taylor', '555-666-7777','michael@gmail.com','303 Pine St, Cityville')">
            <img src="Services_image/welder.jpeg" alt="" class="service_img">
            <h3>WELDER</h3>
        </div>
        <div class="service_box" onclick="showServiceInfo('Services_image/mobile.jpg', 'MOBILE REPAIR', 'Our skilled mobile repair technicians are ready to tackle any mobile device issue you may have, from screen replacements to software troubleshooting. We provide prompt and reliable service to ensure your device is functioning smoothly.', 'Jennifer Lee', '888-999-0000','jennifer@gmail.com','707 Willow St, Townsville')">
            <img src="Services_image/mobile.jpg" alt="" class="service_img">
            <h3>MOBILE REPAIR</h3>
        </div>
        <div class="service_box" onclick="showServiceInfo('Services_image/chee.png', 'COOKING (CHEE)', 'Our skilled chefs are ready to prepare delicious meals for any occasion, from intimate dinners to large gatherings. We provide prompt and reliable service to ensure your culinary needs are met with excellence.', 'Olivia Martinez', '111-333-5555','olivia@gmail.com','101 Maple St, Townsville')">
            <img src="Services_image/chee.png" alt="" class="service_img">
            <h3>COOKING (CHEE)</h3>
        </div>
        <div class="service_box" onclick="showServiceInfo('Services_image/agriculture.png', 'AGRICULTURE (KISHAN)', 'Our skilled agricultural workers are ready to assist with various farming tasks, from planting and harvesting to livestock care. We provide prompt and reliable service to ensure your agricultural operations run smoothly.', 'William Garcia', '222-444-6666','william@gmail.com','202 Cedar St, Townsville')">
            <img src="Services_image/agriculture.png" alt="" class="service_img">
            <h3>AGRICULTURE (KISHAN)</h3>
        </div>
        <div class="service_box" onclick="showServiceInfo('Services_image/veterinarian doctor.png', 'VETERINARIAN DOCTOR', 'Our skilled veterinarians are ready to provide medical care for your pets, from routine check-ups to emergency treatments. We provide prompt and reliable service to ensure the health and well-being of your beloved animals.', 'Sophia Hernandez', '777-555-3333','sophia@gmail.com','505 Spruce St, Townsville')">
            <img src="Services_image/veterinarian doctor.png" alt="" class="service_img">
            <h3>VETERINARIAN DOCTOR</h3>
        </div>
        <div class="service_box" onclick="showServiceInfo('Services_image/more.png', 'MORE...', 'More services coming soon.', 'Admin', '000-000-0000','admin@gmail.com','123 Main St, Townsville')">
            <img src="Services_image/more.png" alt="" class="service_img">
            <h3>MORE...</h3>
        </div>
    </div>
    <!-- END SERVIES -->
     <!-- services full info -->
      <?php
    if(isset($_SESSION['username'])){
        echo ' <div id="service-info" style="display:none">
                <button id="close-btn"><i class="ri-close-line"></i></button>
                <img src="logo.png" alt="service image" id="service-image">
                <h3 id="service-name">services name</h3>
                <p id="service-description">service description</p>
                <button id="book-service-btn"><i class="ri-book-open-line"></i> Book Service</button>
        </div>';
    }else{
        echo ' <div id="service-info" style="display:none">
                <button id="close-btn"><i class="ri-close-line"></i></button>
                <img src="logo.png" alt="service image" id="service-image">
                <h3 id="service-name">services name</h3>
                <p id="service-description">service description</p>
                <button id="book-service-btn"><a href="login_page.php" style="text-decoration: none; color: inherit;"><i class="ri-login-box-line"></i> Login</a></button>
        </div>';
    }    
      
    ?>


     <!-- end services full info -->
    <!-- about us -->
    <div class="about-section" id="about">
         <h1 style="text-align: center">ABOUT US</h1>
        <div class="container">
            
            <p>
                Welcome to our website! We are a trusted and professional platform dedicated to providing
                multiple high-quality services to meet the diverse needs of our customers.
            </p>

            <p>
                Our main goal is to deliver reliable, affordable, and efficient solutions all in one place.
                We focus on customer satisfaction by offering easy processes, timely service, and dependable support.
            </p>

            <p>
                We believe in transparency, quality, and long-term relationships with our clients.
                Your trust is our priority, and your satisfaction is our success.
            </p>
        </div>
    </div>
    <!-- end about us -->
    <footer>
        <div class="footer-content" id="contact">
            <h3>Content As</h3>
           <div>
             <p>Your trusted partner for reliable and affordable services.</p>
            <ul class="socials">
                <li><a href="https://www.instagram.com/shivammaurya768?utm_source=qr&igsh=Zmo3NWM3enJ4b2xp"> Instagram <i class="ri-instagram-line"></i> </a></li>
                <li><a href="https://www.facebook.com/share/p/1ApnPHD2gL/"> Facebook  <i class="ri-facebook-line"></i>  </a></li>
                <li><a href="#">Twitter    <i class="ri-twitter-line"></i>   </a></li>
                <li><a href="https://www.linkedin.com/in/shivam-maurya-10508036b?utm_source=share_via&utm_content=profile&utm_medium=member_android">Linkedin   <i class="ri-linkedin-line"></i>  </a></li>
                <li><a href="https://github.com/shivamaurya768">Github <i class="ri-github-line">  </i>  </a> </li>
            </ul>
           </div>    
        </div>
        <div class="footer-bottom">
            <p> Developer Shivam Maurya | Designer Shivam Maurya | &copy; 2026 Basic Seve. All rights reserved.</p>
        </div>
    </footer>
    <script src="script/script.js"></script>
    <script>
//profile deatils show and hide
    


//service info
let serviceInfo = document.getElementById("service-info");
let closeBtn = document.getElementById("close-btn");
let serviceBoxes = document.getElementById("service_proviode");
function showServiceInfo(imgSrc, title, description, providerName, providerPhone, providerEmail, providerAddress) {
    let img=document.getElementById("service-image");
    let serviceTitle=document.getElementById("service-name");
    let serviceDescription=document.getElementById("service-description");
    img.src = imgSrc;
    serviceTitle.innerText = title;
    serviceDescription.innerText = description;
    serviceInfo.style.display = "block";
    serviceBoxes.style.position = "absolute";
}
closeBtn.addEventListener("click", function() {
    serviceInfo.style.display = "none";
    serviceBoxes.style.position = "static";
});

</script>
</body>
</html>