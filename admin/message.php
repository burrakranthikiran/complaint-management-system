<?php
  require '../core/session.php';
  require '../core/config.php';
  require '../core/admin-key.php';

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
    <!--<link rel="stylesheet" href="../files/css/bootstrap.css">-->
    <link rel="stylesheet" href="../files/css/custom.css">
    
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<script src="https://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>
  </head>
  <body>

  <?php require 'nav.php'; ?>
  <?php
        $query1=mysql_query("SELECT * FROM `circle` WHERE email LIKE '%$session%'");
        while( $arry=mysql_fetch_array($query1) ) {
            
        }
        
        if(empty($_POST)===false){
            $refNum=mysql_real_escape_string($_POST['comRefNum']);
            $status =mysql_real_escape_string($_POST['status']);
            $queryOne = mysql_query("UPDATE `cmp_log` SET status='$status' WHERE `ref_no`='$refNum'") or die(mysql_error());
            $queryTwo = mysql_query("UPDATE `view_cmp` SET status='$status' WHERE `ref_no`='$refNum'") or die(mysql_error());
            $message = "Status Updated";
        }
    ?>
  <div class="animated fadeIn">
    <div class="" style="width: 1100px; padding-top: 20px; background: #fff; position: relative; float: left; left: 230px;">
      <div class="col-lg-12">
          <div class="">
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

            <!--<div class="track theme">-->
            <!--    Complaints<br><p><a href="https://docs.google.com/spreadsheets/d/1-7kQy2tfoPZsIJR1wpy4cnmH_k7uLJfDp47ddmWd-rk/edit?usp=sharing">2239</a></p>-->
            <!--</div>-->

            <!--<div class="track vio">-->
            <!--    Total Officers <br> <p><?php echo $count_engi;?></p>-->
            <!--</div>-->

            <!--<div class="track red">-->
            <!--    Complaints <br> <p><?php echo $count_cmp;?></p>-->
            <!--</div>-->

            <!--<div class="track blue">-->
            <!--    Forwarded <br> <p><?php echo $count_frd;?></p>-->
            <!--</div>-->
            
            

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

  </div>

    <div class="div" style="width: 85%;">
        <div class="col">
          <?php $result = mysql_query("SELECT * FROM `cmp_log`");
            $num_rows = mysql_num_rows($result);
            ?>
            <div class="row">
            <div class="col"><h1>List of Grievances <br><button class="btn btn-outline-success my-2 my-sm-0" id="export_button" type="submit">Export</button></h1></div>
            <div class="col"></div>
            </div>
        <input type="text" name="username" id="gfg" placeholder="Search" text-size="1" style="width: 100%;">
        <div id="wrap" class="container-fluid" style="height: 500px; overflow: auto; margin-top:1rem; ">
         <table class="sortable table table-striped table-bordered" id="employee_data" style="">
                    <thead style="background-color:#007BFF;">
                        <tr>
                            <th scope="col" style="white-space: nowrap;"><b>User Reference Number</b></th>
                            <th scope="col" style="white-space: nowrap;"><b>Complaint User Name</b></th>
                            <th scope="col" style="white-space: nowrap;"><b>Contact Number</b></th>
                            <th scope="col" style="white-space: nowrap;"><b>Mandals</b></th>
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
                                <td value="7702597518"  class="lot" style="white-space: nowrap;">
                                    <?php echo $data['mandal'] ?>
                                </td>
                                <td value="Pending"  class="status" style="white-space: nowrap;">
         				        <?php echo $data['status'] ?>
         				        <!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" id="statusUpdateButton">-->
                                  <!--<i class="fas fa-edit"></i>-->
                                </button>
                                </td>
                               <td style="white-space: nowrap;">
         				        <a class="btn-lg btn-primary" href="message-view.php?id=<?php echo $data[id] ?>">More Details</a>
                                </td>
                                    
                                
                            </tr>
                            <?php } ?>
                           
                    </tbody>
                </table>
        </div>
      </div>

  </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update Grievance Status</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="post">
              <div class="form-group">
                <label for="exampleInputEmail1">Complaint Reference No.</label>
                <input type="text" class="form-control" id="complaintReferenceNumber" name="comRefNum">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Status</label>
                <select class="custom-select" id="inputGroupSelect01" name="status">
                    <option selected>Choose Status</option>
                    <option value="Not Initiated">Not Initiated</option>
                    <option value="WIP">WIP</option>
                    <option value="Resolved">Resolved</option>
                    <option value="Escalated">Escalated</option>
                </select>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>

      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $("tr").find('td .btn').click(function(){
                $("#complaintReferenceNumber").val($(this).closest('tr').find('.macId').text().trim());
            })
        })
    </script>
    <script src="https://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>
    <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
     <script>
            $(document).ready(function() {
                $("#gfg").on("keyup", function() {
                    var value = $(this).val().toLowerCase();
                    $("#geeks tr").filter(function() {
                        $(this).toggle($(this).text()
                        .toLowerCase().indexOf(value) > -1)
                    });
                });
            });
        </script>
        
        <script>
        function myFunction() {
          document.getElementById("employee_data").classList.add("mystyle");
          }
    </script>

     <script>
        function html_table_to_excel(type){
        var data = document.getElementById('employee_data');
        var file = XLSX.utils.table_to_book(data, {sheet: "sheet1"});
        XLSX.write(file, { bookType: type, bookSST: true, type: 'base64' });
        XLSX.writeFile(file, 'file.' + type);
        }
        
        const export_button = document.getElementById('export_button');
        
        export_button.addEventListener('click', () => {
        
        html_table_to_excel('xlsx');
        
         });

    </script>

<script>
    document.getElementById("wrap").addEventListener("scroll",function(){
    var translate = "translate(0,"+this.scrollTop+"px)";
    this.querySelector("thead").style.transform = translate;
    });
    </script>

  </body>
</html>
