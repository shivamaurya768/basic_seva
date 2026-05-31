        <div id="menu">                 
                <ul class="tab" id="tab_desktop">
                    <li class="tab"><a href="#parsone" class="tabs"><i class="ri-home-line"></i> HOME</a> </li>
                    <li class="tab"><a href="#service_proviode" class="tabs"><i class="ri-service-line"></i> SERVICES</a></li>
                    <li class="tab"><a href="#about" class="tabs"><i class="ri-information-line"></i> ABOUT</a></li>
                    <li class="tab"><a href="#contact" class="tabs"><i class="ri-phone-line"></i> CONTACT</a></li>
                    <li class="tab"><a href="#" class="tabs" ><i class="ri-user-line"></i> PROFILE</a></li>
                    <li class="tab" id="profileTab"><a href="#" class="tabs" ><i class="ri-sun-fill"></i></a></li>
                    <?php 
                      
                      if(isset($_SESSION['username'])) {
                        echo '<li class="tab"><a href="logout.php" class="tabs"> <button style="display:inline">LOGOUT</button> </a></li>';
                      }else{
                        echo '<li class="tab"><a href="login_page.php"  class="tabs"> <button style="display:inline">LOGIN</button> </a></li>';
                      } 
                    ?>
                    <li calss="tab"><div id="serviceSearch"><input type="text" placeholder="Search services..."><button><i class="ri-search-line"></i></button></div></li>
                </ul>
            <div id="phone_menu">
                <i class="ri-menu-line" id="menuIcon" onclick="menuicon()" >
                    <ul class="tab" id="tab_menu">
                    <li class="tab"><a href="#parsone" class="tabs">HOME</a> </li>
                    <li class="tab"><a href="#service_proviode" class="tabs">SERVICES</a></li>
                    <li class="tab"><a href="#about" class="tabs">ABOUT</a></li>
                    <li class="tab"><a href="#contact" class="tabs">CONTACT</a></li>
                    <li class="tab"><a href="#" class="tabs" id="profileTab">PROFILE</a></li>
                    <?php 
                      
                      if(isset($_SESSION['username'])) {
                        echo '<li class="tab"><a href="logout.php" class="tabs"> <button>LOGOUT</button> </a></li>';
                      }else{
                        echo '<li class="tab"><a href="login_page.php" target="_blank" class="tabs"> <button>LOGIN</button> </a></li>';
                      }
                    ?>
                    <div><i class="ri-sun-fill" id="darkmode"></i></div>
                    </ul>
                </i>

            </div>
        </div>

                   