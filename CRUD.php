<?php
//FUNCTION TO CREATE DATABASE LINK
class CRUD
{
  private $Db;
  function __construct($DB_CON)
  {
    $this->Db = $DB_CON;
  }
  //************USER FUNCTIONS************
  //RETRIEVES INFORMATION FOR LOGIN
  public function checkCredentials($username, $password)
  {
      $user = $this->getUserByUsername($username);
      if (!$user) {
          // No user found with provided username
          return false;
      }
      if (!password_verify($password, $user['password'])) {
          // Password does not match
          return false;
      }
      if (password_needs_rehash($user['password'], PASSWORD_DEFAULT)) {
          // This password was hashed using an older algorithm, update with new hash.
          $this->updatePassword($user['id'], $password);
      }
      // The password is no longer needed from the user data
      unset($user['password']);
      return $user;
  }

  public function getUserByUsername($username)
  {
      $sth = $this->Db->prepare("SELECT * FROM users WHERE username LIKE :username");
      $sth->bindValue(":username", $username);
      $sth->execute();
      return $sth->fetch(PDO::FETCH_ASSOC);

  }

  public function updatePassword($id, $password)
  {
      $hash = password_hash($password, PASSWORD_DEFAULT);
      $sth = $this->Db->prepare("UPDATE users SET password = :password WHERE user_id = :id");
      $sth->bindValue(":password", $hash);
      $sth->bindValue(":id", $id, PDO::PARAM_INT);
      return $sth;
  }

  //CREATES NEW USER
  public function createUser($role, $username, $password, $fname, $lname, $email, $platform, $gender, $age)
  {
    try
    {
      $haspass = password_hash($password, PASSWORD_DEFAULT);
      $statement = $this->Db->prepare("INSERT INTO users(role, username, password, fname, lname, email, platform, gender, age) VALUES (:userrole, :username, :pass, :userfname, :userlname, :useremail, :pform, :usergender, :userage)");
      $statement->bindparam(":userrole", $role);
      $statement->bindparam(":username", $username);
      $statement->bindparam(":pass", $hashpass);
      $statement->bindparam(":userfname", $fname);
      $statement->bindparam(":userlname", $lname);
      $statement->bindparam(":useremail", $email);
      $statement->bindparam(":pform", $platform);
      $statement->bindparam(":usergender", $gender);
      $statement->bindparam(":userage", $age);
      $statement->execute();
      return true;
    }
    catch(PDOException $ex)
    {
      echo $ex->getMessage();
      return false;
    }
  }

  public function getUser($username, $password)
  {
    try
    {
      $statement = $this->Db->prepare("SELECT * FROM users WHERE username=:uname AND password=:pass");
      $statement->execute(array(":uname"=>$username, ":pass"=>$password));
      $dataRows = $statement->fetch(PDO::FETCH_ASSOC);
      return $dataRows;
    }
    catch (PDOException $ex)
    {
      echo $ex->getMessage();
    }
  }


