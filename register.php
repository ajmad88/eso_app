<?php
session_start();

include_once 'db_connect.php';

if(isset($_POST['reg_bttn'])){
  $role = "user";
  $username = $_POST['username'];
  $password = $_POST['password'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $platform = $_POST['platform'];
  $gender = $_POST['gender'];
  $age = $_POST['age'];


  if($row = $crud->createUser($role, $username, $password, $fname, $lname, $email, $platform, $gender, $age)){
    echo "<div align='center' style='background:#7f7f7f; background:rgba(0,0,0,0.85); padding:10px;'><h2 style='color:#cc8900;font-family:Planewalker;'>User Sucessfully Created!!!</h2></div>";
  }
}
?>
<!DOCTYPE html>
<html class="full" lang="en">
<!-- Make sure the <html> tag is set to the .full CSS class. Change the background image in the full.css file. -->


<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Eso Armor Companion</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- <script type="text/javascript" src="/js/passtest.js"></script> -->
    <!-- Custom CSS -->
    <link href="css/the-big-picture.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<script>
  function checkPass()
  {
      //Store the password field objects into variables ...
      var pass1 = document.getElementById('pass1');
      var pass2 = document.getElementById('pass2');
      //Store the Confimation Message Object ...
      var message = document.getElementById('confirmMessage');
      //Set the colors we will be using ...
      var goodColor = "#66cc66";
      var badColor = "#ff6666";
      //Compare the values in the password field
      //and the confirmation field
      if(pass1.value == pass2.value)
      {
          //The passwords match.
          //Set the color to the good color and inform
          //the user that they have entered the correct password
          pass2.style.backgroundColor = goodColor;
          message.style.color = goodColor;
          message.innerHTML = "Passwords Match!"
      }
      else
      {
          //The passwords do not match.
          //Set the color to the bad color and
          //notify the user.
          pass2.style.backgroundColor = badColor;
          message.style.color = badColor;
          message.innerHTML = "Passwords Do Not Match!"
      }
  }
</script>
<body>
      <!-- Page Content -->
    <div class="container">
        <div class="row">
          <div>
            <!-- Modal Content -->
            <center>
            <form class="modal-content animate" method="post">
              <div>
                <h2>REGISTER ACCOUNT</h2>
              </div>
              <div>
                <label><b>Username</b></label></br>
                <input type="text" name="username"  required>
              </br></br>
                <label for="pass1"><b>Password</b></label></br>
                <input type="password" name="password" id="pass1" required>
              </br></br>
                <label for="pass2"><b>Confirm Password</b></label></br>
                <input type="password" name="confpassword" id="pass2" onkeyup="checkPass(); return false;"></br>
                <span id="confirmMessage" ></span>
              </br></br>
                <label><b>Firstname</b></label></br>
                <input type="text" name="fname" required>
              </br></br>
                <label><b>Lastname</b></label></br>
                <input type="text" name="lname" required>
              </br></br>
                <label><b>Email</b></label></br>
                <input type="text" name="email" required>
              </br></br>
                <label><b>Age</b></label></br>
                <input type="text" name="age" required>
              </br></br>
                <label><b>gender</b></label></br>
                <select name="gender" required>
                  <option selected disabled>gender</option>
                  <option name="gender" value="male">Male</option>
                  <option name="gender" value="fmale">Female</option>
                  <option name="gender" value="n/a">Prefer not to say</option>
                </select>
              </br></br>
                <label><b>Platform</b></label></br>
                <input type="radio" name="platform" value="xbone"/>Xbox One
                <input type="radio" name="platform" value="ps4"/>Playstation 4
                <input type="radio" name="platform" value="pc"/>PC
              </br></br>
                <button class="cancelbtn" type="submit" name="reg_bttn">Register</button>
                <button type="button"><a href="index.php">Back Home</a></button></br>
              </div></br>
            </form>
          </center>
          </div>
        </div>
        <!-- /.row -->
    </div>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
