<?php
  require '../core/session.php';
  require '../core/config.php';
  require '../core/admin-key.php';

  $id = $_GET['id'];
	$result = mysql_query("SELECT * FROM `cmp_log` WHERE id='$id'");
	$arry = mysql_fetch_array($result);
	if (!$result) {
			die("Error: Data not found..");
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
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
  </head>
  <body>
  <?php require 'nav.php';?>

  <div class="animated fadeIn">


    <div class="div">
        <div class="col-lg-12 ">

          <?php
          echo "<a class='button logout' href ='m_delete.php?id=$id' onClick=\"javascript:return confirm ('Are you really want to delete ?');\">Delete</a>";
           ?>
         
           <br><br><br><br>
           
      
          <table id="tab">
              
             <tr>
             <td colspan="5"><h1>Rajanna Siricilla Complaint Reference Number</h1></td>
             <tr>
              
          <?php
            $query1=mysql_query("SELECT * FROM `cmp_log` WHERE id='$id'");
            while( $arry=mysql_fetch_array($query1) ) {

              $complainid = $arry['id'];
              $user_id = $arry['user_id'];
              $name = $arry['name'];
              $username = $arry['username'];
              $email = $arry['email'];
              $phone_no = $arry['phone no'];
              $subject = $arry['subject'];
              $complain = $arry['complain'];
              $ref = $arry['ref_no'];
              $remark = $arry['remark'];
              $fileName = $arry['filename'];
            }

               echo "<tr> <td> <b> Message Id </b> </td>";
               echo "     <td> ".$complainid."</td> </tr>";

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
               
               echo "<tr> <td> <b> Remarks </b> </td>";
               echo "     <td> ".$remark."</td></tr>";

               echo "<tr> <td> <b> Refference </b> </td>";
               echo "     <td> ".$ref."</td></tr>";
               if($fileName) {
                    echo "<tr> <td> <b> Attachments (jpg/pdf) </b> </td>";
                    echo "     <td> <a href='../files/attachments/$fileName' >Download</a></td></tr>";
               }
          ?>
          
          </table>
                 <p>
        <input type="button" value="Print Table" onclick="myApp.printTable()" />
    </p>


          <div class="field-off jumbotron">
            <br>
            <h2>Forward Grievance</h2>
            <?php $db=mysql_query("SELECT * FROM `dummy`"); ?>
    	        <select class="form-control selectOfficer" style="height: 100%" id="chooseOfficer">
    	           <option>Choose the Officer to Send</option> 
    	           <?php
                        $no=1;
                        while($data=mysql_fetch_array($db)) {
                           $name = $data['name'];
                          $id_dummy = $data['id'];
                          $post = $data['post'];
                          print("<option data-id='$id_dummy' data-name='$name'>$id_dummy - $name - [ $post ]</option>");
                        }
                
                    ?>
    	        </select>
    	        <a class="btn btn-primary" style="margin-left: 2rem;" id="grievanceSubmit">Submit</a>
            
            

                <div class="li">
            
            
                </div>
          </div>
          <br><br>

      </div>
    </div>
  </div>


    <script src="../files/js/jquery.js"></script>
    <script src="../files/js/bootstrap.min.js"></script>
    <script src="../files/js/script.js"></script>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
  </body>
  
  <script>
  
    $("#chooseOfficer").on('select2:select', function (e) {
        var data = e.params.data;
        data = data.text.split('-');
        
        $('#grievanceSubmit').attr('href', `forward.php?dummy=${data[1].trim()} & id=${data[0].trim()} & com-id=${'<?php echo $complainid ?>'}`);
    });
    
    var myApp = new function () {
        this.printTable = function () {
            var tab = document.getElementById('tab');

            var style = "<style>";
                style = style + "table {width: 100%;font: 17px Calibri;}";
                // style = style + "table, th, td {border: solid 1px #DDD; border-collapse: collapse;";
                // style = style + "padding: 2px 3px;text-align: center;}";
                style = style + "</style>";

            var win = window.open('', '', 'height=700,width=700');
            win.document.write(style);          //  add the style.
            win.document.write(tab.outerHTML);
            win.document.close();
            win.print();
        }
    }
    
    $('.selectOfficer').select2();
    
    
    
    </script>
</html>
