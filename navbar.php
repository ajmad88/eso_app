
<!DOCTYPEhtml>
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
              <a class="navbar-brand" href="index.php">HOME</a>
          </div>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
                  <li>
                      <a href="zones.php">ZONES</a>
                  </li>
                  <li>
                      <a href="armor.php">ARMOR SETS</a>
                  </li>
              </ul>
                 <!-- Button to open the modal login form -->
            <button class="btn-toolbar" onclick="document.getElementById('id01').style.display='block'">LOGIN</button>
            <!-- The Modal Login -->
            <div id="id01" class="modal">
              <span onclick="document.getElementById('id01').style.display='none'"
            class="close" title="Close Modal">&times;</span>
              <!-- Modal Content -->
              <center>
              <form class="modal-content animate" method="post">
                <div>
                  <h2>LOGIN</h2>
                </div>
                <div >
                  <label><b>Username</b></label>
                  <input type="text" placeholder="Enter Username" name="username" required>
                </br>
                  <label><b>Password</b></label>
                  <input type="password" placeholder="Enter Password" name="password" required>
                </br>
                  <button class="cancelbtn" type="submit" name="login_bttn" formmethod="post" >Login</button>
                  <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button></br>
                  <a href="register.php">Register New Account</a>
              </div></br>
              </form>
            </center>
            </div>
          </div>
          <!-- /.navbar-collapse -->
      </div>
      <!-- /.container -->
  </nav>
</body>
</html>
