<?php
  require 'session.php';
  require '../core/config.php';
  #require '../core/admin-key.php';

  $id = $_GET['id'];
	$result = mysql_query("SELECT * FROM `view_cmp` WHERE id='$id'");
	$arry = mysql_fetch_array($result);
	if (!$result) {
			die("Error: Data not found..");
		}

    $query1=mysql_query("SELECT * FROM `view_cmp` WHERE id='$id'");
    while( $arry=mysql_fetch_array($query1) ) {

      #$id = $arry['id'];

      $name = $arry['name'];

      $email = $arry['email'];
      $phone_no = $arry['phone no'];
      $subject = $arry['subject'];
      $complain = $arry['complain'];
      $ref = $arry['ref_no'];
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
  <?php require 'nav.php';?>
  
  <div class="animated fadeIn">
    <div class="container">
        <div class="col-lg-12 ">



           <br><br>

            <div class="colr" style="margin-top: 5rem;">
                <h3>Message from <?php echo $name;?> </h3>
            </div>


           <br><br><br>
          <table>
            <?php
              $query1=mysql_query("SELECT * FROM `view_cmp` WHERE id='$id'");
              while( $arry=mysql_fetch_array($query1) ) {


                $user_id = $arry['user_id'];
                $name = $arry['name'];
              #  $username = $arry['username'];
                $email = $arry['email'];
                $phone_no = $arry['phone no'];
                $subject = $arry['subject'];
                $complain = $arry['complain'];
                $ref = $arry['ref_no'];
                $fileName = $arry['filename'];
              }

                 echo "<tr> <td> <b> Message Id </b> </td>";
                 echo "     <td> ".$id."</td> </tr>";




                 echo "<tr> <td> <b> Name </b> </td>";
                 echo "     <td> ".$name."</td> </tr>";



                 echo "<tr> <td> <b> Phone no </b> </td>";
                 echo "     <td> ".$phone_no."</td> </tr>";

                 echo "<tr> <td> <b> Subject </b> </td>";
                 echo "     <td> ".$subject."</td> </tr>";

                 echo "<tr> <td> <b> Complain </b> </td>";
                 echo "     <td> ".$complain."</td></tr>";

                 echo "<tr> <td> <b> Refference </b> </td>";
                 echo "     <td> ".$ref."</td></tr>";
                 
                
                 if($fileName) {
                    echo "<tr> <td> <b> Attachments (jpg/pdf) </b> </td>";
                    echo "     <td> <a href='../files/attachments/$fileName' >Download</a></td></tr>";
               }
            ?>
            </table>




          <br><br>

      </div>
    </div>

  </div>

  
    <script src="../files/js/jquery.js"></script>
    <script src="../files/js/bootstrap.min.js"></script>
    <script src="../files/js/script.js"></script>

  </body>
</html>
