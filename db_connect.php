
 <?php
 $host='localhost';
 $user='root';
 $password='';
 $dbase='eso_app';

 try {
   $db = new PDO('mysql:host=localhost; dbname=eso_app', $user, $password);
   $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 } catch (PDOException $ex) {
     echo $ex->getMessage();
 }
 include_once 'CRUD.php';
 $crud = new CRUD($db);
  ?>
