<!DOCTYPE HTML>
<html>
    <head>
        <script>
            $(document).ready(function() {
  // Make an AJAX call to get the user details from the server
            $.get('Main.php', function(data) {
    // Parse the response JSON to get the user details
            var userDetails = JSON.parse(data);
    // Update the username element in the dropdown menu with the user's name
         $('#username').text(userDetails.username);
  });
});
</script>

        <style>
            .dropdown {
  position: relative;
  display: inline-block;
}

.dropbtn {
  font-size: 16px;
  border: none;
  outline: none;
  color: white;
  background-color: inherit;
  margin: 0;
  padding: 0;
}

.dropdown-content {
  display: none;
  position: absolute;
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown:hover .dropdown-content {
  display: block;
}

#username {
  font-weight: bold;
}
</style>
    </head>
    <body>
    <nav>
  <ul>
    <li><a href="#">Home</a></li>
    <li><a href="#">About</a></li>
    <li class="dropdown">
      <a href="#" class="dropbtn">User</a>
      <div class="dropdown-content">
        <span id="username"></span>
        <a href="#">Profile</a>
        <a href="#">Settings</a>
        <a href="#">Logout</a>
      </div>
    </li>
  </ul>
</nav>
</body>
</html>

<?php
session_start();

// Check if user is logged in
if (isset($_SESSION['username'])) {
  // Get the user details from the session variable
  $username = $_SESSION['username'];
  // Echo the user details as JSON
  echo json_encode(array('username' => $username));
} else {
  // Redirect to the login page if user is not logged in
  header('Location: ulogin.php');
  exit();
}
?>

