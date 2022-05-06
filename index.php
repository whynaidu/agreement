<?php
// session_start();
// if(!isset($_SESSION['id'])) // If session is not set then redirect to Login Page
// {
//  header("Location:login.php"); 
// }
// include("include/configure.inc.php");
error_reporting(0);

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

  <!-- partial -->
  <!-- partial:partials/_sidebar.html -->
  <?php include("partials/sidebar.php"); ?>      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-sm-12">
              <div class="home-tab">
                <div class="tab-content tab-content-basic">
                  <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview"> 
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="statistics-details d-flex align-items-center justify-content-between">
                          <div>
                            <p class="statistics-title">Flats for Sale</p>
                            <h3 class="rate-percentage" align="center">32</h3>
                          </div>                          
                          <div>
                            <p class="statistics-title">Flats for Rent</p>
                            <h3 class="rate-percentage" align="center">32</h3>
                          </div>                          
                          <div>
                            <p class="statistics-title">Shop for Sale</p>
                            <h3 class="rate-percentage" align="center">32</h3>
                          </div>
                          <div>
                            <p class="statistics-title">Shop for Rent</p>
                            <h3 class="rate-percentage" align="center">74</h3>
                          </div>
                          <div>
                            <?php
                               $query=mysqli_query($conn,"select * from new_agreement where user_id='".$_SESSION['id']."'");
                                 $count1=mysqli_num_rows($query);
                            ?>
                            <p class="statistics-title">No. of Agreement</p>
                            <h3 class="rate-percentage" align="center"><?php echo $count1 ?></h3>
                          </div>

                          <div class="d-none d-md-block">
                            <p class="statistics-title">Agreement to be Expired</p>
                            <h3 class="rate-percentage" align="center">00</h3>
                          </div>
                        </div>
                      </div>
                    </div> 
              
                    <div class="row">
                      <div class="col-lg-8 d-flex flex-column">
                        <div class="row flex-grow">
                          <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-start">
                                  <div>
                                    <h4 class="card-title card-title-dash">New Enquire</h4>
                                  </div>
                                  <div>
                                    <a href="addnewenquire.php"><button class="btn btn-primary btn-lg text-white mb-0 me-0" type="button"><i class="mdi mdi-account-plus"></i>Add new member</button></a>
                                  </div>
                                </div>
                                <div class="table-responsive  mt-1">
                                  <table class="table select-table">
                                    <thead>
                                      <tr>
                                        <th>Client Name</th>
                                        <th>Property Type</th>
                                        <th>Requirement</th>
									                    	<th>Location</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php 
                                         $sql=mysqli_query($conn,"select * from leads where user_id='".$_SESSION['id']."'");
                                        while($arr=mysqli_fetch_array($sql)){
                                      ?>
                                      <tr>
                                        <td>
                                          <h6><?php echo $arr['client_name'];?></h6>
                                          <p><?php echo $arr['mobile'];?></p>
                                        </td>
                                        <td>
                                          <?php echo $arr['type'];?>
                                        </td>
                                        <td>
                                              <?php echo $arr['requirement'];?>
                                                </td>                                        
                                                <td>
                                              <?php echo $arr['location'];?>
                                                </td>
                                            
                                              </tr>
                                              <?php }?>
                                
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        
                      </div>
                      <div class="col-lg-4 d-flex flex-column">
                        <div class="row flex-grow">
                          <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body">
                                <div class="row">
                                  <div class="col-lg-12">
                                    <div class="d-flex justify-content-between align-items-center">
                                      <h4 class="card-title card-title-dash">Todo list</h4>
                                      <div class="add-items d-flex mb-0">
                                        <!-- <input type="text" class="form-control todo-list-input" placeholder="What do you need to do today?"> -->
                                        <a href="todo.php"><button class="add btn btn-icons btn-rounded btn-primary todo-list-add-btn text-white me-0 pl-12p"><i class="mdi mdi-plus"></i></button></a>
                                      </div>
                                    </div>
                                    <div class="list-wrapper">
                                      <ul class="todo-list todo-list-rounded">
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

