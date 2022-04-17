<?php

    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    require '../core/session.php';
    require '../core/config.php';
    require '../core/admin-key.php';
    //for session
    $session=$_SESSION['email'];
    $today = date("Y-m-d");
    $engi = mysql_query("SELECT * FROM `cmp_log` WHERE `ref_no` LIKE '%$today%'");
    $count_of_complaints = mysql_num_rows($engi);
    $ref = "RJ-".date("Y-m-d")."-".str_pad($count_of_complaints + 1, 3, "0", STR_PAD_LEFT);$error = "";$message = "";$alpha="M y a p p ";
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CPMS  </title>
    <link rel="shortcut icon" href="files/img/ico.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="files/css/custom.css">
    </head>
  <body>
      <?php
        $query1=mysql_query("SELECT * FROM `circle` WHERE email LIKE '%$session%'");
        while( $arry=mysql_fetch_array($query1) ) {
            
        }
        
        if(empty($_POST)===false){
            $name=mysql_real_escape_string($_POST['name']);
            $email = "NA";
            $username='Operator';
            $id=00;
            $phoneno =mysql_real_escape_string($_POST['phoneno']);
            $subject = mysql_real_escape_string($_POST['subject']);
            $complain = mysql_real_escape_string($_POST['complain']);
            $mandal = mysql_real_escape_string($_POST['mandal']);
            $village = mysql_real_escape_string($_POST['village']);
            $address = mysql_real_escape_string($_POST['address']);
            echo $id.','; echo $name.','; echo $username.','; echo $email.','; echo $phoneno.','; echo $mandal.','; echo $village.','; echo $subject.','; echo $complain.','; echo $ref; echo $address;
            if(empty($phoneno) || empty($subject) || empty($complain)){
                echo "Here";
                $error = "Missing Phone/Subject/Complain";
            }elseif (!preg_match("/^[0-9]*$/",$phoneno)) {
                $error = "Invalid Phone Number";
            }else{
                $queryOne = mysql_query("INSERT INTO `cmp_log` (user_id, name, username, email, `phone no`, address, mandal, village, subject, complain, ref_no) VALUES ('$id','$name','$username','$email','$phoneno','$address','$mandal','$village','$subject','$complain','$ref')") or die(mysql_error());
                $message = "Your Complain has been Registerd";
            }
        }
    ?>
    <div style="text-align: center;">
        <h1><img src="/files/img/banner2.jpg"></h1>
    </div>
    
    <nav class="navbar navbar-expand-sm" style="background:#FC00D5;">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
		    <ul class="navbar-nav mr-auto">
		        <!--<li class="nav-item active">-->
		        <!--    <a class="nav-link" style="color: white;" href="profile.php">Home<span class="sr-only">(current)</span></a>-->
		        <!--</li>-->
		        <!--<li class="nav-item">-->
		        <!--    <a class="nav-link" style="color: white;" href="message.php">Add Complaint</a>-->
		        <!--</li>-->
		        <!--<li class="nav-item">-->
		        <!--    <a class="nav-link" style="color: white;" href="logout.php">logout</a>-->
		        <!--</li>-->
		        
		    </ul>
		    <div class="dropdown">
              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color: #FC00D5; border-color: white;">
                <?php
                    if (isset($_SESSION['username'])===true) {echo $_SESSION['username'];}
                ?>
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="logout.php">Logout</a>
              </div>
            </div>
		 </div>
	</nav>
             
