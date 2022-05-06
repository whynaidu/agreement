<?php  
session_start();
if(!isset($_SESSION['email'])) // If session is not set then redirect to Login Page
{
 header("Location:login.php"); 
}
include("include/configure.inc.php");
$id=$_GET['id'];
if(isset($_POST['submit'])){
	$owitness1=$_POST['owitness1'];
	$owitness2=$_POST['owitness2'];
  $twitness1=$_POST['twitness1'];
  $twitness2=$_POST['twitness2'];
	
	
	$sql=mysqli_query($conn,"UPDATE owner SET name1='$owitness1',name2='$owitness2' WHERE document_no='$id'"); 
  $tenant=mysqli_query($conn,"UPDATE tenant SET name1='$twitness1',name2='$twitness2' WHERE document_no='$id'"); 

	if($sql==1){	

    header("location:family.php?id=".$id);
  	}else{
		echo "<script>alert('Something went wrong');</script>";
	}
}
?><!DOCTYPE html>
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
      <!-- partial -->
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
                  <h4 class="card-title">Owner Witness</h4>
                  <form class="forms-sample" method="post">
                  <div class="form-group row">
                      <label for="exampleInputtran" class="col-sm-2 col-form-label">1<sup>st</sup> Person<label style="color:Red">*</label></label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control " name="owitness1" placeholder="Name" txtname required>
                        </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputtran" class="col-sm-2 col-form-label">2<sup>nd</sup>Person<label style="color:Red">*</label></label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control txtname" name="owitness2" placeholder="Name" required>
                        
                        
                      </div>
                    </div>
					  <h4 class="card-title">Tenant Witness </h4>					  
                    <div class="form-group row">
                      <label for="exampleInputtran" class="col-sm-2 col-form-label">1<sup>st</sup> Person<label style="color:Red">*</label></label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control " name="twitness1" placeholder="Name" txtname required>
                       
                      </div>
                    </div> 
                    <div class="form-group row">
                      <label for="exampleInputtran" class="col-sm-2 col-form-label">2<sup>nd</sup>Person<label style="color:Red">*</label></label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control " name="twitness2" placeholder="Name" txtname required>
                        
                      </div>
                    </div>
					<div class="col" align="right">
          <a href="property.php?id=<?php echo $id;?>"><button type="button" class="btn btn-primary  btn-lg" style="color: aliceblue"><i class="mdi mdi-chevron-left"></i>Previous</button></a>

                    <button type="submit" name="submit"class="btn btn-primary  btn-lg" style="color: aliceblue" id="sub">Submit</button>
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
        <?php include("partials/footer.php"); ?>
      </div>

  <script>
      document.title="Witness Details";
      // document.getElementById("welcome").innerHTML = document.title;
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

