<?php
require_once("Config1.php");
session_start();
$foodnameErr=$quantityErr="";
$email=$_SESSION['email'];
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $foodname=$_POST["foodname"];
    $quantity=$_POST["quantity"];
    if (isset($_POST['update'])) {
        if(!empty($foodname) && !empty($quantity)){
            $sql="UPDATE orders SET quantity='$quantity' WHERE foodname='$foodname' AND email='$email';";
            if($conn->query($sql)===TRUE){
                echo "<script>alert('Updated Successfully')</script>";
            } 
            else{
                echo "<script>alert('Error')</script>";
            }
        }
        else{
            echo "<script>alert('Enter the foodname and quantity')</script>";
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <style>
     body{
        background-image:url('baimg1.jpg');
     }
    #loader {
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      display: none;
      width:20px;
      height:20px;

    }
    #form{
    width:550px;	
	  height:250px;
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
  <form id="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <div class="input-group">
      <label for="foodname">Food Name</label>
      <input type="text" id="foodname" name="foodname"><br>
      <span class="error"><?php echo $foodnameErr;?></span>
    </div>
    <div class="input-group">
      <label for="quantity">Quantity</label>
      <input type="text" id="quantity" name="quantity"><br>
      <span class="error"><?php echo $quantityErr;?></span>
    </div>
    <div class="input-group">
      <div id="back-container">
      <pre><button type="submit" name="update">Update</button>              <button id="myButton" value="back"><a href="Order.php">Back</a></button></pre>
      </div>
    </div>
  </form>
  <div id="loader">
    <img src="loader.gif" alt="loading"></div>
  <script>
  $(document).ready(function() {
      $('#loader').hide();
      $('#myButton').click(function(e) {
        e.preventDefault();
        $('#loader').show();
        $.ajax({
          url: 'loader.php',
          type: 'POST',
          data: $('#form').serialize(),
          success: function() {
            $('#loader').fadeOut(2000, function() {
              window.location.replace('Order.php');
            });
          }
        });
      });
    });
  </script>
</body>
</html>