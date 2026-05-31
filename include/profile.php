<div id="profile-status">
                <div id="profile-pic">
                        <?php
                            if(isset($_SESSION['username'])){
                            // Fetch image from database
                                $query = $conn->prepare("SELECT image_profile FROM logins WHERE username=?");
                                $query->execute([$_SESSION['username']]);
                                $result = $query->fetch(PDO::FETCH_ASSOC);
                            }
                            if(isset($_SESSION['image'])) {
                                echo '<div id="profilePic"><img src="'.'uploads/' . $_SESSION['image'] . '" alt="Profile Picture"><span id="username">' .'Welcome, ' . $_SESSION['name'] . '</span>'.'</div>';
                            }elseif(!empty($result['image_profile'])) {
                                    echo '<div id="profilePic"><img src="uploads/' . $result['image_profile'] . '" alt="Profile Picture"><span id="username">' .'Welcome, ' . $_SESSION['name'] . '</span>'.'</div>';
                            }
                             else {
                                echo '<div id="profilePic"><img src="image/profile.jpg" alt="" ></div>';
                            }
                        ?>
                        <!-- <a href="edit_profile.php"><button id="editProfileBtn"><i class="ri-edit-line"></i></button></a> -->
                        <p>Book And Manage Your Services</p>
                    </div>
                    <div id="notification">
                        <h1><i class="ri-notification-line"></i></h1>
                        <div id="notificationCount"></div>
                    </div>                   
            </div>