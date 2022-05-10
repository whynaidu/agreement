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
                      <select class="form-control" id="exampleSelectGender" name="abbreviation" required>
                      <option value="" disabled selected hidden>select</option>
                          <option>Mr.</option>
                          <option>Mrs.</option>
                        </select>
                      </div>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="name"  id="txtname" placeholder="Enter Name" style="text-transform:uppercase" required>
                        <span id="spanname"></span>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputMobile" class="col-sm-2 col-form-label">Mobile No.<label style="color:Red">*</label></label>
                      <div class="col-sm-4">
                        <input type="tel" class="form-control" id="phone" name="mobile" placeholder="Enter Mobile Number" minlength="10" maxlength="10" required>
                      </div>
                
                      <label for="exampleaadhaar" class="col-sm-2 col-  form-label">E-mail ID<label style="color:Red">*</label></label>
                      <div class="col-sm-4">
                        <input type="email" class="form-control"name="email" placeholder="Enter Email" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleaadhaar" class="col-sm-2 col-form-label">Passport No</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control"name="passport" placeholder="Enter Passport Number">
                      </div>
 
                      <label for="exampleaadhaar" class="col-sm-2 col-form-label">Aadhaar Card No.<label style="color:Red">*</label></label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control"name="aadhaar" id="txtAadhar" placeholder="Enter Aadhaar Card number"   required>
                        <span id="spanAadharCard" ></span>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="exampleaddress" class="col-sm-2 col-form-label">Age<label style="color:Red">*</label></label>
                      <div class="col-sm-4">
                        <input type="number"  class="form-control" name="age" min="18" max="100"  id="id1" placeholder="Enter Age" required>
                        <p id="demo"></p>
                      </div>
 

                      <label for="examplepan" class="col-sm-2 col-form-label">Pancard No.<label style="color:Red">*</label></label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control"name="pancard" id="txtPANCard" placeholder="Enter Pancard number" style="text-transform:uppercase" required>
                        <span id="spanCard"></span>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleaddress" class="col-sm-2 col-form-label">Residence Address<label style="color:Red">*</label></label>
                      <div class="col-sm-10">
                      <textarea name="address" cols="73" rows="4" placeholder="Enter Address" required></textarea> 
                      </div>
                    </div>
					          <div class="form-group row">
                      <label for="examplepreaddress" class="col-sm-2 col-form-label">Present Address<label style="color:Red">*</label></label>
                      <div class="col-sm-10">
                        <textarea name="permanent_address" cols="73" rows="4" placeholder="Enter Address" required></textarea>  
                      </div>
                    </div>
               
					<div class="col" align="right">
          
						 <a href="owner.php?id=<?php echo $id;?>"><button type="button" class="btn btn-primary  btn-lg" style="color: aliceblue"><i class="mdi mdi-chevron-left"></i>Previous</button></a>
                     <button type="submit" class="btn btn-primary  btn-lg" style="color: aliceblue" name="submit" id="sub">Next<i class="mdi mdi-chevron-right"></i></button>
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
      document.title="Tenant Details";
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
  <script>
  $(document).ready(function(){
//TEXT VALIDATION
$("#spanname").hide();
	    $("#txtname").keyup(function(){
	     txt_check();
	   });
	   function txt_check(){
		   let txt=$("#txtname").val();
		   let vali =/^[A-Za-z ]+$/;
		   if(!vali.test(txt)){
			  $("#spanname").show().html("Enter Alphabets only").css("color","red").focus();
			  txt_err=false;
			  return false;
		   }
		   else{
		       $("#spanname").hide();
		       
		   }
	   }

	   $("#sub").click(function(){
       txt_err = true;
             txt_check();
			   
			   if((txt_err==true)){
			      return true;
			   }
			   else{return false;}
		  });


      //PAN card validation
	   $("#spanCard").hide();
	    $("#txtPANCard").keyup(function(){
	     pan_check();
	   });
	   function pan_check(){
		   let pancard=$("#txtPANCard").val();
		   let vali =/([A-Z]){5}([0-9]){4}([A-Z]){1}$/;  
		   if(!vali.test(pancard)){
			    $("#spanCard").show().html("*Invalid Pan No").css("color","red").focus();
			 pan_err=false;
			 return false;
		   }
		   else{
		       $("#spanCard").hide();
		   }
	   }

	   $("#sub").click(function(){
	           pan_err = true;
		       pan_check();
			   
			   if((pan_err==true)){
			      return true;
			   }
			   else{return false;}
		  });


      //AADHAR CARD VALIDATION
      $("#spanAadharCard").hide();
	    $("#txtAadhar").keyup(function(){
	     aadhar_check();
	   });
	   function aadhar_check(){
		   let aadharcard=$("#txtAadhar").val();
		   let vali =/^\d{12}$/; 
		   if(!vali.test(aadharcard)){
			    $("#spanAadharCard").show().html("*Invalid Aadhar No").css("color","red").focus();
          aadhar_err=false;
			 return false;
		   }
		   else{
		       $("#spanAadharCard").hide(); 
		   }
	   }

	   $("#sub").click(function(){
	           aadhar_err = true;
             aadhar_check();
			   
			   if((aadhar_err==true)){
			      return true;
			   }
			   else{return false;}
		  });


      //age validation
      $("#demo").hide();
	    $("#id1").keyup(function(){
	     age_check();
	   });
	   function age_check(){
		   let age=$("#id1").val();
        let vali =/^(1[89]|[2-9]\d)$/;
        
        
       if(!vali.test(age)){
            $("#demo").show().html("*Age should be between 18 to 100").css("color","red").focus();
            age_err=false;
            return false;
        }
        else{
            $("#demo").hide();
        }
      }

	   $("#sub").click(function(){
      age_err = true;
      age_check();
			   
			   if((age_err==true)){
			      return true;
			   }
			   else{return false;}
		  });



 });
</script>


  <!-- End custom js for this page-->
</body>

</html>

