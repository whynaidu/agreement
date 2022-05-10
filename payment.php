<?php  
session_start();
if(!isset($_SESSION['email'])) // If session is not set then redirect to Login Page
{
 header("Location:login.php"); 
}
include("include/configure.inc.php");
$fid=$_GET['id'];


if(isset($_POST['submit'])){
	$security_deposit=$_POST['security_deposit'];  
  $rent_amount=$_POST['rent_amount'];
  $method=$_POST['method'];  
  $bank=$_POST['bank'];  

  $date=$_POST['date'];  
  $tid=$_POST['tid'];
	$sql=mysqli_query($conn,"INSERT INTO `payment`(`document_no`,`security_deposit`,`rent_amount`,`bank`,`method`,`date`,`tid`) VALUES 
  ('$fid','$security_deposit','$rent_amount','$bank','$method','$date','$tid')");
	if($sql==1){	
    header("location:agreement.php?id=".$fid);
  	}else{
		echo "<script> alert('Something went wrong');</script>";
	}
}
if($_GET['id']==''){
    header('Location:new_agreement.php');
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
  <link rel="stylesheet" href="vendors/select2/select2.min.css">
  <link rel="stylesheet" href="vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
  <style>
    body {
  font-family: "Open Sans", 
  -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", Helvetica, Arial, sans-serif; 
}
    </style>
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
      <!-- partial -->      <!-- partial -->      <!-- partial -->
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
                  <h4 class="card-title">Payment Terms</h4>
                  <form class="forms-sample" method="post">
					  <div class="row">
						  <div class="col-sm-6">
                    <div class="form-group row">
                      <label for="examplename" class="col-sm-3 col-form-label-sm">Security Deposit<label style="color:Red">*</label></label>
                      <div class="col-sm-9">
                        <input type="number" id="deposit" class="form-control"name="security_deposit" placeholder="Deposit" required>
                      </div>
                    </div>
                
					</div>
					<div class="col-sm-6">
                     <div class="form-group row">
                      <label for="exampleage" class="col-sm-3 col-form-label-sm">Monthly Rent<label style="color:Red">*</label></label>
                      <div class="col-sm-9">
                        <input type="number" id="rent" class="form-control"name="rent_amount" placeholder="Rent" required>
                      </div>
                    </div>     
					  </div>
						</div>

            <h4 class="card-title">Deposit Payment Details</h4>

                   <div class="form-group row">
                     <label for="examplename" class="col-sm-2 col-form-label">Payment Methods<label style="color:Red">*</label></label>	
					        <div class="col-sm-10">
                      <select class="form-control" id="exampleSelecthod" name="method" required>
                      <option value="" disabled selected hidden>select</option>
                          <option>Cash</option>
                              <option>Cheque</option>
						                  <option>UPI</option>
						               <option>NFTS</option>
						                <option>RTGS</option>
                        </select>  
                      </div>
					   </div>
             <div class="form-group row">
                      <label for="exampldate" class="col-sm-2 col-form-label">Bank <label style="color:Red">*</label></label>
                      <div class="col-sm-10 ">
                       <select class="js-example-basic-single w-100 " data-select2-id="1" tabindex="-1" aria-hidden="true">
                      <option value="AL" data-select2-id="3">SBI</option>
                      <option value="RU">Bank Of Maharashtra</option>
                      <option value="WY">Bank Of India</option>
                      <option value="AM">HDFC Bank</option>
                      <option value="CA">Axis Bank</option>
                      <option value="RU">ICICI Bank</option>
                      <option value="RU">Kotak Mahindra Bank</option>
                      <option value="RU">IDBI Bank</option>
                      <option value="RU">YES Bank</option>
                    </select>
                      </div>
                    </div>

  
					  <div class="form-group row">
                      <label for="exampldate" class="col-sm-2 col-form-label">Date Of Payment<label style="color:Red">*</label></label>
                      <div class="col-sm-10">
                        <input type="date" class="form-control" name="date" id="date" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputtran" class="col-sm-2 col-form-label">Transaction ID<label style="color:Red">*</label></label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="tid"  id="tid" placeholder="Enter Transaction ID" required>
                      </div>
                    </div>
				
                    <div class="col" align="right">
					<a href="amenities.php?id=<?php echo $fid;?>"><button type="button" class="btn btn-primary  btn-lg" style="color: aliceblue"><i class="mdi mdi-chevron-left"></i>Previous</button></a>
					<button type="submit" name="submit"  id="submitForm" class="btn btn-primary btn-lg" style="color: aliceblue" >Submit</button>
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

</script>


  <script>
      document.title="Payment Details";
      // document.getElementById("welcome").innerHTML = document.title;
    </script>

</script>
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/select2/select2.min.js"></script>

  <script src="vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <script src="vendors/progressbar.js/progressbar.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
    <!-- Custom js for this page-->
    <script src="js/file-upload.js"></script>
  <script src="js/typeahead.js"></script>
  <script src="js/select2.js"></script>
  <script src="js/jquery.cookie.js" type="text/javascript"></script>
  <script src="js/dashboard.js"></script>
  <script src="js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->
<script>
$(document).ready(function(){
  $("#submitForm").click(function(){
    var deposit = $("#deposit").val();
    var rent = $("#rent").val();
    var method = $("#exampleSelecthod").val();
    var bank = $("#bank").val();
    var date = $("#date").val();
    var tid = $("#tid").val();
    if(deposit == "" || rent == "" || method == "" || bank == "" || date == "" || tid == ""){
      swal("Oops...", "Please fill all the fields", "error");
    }
    else{
      swal("Good job!", "Agreement Submitted", "success");
    }
  });
});
</script>
</body>

</html>

