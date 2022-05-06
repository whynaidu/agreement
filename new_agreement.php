<?php 
session_start();
if(!isset($_SESSION['id'])) // If session is not set then redirect to Login Page
{
 header("Location:login.php"); 
}
include("include/configure.inc.php");
error_reporting(0);
if(isset($_POST['submit'])){
	$no=$_POST['no'];
	$date=$_POST['date'];
	$type=$_POST['type'];
	$month=$_POST['month'];
  $place=$_POST['place'];
  $status=0;
	
	$sql=mysqli_query($conn,"INSERT INTO `new_agreement`(`user_id`,`document_no`, `property_type`, `date_of_agreement`, `no_of_month`,`place_of_agreement`) VALUES ('".$_SESSION['id']."','$no','$type','$date','$month','$place')");
  $query =mysqli_query($conn,"INSERT INTO `noc`(`document_no`, `status`) VALUES ('$no','$status')");
	if($sql==1){
		$sql=mysqli_query($conn,"select documentid from new_agreement where user_id='".$_SESSION['id']."' order by documentid desc") or die( mysqli_error($conn));;
                      $row=mysqli_fetch_array($sql);
                      $lastid=$row['documentid'];
                      if(empty($lastid)){
						  $number=001;
					  }else{
						  $id=str_pad($lastid + 1, 3,0, STR_PAD_LEFT);
						  $number='AR-'.$id;
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
  
    <?php include("partials/header.php");?>

    <div class="container-fluid page-body-wrapper">
      
      <?php include("partials/sidebar.php");?>
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
                  <form class="forms-sample" method="post">
					  <div class="row">
					  <div class="col-md-6 ">
                    <div class="form-group row">
                      <label for="exampledno" class="col-sm-3 col-form-label">Document No.<label style="color:Red">*</label></label>
                      <div class="col-sm-9">
					  <?php $sql=mysqli_query($conn,"select document_no from new_agreement where user_id='".$_SESSION['id']."' order by document_no desc");
                  $query =mysqli_query($conn,"select * from agent_details where user_id='".$_SESSION['id']."'");
                      $row=mysqli_fetch_array($sql);
                      $lastid=$row['document_no'];
                      $arr=mysqli_fetch_array($query);
                      $name=$arr['agent_name'];
                      $first=$name;
                      
                      $res= preg_replace('~\S\K\S*\s*~u', '', $first);
                      if(empty($lastid)){
						           $number=$res."-001";
					           }else{
						          $id=str_pad($lastid + 1, 3,0, STR_PAD_LEFT);
					        	  $number=$res."-$id";
					            }					
                      					  ?>
                        <input type="text" name="no" value="<?php echo $number;?>" class="form-control" id="exampledno" readonly>
                      </div>
                    </div>
						</div> 
					  <div class="col-md-6 ">
                    <div class="form-group row">
                      <label for="exampledate" class="col-sm-3 col-form-label">Date of Aggrement<label style="color:Red">*</label></label>
                      <div class="col-sm-9">
                        <input type="date" name="date" class="form-control" id="exampledate" required>
                      </div>
                    </div>
						</div> 
					   <div class="col-md-6 ">
                    <div class="form-group row">
                      <label for="exampleprop" class="col-sm-3 col-form-label">Property Type<label style="color:Red">*</label></label>
                      <div class="col-sm-9">
                        <select class="form-control" name="type" id="exampleSelectGender" required>
                        <option value="" disabled selected hidden>select</option>
                          <option>Flat</option>
                          <option>Shop</option>
                        </select>
                      </div>
                    </div>
						</div>
						 <div class="col-md-6 ">
                    <div class="form-group row">
                      <label for="exampleprop" class="col-sm-3 col-form-label">Total no of months<label style="color:Red">*</label></label>
                      <div class="col-sm-9">
                        <select required class="form-control" name="month" id="exampleSelectGender">
                        <option value="" disabled selected hidden>select</option>
                          <option>11</option>
                          <option>22</option>
						              <option>36</option>
                        </select>
                      </div>
                    </div>
                    
						</div>
            <div class="col-md-6 ">
                    <div class="form-group row">
                      <label for="exampleprop" class="col-sm-3 col-form-label">Place of Agreement<label style="color:Red">*</label></label>
                      <div class="col-sm-9">
                      <input type="TEXT" name="place" class="form-control" id="exampledate" placeholder="Enter Place" required>

                      </div>
                    </div>
						</div>
						
					  <div class="col" align="right">
                    <button type="submit" name="submit" class="btn btn-primary  btn-lg" style="color: aliceblue">Next<i class="mdi mdi-chevron-right"></i></button>
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
		</div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <?php include("partials/footer.php"); ?>
      </div>

  <script>
      document.title="New Agreement";
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

