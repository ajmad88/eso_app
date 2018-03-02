<?php
session_start();
include_once'db_connect.php';
if(isset($_POST['login_bttn'])){
  $username = $_POST['username'];
  $password = $_POST['password'];
  $row = $crud->checkCredentials($username, $password);

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
    if($_SESSION['sess_role'] == "suadmin")
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
    $(document).ready(function(){
      $(".dc").hide();
      $(".eb").hide();
      $(".ad").hide();
      $(".dagger").click(function(){
          $(".dc").toggle();
        });
      $(".ebon").click(function(){
          $(".eb").toggle();
        });
      $(".aldmeri").click(function(){
        $("#referral").hide();
          $(".ad").toggle();
        });
    });
    </script>
</head>

<body>
      <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div style="background:#7f7f7f; background:rgba(0,0,0,0.85); padding:10px;">
                <center>
                <a href="#ebon" class="ebon"><img src="img/ebonheart.png"></a>
                <a href="#dagger" class="dagger"><img src="img/daggerfall.png"></a>
                <a href="#aldmeri" class="aldmeri"><img src="img/aldmeri.png"></a>
                <h1 style="color:#cc8900">The ESO Armor Companion</h1>
                <p style="color:#fff; text-align:center;">Welcome and thank you for visiting the Elder Scrolls Online Armor Companion website.  The purpose of this site is to help players better familiarize themselves with the many armor sets available to players in game.  Each area within the three factions has its own specific light, medium, and heavy named armor sets.  These sets drop from dolmens, world bosses, and delve bosses.  These are known as overland sets.  Accross each area there are specific crafting stations where you are able to craft your own named set of specific to the station.  Please take your time to explore the site and learn more about Tamriels lands and the armorsets available in them.</p>
                </center>
            </div>
        </div>
        <div class="row">
          <center>
            </div>
            <div class="eb" id="ebon" style="background:#7f7f7f; background:rgba(0,0,0,0.75); padding:10px;">
                <h1 style="color:#990000; text-align:center;">The Ebonheart Pact</h1></br>
                <p style="color:#fff; text-align:center;">The crest of the Ebonheart Pact is a dragon, and its colors are red and black. It consists of the Dunmer of Morrowind, the Nords of Skyrim and the Argonians of Black Marsh. The alliance was reluctantly formed out of necessity; despite the three races' ancestral hatred for each other, they recognized the threat posed by their unified enemies, both at home and from across the sea, and banded together to protect their borders and freedom. Led by Jorunn the Skald-King, who presides over the Great Moot in the Pact's capital of Mournhold, the alliance seeks to defeat the corrupt Empire and preserve the independence of its homelands. Pact players will begin on Bleakrock Isle after being washed up unconscious on the shores of the island following their escape from Molag Bal's realm of Coldharbour.</p>
              </div>
              <div class="dc" id="dagger" style="background:#7f7f7f; background:rgba(0,0,0,0.75); padding:10px; ">
                  <h1 style="color:#0029ff; text-align:center;">The Daggerfall Convenant</h1></br>
                  <p style="color:#fff; text-align:center;">The crest of the Daggerfall Covenant is a lion, and its colors are blue and silver. It consists of the Bretons of High Rock, the Orcs of Orsinium, and the Redguards of Hammerfell. The alliance is an egalitarian democratic association which uses its military might to secure lucrative trade routes. Led by High King Emeric of Wayrest, the Covenant seeks to capture the Ruby Throne in order to restore the Second Empire and return stability to Tamriel. Covenant players will begin on Stros M'Kai after being washed up unconscious on the shores of the island following their escape from Molag Bal's realm of Coldharbour.</p>
                </div>
                <div class="ad" id="aldmeri" style="background:#7f7f7f; background:rgba(0,0,0,0.75); padding:10px;">
                    <h1 style="color:#b29600; text-align:center;">The Aldmeri Dominion</h1></br>
                    <p style="color:#fff; text-align:center;">The crest of the Aldmeri Dominion is an eagle, and its colors are yellow and silver. It consists of the Altmer of Summerset Isles, the Bosmer of Valenwood, and the Khajiit of Elsweyr. The alliance is a nascent empire that rules its holdings with an iron fist. Led by Queen Ayrenn with Elden Root as its capital, the Dominion seeks to reestablish Elven dominance over Tamriel in order to protect it from the carelessness of the younger races. The province of Valenwood, led by King Camoran Aeradan, joined the alliance to help fight off the Colovian troops that were capturing territory in northern Valenwood, while Elsweyr still remains in the grip of the Knahaten Flu. Dominion players will begin on Khenarthi's Roost after being washed up unconscious on the shores of the island following their escape from Molag Bal's realm of Coldharbour.</p>
                  </div>
                  </div>
          </center>
        </div>
        <!-- /.row -->
    </div>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