  //OUTPUTS TABLE TO DISPLAY USER INFORMATION AND EDIT/DELETE
  public function viewUser()
  {
    echo"
    <fieldset>
     <table width='100%' border='0' align='center' style='background:#7f7f7f; background:rgba(0,0,0,0.85); padding:10px;'>
      <legend style='color:#cc8900; font-family:Planewalker;'><h1>Manage Users</h1>
      <tr>
        <td  style='padding: 5px; color:#cc8900;font-family:Planewalker ;'>Username</td>
        <td  style='padding: 5px; color:#cc8900;font-family:Planewalker ;'>User ID</td>
        <td  style='padding: 5px; color:#cc8900;font-family:Planewalker ;'>Password</td>
        <td  style='padding: 5px; color:#cc8900;font-family:Planewalker ;'>Email</td>
        <td  style='padding: 5px; color:#cc8900;font-family:Planewalker ;'>Firstname</td>
        <td  style='padding: 5px; color:#cc8900;font-family:Planewalker ;'>Lastname</td>
        <td  style='padding: 5px; color:#cc8900;font-family:Planewalker ;'>Platform</td>
        <td  style='padding: 5px; color:#cc8900;font-family:Planewalker ;'>Age</td>
        <td  style='padding: 5px; color:#cc8900;font-family:Planewalker ;'>gender</td>
        </tr>
        ";
    try
    {
      $statement = $this->Db->prepare("SELECT * FROM users ");
      $statement->execute();
    while($dataRows = $statement->fetch(PDO::FETCH_ASSOC))
    {
      echo "
        <tr>
          <td style='padding: 5px; color:#cc8900;font-family:Planewalker;'>".$dataRows['user_id']."</td>
          <td style='padding: 5px; color:#cc8900;font-family:Planewalker;'>".$dataRows['username']."</td>
          <td style='padding: 5px; color:#cc8900;font-family:Planewalker;'>".$dataRows['password']." </td>
          <td style='padding: 5px; color:#cc8900;font-family:Planewalker;'>".$dataRows['email']." </td>
          <td style='padding: 5px; color:#cc8900;font-family:Planewalker;'>".$dataRows['fname']." </td>
          <td style='padding: 5px; color:#cc8900;font-family:Planewalker;'>".$dataRows['lname']." </td>
          <td style='padding: 5px; color:#cc8900;font-family:Planewalker;'>".$dataRows['platform']." </td>
          <td style='padding: 5px; color:#cc8900;font-family:Planewalker;'>".$dataRows['age']." </td>
          <td style='padding: 5px; color:#cc8900;font-family:Planewalker;'>".$dataRows['gender']." </td>
          <td><button style='margin: 5px;'><a href='edituser.php?id=".$dataRows['user_id']."'>Edit</a></button></td>
          <td><button style='margin: 5px;'><a href='deleteuser.php?id=".$dataRows['user_id']."'>Delete</a></button></td>
        </tr>
        ";
    }
      return $dataRows;
      echo "</legend></table></fieldset>";
    }
      catch (PDOException $ex)
    {
      echo $ex->getMessage();
    }
  }

  //FUNCTION TO OUTPUT FORM TO ALTER USER SELECTED
  public function editUser()
  {
    try
    {
      $id = $_GET['id']; //GETS ID FROM EDIT BUTTON ON VIEWUSER.PHP
      $statement=$this->Db->prepare("SELECT * FROM users WHERE user_id='".$id."'");
      $statement->execute();
      while($dataRows = $statement->fetch(PDO::FETCH_ASSOC))
      {
        echo"
        <form method='post'>
        <table style='background:#7f7f7f; background:rgba(0,0,0,0.85); padding:10px;'>
        <tr><td style='padding: 10px;color:#cc8900;font-family:Planewalker;'>First Name: </td><td><input type='text' name='fname' value='".$dataRows['fname']."'></td></br>
        <tr><td style='padding: 10px;color:#cc8900;font-family:Planewalker;'>Last Name: </td><td><input type='text' name='lname' value='".$dataRows['lname']."'></td></tr>
        <tr><td style='padding: 10px;color:#cc8900;font-family:Planewalker;'>Username: </td><td><input type='text' name='username' value='".$dataRows['username']."'></td></tr>
        <tr><td style='padding: 10px;color:#cc8900;font-family:Planewalker;'>Password: </td><td><input type='text' name='password' value='".$dataRows['password']."'></td></tr>
        <tr><td style='padding: 10px;color:#cc8900;font-family:Planewalker;'>Email: </td><td><input type='text' name='email' value='".$dataRows['email']."'></td></tr>
        <tr><td style='padding: 10px;color:#cc8900;font-family:Planewalker;'>Platform: </td><td><input type='text' name='pform' value='".$dataRows['platform']."'></td></tr>
        <tr><td style='padding: 10px;color:#cc8900;font-family:Planewalker;'>gender: </td><td><input type='text' name='usergender' value='".$dataRows['gender']."'></td></tr>
        <tr><td style='padding: 10px;color:#cc8900;font-family:Planewalker;'>Age: </td><td><input type='text' name='userage' value='".$dataRows['age']."'></td></tr>
        <tr><td style='padding: 10px;color:#cc8900;font-family:Planewalker;'></td><td><button type='submit' name='submit'>Submit</button></td></tr>
        <tr><td style='padding: 10px;color:#cc8900;font-family:Planewalker;'><a href='viewusers.php'>View Users</a></td></tr>
        </form>";
      }
      return $dataRows;
      return true;
    }
    catch(PDOException $ex)
    {
      echo $ex->getMessage();
      return false;
    }
  }

