<?php  
session_start();
if(!isset($_SESSION['email'])) // If session is not set then redirect to Login Page
{
 header("Location:login.php"); 
}
include("include/configure.inc.php");
$fid=$_GET['id'];
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Police NOC</title>
</head>
<style>
.bluediv {
  padding-top: 50px;
}
p.ex1 {
  margin-left: 500px;
}
table , td, th {
	border: 1px solid #595959;
	border-collapse: collapse;
}
td, th {
	padding: 3px;
	width: 30px;
	height: 25px;
}
th {
	background: #f0e6cc;
}
.even {
	background: #fbf8f0;
}
.odd {
	background: #fefcf9;
}	
</style>
<body>

	<h2 align="center">भाडेकरु माहिती फॉर्म</h2>
	<p class="ex1">रजिस्टर नंबर :-</p>
	<p class="ex1">दिनांक :-</p>
	<div class="row" style="padding:10px;text-align:center;">
<div class="row" style="display:flex;">
                <div class="" style="padding-top:10px;" >
				<img alt="Image html" style="max-height:800px;max-width:150px;" src="images/Shape 1.svg"height="100%">
                </div>
                <div class="" style="padding-top:10px;">
				<img alt="Image html" style="max-height:600px;max-width:120px;" src="images/Shape 1.svg" width="90%" height="100%">
                </div>
                <div class="col" style="padding-top:10px;">
				<img alt="Image html" style="max-height:600px;max-width:120px;" src="images/Shape 1.svg" width="90%" height="100%">
                </div>
                <div class="col" style="padding-top:10px;">
				<img alt="Image html" style="max-height:600px;max-width:120px;" src="images/Shape 1.svg" width="90%" height="100%">
                </div>
                <div class="col" style="padding-top:10px;">
				<img alt="Image html" style="max-height:600px;max-width:120px;" src="images/Shape 1.svg" width="90%" height="100%">
                </div>						
                </div>
	</div>
	<table width="100%">
	<tbody>
	
		<tr>

			<td style="width:5%">१</td>
			<td style="width:48%">घर मालकाचे संपूर्ण नाव, सध्याचा पत्त, वय, मोबाईल क्रमांक <br>Name, Address & Mobile No. of Owner</td>
			<?php 
                        
						$sql=mysqli_query($conn,"select * from owner where document_no= '$fid'");
						while($arr=mysqli_fetch_array($sql)){
						?>
			<td colspan="3"><label><?php echo $arr['fullname'];?></label></br>
						<label><?php echo $arr['address'];?></label></br>
						<label><?php echo $arr['mobile'];?></label></td>
				

		</tr>
		<tr>
			<td>२</td>
			<td>भाडेकरुचे संपूर्ण नाव, यापूर्वीचा पत्त, वय, मोबाईल क्रमांक<br>Pancard No and Aadhar Card No of Owner</td>
			<td  colspan="3"><label><?php echo $arr['pan_card'];?></label></br>
                            <label><?php echo $arr['aadhaar'];?></label></td>
		</tr>
		<?php } ?>
		<tr>
		<?php 
                        
						$sql=mysqli_query($conn,"select * from tenant where document_no= '$fid'");
						while($arr=mysqli_fetch_array($sql)){
						?>
			<td>३</td>
			<td>भाडेकरुचे संपूर्ण नाव, यापूर्वीचा पत्त, वय, मोबाईल क्रमांक<br>Name, Previous Address & Mobile No. of Tenant</td>
			<td  colspan="3"><label><?php echo $arr['fullname'];?></label></br>
						<label><?php echo $arr['address'];?></label></br>
						<label><?php echo $arr['mobile'];?></label></td>
		</tr>
		<tr>
			<td>४</td>
			<td>भाडेकरुचे संपूर्ण नाव, यापूर्वीचा पत्त, वय, मोबाईल क्रमांक<br>Pancard No and Aadhar Card No of Tenant</td>
			<td  colspan="3"><label><?php echo $arr['pan_card'];?></label></br>
                            <label><?php echo $arr['aadhaar'];?></label></br></td>
		</tr>
		

		<tr>
			<td>५</td>
			<td>भाडेकरुचे मूळ गावचा पत्ता, फोन नंबर<br> Permanent Address of Tenant</td>
			<td  colspan="3"><?php echo $arr['permanent_address'];?></td>
		</tr>
		<?php } ?>
		<tr>
		<?php 
                        
                        $sql=mysqli_query($conn,"select * from property_details where document_no= '$fid'");
                        while($arr=mysqli_fetch_array($sql)){
                        ?>
			<td>६</td>
			<td>भाड्याने देण्यात येणाऱ्या जागेचा पत्ता <br>Address of Rental Room</td>
			<td colspan="3"><label><?php echo $arr['address'];?></label></td>
			<?php } ?>
		</tr>	

		<tr>
		<?php 
                        
                        $sql=mysqli_query($conn,"select * from agent_details");
                        while($arr=mysqli_fetch_array($sql)){
                        ?>
			<td>७</td>
			<td>एजंटचे नाव, पत्ता, मोबाईल क्रमांक<br>Name of Agent, Address & Mobile No.</td>
			<td colspan="3"><label><?php echo $arr['agent_name'];?></label><br>
			<label><?php echo $arr['office_address'];?></label><br>
			<?php echo $arr['mobile_no'];?></label><br></td>
			<?php } ?>

		</tr>		
		</tbody>
