<?php
  include_once'db_connect.php';
  session_start();
  if(isset($_POST['login_bttn'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $row = $crud->getUser($username, $password);

    if($row['username'] == $username){
      $_SESSION['sess_user'] = $row['username'];
      $_SESSION['sess_role'] = $row['role'];


      if($_SESSION['sess_role'] == "user")
      {
        header("Location: index.php");
      }
      if($_SESSION['sess_role'] == "admin")
      {
        header("Location: admin/adminhome.php");
      }
      if($_SESSION['sess_role'] == "super admin")
      {
        header("Location: suadmin/suadminhome.php");
      }
    }
    else {
      echo("Invalid Login Credentials...");
    }
  }
  if(isset($_SESSION['sess_role'])){
      include 'navbarlgdin.php';
    }else{
      include 'navbar.php';
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

    <!-- Custom CSS -->
    <link href="css/the-big-picture.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
  <body>

  
      <!-- Page Content -->
      <div class="container" style="background:#7f7f7f; background:rgba(0,0,0,0.85); padding:10px;">
        <?php $crud->viewArmorPage(); ?>
      </div>
  </body>
</html>

    </div>
    <!-- /.container -->
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
