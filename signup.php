<?php
  require 'core/config.php';
  error_reporting(0);


  if(empty($_POST)===false){
    $name = mysql_real_escape_string($_POST['name']);
    $username =  mysql_real_escape_string($_POST['username']);
    $email =  mysql_real_escape_string($_POST['email']);
    $password =  mysql_real_escape_string($_POST['password']);
    if(empty($name) || empty($username) || empty($email) ||empty($password)){

    }elseif (!filter_var($email,FILTER_VALIDATE_EMAIL) === true) {
      $message = "It's not a valid email address";
    }else{
      mysql_query("INSERT INTO `circle` VALUES ('0','$name','$username','$email','$password',NOW())") or die(mysql_error());
      $message = "Your account has been Registerd";
      }
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta name="description" content="Telangana Janahitha">
    <meta name="keywords" content="tsjanahitha">
    <meta name="author" content="Burra Kranthi Kiran, Ravi">
    <title>Ts Janahitha</title>
    <link rel="shortcut icon" href="files/img/ico.ico">
    <link rel="stylesheet" href="files/css/bootstrap.css">
    <link rel="stylesheet" href="files/css/custom.css">
  </head>
  <body>

  

   <div  style="text-align: center;"> 
    <h1><img src="/files/img/banner5.png" style="width: 100%;"></h1>
   </div>
    

      <div class="padd">
        <div class="col-lg-12 text-center">
              <form class="" method="post" autocomplete="off">
                <input type="text" name="name" placeholder="Your Name">
                <br><br>
                <input type="text" name="username" placeholder="Your Username">
                <br><br>
                <input type="text" name="email" placeholder="Your Email">
                <br><br>
                <input type="password" name="password" placeholder="Password">
                <br><br>
                <?php echo "<p>".$message."</p>"; ?>
                <br>
                <button type="submit" class="log">Sign Up</button>
                <br><br>
              </form>
              <br>Already have an acccount ? <a href="index.php">Login  </a>
        </div>
      </div>
   
  
 

    <script src="files/js/jquery.js"></script>
    <script src="files/js/bootstrap.min.js"></script>
    <script src="files/js/script.js"></script>
     <h1><img src="/files/img/banner4.png" style="width: 100%;"></h1>
  </body>
 
  
</html>
