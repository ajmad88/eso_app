<?php
session_start();
include_once '../db_connect.php';

if(isset($_SESSION['sess_role']) != 'suadmin')
{
  header("Location: ../login.php");
}


include 'adminnav.php';
?>
<?php if(isset($_POST['submit']))
{
  $armorname = $_POST['aname'];
  $armortype = $_POST['atype'];
  $origin = $_POST['origin'];
  $zname = $_POST['zname'];
  $b2 = $_POST['bonus2'];
  $b3 = $_POST['bonus3'];
  $b4 = $_POST['bonus4'];
  $b5 = $_POST['bonus5'];
  $crud->updateArmor($armorname, $armortype, $origin, $zname, $b2, $b3, $b4, $b5);

}
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
           <?php $crud->editArmor(); ?>
         </center>
       </div>
       <!-- /.row -->
   </div>

   <!-- jQuery -->
   <script src="../js/jquery.js"></script>

   <!-- Bootstrap Core JavaScript -->
   <script src="../js/bootstrap.min.js"></script>

</body>
</html>
