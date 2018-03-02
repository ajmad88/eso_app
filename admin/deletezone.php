<?php
session_start();
include_once 'db_connect.php';

if(isset($_SESSION['sess_role']) != 'admin')
{
  header("Location: login.php");
}

header("location: viewusers.php");
?>
<!DOCTYPEhtml>
<head>
</head>
<body>
  <?php $crud->delZones();?>
</body>
</html>
