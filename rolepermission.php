<?php
session_start();
if(!isset($_SESSION['id'])) // If session is not set then redirect to Login Page
{
 header("Location:login.php"); 
}
include("include/configure.inc.php");
if(isset($_POST['submit'])){
  	$agent_id=$_POST['agent_id'];

	$name=$_POST['client_name'];
	$address=$_POST['address'];
	$mobile=$_POST['mobile_no'];
	$requirement=$_POST['requirement'];
	$location=$_POST['location'];
  $type=$_POST['type'];

  $area=$_POST['area'];
	
	$sql=mysqli_query($conn,"INSERT INTO `paidleads`(`user_id`, `client_name`, `mobile`,`type`, `requirement`, `area`, `location`) VALUES ('$agent_id','$name','$mobile','$type','$requirement','$area','$location')");
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

  <style>

    ul{
      display:flex;
      margin: 0 26px;

    }
    </style>

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
                        <h4 class="card-title card-title-dash">Roles and Permission</h4>
					</div>
          <div class="col-md-6 ">
                    <div class="form-group row">
                      <label for="Role" class="col-sm-3 col-form-label">Role</label>
                      <div class="col-sm-9">
                   
                        <select class="form-control" id="exampleSelectProperty" name="type">
                        <?php 
                        $sql=mysqli_query($conn,"SELECT * FROM roles");
                         while($arr=mysqli_fetch_array($sql)){
                        ?>
                          <option><?php echo $arr['roles'];?></option>
                          <?php } ?>
                        
                        </select>
                      </div>
                    </div>
						</div>
                  <form class="forms-sample" method="post">
                  <div class="form-check">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input">
Social Media                            <i class="input-helper"></i></label>
</div>  
  <ul style="display:flex;">
  <div class="form-check">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input">
View                            <i class="input-helper"></i></label>
</div>&nbsp; &nbsp;&nbsp;
<div class="form-check">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input">
Delete                            <i class="input-helper"></i></label>
</div>      
</ul>
<div class="form-check">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input">
New Agreement                            <i class="input-helper"></i></label>
</div>  
<div class="form-check">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input">
List Agreement                            <i class="input-helper"></i></label>
</div>  
  <ul>
  <div class="form-check">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input">
View                            <i class="input-helper"></i></label>
</div>&nbsp;&nbsp;&nbsp;
<div class="form-check">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input">
Delete                            <i class="input-helper"></i></label>
</div>
</ul>
<div class="form-check" style="display": flex;>
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input">
Police no                            <i class="input-helper"></i></label>
</div> 
<ul> 
  <div class="form-check">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input">
View                            <i class="input-helper"></i></label>
</div>&nbsp;&nbsp;&nbsp;
</ul>
<div class="form-check">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input">
To do                            <i class="input-helper"></i></label>
</div>  
<div class="form-check">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input">
Enquiry                            <i class="input-helper"></i></label>
</div>  
<label class="form-check-label"> Enquiry Details</label>
  <ul>
  <div class="form-check">
 <label class="form-check-label">
<input type="checkbox" class="form-check-input">
View <i class="input-helper"></i></label>
</div>&nbsp;&nbsp;
<div>


</div>

<div class="form-check">
 <label class="form-check-label">
 <input type="checkbox" class="form-check-input">
Delete<i class="input-helper"></i></label>
</div>
  </ul>
  <button type="button" class="btn btn-primary" style="color:white;">Submit</button>

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
                
<script>document.title="Roles and Permission";
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

