<?php  
session_start();
if(!isset($_SESSION['email'])) // If session is not set then redirect to Login Page
{
 header("Location:login.php"); 
}
include("include/configure.inc.php");
$id=$_GET['id'];
if(isset($_POST['submit'])){
	$surname=$_POST['abbreviation'];
	$name=$_POST['name'];
  $age=$_POST['age'];
  $permanent_address=$_POST['permanent_address'];
	$address=$_POST['address'];
	$mobile=$_POST['mobile'];
	$aadhaar=$_POST['aadhaar'];
	$pancard=$_POST['pancard'];
  $email=$_POST['email'];
	$passport=$_POST['passport'];
	
	$sql=mysqli_query($conn,"INSERT INTO `tenant`(`document_no`, `abbreviation`, `fullname`,`age`, `address`,`permanent_address`, `mobile`, `email`,`passport`,`aadhaar`, `pan_card`) VALUES 
  ('$id','$surname','$name','$age','$address','$permanent_address','$mobile','$email','$passport','$aadhaar','$pancard')");
	if($sql==1){	
    header("location:property.php?id=".$id);
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
  <style type="text/css">

                .PAN
                {
                    text-transform: uppercase;
                }
                .error
                {
                    color: Red;
                    visibility: hidden;
            }
            input[type=button] {
            width: 30%;
            background-color: rgb(248, 164, 128);
            margin: 13px 35%;
            padding: 10px 10px;
            border-radius: 10px;
            border: 2px solid rgb(18, 17, 17);
            }
            
            textarea{
                
                border: 1px solid #DEE2E6;
                border-radius: 4px;
                
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
				<div class="row" >
				 <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Tenant Details</h4>
                  <form class="forms-sample"method="post">
                    <div class="form-group row">
                     <label for="examplename" class="col-sm-2 col-form-label">Full Name<label style="color:Red">*</label></label>	
					 <div class="col-sm-2">
                      <select class="form-control" id="exampleSelectGender" name="abbreviation"required>
                      <option value="" disabled selected hidden>select</option>
                          <option>Mr.</option>
                          <option>Mrs.</option>
                        </select>  
                      </div>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="name" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputMobile" class="col-sm-2 col-form-label">Mobile No.<label style="color:Red">*</label></label>
                      <div class="col-sm-4">
                        <input type="tel" class="form-control" id="phone" name="mobile" placeholder="Mobile Number" minlength="10" maxlength="10" required>
                      </div>
                
                      <label for="exampleaadhaar" class="col-sm-2 col-  form-label">E-mail ID<label style="color:Red">*</label></label>
                      <div class="col-sm-4">
                        <input type="email" class="form-control"name="email"required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleaadhaar" class="col-sm-2 col-form-label">Passport No</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control"name="passport">
                      </div>
 
                      <label for="exampleaadhaar" class="col-sm-2 col-form-label">Aadhaar No.<label style="color:Red">*</label></label>
                      
                      <div class="col-sm-4">
                        <input type="text" class="form-control"name="aadhaar" id="txtAadhar"  onblur="AadharValidate()" required>
                        <span id="spanAadharCard" class="error">Invalid Adhar Number</span>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleaddress" class="col-sm-2 col-form-label">Age<label style="color:Red">*</label></label>
                      <div class="col-sm-4">
                        <input type="number"  class="form-control" name="age" min="18" max="100" onblur="myFunction()" id="id1" required>
                        <p id="demo"></p>
                      </div>
 

                      <label for="examplepan" class="col-sm-2 col-form-label">Pancard<label style="color:Red">*</label></label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control"name="pancard" id="txtPANCard" required>
                        <span id="spanPANCard" class="error">Invalid PAN Number</span>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleaddress" class="col-sm-2 col-form-label">Residence Address<label style="color:Red">*</label></label>
                      <div class="col-sm-10">
                      <textarea name="address" cols="73" rows="4" required></textarea> 
                      </div>
                    </div>
					          <div class="form-group row">
                      <label for="examplepreaddress" class="col-sm-2 col-form-label">Present Address<label style="color:Red">*</label></label>
                      <div class="col-sm-10">
                        <textarea name="permanent_address" cols="73" rows="4"required></textarea>  
                      </div>
                    </div>
               
					<div class="col" align="right">
          
						 <a href="owner.php?id=<?php echo $id;?>"><button type="button" class="btn btn-primary  btn-lg" style="color: aliceblue"><i class="mdi mdi-chevron-left"></i>Previous</button></a>
                     <button type="submit" class="btn btn-primary  btn-lg" style="color: aliceblue" name="submit" onclick="ValidatePAN()">Next<i class="mdi mdi-chevron-right"></i></button>
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
        <?php include("partials/footer.php");?>

        <!-- partial -->
      </div>
      <!-- main-panel ends -->

    <!-- page-body-wrapper ends -->
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script>
  function ValidatePAN() {
        var txtPANCard = document.getElementById("txtPANCard");
        var lblPANCard = document.getElementById("spanPANCard")
        var regex = /([A-Z]){5}([0-9]){4}([A-Z]){1}$/;
        if (regex.test(txtPANCard.value.toUpperCase())) {
            lblPANCard.style.visibility = "hidden";
            return true;
        } else {
            lblPANCard.style.visibility = "visible";
            return false;
        }

    }
    </script>


    <script>
      function myFunction() {
      const inpObj = document.getElementById("id1");
      if (!inpObj.checkValidity()) {
        document.getElementById("demo").innerHTML = inpObj.validationMessage;
      } else {
        return true;
      } 
    } 
    </script>
    
<script>
  function AadharValidate() {
    var aadhar = document.getElementById("txtAadhar").value;
        var lblAadharCard = document.getElementById("spanAadharCard")
        var adharcardTwelveDigit = /^\d{12}$/;
        
        if (aadhar.match(adharcardTwelveDigit)) {
          lblAadharCard.style.visibility = "hidden";
            return true;
        } else {
          lblAadharCard.style.visibility = "visible";
            return false;
        }

    }
  
    </script>
  <script>
      document.title="Tenant Details";
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

