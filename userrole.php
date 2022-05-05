<?php
session_start();
if(!isset($_SESSION['id'])) // If session is not set then redirect to Login Page
{
 header("Location:login.php"); 
}
include("include/configure.inc.php");
if(isset($_POST['submit'])){
	$name=$_POST['name'];
	$email=$_POST['email'];
	$role=$_POST['role'];


	$sql=mysqli_query($conn,"INSERT INTO `user`(`user_id` ,`name`, `email`, `role`) VALUES ('".$_SESSION['id']."','$name','$email','$role')");
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
          <h4 class="card-title card-title-dash">User role</h4>
					</div>
                  <form class="forms-sample" method="post">
              
					  <div class="col-md-6 ">
              
                    <div class="form-group row">
                      <label for="Name" class="col-sm-3 col-form-label"> Name</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampledno" name="name">
                      </div>
                    </div>
						</div>					  
						<div class="col-md-6 ">
                    <div class="form-group row">
                      <label for="Email" class="col-sm-3 col-form-label"> Email</label>
                      <div class="col-sm-9">
                        <input type="tel" class="form-control" id="Email" name="email">
                      </div>
                    </div>
						</div> 
      
          
            <div class="col-md-6 ">
                    <div class="form-group row">
                      <label for="Role" class="col-sm-3 col-form-label">Role</label>
                      <div class="col-sm-9">
                  
                        <select class="form-control" id="exampleSelectProperty" name="role">
                        <?php 
                        $sql=mysqli_query($conn,"SELECT * FROM roles");
                         while($arr=mysqli_fetch_array($sql)){
                        ?>
                          <option value="<?php echo $arr['roles'];?>"><?php echo $arr['roles'];?></option>
                          <?php } ?>
                        
                        </select>
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
                
<script>document.title="User Role";
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

