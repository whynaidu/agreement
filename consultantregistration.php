<?php  
session_start();
if(!isset($_SESSION['email'])) // If session is not set then redirect to Login Page
{
 header("Location:login.php"); 
}
include("include/configure.inc.php");
if(!isset($_SESSION['username'])){
 //header("location:../samples/login.php");
}

	//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';
	

if(isset($_POST['sub'])){

  $user_id=$_POST['no'];
  $agent_name=$_POST['name'];
   $mobile_no=$_POST['mobile_no'];
  $office_address=$_POST['office_address'];
   $email=$_POST['email'];
      $rera=$_POST['rera'];
      $prefix=$_POST['prefix'];
   $status=1;
   $pass= rand(100000, 999999);


   $to=$email_no;
   $sub="Password";
 
 $mail = new PHPMailer(true);
 try {
  //Server settings
  $mail->SMTPDebug = SMTP::DEBUG_SERVER;    
  $mail->isSMTP();                             
  $mail->Host       = 'smtp.hostinger.com';      
  $mail->SMTPAuth   = true;                             
  $mail->Username   = "vedant.naidu@tectignis.in";           
  $mail->Password   = 'Vedant@123';                          
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;          
  $mail->Port       = 465;                             

  //Recipients
  $mail->setFrom('vedant.naidu@tectignis.in', 'Tectignis It Solution');
  $mail->addAddress($email, $agent_name);    
  
  //Content
  $mail->isHTML(true);                               
  $mail->Subject = 'Password';
  $mail->Body    = 'Login Detail '.$email.' and '.$pass;
  $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

  if($mail->send()){
    $passwordhash=password_hash($pass,PASSWORD_BCRYPT);

    $sql=mysqli_query($conn,"INSERT INTO `agent_details`(`user_id`,`agent_name`, `email`, `password`, `rera_no`, `office_address`,`mobile_no`,`status`) 
    VALUES ('$user_id','$agent_name','$email','$passwordhash','$rera','$office_address','$mobile_no','$status')");
    if($sql=1){
      $sql=mysqli_query($conn,"select user_id from agent_details order by user_id desc") or die( mysqli_error($conn));;
                      $row=mysqli_fetch_array($sql);
                      $lastid=$row['user_id'];
                      if(empty($lastid)){
						  $number=001;
					  }else{
						  $id=str_pad($lastid + 1, 3,0, STR_PAD_LEFT);
						  $number=$id;
					  }	
      $last_id = mysqli_insert_id($conn);
      header("location:consultantregistration.php");
    }
    else{
      echo "<script>alert('Something Wrong');</script>";
    }
  
  }
  
} catch (Exception $e) {
  echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


  
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Agreerent | Product By Tectignis IT Solutions</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/typicons/typicons.css">
  <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php include("partials/header.php");?>

    <!-- partial -->
    <div class="container-fluid page-body-wrapper err">
      <!-- partial:partials/_settings-panel.html -->
  
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <?php include("partials/sidebar.php");?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-sm-12">
              <div class="home-tab">
                <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                
                </div>
                <div class="tab-content tab-content-basic">
				<div class="row" >
				 <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Consultant Registration</h4>
                  <form class="forms-sample" method="post">
            
                    <div class="form-group row">
                      <label for="exampledno" class="col-sm-2 col-form-label">Document No.</label>
                      <div class="col-sm-10">
					  <?php $sql=mysqli_query($conn,"select user_id from agent_details order by user_id desc") or die( mysqli_error($conn));;
                      $row=mysqli_fetch_array($sql);
                      $lastid=$row['user_id'];
                      if(empty($lastid)){
						  $number="001";
					  }else{
						  $id=str_pad($lastid + 1, 3,0, STR_PAD_LEFT);
						  $number=$id;
					  }					
                      					  ?>
                        <input type="text" name="no" value="<?php echo $number; ?>" class="form-control" id="exampledno" readonly>
							<?php   ?>
                      </div>
                    </div>
						
                   
                    <div class="form-group row">
                      <label for="exampleaddress" class="col-sm-2 col-form-label">Consultant Name</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control"name="name">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputMobile" class="col-sm-2 col-form-label">Office Address</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control"name="office_address">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleaadhaar" class="col-sm-2 col-form-label">Mobile No.</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control"name="mobile_no">
                      </div>
                    </div>
					  <div class="form-group row">
                      <label for="exampleemail" class="col-sm-2 col-form-label">Email ID</label>
                      <div class="col-sm-10">
                        <input type="email" class="form-control"name="email">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="examplepan" class="col-sm-2 col-form-label">Rera No.</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control"name="rera">
                      </div>
                    </div>
					  <div class="form-group row">
                      <label for="examplepan" class="col-sm-2 col-form-label">Document Prefix</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="TECT-00001" name="prefix">
                      </div>
                    </div>
					  <div class="form-group row">
                      <label for="examplepan" class="col-sm-2 col-form-label">Photo</label>
                      <div class="col-sm-10">
                        <input type="file" name="file">
                          Upload
                      </div>
                    </div>
					<div class="col" align="right">
                    <button type="submit" name="sub"class="btn btn-primary  btn-lg" style="color: aliceblue">Submit</button>
					</div>
                  </form>
                </div>
              </div>
            </div>
                    </div>
					</div>
                </div>
              </div>
            </div>
          </div>
        </div>
		</div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
          <?php include("partials/footer.php");?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->

    <!-- page-body-wrapper ends -->
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <script src="vendors/progressbar.js/progressbar.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/jquery.cookie.js" type="text/javascript"></script>
  <script src="js/dashboard.js"></script>
  <script src="js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->
</body>

</html>

