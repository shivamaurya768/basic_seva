
let img1 = document.getElementById("img1");
let img2 = document.getElementById("img2");
let img3 = document.getElementById("img3");

let arr_imgs = [
  "image/im1.jpeg",
  "image/im2.jpeg",
  "image/im3.jpeg",
  "image/im4.jpg",
  "image/im5.jpg",
  "image/im6.jpg",
  "image/im7.jpg",
  "image/im8.jpg",
  "image/im9.jpg",
  "image/im10.jpeg"
];

let index = 0;

function autoSlide(){
  img1.src = arr_imgs[index % arr_imgs.length];
  img2.src = arr_imgs[(index + 1) % arr_imgs.length];
  img3.src = arr_imgs[(index + 2) % arr_imgs.length];

  index++; // move slider forward by 1
}
setInterval(autoSlide, 2000);
//display the menu on click of hamburger icon
let menumcon = document.getElementById("menuIcon");
let navmenu = document.getElementById("tab_menu");
 function menuicon() {
    if (navmenu.style.display === "block") {
        navmenu.style.display = "none"; 
    } else {
        navmenu.style.display = "block"; 
    }
    
}
// on scroll change the background color of the navbar
let navbar = document.getElementById("menu");
let tab_menu = document.querySelectorAll(".tabs");
let res_menu=document.getElementById("tab_menu");
window.addEventListener("scroll", function() {
    if(window.scrollY > 50) {
        navbar.style.backgroundColor = "rgba(0, 0, 0, 0.8)"; // change to desired color
        res_menu.style.backgroundColor = "rgba(0, 0, 0, 0.8)"; // change to desired color
        navbar.style.boxShadow = "0 2px 10px rgba(0, 0, 0, 0.5)"; // add shadow for better visibility
        navbar.style.color = "white"; // change text color for better contrast
        // res_menu.style.display="none"; // hide the responsive menu when scrolling
        res_menu.style.color = "white"; // change text color for better contrast
        tab_menu.forEach(function(tab) {
            tab.style.color = "white"; // change text color of tabs
        });
    } else {
        navbar.style.backgroundColor = "transparent"; // reset to original color
        // res_menu.style.backgroundColor = "transparent"; // reset to original color
        navbar.style.boxShadow = "none";
        navbar.style.color = "black"; 
        res_menu.style.color = "black"; 
       tab_menu.forEach(function(tab) {
            tab.style.color = "black"; 
        });
    }   
});
// drak mode and white mode;
let darkModeBtn = document.querySelector(".ri-sun-fill");
let darkmodeRes=document.getElementById("darkmode");
let darkMode=()=> {
    let cls=darkModeBtn.className;
    if(cls=="ri-sun-fill"){
        document.body.style.backgroundColor="black";
       tab_menu.forEach(function(tab) {
            tab.style.color = "white"; // change text color of tabs
        });
        document.body.style.color="white";
        darkModeBtn.className="ri-moon-fill";
        darkmodeRes.className="ri-moon-fill";
    }else{
        document.body.style.backgroundColor="white";
        document.body.style.color="black";
        darkModeBtn.className="ri-sun-fill";
        darkmodeRes.className="ri-sun-fill";                
            tab_menu.forEach(function(tab) {
            tab.style.color = "black"; // change text color of tabs
        });
    }
};

darkModeBtn.addEventListener("click",darkMode)
darkmodeRes.addEventListener("click",darkMode)

let profilePic=document.querySelector("#profilePic");
let profileView=document.querySelector("#profile-view-edit");
let profileTab=document.querySelector("#profileTab");
function toggleProfileView(){
    if(profileView.style.display === "flex"){
        profileView.style.display="none"
    }
    else{
        profileView.style.display="flex"
    }
    
}
profilePic.addEventListener("click",toggleProfileView);
profileTab.addEventListener("click",toggleProfileView);

let editbtn=document.getElementById("Editbtn");
let editProfile=document.getElementById("profile-edit");
let profileContent=document.getElementById("profile-view");
let editI=document.querySelector("#edit");
editbtn.addEventListener('click',function(){
        if(editProfile.style.display=="none"){
            editProfile.style.display="flex";
            profileContent.style.display="None";
            editI.className="ri-account-box-2-fill";
            
        }
        else{
            editProfile.style.display="none";
            profileContent.style.display="block";
            editI.className="ri-pencil-ai-fill";
        }
});
// get location for api 
let address =document.getElementById("address");
let asd=document.getElementById("adrs");
 let url="https://api.opencagedata.com/geocode/v1/json"
 let key="97626fb41446429b9978dc1b3e17e4ba";
function getLocation(lat,lon){
    let url=`https://api.opencagedata.com/geocode/v1/json?key=${key}&q=${lat}+${lon}&pretty=1&no_annotations=1`
    fetch(url)
    .then(response => response.json())
    .then(data => {
        // actual data is in data.results[0].formatted
        address.value = data.results[0].formatted; // Set the address value in the input field
        asd.textContent = "Your address: " + data.results[0].formatted; // Update the address display

    });
}

navigator.geolocation.watchPosition((position) =>{
    getLocation(position.coords.latitude,position.coords.longitude);
},(error)=>{
    console.log(error.message);
});

// Employee add js
// Hamburger / sidebar toggle
  

  // Nav active state
  document.querySelectorAll('.nav-item').forEach(item => {
    item.addEventListener('click', function(e) {
      e.preventDefault();
      document.querySelectorAll('.nav-item').forEach(i => i.classList.remove('active'));
      this.classList.add('active');
      if (window.innerWidth <= 768) {
        sidebar.classList.remove('open');
        overlay.classList.remove('open');
      }
    });
  });
  