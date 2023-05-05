<?php
require_once("Config1.php");
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<script>
    function showUserInfo(){
        var modal=document.getElementById("user-info-modal");
        modal.style.display="block";
    }
</script>
	<title>Restaurant Homepage</title>
	<style>
		body {
			margin: 5px;
			padding: 10px;
			font-family:'Arial',sans-serif;
			background-color: #f2f2f2;
		}
		h1 {
			margin: 0;
			font-size: 36px;
			color: #333;
            text-align:center;
		}
        header {
			background-color: #e1eced;
			padding: 20px;
			box-shadow: 0 2px 5px rgba(24, 7, 175, 0.1);
			font-family:Verdana, Geneva, Tahoma, sans-serif;
		}
		nav {
			display: flex;
			justify-content: center;
			align-items: center;
			background-color: #20024b8b; 
			padding: 10px;
			margin:0px 0px;
		}
		nav a {
			color: #fff;
			text-decoration: none;
			padding: 10px 20px;
			font-family:Verdana, Geneva, Tahoma, sans-serif;
			margin: 0 10px;
			font-size: 18px;
		}
		nav a:hover {
			background-color: #eae8ebf6;
			color: #3a042f;
			border-radius: 5px;
		}
		section {
			display: flex;
			flex-direction: column;
			justify-content: center;
			align-items: center;
			margin: 50px;
			text-align: center;
		}
		section h2 {
			font-size: 28px;
			margin-bottom: 20px;
		}
		section img {
			max-width: 100%;
			height: auto;
			margin-bottom: 20px;
		}
		#user-info-modal{
          display:none;
          position:absolute;
          top:50%;
          left:50%;
          transform:translate(-50%,-50%);
          background-color:#fff;
          padding:20px;
          border: 1px solid #333;
       }
    #user-info-modal h2 {
      margin-top:0;
    }
    #user-info-modal{
      margin:0;
    }
		footer {
			background-color: #333;
			color: #fff;
			text-align: center;
			padding:10px;

		}
	</style>
</head>
<body>
    <header>
	  <h1>Delicious Restaurant</h1>
    </header>
	<nav>
		<a href="Main.php">Home</a>
		<a href="menu.php">Menu</a>
		<a href="Contact.html">Contact Us</a>
        <a href=ulogin.php>Logout</a>
		<ul><a href="#" onclick="showUserInfo()">User</a></li></ul>
	</nav>
	<div id="user-info-modal">
          <h2>User Info</h2>
          <p>Name:<?php echo htmlspecialchars($_SESSION['Username']); ?></p>
          <p>Email:<?php echo htmlspecialchars($_SESSION['email']); ?></p>
        </div>
	<section>
		<h2>Welcome to Delicious Restaurant</h2>
		<img src="Mimg2.jpg" height="50%" width="100%" background-repeat="no-repeat" ></img>
	</section>
	<footer>
		<p>&copy; 2023 Delicious Restaurant. All rights reserved.</p>
	</footer>
</body>
</html>