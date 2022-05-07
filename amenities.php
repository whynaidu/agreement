<?php
session_start();
if(!isset($_SESSION['email'])) // If session is not set then redirect to Login Page
{
 header("Location:login.php"); 
}  
include("include/configure.inc.php");
$fid=$_GET['id'];
if(isset($_POST['submit'])){
	$name=$_POST['name'];  
  $number=$_POST['number'];
	$sql=mysqli_query($conn,"INSERT INTO `amenities`(`document_no`,`name`,`number`) VALUES 
  ('$fid','$name','$number')");
	if($sql==1){	
    header("location:amenities.php?id=".$fid);
  	}else{
		echo "<script>alert('Something went wrong');</script>";
	}
}

if(isset($_GET['delid'])){
  $id=mysqli_real_escape_string($conn,$_GET['delid']);
  $sql=mysqli_query($conn,"delete from amenities where id='$id'");
  if($sql=1){
    header("location:stage5.php?id=".$fid);
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


.error
{
    color: Red;
    visibility: hidden;
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
      <!-- partial -->      <!-- partial -->
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
                  <h4 class="card-title">List of Amenities</h4>
                  <form class="forms-sample" name="form1" method="post">
					  <div class="row">
						  <div class="col-sm-6">
                    <div class="form-group row">
                      <label for="examplename" class="col-sm-3 col-form-label-sm">Name<label style="color:Red">*</label></label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="txtname" name="name" placeholder="Enter Name"  required>
                        <span id="spanname" ></span>
                      </div>
                    </div>
					</div>
					<div class="col-sm-6">
                     <div class="form-group row">
                      <label for="exampleitem" class="col-sm-3 col-form-label-sm">Number Of Items<label style="color:Red">*</label></label>
                      <div class="col-sm-9">
                        <input type="number" class="form-control"name="number"  placeholder="Enter Number of items" required>
                      </div>
                    </div>
					  </div>
						</div>
					<div class="col" align="right">
					<a href="family.php?id=<?php echo $fid;?>"><button type="button" class="btn btn-primary btn-lg" style="color: aliceblue"><i class="mdi mdi-chevron-left"></i>Previous</button></a>
						<button type="submit" name="submit" class="btn btn-primary btn-lg" id="sub" style="color: aliceblue">Add</button>
                    <a href="payment.php?id=<?php echo $fid;?>"><button type="button" class="btn btn-primary btn-lg" style="color: aliceblue" >Next<i class="mdi mdi-chevron-right"></i></button></a>
					</div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="table-responsive pt-3">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>Sr.No</th>
                            <th>Name</th>
                            <th>Number of items</th>
                            <th> Action </th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php $sql=mysqli_query($conn,"select * from amenities where document_no= '$fid'");
                    $count=1;
                    while($arr=mysqli_fetch_array($sql)){
                    ?>
                          <tr>
                            <td> <?php echo $count;?></td>
                            <td> <?php echo $arr['name'];?></td>
                            <td> <?php echo $arr['number'];?></td>
                            <td>             
                      <a class="btn btn-danger btn-rounded btn-icon" href="stage5.php?delid=<?php echo $arr['id']; ?>" onclick="return checkDelete()" class="btn btn-primary btn-rounded btn-icon">
                          <i class="mdi mdi-delete"></i>
                          </a></td>
                          </tr>
                          <?php $count++;
                  } ?>
                        </tbody>
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

<!-- <script>
  function lettersOnlyCheck() {
        var x = document.getElementById("txtname");
        var y = document.getElementById("spanname")
        var regEx = /^[A-Za-z]+$/;
        
        if(x.value.match(regEx)) {
            y.style.visibility = "hidden";
            return true;
        } else {
            y.style.visibility = "visible";
            return false;
        }
    }
    </script> -->

<script>
document.title="Amenities Details";
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

  <script>
  $(document).ready(function(){
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
 });
</script>




</body>

</html>

