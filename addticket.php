<?php
session_start();
if(!isset($_SESSION['id'])) // If session is not set then redirect to Login Page
{
 header("Location:login.php"); 
}
include("include/configure.inc.php");
if(isset($_POST['submit'])){
	$client_code=$_POST['client_code'];
	$email=$_POST['email_id'];
  $subject=$_POST['subject'];
	$description=$_POST['description'];

	
	$sql = mysqli_query($conn,"INSERT INTO `ticket`( `client_code`, `email_id`, `subject`, `description`) VALUES ('	$client_code','$email', '$subject','$description')") ;
  if($sql==1){
    echo "<script>alert('Register successfully'),window.location='addticket.php';</script>";
   

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
  <title>Star Admin2 </title>
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
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
  
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <?php include("partials/sidebar.php");?>      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-sm-12">
              <div class="home-tab">
                <div class="tab-content tab-content-basic">
				<div class="row" >
				 <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
					<div>
          <h4 class="card-title card-title-dash">New Enquire</h4>
					</div>
                  <form class="forms-sample" method="post">
					  <div class="row">
					  <div class="col-md-12 ">
              
                    <div class="form-group row">
                      <label for="exampledno" class="col-sm-3 col-form-label">Client Code</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="client_code" name="client_code" placeholder="Enter Code">
                      </div>
                    </div>
						</div>					  
						<div class="col-md-12 ">
                    <div class="form-group row">
                      <label for="exampledno" class="col-sm-3 col-form-label">Email</label>
                      <div class="col-sm-9">
                        <input type="email" class="form-control" id="email" name="email_id" placeholder="Enter Email">
                      </div>
                    </div>
						</div> 
					   <div class="col-md-12 ">
                    <div class="form-group row">
                      <label for="exampleprop" class="col-sm-3 col-form-label">Subject</label>
                      <div class="col-sm-9">
                        <select class="form-control" id="suject" name="subject" placeholder="Enter Subject">
                          <option>Flat</option>
                          <option>Shop</option>
                        </select>
                      </div>
                    </div>
						</div>
					  <div class="col-md-12 ">
                    <div class="form-group row">
                      <label for="exampledno" class="col-sm-3 col-form-label">Description</label>
                      <div class="col-sm-9">
                      <textarea class="form-control" name="description" id="description" type="text"  style="height: 10rem" placeholder="Enter Description" data-sb-validations="required"></textarea>
                      </div>
                    </div>
					  </div>
					 
                   
				
					  </div>
					  <div class="col" align="right">
            <button type="submit" name="submit" class="btn btn-primary  btn-lg" style="color: aliceblue">Submit</button>        
            <button type="submit" name="submit" class="btn btn-danger  btn-lg" style="color: aliceblue">Cancel</button>
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
                
<script>document.title="Add Enquiry";
// document.getElementById("welcome").innerHTML = document.title;
</script>
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