  //UPDATE USER INFO
  public function updateUser($fname, $lname, $username, $password, $email, $platform, $gender, $age)
  {
    $id = $_GET['id'];
    try
    {
        $statement = $this->Db->prepare("UPDATE users SET fname = '$fname', lname = '$lname', username = '$username', password='$password',  email = '$email', platform='$platform', gender='$gender', age='$age' WHERE user_id = '$id'");
        $statement->execute();
        echo "<div align='center' style='background:#7f7f7f; background:rgba(0,0,0,0.85); padding:10px;'><h2 style='color:#cc8900;font-family:Planewalker;'>User Updated Successfully!!!</h2></div>";
        return true;
    }
    catch(PDOException $ex)
    {
      echo $ex->getMessage();
      return false;
    }
  }

  //DELETE USER
  public function delUser()
  {
      try{
        $id = $_GET['id'];
        $statement=$this->Db->prepare("DELETE FROM users WHERE user_id='".$id."'");
        $statement->execute();
        echo "Entry Deleted!";
        return true;
      }
      catch(PDOException $ex)
      {
        echo $ex->getMessage();
        return false;
      }
  }


  //************ZONE FUNCTIONS************
  //FUCNTION TO ADD ZONE DATA TO DATABASE
  public function addZoneData($zname, $zdesc, $zmap, $fname)
  {
    try
    {
      $statement = $this->Db->prepare("INSERT INTO zones(zone_name, zone_map, zone_desc, fact_name) VALUES (:zname, :zmap, :zdesc, :fname)");
      $statement->bindparam(":zname", $zname);
      $statement->bindparam(":zdesc", $zdesc);
      $statement->bindparam(":zmap", $zmap);
      $statement->bindparam(":fname", $fname);
      $statement->execute();
      return true;
    }
    catch (PDOException $ex)
    {
        echo $ex->getMessage();
        return false;
    }
  }

  //OUTPUTS ZONE INFO IN FORM TO EDIT
  public function editZones()
  {
    try
    {
      $id = $_GET['id']; //GETS ID FROM EDIT BUTTON ON VIEWUSER.PHP
      $statement=$this->Db->prepare("SELECT * FROM zones WHERE zone_id='".$id."'");
      $statement->execute();
      while($dataRows = $statement->fetch(PDO::FETCH_ASSOC))
      {
        echo"
        <form method='post'>
        <table style='background:#7f7f7f; background:rgba(0,0,0,0.85); padding:10px;'>
        <tr><td style='padding: 10px;color:#cc8900; font-family: Planewalker;'>Zone Name: </td><td><input type='text' name='zname' value='".$dataRows['zone_name']."'></td></tr>
        <tr><td style='padding: 10px;color:#cc8900; font-family: Planewalker;'>Zone Description: </td><td><input type='text' name='zdesc' value='".$dataRows['zone_desc']."'></td></tr>
        <tr><td style='padding: 10px;color:#cc8900; font-family: Planewalker;'>Filename: </td><td><input type='text' name='filename' value='".$dataRows['filename']."'></td></tr>
        <tr><td style='padding: 10px;color:#cc8900; font-family: Planewalker;'>Faction Name: </td><td><input type='text' name='fname' value='".$dataRows['fact_name']."'></td></tr>
        <tr><td style='padding: 10px;color:#cc8900; font-family: Planewalker;'></td><td><button type='submit' name='submit'>Submit</button></td></tr>
        </form>";
      }
      return $dataRows;
      return true;
    }
    catch(PDOException $ex)
    {
      echo $ex->getMessage();
      return false;
    }
  }

  //UPDATE ZONE INFO
  public function updateZones($zonename, $zdesc, $zmap, $faction)
  {
    $id = $_GET['id'];
    try
    {
      $statement = $this->Db->prepare("UPDATE zones SET zone_name = '$zonename', zone_desc = '$zdesc', filename = '$zmap', fact_name = '$faction' WHERE zone_id = '$id'");
      $statement->execute();
      echo "<div align='center' style='background:#7f7f7f; background:rgba(0,0,0,0.85); padding:10px;'><h2 style='color:#cc8900;font-family:Planewalker;'>Zone Successfully Updated!!!</h2></div>";
      return true;
    }
    catch(PDOException $ex)
    {
      echo $ex->getMessage();
      return false;
    }
  }

