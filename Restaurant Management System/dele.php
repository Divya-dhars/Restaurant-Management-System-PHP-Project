<?php
require_once("Config1.php");
session_start();
$foodnameErr="";
$email=$_SESSION['email'];
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $foodname=$_POST["foodname"];
    if (isset($_POST['delete'])) {
        if(!empty($foodname)){
            $sql="DELETE FROM orders WHERE foodname='$foodname' AND  email='$email'";
            if($conn->query($sql)===TRUE){
                echo "<script>alert('Deleted Successfully')</script>";
            } 
            else{
                echo "<script>alert('Error')</script>";
            }
        }
        else{
            $foodnameErr="Enter the food name";
        }
    }
    else if(isset($_POST['back'])){
        header("Location: Order.php");
    }
    mysqli_close($conn);
}
?>
<!DOCTYPE HTML>
<html>
    <head>
    <style>
        body{
        background-image:url('baimg1.jpg');
     }
            #form{
    width:550px;	
	height:150px;
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
    width:30%;
}
button{
    background-color:rgb(5, 48, 57);
    color:white;
    font-family:Verdana, Geneva, Tahoma, sans-serif;
    border: 1px solid rgb(5, 48, 57);
    padding:10px;
    margin:15px 0px;
    border-radius:8px;
    cursor:pointer;
    font-size:15px;
    width:30%;
    position:center;
    
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
    text-decoration:none;
    color:white;
}
</style>
    </head>
 <body>
 <form  id="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
 <div class="loader" style="display:none;"></div>
		<div class="input-group">
		  <label for="foodname">Food Name</label>
		  <input type="text" id="foodname" name="foodname"><br>
          <span class="error"><?php echo $foodnameErr;?> </span>
        </div>
        <div class="input-group">
        <pre><button type="submit" name="delete">Cancel Order</button>              <button class="myButton" value="back"><a href="Order.php">Back</a></button></pre>
        </div>
</form>
 </body>
</html>


