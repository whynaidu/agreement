
<?php  
session_start();
if(!isset($_SESSION['email'])) // If session is not set then redirect to Login Page
{
 header("Location:login.php"); 
}
include("include/configure.inc.php");

if(isset($_GET['delid'])){
  $id=mysqli_real_escape_string($conn,$_GET['delid']);
  $sql=mysqli_query($conn,"delete from agent_details where id='$id'");
  if($sql=1){
    header("location:consaltantlist.php");
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
  <style>
    td{
    width:10%;
    word-break: break-word;
    }
    </style>

</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php include("partials/header.php"); ?>

<!-- partial -->
<div class="container-fluid page-body-wrapper">
  <!-- partial:partials/_settings-panel.html -->

  <!-- partial -->
  <!-- partial:partials/_sidebar.html -->
  <?php include("partials/sidebar.php"); ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-sm-12">
              <div class="home-tab">
               
                <div class="tab-content tab-content-basic">
				 <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
					<div class="row">
						<div class="col-9">
					 <h4 class="card-title">Consultant List</h4>
						</div>
						<!-- <div class="col-3">
					 <div class="input-group">
                      <input type="text" class="form-control">
                      <div class="input-group-append">
                        <button class="btn btn-sm btn-primary" type="button" style="color: aliceblue">Search</button>
                        <div class="input-group">
                      <input type="text" class="form-control">
                      </div>
                    </div>
						</div>
					</div> -->

          <div class="table-responsive pt-3">
                  <div class="row"><div class="col-sm-12 col-md-8"><div class="dataTables_length" id="order-listing_length"><label>Show <select name="order-listing_length" aria-controls="order-listing" class="custom-select custom-select-sm form-control"><option value="5">5</option><option value="10">10</option><option value="15">15</option><option value="-1">All</option></select> entries</label></div></div>
          

          
                  <div class="table-responsive pt-3">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>Sr.No</th>
                            <th>Agent Code</th>
                            <th>Name</th>                            
                            <th>Moile No</th>
						                <th>Email id</th>
                            <th>Rera No</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <?php 
                        
                        $sql=mysqli_query($conn,"select * from agent_details");
                        $count=1;
                         while($arr=mysqli_fetch_array($sql)){
                        ?>
                        <tbody>
                          <tr>
                            <td> <?php echo $count;?></td>
                                                        <td> <?php echo $arr['user_id'];?> </td>

                            <td> <?php echo $arr['agent_name'];?> </td>
                                                        <td> <?php echo $arr['mobile_no'];?></td>

                            <td> <?php echo $arr['email'];?> </td>
                            <td> <?php echo $arr['rera_no'];?></td>
                           
                            <td>
                            <a href="agentprof.php?edit=<?php echo $arr['id'] ?>"><button type="button" class="btn btn-primary  btn-md" style="color: aliceblue"> <i class="mdi mdi-grease-pencil"></i> </button></a>
                            <a href="consultantlist.php?delid=<?php echo $arr['id'] ?>"><button type="button" class="btn btn-danger  btn-md" style="color: aliceblue"> <i class="mdi mdi-delete"></i> </button></a>

                            <!-- <button type="button" class="btn btn-primary btn-rounded btn-icon" style="color: aliceblue"> <i class="mdi mdi-file-pdf"></i> </button>--></td>
                          </tr>
                        </tbody>
                        <?php $count++;} ?>
                      </table>
                      <!-- <div class="col" align="right">
                          <button type="button" class="btn btn-primary  btn-lg" style="color: aliceblue; margin-top:14px"><i class="mdi mdi-chevron-left"></i>Previous</button></a>
                     <button type="submit" class="btn btn-primary  btn-lg" style="color: aliceblue; margin-top:14px" name="submit" id="sub">Next<i class="mdi mdi-chevron-right"></i></button>
                         </div> -->
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

        <!-- partial -->
      </div>
      <!-- main-panel ends -->

    <!-- page-body-wrapper ends -->
  <!-- container-scroller -->
  <script>
      document.title="Consaltant List";
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
