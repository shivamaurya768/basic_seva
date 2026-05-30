<?php
    require_once "db_conn.php";
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Basic Seve</title>
    <link rel="icon" href="logo.png" type="image/x-icon">
    <link rel="stylesheet" href="style_login.css">
	<link href="https://cdn.jsdelivr.net/npm/remixicon@4.8.0/fonts/remixicon.css"
  	rel="stylesheet"/>
</head>

<body>
    <h2>Login your accounts </h2>
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<div id="singup">
			<form action="" method="POST">
			<h1>Create Account</h1>
			<div id="social-container">
				<a href="#"><i class="ri-instagram-line"></i> </a>
				<a href="#"> <i class="ri-facebook-line"></i>  </a>
				<a href="#"> <i class="ri-twitter-line"></i>   </a>
				<a href="#"> <i class="ri-linkedin-line"></i>  </a>
				<a href="#"> <i class="ri-github-line">  </i>  </a>
			</div>
			<span>or use your email for registration</span>
			<input type="text" placeholder="Name" name="name" required/>
			<input type="email" placeholder="Email" name="email" required/>
			<div id="passwordContainer">
            <input type="password" placeholder="Password" name="password" class="a1" id="pass1" required/>
            <input type="checkbox" class="a2" onchange="showpass('pass1')">
			<input type="password" placeholder="Confirm Password" name="confirm_password" password required class="a1" id="pass2"/>
            <input type="checkbox" class="a2" onchange="showpass('pass2')">
            </div>
			<select name="role" id="role" required>
				<option value="">Select Role</option>
				<!-- <option value="admin">Admin</option> -->
				<option value="Employee">Employee</option>
				<option value="Customer">Customer</option>

			</select><br><br>
			<button type="submit" name="signup">sign Up </button>
		</form>
		</div>
	</div>
<!-- this is sign up area -->
 <?php
if(isset($_POST['signup'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $pass=$_POST['password'];
    $role = trim($_POST['role']);
    $password_confirm = $_POST['confirm_password'];
    if($pass !== $password_confirm) {
        echo "<script> alert('password does not match')</script>";
        exit();
    }
    if(!empty($name) && !empty($email) && !empty($_POST['password']) && !empty($role) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        try {
            $stmt = $conn->prepare("SELECT * FROM logins WHERE username=?");
            $stmt->execute([$email]);
            if($stmt->rowCount() == 0) {   
                $sql = "INSERT INTO logins(names,username,passwd,role) VALUES(?,?,?,?)";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$name,$email,$password,$role]);
                // echo "successful signup";
            } else {
                echo "<h3>Email already exists</h3>";
            }

        } catch(PDOException $e){
            echo "<h3>Database error: " . $e->getMessage() . "</h3>";
        }

    } else {
        echo "<h3>Please fill all the fields correctly</h3>";
    }
}
?>

	<div class="form-container sign-in-container">
		<div id="singin">
			<form action="" method="POST">
			<h1>Sign in</h1>
			<div id="social-container">
				<a href="#"><i class="ri-instagram-line"></i> </a>
				<a href="#"> <i class="ri-facebook-line"></i>  </a>
				<a href="#"> <i class="ri-twitter-line"></i>   </a>
				<a href="#"> <i class="ri-linkedin-line"></i>  </a>
				<a href="#"> <i class="ri-github-line">  </i>  </a>
			</div>
			<span>or use your account</span>
			<input type="email" placeholder="Email" name="email" id="username" required/>
			<input type="password" placeholder="Password" name="password" id="pass3" required/>
             <input type="checkbox" class="a2" onchange="showpass('pass3')">
			<a href="#">Forgot your password?</a>
			<button type="submit" name="login" >Sign In</button>
			<!-- onclick="validateForm()" -->
		</form>
		</div>
	</div>
	<button class="create-account">create account</button>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello, Friend!</h1>
				<p>Enter your personal details and start journey with us</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>
<!--  this is login  area -->
<?php
   
    if(isset($_POST['login'])){
        $email=trim($_POST['email']);
        $password=trim($_POST['password']);
        if(!empty($email) && !empty($password) && filter_var($email, FILTER_VALIDATE_EMAIL)){
            try{
                $stmt=$conn->prepare("SELECT * FROM logins WHERE username=?");
                $stmt->execute([$email]);
                if($stmt->rowCount() == 1){
                    $user=$stmt->fetch(PDO::FETCH_ASSOC);
                    if(password_verify($password, $user['passwd'])){
                        $_SESSION['islogin']=true;
                        $_SESSION['name']=$user['names'];
                        $_SESSION['username']=$user['username'];
                        //IF CHECK THE ROLE OF USER 
                        if($user['Role']=='Customer'){
                        header("Location: index.php");
                        }else if($user['Role']=='Employee'){
                            header("Location: employee.php");
                        }
                        // echo "successful login";
                        exit();
                    }else{
                        echo "<h3>Invalid password</h3>";
                    }
                }else{
                    echo "<h3>Invalid email</h3>";
                }
            }catch(PDOException $e){
                echo "<h3>Database error: " . $e->getMessage() . "</h3>"    ;
            }

    }
    }else{
        // echo "please fill all the fields correctly";
    }
 ?>




<footer>
	<p>
		Created with  by
		Shivam Maurya
		 Read how I created this and how you can join the challenge
		<a target="_blank" href="https://shivamaurya768.github.io/My-portfolio-/">here</a>.
	</p>
</footer> 
    <script>
		//login and signup form
const signIn = document.getElementById("signIn");
const signUp = document.getElementById("signUp");
const container = document.getElementById("container");

signUp.addEventListener("click", () => {
  container.classList.add("right-panel-active");
});

signIn.addEventListener("click", () => {
  container.classList.remove("right-panel-active");
});

console.log("JS file connected");

//reposive design for login/signup page
let signin=document.getElementById("singin");
let signup=document.getElementById("singup");
btn=document.querySelector(".create-account");
let check=btn.textContent;
console.log(check);
btn.addEventListener("click",function(){
      if(check==="Create Account"){
        signin.style.display="none";
        signup.style.display="block";
        btn.textContent="Already have an account?";
        check=btn.textContent;
      }
      else{
        signup.style.display="none";
        signin.style.display="block";
        btn.textContent="Create Account";
        check=btn.textContent;
      }    
});
let showpass=(arr)=>{
    let a=document.getElementById(arr);
    console.log(a.value);
        if(a.type==="password"){
            a.type="text";
        }
        else{
            a.type="password";
        }
}
	</script>
</body>
</html>