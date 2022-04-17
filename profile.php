<?php

  require 'core/session.php';
  require 'core/config.php';
  include 'core/user_key.php';

//  require 'core/redirect.php';

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
    
    <link rel="stylesheet" href="files/css/custom.css">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  </head>
  <body>
      
      <?php $emailid = $_SESSION['email'];
            $result = mysql_query("SELECT * FROM `cmp_log` WHERE email='$emailid'");
            $num_rows = mysql_num_rows($result);
            
            ?>
      
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
      
      <div class="container-fluid">
<div class="row" style="padding-left: 2rem; padding-right: 1.0rem; margin-top: 2.0rem;">
    <div class="col-sm-12 col-md-12 col-lg-12">
            <table class="table">
                    <thead style="background-color:#007BFF;">
                        <tr>
                            <th scope="col" style="white-space: nowrap;"><b>User Reference Number</b></th>
                            <th scope="col" style="white-space: nowrap;"><b>Complaint User Name</b></th>
                            <th scope="col" style="white-space: nowrap;"><b>Contact Number</b></th>
                            <th scope="col" style="white-space: nowrap;"><b>Complaint</b></th>
                            <th scope="col" style="white-space: nowrap;"><b>Status</b></th>
                            <th scope="col" style="white-space: nowrap;"><b>View More</b></th>
                        </tr>
                    </thead>
                    <tbody id="geeks">
                        <?php while($data=mysql_fetch_array($result)) { ?>
                            <tr>
                                <td value="<?php echo $data['ref_no'] ?>"  class="macId" style="white-space: nowrap;">
                                    <?php echo $data['ref_no'] ?>
                                </td>
                                <td  value="Burra Kranthi Kiran" class="uuId" style="white-space: nowrap;">
                                   <?php echo $data['name'] ?>
                                </td>
                                <td value="7702597518"  class="lot" style="white-space: nowrap;">
                                    <?php echo $data['phone no'] ?>
                                </td>
                                <td value="Water Problem"  class="model" style="white-space: nowrap;">
                                <?php echo $data['complain'] ?>
                                </td>
                                <td value="Pending"  class="status" style="white-space: nowrap;">
         				        <?php echo $data['status'] ?>
                                </td>
                               <td>
         				        <a class="btn-lg btn-primary" href="message-view.php?id=<?php echo $data[id] ?>">More Details</a>
                                </td>
                                    
                                
                            </tr>
                            <?php } ?>
                           
                    </tbody>
                </table>
            </div>
        
        </div>
    </div>

      





 
  </body>
   <?php
      include 'footer.php';
      ?>
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
</html>
