<?php
require_once("Config1.php");
session_start();
if($_SERVER["REQUEST_METHOD"] =="POST"){
    $Username=$_SESSION['Username'];
    $email=$_SESSION['email'];
    echo $Username;
    echo $email;
}
$usernameErr=$passwordErr="";
$username=$password="";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(empty(trim($_POST["Username"]))){
        $usernameErr="Please enter a username";
    }
    else{
        $Username=$_POST["Username"];
    }
    if(empty(trim($_POST["email"]))){
        $emailErr="Please enter a email";
    }
    else{
        $email=$_POST["email"];
    }
    if(empty(trim($_POST["password"]))){
        $passwordErr="Please enter a password";
    }
    else{
        $password=$_POST["password"];
    }
    if(!empty($Username) && !empty($email) && !empty($password)){
        $sql="SELECT * FROM user WHERE email='$email' AND password='$password'";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0){
            $row=mysqli_fetch_array($result);
            if($row["default_user"]=="user"){
                $_SESSION["Username"]=$Username;
                $_SESSION["email"]=$email;
                $_SESSION["password"]=$password;
                header("location: Main.php");
            }
            else if($row["default_user"]=="admin"){
                $_SESSION["email"]=$username;
                header("location:admin.php");
            }
            else{
                echo "Invalid username or password";
            }
        }
        else{
            echo "Invalid username or password";
        }
    }
    mysqli_close($conn);
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
    <?php 
      if(!empty($login_err)){
        echo '<div class="alert alert-danger">' . $login_err . '</div>';
      }        
    ?>
    <form id="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
        <h2>Login</h2>
        <div class="input-group">
          <label for="Username">Username</label>
          <input type="text" id="Username" name="Username" class="form-control <?php echo (!empty($usernameErr)) ? 'is-invalid' : ''; ?>">
          <div class="error"></div>
        </div>
        <div class="input-group">
          <label for="email">E-mail</label>
          <input type="text" id="email" name="email" class="form-control <?php echo (!empty($emailErr)) ? 'is-invalid' : ''; ?>">
          <div class="error"></div>
        </div>
        <div class="input-group">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" class="form-control <?php echo (!empty($passwordErr)) ? 'is-invalid' : ''; ?>">
          <div class="error"></div>
        </div>
        <button type="submit" name="submit">Login</button>
        <a href="Signup.php">Create a new Account?</a>
      </form>
    </div>
  </body>
</html>