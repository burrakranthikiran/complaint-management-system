<?php
  //user login and homepage

  require 'core/session.php';
  require 'core/config.php';
    require 'core/redirect.php';

  $message="";

  if(empty($_POST)===false){
  $username = mysql_real_escape_string($_POST['username']);
  $password = mysql_real_escape_string($_POST['password']);
    if(empty($username) || empty($password)){
          header('Location:admin-login.php');
    }else{
        $query1=mysql_query("SELECT * FROM `admin` WHERE id AND username='$username' and password='$password'") or die(mysql_error());
        if(mysql_num_rows($query1)>0){
            $_SESSION['username'] = $_REQUEST['username'];
            header('Location:admin/message.php');
        }else{
          $message="Admin username and password is incorrect";
        }
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  </head>
  <body>
      
      
      <div  style="text-align: center;">
       
        <h1><img src="/files/img/banner4.png" style="width: 100%;"></h1>
        
        <nav class="navbar navbar-expand-sm" style="background:#FC00D5;">
  		<div class="collapse navbar-collapse" id="navbarSupportedContent">
		    <ul class="navbar-nav mr-auto">
		      <li class="nav-item active">
		        <a class="nav-link" style="font-size: 2rem;color: white;" href="#">Home<span class="sr-only">(current)</span></a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" style="font-size: 2rem;color: white;" href="#">Blogs</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" style="font-size: 2rem;color: white;" href="#">Images</a>
		      </li>
		      
		    </ul>
		    <form class="form-inline my-2 my-lg-0">
		     
		    <a class="nav-link" style="font-size: 2rem;color: white;" href="index.php">User Login</a>
		    <a class="nav-link" style="font-size: 2rem;color: white;" href="officers-login.php">Officer's Login</a>
		         
		      
		    </form>
		    
		    
  </div>
</nav>
        
        
        
        
       <h1><img src="/files/img/banner5.png" style="width: 100%;"></h1>
   </div>
   <div class="row">
       <div class="col" style="float: left; width: 50%; padding: 10px; height: 500px;">
       <div class="card">
           <div class="padd">
           <img src="/files/img/img2.png" width="350" height="300">
           </div>
           </div>
       </div>
       <div class="col" style="float: left; width: 50%; padding: 10px; height: 500px;">
       
       <div class="card">
           <div class="padd" style="margin-top:4rem; margin-bottom:2rem;">
           <label style="font-size:3rem;">Admin Login</label>
          

        <div class="col-lg-12 text-center">
              <form class="" method="post" autocomplete="off">
                <label for="username"></label>
                <input type="text" name="username" placeholder="Admin username" id="email">
                <br><br>
                <label for="password"></label>
                <input type="password" name="password" placeholder="Password" id="pass">
                <br><br>
                <button type="submit" class="log">Login</button>
                <br><br>
                <span class="red"><?php echo $message; ?></span>
              </form>
              <br>
        </div>
      </div>



       
      		</div>
       	</div>
       
   </div>
      
  

      
      
      <?php
      include 'footer.php';
      include 'core/jsscript.php';
      ?>

  </body>
</html>
