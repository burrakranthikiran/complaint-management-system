<?php
  require '../core/session.php';
  require '../core/config.php';
  require '../core/admin-key.php';
 if(empty($_POST)===false){
    $name = mysql_real_escape_string($_POST['name']);
    $username =  mysql_real_escape_string($_POST['username']);
    $email =  mysql_real_escape_string($_POST['email']);
    $post = mysql_real_escape_string($_POST['post']);
    $password =  mysql_real_escape_string($_POST['password']);
    if(empty($name)||empty($username)||empty($email)||empty($post)||empty($password)){
    }elseif (!filter_var($email,FILTER_VALIDATE_EMAIL) === true) {
      $message = "Not a Valid Email address!";
    }else{
      $string = mysql_query("INSERT INTO `dummy` VALUES ('0','$name','$username','$email','$post','$password',NOW())") or die(mysql_error());
      $message = "Account has been Registerd";
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
    <link rel="shortcut icon" href="../files/img/ico.ico">
    <link rel="stylesheet" href="../files/css/bootstrap.css">
    <link rel="stylesheet" href="../files/css/custom.css">
  </head>
  <body>

  <?php require 'nav.php'; ?>
  
  <div class="animated fadeIn">


    

    <div class="" style="width: 1100px; padding-top: 20px; background: #fff; position: relative; float: left; left: 230px;">
      <div class="col-lg-12">
          <div class="analysis">
            <?php
              $engi = mysql_query("SELECT * FROM `dummy`");
              $count_engi = mysql_num_rows($engi);

              $users = mysql_query("SELECT * FROM `circle`");
              $count_users = mysql_num_rows($users);

              $cmp = mysql_query("SELECT * FROM `cmp_log`");
              $count_cmp = mysql_num_rows($cmp);

              $frd = mysql_query("SELECT * FROM `view_cmp`");
              $count_frd = mysql_num_rows($frd);
            ?>

            <div class="track theme">
                Total Users <br> <p><?php echo $count_users;?></p>
            </div>

            <div class="track vio">
                Total Engineers <br> <p><?php echo $count_engi;?></p>
            </div>

            <div class="track red">
                Complaints <br> <p><?php echo $count_cmp;?></p>
            </div>

            <div class="track blue">
                Forwarded <br> <p><?php echo $count_frd;?></p>
            </div>

          </div>


          <!--<div class="textbox">-->
          <!--<br><br>-->
            <?php

            $query1=mysql_query("SELECT * FROM `circle` ORDER BY id DESC LIMIT 1 ");
            $name=mysql_fetch_array($query1);
            $new_user=$name['name'];


            $query=mysql_query("SELECT * FROM `cmp_log` ORDER BY id DESC LIMIT 1 ");
            $name2=mysql_fetch_array($query);
            $new_msg=$name2['name'];

            $query4=mysql_query("SELECT * FROM `dummy` ORDER BY id DESC LIMIT 1 ");
            $name3=mysql_fetch_array($query4);
            $new_eng=$name3['name'];



             ?>

            
             <!--       <span><?php echo $new_user; ?></span>-->
             

             <!-- <div class="div_data blue">-->
             <!--       <span><?php echo $new_msg; ?></span>-->
            
             <!--     <span> <?php echo $new_eng; ?></span>-->
           
      </div>

     

        <!--    <?php echo $message; ?>-->
       





          
            <?php
              $db=mysql_query("SELECT * FROM `posts` ");
              while($data=mysql_fetch_array($db)) {
                $id=$data['id'];
              echo "<div class='glow'> ";
              echo "<h4 class='heading'> Heading : ".$data['subject']."</h4>";
              echo "<p> Story : ".$data['story']."<br>";
              echo "<div class='text-right'>  <a class ='button logout' href ='delete_posts.php?id=$id' onClick=\"javascript:return confirm ('Are you really want to delete ?');\">Delete</a>";
              echo "</p></div></div> ";
             }
            ?>



        
    

    </div>


  </div>

 
    <!--Users client-->
    
    <div class="" style="width: 100%; min-height: 400px; background: #fff; position: relative; float: left; text-align: center; ">
        <h1><img src="/admin/files/img/logo.png" style="height: 10%;width: 10%;"></h1>
        <div class="col-lg-12 text-center">
          <?php echo "<p>".$message."</p>"; ?>
              <form class="" method="post" autocomplete="off">
                <input type="text" name="name" placeholder="Name"/>
                <br><br>
                <input type="text" name="username" placeholder="Username"/>
                <br><br>
                <input type="text" name="email" placeholder="Email"/>
                <br><br>
                <input type="text" name="post" placeholder="Designation"/>
                <br><br>
                <input type="password" name="password" placeholder="Password"/>
                <br><br>
                <button type="submit" class="log">Add Officer</button>
              </form>
        </div>
      </div>

      

    <script src="../files/js/jquery.js"></script>
    <script src="../files/js/bootstrap.min.js"></script>
    <script src="../files/js/script.js"></script>

  </body>
</html>