  //DELETE ZONES
  public function delZones()
  {
      try{
        $id = $_GET['id'];
        $statement=$this->Db->prepare("DELETE FROM zones WHERE zone_name='".$id."'");
        $statement->execute();
        echo "Entry Deleted!";
        return true;
      }
      catch(PDOException $ex)
      {
        echo $ex->getMessage();
        return false;
      }
  }


  //************ARMOR FUNCTIONS************
  //FUNCTION TO ADD ARMOR TO DATABASE
  public function addArmor($armor_name, $armor_type, $armor_origin, $zone_name, $two, $three, $four, $five){
    try {
      $statement = $this->Db->prepare("INSERT INTO armor(arm_name, arm_type, arm_origin, zone_name, two_item, three_item, four_item, five_item) VALUES (:name, :type, :origin, :zname, :two, :three, :four, :five)");
      $statement->bindparam(":name", $armor_name);
      $statement->bindparam(":type", $armor_type);
      $statement->bindparam(":origin", $armor_origin);
      $statement->bindparam(":zname", $zone_name);
      $statement->bindparam(":two", $two);
      $statement->bindparam(":three", $three);
      $statement->bindparam(":four", $four);
      $statement->bindparam(":five", $five);
      $statement->execute();
      return true;
    }
    catch(PDOException $ex)
    {
        echo $ex->getMessage();
        return false;
    }
  }

  //FUNCTION TO OUTPUT FORM TO ALTER ARMOR SELECTED
  public function editArmor()
  {
    $id = $_GET['id'];
    try
    {
      $statement=$this->Db->prepare("SELECT * FROM armor WHERE arm_id ='".$id."'");
      $statement->execute();
      while($dataRows = $statement->fetch(PDO::FETCH_ASSOC))
      {
        echo"
        <form method='post'>
        <table style='background:#7f7f7f; background:rgba(0,0,0,0.85); padding:10px;'>
        <tr><td style='padding: 10px; color:#cc8900; font-family: Planewalker;'>Armor Name: </td><td><input type='text' name='aname' value='".$dataRows['arm_name']."'></td></tr>
        <tr><td style='padding: 10px; color:#cc8900; font-family: Planewalker;'>Armor Name: </td><td><input type='text' name='atype' value='".$dataRows['arm_type']."'></td></tr>
        <tr><td style='padding: 10px; color:#cc8900; font-family: Planewalker;'>Armor Origin: </td><td><input type='text' name='origin' value='".$dataRows['arm_origin']."'></td></tr>
        <tr><td style='padding: 10px; color:#cc8900; font-family: Planewalker;'>Zone Name: </td><td><input type='text' name='zname' value='".$dataRows['zone_name']."'></td></tr>
        <tr><td style='padding: 10px; color:#cc8900; font-family: Planewalker;'>Bonus #2: </td><td><input type='text' name='bonus2' value='".$dataRows['two_item']."'></td></tr>
        <tr><td style='padding: 10px; color:#cc8900; font-family: Planewalker;'>Bonus #3: </td><td><input type='text' name='bonus3' value='".$dataRows['three_item']."'></td></tr>
        <tr><td style='padding: 10px; color:#cc8900; font-family: Planewalker;'>Bonus #4: </td><td><input type='text' name='bonus4' value='".$dataRows['four_item']."'></td></tr>
        <tr><td style='padding: 10px; color:#cc8900; font-family: Planewalker;'>Bonus #5: </td><td><input type='text' name='bonus5' value='".$dataRows['five_item']."'></td></tr>
        <tr><td style='padding: 10px; color:#cc8900; font-family: Planewalker;'></td><td><button type='submit' name='submit'>Submit</button></td></tr>
        </form>";
      }
      return $dataRows;
      return true;
    }
    catch(PDOException $ex)
    {
      echo $ex->getMessage();
      return false;
    }
  }

