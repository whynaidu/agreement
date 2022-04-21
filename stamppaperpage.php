<<?php  
session_start();
if(!isset($_SESSION['email'])) // If session is not set then redirect to Login Page
{
 header("Location:login.php"); 
}
include("include/configure.inc.php");
$fid=$_GET['id'];

?>!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php               
$sql=mysqli_query($conn,"select owner.fullname as oname, owner.age as oage, owner.occupation as ooccupation,owner.aadhaar as oaadhaar,owner.pan_card as opancard, owner.address as oaddress, tenant.fullname as tname,tenant.aadhaar as taadhaar,tenant.pan_card as tpancard, tenant.age as tage, tenant.occupation as toccupation, tenant.address as taddress, new_agreement.date_of_agreement as doa,new_agreement.place_of_agreement as poa, new_agreement.document_no as docno from new_agreement inner join owner on new_agreement.document_no=owner.document_no inner join tenant on new_agreement.document_no=tenant.document_no where new_agreement.document_no='$fid'; ");
while($arr=mysqli_fetch_array($sql)){
						?>
	<div class="page" style="width:215mm; height:297mm; margin-top:200mm; margin-bottom:1cm; margin-left:3cm; margin-right:2cm; font-family: Arial; font-size:18px;">
	<h2 align="center">LEAVE AND LICENSE AGREEMENT</h2>
	<p align="center">This agreement is made and executed on <b><?php echo $arr['doa'];?></b> at <b><?php echo $arr['poa'];?></b></p>
		<p align="center">Between,</p>
		<p><b><?php echo $arr['oname'];?>, &nbsp;</b>&nbsp;Age:<b>&nbsp;About <?php echo $arr['oage'];?></b>&nbsp;Years, Occupation:<b>&nbsp;<?php echo $arr['ooccupation'];?></b>&nbsp;PANCARD:<b>&nbsp;<?php echo $arr['opancard'];?>,</b>&nbsp; UID: <b><?php echo $arr['oaadhaar'];?></b>
. Residing at:<b><?php echo $arr['oaddress'];?></b>
HEREINAFTER called ‘the Licensor (which expression shall mean and include the Licensor above
named as also his respective heirs, successors, assigns, executors and administrators)</p>
		
<p align="center">AND</p>
		<p><b><?php echo $arr['tname'];?>, &nbsp;</b>&nbsp;Age:<b>&nbsp;About <?php echo $arr['tage'];?></b>&nbsp;Years, Occupation:<b>&nbsp;<?php echo $arr['tooccupation'];?>,</b>&nbsp;PANCARD:<b>&nbsp;<?php echo $arr['tpancard'];?>,</b>&nbsp; UID: <b><?php echo $arr['taadhaar'];?></b>
. Residing at:<b><?php echo $arr['taddress'];?></b>
HEREINAFTER called ‘the Licensee’ (which expression shall mean and include only Licensee
above named).</p>
		
	</div>
	<?php } ?>
</body>
</html>
