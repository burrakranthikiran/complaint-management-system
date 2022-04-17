<?php
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  require './core/session.php';
  require './core/config.php';
//   require './core/user_key.php';

  $id = $_GET['id'];
	$result = mysql_query("SELECT * FROM `cmp_log` WHERE id='$id'");
	$arry = mysql_fetch_array($result);
	if (!$result) {
			die("Error: Data not found..");
		}
		
	
	$query1=mysql_query("SELECT * FROM `cmp_log` WHERE id='$id'");
            while( $arry=mysql_fetch_array($query1) ) {

              $id = $arry['id'];
              $user_id = $arry['user_id'];
              $name = $arry['name'];
              $username = $arry['username'];
              $email = $arry['email'];
              $phone_no = $arry['phone no'];
              $subject = $arry['subject'];
              $complain = $arry['complain'];
              $ref = $arry['ref_no'];
              $remark = $arry['remark'];
              
            
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
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../files/css/custom.css">
  </head>
  <body>
      <div  style="text-align: center;">
        <h1><img src="/files/img/banner2.jpg"></h1>
        <nav class="navbar navbar-expand-sm" style="background:#FC00D5;">
  		    <div class="collapse navbar-collapse" id="navbarSupportedContent">
		    <ul class="navbar-nav mr-auto">
		      <li class="nav-item active">
		        <a class="nav-link" style="color: white;" href="profile.php">Home<span class="sr-only">(current)</span></a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" style="color: white;" href="message.php">Add Complaint</a>
		      </li>
		      <!--<li class="nav-item">-->
		      <!--  <a class="nav-link" style="color: white;" href="logout.php">logout</a>-->
		      <!--</li>-->
		    </ul>
		    <div class="dropdown">
              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color: #FC00D5; border-color: white;">
                <?php if (isset($_SESSION['email'])===true) {echo $_SESSION['email'];}?>
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="logout.php">Logout</a>
              </div>
            </div>
		    </div>
		</div>

  <div class="animated fadeIn my-5">

    <div class="container">
        <h1>Complain Detail: <?php echo $ref ?></h1>
        <div class="">
          <table>
          <?php
            

               echo "<tr> <td> <b> Message Id </b> </td>";
               echo "     <td> ".$id."</td> </tr>";

               echo "<tr> <td> <b> Profile Id </b> </td>";
               echo "     <td> ".$user_id."</td> </tr>";

               echo "<tr> <td> <b> Name </b> </td>";
               echo "     <td> ".$name."</td> </tr>";

               echo "<tr> <td> <b> Username </b> </td>";
               echo "     <td> ".$username."</td> </tr>";

               echo "<tr> <td> <b> Phone no </b> </td>";
               echo "     <td> ".$phone_no."</td> </tr>";

               echo "<tr> <td> <b> Subject </b> </td>";
               echo "     <td> ".$subject."</td> </tr>";

               echo "<tr> <td> <b> Complain </b> </td>";
               echo "     <td> ".$complain."</td></tr>";

               echo "<tr> <td> <b> Refference </b> </td>";
               echo "     <td> ".$ref."</td></tr>";
               
               echo "<tr> <td> <b> Remarks </b> </td>";
               echo "     <td> ".$remark."</td></tr>";
          ?>
          </table>

      </div>
    </div>
  </div>


 
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    

  </body>
</html>
