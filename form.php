<?php
include("include/configure.inc.php");
if(isset($_POST["login"])){
	$name=$_POST["name"];
	$email=$_POST["email"];
  $mob_no=$_POST["mob_no"];
  $description=$_POST["description"];
  
  

	$sql = mysqli_query($conn,"INSERT INTO `enquiry`( `name`, `email`, `mob_no`, `description`) VALUES ('$name','$email','$mob_no','$description')") ;
  if($sql==1){
    echo "<script>alert('Register successfully'),window.location='form.php';</script>";
   

  }else{
    echo "<script>alert('something went wrong');</script>";
  }

  }
  

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/typicons/typicons.css">
  <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-6 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="images/logo.svg" alt="logo">
              </div>
              <h4>Hello! let's get started</h4>
              <form class="pt-3"method="post">
              <div class="form-group">
                  <input type="text" class="form-control form-control-lg" name="name" id="name" placeholder="Enter Your Name">
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg" name="email" id="exampleInputEmail1" placeholder="Enter Your Email">
                </div>
                <div class="form-group">
                  <input type="tel" class="form-control form-control-lg" name="mob_no" id="exampleInputPassword1" placeholder="Enter Your Mobile No">
                </div>
                <div class="form-group">
                  <textarea class="form-control form-control-lg" name="description" id="exampleInputPassword1" placeholder="Description"></textarea>
                </div>
                
                <div class="mt-6">
                  <input type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" value="Register" name="login">
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  
                </div>
                
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>
