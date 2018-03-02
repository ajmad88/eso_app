<?php
//SESSION START
  session_start();
  include_once '../db_connect.php';
//CHECK ADMIN LOGGED IN
  if(isset($_SESSION['sess_role']) != 'admin'){
    header("Location: ../login.php");
  }
  include 'adminnav.php';
 ?>
 <?php

     $host='localhost';
     $user='root';
     $password='';
     $dbase='eso_app';

     try {
       $db = new PDO('mysql:host=localhost; dbname=eso_app', $user, $password);
       $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 		  $total  = $db->query("SELECT COUNT(zone_name) as rows FROM zones")
 				  ->fetch(PDO::FETCH_OBJ);

 		$perpage = 3;
 		$posts  = $total->rows;
 		$pages  = ceil($posts / $perpage);

 		# default
 		$get_pages = isset($_GET['page']) ? $_GET['page'] : 1;

 		$data = array(

 			'options' => array(
 				'default'   => 1,
 				'min_range' => 1,
 				'max_range' => $pages
 				)
 		);

 		$number = trim($get_pages);
 		$number = filter_var($number, FILTER_VALIDATE_INT, $data);
 		$range  = $perpage * ($number - 1);

 		$prev = $number - 1;
 		$next = $number + 1;

 		$stmt = $db->prepare("SELECT * FROM zones LIMIT :limit, :perpage");
 		$stmt->bindParam(':perpage', $perpage, PDO::PARAM_INT);
 		$stmt->bindParam(':limit', $range, PDO::PARAM_INT);
 		$stmt->execute();

 		$result = $stmt->fetchAll();

 	} catch(PDOException $e) {
 		$error = $e->getMessage();
 	}

 	$conn = null;
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
     <link href="../css/bootstrap.min.css" rel="stylesheet">

     <!-- Custom CSS -->
     <link href="../css/the-big-picture.css" rel="stylesheet">

     <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
     <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
     <!--[if lt IE 9]>
         <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
         <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
     <![endif]-->
 </head>
 <body>
     <!-- Page Content -->
     <div class="container">


     <div class="navigation">

     <?php

       if($result && count($result) > 0)
       {
         echo "<h3 style='color: #cc8900;'>Total pages ($pages)</h3>";

         # first page
         if($number <= 1)
           echo "<span  style='color: #cc8900;'>&laquo; prev</span> | <a href=\"?page=$next\">next &raquo;</a>";

         # last page
         elseif($number >= $pages)
           echo "<a href=\"?page=$prev\">&laquo; prev</a> | <span>next &raquo;</span>";

         # in range
         else
           echo "<a href=\"?page=$prev\">&laquo; prev</a> | <a href=\"?page=$next\">next &raquo;</a>";
       }

       else
       {
         echo "<p>No results found.</p>";
       }

     ?>
     </div>
 <div style="background:#7f7f7f; background:rgba(0,0,0,0.85); padding:10px;">
     <?php

       if($result && count($result) > 0)
       {
         echo "
         <div class='zones'>
           <table>
             <thead>
               <tr>
                 <th style='color: #cc8900;'><h2>Zone Name</h2>
                 <th style='color: #cc8900;'><h2>Zone Description</h2>
                 <th style='color: #cc8900;'><h2>Zone Map</h2>
                 <th style='color: #cc8900;'><h2>Faction</h2>
             <tbody>
         ";
           foreach($result as $key => $row)
           {
             echo "
               <tr>
                 <td  style='padding: 15px; color: #cc8900;'><h3>$row[zone_name]</h3></td>
                 <td style='padding: 15px; color: #fff;'>$row[zone_desc]</td>
                 <td style='padding: 15px;'><a href='zonemap.php?id=".$row['zone_name']."'><img src='../img/thumb/".$row['filename']."'></a></td>
                 <td style='color: #fff;'>$row[fact_name]</td>
                 <td><a href='editzones.php?id=".$row['zone_id']."'><button style='margin: 10px;'>EDIT</button></a>
                 <td><a href='deletezone.php?id=".$row['zone_id']."'><button style='margin: 10px;'>DELETE</button></a>
             ";
           }
         echo '
           </table>
         </div>
         ';
       }

     ?>
   </div>
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
