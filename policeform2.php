
<?php  
include("include/configure.inc.php");
$fid=$_GET['id'];
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
      <?php include("partials/sidebar.php"); ?>     

      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
         
            <div class="col-sm-12">
              <div class="home-tab">
                <div class="d-sm-flex align-items-center justify-content-between border-bottom">
              
                  <div>
                    <div class="btn-wrapper">
                      <a href="#" class="btn btn-otline-dark align-items-center"><i class="icon-share"></i> Share</a>
                      <a href="#" class="btn btn-otline-dark"><i class="icon-printer"></i> Print</a>
                      <a href="#" class="btn btn-primary text-white me-0"><i class="icon-download"></i> Export</a>
                    </div>
                  </div>
                </div>
                <div class="tab-content tab-content-basic">
				  <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">

                  <div class="table-responsive pt-3">
					  <table class="table table-bordered">
					<tbody>                   
				<tr>
				<th rowspan="2">८</th>
				<th colspan="2" rowspan="2">भाडेकरुचे परिवारातील सदस्यांची संख्या <br><br> No. of Family Members</th>
				<th colspan="2" align="center">पुरुष</th>
				<th colspan="2" align="center">स्त्रिया</th>
				<th colspan="2" align="center">लहान मुले</th>
				</tr>
				<tr>
				<td colspan="2"></td>
				<td colspan="2"></td>
				<td colspan="2"></td>
			</tr>
   			 <?php 
	
     	 	$sql=mysqli_query($conn,"select * from tenant where document_no='$fid'");
      		 while($arr=mysqli_fetch_array($sql)){
      		?>
			<tr>
			<th>९</th>
			<th colspan="2">ई-मेल आयडी<br><br>E-mail ID of Tenant</th>
			<td colspan="6"><label><?php echo $arr['email'];?></label></td>
		</tr>
		<tr>
			<th>१०</th>
			<th colspan="2">पासपोर्ट नंबर <br><br> Passport No. of Tenant</th>
			<td colspan="6"><label><?php echo $arr['passport'];?></label></td>
		</tr>
    <?php } ?>

		<tr>
			<th>११</th>
			<th colspan="2">कामाचे स्वरूप [पुराव्यासह]<br><br>Nature of Work & Proof</th>
			<td colspan="6"></td>
		</tr>
		<tr>
			<th>१२</th>
			<th colspan="2">काम करत असलेल्या कार्यालयाचे नाव, पत्ता, फोन नंबर <br><br> Office Name, Address & Phone No.</th>
			<td colspan="6"></td>
		</tr>
		<tr>
			<th>१३</th>
			<th colspan="2">भाडेकरुला ओळखणाऱ्या दोन व्यक्तीचे संपूर्ण नाव, पत्ता, मोबाईल क्रमांक <br><br>Two persons reference with Address & Mobile No.</th>
			<td colspan="6"></td>
		</tr>
    <?php                 
      $sql=mysqli_query($conn,"select * from new_agreement where document_no='$fid'");
       while($arr=mysqli_fetch_array($sql)){
      ?>
		<tr>
			<th>१४</th>
			<th colspan="2">करार केल्याची तारीक व कराराचा कालावधी <br><br>Date of Agreement & Period</th>
			<td colspan="6"><label><?php echo $arr['date_of_agreement'];?></label></br>
      <label><?php echo $arr['no_of_month'];?>&nbsp; Months</label></td>
		</tr>
    <?php } ?>
	</tbody>
</table>
                  </div><br>
                 <div class="row" align="center">
					 <h4>अर्जा सोबत सादर करावयाची छायांकीत प्रमाणपत्रे</h4>
					</div>
					<div class="row">
					 <div class="col-lg-6" align="center">
						<h4>घर मालक</h4>
						</div>
						<div class="col-lg-6" align="center">
						 <h4> भाडेकरु</h4>
					</div>
					</div>
					<div class="row">
						<div class="col-md-1" align="right">
						<h4> १ )</h4>
						</div>
					 <div class="col-lg-5">
						<h4>ओळखपत्र </h4>
						</div>
						<div class="col-md-1" align="right">
						<h4>१ )</h4>
						</div>
						<div class="col-lg-5">
						 <h4>कंपनीचे ओळखपत्र</h4>
					</div>
					</div>
					<div class="row">
						<div class="col-md-1" align="right">
						<h4>२ )</h4>
						</div>
					 <div class="col-lg-5">
						<h4>राहण्याचा पुरावा </h4>
						</div>
						<div class="col-md-1" align="right">
						<h4>२ )</h4>
						</div>
						<div class="col-lg-5">
						 <h4>काम करीत असलेल्या ठिकाणचे सिलसहित प्रमाणपत्र</h4>
					</div>
					</div>
					<div class="row">
						<div class="col-md-1" align="right">
						<h4>३ )</h4>
						</div>
					 <div class="col-lg-5">
						<h4>लाईटबील , पजेशन लेटर , पाणीबील , टॅक्सबील, सोसायटी मेंटेनन्स पावती यापैकी कोणतेही एक</h4>
						</div>
						<div class="col-md-1" align="right">
						<h4>३ )</h4>
						</div>
						<div class="col-lg-5">
						 <h4>मूळ वास्तव्याचा पुरावा [मतदान ओळखपत्र, पासपोर्ट, ग्रामपंचायत दाखला , शाळेचा दाखला , रेशनकार्ड यापैकी कोणतेही एक]</h4>
					</div>
					</div>
					 <br><br><br><br>
				  <div class="row">
					 <div class="col-lg-6" align="center">
						<h4>घर मालकाची स्वाक्षरी Signature of Owner</h4>
						</div>
						<div class="col-lg-6" align="center">
						 <h4>भाडेकरूची स्वाक्षरी Signature of Tenant</h4>
					</div>
					</div>
					<br>
					<div class="row" align="center">
					 <h4>घोषणापत्र</h4>
					</div>
					<div class="row" align="center">
					 <h4>वरील भरुन दिलेली माहिती ही खरी असून त्यामध्ये काही खोटे आढळल्यास भी कायदेशीर कार्यवाहीस पात्र राहिन.</h4>
					</div>
					<br>
					<div class="row">
					 <div class="col-lg-2" align="right">
						<h4>टिप:-</h4>
						</div>
						<div class="col-lg-10" align="left">
						 <h4>सदर माहितीचा / फॉर्मचा उपयोग केवळ पोलीसांच्या रेकॉर्डसाठी असून अन्य कोणत्याही कारणासाठी पुरवा म्हणून वापरता येणार नाही . </h4>
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

