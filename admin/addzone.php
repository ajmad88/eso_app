<?php
  if(isset($_REQUEST['submit']))
  {
    //open a new connection to the MYSQL server.
    $con = mysqli_connect("localhost","_madandj","UZEw{guy","eso_app");

    //check connection
    if(mysqli_connect_errno()) //returns the error code
    {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $zid = $_POST['zoneid'];
    $zname = $_POST['zonename'];
    $zone_map=$_POST['iname'];
    $zdesc = $_POST['description'];
    $fname = $_POST['faction'];
    $file=$_FILES["file"]["name"];
    $size=$_FILES["file"]["size"];

    //checking if image name entered and file attachtment has been done.
    if(empty($zone_map) || empty($file))
    {
      echo "<label class='err'> All fields required </label>";
    }
    //chekcing the files size maximium allowed size : 500,000 byetes(500kb)
    elseif($size > 500000)
    {
      echo "<label class='err'> Image size must not greater than 500kb</label>";
    }

    /* -- few preparations for checkin gth eifle type --*/
    //store the allowed extensions in an Array
    $allowedExts = array("gif","jpeg","jpg","png");

    /*using explode() function, separate the 'filename' and its extension inot individual elements of an array: $temp*/
    $temp = explode(".", $_FILES["file"]["name"]);

    /*The end() function returns the last element iof an array. as per array $temp, first element: file name, Last Element: Extension */
    $extension = end($temp);
    /* -- chekcing the file type (extensions)--*/
    if((($_FILES["file"]["type"] == "image/gif")
        || ($_FILES["file"]["type"] == "image/gif")
        || ($_FILES["file"]["type"] == "image/jpeg")
        || ($_FILES["file"]["type"] == "image/jpg")
        || ($_FILES["file"]["type"] == "image/pjep")
        || ($_FILES["file"]["type"] == "image/x-png")
        || ($_FILES["file"]["type"] == "image/txt")
        || ($_FILES["file"]["type"] == "image/png"))
        && ($_FILES["file"]["type"] <= 500000)
        && in_array($extension, $allowedExts))

        /* the in_array() searches for a specific value in an array.  Here, seraches for $extensions value in $allowedExts array*/
        {
        /*if file is of allowed extension type, then further validatiosn for file are processed*/

        //check if ay ErrorException
        if($_FILES["file"]["error"] > 0 )
        {
          echo "Return code: " . $_FILES["file"]["error"] . "<br>";
        }
        elseif (file_exists("../img/" . $_FILES["file"]["name"]))
        {
          echo $_FILES["file"]["name"] . "Image upload already exists. ";
        }
        /* on passing all validations, the file is moved from temporary location to the directory. */
        else
        {
          /*the move_upload_file() function moves an uploaded file to a new location */
          move_uploaded_file($_FILES["file"]["tmp_name"], "../img/" . $_FILES["file"]["name"]);

          //insert the 'image name' and 'file name' to the database
          mysqli_query($con,"INSERT INTO zones (zone_id, zone_name, zone_map, filename, zone_desc, fact_name) VALUES ('$zid', '$zname', '$zone_map', '$file', '$zdesc', '$fname')" );

          echo "<div align='center' style='background:#7f7f7f; background:rgba(0,0,0,0.85); padding:10px;'><h2 style='color:#cc8900;font-family:Planewalker;'>Zone Sucessfully Created!!!</h2></div>";
        }
      }
      mysqli_close($con);
    }
  ?>
<?php
// SESSION START
session_start();
include_once '../db_connect.php';
// CHECK IF ADMIN
if(isset($_SESSION['sess_role']) != 'admin')
{
  header("Location: ../login.php");
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
  <header>

  </header>
      <!-- Page Content -->
    <div class="container">
        <div class="row">
          <center>
            <div class="content" style="background:#7f7f7f; background:rgba(0,0,0,0.85); padding:10px;">
              <form method="post" enctype="multipart/form-data">
                <fieldset>
                  <table width="350" border="0" align="center">
                    <legend style="font-family: Planewalker; color:#cc8900;">Zone Data Entry
                      <tr>
                        <td>
                          <label>Zone ID</label>
                        </td>
                        <td>
                          <input type="text" name="zoneid">
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <label>Zone Name</label>
                        </td>
                        <td>
                          <input type="text" name="zonename">
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <label>Zone Description</label>
                        </td>
                        <td>
                          <input type="text" name="description">
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <label>Factions</label>
                        </td>
                        <td>
                          <input type="text" name="faction">
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <label>Zone Map</label>
                        </td>
                        <td>
                          <input type="text" name="iname" placeholder="Image Name">
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <label for="file">Upload Map:</label>
                        </td>
                        <td>
                          <input type="file" name="file" id="file"><br></br>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="2" align="cetner">
                          <button type="submit" name="submit">Submit</button><br><br>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="2>&nbsp"</td>
                      </tr>
                      <tr>
                        <td colspan="2" align="center">
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
