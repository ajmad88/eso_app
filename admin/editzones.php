<?php
session_start();
include_once '../db_connect.php';

if(isset($_SESSION['sess_role']) != 'suadmin')
{
  header("Location: ../login.php");
}

$id = $_GET['id'];
include 'adminnav.php';
?>
<!DOCTYPE html>
<html class="full">
<head>

   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="description" content="">
   <meta name="author" content="">

   <title>Eso Armor Companion</title>

   <!-- Bootstrap Core CSS -->
   <link href="../css/bootstrap.min.css" rel="stylesheet">

   <!-- Custom CSS -->
   <link href="../css/the-big-picture.css" rel="stylesheet">

</head>
<body>
     <!-- Page Content -->
   <div class="container">
       <div class="row">
         <center>
           <?php $crud->editZones(); ?>
         </center>
       </div>
       <!-- /.row -->
   </div>
<?php if(isset($_POST['submit']))
{

  $zonename = $_POST['zname'];
  $zdesc = $_POST['zdesc'];
  $zmap = $_POST['filename'];
  $faction = $_POST['fname'];
  $crud->updateZones($zonename, $zdesc, $zmap, $faction);
}
?>
   <!-- jQuery -->
   <script src="../js/jquery.js"></script>

   <!-- Bootstrap Core JavaScript -->
   <script src="../js/bootstrap.min.js"></script>

</body>
</html>
