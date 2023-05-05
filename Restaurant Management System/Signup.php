<?php
require_once "Config1.php";
$UsernameErr=$emailErr=$passwordErr=$cpasswordErr="";
$Username=$email=$password=$conpassword="";
if($_SERVER["REQUEST_METHOD"]=="POST") {
    if(empty(input($_POST["username"]))){
        $UsernameErr="Enter the Username";
    }
    elseif(!preg_match('/^[a-zA-Z]+$/',trim($_POST["username"]))){
      $nameErr="Only letters and white space allowed";
    }
    else{
      $sql="SELECT id FROM user WHERE username=?";
      if($stmt=mysqli_prepare($conn,$sql)){
          mysqli_stmt_bind_param($stmt,"s",$param_username);
          $param_username=trim($_POST["username"]);
          if(mysqli_stmt_execute($stmt)){
              mysqli_stmt_store_result($stmt);
              if(mysqli_stmt_num_rows($stmt)==1){
                  $UsernameErr="This username is already taken";
              }
              else{
                  $Username=trim($_POST["username"]);
              }
          }
          else{
              echo "Please try again later";
          }
      }
  }
    if(empty($_POST["email"])) {
    $emailErr="Enter the E-mail";
} 
else {
    $email=input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $emailErr="Invalid email format";
        }
    }
    if(empty(input($_POST["password"]))){
      $passwordErr="Please enter a password";     
    }
    elseif(strlen(input($_POST["password"]))<6){
        $passwordErr="Password must have atleast 6 characters.";
    }
    else{
        $password = input($_POST["password"]);
    }
if(empty(input($_POST["cpassword"]))){
    $cpasswordErr="Please enter confirm password.";     
}
else{
    $conpassword=input($_POST["cpassword"]);
    if(empty($passwordErr)&&($password!=$conpassword)){
        $cpasswordErr = "Password did not match.";
        }
    }
    if(isset($_POST['submit'])){
      if($UsernameErr=="" && $emailErr=="" && $passwordErr=="" ){
        $sql="INSERT INTO user(username,email,password)VALUES(?,?, ?)";
        if($stmt = mysqli_prepare($conn, $sql)){
            mysqli_stmt_bind_param($stmt,"sss",$param_username,$param_email,$param_password);
            $param_username=$Username;
            $param_email=$email;
            $param_password=$password;
            if(mysqli_stmt_execute($stmt)){
                header("location:ulogin.php");
            }
            else{
                echo "Please try again later";
            }
        }
    }
      }
}
    function input($data) {
      $data=trim($data);
      $data=stripslashes($data);
      $data=htmlspecialchars($data);
      return $data;
    }
?>
<!DOCTYPE html>
<html>
  <head>
  <style>
    body {
    background-image:url('loginimg4.jpg');
    background-size:100%;
    margin-bottom:10px;
    margin-top:15px;
    font-family: Assistant, sans-serif;
}
#form{
    width:300px;
    margin:6vh auto 0 auto;
    background: #134E5E; 
    background: -webkit-linear-gradient(to right, #71B280, #134E5E);
    background: linear-gradient(to right, #71B280, #134E5E); 
    border-radius:5px;
    padding:30px;
}
#form button{
    background-color:rgb(5, 48, 57);
    color:white;
    font-family:Verdana, Geneva, Tahoma, sans-serif;
    border: 1px solid rgb(5, 48, 57) ;
    padding:10px;
    margin:20px 0px;
    border-radius:8px;
    cursor:pointer;
    font-size:15px;
    width:100%;
}
h2 {
    text-align: center;
    font-family:Verdana, Geneva, Tahoma, sans-serif;
}
.input-group {
    display:flex;
    flex-direction:column; 
    margin-bottom: 10px;
    font-family:Verdana, Geneva, Tahoma, sans-serif;
}
.input-group input{
    border-radius:5px;
    font-size:15px;
    margin-top:5px;
    padding:10px;
    border:1px solid whitesmoke;
}
.input-group input:focus{
    outline:0;
}
.input-group.error{
    color:rgb(242,18,18);
    font-size:16px;
    margin-top:5px;
}
.input-group.success input{
    border-color:#0cc477;

}
.input-group.error input{
    border-color:rgb(206,67,67);
    
}
  </style>
  </head>
  <body>
    <div class="container">
    <form id="form" method="post" action="Signup.php">
        <h2>Sign Up</h2>
        <div class="input-group">
        <span class="error"><?php echo $UsernameErr;?></span> 
          <label for="username">Username</label>
          <input type="text" id="username" name="username">
          <div class="error"></div>
        </div>
        <div class="input-group">
        <span class="error"><?php echo $emailErr;?> </span>
          <label for="email">E-mail</label>
          <input type="text" id="email" name="email">
          <div class="error"></div>
        </div>
        <div class="input-group">
        <span class="error"><?php echo $passwordErr;?> </span>
          <label for="password">Password</label>
          <input type="password" id="password" name="password">
          <div class="error"></div>
        </div>
        <div class="input-group">
        <span class="error"><?php echo $cpasswordErr;?> </span>
          <label for="password">Confirm password</label>
          <input type="password" id="cpassword" name="cpassword">
          <div class="error"></div>
        </div>
        <button type="submit" name="submit">Sign Up</button>
        
      </form>
    </div>
  </body>
</html>
