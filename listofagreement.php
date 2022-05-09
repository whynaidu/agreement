
<?php 
session_start(); 
if(!isset($_SESSION['email'])) // If session is not set then redirect to Login Page
{
 header("Location:login.php"); 
}
include("include/configure.inc.php");
if(isset($_GET['gen'])){
  $id=mysqli_real_escape_string($conn,$_GET['gen']);
  $sql=mysqli_query($conn,"update noc set `status`='1' where document_no='$id'");
  if($sql=1){
   header("location:listofagreement.php");
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
    
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-sm-12">
              <div class="home-tab">
               
                <div class="tab-content tab-content-basic">
				  <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
				<h4 class="card-title">List of Agreements</h4>
        
                  <div class="table-responsive pt-3">
                  <div class="row"><div class="col-sm-12 col-md-8"><div class="dataTables_length" id="order-listing_length"><label>Show <select name="order-listing_length" aria-controls="order-listing" class="custom-select custom-select-sm form-control"><option value="5">5</option><option value="10">10</option><option value="15">15</option><option value="-1">All</option></select> entries</label></div></div>
<!--                   
                  <div class="col-sm-12 col-md-4"><div id="order-listing_filter" class="dataTables_filter"><label><input type="search" class="form-control" placeholder="Search" aria-controls="order-listing"></label></div></div> -->
                </div>
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>Sr.No</th>
                            <th>Client Name</th>
                            <th>Mobile No.</th>
                            <th>Date of Aggrement</th>
                            <th>Date of Expiry</th>
                          
							<th>Action</th>
                          </tr>
                        </thead>

                        <?php                 
    $sql=mysqli_query($conn,"select new_agreement.date_of_agreement as doa,new_agreement.document_no as did, date_add(date_of_agreement, INTERVAL no_of_month month)as Enddate, tenant.fullname as tname, tenant.mobile as tmobile, noc.status as nstatus from new_agreement inner join tenant on new_agreement.document_no=tenant.document_no inner join noc on 
    new_agreement.document_no=noc.document_no");
      $count=1;
      while($row = mysqli_fetch_array($sql)) {
      ?>
                        <tbody>
                          <tr>
                            <td>  <?php echo $count;?> </td>
                            <td> <?php echo $row["tname"]; ?> </td>
                            <td><?php echo $row["tmobile"]; ?> </td>
                            <td><?php echo $row["doa"]; ?> </td>
                            <td><?php echo $row["Enddate"]; ?> </td>
                            <td>
				                   <a href="agreement.php?id=<?php echo $row['did']; ?>"> <button type="btn-icon" class="btn btn-primary btn-rounded btn-icon" style="color: aliceblue"> <i class="mdi mdi-eye"></i> </button></a>
                            <!-- <a class="btn btn-danger btn-rounded btn-icon" href="listofagreement.php?delid=<?php echo $row['did']; ?>" onclick="return checkDelete()" class="btn btn-primary btn-rounded btn-icon">
                          <i class="mdi mdi-delete"></i>
                          </a>  -->

                      

<?php
$status=$row['nstatus'] ;
if($status==1){
?>

<?php
}
elseif($status==0){
?>
<a href="agreement.php?id=<?php echo $row['did']; ?>"> <button type="btn-icon" class="btn btn-primary btn-rounded btn-icon" style="color: aliceblue"> <i class=" mdi mdi-pen "></i> </button></a>
<a href="listofagreement.php?gen=<?php echo $row['did']; ?>" ><button type="submit" class="btn btn-primary btn-rounded btn-icon" style="color: aliceblue"> Generate NOC</button> </a>
<?php
}
?>
</td>
                          </tr>
                        </tbody>
                        <?php $count++; } ?>  

                      </table>
                      <div class="col" align="right">
                      <button type="button" class="btn btn-primary btn-lg" style="color: aliceblue; margin-top:14px"><i class="mdi mdi-chevron-left"></i>Previous</button>
                    <button type="submit" name="submit" class="btn btn-primary  btn-lg" style="color: aliceblue; margin-top:14px">Next<i class="mdi mdi-chevron-right"></i></button>
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
      document.title="List Of Agreements";
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

