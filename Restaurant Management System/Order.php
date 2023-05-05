<?php
require_once("Config1.php");
session_start();
$Username=$email=$foodname=$price=$quantity=$quantityErr="";
if($_SERVER["REQUEST_METHOD"] =="POST"){
	$Username=$_SESSION["Username"];
	$email=$_SESSION["email"];
	$foodname=$_POST["foodname"];
	$price=$_POST["price"];
	$quantity=$_POST["quantity"];
	if(empty($quantity)){
		$quantityErr="Please enter a quantity";
	}
	else{
		$quantity=$_POST["quantity"];
	}
	if($quantityErr==""){
		if(isset($_POST['submit'])){
			   $sql="INSERT INTO orders(Username,email,Foodname,price,quantity) VALUES('$Username','$email','$foodname','$price','$quantity')";
			   if(mysqli_query($conn,$sql)){
				echo "<script>alert('Your Order Placed Successfully')</script>";
			   }
			   else{
				$stmt->error;
			   }
			}
		}
	}	
?>
<!DOCTYPE html>
<html>
<head>
		<style>
		body {
        margin-bottom:10px;
        margin-top:15px;
		background-image: url('baimg1.jpg');
        font-family: Assistant,sans-serif;
    }
header {
	background-color: #e1eced;
	padding: 20px;
	box-shadow: 0 2px 5px rgba(24, 7, 175, 0.1);
	font-family:Verdana, Geneva, Tahoma, sans-serif;
    text-align:center;
    width:100%;   
	}
nav {
	display: flex;
	justify-content: center;
    align-items: center;
	background-color: #20024b8b;
	padding: 10px;
    width:1512px;
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
#form{
    width:550px;	
	height:500px;
    margin:6vh auto 0 auto;
	background: #093028; 
    background: -webkit-linear-gradient(to right, #237A57, #093028);  
    background: linear-gradient(to right, #237A57, #093028); 
    border-radius:5px;
    padding:30px;
}
#form button{
    background-color:rgb(5, 48, 57);
    color:white;
    font-family:Verdana, Geneva, Tahoma, sans-serif;
    border: 1px solid rgb(5, 48, 57) ;
    padding:10px;
    margin:15px 0px;
    border-radius:8px;
    cursor:pointer;
    font-size:15px;
    width:40%;
}
h2 {
    text-align: center;
    font-family:Verdana, Geneva, Tahoma, sans-serif;
}
.input-group {
    display:flex;
    flex-direction:column; 
    margin-bottom: 5px;
	width:500px;
    font-family:Verdana, Geneva, Tahoma, sans-serif;
}
.input-group input{
    border-radius:5px;
    font-size:15px;
    margin-top:5px;
    padding:10px;
    border:1px solid whitesmoke;
}
a{
	text-decoration: none;
	color: white;
}
</style>
</head>
<body>
<header>
    <h1>Food Order</h1>
    </header>
        <nav>
            <a href="Main.php">Home</a>
            <a href="Menu.php">Menu</a>
            <a href="Contact.html">Contact Us</a>
			<a href=ulogin.php>Logout</a>
        </nav>
	 <div class="container">
	<form  id="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
	<div class="order-form">
		<div class="order-item">
		</div>
	</div>
		<div class="input-group">
		  <label for="Username">Customer Name</label>
		  <input type="text" id="Username" name="Username" value="<?php echo $Username; ?>" ><br>
        </div>
		<div class="input-group">
		  <label for="email">Email</label>
		  <input type="text" id="email" name="email" value="<?php echo $email; ?>" readonly><br>
        </div>
		<div class="input-group">
		  <label for="Foodname">Food name</label>
		  <input type="text" id="Foodname" name="foodname" value="<?php echo $foodname; ?>" readonly><br>
        </div>
		<div class="input-group">
		 <label for="price">Price</label>
	     <input type="text" id="price" name="price" value="<?php echo $price; ?>" readonly><br>
        </div>
		<div class="input-group">
		  <label for="quantity">Quantity</label>
	      <input type="text" id="quantity" name="quantity" value="<?php echo $quantity; ?>"><br>
		  <span class="error"><?php echo $quantityErr;?> </span>
        </div>
		<button type="submit" name="submit">Order</button>
</form>
</div>
</body>
</html>