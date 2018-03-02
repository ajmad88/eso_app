
<?php
// START THE SESSION
session_start();
include_once '../db_connect.php';
// CHECK IF ADMIN LOGGED IN
if(isset($_SESSION['sess_role']) != 'admin')
{
  header("Location: ../login.php");
}
// ASSIGN VALUES TO VARIABLES
if(isset($_POST['add_bttn']))
{
  $armor_name = $_POST['armname'];
  $armor_type = $_POST['armtype'];
  $armor_origin = $_POST['armorigin'];
  $zone_name = $_POST['zonename'];
  $two = $_POST['2item'];
  $three = $_POST['3item'];
  $four = $_POST['4item'];
  $five = $_POST['5item'];
  // SEND TO CRUD.PHP
  if($crud->addArmor($armor_name, $armor_type, $armor_origin, $zone_name, $two, $three, $four, $five))
  {
    echo "<div align='center' style='background:#7f7f7f; background:rgba(0,0,0,0.85); padding:10px;'><h2 style='color:#cc8900;font-family:Planewalker;'>Armor Successfully Added!!!</h2></div>";
  }
}
include 'adminnav.php';
 ?>

 <!DOCTYPE hmtl>
 <html class="full" lang="en">
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
     <style>
     td{
       padding: 5px;
       color:#cc8900;
       font-family: Planewalker;
     }

     </style>
 </head>
 <body>
       <!-- Page Content -->
     <div class="container">
         <div class="row">
           <center>
             <div class="content" style="background:#7f7f7f; background:rgba(0,0,0,0.85); padding:10px;">
              <form method="post" enctype="multipart/form-data">
       	<fieldset>
                <table border="0" align="center" style="padding: 25px;">
       	 <legend style='color:#cc8900; font-family: Planewalker'>Add Armor Data
                  <tr>
                    <td>
                      Armor Name:
                    </td>
                    <td>
                      <input type="text" name="armname">
                    </td>
                  </tr>
                  <tr>
                    <td>
                      Armor Type:
                    </td>
                    <td>
                      <input type="text" name="armtype">
                    </td>
                  <tr>
                    <td>
                      Armor Origin:
                    </td>
                    <td>
                      <input type="text" name="armorigin">
                    </td>
                  </tr>
                  <tr>
                    <td>
                      Zone Name:
                    </td>
                    <td>
                      <input type="text" name="zonename">
                    </td
                  </tr>
                  <tr>
                    <td>
                      2 Item Bonus:
                    </td>
                    <td>
                      <input type="text" name="2item">
                    </td>
                   </tr>
                   <tr>
                     <td>
                       3 Item Bonus:
                     </td>
                     <td>
                       <input type="text" name="3item">
                     </td>
                    </tr>
                    <tr>
                      <td>
                        4 Item Bonus:
                      </td>
                      <td>
                        <input type="text" name="4item">
                      </td>
                     </tr>
                     <tr>
                       <td>
                         5 Item Bonus:
                       </td>
                       <td>
                         <input type="text" name="5item">
                       </td>
                      </tr>
                   <tr>
                     <td>
                     </td>
                     <td>
                       <button type="submit" name="add_bttn">Submit</button>
                     </td>
                   </tr>
       	   </legend>
                 </table>
       	  </fieldset>
                </form>
              </div>

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
