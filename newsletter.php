
<?php  
session_start();
if(!isset($_SESSION['id'])) // If session is not set then redirect to Login Page
{
 header("Location:login.php"); 
}
include("include/configure.inc.php");
if(isset($_GET['delid'])){
  $id=mysqli_real_escape_string($conn,$_GET['delid']);
  $sql=mysqli_query($conn,"delete from newsletter where id='$id'");
  if($sql=1){
    header("location:newsletter.php");
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

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">

</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php include("partials/header.php"); ?>

<!-- partial -->
<div class="container-fluid page-body-wrapper" style="padding-top: 50px;">
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
					 <h4 class="card-title">News letter</h4>
						</div>
            
            <!-- <div class="table-responsive pt-3">
                  <div class="row"><div class="col-sm-12 col-md-8"><div class="dataTables_length" id="order-listing_length"><label>Show <select name="order-listing_length" aria-controls="order-listing" class="custom-select custom-select-sm form-control"><option value="5">5</option><option value="10">10</option><option value="15">15</option><option value="-1">All</option></select> entries</label></div></div> -->
          

					</div>
                  <div class="table-responsive pt-3">
                      <table id="news" class="table table-bordered">
                        <thead>
                          <tr>
                            <th>Sr.No</th>
						              	<th>Email id</th>
                            <th>Date</th>
                        
                           
                            <th> Action </th>
                          </tr>
                        </thead>
                        <?php 
                        
                        $sql=mysqli_query($conn,"select * from newsletter");
                        $count=1;
                         while($arr=mysqli_fetch_array($sql)){
                        ?>
                        <tbody>
                          <tr>
                            <td> <?php echo $count;?></td>
                            <td> <?php echo $arr['email'];?> </td>
                            <td> <?php echo $arr['date'];?></td>
                            
                            <td>
                            <a href="newsletter.php?delid=<?php echo $arr['id'] ?>"><button type="button" class="btn btn-danger btn-rounded btn-icon" style="color: aliceblue"> <i class="mdi mdi-delete"></i> </button></a>
                         </td>
                          </tr>
                        </tbody>
                        <?php $count++;} ?>
                      </table>

                      <!-- <div class="col" align="right">
                          <button type="button" class="btn btn-primary  btn-lg" style="color: aliceblue; margin-top:14px" ><i class="mdi mdi-chevron-left"></i>Previous</button></a>
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
      </div>
    <!-- page-body-wrapper ends -->
   </div>
  <!-- container-scroller -->
  <script>
      document.title="News Letter";
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

  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
  <script src="../agreement/app.js"></script>
  <!-- End custom js for this page-->


</body>

</html>