  //UPDATE USER INFO
  public function updateArmor($armorname, $armortype, $origin, $zname, $b2, $b3, $b4, $b5)
  {
    $id = $_GET['id'];
    try
    {
        $statement = $this->Db->prepare("UPDATE armor SET arm_name = '$armorname', arm_type = '$armortype', arm_origin = '$origin', zone_name = '$zname', two_item = '$b2', three_item = '$b3', four_item = '$b4', five_item = '$b5' WHERE arm_id = '$id'");
        $statement->execute();
        echo "<div align='center' style='background:#7f7f7f; background:rgba(0,0,0,0.85); padding:10px;'><h2 style='color:#cc8900;font-family:Planewalker;'>Armor Successfully Updated!!!</h2></div>";
        return true;
    }
    catch(PDOException $ex)
    {
      echo $ex->getMessage();
      return false;
    }
  }

  //DELETE ARMOR
  public function delArmor()
  {
      try{
        $id = $_GET['id'];
        $statement=$this->Db->prepare("DELETE FROM armor WHERE arm_id ='".$id."'");
        $statement->execute();
        echo "Entry Deleted!";
        return true;
      }
      catch(PDOException $ex)
      {
        echo $ex->getMessage();
        return false;
      }
  }

  //FUNCTION TO VIEW ARMOR IN DATABASE AS ADMIN
  public function viewArmorAdmin()
  {
    echo"
    <div class='content' style='background:#7f7f7f; background:rgba(0,0,0,0.85); padding:10px;'
    <fieldset>
     <table width='100%' border='0' align='center'>
      <legend style='color:#cc8900;'>Manage Armor Sets
      <tr>
        <td style='padding: 25px; color:#cc8900;'>Armor ID</td>
        <td style='padding-right: 25px;  color:#cc8900; font-family: Planewalker;'>Armor Name</td>
        <td style='padding-right: 25px; color:#cc8900;'>Armor Type</td>
        <td style='padding-right: 25px; color:#cc8900;'>Armor Origin</td>
        <td style='padding-right: 25px; color:#cc8900;'>Armor Image</td>
        <td style='padding-right: 25px; color:#cc8900;'>Zone Name</td>
        <td style='padding-right: 25px; color:#cc8900;'>Bonus #2</td>
        <td style='padding-right: 25px; color:#cc8900;'>Bonus #3</td>
        <td style='padding-right: 25px; color:#cc8900;'>Bonus #4</td>
        <td style='padding-right: 25px; color:#cc8900;'>Bonus #5</td>
        </tr>
        ";
    try
    {
      $statement = $this->Db->prepare("SELECT * FROM armor ");
      $statement->execute();
      while($dataRows = $statement->fetch(PDO::FETCH_ASSOC))
      {
        echo "
          <tr>
            <td style='padding: 15px;'>".$dataRows['arm_id']."</td>
            <td style='padding: 15px;'>".$dataRows['arm_name']."</td>
            <td style='padding: 15px;'>".$dataRows['arm_type']." </td>
            <td style='padding: 15px;'>".$dataRows['arm_origin']." </td>
            <td style='padding: 15px;'>".$dataRows['arm_image']." </td>
            <td style='padding: 15px;'>".$dataRows['zone_name']." </td>
            <td style='padding: 15px;'>".$dataRows['two_item']." </td>
            <td style='padding: 15px;'>".$dataRows['three_item']." </td>
            <td style='padding: 15px;'>".$dataRows['four_item']." </td>
            <td style='padding: 15px;'>".$dataRows['five_item']." </td>
            <td><button><a href='edituser.php?id=".$dataRows['arm_id']."'>Edit</a></button></td>
            <td><button><a href='deleteuser.php?id=".$dataRows['arm_name']."'>Delete</a></button></td>
          </tr>";
      }
      return $dataRows;
      echo "</legend></table></fieldset>";
    }
    catch (PDOException $ex)
    {
        echo $ex->getMessage();
    }
  }

