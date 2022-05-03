
<?php  
session_start();
if(!isset($_SESSION['email'])) // If session is not set then redirect to Login Page
{
 header("Location:login.php"); 
}
include("include/configure.inc.php");
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
						<div class="col-8">
					 <h4 class="card-title">Police NOC</h4>
						</div>
            <form class="col-4" method="post">
						<div>
					     <div class="input-group">
                      <input type="text" value="<?php if(isset($_GET['search'])){echo $_GET['search'];}?>" class="form-control">&nbsp;&nbsp;
                      <div class="input-group-append">
                        <button class="btn btn-sm btn-primary" type="submit" style="color: aliceblue" name="">Search</button>
                      </div>
                    </div>
						</div>
					</div>
          </form>
                  <div class="table-responsive pt-3">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>Sr.No</th>
						              	<th>Document No</th>
                            <th>Owner Name</th>
                            <th>Tenant Name</th>
                            <th>Date of Agreement</th> 
                            <th> Action </th>
                          </tr>
                        </thead>


                        <?php 

                        if(isset($_GET['search'])){

                          $filterval =  $_GET['search'];
                        }
                        
                        $sql=mysqli_query($conn,"select new_agreement.date_of_agreement as doa,new_agreement.document_no as did, tenant.fullname as tname, tenant.mobile as tmobile, noc.status as nstatus, noc.document_no as nodc, owner.fullname as oname, owner.mobile as omobile from new_agreement inner join tenant on tenant.document_no=new_agreement.document_no inner join owner on owner.document_no=new_agreement.document_no inner join noc on noc.document_no=new_agreement.document_no Where noc.status='1'");
                        $count=1;
                         while($arr=mysqli_fetch_array($sql)){
                        ?>
                        <tbody>
                          <tr>
                            <td> <?php echo $count;?></td>
                            <td> <?php echo $arr['did'];?> </td>
                            <td> <?php echo $arr['oname'];?></td>
                            <td> <?php echo $arr['tname'];?></td>
                            <td> <?php echo $arr['doa'];?> </td>
                            <td>
                            <a href="policenocform.php?id=<?php echo $arr['did'] ?>"><button type="button" class="btn btn-primary btn-rounded btn-icon" style="color: aliceblue"> <i class="mdi mdi-eye"></i> </button></a>
                              <!-- <button type="button" class="btn btn-primary btn-rounded btn-icon" style="color: aliceblue"> <i class="mdi mdi-file-pdf"></i> </button>--></td>
                          </tr>
                        </tbody>
                        <?php $count++;} ?>
                      </table>
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
      document.title="Police NOC List";
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

