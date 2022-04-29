<?php  
session_start();
if(!isset($_SESSION['email'])) // If session is not set then redirect to Login Page
{
 header("Location:login.php"); 
}
include("include/configure.inc.php");

if(isset($_POST['submit'])){
	$no=$_POST['no'];
	$date=$_POST['date'];
	$type=$_POST['type'];
	$month=$_POST['month'];
  $place=$_POST['place'];
	
	$sql=mysqli_query($conn,"INSERT INTO `consaltant`(`consaltant_no`, `consaltant_name`, `Office_address`, `mobile_no`,`email`, `rera_no`, `prefix`, `image`) VALUES ('$no','$type','$date','$month','$place')");
	if($sql==1){
		$sql=mysqli_query($conn,"select id from consaltant order by id desc") or die( mysqli_error($conn));;
                      $row=mysqli_fetch_array($sql);
                      $lastid=$row['consaltant_no'];
                      if(empty($lastid)){
						  $number=001;
					  }else{
						  $id=str_pad($lastid + 1, 3,0, STR_PAD_LEFT);
						  $number=$id;
					  }	
 $last_id = mysqli_insert_id($conn);					  
		header("location:owner.php?id=".$no);
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
  <style type="text/css">

               
            textarea{
                
                border: 1px solid #DEE2E6;
                border-radius: 4px;
                
            }
           
   
</style>
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
                  <form class="forms-sample">
            
                    <div class="form-group row">
                      <label for="exampledno" class="col-sm-2 col-form-label">Document No.<label style="color:Red">*</label></label>
                      <div class="col-sm-10">
					  <?php $sql=mysqli_query($conn,"select documentid from new_agreement order by documentid desc") or die( mysqli_error($conn));;
                      $row=mysqli_fetch_array($sql);
                      $lastid=$row['documentid'];
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
                      <label for="exampleaddress" class="col-sm-2 col-form-label">Consultant Name<label style="color:Red">*</label></label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputMobile" class="col-sm-2 col-form-label">Office Address<label style="color:Red">*</label></label>
                      <div class="col-sm-10">
                      <textarea name="address" cols="73" rows="4" required></textarea>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleaadhaar" class="col-sm-2 col-form-label">Mobile No.<label style="color:Red">*</label></label>
                      <div class="col-sm-10">
                        <input type="number" class="form-control" minlength="10" maxlength="10"  required>
                      </div>
                    </div>
					  <div class="form-group row">
                      <label for="exampleemail" class="col-sm-2 col-form-label">Email ID<label style="color:Red">*</label></label>
                      <div class="col-sm-10">
                        <input type="email" class="form-control" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="examplepan" class="col-sm-2 col-form-label">Rera No.<label style="color:Red">*</label></label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" required>
                      </div>
                    </div>
					  <div class="form-group row">
                      <label for="examplepan" class="col-sm-2 col-form-label">Document Prefix<label style="color:Red">*</label></label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="TECT-00001" required>
                      </div>
                    </div>
					  <div class="form-group row">
                      <label for="examplepan" class="col-sm-2 col-form-label">Photo<label style="color:Red">*</label></label>
                      <div class="col-sm-10">
                        <input type="file" required> 
                          Upload
                      </div>
                    </div>
					<div class="col" align="right">
                    <button type="button" class="btn btn-primary  btn-lg" style="color: aliceblue">Submit</button>
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