<div class="container" style="margin-top:3rem; margin-bottom:3rem;">
    <div class="row">
        <div class="col-6 mx-auto">
            <h1 class="display-4">Grievance Details</h1>
            <div class="card shadow border">
                <div class="card-body d-flex flex-column align-items-center">
                    <?php 
                        if($error || $message) {
                            echo"<p><span class='error'>".$error."</p></span>";
                            echo "<p><span class='message'>".$message."</p></span>";
                        }
                      ?>
                    <form style="width: 100%;" method="post" autocomplete="off">
                      <div class="form-group">
                        <label for="exampleFormControlInput1">Reference Number</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" value="<?php echo $ref;  ?>">
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlInput1">Name</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="name">
                      </div>
                      
                      <div class="form-group">
                        <label for="exampleFormControlInput1">Phone Number</label>
                        <input type="Reference Number" class="form-control" id="exampleFormControlInput1" name="phoneno">
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlSelect1" name="mandal">Mandal</label>
                        <select class="form-control" id="mandalDropDown" name="mandal">
                        <option value="Default">Choose Your Mandal</option>
                          <option value="Boinpalli">Boinpalli</option>
                          <option value="Chandurthi">Chandurthi</option>
                          <option value="Ellanthakunta">Ellanthakunta</option>
                          <option value="Gambhiraopet">Gambhiraopet</option>
                          <option value="Konaraopet">Konaraopet</option>
                          <option value="Mustabad">Mustabad</option>
                          <option value="Rudrangi">Rudrangi</option>
                          <option value="Thangallapally">Thangallapally</option>
                          <option value="Veernapally">Veernapally</option>
                          <option value="Vemulawada">Vemulawada</option>
                          <option value="Vemulawada Rural">Vemulawada Rural</option>
                          <option value="Yellareddypet">Yellareddypet</option>
                          
                        </select>
                      </div>
                       <div class="form-group">
                        <label for="exampleFormControlSelect1" name="village">Village</label>
                        <select class="form-control" id="villageDropDown" name="village">
                            <option value="Default">Choose Your Village</option>
                        </select>
                      </div>
                      
                      <div class="form-group">
                        <label for="exampleFormControlInput1">Address</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="address">
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlInput1">Subject</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="subject">
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlTextarea1">Complaint</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="complain"></textarea>
                      </div>
                       <div class="form-group">
    			<label for="exampleFormControlFile1">Choose File</label>
    			<input type="file" class="form-control-file"  id="exampleFormControlFile1">
 		      </div>
 		      
 		      <button type="submit" class="btn btn-primary" style="width:100%;">Submit</button>
                      
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
   
   
          
          
          
          
          
       
     
     <?php
    include 'footer.php';
    ?>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            var boinpalli = ["Ananthapalli", "Boinpalli", "Burugupalli", "Deshaipalli", "Dundrapalli", "Gundannapalli", "Jaggaraopalli", "Kodurupaka", "Korem", "Kothapeta", "Malkapur", "Mallapur", "Manwada", "Marlapeta", "Narsingapur", "Neelojipalli", "Ramannapeta", "Rathnampeta", "Stambampalli", "Thadagonda", "Varadavelli", "Venkatraopalli", "Vilasagar"];
            var chandurthi = ["Ananthapalli", "Ashireddypalli", "Bandapalli", "Chandurthi", "Devuni thanda", "Jogapur", "Kattalingampet", "Kistampet", "Kothapeta", "Lingampet", "Mallial", "Marrigadda", "Moodapalli", "Narsingapoor", "Ramannapeta", "Ramaraopalli", "Sanugula", "Thimmapoor", "Yengal"];
            var ellanthakunta = ["Ananthagiri", "Anantharam", "Arepally", "Chikkuduvanipally", "Dacharam", "Ellanthakunta", "Galipally", "Gollapally", "Gudepupally", "Jangamreddipally", "Jawaharpet", "Kandikatkoor", "Kesannapally", "Kishtaraopally", "Muskanipet", "Narsakkapet", "Obulapuram", "Pathikuntapalli", "Peddalingapuram", "Pottur", "Rahimkhanpet", "Ramojipet", "Rangampeta", "Repaka", "Sirikonda", "Somarampet", "Thallapally", "Theniguvaripally", "Thippapuram", "Vallampatla", "Vanthadupula", "Veljipuram", "Venkatraopally"];
            var gambhiraopet = ["Dammanapet", "Desaipet", "Gajasingavaram", "Gambhiraopet", "Gorintala", "Jagadhmba thanda", "Kollamaddi", "Kothapally", "Laxmipur", "Lingannapet", "Mallareddipet", "Mallupalli", "Mucherla", "Musthfanagar", "Nagampet", "Narmala", "Ponnanalapally", "Rajeshwar Rao Colony", "Rajupeta", "Samudralingapoor", "Srigadha"];
            var konaraopet = ["Azmeera Thanda", "Bausaipet", "Dharmaram", "Eglaspoor", "Gollapalli(Kolanur)", "Gollapalli(Vattimalla)", "Govindaraopet Thanda", "Jai Sevalal", "Bhukyareddy Thanda", "Jai Sevalal Uru Thanda", "Kammaripet Thanda", "Kanagarthi", "Kolanoor", "Konaraopet", "Kondapoor", "Malkapet", "Mamidipalli", "Mangallapalli", "Marrimadla", "Marthanpet", "Nagaram", "Nimmapalli", "Nizamabad", "Pallimaktha", "Ramannapet", "Shivangalapalli", "Suddala", "Vattimalla", "Venakatraopet"];
            var mustabad = ["Avunoor", "Bandankal", "Cheekod", "Chippalapally", "Gannevanipalli", "Gopalpalli", "Gudem", "Gudur", "Kondapur", "Maddikunta", "Moinkunta", "Moraipally", "Morrapoor", "Musthabad", "Namapur", "Pothugal", "Ramlaxmanpalli", "Ramreddypalli", "Sevalal Thanada", "Terlumaddi", "Turkapalli", "Venkatraopalli"];
            var rudrangi = ["Addabore Thanda", "Badi Thanda", "Chinthamani Thanda", "Degavath Thanda", "Gaidigutta thanda", "Manala", "Rooplanayak Thanda", "Rudrangi", "Sarpanch Thanda", "Veeruni Thanda"];
            var thangallapally = ["Ankireddypally", "Ankusapur", "Baddenapalli", "Balamallupally", "Baswapur", "Cheerlavancha", "Chinnalingapur", "Chinthalatana", "Deshaipally", "Gandilachapeta", "Gopalraopalle", "Indirammacolony", "Indiranagar", "Jillella", "Kasbekatkur", "Laxmipur", "Mallapur", "Mandepally", "Narsimhulapally", "Nerella", "Obulapur", "Padmanagar", "Papaiahpally", "Rallapeta", "Ramachandrapur", "Ramannapally", "Sarampally", "Thadur", "Thangallapalli", "Venugopalpur"];
            var vemulawada = ["Adavipadira", "Babai Cheruvu Thanda", "Banjeru", "Bhavusing Nayak Thanda", "Bhukya Thanda", "Erragadda Thanda", "Garjanapally", "Jawaharlal Nayak Thanda", "Kancharla", "Lalsingh Thanda", "Maddimalla", "Maddimalla Thanda", "Rangampet", "Seetharam Nayak Thanda", "Shanthi Nagar", "Vanpally", "Veernapally", "Anupuram (R&R Colony)", "Arepalli", "Chandragiri", "Cheerlavancha (R&R Colony)", "Chintaltana (R&R Colony)", "Gurramvanipalli (R&R Colony)", "Kodumunja (R&R Colony)", "Marupaka", "Rudraram (R&R Colony)", "Sankepalle", "Shabashpalli (R&R Colony)"];
            var vemulawadaRural = ["Achanapalli", "Balarajapalli", "Bollaram", "Chekkapalli", "Edurugatla", "Fazilnagar", "Hanumajipet", "Jayavaram", "Lingamapalli", "Mallaram", "Marripalli", "Nagaiahpalli", "Namiligundupalli", "Nookalamarri", "Thurkashinagar", "Vattemla", "Venkatampalli"];
            var yellareddypet = ["Agraharam", "Akkapally", "Almaspoor", "Bakurpally Thanda", "Bandalingampally", "Boppapur", "Bugga Rajeshwara Thanda", "Devunigutta Thanda", "Dumala", "Gollapally", "Gundaram", "Guntapally Cheruvu Thanda", "Haridas Nagar", "Kistunayak Thanda", "Korutlapet", "Narayanapoor", "Padira", "Pothireddyapally", "Ragatlapally", "Rajannapet", "Singaram", "Thimmapoor", "Venkatapoor", "Yellareddypet"];
    
            var mandalArray = [boinpalli, chandurthi, ellanthakunta, gambhiraopet, konaraopet, mustabad, rudrangi, thangallapally, vemulawada, vemulawadaRural, yellareddypet]
        
       
            $("#mandalDropDown").change(function(){
                switch($(this).val()){
                    case "Boinpalli":
                        boinpalli.map((e, i) => {
                            $("#villageDropDown").append(`<option value="${e}"> ${e} </option>`)
                        })
                    case "Chandurthi":
                        chandurthi.map((e, i) => {
                            $("#villageDropDown").append(`<option value="${e}"> ${e} </option>`)
                        })
                    case "Ellanthakunta":
                        ellanthakunta.map((e, i) => {
                            $("#villageDropDown").append(`<option value="${e}"> ${e} </option>`)
                        })
                    case "Gambhiraopet":
                        gambhiraopet.map((e, i) => {
                            $("#villageDropDown").append(`<option value="${e}"> ${e} </option>`)
                        })
                    case "Konaraopet":
                        konaraopet.map((e, i) => {
                            $("#villageDropDown").append(`<option value="${e}"> ${e} </option>`)
                        })
                    case "Mustabad":
                        mustabad.map((e, i) => {
                            $("#villageDropDown").append(`<option value="${e}"> ${e} </option>`)
                        })
                    case "Rudrangi":
                        rudrangi.map((e, i) => {
                            $("#villageDropDown").append(`<option value="${e}"> ${e} </option>`)
                        })
                }
            })
        })
    </script>
  </body>
</html>
