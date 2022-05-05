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
  $age=$_POST['age'];
	$relation=$_POST['relation'];
	$gender=$_POST['gender'];
	
	
	$sql=mysqli_query($conn,"INSERT INTO `family_members`(`document_no`,`name`, `age`, `relation`, `gender`) VALUES 
  ('$fid','$name','$age','$relation','$gender')");
	if($sql==1){	
    header("location:family.php?id=".$fid);
  	}else{
		echo "<script>alert('Something went wrong');</script>";
	}

}

if(isset($_GET['delid'])){
  $id=mysqli_real_escape_string($conn,$_GET['delid']);
  $sql=mysqli_query($conn,"delete from family_members where id='$id'");
  if($sql=1){
   
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>No of Family Members</title>
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
    <div class="container-fluid page-body-wrapper" >
      <!-- partial:partials/_settings-panel.html -->
  
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <?php include("partials/sidebar.php");?>
      <!-- partial -->      <!-- partial -->
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
                  <h4 class="card-title">Staying with the License</h4>
                  <form class="forms-sample" id="basic-form" method="post">
					  <div class="row">
						  <div class="col-sm-6">
                    <div class="form-group row">
                      <label for="examplename" class="col-sm-3 col-form-label-sm">Name<label style="color:Red">*</label></label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control"id="txtname"  name="name"  required>
                        <span id="spanname"></span>
                      </div>
                    </div>
					</div>
					<div class="col-sm-6">
                    <div class="form-group row">
                      <label for="examplerel" class="col-sm-3 col-form-label-sm">Relation<label style="color:Red">*</label></label>
                      <div class="col-sm-9">
                        <select class="form-control" id="exampleSelectrelation"name="relation"required>
                          <option value="" disabled selected hidden>Select</option>
                          <option>Child</option>
                          <option>Father</option>
						              <option>Mother</option>
                          <option>Wife</option>
						              <option>Husband</option>
                        </select> 
                      </div>
                    </div>
					  </div>
						</div>
					  <div class="row">
						  <div class="col-sm-6">
                    <div class="form-group row">
                      <label for="exampleage" class="col-sm-3 col-form-label-sm">Age<label style="color:Red">*</label></label>
                      <div class="col-sm-9">
                        <input type="number" class="form-control"name="age" id="age" required>
                      </div>
                    </div>
					</div>
					<div class="col-sm-6">
                    <div class="form-group row">
                      <label for="examplearea" class="col-sm-3 col-form-label-sm">Gender<label style="color:Red">*</label></label>
                      <div class="col-sm-9">
                        <select class="form-control" id="exampleSelectgender"name="gender" required>
                        <option value="" disabled selected hidden>select</option>
                          <option>Male</option>
                          <option>Female</option>
                        </select> 
                      </div>
                    </div>
					  </div>
						</div>
					<div class="col" align="right">
					<a href="witness.php?id=<?php echo $fid;?>"><button type="button" class="btn btn-primary  btn-lg" style="color: aliceblue" ><i class="mdi mdi-chevron-left"></i>Previous</button></a>
						<button type="submit" class="btn btn-primary  btn-lg" name="submit"  style="color: aliceblue">Add</button>
                    <a href="amenities.php?id=<?php echo $fid;?>"><button type="button" class="btn btn-primary  btn-lg" style="color: aliceblue" >Next<i class="mdi mdi-chevron-right"></i></button></a>
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
                            <th>Age</th>
                            <th> Gender </th>
                            <th> Relation </th>
                            <th> Action </th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php $sql=mysqli_query($conn,"select * from family_members where document_no= '$fid'");
                    $count=1;
                    while($arr=mysqli_fetch_array($sql)){           
                    ?>
                          <tr>
                            <td> <?php echo $count;?></td>
                            <td> <?php echo $arr['name'];?></td>
                            <td> <?php echo $arr['age'];?></td>
                            <td><?php echo $arr['gender'];?></td>
                            <td><?php echo $arr['relation'];?></td>
                            <td><button type="button" class="btn btn-primary btn-rounded btn-icon" style="color: aliceblue"> <i class="mdi mdi-delete"></i> </button>
                                               
                      <a class="btn btn-danger btn-rounded btn-icon" href="family.php?delid=<?php echo $arr['id']; ?>" onclick="return checkDelete()" class="btn btn-primary btn-rounded btn-icon">
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
                


                
<script>document.title="Family Details";
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
    });
    </script>


</body>

</html>

