<!doctype html>
<html>
<head>
	<style>
        body {
			background-image:url('grill6.jpg');
			background-size: 100%;
			background-repeat: no-repeat;
		}
       header {
	background-color: #e1eced;
	padding: 20px;
	box-shadow: 0 2px 5px rgba(24, 7, 175, 0.1);
	font-family:Verdana, Geneva, Tahoma, sans-serif;
    text-align:center;
    width:100%;   
	}
	h2 {
	text-align: center;
    font-family:Verdana, Geneva, Tahoma, sans-serif;
}
nav {
	display: flex;
	justify-content:flex-start;
    align-items: center;
	background-color: #20024b8b;
	padding: 10px;
    width:1532px;
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
	#cus {
		border-collapse: collapse;
		margin-left: 250px;
		width: 70%;
	}
	#cus td,#cus th {
		border:1px solid #ddd;
		padding:8px;
		font-family:Verdana, Geneva, Tahoma, sans-serif;
		text-align: center;
	}
	#cus tr:nth-child(even){
		background-color: #ddd;
	}
	#cus th {
       padding-top:12px;
	   padding-bottom: 12px;
	   text-align: center;
	   background-color: #04AA6D;
	   color:black;
	}
	 </style>
</head>
<body>
	<div class="container">
		<header>
		  <h1>Restaurant Management System - Admin Page</h1>
        </header>
		<nav>
            <a href="admin.php">Orders</a>
            <a href="Aduser.php">User</a>
			<a href=ulogin.php>Logout</a>
        </nav><br><br>
		<div class="orders">
					<?php
						require_once("Config1.php");
						$sql = "select * from orders";
						if($result = mysqli_query($conn, $sql)){
						if (mysqli_num_rows($result) > 0) {
							echo "<table border='1' id='cus'>";
                            echo  "<tr>";
							echo "<th>Order id</th>";
							echo "<th>Username</th>";
							echo "<th>Foodname</th>";
							echo "<th>Price</th>";
							echo "<th>Quantity</th>";
						    echo "</tr>";
							while ($row = mysqli_fetch_assoc($result)) { 
								echo "<tr>";
								echo "<td>" .$row["id"]."</td>";
								echo "<td>" .$row["Username"]."</td>";
								echo "<td>" .$row["Foodname"]."</td>";
								echo "<td>" .$row["price"]*$row["quantity"]."</td>";
								echo "<td>" .$row["quantity"]."</td>";
								echo "</tr>";
							}
							echo "</table>";
						} else {
							echo "<tr><td colspan='4'>No orders found.</td></tr>";
						}
					}
				
						mysqli_close($conn);
					?>
			</table>
		</div>
	</div>
</body>
</html>