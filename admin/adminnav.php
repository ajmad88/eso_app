
<!DOCTYPEhtml>
<head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- Bootstrap Core CSS -->
      <link href="../css/bootstrap.min.css" rel="stylesheet">
      <!-- Custom CSS -->
      <link href="../css/the-big-picture.css" rel="stylesheet">
</head>
<body>
  <nav class="navbar navbar-inverse navbar-fixed-bottom" role="navigation">
      <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button>
          </div>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
                <li>
                    <a href="adminhome.php">ADMIN HOME</a>
                </li>
                  <li>
                      <a href="addarmor.php">ADD ARMOR</a>
                  </li>
                  <li>
                      <a href="addzone.php">ADD ZONE</a>
                  </li>
                  <li>
                      <a href="viewarmor.php">EDIT ARMOR</a>
                  </li>
                  <li>
                      <a href="viewzone.php">EDIT ZONE</a>
                  </li>
                  <li>
                    <a href="logout.php">LOG OUT</a>
                  </li>
                  <li>
                    <a href="">
                    <?php echo "Welcome, ",  $_SESSION['sess_user'],"!" ?>
                    <?php date_default_timezone_set("America/Menominee"); echo date("h:i:sa");?>
                    (<?php  echo $_SESSION['sess_role'] ?>)
                  </a>
                  </li>
              </ul>
            </div>
          </div>
          <!-- /.navbar-collapse -->
      </div>
      <!-- /.container -->
  </nav>
</body>
</html>
