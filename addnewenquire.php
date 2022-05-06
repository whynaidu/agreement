<?php
session_start();
if(!isset($_SESSION['id'])) // If session is not set then redirect to Login Page
{
 header("Location:login.php"); 
}
include("include/configure.inc.php");
if(isset($_POST['submit'])){
	$name=$_POST['client_name'];
	$address=$_POST['address'];
	$mobile=$_POST['mobile_no'];
	$requirement=$_POST['requirement'];
	$location=$_POST['location'];
  $type=$_POST['type'];
$from=$_POST['from'];
  $area=$_POST['area'];
	
	$sql=mysqli_query($conn,"INSERT INTO `leads`(`user_id`, `from`,`client_name`, `mobile`,`type`, `requirement`, `area`, `location`) VALUES ('".$_SESSION['id']."','$from','$name','$mobile','$type','$requirement','$area','$location')");
	if($sql==1){	
    header("location:addnewenquire.php");
	}else{
		echo "<script>alert('Something went wrong');</script>";
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
                      <label for="exampledno" class="col-sm-2 col-form-label">From Name</label>
                      <div class="col-sm-10">
                        <Select class="form-control" id="exampledno" name="from" required>
                          <option selected>Select  </option>
                          <option value="facebook">FaceBook </option>
                          <option value="instagram">Instagram </option>
                          <option value="walkin">Walkin </option>
                        </select>

                      </div>
                    </div>
						</div>	
              
					  <div class="col-md-6 ">
              
                    <div class="form-group row">
                      <label for="exampledno" class="col-sm-3 col-form-label">Client Name</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampledno" name="client_name"  placeholder="Enter Name">
                      </div>
                    </div>
						</div>					  
						<div class="col-md-6 ">
                    <div class="form-group row">
                      <label for="exampledno" class="col-sm-3 col-form-label">Mobile No.</label>
                      <div class="col-sm-9">
                        <input type="tel" class="form-control" id="examplemob" name="mobile_no"  placeholder="Enter Mobile No">
                      </div>
                    </div>
						</div> 
					   <div class="col-md-6 ">
                    <div class="form-group row">
                      <label for="exampleprop" class="col-sm-3 col-form-label">Property Type</label>
                      <div class="col-sm-9">
                        <select class="form-control" id="exampleSelectProperty" name="type">
                          <option>Flat</option>
                          <option>Shop</option>
                        </select>
                      </div>
                    </div>
						</div>
					  <div class="col-md-6 ">
                    <div class="form-group row">
                      <label for="exampledno" class="col-sm-3 col-form-label">Requirement</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="examplereq" name="requirement"  placeholder="Enter Requirement">
                      </div>
                    </div>
					  </div>
					  <div class="col-md-6 ">
                    <div class="form-group row">
                      <label for="exampledno" class="col-sm-3 col-form-label">Area</label>
                      <div class="col-sm-9">
                        <input type="number" class="form-control" id="examplearea"name="area" placeholder="Enter Area">
                      </div>
                    </div>
					  </div> 
                   
						<div class="col-md-6 ">
                    <div class="form-group row">
                      <label for="exampledno" class="col-sm-3 col-form-label">Location</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="examplelocation"name="location" placeholder="Enter Location">
                      </div>
                    </div>
						</div> 
					  </div>
					  <div class="col" align="right">
                    <button type="submit" name="submit" class="btn btn-primary  btn-lg" style="color: aliceblue">Submit<i class="mdi mdi-chevron-right"></i></button>
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
document.getElementById("welcome").innerHTML = document.title;
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