  //FUNCTION TO OUTPUT ARMOR TO FORM AS A USER
  public function zoneArmor()
  {
    echo"<table>
    <thead>
      <tr>
        <th style='padding-right: 25px; color:#cc8900;'><h3>Name</h3>
        <th style='padding-right: 25px; color:#cc8900;'><h3>Type</h3>
        <th style='padding-right: 25px; color:#cc8900;'><h3>Origin</h3>
        <th style='padding-right: 25px; color:#cc8900;'><h3>Location</h3>
        <th style='padding-right: 25px; color:#cc8900;'><h3>Bonus #1</h3>
        <th style='padding-right: 25px; color:#cc8900;'><h3>Bonus #2</h3>
        <th style='padding-right: 25px; color:#cc8900;'><h3>Bonus #3</h3>
        <th style='padding-right: 25px; color:#cc8900;'><h3>Bonus #4</h3>
      </tr>
        ";
    try
    {
      $id = $_GET['id'];
      $statement = $this->Db->prepare("SELECT * FROM armor WHERE zone_name = '".$id."'");
      $statement->execute();
      while($dataRows = $statement->fetch(PDO::FETCH_ASSOC))
      {
        echo "
          <tr>
            <td style='padding: 15px; '><h3 style='color:#cc8900;'>".$dataRows['arm_name']."</h3></td>
            <td style='padding: 15px; color: #fff;'>".$dataRows['arm_type']."</td>
            <td style='padding: 15px; color: #fff;'>".$dataRows['arm_origin']." </td>
            <td style='padding: 15px; color: #fff;'>".$dataRows['zone_name']." </td>
            <td style='padding: 15px; color: #fff;'>".$dataRows['two_item']." </td>
            <td style='padding: 15px; color: #fff;'>".$dataRows['three_item']." </td>
            <td style='padding: 15px; color: #fff;'>".$dataRows['four_item']." </td>
            <td style='padding: 15px; color: #fff;'>".$dataRows['five_item']." </td>
          </tr>";
      }
      return $dataRows;
      echo "</table>";
    }
    catch (PDOException $ex)
    {
        echo $ex->getMessage();
    }
  }

  //FUNCTION TO DISPLAY ARMOR ON PAGE FOR LIVE SEARCH
  public function viewArmorPage()
  {
    echo"<table>
    <thead>
      <tr>
        <th style='padding-right: 25px; color:#cc8900;'><h3>Name</h3>
        <th style='padding-right: 25px; color:#cc8900;'><h3>Type</h3>
        <th style='padding-right: 25px; color:#cc8900;'><h3>Origin</h3>
        <th style='padding-right: 25px; color:#cc8900;'><h3>Location</h3>
        <th style='padding-right: 25px; color:#cc8900;'><h3>Bonus #1</h3>
        <th style='padding-right: 25px; color:#cc8900;'><h3>Bonus #2</h3>
        <th style='padding-right: 25px; color:#cc8900;'><h3>Bonus #3</h3>
        <th style='padding-right: 25px; color:#cc8900;'><h3>Bonus #4</h3>
        </tr>";
    try
    {
      $statement = $this->Db->prepare("SELECT * FROM armor");
      $statement->execute();
      while($dataRows = $statement->fetch(PDO::FETCH_ASSOC))
      {
        echo "
          <tr>
            <td style='padding: 15px; '><h3 style='color:#cc8900;'>".$dataRows['arm_name']."</h3></td>
            <td style='padding: 15px; color: #fff;'>".$dataRows['arm_type']."</td>
            <td style='padding: 15px; color: #fff;'>".$dataRows['arm_origin']." </td>
            <td style='padding: 15px; color: #fff;'>".$dataRows['zone_name']." </td>
            <td style='padding: 15px; color: #fff;'>".$dataRows['two_item']." </td>
            <td style='padding: 15px; color: #fff;'>".$dataRows['three_item']." </td>
            <td style='padding: 15px; color: #fff;'>".$dataRows['four_item']." </td>
            <td style='padding: 15px; color: #fff;'>".$dataRows['five_item']." </td>
          </tr>";
      }
      return $dataRows;
      echo "</table>";
    }
    catch (PDOException $ex)
    {
        echo $ex->getMessage();
    }
  }

  //FUNCTION TO OUPUT MAP FOR VIEWING
  public function viewMap()
  {
    try
    {
      $id = $_GET['id'];
      $statement = $this->Db->prepare("SELECT * FROM zones WHERE zone_name = '".$id."'");
      $statement->execute();
      while($dataRows = $statement->fetch(PDO::FETCH_ASSOC))
    {
      echo "<img src='img/maps/".$dataRows['filename']."'>";
    }
    return $dataRows;
    }
    catch (PDOException $ex)
    {
      echo $ex->getMessage();
    }
  }
}
?>
