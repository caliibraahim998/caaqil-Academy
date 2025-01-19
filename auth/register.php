<!DOCTYPE html>
<html>
<head>
	<title>Animated Login Form</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<img class="wave" src="img/wave.png">
	<div class="container">
		<div class="img">
			<img src="img/bg.svg">
		</div>
		<div class="login-content">
		<div id="alert" style="display: none;"  class="alert"><h1>sucess</h1></div>

			<form  method="post" id="RegForm">
				<img src="img/avatar.svg">
				<h2 class="title">Welcome</h2>
           		<div class="input-div one">
           		   <div class="i"><i class="fas fa-user"></i> </div>
           		   <div class="div">
           		   		<h5>Username</h5>
           		   		<input type="text" class="input" name="user_name" id="user_name">
           		   </div>
           		</div>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-envelope"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Email</h5>
           		   		<input type="email" class="input"  name="email" id="email">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" class="input"  name="password" id="password">
            	   </div>
            	</div>
           		<div class="input-div pass">
           		   <div class="i"> <i class="fas fa-lock"></i></div>
           		   <div class="div">
           		    	<h5>Comfirm Password</h5>
           		    	<input type="password" class="input"  name="cPassword" id="cPassword">
            	   </div>
            	</div>
            	<button type="submit" class="btn">Register</button>
                <p style="display:flex; justify-content:space-between; align-items:center;">if you Have an Acount  <a href="index.php">LoGin Now</a></p>
            </form>
        </div>
    </div>

    <script type="text/javascript" src="js/main.js"></script>
	<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<script src="js/app.js"></script>
</body>
</html>
