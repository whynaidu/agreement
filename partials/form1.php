
<?php
include("include/configure.inc.php");
if(isset($_POST["submit"])){h
 	$client_code=$_POST["client_code"];
	$email=$_POST["email"];
  $subject=$_POST["subject"];
  $description=$_POST["description"];
 
  
  

	$sql = mysqli_query($conn,"INSERT INTO `ticket`( `client_code`, `email_id`, `subject`, `description`) VALUES ('	$client_code','$email', '$subject','$description')") ;
  if($sql==1){
    echo "<script>alert('Register successfully'),window.location='addticket.php';</script>";
   

  }else{
    echo "<script>alert('something went wrong');</script>";
  }

  }
  

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
           
                        <div class="form-floating mb-3">
                <input class="form-control" id="name" type="text" placeholder="Client Code" data-sb-validations="required" />
                <label for="client_code">Client Code</label>
                <!-- <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div> -->
            </div>
            <!-- Email address input-->
            <div class="form-floating mb-3">
                <input class="form-control" id="email" type="email" placeholder="Email" data-sb-validations="required,email" />
                <label for="email">Email  address</label>
                <!-- <div class="invalid-feedback" data-sb-feedback="company:required">An company name is required.</div> -->
                <!-- <div class="invalid-feedback" data-sb-feedback="email:email"></div> -->
            </div>
            <!-- Phone number input-->
            <div class="form-floating mb-3">
                <input class="form-control" id="subject" type="text" placeholder="subject" data-sb-validations="required" />
                <label for="subject">Subject</label>
                <!-- <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div> -->
            </div>
            <!-- <upload document> -->
            <!-- <div class="form-floating mb-3">
                <input class="form-control" id="name" type="text" placeholder="Enter your name..." data-sb-validations="required" />
                <label for="name">Upload Document</label> -->
                <!-- <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div> -->
            <!-- </div> -->

            <!-- Message input-->
            <div class="form-floating mb-3">
                <textarea class="form-control" id="message" type="text" placeholder="Enter your message here..." style="height: 10rem" data-sb-validations="required"></textarea>
                <label for="message">Description</label>
                <!-- <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div> -->
            </div>
            <!-- Submit success message-->
            <!---->
            <!-- This is what your users will see when the form-->
            <!-- has successfully submitted-->
            <div class="d-none" id="submitSuccessMessage">
                <div class="text-center mb-3">
                    <div class="fw-bolder">Form submission successful!</div>
                    To activate this form, sign up at
                    <br />
                    <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                </div>
            </div>
            <!-- Submit error message-->
            <!---->
            <!-- This is what your users will see when there is-->
            <!-- an error submitting the form-->
            <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
            <!-- Submit Button-->
            <button type="submit" class="btn btn-primary me-2" name="submit" style="color:white">Submit</button>
                    <button class="btn btn-danger" style="color:white">Cancel</button>
          
            </div>
        </form>


                        <!-- <?php 

                        if(isset($_GET['search'])){

                          $filterval =  $_GET['search'];
                        }
                        
                        $sql=mysqli_query($conn,"select new_agreement.date_of_agreement as doa,new_agreement.document_no as did, tenant.fullname as tname, tenant.mobile as tmobile, noc.status as nstatus, noc.document_no as nodc, owner.fullname as oname, owner.mobile as omobile from new_agreement inner join tenant on tenant.document_no=new_agreement.document_no inner join owner on owner.document_no=new_agreement.document_no inner join noc on noc.document_no=new_agreement.document_no Where noc.status='1'");
                        $count=1;
                         while($arr=mysqli_fetch_array($sql)){
                        ?> -->
                        <!-- <tbody>
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
                        </tbody> -->
                        <!-- <?php $count++;} ?> -->
                      <!-- </table> -->
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

