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
    <link rel="stylesheet" href="../files/css/bootstrap.css">
    <link rel="stylesheet" href="../files/css/custom.css">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<script src="https://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>
  </head>
  <body>

  <?php require 'nav.php'; ?>
  <div class="animated fadeIn">

    <div class="div" style="margin-left: 1rem;">

      <!-- Nav tabs -->
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#users" aria-controls="home" role="tab" data-toggle="tab">Registered Users</a></li>
        <li role="presentation"><a href="#officers" aria-controls="profile" role="tab" data-toggle="tab">Registered Officers</a></li>
        <li role="presentation"><a href="#analytics" aria-controls="messages" role="tab" data-toggle="tab">Analytics</a></li>
      </ul>
    
      <!-- Tab panes -->
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="users">
            <?php
            $result = mysql_query("SELECT * FROM `circle`");
            $num_rows = mysql_num_rows($result);
          ?>
              <div class='admin-data'>
                Registered User
                <span class='button view' href=''><?php echo "$num_rows";?></a>
              </div><br><br><br><br><br>
          <?php
            $db=mysql_query("SELECT * FROM `circle` ");
            while($data=mysql_fetch_array($db)) {
            echo"<div class='admin-data'>";
            echo $data['name'];
            echo "<a class='button view' href='user_data.php?id=$data[id]'>View</a>";
            echo "</div>";
           }
          ?>
        </div>
        <div role="tabpanel" class="tab-pane" id="officers">
            <?php $result = mysql_query("SELECT * FROM `dummy`");
              $num_rows = mysql_num_rows($result);
            ?>
                <div class='admin-data'>
                  Registered Officers
                  <span class='button view' href=''><?php echo "$num_rows";?></a>
                </div><br><br><br><br><br>
            <?php
              $db=mysql_query("SELECT * FROM `dummy` ");
              while($data=mysql_fetch_array($db)) {
              echo"<div class='admin-data'>";
              echo $data['name'];
              echo "<a class='button view' href='user-engineer.php?id=$data[id]'>View</a>";
              echo "</div>";
             }
            ?>
        </div>
        <div role="tabpanel" class="tab-pane" id="analytics">
            <?php
              $db=mysql_query("SELECT SUM(status='Resolved') as Resolved, SUM(status='Not Initiated') as 'Not Initiated', SUM(status='WIP') as 'WIP', SUM(status='Escalated') as 'Escalated', SUM(status='') as 'TOTAL', dummy FROM `view_cmp` GROUP BY dummy");
            ?>
            <h1>Reports<br><button class="btn btn-outline-success my-2 my-sm-0" id="export_button" type="submit">Export</button></h1>
            <input type="text" name="username" id="gfg" placeholder="Search" text-size="1" style="width: 100%;">
        <div id="wrap" class="container-fluid" style="height: 500px; overflow: auto; margin-top:1rem; ">
         <table class="sortable table table-striped table-bordered" id="employee_data" style="">
                    <thead style="background-color:#007BFF;">
                        <tr>
                            <th scope="col" style="white-space: nowrap;"><b>Officer's Name</b></th>
                            <th scope="col" style="white-space: nowrap;"><b>Resolved</b></th>
                            <th scope="col" style="white-space: nowrap;"><b>Not Initiated</b></th>
                            <th scope="col" style="white-space: nowrap;"><b>WIP</b></th>
                            <th scope="col" style="white-space: nowrap;"><b>Escalated</b></th>
                             <th scope="col" style="white-space: nowrap;"><b>Total Complaints</b></th>
                        </tr>
                    </thead>
                    <tbody id="geeks">
                        <?php while($data=mysql_fetch_array($db)) { ?>
                            <tr>
                                <td value="<?php echo $data['dummy'] ?>"  class="macId" style="white-space: nowrap;">
                                    <?php echo $data['dummy'] ?>
                                </td>
                                <td  value="Burra Kranthi Kiran" class="uuId" style="white-space: nowrap;">
                                   <?php echo $data['Resolved'] ?>
                                </td>
                                <td value="7702597518"  class="lot" style="white-space: nowrap;">
                                    <?php echo $data['Not Initiated'] ?>
                                </td>
                                <td value="7702597518"  class="lot" style="white-space: nowrap;">
                                    <?php echo $data['WIP'] ?>
                                </td>
                                <td value="7702597518"  class="lot" style="white-space: nowrap;">
                                    <?php echo $data['Escalated'] ?>
                                </td>
                                <td value="7702597518"  class="lot" style="white-space: nowrap;">
                                    <?php echo $data['Resolved'] + $data['Escalated'] + $data['Not Initiated'] + $data['WIP'] ?>
                                </td>
                            </tr>
                            <?php } ?>
                           
                    </tbody>
                </table>
        </div>
        </div>
      </div>
    
    </div>
    
    <!--Users client-->
    <div class="div">
        <div class="col-lg-12 ">
          
        </div>

        <div class="baro"></div>
      <!--Engineers-->
          <div class="col-lg-12 ">

            
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
    
    <script src="../files/js/jquery.js"></script>
    <script src="../files/js/bootstrap.min.js"></script>
    <script src="../files/js/script.js"></script>

  </body>
</html>
