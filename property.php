<?php  
session_start();
if(!isset($_SESSION['email'])) // If session is not set then redirect to Login Page
{
 header("Location:login.php"); 
}
include("include/configure.inc.php");
$id=$_GET['id'];
if(isset($_POST['submit'])){
	$type=$_POST['type'];  
  $sector=$_POST['sector'];
	$address=$_POST['address'];
	$plotno=$_POST['plotno'];
	$cidco=$_POST['cidco'];
	$area=$_POST['area'];
  $chs=$_POST['chs'];
  $node=$_POST['node'];
	
	$sql=mysqli_query($conn,"INSERT INTO `property_details`(`document_no`,`property_type`, `address`, `sector`, `plot_no`,`cidco`, `area`, `chs`, `node`) VALUES 
  ('$id','$type','$address','$sector','$plotno','$cidco','$area','$chs','$node')");
	if($sql==1){	
    header("location:witness.php?id=".$id);
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
<?php
$selectquery="select * from new_agreement where document_no='$id'";
$doctors = mysqli_query($conn,$selectquery);  
if (mysqli_num_rows($doctors)>0){

}

?>        
     
				<div class="row" >
				 <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Property Details</h4>
                  <form class="forms-sample" method="post">
                    <div class="form-group row">
                     <label for="examplename" class="col-2 col-form-label">Property Type</label>	
                    
					 <div class="col-sm-2">
           <?php
                     while($row = mysqli_fetch_array($doctors)) {
?>
           <label for="examplename" value="<?php echo $row["property_type"]; ?>" class="col-form-label"><b><?php echo $row["property_type"]; ?></b></label>	
          
          <?php
          }
?>
            </div>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="address"required>
                      </div>
                    </div>
					  <div class="row">
						  <div class="col-sm-6">
                    <div class="form-group row">
                      <label for="examplesec" class="col-sm-4 col-form-label">Sector</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control"name="sector"required>
                      </div>
                    </div>
					</div>
					<div class="col-sm-6">
                    <div class="form-group row">
                      <label for="exampleplot" class="col-sm-4 col-form-label">Plot No.</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control"name="plotno">
                      </div>
                    </div>
					  </div>
						</div>
					  <div class="row">
						  <div class="col-sm-6">
                    <div class="form-group row">
                      <label for="examplecid" class="col-sm-4 col-form-label">CIDCO</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control"name="cidco">
                      </div>
                    </div>
					</div>
					<div class="col-sm-6">
                    <div class="form-group row">
                      <label for="examplearea" class="col-sm-4 col-form-label">Area(in sq.ft)</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control"name="area">
                      </div>
                    </div>
					  </div>
						</div>
                    <div class="form-group row">
                      <label for="examplecoop" class="col-sm-2 col-form-label">Co.op Housing Society</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control"name="chs">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="examplenode" class="col-sm-2 col-form-label">NODE</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control"name="node">
                      </div>
                    </div>
					<div class="col" align="right">
					<a href="tenant.php?id=<?php echo $id;?>"><button type="button" class="btn btn-primary  btn-lg" style="color: aliceblue"><i class="mdi mdi-chevron-left"></i>Previous</button></a>
                    <button type="submit" name="submit"class="btn btn-primary  btn-lg" style="color: aliceblue">Next<i class="mdi mdi-chevron-right"></i></button>
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

      <?php include("partials/footer.php"); ?>
      </div>

  <script>
      document.title="Property Details";
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

