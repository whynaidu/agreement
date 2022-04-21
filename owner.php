<?php  
session_start();
if(!isset($_SESSION['email'])) // If session is not set then redirect to Login Page
{
 header("Location:login.php"); 
}
include("include/configure.inc.php");
$id=$_GET['id'];
if(isset($_POST['submit'])){
	$abbreviation=$_POST['abbreviation'];
	$name=$_POST['name'];
	$address=$_POST['address'];
	$mobile=$_POST['mobile'];
	$aadhaar=$_POST['aadhaar'];
	$pancard=$_POST['pancard'];
  $age=$_POST['age'];
	
	$sql=mysqli_query($conn,"INSERT INTO `owner`(`document_no`, `abbreviation`, `fullname`,`age`, `address`, `mobile`, `aadhaar`, `pan_card`) VALUES ('$id','$abbreviation','$name','$age','$address','$mobile','$aadhaar','$pancard')");
	if($sql==1){	
    header("location:tenant.php?id=".$id);
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
  <title></title>
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
      <?php include("partials/sidebar.php");?>
    
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-sm-12">
              <div class="home-tab">
                <div class="d-sm-flex align-items-center justify-content-between border-bottom" style="flex-direction: row-reverse;">
                  
                  <div>
                    <div class="btn-wrapper">
                      <a href="#" class="btn btn-otline-dark align-items-center"><i class="icon-share"></i> Share</a>
                      <a href="#" class="btn btn-otline-dark"><i class="icon-printer"></i> Print</a>
                      <a href="#" class="btn btn-primary text-white me-0"><i class="icon-download"></i> Export</a>
                    </div>
                  </div>
                </div>
                <div class="tab-content tab-content-basic">
				<div class="row" >
				 <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Owner Details</h4>
                  <form class="forms-sample" method="post">
                    <div class="form-group row">
                     <label for="examplename" class="col-sm-2 col-form-label">Full Name</label>	
					 <div class="col-sm-2">
                      <select class="form-control" name="abbreviation" id="exampleSelectGender" required>
                          <option>Mr.</option>
                          <option>Mrs.</option>
                        </select>  
                      </div>
                      <div class="col-sm-8">
                        <input type="text" name="name" class="form-control" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleaddress" class="col-sm-2 col-form-label">Age</label>
                      <div class="col-sm-4">
                        <input type="number" name="age" class="form-control" required>
                      </div>
                 
                      <label for="exampleInputMobile" class="col-sm-2 col-form-label">Mobile No.</label>
                      <div class="col-sm-4">
                        <input type="tel" name="mobile" class="form-control"  minlength="10" maxlength="10" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleaadhaar" class="col-sm-2 col-form-label">Aadhaar No.</label>
                      <div class="col-sm-4">
                        <input type="text" name="aadhaar" class="form-control" required>
                      </div>
                 
                      <label for="examplepan" class="col-sm-2 col-form-label">Pancard</label>
                      <div class="col-sm-4">
                        <input type="text" name="pancard" class="form-control" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleaddress" class="col-sm-2 col-form-label">Residence Address</label>
                      <div class="col-sm-10">
                        <textarea type="text" rows="4" cols="50" name="address" class="form-control" required></textarea>
                      </div>
                    </div>
                   
					<div class="col" align="right">
                     <button type="submit" class="btn btn-primary  btn-lg" style="color: aliceblue" name="submit">Next<i class="mdi mdi-chevron-right"></i></button>
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
  <script>
      document.title="Owner Details";
      document.getElementById("welcome").innerHTML = document.title;
    </script>
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