</table>
<br>
<br>

<br>
<br>
<br>

<br>
<br>
<br>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<table width="100%">
	<tbody>
		<tr>
			<td rowspan="2">८</td>
			<td rowspan="2">भाडेकरुचे परिवारातील सदस्यांची संख्या <br> No. of Family Members</td>
			<td>पुरुष</td>
			<td>स्त्रिया</td>
			<td>लहान मुले</td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
		<?php 
                        
						$sql=mysqli_query($conn,"select * from tenant where document_no= '$fid'");
						while($arr=mysqli_fetch_array($sql)){
						?>
			<td>९</td>
			<td>ई-मेल आयडी<br>E-mail ID of Tenant</td>
			<td colspan="3"><label><?php echo $arr['email'];?></label></td>
		</tr>
		<tr>
			<td>१०</td>
			<td>पासपोर्ट नंबर <br> Passport No. of Tenant</td>
			<td colspan="3"><label><?php echo $arr['passport'];?></label></td>
		</tr>
		<tr>
			<td>११</td>
			<td>कामाचे स्वरूप [पुराव्यासह]<br>Nature of Work & Proof</td>
			<td colspan="3"><label><?php echo $arr['occupation'];?></label></td>
		</tr>
		<tr>
			<td>१२</td>
			<td>काम करत असलेल्या कार्यालयाचे नाव, पत्ता, फोन नंबर <br>Office Name, Address & Phone No.</td>
			<td colspan="3"><?php echo $arr['office_name'];?></label><br>
			<?php echo $arr['office_addres'];?></label><br>
			<?php echo $arr['office_phone'];?></label></td>
		</tr>		
		<tr>
			<td>१३</td>
			<td>भाडेकरुला ओळखणाऱ्या दोन व्यक्तीचे संपूर्ण नाव, पत्ता, मोबाईल क्रमांक <br>Two persons reference with Address & Mobile No.</td>
			<td colspan="3"><label><?php echo $arr['name1'];?></label><br>
			<label><?php echo $arr['name2'];?></label></td>
		</tr>	
		<?php } ?>	
		<tr>
		<?php 
                        
						$sql=mysqli_query($conn,"select * from new_agreement where document_no= '$fid'");
						while($arr=mysqli_fetch_array($sql)){
						?>
			<td>१४</td>
			<td>करार केल्याची तारीक व कराराचा कालावधी <br>Date of Agreement & Period</td>
			<td colspan="3">	<label><?php echo $arr['date_of_agreement'];?></label></br>
			<label><?php echo $arr['no_of_month'];?>&nbsp;		Months</label></td>
			<?php } ?>	

		</tr>
	</tbody>
</table>
	<p align="center">अर्जा सोबत सादर करावयाची छायांकीत प्रमाणपत्रे</p>
   <div style="width: 100%;">
        <div style="width: 50%;  float: left;"> 
            <h4 align="center">घर मालक</h4>
			<p>१) ओळखपत्र</p>
			<p>२) राहण्याचा पुरावा</p>
			<p>३) लाईटबील , पजेशन लेटर , पाणीबील , टॅक्सबील, सोसायटी मेंटेनन्स पावती यापैकी कोणतेही एक</p>
			<h4 class="bluediv" align="center">घर मालकाची स्वाक्षरी&nbsp;&nbsp;Signature of Owner</h4>
        </div>
        <div style="margin-left: 50%;"> 
            <h4 align="center">भाडेकरु</h4>
			<p>१) कंपनीचे ओळखपत्र</p>
			<p>२) काम करीत असलेल्या ठिकाणचे सिलसहित प्रमाणपत्र</p>
			<p>३) मूळ वास्तव्याचा पुरावा [मतदान ओळखपत्र, पासपोर्ट, ग्रामपंचायत दाखला , शाळेचा दाखला , रेशनकार्ड यापैकी कोणतेही एक]</p>
			<h4 class="bluediv" align="center">भाडेकरूची स्वाक्षरी&nbsp;&nbsp;Signature of Tenant</h4>
        </div>
    </div>

	<h4 align="center">घोषणापत्र</h4>
	<p align="center">वरील भरुन दिलेली माहिती ही खरी असून त्यामध्ये काही खोटे आढळल्यास भी कायदेशीर कार्यवाहीस पात्र राहिन.</p>
	<p align="center">टिप:- सदर माहितीचा / फॉर्मचा उपयोग केवळ पोलीसांच्या रेकॉर्डसाठी असून अन्य कोणत्याही कारणासाठी पुरवा म्हणून वापरता येणार नाही. </p>

		</body>
</html>
