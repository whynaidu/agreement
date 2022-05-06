<?php
session_start();
if(!isset($_SESSION['id'])) // If session is not set then redirect to Login Page
{
 header("Location:login.php"); 
}
include("include/configure.inc.php");
if(isset($_POST['submit'])){
	$todo=$_POST['todo'];
  $status=1;
	
	$sql=mysqli_query($conn,"INSERT INTO `todo`(`user_id`, `task`, `status`) VALUES ('".$_SESSION['id']."','$todo','$status')");
	if($sql==1){	
    header("location:todo.php");
	}else{
		echo "<script>alert('Something went wrong');</script>";
	}
}

if(isset($_GET['delid'])){
  $id=mysqli_real_escape_string($conn,$_GET['delid']);
  $sql=mysqli_query($conn,"delete from todo where id='$id'");
  if($sql=1){
    header("location:todo.php");
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
     <?php include("partials/header.php"); ?>

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <?php include("partials/sidebar.php"); ?>
      <!-- partial -->
      <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> To Do List </h3>
            </div>
            <div class="row">
              <div class="col-lg-12">
                <div class="card px-3">
                  <div class="card-body">
                    <h4 class="card-title">To Do List</h4>
                    <form method="post" action="todo.php">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Add to do</label>
                        <input type="text" class="form-control" name="todo" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter todo">
                      </div>
                      <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                  
                    <div class="list-wrapper">
                      <ul class="d-flex flex-column-reverse todo-list">
                        <?php 
                        
                        $sql=mysqli_query($conn,"select * from todo where user_id='".$_SESSION['id']."' AND status='1'");
                         while($arr=mysqli_fetch_array($sql)){
                        ?>
                        <li>
                          <div class="form-check"style="width: -webkit-fill-available;">
                              <label> <?php echo $arr['task'];?> <i class="input-helper"></i></label>
                          </div>
                                                    <a href="todo.php?delid=<?php echo $arr['id'] ?>"><i class="remove mdi mdi-close-circle-outline"></i></a>

                         
                        </li>
                         <?php } ?>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          <?php include("partials/footer.php"); ?>
          <!-- partial -->
        </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
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

