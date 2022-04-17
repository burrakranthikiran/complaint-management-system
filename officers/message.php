<?php
  require 'session.php';
  require '../core/config.php';
  require 'dummy-key.php';

  $result = mysql_query("SELECT * FROM `cmp_log`");
  $num_rows = mysql_num_rows($result);

  $eng_id = "";
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

  <div class="cover main" style="background:#40C4FF;">
    <h1>Your Inbox,</h1>
  </div>
  <div class="animated fadeIn">

    <div class="container">
        <div class="col-lg-12 ">
          <?php $result = mysql_query("SELECT * FROM `view_cmp` WHERE dummy LIKE '%$eng_session%' ")or die(mysql_error());
            $num_rows = mysql_num_rows($result);
            ?>
              <table class="table" style="margin-top:1rem">
                    <thead style="background-color:#007BFF;">
                        <tr>
                            <th scope="col" style="white-space: nowrap;"><b>User Reference Number</b></th>
                            <th scope="col" style="white-space: nowrap;"><b>Complaint User Name</b></th>
                            <th scope="col" style="white-space: nowrap;"><b>Contact Number</b></th>
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
                                   <?php echo $data['username'] ?>
                                </td>
                                <td value="7702597518"  class="lot" style="white-space: nowrap;">
                                    <?php echo $data['phone no'] ?>
                                </td>
                                <td value="Pending"  class="status" style="white-space: nowrap;">
         				        <?php echo $data['status'] ?>
         				        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" id="statusUpdateButton">
                                  <i class="fas fa-edit"></i>
                                </button>
                                </td>
                               <td>
         				        <a class="btn-lg btn-primary" href="message-view.php?id=<?php echo $data[id] ?>">More Details</a>
                                </td>
                                    
                                
                            </tr>
                            <?php } ?>
                           
                    </tbody>
                </table>

              <br>
              <h2 class="text-center"><?php echo $message; ?></h2>
              <br><br>

          <?php

            while($data=mysql_fetch_array($result)) {
            echo"<div class='admin-data'>";
            echo $data['name'];
            $empty=$data['name'];
            echo "<a class='button view' href='message-view.php?id=$data[id]'>View</a>";
            echo "</div>";

          }
            if (empty($empty)==true) {
              $message = "You Have no Message !!";
            }else{
              $message = "You Have got some Message";

            }


          ?>


          <br><br><br><br><br><br><br><br><br><br><br><br>

        </div>
      </div>
    </div>


      <footer>
      <br><br>&copy <?php echo date("Y"); ?> <?php echo $web_name; ?>
      </footer>

    <script src="../files/js/jquery.js"></script>
    <script src="../files/js/bootstrap.min.js"></script>
    <script src="../files/js/script.js"></script>

  </body>
</html>
